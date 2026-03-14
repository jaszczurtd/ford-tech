<?php
/***************************************************************************
 *                                common.php
 *                            -------------------
 *   begin                : Saturday, Feb 23, 2001
 *   copyright            : (C) 2001 The phpBB Group
 *   email                : support@phpbb.com
 *   modification         : (C) 2005 Przemo www.przemo.org/phpBB2/
 *   date modification    : ver. 1.12.5 2005/09/20 12:34
 *
 *   $Id: common.php,v 1.74.2.21 2005/10/31 07:31:06 acydburn Exp $
 *
 ***************************************************************************/

/***************************************************************************
 *
 *   This program is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation; either version 2 of the License, or
 *   (at your option) any later version.
 *
 ***************************************************************************/

$sql_cache_enable = 1;
$show_queries = 0;

if ( !defined('IN_PHPBB') )
{
	die('Hacking attempt');
}

// PHP 8 compatibility polyfills
if (!function_exists('get_magic_quotes_gpc')) {
	function get_magic_quotes_gpc() { return false; }
}
if (!function_exists('get_magic_quotes_runtime')) {
	function get_magic_quotes_runtime() { return false; }
}
if (!function_exists('each')) {
	function each(&$arr) {
		$key = key($arr);
		if ($key === null) return false;
		$value = current($arr);
		next($arr);
		return array(0 => $key, 1 => $value, 'key' => $key, 'value' => $value);
	}
}

$do_gzip_compress = false;
if (extension_loaded('zlib')) {
	ini_set('zlib.output_compression_level', 1);
	if (!( ini_get('zlib.output_compression') == 'On' || ini_get('output_handler') == 'ob_gzhandler' || ini_get('zlib.output_compression') == '1') && ini_get('zlib.output_compression_level') > 0 && $do_gzip_compress === true) {
		ob_start("ob_gzhandler");
	}
}

date_default_timezone_set('Europe/Warsaw');

function microtime_float()
{
   list($usec, $sec) = explode(" ", microtime());
   return ((float)$usec + (float)$sec);
}
$time_start = microtime_float();

//
error_reporting  (E_ERROR | E_WARNING | E_PARSE); // This will NOT report uninitialized variables
@ini_set('magic_quotes_runtime', 'Off'); // Disable magic_quotes_runtime (removed in PHP 8)

// The following code (unsetting globals)
// Thanks to Matt Kavanagh and Stefan Esser for providing feedback as well as patch files

// PHP5 with register_long_arrays off?
if (@phpversion() >= '5.0.0' && (!@ini_get('register_long_arrays') || @ini_get('register_long_arrays') == '0' || strtolower(@ini_get('register_long_arrays')) == 'off'))
{
	$HTTP_POST_VARS = $_POST;
	$HTTP_GET_VARS = $_GET;
	$HTTP_SERVER_VARS = $_SERVER;
	$HTTP_COOKIE_VARS = $_COOKIE;
	$HTTP_ENV_VARS = $_ENV;
	$HTTP_POST_FILES = $_FILES;

	// _SESSION is the only superglobal which is conditionally set
	if (isset($_SESSION))
	{
		$HTTP_SESSION_VARS = $_SESSION;
	}
}

// Protect against GLOBALS tricks
if (isset($HTTP_POST_VARS['GLOBALS']) || isset($HTTP_POST_FILES['GLOBALS']) || isset($HTTP_GET_VARS['GLOBALS']) || isset($HTTP_COOKIE_VARS['GLOBALS']))
{
	die("Hacking attempt");
}

// Protect against HTTP_SESSION_VARS tricks
if (isset($HTTP_SESSION_VARS) && !is_array($HTTP_SESSION_VARS))
{
	die("Hacking attempt");
}

