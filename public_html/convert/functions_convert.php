<?php
/***************************************************************************
 *                           functions_convert.php
 *                            -------------------
 *   begin                : Tuesday, Jul 02, 2002
 *   copyright            : Ludovic ARNAUD
 *   email                : ashe@mtgfrance.com
 *
 *   $Id: functions_convert.php,v 1.3.7 2002/08/25 20:00:00 Ashe Exp $
 *
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

//
// Functions to use in converters
//

function auto_id($pad=0)
{
	global $auto_id, $row;
	if (!empty($row['max_id']))
	{
		return $row['max_id'] + $pad;
	}
	return $auto_id + $pad;
}

function auto_group_id($group_id)
{
	global $row;
	return $row['max_id'] + $group_id + 1;
}

function dec($var)
{
	return --$var;
}

function days_to_seconds($days)
{
	return ($days * 86400);
}

function encode_banip($ip)
{
	$ip = str_replace('*', '', $ip);
	if (!empty($ip))
	{
		$ip = explode('.', $ip);
		$ban = '';
		for ($j = 0; $i < 4; ++$i)
		{
			if (empty($ip[$i]))
			{
				$ban .= 'ff';
			}
			else
			{
				$ban .= substr('00' . dechex($ip[$i]), -2);
			}
		}
		return $ban;
	}
}

function import_avatar($src, $trg='')
{
	if (empty($src) || preg_match('#^https?:#i', $src) || preg_match('#blank\.(gif|png)$#i', $src))
	{
		return;
	}
	global $converter, $convert_settings, $board_config, $phpbb_root_path;

	if (empty($converter['avatars_path']))
	{
		message_die(GENERAL_ERROR, "Note to developper: you must specify \$converter['avatars_path'] to use import_avatar()");
	}

	if (!preg_match('#^' . $converter['avatars_path'] . '#', $src))
	{
		$src = $converter['avatars_path'] . $src;
	}
	$trg = (!empty($trg)) ? $trg : basename($src);
	$trg = path($board_config['avatar_path']) . $trg;

	if (file_exists($phpbb_root_path . $convert_settings['path'] . $src))
	{
		copy_file($src, $trg, FALSE);
		return basename($trg);
	}
}

function import_rank($src, $trg='')
{
	if (empty($src))
	{
		return;
	}
	global $converter, $convert_settings, $phpbb_root_path;

	if (empty($converter['ranks_path']))
	{
		message_die(GENERAL_ERROR, "Note to developper: you must specify \$converter['ranks_path'] to use import_rank()");
	}

	if (!preg_match('#^' . $converter['ranks_path'] . '#', $src))
	{
		$src = $converter['ranks_path'] . $src;
	}
	$trg = (!empty($trg)) ? $trg : $src;
	$trg = 'images/ranks/' . basename($trg);

	if (file_exists($phpbb_root_path . $convert_settings['path'] . $src))
	{
		copy_file($src, $trg, FALSE);
		return $trg;
	}
}

function import_smilie($src, $trg='')
{
	global $row, $board_config, $phpbb_root_path, $converter, $src_fields, $trg_fields;

	$code = (!empty($row['code'])) ? $row['code'] : $row[$src_fields[$trg_fields['code']]];
	if (empty($src) || !is_smilie_new($code))
	{
		return;
	}

	if (empty($converter['smilies_path']))
	{
		message_die(GENERAL_ERROR, "Note to developper: you must specify \$converter['smilies_path'] to use import_smilie()");
	}

	if (!preg_match('#^' . $converter['smilies_path'] . '#', $src))
	{
		$src = $converter['smilies_path'] . $src;
	}
	$trg = (!empty($trg)) ? $trg : basename($src);
	$trg = path($board_config['smilies_path']) . $trg;

	$i = 1;
	while (file_exists($phpbb_root_path . $trg))
	{
		++$i;
		$trg = preg_replace('/([0-9]*)\.([a-z]+)$/i', $i . '.\2', $trg);
	}
	
	copy_file($src, $trg);
	return basename($trg);
}

function inc($var)
{
	return ++$var;
}

function is_forum_locked($bool)
{
	return (!empty($bool)) ? FORUM_LOCKED : FORUM_UNLOCKED;
}

function is_pm_new($bool)
{
	return (!empty($bool)) ? PRIVMSGS_NEW_MAIL : PRIVMSGS_READ_MAIL;
}

function is_pm_read($bool)
{
	return (!empty($bool)) ? PRIVMSGS_READ_MAIL : PRIVMSGS_NEW_MAIL;
}

function is_positive($n)
{
	return ($n > 0) ? 1 : 0;
}

function is_smilie_new($code)
{
	static $smilies;
	if (!isset($smilies))
	{
		global $db;
		$sql = 'SELECT code FROM ' . SMILIES_TABLE;
		if (!$result = $db->sql_query($sql))
		{
			message_die(GENERAL_ERROR, 'Could not get phpBB smilies', '', __LINE__, __FILE__, $sql);
		}

		$smilies = array();
		while ($row = $db->sql_fetchrow($result))
		{
			$smilies[$row['code']] = TRUE;
		}
	}

	if (empty($smilies[$code]) && trim($code))
	{
		return $code;
	}
	else
	{
		global $sql_flag;
		$sql_flag = FALSE;
	}
}

function is_topic_locked($bool)
{
	return (!empty($bool)) ? TOPIC_LOCKED : TOPIC_UNLOCKED;
}

function is_topic_sticky($bool)
{
	return (!empty($bool)) ? POST_STICKY : POST_NORMAL;
}

function is_user_anonymous($user_id)
{
	return ($user_id > 0) ? $user_id : -1;
}

function is_user_admin($bool)
{
	return ($bool) ? ADMIN : USER;
}

function make_smilie_name($filename)
{
	return ucfirst(preg_replace('/\.([a-z]+)$/', '', strtolower(basename($filename))));
}

function make_uid($var='')
{
	load_bbcode();
	if (empty($var) && !is_int($var))
	{
		global $auto_id;
		$var = $auto_id;
	}
	return substr(md5($var), 0, BBCODE_UID_LEN);
}

function make_uid_from_field($field_name)
{
	load_bbcode();
	if (preg_match('/\.([a-z0-9\-_]+)$/i', $field_name, $m))
	{
		$field_name = $m[1];
	}
	global $row;
	return substr(md5($row[$field_name]), 0, BBCODE_UID_LEN);
}

function mimetype($filename)
{
	if (!preg_match('/\.([a-z0-9]+)$/i', $filename, $m))
	{
		return 'application/octet-stream';
	}
	switch (strtolower($m[1]))
	{
		case 'zip':		return 'application/zip';
		case 'jpeg':	return 'image/jpeg';
		case 'jpg':		return 'image/jpeg';
		case 'jpe':		return 'image/jpeg';
		case 'png':		return 'image/png';
		case 'gif':		return 'image/gif';
		case 'htm':
		case 'html':	return 'text/html';
		case 'tif':		return 'image/tiff';
		case 'tiff':	return 'image/tiff';
		case 'ras':		return 'image/x-cmu-raster';
		case 'pnm':		return 'image/x-portable-anymap';
		case 'pbm':		return 'image/x-portable-bitmap';
		case 'pgm':		return 'image/x-portable-graymap';
		case 'ppm':		return 'image/x-portable-pixmap';
		case 'rgb':		return 'image/x-rgb';
		case 'xbm':		return 'image/x-xbitmap';
		case 'xpm':		return 'image/x-xpixmap';
		case 'xwd':		return 'image/x-xwindowdump';
		case 'z':		return 'application/x-compress';
		case 'gtar':	return 'application/x-gtar';
		case 'tgz':		return 'application/x-gtar';
		case 'gz':		return 'application/x-gzip';
		case 'tar':		return 'application/x-tar';
		case 'xls':		return 'application/excel';
		case 'pdf':		return 'application/pdf';
		case 'ppt':		return 'application/powerpoint';
		case 'rm':		return 'application/vnd.rn-realmedia';
		case 'wma':		return 'audio/x-ms-wma';
		case 'swf':		return 'application/x-shockwave-flash';
		case 'ief':		return 'image/ief';
		case 'doc':
		case 'dot':
		case 'wrd':		return 'application/msword';
		case 'ai':
		case 'eps':
		case 'ps':		return 'application/postscript';
		case 'asc':
		case 'txt':
		case 'c':
		case 'cc':
		case 'h':
		case 'hh':
		case 'cpp':
		case 'hpp':
		case 'php':
		case 'php3':	return 'text/plain';
		default: 		return 'application/octet-stream';
	}
}

function not($var)
{
	return ($var) ? 0 : 1;
}

function str_to_bool($str)
{
	$str = strtolower($str);
	return ($str == 'yes' || $str == 'on' || $str == 'y') ? TRUE : FALSE;
}

function str_to_userlevel($status)
{
	switch (ucfirst(strtolower($status)))
	{
		case 'Administrator':
		return ADMIN;

		case 'Super moderator':
		case 'Global moderator':
		case 'Moderator':
		return MOD;

		case 'Guest':
		case 'Anonymous':
		return ANONYMOUS;

		case 'Deleted':
		return DELETED;

		default:
		return USER;
	}
}

function validate_aim($aim)
{
	return $aim;
}

function validate_email($email)
{
//	return (preg_match('/[0-9a-z\.\-_]+@[0-9a-z\.\-]+\.([a-z]{2,6})/i', $email)) ? $email : '';
	return $email;
}

function validate_icq($icq)
{
	return (preg_match('/^[0-9]+$/', $icq) && ($icq > 1000)) ? $icq : '';
}

function validate_msnm($msnm)
{
	return $msnm;
}

function validate_website($url)
{
	return ($url == 'http://') ? '' : $url;
}

//
// Script-specific functions
//

function check_avatar_gallery($gallery_name, $die_on_failure=FALSE)
{
	global $lang, $phpbb_root_path, $board_config;

	if (!is_writeable($phpbb_root_path . path($board_config['avatar_gallery_path']) . $gallery_name . '/'))
	{
		if ($die_on_failure)
		{
			message_die(GENERAL_ERROR, sprintf($lang['Make_folder_writable'], path($board_config['script_path']) . path($board_config['avatar_gallery_path']) . $gallery_name . '/'));
		}
		return;
	}
	return TRUE;
}

function convert_bbcode($message, $convert_size=TRUE, $extended_bbcodes=FALSE)
{
	static $orig, $repl, $origx, $replx, $str_from, $str_to;

	if (empty($orig))
	{
		$orig = $repl = array();

		$orig[] = '#\[(php|sql)\](.*?)\[/(php|sql)\]#is';
		$repl[] = '[code]\2[/code]';

		$orig[] = '#\[font=[^\]]+\](.*?)\[/font\]#is';
		$repl[] = '\1';

		$orig[] = '#\[align=[a-z]+\](.*?)\[/align\]#is';
		$repl[] = '\1';

		$orig[] = '#\[/list=.*?\]#is';
		$repl[] = '[/list]';

		$origx = array(
			'#\[glow[^\]]+\](.*?)\[/glow\]#is',
			'#\[shadow[^\]]+\](.*?)\[/shadow\]#is',
			'#\[flash[^\]]+\](.*?)\[/flash\]#is'
		);
		$replx = array(
			'\1',
			'\1',
			'[url=\1]Flash[/url]'
		);

		$str_from = array(
			'[ftp]',	'[/ftp]',
			'[ftp=',	'[/ftp]',
			'[pre]',	'[/pre]',
			'[table]',	'[/table]',
			'[td]',		'[/td]',
			'[tr]',		'[/tr]',
			'[s]',		'[/s]',
			'[left]',	'[/left]',
			'[right]',	'[/right]',
			'[center]',	'[/center]',
			'[sub]',	'[/sub]',
			'[sup]',	'[/sup]',
			'[tt]',		'[/tt]',
			'[move]',	'[/move]',
			'[hr]'
		);

		$str_to = array(
			'[url]',	'[/url]',
			'[url=',	'[/url]',
			'[code]',	'[/code]',
			"\n",		'',
			'',			'',
			"\n",		'',
			'',			'',
			'',			'',
			'',			'',
			'',			'',
			'',			'',
			'',			'',
			'',			'',
			'',			'',
			"\n\n"
		);
		for ($i = 0; $i < count($str_from); ++$i)
		{
			$origx[] = '#\\' . str_replace(']', '\\]', $str_from[$i]) . '#is';
			$replx[] = $str_to[$i];
		}
	}

	if (preg_match_all('#\[email=([^\]]+)\](.*?)\[/email\]#i', $message, $m))
	{
		for ($i = 0; $i < count($m[1]); ++$i)
		{
			if ($m[1][$i] == $m[2][$i])
			{
				$message = str_replace($m[0][$i], '[email]' . $m[1][$i] . '[/email]', $message);
			}
			else
			{
				$message = str_replace($m[0][$i], $m[2][$i] . ' ([email]' . $m[1][$i] . '[/email])', $message);
			}
		}
	}

	if ($convert_size && preg_match('#\[size=[0-9]+\].*?\[/size\]#i', $message))
	{
		$size = array(9, 9, 12, 15, 18, 24, 29, 29, 29, 29);
		$message = preg_replace('#\[size=([0-9]+)\](.*?)\[/size\]#i', '[size=\1]\2[/size]', $message);
		$message = preg_replace('#\[size=[0-9]{2,}\](.*?)\[/size\]#i', '[size=29]\1[/size]', $message);

		for ($i = count($size); $i; )
		{
			--$i;
			$message = str_replace('[size=' . $i . ']', '[size=' . $size[$i] . ']', $message);
		}
	}

	if ($extended_bbcodes)
	{
/*
		if (phpversion() >= '4.0.0')
		{
			$message = str_replace($str_from, $str_to, $message);
		}
		else
		{
			for ($i = 0; $i < count($str_from); ++$i)
			{
				$message = str_replace($str_from[$i], $str_to[$i], $message);
			}
		}
*/

		$message = preg_replace($origx, $replx, $message);
	}

	$message = preg_replace($orig, $repl, $message);
	return $message;
}

