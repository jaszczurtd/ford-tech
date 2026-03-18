<?php
/***************************************************************************
 *                              anti_bot.php
 *                            -------------------
 *   Modul anty-botowy: honeypot, weryfikacja czasu, filtr tresci
 *   Konfiguracja w: includes/bots_limits.php
 *   Data utworzenia: 2026-03-18
 ***************************************************************************/

if ( !defined('IN_PHPBB') )
{
	die('Hacking attempt');
}

// Wczytaj konfiguracje limitow
include_once($phpbb_root_path . 'includes/bots_limits.'.$phpEx);


/**
 * Generuje pola honeypot i timestamp do wstawienia w formularz HTML.
 * Honeypot to ukryte pole, ktore bot automatycznie wypelni,
 * a normalny uzytkownik nie zobaczy.
 * Timestamp sluzy do weryfikacji czy formularz nie zostal wypelniony zbyt szybko.
 */
function antibot_form_fields()
{
	$timestamp = time();
	$token = antibot_sign_timestamp($timestamp);

	// Honeypot: pole ukryte przez CSS - bot je wypelni, czlowiek nie
	// Uzywamy nazwy ktora wyglada jak normalne pole formularza
	$html = '';
	$html .= '<div style="position:absolute;left:-9999px;top:-9999px;height:0;width:0;overflow:hidden;">';
	$html .= '<label for="website_url">Website URL</label>';
	$html .= '<input type="text" name="website_url" id="website_url" value="" tabindex="-1" autocomplete="off" />';
	$html .= '</div>';

	// Timestamp (zaszyfrowany)
	$html .= '<input type="hidden" name="_form_ts" value="' . $timestamp . '" />';
	$html .= '<input type="hidden" name="_form_tk" value="' . $token . '" />';

	return $html;
}


/**
 * Sprawdza pola anty-botowe po submicie formularza.
 * Zwraca pusty string jesli OK, lub komunikat bledu jesli wykryto bota.
 */
function antibot_check_form($post_vars)
{
	// 1. Sprawdz honeypot - jesli wypelnione, to bot
	if ( !empty($post_vars['website_url']) )
	{
		// Logujemy cichutko i blokujemy
		return 'Security validation failed.';
	}

	// 2. Sprawdz timestamp - jesli formularz wypelniony za szybko, to bot
	$form_ts = isset($post_vars['_form_ts']) ? intval($post_vars['_form_ts']) : 0;
	$form_tk = isset($post_vars['_form_tk']) ? $post_vars['_form_tk'] : '';

	if ( $form_ts > 0 && $form_tk !== '' )
	{
		// Weryfikuj podpis
		$expected_token = antibot_sign_timestamp($form_ts);
		if ( $form_tk !== $expected_token )
		{
			return 'Security validation failed.';
		}

		// Sprawdz czy nie za szybko
		$elapsed = time() - $form_ts;
		if ( $elapsed < ANTIBOT_MIN_FORM_TIME )
		{
			return 'Security validation failed. Please wait a moment before submitting.';
		}
	}
	else
	{
		// Brak pola timestamp - formularz nie pochodzi z naszej strony
		return 'Security validation failed.';
	}

	return '';
}


/**
 * Podpisuje timestamp kluczem tajnym.
 * Zapobiega podrabianiu wartosci timestampa przez bota.
 */
function antibot_sign_timestamp($timestamp)
{
	return hash_hmac('sha256', (string)$timestamp, ANTIBOT_SECRET);
}


/**
 * Filtruje tresc posta pod katem spamu.
 * Sprawdza: liczbe linkow, blackliste domen, blackliste fraz.
 * Zwraca pusty string jesli OK, lub komunikat bledu jesli spam.
 *
 * $message - tresc posta (surowa, przed prepare_message)
 * $user_posts - liczba postow uzytkownika
 * $user_level - poziom uzytkownika (ADMIN/MOD/USER)
 */
function antibot_check_post_content($message, $user_posts = 0, $user_level = 0)
{
	global $antibot_domain_blacklist, $antibot_phrase_blacklist;

	// Admini i moderatorzy sa pomijani
	if ( defined('ADMIN') && $user_level == ADMIN )
	{
		return '';
	}

	$message_lower = strtolower($message);

	// 1. Policz linki (http://, https://, www., [url]) - limit tylko dla nowych uzytkownikow
	if ( $user_posts < ANTIBOT_NEW_USER_POST_THRESHOLD )
	{
		$link_count = 0;
		$link_count += preg_match_all('#https?://#i', $message, $m);
		$link_count += preg_match_all('#\bwww\.#i', $message, $m);
		$link_count += preg_match_all('#\[url[=\]]#i', $message, $m);

		if ( $link_count > ANTIBOT_MAX_LINKS_NEW_USER )
		{
			return 'Your message contains too many links. New users are limited to ' . ANTIBOT_MAX_LINKS_NEW_USER . ' links per post.';
		}

		// Sprawdz czy post nie sklada sie glownie z linkow
		if ( $link_count >= 2 )
		{
			$text_without_links = preg_replace('#https?://\S+#i', '', $message);
			$text_without_links = preg_replace('#\[url[^\]]*\].*?\[/url\]#is', '', $text_without_links);
			$text_without_links = trim($text_without_links);

			if ( strlen($text_without_links) < ANTIBOT_MIN_TEXT_LENGTH )
			{
				return 'Your message appears to contain mostly links. Please add more text content.';
			}
		}
	}

	// 2. Sprawdz blackliste domen
	foreach ( $antibot_domain_blacklist as $domain )
	{
		if ( strpos($message_lower, $domain) !== false )
		{
			return 'Your message contains a blocked domain or keyword.';
		}
	}

	// 3. Sprawdz blackliste fraz spamowych
	foreach ( $antibot_phrase_blacklist as $phrase )
	{
		if ( strpos($message_lower, $phrase) !== false )
		{
			return 'Your message has been flagged as potential spam.';
		}
	}

	return '';
}

?>