if (@ini_get('register_globals') == '1' || strtolower(@ini_get('register_globals')) == 'on')
{
	// PHP4+ path
	$not_unset = array('HTTP_GET_VARS', 'HTTP_POST_VARS', 'HTTP_COOKIE_VARS', 'HTTP_SERVER_VARS', 'HTTP_SESSION_VARS', 'HTTP_ENV_VARS', 'HTTP_POST_FILES', 'phpEx', 'phpbb_root_path');

	// Not only will array_merge give a warning if a parameter
	// is not an array, it will actually fail. So we check if
	// HTTP_SESSION_VARS has been initialised.
	if (!isset($HTTP_SESSION_VARS) || !is_array($HTTP_SESSION_VARS))
	{
		$HTTP_SESSION_VARS = array();
	}

	// Merge all into one extremely huge array; unset
	// this later
	$input = array_merge($HTTP_GET_VARS, $HTTP_POST_VARS, $HTTP_COOKIE_VARS, $HTTP_SERVER_VARS, $HTTP_SESSION_VARS, $HTTP_ENV_VARS, $HTTP_POST_FILES);

	unset($input['input']);
	unset($input['not_unset']);

	while (list($var,) = @each($input))
	{
		if (!in_array($var, $not_unset))
		{
			unset($$var);
		}
	}

	unset($input);
}

//
// addslashes to vars if magic_quotes_gpc is off
// this is a security precaution to prevent someone
// trying to break out of a SQL statement.
//
if( !get_magic_quotes_gpc() )
{
	if( is_array($HTTP_GET_VARS) )
	{
		while( list($k, $v) = each($HTTP_GET_VARS) )
		{
			if( is_array($HTTP_GET_VARS[$k]) )
			{
				while( list($k2, $v2) = each($HTTP_GET_VARS[$k]) )
				{
					$HTTP_GET_VARS[$k][$k2] = addslashes($v2);
				}
				@reset($HTTP_GET_VARS[$k]);
			}
			else
			{
				$HTTP_GET_VARS[$k] = addslashes($v);
			}
		}
		@reset($HTTP_GET_VARS);
	}

	if( is_array($HTTP_POST_VARS) )
	{
		while( list($k, $v) = each($HTTP_POST_VARS) )
		{
			if( is_array($HTTP_POST_VARS[$k]) )
			{
				while( list($k2, $v2) = each($HTTP_POST_VARS[$k]) )
				{
					$HTTP_POST_VARS[$k][$k2] = addslashes($v2);
				}
				@reset($HTTP_POST_VARS[$k]);
			}
			else
			{
				$HTTP_POST_VARS[$k] = addslashes($v);
			}
		}
		@reset($HTTP_POST_VARS);
	}

	if( is_array($HTTP_COOKIE_VARS) )
	{
		while( list($k, $v) = each($HTTP_COOKIE_VARS) )
		{
			if( is_array($HTTP_COOKIE_VARS[$k]) )
			{
				while( list($k2, $v2) = each($HTTP_COOKIE_VARS[$k]) )
				{
					$HTTP_COOKIE_VARS[$k][$k2] = addslashes($v2);
				}
				@reset($HTTP_COOKIE_VARS[$k]);
			}
			else
			{
				$HTTP_COOKIE_VARS[$k] = addslashes($v);
			}
		}
		@reset($HTTP_COOKIE_VARS);
	}
}

foreach($HTTP_GET_VARS as $klucz => $wartosc)
{
	if(is_array($wartosc))
	{
		unset($HTTP_GET_VARS[$klucz]);
	}
	
}

if (isset($HTTP_GET_VARS['sid']) && !preg_match('/^[A-Za-z0-9]*$/', $HTTP_GET_VARS['sid'])) 
{
	$HTTP_GET_VARS['sid'] = '';
}
if (isset($HTTP_POST_VARS['sid']) && !preg_match('/^[A-Za-z0-9]*$/', $HTTP_POST_VARS['sid'])) 
{
	$HTTP_POST_VARS['sid'] = '';
}

$PHP_SELF = ($HTTP_SERVER_VARS['PHP_SELF']) ? $HTTP_SERVER_VARS['PHP_SELF'] : $HTTP_ENV_VARS['PHP_SELF'];

//
// Define some basic configuration arrays this also prevents
// malicious rewriting of language and otherarray values via
// URI params
//
$board_config = array();
$shoutbox_config = array();
$portal_config = array();
$userdata = array();
$theme = array();
$images = array();
$lang = array();
$nav_links = array();
$gen_simple_header = FALSE;

include($phpbb_root_path . 'config.'.$phpEx);

if( !defined("PHPBB_INSTALLED") )
{
	header('Location: ' . $phpbb_root_path . 'install.' . $phpEx);
	exit;
}