function copy_file($src, $trg, $overwrite=FALSE, $die_on_failure=TRUE)
{
	global $board_config, $phpbb_root_path, $convert_settings;

	if (empty($convert_settings['path']))
	{
		message_die(GENERAL_ERROR, 'The relative path to the source forum has not been specified');
	}

	if (substr($trg, -1) == '/')
	{
		$trg .= basename($src);
	}
	$src_path = $phpbb_root_path . $convert_settings['path'] . $src;
	$trg_path = $phpbb_root_path . $trg;

	if (!$overwrite && @file_exists($trg_path))
	{
		return TRUE;
	}
	if (!@file_exists($src_path))
	{
/*
		if ($die_on_failure)
		{
			global $lang;
			message_die(GENERAL_ERROR, sprintf($lang['File_not_found'], $convert_settings['path'] . $src));			
		}
*/
		return;
	}

	$path = $phpbb_root_path;
	$parts = explode('/', $trg);
	unset($parts[count($parts) - 1]);
	for ($i = 0; $i < count($parts); ++$i)
	{
		$path .= $parts[$i] . '/';
		if (!is_dir($path))
		{
			@mkdir($path, 0777);
		}
	}
	if (!is_writable($path))
	{
		@chmod($path, 0777);
	}
	if (!@copy($src_path, $trg_path))
	{
		if ($die_on_failure)
		{
			global $lang;
			message_die(GENERAL_ERROR, sprintf($lang['Could_not_copy'], $convert_settings['path'] . $src, path($board_config['script_path']) . $trg));			
		}
		return;
	}
	if ($perm = @fileperms($src_path))
	{
		@chmod($trg_path, $perm);
	}
	return TRUE;
}

