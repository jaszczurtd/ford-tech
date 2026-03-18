<?php
/***************************************************************************
 *                            bots_limits.php
 *                          -------------------
 *   Centralna konfiguracja zabezpieczen anty-botowych.
 *   Wszystkie limity i listy blokad w jednym miejscu.
 *   Data utworzenia: 2026-03-18
 ***************************************************************************/

if ( !defined('IN_PHPBB') )
{
	die('Hacking attempt');
}

// -- Honeypot i weryfikacja czasu --

// Minimalna liczba sekund na wypelnienie formularza (ponizej = bot)
define('ANTIBOT_MIN_FORM_TIME', 3);

// Klucz uzywany do podpisu timestampa
define('ANTIBOT_SECRET', 'f0rd_t3ch_ant1b0t_s3cr3t_k3y_2026');


// -- Limity linkow (tylko dla nowych uzytkownikow) --

// Maksymalna liczba linkow w poscie dla nowych uzytkownikow
define('ANTIBOT_MAX_LINKS_NEW_USER', 3);

// Prog postow, ponizej ktorego uzytkownik jest "nowy"
define('ANTIBOT_NEW_USER_POST_THRESHOLD', 10);

// Minimalna dlugosc tekstu (bez linkow) gdy post zawiera 2+ linki (nowi uzytkownicy)
define('ANTIBOT_MIN_TEXT_LENGTH', 20);


// -- Blacklista domen spamowych (male litery) --
$antibot_domain_blacklist = array(
	'bit.ly', 'tinyurl.com', 'goo.gl', 'is.gd', 't.co',
	'cutt.ly', 'rebrand.ly', 'shorturl.at',
	'viagra', 'cialis', 'casino', 'poker', 'slots',
	'pharm', 'pills', 'meds', 'drug',
	'porn', 'xxx', 'sex', 'adult', 'webcam',
	'crypto', 'bitcoin', 'forex', 'trading',
	'payday', 'loan', 'credit',
);

// -- Blacklista fraz spamowych (male litery) --
$antibot_phrase_blacklist = array(
	'buy now', 'click here', 'free money', 'make money',
	'earn money', 'work from home', 'limited offer',
	'act now', 'order now', 'special offer',
	'lose weight', 'weight loss', 'diet pill',
	'nigerian prince', 'wire transfer',
	'check my site', 'visit my site', 'check my profile',
	'follow me', 'subscribe to my',
);

?>
