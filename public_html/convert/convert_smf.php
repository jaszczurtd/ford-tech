<?php
/***************************************************************************
 *                           convert_smf.php
 *                            ------------------
 *   begin                : Wednesday, July 20, 2005
 *   copyright            : Matt Halpin
 *   email                : SlapShot434@gmail.com
 *
 *   Modifications by Dicky - Sunday, December 04, 2005
 ***************************************************************************/

/***************************************************************************
 *
 *   This program is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation; either version 2 of the License, or
 *   (at your option) any later version.
 *
 ***************************************************************************/
 
/***************************************************************************
 * Modifications by Dicky http://www.phpbb.com/phpBB/profile.php?mode=viewprofile&u=163542
 * Modified by efansnet to work with SMF 1.1 RC2 (changed some field names)
 *
 *   Added adjust user_id to adjust up by one to conform with phpBB's starting id of 2
 *   Added some message text quote replacements to manually entered quotes
 *   Changed topic starter_id to first message poster_id.
 *          If a user is no longer a member of the board, the topic_starter_id will be changed to the Anonymous id
 *          When an SMF member is deleted, only the message poster id changes, not the topic starter_id.
/***************************************************************************

/******
 *
 *
 *	This converter will NOT import:
 *
 *  - User Moderators
 *	- Word censors
 *	- Host bans
 *	- Attachments
 *	- Logs
 *	- Calenders
 *	- Rank images
 *	- Any permissions other than guests
 *
 *
 ******/

//Please edit the following variables to your choice

$def_lang = 'english';    //This is the default language you wish to use.
$site_desc = 'My Forums';  //This is the text that will appear under your Forum Name.
@set_time_limit(0);
/****************************************
* - No editing necessary below this line
****************************************/

$converter_infos = array(
	'forum_name'	=>	'SMF 1.1.1',
	'version'		=>	'1.1 Beta_1(Dicky)',
	'phpbb_version'	=>	'2.0.22',
	'author'		=>	'<a href="http://www.phpbb.com/phpBB/profile.php?mode=viewprofile&u=120202">SlapShot434</a><br /><a href="http://www.phpbb.com/phpBB/profile.php?mode=viewprofile&u=163542">Dicky</a>',
	'table_prefix'	=>	'smf_',
	'pre_message'	=>	'<b>WARNING</b><br /><br />Due to the algorithm used to "encrypt" SMF passwords, it is impossible to convert them to phpBB.<br />SMF passwords are converted over as is.<br />You can modify login.php with the instructions in login_mod/login_mod.txt to allow members to log in with their SMF password.<br />Otherwise, the members can click the "I forgot my password" link to reset their password.<br />(Dicky)<br />'
);

$tables = array(
	'attachments',
	'ban_groups',
	'ban_items',
	'board_permissions',
	'calendar',
	'calendar_holidays',
	'categories',
	'collasped_categories',
	'log_actions',
	'log_activity',
	'log_banned',
	'log_boards',
	'log_errors',
	'log_floodcontrol',
	'log_karma',
	'log_mark_read',
	'log_notify',
	'log_online',
	'pm_recipients',
	'personal_messages',
	'log_polls',
	'log_search_messages',
	'log_topics',
	'membergroups',
	'members',
	'messages',
	'moderators',
	'permissions',
	'poll_choices',
	'polls',
	'sessions',
	'settings',
	'smileys',
	'themes',
	'topics'
);

$config_schema = array(
	'table_name'	=>	'settings',
	'table_format'	=>	array('variable' => 'value'),
	'settings'		=>	array(
		'session_length'		=>	'databaseSession_lifetime',
		'allow_html'			=>	'enablePostHTML',
		'allow_bbcode'			=>	'enableBBC',
		'allow_smilies'			=>	'smiley_enable',
		'allow_avatar_local'	=>	'1',
		'allow_avatar_remote'	=>	'1',
		'allow_avatar_upload'	=>	'1',
		'override_user_style'	=>	'theme_default',
		'posts_per_page'		=>	'defaultMaxMessages',
		'topics_per_page'		=>	'defaultMaxTopics',
		'hot_threshold'			=>	'hotTopicPosts',
		'max_sig_chars'			=>	'max_signatureLength',
		'smtp_host'				=>	'smtp_host',
		'smtp_username'			=>	'smtp_username',
		'smtp_password'			=>	'smtp_password',
		'flood_interval'		=>	'spamWaitTime',
		'avatar_max_width'		=>	'avatar_max_width_external',
		'avatar_max_heigth'		=>	'avatar_max_height_external',
		'board_timezone'		=>	'time_offset',
		'prune_enable'			=>	'recycle_enable',
		'gzip_compress'			=>	'enableCompressedOutput',
		'record_online_users'	=>	'mostOnline',
		'record_online_date'	=>	'mostDate'
	)
);