include($phpbb_root_path . 'includes/constants.'.$phpEx);
include($phpbb_root_path . 'includes/template.'.$phpEx);
include($phpbb_root_path . 'includes/sessions.'.$phpEx);
include($phpbb_root_path . 'includes/auth.'.$phpEx);
include($phpbb_root_path . 'includes/functions.'.$phpEx);
include($phpbb_root_path . 'includes/db.'.$phpEx);

// We do not need this any longer, unset for safety purposes
unset($dbpasswd);

$subdirectory = '';

// Mozilla navigation bar
// Default items that should be valid on all pages.
// Defined here and not in page_header.php so they can be redefined in the code
$nav_links['top'] = array ( 
	'url' => append_sid($phpbb_root_dir."index.".$phpEx),
	'title' => sprintf($lang['Forum_Index'], $board_config['sitename'])
);
$nav_links['search'] = array ( 
	'url' => append_sid($phpbb_root_dir."search.".$phpEx),
	'title' => $lang['Search']
);
$nav_links['help'] = array ( 
	'url' => append_sid($phpbb_root_dir."faq.".$phpEx),
	'title' => $lang['FAQ']
);
$nav_links['author'] = array ( 
	'url' => append_sid($phpbb_root_dir."memberlist.".$phpEx),
	'title' => $lang['Memberlist']
);

//
// Obtain and encode users IP
//
// I'm removing HTTP_X_FORWARDED_FOR ... this may well cause other problems such as
// private range IP's appearing instead of the guilty routable IP, tough, don't
// even bother complaining ... go scream and shout at the idiots out there who feel
// "clever" is doing harm rather than good ... karma is a great thing ... :)
//
$client_ip = ( !empty($HTTP_SERVER_VARS['REMOTE_ADDR']) ) ? $HTTP_SERVER_VARS['REMOTE_ADDR'] : ( ( !empty($HTTP_ENV_VARS['REMOTE_ADDR']) ) ? $HTTP_ENV_VARS['REMOTE_ADDR'] : getenv('REMOTE_ADDR') );
$user_ip = encode_ip($client_ip);

//
// Setup forum wide options, if this fails
// then we output a CRITICAL_ERROR since
// basic forum information is not available
//
$sql_work = true;
if ( $check_cache = sql_cache('check', 'board_config') ) 
{ 
    @include($check_cache); 
} 
if ( !$board_config ) 
{ 
    $sql = "SELECT *
		FROM " . CONFIG_TABLE;
	if ( !($result = $db->sql_query($sql)) )
	{
		message_die(CRITICAL_ERROR, 'Nie mo�na pobra� danych z tabeli konfiguracyjnej forum !<br /><br /><b>Prawdopodobnie forum nie jest zainstalowane do bazy danych, lub tabele w bazie danych maja inny prefix (standardowo phpbb_ ).<br />Sprawdz czy tabele w bazie danych maja prefix podany w pliku config.php<br /><br /><br />Je�eli chcesz wgra� kopi� bazy danych i wysla�es ja do katalogu forum u�yj <a href="' . $phpbb_root_path . 'dbloader/dbloader.'.$phpEx . '">DumpLoader\'a</a></b><br />');
	}
	while ( $row = $db->sql_fetchrow($result) )
	{
		$board_config[$row['config_name']] = $row['config_value'];
	}

	$sql_work = sql_cache('write', 'board_config', $board_config);
}

if ( $board_config['protection_get'] && isset($HTTP_GET_VARS) )
{
	foreach($HTTP_GET_VARS as $key => $val)
	{
		if ( strlen($val) > 18 && !preg_match('#^[a-z0-9_ /+]*={0,2}$#i', $val) && !in_array($key, array('rdns', 'highlight', 'redirect', 'tag', 'search_author'))  )
		{
			die('Hacking attempt');
		}
	}
}

$board_config['topics_per_page'] = ($board_config['topics_per_page'] < 1) ? '25' : $board_config['topics_per_page'];
$board_config['posts_per_page'] = ($board_config['posts_per_page'] < 1) ? '25' : $board_config['posts_per_page'];
$board_config['hot_threshold'] = ($board_config['hot_threshold'] < 1) ? '25' : $board_config['hot_threshold'];
$board_config['session_length'] = ($board_config['session_length'] < 5) ? '3600' : $board_config['session_length'];