function copy_dir($src, $trg, $copy_subdirs=TRUE, $overwrite=FALSE, $die_on_failure=TRUE)
{
	global $phpbb_root_path, $convert_settings, $lang, $return_convert, $board_config;
	if (empty($convert_settings['path']))
	{
		message_die(GENERAL_ERROR, 'The relative path to the source forum has not been specified' . $return_convert);
	}

	$dirlist = $filelist = $bad_dirs = array();
	$src = path($src);
	$trg = path($trg);
	$src_path = $phpbb_root_path . $convert_settings['path'] . $src;
	$trg_path = $phpbb_root_path . $trg;

	if (!is_dir($trg_path))
	{
		@mkdir($trg_path, 0777);
		@chmod($trg_path, 0777);
	}
	if (!is_writeable($trg_path))
	{
		$bad_dirs[] = path($board_config['script_path']) . $trg;
	}

	if ($handle = @opendir($src_path))
	{
		while ($entry = readdir($handle))
		{
			if ($entry[0] == '.')
			{
				continue;
			}
			if (is_dir($src_path . $entry))
			{
				$dirlist[] = $entry;
			}
			else
			{
				$filelist[] = $entry;
			}
		}
		closedir($handle);
	}
	elseif ($dir = @dir($src_path))
	{
		while ($entry = $dir->read())
		{
			if (substr($entry, 0, 1) == '.')
			{
				continue;
			}
			if (is_dir($src_path . $entry))
			{
				$dirlist[] = $entry;
			}
			else
			{
				$filelist[] = $entry;
			}
		}
		$dir->close();
	}
	else
	{
		message_die(GENERAL_ERROR, sprintf($lang['Could_not_read'] . $return_convert, $convert_settings['path'] . $src));
	}

	if ($copy_subdirs)
	{
		for ($i = 0; $i < count($dirlist); ++$i)
		{
			$dir = $dirlist[$i];
			if (!is_dir($trg_path . $dir))
			{
				@mkdir($trg_path . $dir, 0777);
				@chmod($trg_path . $dir, 0777);
			}
			if (!is_writeable($trg_path . $dir))
			{
				$bad_dirs[] = path($board_config['script_path']) . $trg . $dir;
				$bad_dirs[] = $trg_path . $dir;
			}
			if (!count($bad_dirs))
			{
				copy_dir($src . $dir, $trg . $dir, TRUE, $overwrite, $die_on_failure);
			}
		}
	}

	if (count($bad_dirs))
	{
		$str = (count($bad_dirs) == 1) ? $lang['Make_folder_writable'] : $lang['Make_folders_writable'];
		sort($bad_dirs);
		message_die(GENERAL_ERROR, sprintf($str, implode('<br />', $bad_dirs)) . $return_convert);
	}

	for ($i = 0; $i < count($filelist); ++$i)
	{
		copy_file($src . $filelist[$i], $trg . $filelist[$i], $overwrite, $die_on_failure);
	}
}

function get_config_value($config_name)
{
	static $config;
	if (!isset($config))
	{
		$config = get_config();
	}
	return (empty($config[$config_name])) ? '' : $config[$config_name];
}

function minutes_to_hours($minutes)
{
	return ($minutes / 3600);
}

