<?php
/***************************************************************************
 *                       album_upload.php
 *                       -------------------
 *   begin               : Wednesday, February 05, 2003
 *   copyright           : (C) 2003 Smartor
 *   email               : smartor_xp@hotmail.com
 *
 *   $Id: album_upload.php,v 2.1.2 2003/03/13 19:46:00 ngoctu Exp $
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

define('IN_PHPBB', true);
$phpbb_root_path = './';
$album_root_path = $phpbb_root_path . 'album_mod/';
include($phpbb_root_path . 'extension.inc');
include($phpbb_root_path . 'common.'.$phpEx);
include($phpbb_root_path . 'includes/functions_validate.'.$phpEx);

//
// Start session management
//
$userdata = session_pagestart($user_ip, PAGE_ALBUM);
init_userprefs($userdata);
//
// End session management
//

if ( $board_config['login_require'] && !$userdata['session_logged_in'] )
{
	$message = $lang['login_require'] . '<br /><br />' . sprintf($lang['login_require_register'], '<a href="' . append_sid("profile.$phpEx?mode=register") . '">', '</a>');
	message_die(GENERAL_MESSAGE, $message);
}

include($album_root_path . 'album_common.'.$phpEx);

if( isset($HTTP_POST_VARS['cat_id']) )
{
	$cat_id = intval($HTTP_POST_VARS['cat_id']);
}
else if( isset($HTTP_GET_VARS['cat_id']) )
{
	$cat_id = intval($HTTP_GET_VARS['cat_id']);
}
else
{
	message_die(GENERAL_ERROR, 'No categories specified');
}


// ------------------------------------
// Get the current Category Info
// ------------------------------------

if ($cat_id != 0)
{
	$sql = "SELECT c.*, COUNT(p.pic_id) AS count
		FROM " . ALBUM_CAT_TABLE . " AS c
			LEFT JOIN " . ALBUM_TABLE . " AS p ON (c.cat_id = p.pic_cat_id)
		WHERE c.cat_id = '$cat_id'
		GROUP BY c.cat_id
		LIMIT 1";
	if( !($result = $db->sql_query($sql)) )
	{
		message_die(GENERAL_ERROR, 'Could not query category information', '', __LINE__, __FILE__, $sql);
	}

	$thiscat = $db->sql_fetchrow($result);
}
else
{
	$thiscat = init_personal_gallery_cat($user_data['user_id']);
}

$current_pics = $thiscat['count'];

if (empty($thiscat))
{
	message_die(GENERAL_ERROR, $lang['Category_not_exist']);
}


// ------------------------------------
// Check the permissions
// ------------------------------------

$album_user_access = album_user_access($cat_id, $thiscat, 0, 1, 0, 0, 0, 0); // UPLOAD

if ($album_user_access['upload'] == 0)
{
	if (!$userdata['session_logged_in'])
	{
		redirect(append_sid("login.$phpEx?redirect=album_upload.$phpEx&cat_id=$cat_id"));
	}
	else
	{
		message_die(GENERAL_ERROR, $lang['Not_Authorised']);
	}
}


/*
+----------------------------------------------------------
| Upload Quota Check
+----------------------------------------------------------
*/

if ($cat_id != 0)
{
	// ------------------------------------
	// Check Album Configuration Quota
	// ------------------------------------

	if ($album_config['max_pics'] >= 0)
	{
		//
		// $current_pics was set at "Get the current Category Info"
		//
		if( $current_pics >= $album_config['max_pics'] )
		{
			message_die(GENERAL_MESSAGE, $lang['Album_reached_quota']);
		}
	}


	// ------------------------------------
	// Check User Limit
	// ------------------------------------

	$check_user_limit = FALSE;

	if( ($userdata['user_level'] != ADMIN) and ($userdata['session_logged_in']) )
	{
		if ($album_user_access['moderator'])
		{
			if ($album_config['mod_pics_limit'] >= 0)
			{
				$check_user_limit = 'mod_pics_limit';
			}
		}
		else
		{
			if ($album_config['user_pics_limit'] >= 0)
			{
				$check_user_limit = 'user_pics_limit';
			}
		}
	}

	// Do the check here
	if ($check_user_limit != FALSE)
	{
		$sql = "SELECT COUNT(pic_id) AS count
				FROM ". ALBUM_TABLE ."
				WHERE pic_user_id = '". $userdata['user_id'] ."'
					AND pic_cat_id = '$cat_id'";
		if( !($result = $db->sql_query($sql)) )
		{
			message_die(GENERAL_ERROR, 'Could not count your pic', '', __LINE__, __FILE__, $sql);
		}
		$row = $db->sql_fetchrow($result);
		$own_pics = $row['count'];

		if( $own_pics >= $album_config[$check_user_limit] )
		{
			message_die(GENERAL_MESSAGE, $lang['User_reached_pics_quota']);
		}
	}
}
else
{
	if( ($current_pics >= $album_config['personal_gallery_limit']) and ($album_config['personal_gallery_limit'] >= 0) )
	{
		message_die(GENERAL_MESSAGE, $lang['Album_reached_quota']);
	}
}