if ($get_info)
{
	return;
}

$converter = array(
	'test_file'		=>	'Settings.php',
	'avatars_path'	=>	'avatars/',
	'avatars_upload_path'	=>	'attachments/',
	'smilies_path'	=>	'Smileys/default/',
	'execute_first'	=>	'
						smf_restore_config();
						import_avatar_gallery("smf");
//						copy_dir("attachments","avatars")
//						smf_import_avatar_upload_gallery("attachments");
						',

	'execute_last'	=>	'
						resynch(topics);
						smf_avatar_get_user_upload();
						',

	'schema' => array(
		array(
			'target'		=>	AUTH_ACCESS_TABLE,
			'query_first'	=>	'DELETE FROM ' . AUTH_ACCESS_TABLE,

			array('forum_id',				'boards.ID_BOARD',					''),
			array('group_id',				'membergroups.ID_GROUP',			'smf_auto_group'),
			array('',						'MAX(members.ID_MEMBER) AS max_id',	''),
			array('auth_mod',				1,									''),

			'where'		=>	'membergroups.ID_GROUP = 1',
			'group_by'	=>	'boards.ID_BOARD'
		),

		array(
			'target'		=>	AUTH_ACCESS_TABLE,
			'query_first'	=>	'DELETE FROM ' . AUTH_ACCESS_TABLE,

			array('group_id',				'board_permissions.ID_GROUP',		'smf_auto_group_id'),
			array('forum_id',				'board_permissions.ID_BOARD',		''),
			array('auth_mod',				1,									''),

			'where'		=>	'board_permissions.permission = "moderate_board"'
		),

		array(
			'target'		=>	AUTH_ACCESS_TABLE,

			array('group_id',				'board_permissions.ID_GROUP',		'smf_auto_group_id'),
			array('forum_id',				'board_permissions.ID_BOARD',		''),
			array('auth_view',				1,									''),
			array('auth_read',				1,									''),
			array('auth_post',				1,									''),
			array('auth_reply',				1,									''),
			array('auth_edit',				1,									''),
			array('auth_delete',			1,									''),
			array('auth_sticky',			0,									''),
			array('auth_announce',			0,									''),
			array('auth_vote',				1,									''),
			array('auth_pollcreate',		1,									''),
			array('auth_mod',				0,									''),

			'where'		=>	'board_permissions.permission = "poll_view"'
		),

		array(
			'target'		=>	AUTH_ACCESS_TABLE,

			array('group_id',				'moderators.ID_MEMBER',				'smf_adjust_id'),
			array('forum_id',				'moderators.ID_BOARD',				''),
			array('auth_mod',				1,									'')
		),


		array(
			'target'		=>	CATEGORIES_TABLE,
			'query_first'	=>	'DELETE FROM ' . CATEGORIES_TABLE,

			array('cat_id',					'categories.ID_CAT',				''),
			array('cat_title',				'categories.name',					''),
			array('cat_order',				'categories.catOrder',				''),

			'order_by'		=>	'categories.ID_CAT ASC'
		),

/*		array(
			'target'		=>	DISALLOW_TABLE,
			'query_first'	=>	'TRUNCATE ' . DISALLOW_TABLE,

			array('disallow_username',		'settings.value',					'smf_explode'),

			'where'			=>		'settings.variable = "reserveNames"'
		), */


		array(
			'target'		=>	FORUMS_TABLE,
			'query_first'	=>	'DELETE FROM ' . FORUMS_TABLE,

			array('forum_id',				'boards.ID_BOARD',					''),
			array('cat_id',					'boards.ID_CAT',					''),
			array('forum_name',				'boards.name',						''),
			array('forum_desc',				'boards.description',				''),
			array('forum_order',			'boards.boardOrder',				''),
			array('forum_posts',			'boards.NumPosts',					''),
			array('forum_topics',			'boards.NumTopics',					''),
			array('forum_last_post_id',		'boards.ID_LAST_MSG',				''),
			array('auth_view',				'boards.memberGroups',				'smf_auth_guest'),
			array('auth_read',				'boards.memberGroups',				'smf_auth_guest'),
			array('auth_post',				'boards.memberGroups',				'smf_auth_guest'),
			array('auth_reply',				'boards.memberGroups',				'smf_auth_guest'),
			array('auth_edit',				AUTH_REG,							''),
			array('auth_delete',			AUTH_REG,							''),
			array('auth_sticky',			AUTH_MOD,							''),
			array('auth_announce',			AUTH_MOD,							''),
			array('auth_pollcreate',		AUTH_REG,							''),
			array('auth_vote',				AUTH_REG,							''),

			'order_by'		=>	'boards.ID_BOARD ASC'
		),

		array(
			'target'		=>	GROUPS_TABLE,
			'query_first'	=>	'DELETE FROM ' . GROUPS_TABLE . ' WHERE group_id > 1',

			array('group_id',				'members.ID_MEMBER',				'smf_adjust_id'),
			array('group_type',				GROUP_CLOSED,						''),
			array('group_name',				'',									''),
			array('group_description',		'Personal User',					''),
			array('group_moderator',		0,									''),
			array('group_single_user',		1,									'')
		),

		array(
			'target'		=>	GROUPS_TABLE,

			array('group_id',				'membergroups.ID_GROUP',			'smf_auto_group_id'),
			array('group_type',				GROUP_CLOSED,						''),
			array('group_name',				'membergroups.groupName',			''),
			array('group_description',		'',									''),
			array('group_moderator',		2,									''),
			array('group_single_user',		0,									''),

			'left_join' =>  'membergroups LEFT JOIN members AS members ON (members.ID_GROUP = membergroups.ID_GROUP)',
			'order_by'  =>  'membergroups.ID_GROUP ASC'
		),

		array(
			'target'		=>	POSTS_TABLE,
			'query_first'	=>	'DELETE FROM ' . POSTS_TABLE,

			array('post_id',				'messages.ID_MSG',					''),
			array('topic_id',				'messages.ID_TOPIC',				''),
			array('forum_id',				'messages.ID_BOARD',				''),
			array('poster_id',				'messages.ID_MEMBER',				'smf_adjust_id'),
			array('post_username',			'messages.posterName',				''), // smf_post_username
			array('post_time',				'messages.posterTime',				''),
			array('poster_ip',				'messages.posterIP',				'encode_ip'),
			array('enable_bbcode',			1,									''),
			array('enable_html',			1,									''),
			array('enable_smilies',			'messages.smileysEnabled',			''),
			array('enable_sig',				1,									''),
			array('post_edit_time',			'messages.modifiedTime',			'smf_post_edited'),
			array('post_edit_count',		'messages.modifiedName',			'smf_post_edited_count'),

			'left_join'	=>	'messages LEFT JOIN topics USING (ID_TOPIC)'
		),

		array(
			'target'		=>	POSTS_TEXT_TABLE,
			'query_first'	=>	'DELETE FROM ' . POSTS_TEXT_TABLE,

			array('post_id',				'messages.ID_MSG',					''),
			array('bbcode_uid',				'',									'make_uid'),
			array('post_subject',			'messages.subject',					''),
			array('post_text',				'messages.body',					'smf_prepare_message')
		),

		array(
			'target'		=>	PRIVMSGS_TABLE,
			'query_first'	=>	'DELETE FROM ' . PRIVMSGS_TABLE,

			array('privmsgs_id',				'personal_messages.ID_PM',				''),
			array('privmsgs_type',				'personal_messages.deletedBySender',	'smf_privmsgs_type'),
			array('privmsgs_subject',			'personal_messages.subject',			''),
			array('privmsgs_from_userid',		'personal_messages.ID_MEMBER_FROM',		'smf_adjust_id'),
			array('privmsgs_to_userid',			'pm_recipients.ID_MEMBER',				'smf_adjust_id'),
			array('privmsgs_date',				'personal_messages.msgtime',			''),
			array('privmsgs_ip',				'7f000001',								''),
			array('privmsgs_enable_bbcode',		1,										''),
			array('privmsgs_enable_html',		1,										''),
			array('privmsgs_enable_smilies',	1,										''),
			array('privmsgs_attach_sig',		1,										''),

			'where'		=>	'pm_recipients.ID_PM = personal_messages.ID_PM'
		),

		array(
			'target'		=>	PRIVMSGS_TEXT_TABLE,
			'query_first'	=>	'DELETE FROM ' . PRIVMSGS_TEXT_TABLE,

			array('privmsgs_text_id',			'personal_messages.ID_PM',				''),
			array('privmsgs_bbcode_uid',		'',										'make_uid'),
			array('privmsgs_text',				'personal_messages.body',				'smf_prepare_message'),

			'group_by'	=>	'personal_messages.ID_PM'
		),

		array(
			'target'		=>	RANKS_TABLE,
			'query_first'	=>	'DELETE FROM ' . RANKS_TABLE,

			array('rank_id',				'membergroups.ID_GROUP',			''),
			array('rank_title',				'membergroups.groupName',			''),
			array('rank_min',				'membergroups.minPosts',			''),
			array('rank_special',			1,									''),

			'where'		=>	'membergroups.minPosts < 0'
		),

		array(
			'target'		=>	RANKS_TABLE,

			array('rank_id',				'membergroups.ID_GROUP',			''),
			array('rank_title',				'membergroups.groupName',			''),
			array('rank_min',				'membergroups.minPosts',			''),
			array('rank_special',			0,									''),

			'where'		=>	'membergroups.minPosts > -1',
			'order_by'	=>	'membergroups.ID_GROUP ASC'
		),

		array(
			'target'		=>	SMILIES_TABLE,

			array('code',					'smileys.code',					'is_smilie_new'),
			array('smile_url',				'smileys.filename',				'import_smilie'),
			array('emoticon',				'smileys.description',			'')
		),

		array(
			'target'		=>	TOPICS_TABLE,
			'query_first'	=>	'DELETE FROM ' . TOPICS_TABLE,

			array('topic_id',				'topics.ID_TOPIC',					''),
			array('forum_id',				'topics.ID_BOARD',					''),
			array('topic_title',			'messages.subject',					''),
			array('topic_poster',			'messages.ID_MEMBER',				'smf_adjust_id'),
			array('topic_time',				'messages.posterTime',				''),
			array('topic_views',			'topics.numViews',					''),
			array('topic_replies',			'topics.numReplies',				''),
			array('topic_status',			'topics.locked',					'is_topic_locked'),	
			array('topic_vote',				'topics.ID_POLL',					'is_positive'),
			array('topic_type',				'topics.isSticky',					'is_topic_sticky'),
			array('topic_first_post_id',	'topics.ID_FIRST_MSG',				''),
			array('topic_last_post_id',		'topics.ID_LAST_MSG',				''),

			'left_join'	=>	'topics LEFT JOIN messages ON messages.ID_MSG = topics.ID_FIRST_MSG'
		),

		array(
			'target'		=>	TOPICS_WATCH_TABLE,
			'query_first'	=>	'DELETE FROM '.TOPICS_WATCH_TABLE,

			array('topic_id',				'log_notify.ID_TOPIC',				''),
			array('user_id',				'log_notify.ID_MEMBER',				'smf_adjust_id'),

			'where'		=>	'log_notify.ID_BOARD = 0 AND log_notify.ID_TOPIC <> 0'
		),

		array(
			'target'		=>	USER_GROUP_TABLE,
			'query_first'	=>	'DELETE FROM ' . USER_GROUP_TABLE . ' WHERE user_id <> -1',

			array('group_id',				'members.ID_MEMBER',				'smf_adjust_id'),
			array('user_id',				'members.ID_MEMBER',				'smf_adjust_id'),
			array('user_pending',			0,									'')
		),

		array(
			'target'		=>	USER_GROUP_TABLE,

			array('group_id',				'membergroups.ID_GROUP',			'smf_auto_group_id'),
			array('user_id',				2,									''),
			array('user_pending',			0,									''),

			'where'		=>	'members.ID_MEMBER = 1'
		),

		array(
			'target'		=>	USER_GROUP_TABLE,

			array('group_id',				'membergroups.ID_GROUP',				'smf_auto_group_id'),
			array('user_id',				'members.ID_MEMBER',					'smf_adjust_id'),
			array('user_pending',			0,										''),

			'where'		=>	'members.ID_GROUP = membergroups.ID_GROUP AND members.ID_MEMBER > 1'
		),

		array(
			'target'		=>	USER_GROUP_TABLE,

			array('group_id',				'membergroups.ID_GROUP',				'smf_auto_group_id'),
			array('user_id',				'members.ID_MEMBER',					'smf_adjust_id'),
			array('user_pending',			0,										''),

			'where'		=>	'membergroups.ID_GROUP IN(members.additionalGroups) AND members.ID_MEMBER > 1',
			'order_by'	=>	'membergroups.ID_GROUP ASC'
		),

		array(
			'target'		=>	USERS_TABLE,
			'query_first'	=>	'DELETE FROM ' . USERS_TABLE . ' WHERE user_id <> -1',

			array('user_id',				'members.ID_MEMBER',				'smf_adjust_id'),
			array('user_active',			'members.is_activated',				''),
			array('username',				'members.memberName',				''),
			array('user_password',			'members.passwd',					''),
			array('user_regdate',			'members.dateRegistered',			''),
			array('user_lastvisit',			'members.lastLogin',				''),
			array('user_level',				'members.ID_GROUP',					'smf_user_level'),
			array('user_posts',				'members.posts',					''),
			array('user_timezone',			'members.timeOffset',				''),
			array('user_style',				1,									''),
			array('user_lang',				'',									'smf_language'),
			array('user_dateformat',		'members.timeFormat',				'smf_time_format'),
			array('user_new_privmsg',		'members.instantMessages',			''),
			array('user_unread_privmsg',	'members.unreadMessages',			''),
			array('user_last_privmsg',		0,									''),
			array('user_viewemail',			'members.hideEmail',				'not'),
			array('user_attachsig',			1,									''),
			array('user_allowhtml',			1,									''),
			array('user_allowbbcode',		1,									''),
			array('user_allowsmile',		1,									''),
			array('user_allowavatar',		1,									''),
			array('user_allow_pm',			1,									''),
			array('user_allow_viewonline',	'members.showOnline',				''),
			array('user_notify',			0,									''),
			array('user_notify_pm',			'members.pm_email_notify',			''),
			array('user_popup_pm',			1,									''),
			array('user_rank',				'membergroups.ID_GROUP',			''),
			array('user_avatar',			'members.avatar',					'smf_avatar'),
			array('user_avatar_type',		'members.avatar',					'smf_avatar_type'),
			array('user_email',				'members.emailAddress',				'validate_email'),
			array('user_icq',				'members.ICQ',						'validate_icq'),
			array('user_website',			'members.websiteUrl',				'validate_website'),
			array('user_from',				'members.location',					''),
			array('user_sig_bbcode_uid',	'',									'make_uid'),
			array('user_sig',				'members.signature',				'smf_prepare_message'),
			array('user_aim',				'members.AIM',						''),
			array('user_yim',				'members.YIM',						''),
			array('user_msnm',				'members.MSN',						'validate_msnm'),

			'where'		=>	'members.ID_MEMBER > 0',
			'left_join'	=>	'members LEFT JOIN membergroups ON members.ID_GROUP = membergroups.ID_GROUP',
			
			'order_by'	=>	'members.ID_MEMBER ASC'
		),

		array(
			'target'		=>	VOTE_DESC_TABLE,
			'query_first'	=>	'DELETE FROM ' . VOTE_DESC_TABLE,

			array('vote_id',				'polls.ID_POLL',					''),
			array('topic_id',				'topics.ID_TOPIC',					''),
			array('vote_text',				'polls.question',					''),
			array('vote_start',				0,									''),
			array('vote_length',			0,									''),

			'where'		=>	'topics.ID_POLL = polls.ID_POLL'
		),

		array(
			'target'		=>	VOTE_RESULTS_TABLE,
			'query_first'	=>	'DELETE FROM ' . VOTE_RESULTS_TABLE,

			array('vote_id',				'poll_choices.ID_POLL',				''),
			array('vote_option_id',			'poll_choices.ID_CHOICE',			''),
			array('vote_option_text',		'poll_choices.label',				''),
			array('vote_result',			'poll_choices.votes',				'')
		)
	)
);