function import_avatar_gallery($gallery_name)
{
	global $board_config, $converter, $convert_settings, $phpbb_root_path;

	if (empty($converter['avatars_path']))
	{
		message_die(GENERAL_ERROR, "Note to developper: you must specify \$converter['avatars_path'] to use import_avatar_gallery()");
	}

	if (is_dir($phpbb_root_path . $convert_settings['path'] . path($converter['avatars_path'])))
	{
		copy_dir($converter['avatars_path'], path($board_config['avatar_gallery_path']) . $gallery_name);
	}
	@unlink($phpbb_root_path . path($board_config['avatar_gallery_path']) . $gallery_name . '/blank.gif');
}

function make_unique_filename($filename)
{
	if (!strlen($filename))
	{
		$filename = make_uid() . '.dat';
	}
	elseif ($filename[0] == '.')
	{
		$filename = make_uid() . $filename;
	}
	elseif (preg_match('/\.([a-z]+)$/i', $filename, $m))
	{
		$filename = preg_replace('/\.([a-z]+)$/i', '_' . make_uid() . '.\1', $filename);
	}
	else
	{
		$filename .= '_' . make_uid() . '.dat';
	}
	return $filename;
}

function mass_auth($forum_id, $type, $list, $auth_fields, $separator=',')
{
	if (is_array($forum_id))
	{
		while (list(, $id) = each($forum_id))
		{
			mass_auth($id, $type, $list, $auth_fields, $separator);
		}
		return;
	}
	if (!is_array($list))
	{
		$elements = explode($separator, $list);
	}
	else
	{
		$elements = $list;
	}

	$list = array();
	while (list(, $element) = each($elements))
	{
		if ($element = trim($element))
		{
			$list[$element] = sql_addslashes($element);
		}
	}
	if (!count($list))
	{
		return;
	}

	if (!preg_match_all('/auth_([a-z]+)/', strtolower($auth_fields), $m))
	{
		message_die(GENERAL_ERROR, "Invalid auth fields: $auth_fields");
	}

	global $db;
	$auth_fields = $user_ids = $insert_group_ids = $update_group_ids = $rows = array();

	$extra = ', auth_mod';
	for ($i = 0; $i < count($m[1]); ++$i)
	{
		if ($m[1][$i] == 'mod')
		{
			$extra = '';
			$auth_fields = array('auth_mod');
			break;
		}
		$auth_fields[] = 'auth_' . $m[1][$i];
	}

	if ($type == 'username' || $type == 'user_id')
	{
		$sql = 'SELECT u.user_id, u.user_level, g.group_id, aa.' . implode(', aa.', $auth_fields) . $extra
			. ' FROM ' . USERS_TABLE . ' u, ' . GROUPS_TABLE . ' g, ' . USER_GROUP_TABLE . ' ug'
			. ' LEFT JOIN ' . AUTH_ACCESS_TABLE . ' aa ON aa.group_id = ug.group_id AND aa.forum_id = ' . $forum_id
			. ' WHERE u.' . $type . " IN ('" . implode("', '", $list) . "')"
			.	' AND u.user_id = ug.user_id AND ug.group_id = g.group_id AND g.group_single_user  = 1';
	}
	elseif ($type == 'group_name' || $type == 'group_id')
	{
		$sql = 'SELECT g.group_id, aa.' . implode(', aa.', $auth_fields) . $extra
			. ' FROM ' . GROUPS_TABLE . ' g'
			. ' LEFT JOIN ' . AUTH_ACCESS_TABLE . ' aa ON aa.group_id = g.group_id AND aa.forum_id = ' . $forum_id
			. ' WHERE g.' . $type . " IN ('" . implode("', '", $list) . "')"
			.	' AND g.group_single_user = 0';
	}
	else
	{
		message_die(GENERAL_ERROR, "Unknown mode $type");
	}
	if (!$result = $db->sql_query($sql))
	{
		message_die(GENERAL_ERROR, 'Could not get moderators list', '', __LINE__, __FILE__, $sql);
	}

	while ($row = $db->sql_fetchrow($result))
	{
		if ($auth_fields[0] == 'auth_mod' && ($type == 'username' || $type == 'user_id'))
		{
			if ($row['user_level'] == USER)
			{
				$user_ids[] = $row['user_id'];
			}
		}

		if ($row['auth_mod'])
		{
			continue;
		}

		for ($i = 0; $i < count($auth_fields); ++$i)
		{
			if ($row[$auth_fields[$i]] == NULL)
			{
				$insert_group_ids[] = $row['group_id'];
				break;
			}
			elseif ($row[$auth_fields[$i]] == 0 )
			{
				$update_group_ids[] = $row['group_id'];
				break;
			}
		}
	}

	if (count($user_ids))
	{
		$sql = 'UPDATE ' . USERS_TABLE . ' SET user_level = ' . MOD
			. ' WHERE user_id IN (' . implode(', ', $user_ids) . ')';

		if (!$db->sql_query($sql))
		{
			message_die(GENERAL_ERROR, 'Could not set moderator level');
		}
	}

	while (list(, $group_id) = each($insert_group_ids))
	{
		switch (SQL_LAYER)
		{
			case 'mysql':
			case 'mysql4':
				$rows[] = "($group_id, $forum_id, " . str_repeat('1, ', count($auth_fields) - 1) . '1)';
			break;
		
			default:
				$sql = 'INSERT INTO ' . AUTH_ACCESS_TABLE . ' (group_id, forum_id, ' . implode(', ', $auth_fields) . ')'
					. " VALUES ($group_id, $forum_id, " . str_repeat('1, ', count($auth_fields) - 1) . '1)';
				if (!$db->sql_query($sql))
				{
					message_die(GENERAL_ERROR, 'Could not insert new auth access', '', __LINE__, __FILE__, $sql);
				}
		}
	}

	if (count($rows))
	{
		$sql = 'INSERT INTO ' . AUTH_ACCESS_TABLE . ' (group_id, forum_id, ' . implode(', ', $auth_fields) . ')'
			. ' VALUES ' . implode(', ', $rows);
		if (!$db->sql_query($sql))
		{
			message_die(GENERAL_ERROR, 'Could not insert new auth access', '', __LINE__, __FILE__, $sql);
		}
	}

	while (list(, $group_id) = each($update_group_ids))
	{
		if ($auth_fields[0] == 'auth_mod')
		{
			$sql = 'UPDATE ' . AUTH_ACCESS_TABLE
				. ' SET auth_view = 1, auth_read = 1, auth_post = 1, auth_reply = 1, auth_edit = 1, auth_delete = 1, auth_sticky = 0, auth_announce = 0, auth_pollcreate = 1, auth_vote = 1, auth_attachments = 1, auth_mod = 1'
				. ' WHERE group_id = ' . $group_id . ' AND forum_id = ' . $forum_id;
		}
		else
		{
			$sql = 'UPDATE ' . AUTH_ACCESS_TABLE . ' SET ' . implode(' = 1, ', $auth_fields) . ' = 1'
				. ' WHERE group_id = ' . $group_id . ' AND forum_id = ' . $forum_id;
		}

		if (!$db->sql_query($sql))
		{
			message_die(GENERAL_ERROR, 'Could not update auth access table', '', __LINE__, __FILE__, $sql);
		}
	}
}