if ( empty($board_config['server_name']) )
{
	if ( !empty($HTTP_SERVER_VARS['SERVER_NAME']) || !empty($HTTP_ENV_VARS['SERVER_NAME']) )
	{
		$hostname = ( !empty($HTTP_SERVER_VARS['SERVER_NAME']) ) ? $HTTP_SERVER_VARS['SERVER_NAME'] : $HTTP_ENV_VARS['SERVER_NAME'];
	}
	else if ( !empty($HTTP_SERVER_VARS['HTTP_HOST']) || !empty($HTTP_ENV_VARS['HTTP_HOST']) )
	{
		$hostname = ( !empty($HTTP_SERVER_VARS['HTTP_HOST']) ) ? $HTTP_SERVER_VARS['HTTP_HOST'] : $HTTP_ENV_VARS['HTTP_HOST'];
	}
	else
	{
		$hostname = '';
	}
	$board_config['server_name'] = $hostname;
}

$board_config['cookie_domain'] = $board_config['server_name'] = trim($board_config['server_name']);

if ( defined('SHOUTBOX') || defined('IN_ADMIN') )
{
	if ( $check_cache = sql_cache('check', 'shoutbox_config') )
	{
		@include($check_cache);
	}
	if ( !$shoutbox_config )
	{
		$sql = "SELECT *
			FROM " . SHOUTBOX_CONFIG_TABLE;
		if ( !($result = $db->sql_query($sql)) )
		{
			message_die(CRITICAL_ERROR, 'Could not query shoutbox config information', '', __LINE__, __FILE__, $sql);
		}

		while ( $row = $db->sql_fetchrow($result) )
		{
			$shoutbox_config[$row['config_name']] = $row['config_value'];
		}
		sql_cache('write', 'shoutbox_config', $shoutbox_config);
	}
}

if ( !(defined('SHOUTBOX')) )
{
	if ( $check_cache = sql_cache('check', 'portal_config') )
	{
		@include($check_cache);
	}
	if ( !$portal_config )
	{
		$sql = "SELECT * FROM " . PORTAL_CONFIG_TABLE;
		if ( !($result = $db->sql_query($sql)) )
		{
			message_die(GENERAL_ERROR, 'Could not query portal config information', '', __LINE__, __FILE__, $sql);
		}

		while ( $row = $db->sql_fetchrow($result) )
		{
			$portal_config[$row['config_name']] = $row['config_value'];
		}
		sql_cache('write', 'portal_config', $portal_config);
	}
}

$portal_config_portal_on = $portal_config['portal_on'];
$portal_config_link_logo = $portal_config['link_logo'];
$portal_config_witch_news_forum = $portal_config['witch_news_forum'];

if ( (!(defined('PORTAL')) && !(defined('IN_ADMIN'))) || $portal_config['portal_on'] != 1 )
{
	unset($portal_config);
}

$unique_cookie_name = 'bb' . substr(md5($board_config['cookie_name'] . $board_config['script_path']), 5, 8);

if ( defined('ATTACH') || defined('IN_ADMIN') )
{
	if ( $check_cache = sql_cache('check', 'attach_config') )
	{
		@include($check_cache);
	}
	if ( !$attach_config )
	{
		$sql = "SELECT * FROM " . ATTACH_CONFIG_TABLE;
		if ( !($result = $db->sql_query($sql)) )
		{
			message_die(CRITICAL_ERROR, 'Could not query attachments config information', '', __LINE__, __FILE__, $sql);
		}
		while ( $row = $db->sql_fetchrow($result) )
		{
			$attach_config[$row['config_name']] = $row['config_value'];
		}
		sql_cache('write', 'attach_config', $attach_config);
	}
	if ( !$arrach_config['disable_mod'] || defined('IN_ADMIN'))
	{
		define('ATTACHMENTS_ON', true);
		include($phpbb_root_path . 'attach_mod/attachment_mod.'.$phpEx);
	}
}

if ( $board_config['db_backup_enable'] && isset($board_config['db_backup_time']) && $board_config['db_backup_time'] < (CR_TIME - (24 * 3600)) && !defined('IN_ADMIN') )
{
	include($phpbb_root_path . 'includes/functions_admin.'.$phpEx);
	db_backup();
}

if ( $HTTP_COOKIE_VARS[$unique_cookie_name . '_b'] == "1" )
{
	message_die(GENERAL_MESSAGE, 'You_been_banned');
}

$db->sql_freeresult($result);

?>