function smf_activation($method)
{
	switch ($method)
	{
		case 3:
		return 2;
		break;

		default:
		return $method;
	}
}

function smf_adjust_id($user_id)
{
	return ($user_id > 0) ? $user_id + 1 : -1;
}

function smf_auth_guest($groups)
{
	return (preg_match('/-1/', $groups)) ? AUTH_ALL : AUTH_REG;
}

function smf_auto_group($num)
{
	global $row, $numb;
	define('MAXI_ID',$row['max_id']);
	return $row['max_id'];
}

function smf_auto_group_id($group_id)
{
	global $maxi_id;
	$maxi_id=MAXI_ID;
	return $group_id+$maxi_id+1;
}

function smf_avatar($filename)
{
	if (preg_match('#/.*?/#', $filename)||empty($filename))
	{
		return $filename;
	}
	return ($filename == 'blank.gif') ? '' : 'smf/' . $filename;
}

function smf_avatar_type($path)
{
	if ($path == 'blank.gif' || empty($path))
	{
		return USER_AVATAR_NONE;
	}
	return (preg_match('#/.*?/#', $path)) ? USER_AVATAR_REMOTE : USER_AVATAR_GALLERY;
}

function smf_avatar_get_user_upload()
{
	global $converter, $converter_infos, $phpbb_root_path, $db;

	$sql = "SELECT filename, ID_MEMBER
		FROM " . $converter_infos['table_prefix'] . "attachments 
		WHERE ID_MEMBER > 0";

	if ( !($result = $db->sql_query($sql)) )
	{
		message_die(GENERAL_ERROR, 'Error in obtaining user_avatar_data', '', __LINE__, __FILE__, $sql);
	}
	while ( $row = $db->sql_fetchrow($result) )
	{
		$row[ID_MEMBER] = smf_adjust_id($row[ID_MEMBER]);
		$db->sql_query('UPDATE ' . USERS_TABLE . ' SET user_avatar = \'' . $row[filename] . '\', user_avatar_type = 1 WHERE user_id = ' . $row[ID_MEMBER]);
	}
}