function path($path)
{
	if (substr($path, -1) != '/')
	{
		$path .= '/';
	}
	if (substr($path, 0, 1) == '/')
	{
		$path = substr($path, 1);
	}
	return $path;
}

function restore_voters($poll_id, $type, $voters, $separator=',')
{
	$voters = explode($separator, $voters);
	$users = $user_ids = array();
	for ($i = 0; $i < count($voters); ++$i)
	{
		if ($user = trim(stripslashes($voters[$i])))
		{
			$users[] = sql_addslashes($user);
		}
	}

	if (empty($poll_id) || !count($users))
	{
		return;
	}

	global $db;
	switch ($type)
	{
		case 'user_id':
			$where = $type . ' IN (' . implode(', ', $users) . ')';
		break;

		case 'username':
			$where = $type . " IN ('" . implode("', '", $users) . "')";
		break;

		default:
			message_die(GENERAL_ERROR, 'Error in restore_voters() - $type must by either "user_id" or "username"');
	}

	$sql = 'INSERT INTO ' . VOTE_USERS_TABLE . ' (vote_id, vote_user_id)'
		. " SELECT $poll_id, user_id FROM " . USERS_TABLE
		. ' WHERE ' . $where;
	if (!$result = $db->sql_query($sql))
	{
		message_die(GENERAL_ERROR, 'Could not insert voters', '', __LINE__, __FILE__, $sql);
	}
}

function resynch($mode)
{
	global $db;

	switch ($mode)
	{
		case 'user_level':
			$sql = 'SELECT DISTINCT ug.user_id FROM ' . AUTH_ACCESS_TABLE . ' aa, ' . GROUPS_TABLE . ' g, ' . USER_GROUP_TABLE . ' ug'
				. ' WHERE aa.auth_mod = 1 AND aa.group_id = g.group_id AND ug.group_id = g.group_id';
			
			if (!$result = $db->sql_query($sql))
			{
				message_die(GENERAL_ERROR, 'Could not resynch moderators level', '', __LINE__, __FILE__, $sql);
			}
			$user_ids = array();
			while ($row = $db->sql_fetchrow($result))
			{
				$user_ids[] = $row['user_id'];
			}
			if (count($user_ids))
			{
				$sql = 'UPDATE ' . USERS_TABLE . ' SET user_level = ' . MOD
					. ' WHERE user_id IN (' . implode(', ', $user_ids) . ') AND user_level = ' . USER;

				$db->sql_query($sql);
			}
		break;

		case 'forums':
			$forum_data = array();

			$sql = 'SELECT f.forum_id, COUNT(t.topic_id) AS total_topics'
				. ' FROM ' . FORUMS_TABLE . ' f, ' . TOPICS_TABLE . ' t'
				. ' GROUP BY f.forum_id';
			$result = $db->sql_query($sql);
			$rowset = $db->sql_fetchrowset($result);

			$sql = 'SELECT COUNT(p.post_id) AS total_posts, MAX(p.post_id) AS last_post_id, f.forum_id, f.forum_posts, f.forum_topics, f.forum_last_post_id'
				. ' FROM ' . FORUMS_TABLE . ' f, ' . POSTS_TABLE . ' p'
				. ' GROUP BY f.forum_id';

/*
			$sql = 'SELECT COUNT(DISTINCT p.post_id) AS total_posts, COUNT(DISTINCT t.topic_id) AS total_topics, MAX(p.post_id) AS last_post_id, f.forum_id, f.forum_posts, f.forum_topics, f.forum_last_post_id'
				. ' FROM ' . FORUMS_TABLE . ' f'
				. ' LEFT JOIN ' . TOPICS_TABLE . ' t USING (forum_id)'
				. ' LEFT JOIN ' . POSTS_TABLE . ' p USING (forum_id)'
				. ' GROUP BY f.forum_id';
*/

			if (!$result = $db->sql_query($sql))
			{
				message_die(GENERAL_ERROR, 'Could not resynch forums', '', __LINE__, __FILE__, $sql);
			}
			while ($row = $db->sql_fetchrow($result))
			{
				$topics = (empty($rowset['total_topics'])) ? 0 : $rowset['total_topics'];
				$posts = (empty($row['total_posts'])) ? 0 : $row['total_posts'];
				$last_post_id = (empty($row['last_post_id'])) ? 0 : $row['last_post_id'];

				if ($topics != $row['forum_topics']
				 || $posts != $row['forum_posts']
				 || $last_post_id != $row['forum_last_post_id'])
				{
					$sql = 'UPDATE ' . FORUMS_TABLE
						. " SET forum_posts = $posts, forum_topics = $topics, forum_last_post_id = $last_post_id"
						. ' WHERE forum_id = ' . $row['forum_id'];

					$db->sql_query($sql);
				}
			}
		break;

		case 'topics':
			$sql = 'SELECT t.topic_replies, t.topic_first_post_id, t.topic_last_post_id, COUNT(DISTINCT p.post_id) - 1 AS total_replies, MIN(p.post_id) AS first_post_id, MAX(p.post_id) AS last_post_id'
				. ' FROM ' . TOPICS_TABLE . ' t'
				. ' LEFT JOIN ' . POSTS_TABLE . ' p USING (topic_id)'
				. ' GROUP BY t.topic_id';

			if (!$result = $db->sql_query($sql))
			{
				message_die(GENERAL_ERROR, 'Could not resynch topics', '', __LINE__, __FILE__, $sql);
			}
			while ($row = $db->sql_fetchrow($result))
			{
				if ($row['total_replies'] != $row['topic_replies']
				 || $row['first_post_id'] != $row['topic_first_post_id']
				 || $row['last_post_id'] != $row['topic_last_post_id'])
				{
					$replies = (empty($row['total_replies'])) ? 0 : $row['total_replies'];
					$first_post_id = (empty($row['first_post_id'])) ? 0 : $row['first_post_id'];
					$last_post_id = (empty($row['last_post_id'])) ? 0 : $row['last_post_id'];

					$sql = 'UPDATE ' . TOPICS_TABLE
						. " SET topic_replies = $replies, topic_first_post_id = $first_post_id, topic_last_post_id = $last_post_id"
						. ' WHERE topic_id = ' . $row['topic_id'];

					$db->sql_query($sql);
				}
			}
		break;
	
		default:
			message_die(GENERAL_ERROR, "Unknown resynch mode $mode");
	}
}