/*
+----------------------------------------------------------
| Main work here...
+----------------------------------------------------------
*/

if( !isset($HTTP_POST_VARS['pic_title']) ) // is it not submitted?
{
	// --------------------------------
	// Build categories select
	// --------------------------------
	$sql = "SELECT *
			FROM " . ALBUM_CAT_TABLE ."
			ORDER BY cat_order ASC";
	if( !($result = $db->sql_query($sql)) )
	{
		message_die(GENERAL_ERROR, 'Could not query categories list', '', __LINE__, __FILE__, $sql);
	}

	$catrows = array();

	while( $row = $db->sql_fetchrow($result) )
	{
		$thiscat_access = album_user_access($row['cat_id'], $row, 0, 1, 0, 0, 0, 0); // UPLOAD

		if ($thiscat_access['upload'] == 1)
		{
			$catrows[] = $row;
		}
	}

	$select_cat = '<select name="cat_id">';

	if ($cat_id == 0)
	{
		$select_cat .= '<option value="$cat_id" selected="selected">';
		$select_cat .= sprintf($lang['Personal_Gallery_Of_User'], $userdata['username']);
		$select_cat .= '</option>';
	}

	for ($i = 0; $i < count($catrows); $i++)
	{
		$select_cat .= '<option value="'. $catrows[$i]['cat_id'] .'" ';
		$select_cat .= ($cat_id == $catrows[$i]['cat_id']) ? 'selected="selected"' : '';
		$select_cat .= '>'. $catrows[$i]['cat_title'] .'</option>';
	}

	$select_cat .= '</select>';

	//
	// Start output of page
	//
	$page_title = $lang['Album'];
	include($phpbb_root_path . 'includes/page_header.'.$phpEx);

	$template->set_filenames(array(
		'body' => 'album_upload_body.tpl')
	);

	$template->assign_vars(array(
		'U_VIEW_CAT' => ($cat_id != PERSONAL_GALLERY) ? append_sid("album_cat.$phpEx?cat_id=$cat_id") : append_sid("album_personal.$phpEx"),
		'CAT_TITLE' => $thiscat['cat_title'],

		'L_UPLOAD_PIC' => $lang['Upload_Pic'],

		'L_USERNAME' => $lang['Username'],
		'L_PIC_TITLE' => $lang['Pic_Title'],

		'L_PIC_DESC' => $lang['Pic_Desc'],
		'L_PLAIN_TEXT_ONLY' => $lang['Plain_text_only'],
		'L_MAX_LENGTH' => $lang['Max_length'],
		'S_PIC_DESC_MAX_LENGTH' => $album_config['desc_length'],

		'L_UPLOAD_PIC_FROM_MACHINE' => $lang['Upload_pic_from_machine'],
		'L_UPLOAD_TO_CATEGORY' => $lang['Upload_to_Category'],

		'SELECT_CAT' => $select_cat,

		'L_MAX_FILESIZE' => $lang['Max_file_size'],
		'S_MAX_FILESIZE' => $album_config['max_file_size'],

		'L_MAX_WIDTH' => $lang['Max_width'],
		'L_MAX_HEIGHT' => $lang['Max_height'],

		'S_MAX_WIDTH' => $album_config['max_width'],
		'S_MAX_HEIGHT' => $album_config['max_height'],

		'L_ALLOWED_JPG' => $lang['JPG_allowed'],
		'L_ALLOWED_PNG' => $lang['PNG_allowed'],
		'L_ALLOWED_GIF' => $lang['GIF_allowed'],

		'S_JPG' => ($album_config['jpg_allowed'] == 1) ? $lang['Yes'] : $lang['No'],
		'S_PNG' => ($album_config['png_allowed'] == 1) ? $lang['Yes'] : $lang['No'],
		'S_GIF' => ($album_config['gif_allowed'] == 1) ? $lang['Yes'] : $lang['No'],

		'L_UPLOAD_NO_TITLE' => $lang['Upload_no_title'],
		'L_UPLOAD_NO_FILE' => $lang['Upload_no_file'],
		'L_DESC_TOO_LONG' => $lang['Desc_too_long'],

		// Manual Thumbnail
		'L_UPLOAD_THUMBNAIL' => $lang['Upload_thumbnail'],
		'L_UPLOAD_THUMBNAIL_EXPLAIN' => $lang['Upload_thumbnail_explain'],
		'L_THUMBNAIL_SIZE' => $lang['Thumbnail_size'],
		'S_THUMBNAIL_SIZE' => $album_config['thumbnail_size'],

		'L_RESET' => $lang['Reset'],
		'L_SUBMIT' => $lang['Submit'],

		'S_ALBUM_ACTION' => append_sid("album_upload.$phpEx?cat_id=$cat_id"),
		)
	);

	if ($album_config['gd_version'] == 0)
	{
		$template->assign_block_vars('switch_manual_thumbnail', array());
	}

	//
	// Generate the page
	//
	if ($board_config['album_gallery'])
	{
		$template->pparse('body');
	}

	include($phpbb_root_path . 'includes/page_tail.'.$phpEx);
}
else
{
	// --------------------------------
	// Check posted info
	// --------------------------------

	$pic_title_base = trim($HTTP_POST_VARS['pic_title']);
	$pic_desc = str_replace("\'", "''", htmlspecialchars(substr(trim($HTTP_POST_VARS['pic_desc']), 0, $album_config['desc_length'])));
	$pic_username = (!$userdata['session_logged_in']) ? substr(str_replace("\'", "''", htmlspecialchars(trim($HTTP_POST_VARS['pic_username']))), 0, 32) : str_replace("'", "''", $userdata['username']);

	// --------------------------------
	// Check username for guest posting
	// --------------------------------

	if (!$userdata['session_logged_in'])
	{
		if ($pic_username != '')
		{
			$result = validate_username($pic_username);
			if ( $result['error'] )
			{
				message_die(GENERAL_MESSAGE, $result['error_msg']);
			}
		}
	}

	// --------------------------------
	// Normalize uploaded files into flat array
	// --------------------------------

	if ( !isset($HTTP_POST_FILES['pic_file']) )
	{
		message_die(GENERAL_ERROR, 'Bad Upload');
	}

	$raw = $HTTP_POST_FILES['pic_file'];
	$upload_files = array();

	if ( is_array($raw['name']) )
	{
		foreach ( $raw['name'] as $i => $name )
		{
			if ( $raw['error'][$i] == 0 && $raw['size'][$i] > 0 )
			{
				$upload_files[] = array(
					'name'     => $name,
					'type'     => $raw['type'][$i],
					'tmp_name' => $raw['tmp_name'][$i],
					'size'     => $raw['size'][$i],
				);
			}
		}
	}
	else
	{
		if ( $raw['error'] == 0 && $raw['size'] > 0 )
		{
			$upload_files[] = $raw;
		}
	}

	if ( empty($upload_files) )
	{
		message_die(GENERAL_ERROR, 'Bad Upload');
	}

	$total_count = count($upload_files);
	$success_count = 0;
	$error_msgs = array();

	$ini_val = ( @phpversion() >= '4.0.0' ) ? 'ini_get' : 'get_cfg_var';
	$move_file = ( @$ini_val('open_basedir') != '' ) ? 'move_uploaded_file' : 'copy';

	foreach ( $upload_files as $file_idx => $upload_file )
	{
		$filetype = $upload_file['type'];
		$filesize = $upload_file['size'];
		$filetmp  = $upload_file['tmp_name'];
		$orig_name = pathinfo($upload_file['name'], PATHINFO_FILENAME);

		// Title: base title for single, "base N" or filename for batch
		if ( $total_count == 1 )
		{
			$pic_title = !empty($pic_title_base) ? $pic_title_base : $orig_name;
		}
		else
		{
			$pic_title = !empty($pic_title_base) ? $pic_title_base . ' ' . ($file_idx + 1) : $orig_name;
		}
		$pic_title = str_replace("\'", "''", htmlspecialchars($pic_title));
		if ( empty($pic_title) ) $pic_title = 'Photo ' . ($file_idx + 1);

		// Check file size
		if ( ($filesize == 0) || ($filesize > $album_config['max_file_size']) )
		{
			$error_msgs[] = htmlspecialchars($upload_file['name']) . ': ' . $lang['Bad_upload_file_size'];
			continue;
		}

		// Check file type
		$pic_filetype = null;
		switch ($filetype)
		{
			case 'image/jpeg':
			case 'image/jpg':
			case 'image/pjpeg':
			case 'jpeg':
			case 'pjpeg':
			case 'jpg':
				$pic_filetype = ($album_config['jpg_allowed'] == 1) ? '.jpg' : null;
				break;
			case 'image/png':
			case 'image/x-png':
			case 'png':
				$pic_filetype = ($album_config['png_allowed'] == 1) ? '.png' : null;
				break;
			case 'image/gif':
			case 'gif':
				$pic_filetype = ($album_config['gif_allowed'] == 1) ? '.gif' : null;
				break;
		}

		if ( $pic_filetype === null )
		{
			$error_msgs[] = htmlspecialchars($upload_file['name']) . ': ' . $lang['Not_allowed_file_type'];
			continue;
		}

		// Generate unique filename
		srand((double)microtime()*1000000);
		do
		{
			$pic_filename = md5(uniqid(rand())) . $pic_filetype;
		}
		while ( file_exists(ALBUM_UPLOAD_PATH . $pic_filename) );

		// Move file to upload directory
		$move_file($filetmp, ALBUM_UPLOAD_PATH . $pic_filename);
		@chmod(ALBUM_UPLOAD_PATH . $pic_filename, 0777);

		// Get image dimensions
		$pic_size   = getimagesize(ALBUM_UPLOAD_PATH . $pic_filename);
		$pic_width  = $pic_size[0];
		$pic_height = $pic_size[1];

		switch ($pic_filetype)
		{
			case '.jpg': $read_function = 'imagecreatefromjpeg'; break;
			case '.png': $read_function = 'imagecreatefrompng';  break;
			default:     $read_function = '';                     break;
		}

		if ( $read_function && !function_exists($read_function) )
		{
			@unlink(ALBUM_UPLOAD_PATH . $pic_filename);
			$error_msgs[] = htmlspecialchars($upload_file['name']) . ': ' . $lang['No_convert'];
			continue;
		}

		$gd_errored = FALSE;
		$src = $read_function ? @$read_function(ALBUM_UPLOAD_PATH . $pic_filename) : null;

		if ( !$src && $pic_filetype != '.gif' )
		{
			@unlink(ALBUM_UPLOAD_PATH . $pic_filename);
			$error_msgs[] = htmlspecialchars($upload_file['name']) . ': could not read image';
			continue;
		}

		// Resize if needed
		if ( ($pic_width > $album_config['max_width']) || ($pic_height > $album_config['max_height']) )
		{
			if ($pic_width > $pic_height)
			{
				$fixed_width  = $album_config['max_width'];
				$tmp1 = $pic_width / $album_config['max_width'];
				$tmp2 = $pic_height / $tmp1;
				$fixed_height = ($tmp2 <= $album_config['max_height']) ? $tmp2 : $album_config['max_height'];
			}
			else
			{
				$fixed_height = $album_config['max_height'];
				$tmp1 = $pic_height / $album_config['max_height'];
				$tmp2 = $pic_width / $tmp1;
				$fixed_width  = ($tmp2 <= $album_config['max_width']) ? $tmp2 : $album_config['max_width'];
			}

			$fixed = ($album_config['gd_version'] == 1) ? imagecreate($fixed_width, $fixed_height) : imagecreatetruecolor($fixed_width, $fixed_height);
			$resize_function = ($album_config['gd_version'] == 1) ? 'imagecopyresized' : 'imagecopyresampled';
			$resize_function($fixed, $src, 0, 0, 0, 0, $fixed_width, $fixed_height, $pic_width, $pic_height);
		}
		else
		{
			$fixed = $src;
		}

		if ( !$gd_errored && ($src || $pic_filetype == '.gif') )
		{
			$pic_fixed = $pic_filename;
			switch ($pic_filetype)
			{
				case '.jpg': imagejpeg($fixed, ALBUM_UPLOAD_PATH . $pic_fixed, 100); break;
				case '.png': imagepng($fixed, ALBUM_UPLOAD_PATH . $pic_fixed); break;
			}
			@chmod(ALBUM_UPLOAD_PATH . $pic_fixed, 0777);
		}
		else
		{
			@unlink(ALBUM_UPLOAD_PATH . $pic_filename);
			$error_msgs[] = htmlspecialchars($upload_file['name']) . ': processing error';
			continue;
		}

		// Generate thumbnail
		$pic_thumbnail = '';
		if ( ($album_config['thumbnail_cache'] == 1) && ($pic_filetype != '.gif') && ($album_config['gd_version'] > 0) )
		{
			if ( !$src )
			{
				$pic_thumbnail = '';
			}
			else if ( ($pic_width > $album_config['thumbnail_size']) || ($pic_height > $album_config['thumbnail_size']) )
			{
				if ($pic_width > $pic_height)
				{
					$thumbnail_width  = $album_config['thumbnail_size'];
					$thumbnail_height = $album_config['thumbnail_size'] * ($pic_height / $pic_width);
				}
				else
				{
					$thumbnail_height = $album_config['thumbnail_size'];
					$thumbnail_width  = $album_config['thumbnail_size'] * ($pic_width / $pic_height);
				}

				$thumbnail = ($album_config['gd_version'] == 1) ? imagecreate($thumbnail_width, $thumbnail_height) : imagecreatetruecolor($thumbnail_width, $thumbnail_height);
				$resize_function = ($album_config['gd_version'] == 1) ? 'imagecopyresized' : 'imagecopyresampled';
				@$resize_function($thumbnail, $src, 0, 0, 0, 0, $thumbnail_width, $thumbnail_height, $pic_width, $pic_height);

				$pic_thumbnail = $pic_filename;
				switch ($pic_filetype)
				{
					case '.jpg': @imagejpeg($thumbnail, ALBUM_CACHE_PATH . $pic_thumbnail, $album_config['thumbnail_quality']); break;
					case '.png': @imagepng($thumbnail, ALBUM_CACHE_PATH . $pic_thumbnail); break;
				}
				@chmod(ALBUM_CACHE_PATH . $pic_thumbnail, 0777);
			}
			else
			{
				$pic_thumbnail = $pic_filename;
				switch ($pic_filetype)
				{
					case '.jpg': @imagejpeg($src, ALBUM_CACHE_PATH . $pic_thumbnail, $album_config['thumbnail_quality']); break;
					case '.png': @imagepng($src, ALBUM_CACHE_PATH . $pic_thumbnail); break;
				}
				@chmod(ALBUM_CACHE_PATH . $pic_thumbnail, 0777);
			}
		}
		else if ($album_config['gd_version'] > 0)
		{
			$pic_thumbnail = '';
		}

		// Insert into DB
		$pic_approval = ($thiscat['cat_approval'] == 0) ? 1 : 0;
		$pic_time     = CR_TIME;
		$pic_user_id  = $userdata['user_id'];
		$pic_user_ip  = $userdata['session_ip'];

		$sql = "INSERT INTO " . ALBUM_TABLE . " (pic_filename, pic_thumbnail, pic_title, pic_desc, pic_user_id, pic_user_ip, pic_username, pic_time, pic_cat_id, pic_approval)
				VALUES ('$pic_fixed', '$pic_thumbnail', '$pic_title', '$pic_desc', '$pic_user_id', '$pic_user_ip', '$pic_username', '$pic_time', '$cat_id', '$pic_approval')";
		if ( !$result = $db->sql_query($sql) )
		{
			$error_msgs[] = htmlspecialchars($upload_file['name']) . ': DB error';
			continue;
		}

		$success_count++;

	} // end foreach upload_files

	// --------------------------------
	// Report results
	// --------------------------------

	if ($success_count > 0)
	{
		if ($thiscat['cat_approval'] == 0)
		{
			$message = ($total_count == 1)
				? $lang['Album_upload_successful']
				: 'Dodano ' . $success_count . ' z ' . $total_count . ' zdjęć.';
		}
		else
		{
			$message = $lang['Album_upload_need_approval'];
		}
	}
	else
	{
		$message = 'Nie udało się dodać żadnego zdjęcia.';
	}

	if ( !empty($error_msgs) )
	{
		$message .= '<br /><br /><b>Błędy:</b><br />' . implode('<br />', $error_msgs);
	}

	if ($cat_id != 0)
	{
		if ($success_count > 0 && $thiscat['cat_approval'] == 0)
		{
			$template->assign_vars(array(
				'META' => '<meta http-equiv="refresh" content="3;url=' . append_sid("album_cat.$phpEx?cat_id=$cat_id") . '">')
			);
		}
		$message .= "<br /><br />" . sprintf($lang['Click_return_category'], "<a href=\"" . append_sid("album_cat.$phpEx?cat_id=$cat_id") . "\">", "</a>");
	}
	else
	{
		if ($success_count > 0 && $thiscat['cat_approval'] == 0)
		{
			$template->assign_vars(array(
				'META' => '<meta http-equiv="refresh" content="3;url=' . append_sid("album_personal.$phpEx") . '">')
			);
		}
		$message .= "<br /><br />" . sprintf($lang['Click_return_personal_gallery'], "<a href=\"" . append_sid("album_personal.$phpEx") . "\">", "</a>");
	}

	$message .= "<br /><br />" . sprintf($lang['Click_return_album_index'], "<a href=\"" . append_sid("album.$phpEx") . "\">", "</a>");

	message_die(GENERAL_MESSAGE, $message);
}

?>