function smf_board_disable($bd)
{
	switch ($bd)
	{
		case 1:
		case 2:
		return 1;
		break;

		default:
		return 0;
	}
}

function smf_explode($words)
{
	$words=explode("\n", $words);
	return $words[0];
}

function smf_language()
{
	global $def_lang;
	return $def_lang;
}

function smf_password($pass)
{
	global $newpass;
	return md5($newpass);
}

function smf_password2($pass)
{
	global $newpass;
	global $newpass2;
	$newpass2 = $newpass+$pass;
	$newpass2 = substr($newpass2, 4, 12)+rand(2,1500)+rand(2,1500);
	return md5($newpass2);
}

function smf_post_edited($value)
{
	global $row;
	return ($row['modifiedName'] == $row['posterName']) ? $value : '';
}

function smf_post_edited_count($value)
{
	global $row;
	return ($row['modifiedName'] == $row['posterName']) ? 1 : '';
}

function smf_post_username($username)
{
	global $row;
	return (is_positive($row['ID_MEMBER'])) ? $username : '';
}

function smf_prepare_message($message)
{
	global $row, $convert_settings, $board_config, $phpEx;

	$bbcode_uid = make_uid();
	$message = str_replace("<br />", "\n", $message);
	$message = str_replace('&lt;', '<', $message);
	$message = str_replace('&gt;', '>', $message);
	$message = str_replace('&amp;nbsp;', '&nbsp;', $message);
	$message = str_replace('&nbsp;', ' ', $message);
	$message = str_replace('&amp;amp;', '&amp;', $message);
	$message = str_replace('[li]', '[*]', $message);
	$message = str_replace('[/li]', '', $message);
	$message = str_replace('&#91;', '[', $message);
	$message = str_replace('&#93;', ']', $message);
	$message = preg_replace('#\[size=([0-9]*)pt\]#i', '[size=\1]', $message);

	$message = smf_un_htmlspecialchars($message);

	$message = convert_bbcode($message, FALSE, FALSE);

	if (validate_website($convert_settings['url']))
	{
		$message = preg_replace('#' . phpbb_preg_quote(path($convert_settings['url']), '#') . 'index\.php\?board=[0-9]*;action=display;threadid=([0-9]+)#i', 'http://' . $board_config['server_name'] . $board_config['script_path'] . 'viewtopic . ' . $phpEx . '?' . POST_TOPIC_URL . '=\1', $message);
	}

	$message = prepare_message($message, TRUE, TRUE, !empty($row['smiliesEnabled']), $bbcode_uid);
	$message = stripslashes($message);

	$message = preg_replace('#\[quote="(.+?)"\]#i',					 "[quote:$bbcode_uid=\"\\1\"]", $message);
	$message = preg_replace("#\[quote author=(.+?)link=(.+?)\]#i",	 "[quote:$bbcode_uid=\"\\1\"]", $message);
	$message = preg_replace("#\[quote author=(.+?)\]#i",			 "[quote:$bbcode_uid=\"\\1\"]", $message);
/*	$message = preg_replace("#\[quote author=&quot;(.+?)&quot;\]#i", "[quote:$bbcode_uid=\"\\1\"]", $message);
	$message = preg_replace("#\[quote=&quot;(.+?)&quot;\]#i",		 "[quote:$bbcode_uid=\"\\1\"]", $message); */

	$message = preg_replace( "/\[\/quote\]/si",						 "[/quote:$bbcode_uid]"       , $message );
//	$message = bbencode_first_pass($message, $bbcode_uid);

	return $message;
}