function save_config($config_name, $config_value)
{
	global $db, $board_config;
	if (is_array($config_value))
	{
		$config_value = serialize($config_value);
	}
	if (($config_name != $board_config['default_lang']) && ($board_config[$config_name] == $config_value))
	{
		return;
	}

	if (isset($board_config[$config_name]))
	{
		$sql = 'UPDATE '.CONFIG_TABLE
			. " SET config_value = '" . sql_addslashes($config_value) . "'"
			. " WHERE config_name = '$config_name'";
	}
	else
	{
		$sql = 'INSERT INTO '.CONFIG_TABLE.' (config_name, config_value)'
			. " VALUES ('$config_name', '" . sql_addslashes($config_value) . "')";
	}
	if (!$db->sql_query($sql))
	{
		message_die(GENERAL_ERROR, 'Could not update config table', '', __FILE__, __LINE__, $sql);
	}

	$board_config[$config_name] = $config_value;
}

function set_moderator($user_id, $group_id, $forum_id, $update_users_table=TRUE, $force_insert=FALSE)
{
	if ($user_id == -1)
	{
		return;
	}

	global $db;
	if (!$force_insert)
	{
		$sql = 'UPDATE ' . AUTH_ACCESS_TABLE
			. ' SET auth_mod = 1'
			. " WHERE group_id = $group_id AND forum_id = $forum_id";
		if (!$result = $db->sql_query($sql))
		{
			message_die(GENERAL_ERROR, 'Could not update auth table. (set_moderator())', '', __LINE__, __FILE__, $sql);
		}
		if (!$db->sql_numrows($result))
		{
			$force_insert = TRUE;
		}
	}
	if ($force_insert)
	{
		$sql = 'INSERT INTO ' . AUTH_ACCESS_TABLE . ' (group_id, forum_id, auth_mod)'
			. " VALUES ($group_id, $forum_id, 1)";
		if (!$db->sql_query($sql))
		{
			message_die(GENERAL_ERROR, 'Could not insert user into auth table. (set_moderator())', '', __LINE__, __FILE__, $sql);
		}
	}
	if ($update_users_table)
	{
		$sql = 'UPDATE ' . USERS_TABLE . ' SET user_level = ' . MOD
			. " WHERE user_id = $user_id AND user_level = " . USER;
		if (!$db->sql_query($sql))
		{
			message_die(GENERAL_ERROR, 'Could not set moderator user level.', '', __LINE__, __FILE__, $sql);
		}
	}
}


//
// Functions used by the main script
//

function compare_table($tables, $tablename, &$prefixes)
{
	for ($i = 0; $i < count($tables); ++$i)
	{
		if (preg_match('/(.*)' . $tables[$i] . '$/', $tablename, $m))
		{
			if (empty($m[1]))
			{
				$m[1] = '*';
			}
			if (isset($prefixes[$m[1]]))
			{
				++$prefixes[$m[1]];
			}
			else
			{
				$prefixes[$m[1]] = 1;
			}
		}
	}
}

function extract_variables_from_file($_filename)
{
	include($_filename);
	$vars = get_defined_vars();
	unset($vars['_filename']);
	return $vars;
}

function fix_ghost_forums()
{
	global $db;
	$result = $db->sql_query('SELECT COUNT(*) AS total FROM ' . CATEGORIES_TABLE);
	$row = $db->sql_fetchrow($result);

	if (!$row['total'])
	{
		global $lang;

		$sql = 'INSERT INTO ' . CATEGORIES_TABLE . ' (cat_id, cat_title)'
			. ' VALUES (1, "' . $lang['Default_category'] . '")';
		if (!$db->sql_query($sql))
		{
			message_die(GENERAL_ERROR, 'Could not create default category', '', __LINE__, __FILE__, $sql);
		}
	}

	$sql = 'SELECT f.cat_id, c.cat_id AS cat_exists FROM ' . FORUMS_TABLE . ' f'
		. ' LEFT JOIN ' . CATEGORIES_TABLE . ' AS c ON f.cat_id = c.cat_id';

	if (!$result = $db->sql_query($sql))
	{
		message_die(GENERAL_ERROR, 'Could not get forums list', '', __LINE__, __FILE__, $sql);
	}

	$cat_ids = array();
	while ($row = $db->sql_fetchrow($result))
	{
		if (empty($row['cat_exists']))
		{
			$cat_ids[$row['cat_id']] = $row['cat_id'];
		}
	}

	if (count($cat_ids))
	{
		$result = $db->sql_query('SELECT MIN(cat_id) AS cat_id FROM ' . CATEGORIES_TABLE);
		$row = $db->sql_fetchrow($result);
		
		$sql = 'UPDATE ' . FORUMS_TABLE . ' SET cat_id = ' . $row['cat_id']
			. ' WHERE cat_id IN (' . implode(', ', $cat_ids) . ')';
		$db->sql_query($sql);
	}
}

function get_config()
{
	static $config;
	if (isset($config))
	{
		return $config;
	}

	global $db, $src_table_prefix, $convert_settings, $config_schema, $phpbb_root_path;

	if ($config_schema['table_format'] != 'file')
	{
		$sql = 'SELECT * FROM ' . $src_table_prefix . $config_schema['table_name'];
		if (!($result = $db->sql_query($sql)) || !($row = $db->sql_fetchrow($result)))
		{
			message_die(GENERAL_ERROR, 'Could not retrieve your forum configuration', '', __LINE__, __FILE__, $sql);
		}
	}

	if (is_array($config_schema['table_format']))
	{
		$config = array();
		list($key, $val) = each($config_schema['table_format']);

		do
		{
			$config[$row[$key]] = $row[$val];
		}
		while ($row = $db->sql_fetchrow($result));
	}
	elseif ($config_schema['table_format'] == 'file')
	{
		$filename = $phpbb_root_path . $convert_settings['path'] . $config_schema['filename'];
		if (!file_exists($filename))
		{
			global $lang;
			message_die(GENERAL_ERROR, sprintf($lang['File_not_found'], $filename));
		}

		$config = extract_variables_from_file($filename);
		if (!empty($config_schema['array_name']))
		{
			$config = $config[$config_schema['array_name']];
		}
	}
	else
	{
		$config = $row;
	}

	if (!count($config))
	{
		message_die(GENERAL_ERROR, 'Config_table_empty');
	}
	return $config;
}

function get_path($src_path, $src_url, $test_file)
{
	global $board_config, $phpbb_root_path, $phpEx;

	$test_file = preg_replace('/\.php$/i', ".$phpEx", $test_file);
	$src_path = path($src_path);

	if (@file_exists($phpbb_root_path . $src_path . $test_file))
	{
		return $src_path;
	}

	if (!empty($src_url) && !empty($board_config['server_name']))
	{
		if (!preg_match('#https?://([^/]+)(.*)#i', $src_url, $m))
		{
			return FALSE;
		}

		if ($m[1] != $board_config['server_name'])
		{
			return FALSE;
		}

		$url_parts = explode('/', $m[2]);
		if (substr($src_url, -1) != '/')
		{
			if (preg_match('/.*\.([a-z0-9]{3,4})$/i', $url_parts[count($url_parts) - 1]))
			{
				$url_parts[count($url_parts) - 1] = '';
			}
			else
			{
				$url_parts[] = '';
			}
		}

		$script_path = $board_config['script_path'];
		if (substr($script_path, -1) == '/')
		{
			$script_path = substr($script_path, 0, -1);
		}

		$path_array = array();
		$phpbb_parts = explode('/', $script_path);
		for ($i = 0; $i < count($url_parts); ++$i)
		{
			if (($i < count($phpbb_parts[$i])) && ($url_parts[$i] == $phpbb_parts[$i]))
			{
				$path_array[] = $url_parts[$i];
				unset($url_parts[$i]);
			}
			else
			{
				$path = '';
				for ($j = $i; $j < count($phpbb_parts); ++$j)
				{
					$path .= '../';
				}
				$path .= implode('/', $url_parts);
				break;
			}
		}

		if (!empty($path))
		{
			if (@file_exists($phpbb_root_path . $path . $test_file))
			{
				return $path;
			}
		}
	}

	return FALSE;
}

function load_bbcode()
{
	if (!defined('BBCODE_UID_LEN'))
	{
		global $phpbb_root_path, $phpEx, $html_entities_match, $html_entities_replace;
		include($phpbb_root_path . 'includes/bbcode.' . $phpEx);
		include($phpbb_root_path . 'includes/functions_post.' . $phpEx);
	}
}

function meta_refresh($url, $delay=0)
{
	global $template, $debug;
	if (!empty($debug))
	{
		echo '<br /><a href="' . append_sid($url) . '">Next step</a><br /><br />';
		return;
	}
	$template->assign_vars(array(
		'META' => '<meta http-equiv="refresh" content="' . $delay . ';url=' . append_sid($url) . '">'
	));
}

function restore_config($schema)
{
	global $db;
	$config = get_config();

	while (list($config_name, $src) = each($schema['settings']))
	{
		if (preg_match('/(.*)\((.*)\)/', $src, $m))
		{
			$var = (empty($m[2])) ? '' : "'" . addslashes($config[$m[2]]) . "'";
			$exec = '$config_value = ' . $m[1] . '(' . $var . ');';
			eval($exec);
		}
		else
		{
			$config_value = $config[$src];
		}
		$sql = 'UPDATE '.CONFIG_TABLE
			. ' SET config_value = "' . addslashes($config_value) . '"'
			. ' WHERE config_name = "' . $config_name . '"';

		if (!$db->sql_query($sql))
		{
			message_die(GENERAL_ERROR, 'Could not update config table', '', __LINE__, __FILE__, $sql);
		}
	}
}

function sql_addslashes($txt)
{
	$txt = addslashes($txt);
	return str_replace("\\'", "''", $txt);
}

function still_on_time()
{
	static $max_execution_time, $start_time;
	$time = explode(' ', microtime());
	$current_time = $time[0] + $time[1];

	if (empty($max_execution_time))
	{
		$max_execution_time = (function_exists('ini_get')) ? ini_get('max_execution_time') : get_cfg_var('max_execution_time');
		$max_execution_time = min(max(10, $max_execution_time), 30);

//		if (!empty($GLOBALS['debug']))
//		{
//			$max_execution_time = 2;
//		}

		global $starttime;
		$start_time = (empty($starttime)) ? $current_time : $starttime;
	}
	return (ceil($current_time - $start_time) < $max_execution_time) ? TRUE : FALSE;
}

function words_unique(&$words)
{
	reset($words);
	$return_array = array();

	$word = current($words);
	do
	{
		$return_array[$word] = $word;
	}
	while ($word = next($words));
	return $return_array;
}