function smf_privmsgs_type($readBy)
{
	global $row;
	switch ($row['deletedBySender'])
	{
		case 2:
		return PRIVMSGS_SENT_MAIL;
		break;

		default:
		return ($readBy) ? PRIVMSGS_READ_MAIL : PRIVMSGS_NEW_MAIL;
	}
}

function smf_restore_config()
{
	global $convert_settings, $phpbb_root_path, $site_desc;
	if (!file_exists($phpbb_root_path . $convert_settings['path'] . '/Settings.php'))
	{
		message_die(GENERAL_ERROR, 'Could not find Settings.php in SMF directory');
	}
	include($phpbb_root_path . $convert_settings['path'] . '/Settings.php');

	$config_row = get_config();

	$smtp_type = smf_smtp_type($config_row['mail_type']);
	$maintenance = smf_board_disable($maintenance);
	$time_format = smf_time_format($config_row['time_format']);
	$require_activation = smf_activation($config_row['registration_method']);

	$config_schema = array(
			'board_disable'		=>	$maintenance,
			'sitename'			=>	$mbname,
			'board_email'		=>	$webmaster_email,
			'smtp_delivery'		=>	$smtp_type,
			'default_dateformat'=>	$time_format,
			'site_desc'			=>	$site_desc,
			'require_activation'=>	$require_activation
	);
	
	while (list($config_name, $config_value) = each($config_schema))
	{
		save_config($config_name, $config_value);
	}
}



function smf_smtp_type($type)
{
	switch ($type)
	{
		case smtp:
		return 1;
		break;
		default:
		return 0;
	}
}

function smf_time_format($timeformat)
{
	$formatreplace = array("%a" => "D", "%A" => "l", "%b" => "M", "%B" => "F", "%c" => "D d M Y h:i:s A", "%C" => "", "%d" => "d", "%D" => "m/d/y", "%e" => "j", "%g" => "y", "%G" => "Y", "%h" => "M", "%H" => "H", "%I" => "h", "%j" => "z", "%m" => "m", "%M" => "i", "%n" => "", "%p" => "A", "%P" => "A", "%r" => "h:i:s A", "%R" => "H:i", "%S" => "s", "%t" => "", "%T" => "H:i:s", "%u" => "", "%U" => "", "%V" => "W", "%w" => "w", "%W" => "", "%x" => "m/d/Y", "%X" => "h:i:s A", "%y" => "y", "%Y" => "Y", "%z" => "O", "%Z" => "T", "%%" => "%");
	return strtr($timeformat, $formatreplace);
}

function smf_un_htmlspecialchars($string)
{
	return strtr($string, array_flip(get_html_translation_table(HTML_SPECIALCHARS, ENT_QUOTES)) + array('&#039;' => "\'", '&nbsp;' => ' '));
}

function smf_user_level($group_id)
{
	switch ($group_id)
	{
		case 1:
		return ADMIN;

		default:
		return USER;
	}
}

function smf_import_avatar_upload_gallery($src, $trg='')
{
echo 'Line 778. Source = ' . $src . '<br />' . 'Target = ' . $trg . '<br />';
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

?>