//
// Welcome to hell
//
function get_field_type($field_name)
{
	static $fields_type = array(
		'auth_announce'				=>	'int',
		'auth_attachments'			=>	'int',
		'auth_delete'				=>	'int',
		'auth_edit'					=>	'int',
		'auth_mod'					=>	'int',
		'auth_pollcreate'			=>	'int',
		'auth_post'					=>	'int',
		'auth_read'					=>	'int',
		'auth_reply'				=>	'int',
		'auth_sticky'				=>	'int',
		'auth_view'					=>	'int',
		'auth_vote'					=>	'int',
		'ban_id'					=>	'int',
		'ban_userid'				=>	'int',
		'cat_id'					=>	'int',
		'cat_order'					=>	'int',
		'disallow_id'				=>	'int',
		'enable_bbcode'				=>	'int',
		'enable_html'				=>	'int',
		'enable_sig'				=>	'int',
		'enable_smilies'			=>	'int',
		'forum_id'					=>	'int',
		'forum_last_post_id'		=>	'int',
		'forum_order'				=>	'int',
		'forum_posts'				=>	'int',
		'forum_status'				=>	'int',
		'forum_topics'				=>	'int',
		'group_id'					=>	'int',
		'group_moderator'			=>	'int',
		'group_single_user'			=>	'int',
		'group_type'				=>	'int',
		'notify_status'				=>	'int',
		'post_edit_count'			=>	'int',
		'post_edit_time'			=>	'int',
		'post_id'					=>	'int',
		'post_time'					=>	'int',
		'poster_id'					=>	'int',
		'privmsgs_attach_sig'		=>	'int',
		'privmsgs_date'				=>	'int',
		'privmsgs_enable_bbcode'	=>	'int',
		'privmsgs_enable_html'		=>	'int',
		'privmsgs_enable_smilies'	=>	'int',
		'privmsgs_from_userid'		=>	'int',
		'privmsgs_id'				=>	'int',
		'privmsgs_text_id'			=>	'int',
		'privmsgs_to_userid'		=>	'int',
		'privmsgs_type'				=>	'int',
		'prune_days'				=>	'int',
		'prune_enable'				=>	'int',
		'prune_freq'				=>	'int',
		'prune_id'					=>	'int',
		'prune_next'				=>	'int',
		'rank_id'					=>	'int',
		'rank_min'					=>	'int',
		'rank_special'				=>	'int',
		'smilies_id'				=>	'int',
		'topic_first_post_id'		=>	'int',
		'topic_id'					=>	'int',
		'topic_last_post_id'		=>	'int',
		'topic_moved_id'			=>	'int',
		'topic_poster'				=>	'int',
		'topic_replies'				=>	'int',
		'topic_status'				=>	'int',
		'topic_time'				=>	'int',
		'topic_type'				=>	'int',
		'topic_views'				=>	'int',
		'topic_vote'				=>	'int',
		'user_active'				=>	'int',
		'user_allow_pm'				=>	'int',
		'user_allow_viewonline'		=>	'int',
		'user_allowavatar'			=>	'int',
		'user_allowbbcode'			=>	'int',
		'user_allowhtml'			=>	'int',
		'user_allowsmile'			=>	'int',
		'user_attachsig'			=>	'int',
		'user_avatar_type'			=>	'int',
		'user_emailtime'			=>	'int',
		'user_id'					=>	'int',
		'user_last_privmsg'			=>	'int',
		'user_lastvisit'			=>	'int',
		'user_level'				=>	'int',
		'user_new_privmsg'			=>	'int',
		'user_notify'				=>	'int',
		'user_notify_pm'			=>	'int',
		'user_pending'				=>	'int',
		'user_popup_pm'				=>	'int',
		'user_posts'				=>	'int',
		'user_rank'					=>	'int',
		'user_regdate'				=>	'int',
		'user_session_page'			=>	'int',
		'user_session_time'			=>	'int',
		'user_style'				=>	'int',
		'user_timezone'				=>	'float',
		'user_unread_privmsg'		=>	'int',
		'user_viewemail'			=>	'int',
		'vote_id'					=>	'int',
		'vote_length'				=>	'int',
		'vote_option_id'			=>	'int',
		'vote_result'				=>	'int',
		'vote_start'				=>	'int',
		'vote_user_id'				=>	'int',
		'word_id'					=>	'int'
	);

	return (isset($fields_type[$field_name])) ? $fields_type[$field_name] : 'string';
}

function is_field_null($field_name)
{
	$null_fields = array(
		'ban_email' 			=> 1,
		'cat_title' 			=> 1,
		'code' 					=> 1,
		'disallow_username' 	=> 1,
		'emoticon' 				=> 1,
		'forum_desc' 			=> 1,
		'forum_name' 			=> 1,
		'post_edit_time' 		=> 1,
		'post_subject' 			=> 1,
		'post_text' 			=> 1,
		'post_username' 		=> 1,
		'privmsgs_text' 		=> 1,
		'prune_next' 			=> 1,
		'rank_image' 			=> 1,
		'rank_special' 			=> 1,
		'smile_url' 			=> 1,
		'user_active' 			=> 1,
		'user_actkey' 			=> 1,
		'user_aim' 				=> 1,
		'user_allowbbcode' 		=> 1,
		'user_allowhtml' 		=> 1,
		'user_allowsmile' 		=> 1,
		'user_attachsig' 		=> 1,
		'user_avatar' 			=> 1,
		'user_email' 			=> 1,
		'user_emailtime' 		=> 1,
		'user_from' 			=> 1,
		'user_icq' 				=> 1,
		'user_interests' 		=> 1,
		'user_lang' 			=> 1,
		'user_level' 			=> 1,
		'user_msnm' 			=> 1,
		'user_newpasswd' 		=> 1,
		'user_occ' 				=> 1,
		'user_pending' 			=> 1,
		'user_rank' 			=> 1,
		'user_sig' 				=> 1,
		'user_sig_bbcode_uid'	=> 1,
		'user_style' 			=> 1,
		'user_viewemail' 		=> 1,
		'user_website' 			=> 1,
		'user_yim' 				=> 1
	);

	return isset($null_fields[$field_name]);
}

function format_sql_value($field_name, $value)
{
	switch (get_field_type($field_name))
	{
		case 'bool':
		return (empty($value)) ? 0 : 1;

		case 'int':
		return intval($value);

		case 'float':
		if (function_exists('floatval'))
		{
			return floatval($value);
		}
		return (float) $value;

		default:
		return "'" . str_replace("'", "''", str_replace('\\', '\\\\', $value)) . "'";
	}
}

//
// God bless PHP4 functions
//
$fname = $feval = array();

$fname[] = 'in_array';
$feval[] = '
	function in_array($var, $array, $strict=FALSE)
	{
		while (list($key, $val) = each($array))
		{
			if ((!$strict && !is_array($val)) || (gettype($var) == gettype($val)) && ($var == $val))
			{
				return TRUE;
			}
		}
		return FALSE;
	}
';

$fname[] = 'str_repeat';
$feval[] = '
	function str_repeat($str, $n)
	{
		$txt = "";
		while ($n--)
		{
			$txt .= $str;
		}
		return $txt;
	}
';

function declare_missing_functions()
{
	global $fname, $feval;
	for ($i = 0; $i < sizeof($fname); ++$i)
	{
		if (!function_exists($fname[$i]))
		{
			eval($feval[$i]);
		}
	}
}
?>