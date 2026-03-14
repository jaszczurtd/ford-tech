<?php
/***************************************************************************
 *                                 index.php
 *                            -------------------
 *   begin                : Tuesday, Jul 02, 2002
 *   copyright            : Ludovic ARNAUD
 *   email                : ashe@mtgfrance.com
 *
 *   $Id: index.php,v 1.3.4 2003/02/28 00:00:00 Ashe Exp $
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
// Set an accurate start time in case extension.inc doesn't do it
//
$starttime = explode(' ', microtime());
$starttime = $starttime[0] + $starttime[1];

define('IN_PHPBB', 1);
define('IN_ADMIN', 1);
$phpbb_root_path = './../';
include($phpbb_root_path . 'extension.inc');
include($phpbb_root_path . 'common.' . $phpEx);
include($phpbb_root_path . 'convert/functions_convert.' . $phpEx);

$userdata = session_pagestart($user_ip, PAGE_INDEX);
init_userprefs($userdata);

if (file_exists($phpbb_root_path . 'language/lang_' . $board_config['default_lang'] . '/lang_convert.' . $phpEx))
{
	include($phpbb_root_path . 'language/lang_' . $board_config['default_lang'] . '/lang_convert.' . $phpEx);
}
elseif (file_exists($phpbb_root_path . 'language/lang_english/lang_convert.' . $phpEx))
{
	include($phpbb_root_path . 'language/lang_english/lang_convert.' . $phpEx);
}
else
{
	message_die(GENERAL_ERROR, 'Could not find the language file.', 'File missing');
}

if (!isset($board_config['convert_settings']))
{
	$convert_settings = array(
		'url'				=> 'http://',
		'path'				=> '../forum/',
		'converters_lock'	=> FALSE,
		'searchfill_lock'	=> FALSE,
		'converted'			=> FALSE
	);
	save_config('convert_settings', $convert_settings);
}
else
{
	$convert_settings = unserialize($board_config['convert_settings']);
	if ($convert_settings['converted'] && ($userdata['user_level'] != ADMIN))
	{
		if (!$userdata['session_logged_in'])
		{
			header('Location: ../' . append_sid("login.$phpEx?redirect=convert/index.$phpEx"));
			exit;
		}
		else
		{
			message_die(GENERAL_MESSAGE, 'Not_admin');
		}
	}
}

//
// DEBUG ONLY!!!
//
/**
	$debug = TRUE;
	$userdata['user_level'] = ADMIN;
	$convert_settings['converters_lock'] = FALSE;
/**/

if (!isset($_GET))
{
	$_GET = $HTTP_GET_VARS;
	$_POST = $HTTP_POST_VARS;
}
if (!empty($_POST['unlock_converters']))
{
	$mode = '';
	$convert_settings['converters_lock'] = FALSE;
	save_config('convert_settings', $convert_settings);
}
elseif (!empty($_POST['unlock_searchfill']))
{
	$mode = '';
	$convert_settings['searchfill_lock'] = FALSE;
	save_config('convert_settings', $convert_settings);
}
elseif (!empty($_POST['searchfill']))
{
	$mode = 'searchfill';
}
elseif (!empty($_POST['destroy']))
{
	$mode = 'destroy';
}
elseif (!empty($_POST['cancel']))
{
	$mode = '';
}
else
{
	$mode = (!empty($_POST['mode'])) ? $_POST['mode'] : ((!empty($_GET['mode'])) ? $_GET['mode'] : '');
	if (($mode == 'convert' || $mode == 'destroy') && $convert_settings['converters_lock'])
	{
		$mode = '';
	}
	elseif (($mode == 'searchfill') && $convert_settings['searchfill_lock'])
	{
		$mode = '';
	}
}

$converter_tag = (!empty($_POST['converter_tag'])) ? $_POST['converter_tag'] : ((!empty($_GET['converter_tag'])) ? $_GET['converter_tag'] : '');
$src_table_prefix = (!empty($_POST['src_table_prefix'])) ? trim($_POST['src_table_prefix']) : ((!empty($_GET['src_table_prefix'])) ? trim($_GET['src_table_prefix']) : '');

$return_convert =  '<br /><br />' . sprintf($lang['Click_return_convert'], '<a href="' . append_sid("index.$phpEx") . '">', '</a>');
$return_index =  '<br /><br />' . sprintf($lang['Click_return_index'], '<a href="' . append_sid("../index.$phpEx") . '">', '</a>');
$stop_indexing_link = '<br /><br /><a href="' . append_sid("index.$phpEx?mode=searchfill&step=cancel") . '">' . $lang['Click_to_stop_indexing'] . '</a>';

$page_title = $lang['Convertors_panel'];
$template->assign_var('L_PHPBB_ADMIN', $lang['Convertors_panel']);

switch ($mode)
{
	case 'destroy':
	if (empty($converter_tag))
	{
		message_die(GENERAL_ERROR, $lang['Choose_convertor'] . $return_convert);
	}
	$get_info = TRUE;
	require('./convert_' . $converter_tag . '.' . $phpEx);

	if (empty($_POST['confirm']))
	{
		include($phpbb_root_path . 'admin/page_header_admin.'.$phpEx);

		$template->set_filenames(array(
			'confirm_body' => 'confirm_body.tpl'
		));

		$template->assign_vars(array(
			'MESSAGE_TITLE' => $lang['Information'],
			'MESSAGE_TEXT' => sprintf($lang['Confirm_destroy_forum'], $converter_infos['forum_name']),

			'L_YES' => $lang['Yes'],
			'L_NO' => $lang['No'],

			'S_CONFIRM_ACTION' => append_sid("index.$phpEx"),
			'S_HIDDEN_FIELDS' => '<input type="hidden" name="mode" value="destroy" /><input type="hidden" name="confirm" value="1" /><input type="hidden" name="converter_tag" value="' . $converter_tag . '" /><input type="hidden" name="src_table_prefix" value="' . $src_table_prefix . '" />')
		);

		$template->pparse('confirm_body');
		include($phpbb_root_path . 'admin/page_footer_admin.'.$phpEx);		
	}

	$dropped_tables = 0;
	for ($i = 0; $i < count($tables); ++$i)
	{
		$sql = 'DROP TABLE ' . $src_table_prefix . $tables[$i];
		if ($db->sql_query($sql))
		{
			++$dropped_tables;
		}
	}
	$convert_settings['converters_lock'] = TRUE;
	save_config('convert_settings', $convert_settings);

	if ($dropped_tables)
	{
		$msg =  $lang['All_tables_dropped'];
	}
	else
	{
		$msg = $lang['No_tables_dropped'] . ' ' . $lang['Check_table_prefix'];
		$msg .= '<br /><br />' . sprintf($lang['Default_prefix_is'], $converter_infos['forum_name'], $converter_infos['table_prefix']);
	}
	message_die(GENERAL_MESSAGE, $msg . $return_convert . $return_index);

	case 'convert':
		if (empty($converter_tag))
		{
			message_die(GENERAL_ERROR, $lang['Choose_convertor'] . $return_convert);
		}
		require('./convert_' . $converter_tag . '.' . $phpEx);

		//
		// PHP3 compatibility
		//
		declare_missing_functions();

		if (!empty($_GET['jump']))
		{
			if (!empty($converter['execute_last']))
			{
				eval($converter['execute_last']);
			}
			if (!empty($converter['query_last']))
			{
				if (!is_array($converter['query_last']))
				{
					$converter['query_last'] = array($converter['query_last']);
				}
				for ($i = 0; $i < count($converter['query_last']); ++$i)
				{
					if (!$db->sql_query($converter['query_last'][$i]))
					{
						message_die(GENERAL_ERROR, 'Error while processing query_last.', '', __LINE__, __FILE__, $converter['query_last'][$i]);
					}
				}
			}

			//
			// Sanity check
			//
			fix_ghost_forums();
			//resynch('forums');

			//
			// Let's restore a few more settings
			//
			/*
			$sql = 'SELECT user_id, username FROM ' . USERS_TABLE
				. ' ORDER BY user_id DESC'
				. ' LIMIT 1';

			$result = $db->sql_query($sql);
			$row = $db->sql_fetchrow($result);
			save_config('newest_user_id', $row['user_id']);
			save_config('newest_username', $row['username']);

			$sql = 'SELECT COUNT(user_id) AS total FROM ' . USERS_TABLE
				. ' WHERE user_id <> -1';

			$result = $db->sql_query($sql);
			$row = $db->sql_fetchrow($result);
			save_config('num_users', $row['total']);
			*/

			$sql = 'SELECT MIN(user_regdate) AS board_startdate FROM ' . USERS_TABLE;
			$result = $db->sql_query($sql);
			$row = $db->sql_fetchrow($result);
			if (($row['board_startdate'] < $board_config['board_startdate'] && $row['board_startdate'] > 0) || !isset($board_config['board_startdate']))
			{
				save_config('board_startdate', $row['board_startdate']);
			}

			//
			// Ok, NOW we're done, lock the converters form... just in case.
			//
			$convert_settings['converted'] = TRUE;
			$convert_settings['converters_lock'] = TRUE;
			save_config('convert_settings', $convert_settings);

			$db->sql_query('DELETE FROM ' . SESSIONS_TABLE);

			meta_refresh("../index.$phpEx", 30);
			message_die(GENERAL_MESSAGE, $lang['Conversion_completed'] . $return_convert . $return_index);
		}

		$current_table = (isset($_GET['current_table'])) ? $_GET['current_table'] : 0;
		$skip_rows = (isset($_GET['skip_rows'])) ? $_GET['skip_rows'] : 0;

		if (!$current_table && !$skip_rows)
		{
			if (empty($_GET['confirm']))
			{
				if ($_POST['src_url'] != $convert_settings['url'])
				{
					$convert_settings['url'] = $_POST['src_url'];
				}
				if ($_POST['src_path'] != $convert_settings['path'])
				{
					$convert_settings['path'] = $_POST['src_path'];
				}
				if ($convert_settings['converted'] || $convert_settings['searchfill_lock'])
				{
					$convert_settings['converted'] = FALSE;
					$convert_settings['searchfill_lock'] = FALSE;
				}
				if (!empty($converter['test_file']))
				{
					if (!$path = get_path($convert_settings['path'], $convert_settings['url'], $converter['test_file']))
					{
						save_config('convert_settings', $convert_settings);
						message_die(GENERAL_ERROR, 'Could_not_find_path');
					}
					if ($path != $convert_settings['path'])
					{
						$convert_settings['path'] = $path;
					}
				}
				save_config('convert_settings', $convert_settings);

				//
				// If avatars / ranks / smilies folders are specified make sure they are writable
				//
				$bad_folders = array();
				$local_paths = array(
					'avatars_path'	=>	path($board_config['avatar_path']),
					'ranks_path'	=>	'images/ranks/',
					'smilies_path'	=>	path($board_config['smilies_path'])
				);
				while (list($folder, $local_path) = each($local_paths))
				{
					if (isset($converter[$folder]))
					{
						if (empty($converter['test_file']))
						{
							message_die(GENERAL_MESSAGE, "You must specify \$converter['test_file'] to use filecopy functions");
						}

						if (!is_writeable($phpbb_root_path . $local_path))
						{
							$bad_folders[] = $board_config['script_path'] . $local_path;
						}
					}
				}
				if (count($bad_folders))
				{
					$msg = (count($bad_folders) == 1) ? $lang['Make_folder_writable'] : $lang['Make_folders_writable'];
					sort($bad_folders);

					message_die(GENERAL_ERROR, sprintf($msg, implode('<br />', $bad_folders)) . $return_convert);
				}

				//
				// Grab all the tables used in converter
				//
				$missing_tables = $tables_list = $aliases = array();
				for ($i = 0; $i < count($converter['schema']); ++$i)
				{
					while (list($key, $val) = each($converter['schema'][$i]))
					{
						if (is_int($key) && !empty($val[1]))
						{
							if (preg_match('/([a-z0-9_]+)\.([a-z0-9_]+)\)* ?A?S? ?([a-z0-9_]*?)\.?([a-z0-9_]*)$/i', $val[1], $m))
							{
								$table = $src_table_prefix . $m[1];
								$tables_list[$table] = $table;

								if (!empty($m[3]))
								{
									$aliases[] = $src_table_prefix . $m[3];
								}
							}
						}
						elseif ($key == 'left_join')
						{
							if (!is_array($val))
							{
								$val = array($val);
							}
							for ($j = 0; $j < count($val); ++$j)
							{
								if (preg_match('/LEFT JOIN ([a-z0-9_]+) AS ([a-z0-9_]+)/i', $val[$j], $m))
								{
									$table = $src_table_prefix . $m[1];
									$tables_list[$table] = $table;

									if (!empty($m[2]))
									{
										$aliases[] = $src_table_prefix . $m[2];
									}
								}
							}
						}
					}
				}

				//
				// First we'll check that everything is here as expected
				//
				for ($i = 0; $i < count($aliases); ++$i)
				{
					unset($tables_list[$aliases[$i]]);
				}
				while (list(, $table) = each($tables_list))
				{
					$sql = 'SELECT COUNT(*) FROM ' . $table;
					if (!$db->sql_query($sql))
					{
						$missing_tables[] = $table;
					}
				}

				if (count($missing_tables))
				{
					$prefixes = array();
					switch (SQL_LAYER)
					{
						case 'mysql':
						case 'mysql4':
							if ($result = $db->sql_query('SHOW TABLES'))
							{
								while ($row = $db->sql_fetchrow($result))
								{
									if (count($row) > 1)
									{
										compare_table($tables, $row[0], $prefixes);
									}
									elseif (list(, $tablename) = @each($row))
									{
										compare_table($tables, $tablename, $prefixes);
									}
								}
							}
						break;
					}
					while (list($prefix, $count) = each($prefixes))
					{
						if ($count == count($tables))
						{
							$possible_prefix = $prefix;
							break;
						}
					}

					$msg = (!empty($converter_infos['table_prefix'])) ? '<br /><br />' . sprintf($lang['Default_prefix_is'], $converter_infos['forum_name'], $converter_infos['table_prefix']) : '';

					if (!empty($possible_prefix))
					{
						$msg .= '<br /><br />';
						$msg .= ($possible_prefix == '*') ? $lang['Blank_prefix_found'] : sprintf($lang['Prefix_found'], $possible_prefix);
					}
				}

				if (count($missing_tables) == count($tables_list))
				{
					message_die(GENERAL_ERROR, $lang['No_tables_found'] . ' ' . $lang['Check_table_prefix'] . $msg . $return_convert);
				}
				elseif (count($missing_tables))
				{
					message_die(GENERAL_ERROR, sprintf($lang['Tables_missing'], implode(', ', $missing_tables)) . '<br /><br />' . $lang['Check_table_prefix'] . $msg . $return_convert);
				}

				if (preg_match('/^mysql/', SQL_LAYER))
				{
					$sql = 'OPTIMIZE TABLES ' . implode(',', $tables_list);
					$db->sql_query($sql);
				}

				//
				// Ok, so everything is ok, display the pre_message
				//
				if (empty($debug) && !empty($converter_infos['pre_message']))
				{
					$msg = '<br />' . $converter_infos['pre_message'];
					$msg .= '<br /><br />' . sprintf($lang['Click_to_continue'], '<a href="' . append_sid("index.$phpEx?mode=convert&converter_tag=$converter_tag&src_table_prefix=$src_table_prefix&confirm=1") . '">', '</a>') . $return_convert . '<br /><br />';

					message_die(GENERAL_MESSAGE, $msg);
				}
			}

			//
			// Convert the config table
			//
			if (isset($config_schema) && count($config_schema))
			{
				restore_config($config_schema);
			}

			//
			// Now process queries and execute functions that have to be executed prior to the conversion
			//
			if (!empty($converter['execute_first']))
			{
				eval($converter['execute_first']);
			}
			if (!empty($converter['query_first']))
			{
				if (!is_array($converter['query_first']))
				{
					$converter['query_first'] = array($converter['query_first']);
				}
				for ($i = 0; $i < count($converter['query_first']); ++$i)
				{
					if (!$db->sql_query($converter['query_first'][$i]))
					{
						message_die(GENERAL_ERROR, 'Error while processing query_first.', '', __LINE__, __FILE__, $converter['query_first'][$i]);
					}
				}
			}
		}

		//
		// This loop takes one target table and processes it
		//
		while ($current_table < count($converter['schema']))
		{
			$schema = $converter['schema'][$current_table];
			if (empty($schema['target']))
			{
				++$current_table;
				continue;
			}
			if (!$skip_rows)
			{
				if (!empty($schema['execute_first']))
				{
					eval($schema['execute_first']);
				}
				if (!empty($schema['query_first']))
				{
					if (!is_array($schema['query_first']))
					{
						$schema['query_first'] = array($schema['query_first']);
					}
					for ($i = 0; $i < count($schema['query_first']); ++$i)
					{
						if (!$db->sql_query($schema['query_first'][$i]))
						{
							message_die(GENERAL_ERROR, "Error while processing query_first, table $current_table (\"" . $schema['target'] . '")', '', __LINE__, __FILE__, $schema['query_first'][$i]);
						}
					}
				}
			}
			
			//
			// Set up some variables
			//
			// $waiting_rows	holds rows for multirows insertion (MySQL only)
			// $src_tables		holds unique tables with aliases to select from
			// $src_fields		will quickly refer source fields (or aliases) corresponding to the current index
			// $select_fields	holds the names of the fields to retrieve
			//
			$sql_ignore = (preg_match('/^mysql/i', SQL_LAYER) && empty($debug)) ? 'IGNORE ' : '';
			$waiting_rows = $src_tables = $src_fields = $trg_fields = $select_fields = $joined_tables = $aliases = array();
			$insert_query = 'INSERT ' . $sql_ignore . 'INTO ' . $schema['target'] . ' (';

			//
			// This loop builds the SELECT query
			//
			while (list($key, $val) = each($schema))
			{
				if (is_int($key))
				{
					if (!empty($val[0]))
					{
						$trg_fields[$val[0]] = $key;
						$insert_query .= $val[0] . ', ';
					}
					//
					// This should cover about any case:
					//
					// table.field					=> SELECT table.field				FROM table
					// table.field AS alias			=> SELECT table.field	AS alias	FROM table
					// table.field AS table2.alias	=> SELECT table2.field	AS alias	FROM table table2
					// table.field AS table2.field	=> SELECT table2.field				FROM table table2
					//
					if (preg_match('/([a-z0-9_]+)\.([a-z0-9_]+)\)*? ?A?S? ?([a-z0-9_]*?)\.?([a-z0-9_]*)$/i', $val[1], $m))
					{
						if (!empty($m[3]))
						{
							// Table alias: store it then replace the source table with it

							$aliases[$m[3]] = $m[1];
							$src_tables[$m[3]] = $src_table_prefix . $m[1] . ' ' . $m[3];

							if ($m[2] == $m[4])
							{
								$val[1] = str_replace(' AS ' . $m[3] . '.' . $m[4], '', $val[1]);
							}
							else
							{
								$val[1] = str_replace('AS ' . $m[3] . '.' . $m[4], 'AS ' . $m[4], $val[1]);
							}
							$val[1] = str_replace($m[1] . '.' . $m[2], $m[3] . '.' . $m[2], $val[1]);
						}
						else
						{
							// No table alias

							$src_tables[$m[1]] = (empty($src_table_prefix)) ? $m[1] : $src_table_prefix . $m[1] . ' ' . $m[1];
						}

						if (preg_match('/^([a-z_]+)\(/i', $val[1], $match) && empty($m[4]))
						{
							$m[4] = strtolower($match[1] . '_' . $m[1] . '_' . $m[2]);
							$val[1] = trim($val[1]) . ' AS ' . $m[4];
						}
						$select_fields[$val[1]] = $val[1];
						$src_fields[$key] = (!empty($m[4])) ? $m[4] : $m[2];
					}
				}
				elseif ($key == 'where' || $key == 'group_by' || $key == 'order_by' || $key == 'having')
				{
					if (@preg_match_all('/([a-z0-9_]+)\.([a-z0-9_]+)/i', $val, $m))
					{
						for ($i = 0; $i < count($m[1]); ++$i)
						{
							$src_tables[$m[1][$i]] = (empty($src_table_prefix)) ? $m[1][$i] : $src_table_prefix . $m[1][$i] . ' ' . $m[1][$i];
						}
					}
				}
			}

			while (list($alias, $table) = each($aliases))
			{
				$src_tables[$alias] = $src_table_prefix . $table . ' ' . $alias;
			}

			if (!empty($schema['left_join']))
			{
				if (!is_array($schema['left_join']))
				{
					$schema['left_join'] = array($schema['left_join']);
				}
				for ($i = 0; $i < count($schema['left_join']); ++$i)
				{
					//
					// This won't handle concatened LEFT JOINs
					//
					if (!preg_match('/([a-z0-9_]+) LEFT JOIN ([a-z0-9_]+) A?S? ?([a-z0-9_]*?) ?(ON|USING)(.*)/i', $schema['left_join'][$i], $m))
					{
						message_die(GENERAL_ERROR, 'Could not understand LEFT JOIN #' . $i . ', table ' . $current_table);
					}

					if (!empty($aliases[$m[2]]))
					{
						if (!empty($m[3]))
						{
							message_die(GENERAL_ERROR, 'Naming conflict: ' . $m[2] . ' and ' . $m[3] . ' are both aliases<br /><br />' . $schema['left_join']);
						}

						$m[2] = $aliases[$m[2]];
						$m[3] = $m[2];
					}

					$right_table = $src_table_prefix . $m[2];
					if (!empty($m[3]))
					{
						unset($src_tables[$m[3]]);
					}
					elseif ($m[2] != $m[1])
					{
						unset($src_tables[$m[2]]);
					}
					
					if (strpos($src_tables[$m[1]], "\nLEFT JOIN"))
					{
						$src_tables[$m[1]] = '(' . $src_tables[$m[1]] . ")\nLEFT JOIN $right_table";
					}
					else
					{
						$src_tables[$m[1]] .= "\nLEFT JOIN $right_table";
					}

					if (!empty($m[3]))
					{
						unset($src_tables[$m[3]]);
						$src_tables[$m[1]] .= ' AS ' . $m[3];
					}
					elseif (!empty($src_table_prefix))
					{
						$src_tables[$m[1]] .= ' AS ' . $m[2];
					}
					$src_tables[$m[1]] .= ' ' . $m[4] . $m[5];
				}
			}

			$insert_query = substr($insert_query, 0, -2) . ') VALUES ';
			if (count($src_tables))
			{
				$distinct = (!empty($schema['distinct'])) ? 'DISTINCT ' : '';
				$sql = 'SELECT ' . $distinct . implode(', ', $select_fields) . " \nFROM " . implode(', ', $src_tables);
				if (!empty($schema['where']))
				{
					$sql .= "\nWHERE " . $schema['where'];
				}
				if (!empty($schema['group_by']))
				{
					$sql .= "\nGROUP BY " . $schema['group_by'];
				}
				if (!empty($schema['having']))
				{
					$sql .= "\nHAVING " . $schema['having'];
				}
				if (!empty($schema['order_by']))
				{
					$sql .= "\nORDER BY " . $schema['order_by'];
				}
				if ($skip_rows > 0)
				{
					$sql .= "\nLIMIT $skip_rows, 18446744073709551615";
				}

if (!empty($debug))
{
	echo "<pre>\n$sql\n</pre>";flush();
}
				if (!$result = $db->sql_query($sql))
				{
					message_die(GENERAL_ERROR, "Couldn't obtain table information.", '', __LINE__, __FILE__, $sql);
				}

				//
				// $auto_id can be used to generate ids where there's none,
				// it gets incremented at the beggining of the loop.
				//
				$auto_id = $skip_rows;
				$num_rows = $db->sql_numrows($result);
				$total_rows = $skip_rows + $num_rows;

				//
				// This loop processes each row
				//
				while (still_on_time())
				{
					if (!$row = $db->sql_fetchrow($result))
					{
						//
						// move to the next table
						//
						$db->sql_freeresult($result);
						break;
					}
					
					unset($sql_flag);
					reset($schema);

					++$auto_id;
					$insert_values = array();
					while (list($key, $fields) = each($schema))
					{
						if (is_int($key))
						{
							if (!empty($fields[0]))
							{
								//
								// We have a target field, if we haven't set $sql_flag yet it will be set to TRUE.
								// If a function has already set it to FALSE it won't change it.
								//
								if (!isset($sql_flag))
								{
									$sql_flag = TRUE;
								}

								$src_field = $src_fields[$key];
								if (empty($fields[2]))
								{
									if (empty($src_field))
									{
										$value = $fields[1];
									}
									else
									{
										$value = $row[$src_field];
									}
								}
								else
								{
									if (empty($src_field))
									{
										eval('
											$value = '.$fields[2].'($fields[1]);
										');
									}
									else
									{
										eval('
											$value = '.$fields[2].'($row[$src_field]);
										');
									}
								}

								$is_null = FALSE;
								if (is_field_null($fields[0]))
								{
									if (!empty($src_field))
									{
										if (is_null($row[$src_field]) || !isset($row[$src_field]))
										{
											$is_null = TRUE;
										}
									}
									elseif (is_null($value))
									{
										$is_null = TRUE;
									}
								}
								
								if ($is_null)
								{
									$insert_values[] = 'NULL';
								}
								else
								{
									$insert_values[] = format_sql_value($fields[0], $value);
								}
							}
							elseif (!empty($fields[2]))
							{
								if (empty($src_fields[$key]))
								{
									//
									// No target here, just execute the given function
									//
									eval($fields[2] . '();');
								}
								else
								{
									eval($fields[2] . '($row[' . $src_fields[$key] . ']);');
								}
							}
						} // if (is_int($key))
					} // while (list($key, $fields) = each($schema))

					if ($sql_flag)
					{
						switch (SQL_LAYER)
						{
							//
							// If MySQL, we'll wait to have 10 rows to submit at once
							//
							case 'mysql':
							case 'mysql4':
								$waiting_rows[] = '(' . implode(", ", $insert_values) . ')';
								if (count($waiting_rows) == 10)
								{
									$skip_rows += count($waiting_rows);
/*
if (!empty($debug))
{
	echo "<pre>$sql</pre>";
}
*/
									$sql = $insert_query . implode(', ', $waiting_rows);
									if (!$db->sql_query($sql))
									{
										message_die(GENERAL_ERROR, 'Could not process query.', '', __LINE__, __FILE__, $sql);
									}
									$waiting_rows = array();
								}
								break;
							
							default:
								++$skip_rows;

								$sql = $insert_query . '(' . implode(', ', $insert_values) . ')';
								if (!$db->sql_query($sql))
								{
									message_die(GENERAL_ERROR, 'Could not process query.', '', __LINE__, __FILE__, $sql);
								}
						}
					}
				} // while (still_on_time())
			} // if (count($src_tables))

			//
			// When we reach this point, either the current table has been processed or we're running out of time.
			//
			if (still_on_time())
			{
				//
				// We might still have some rows waiting
				//
				if (count($waiting_rows))
				{
					$sql = $insert_query . implode(', ', $waiting_rows);
					if (!$db->sql_query($sql))
					{
						message_die(GENERAL_ERROR, 'Could not process query.', '', __LINE__, __FILE__, $sql);
					}
/*
if (!empty($debug))
{
	echo "<pre>$sql</pre>";
}
*/
				}

				$skip_rows = 0;
				++$current_table;
			}
			else
			{
				$url = 'index.' . $phpEx . '?mode=convert&current_table=' . $current_table . '&skip_rows=' . $skip_rows . '&converter_tag=' . $converter_tag . '&src_table_prefix=' . $src_table_prefix;

				$percentage = ($skip_rows == 0) ? 0 : floor(100 / ($total_rows / $skip_rows));
				$msg = sprintf($lang['Step_percent_completed'], ++$current_table, count($converter['schema']), $percentage);

				meta_refresh($url);
				message_die(GENERAL_MESSAGE, $msg);
			}
		} // while ($current_table < count($converter['schema']))

		//
		// Process execute_last then we'll be done
		//
		meta_refresh('index.' . $phpEx . '?mode=convert&jump=final_step' . '&converter_tag=' . $converter_tag . '&src_table_prefix=' . $src_table_prefix);
		message_die(GENERAL_MESSAGE, $lang['Conversion_final_step']);
	break;

	//
	// Search tables regeneration
	//
	case 'searchfill':
		$step = (!empty($_GET['step'])) ? $_GET['step'] : '';
		
		if ($step == 'cancel')
		{
			if (empty($convert_settings['board_disable']))
			{
				save_config('board_disable', 0);
			}
			else
			{
				unset($convert_settings['board_disable']);
				save_config('convert_settings', $convert_settings);
			}

			message_die(GENERAL_MESSAGE, $lang['Indexing_stop_explain'] . $return_convert . $return_index);
		}

		if (!isset($_GET['start']))
		{
			if ($step == 'remove_common')
			{
				$percentage = 20;

				$sql = 'SELECT COUNT(*) AS total FROM ' . POSTS_TEXT_TABLE;
				$result = $db->sql_query($sql);
				$row = $db->sql_fetchrow($result);
				$common_threshold = floor(($row['total'] * $percentage) / 100);

				$sql = 'SELECT MIN(word_id) AS min_id, MAX(word_id) AS max_id FROM ' . SEARCH_WORD_TABLE ;
			}
			else
			{
				$sql = 'SELECT MIN(post_id) AS min_id, MAX(post_id) AS max_id FROM ' . POSTS_TEXT_TABLE;
			}

			$result = $db->sql_query($sql);
			$row = $db->sql_fetchrow($result);

			$start = $row['min_id'];
			$max = $row['max_id'];
		}
		else
		{
			if ($step == 'remove_common')
			{
				$common_threshold = $_GET['threshold'];
			}

			$start = intval($_GET['start']);
			$max = $_GET['max'];
		}

		switch ($step)
		{
		//
		// Step 4: remove common words
		//
		case 'remove_common':
			while (still_on_time() && ($start <= $max))
			{
				$end = $start + 500;
				$sql = 'SELECT word_id, COUNT(*) AS total'
					. ' FROM ' . SEARCH_MATCH_TABLE
					. ' WHERE word_id BETWEEN ' . $start . ' AND ' . $end
					. ' GROUP BY word_id'
					. ' HAVING total > ' . $common_threshold;
				if (!$result = $db->sql_query($sql))
				{
					message_die(GENERAL_ERROR, 'Could not retrieve common words.', '', __LINE__, __FILE__, $sql);
				}

				$word_ids = array();
				while ($row = $db->sql_fetchrow($result))
				{
					$word_ids[] = $row['word_id'];
				}
				if (count($word_ids))
				{
					$sql = 'UPDATE ' . SEARCH_WORD_TABLE
						. ' SET word_common = 1'
						. ' WHERE word_id IN (' . implode(', ', $word_ids) . ')';

					if (!$db->sql_query($sql))
					{
						message_die(GENERAL_ERROR, 'Could not mark common words.', '', __LINE__, __FILE__, $sql);
					}

					$sql = 'DELETE FROM ' . SEARCH_MATCH_TABLE
						. ' WHERE word_id IN (' . implode(', ', $word_ids) . ')';

					if (!$db->sql_query($sql))
					{
						message_die(GENERAL_ERROR, 'Could not delete common words.', '', __LINE__, __FILE__, $sql);
					}
				}

				$start = $end + 1;
			}
			if ($end >= $max)
			{
				if (empty($convert_settings['board_disable']))
				{
					save_config('board_disable', 0);
				}

				unset($convert_settings['board_disable']);
				$convert_settings['searchfill_lock'] = TRUE;
				save_config('convert_settings', $convert_settings);

				message_die(GENERAL_MESSAGE,  $lang['Indexing_finished_explain'] . $return_convert . $return_index);
			}
			$percentage = (($max / $end) == 0) ? 0 : floor(100 / ($max / $end));
			$msg = sprintf($lang['Step_percent_completed'], 3, 3, $percentage);
			$url = 'index.' . $phpEx . '?mode=searchfill&step=remove_common&threshold=' . $common_threshold . '&max=' . $max . '&start=' . $start;

			meta_refresh($url);
			message_die(GENERAL_MESSAGE, $msg . $stop_indexing_link);
		break;
		
		//
		// Step 3: phpbb_search_wordmatch
		//
		case 'wordmatch':
			$sql_priority = (preg_match('/^mysql/i', SQL_LAYER)) ? 'DELAYED ' : '';

			include($phpbb_root_path . 'includes/functions_search.' . $phpEx);
			$stopwords_array = @file($phpbb_root_path . 'language/lang_' . $board_config['default_lang'] . '/search_stopwords.txt'); 
			$synonyms_array = @file($phpbb_root_path . 'language/lang_' . $board_config['default_lang'] . '/search_synonyms.txt'); 

			while (still_on_time() && ($start <= $max))
			{
				$end = $start + 100;
				$sql = 'SELECT post_id, post_subject, post_text'
					. ' FROM ' . POSTS_TEXT_TABLE
					. ' WHERE post_id BETWEEN ' . $start . ' AND ' . $end;

				if (!$result = $db->sql_query($sql))
				{
					message_die(GENERAL_ERROR, 'Could not get posts text.', '', __LINE__, __FILE__, $sql);
				}

				while (still_on_time() && $row = $db->sql_fetchrow($result))
				{
					$start = $row['post_id'] + 1;

					$words_array = array();
					if (!empty($row['post_text']))
					{
						$words_array['text'] = words_unique(split_words(clean_words('post', $row['post_text'], $stopwords_array, $synonyms_array)));
					}
					if (!empty($row['post_text']))
					{
						$words_array['title'] = words_unique(split_words(clean_words('post', $row['post_subject'], $stopwords_array, $synonyms_array)));
					}

					while (list($type, $words) = each($words_array))
					{
						if (count($words))
						{
							$sql = 'INSERT ' . $sql_priority . 'INTO ' . SEARCH_MATCH_TABLE . ' (post_id, word_id, title_match)'
								. '		SELECT ' . $row['post_id'] . ', word_id, ' . (($type == 'title') ? 1 : 0)
								. '		FROM ' . SEARCH_WORD_TABLE
								. '		WHERE word_text IN ("' . implode('","', $words) . '")';

							if (!$db->sql_query($sql))
							{
								message_die(GENERAL_ERROR, 'Could not insert words.', '', __LINE__, __FILE__, $sql);
							}
if (!empty($debug))
{
	echo "<pre>$sql\n</pre>";flush();
}						}
					}
				}
				$db->sql_freeresult($result);
			}
			if ($end >= $max)
			{
				$msg = sprintf($lang['Moving_to_next_step'], 2, 3);
				$url = 'index.' . $phpEx . '?mode=searchfill&step=remove_common';
			}
			else
			{
				$percentage = (($max / $end) == 0) ? 0 : floor(100 / ($max / $end));
				$msg = sprintf($lang['Step_percent_completed'], 2, 3, $percentage);
				$url = 'index.' . $phpEx . '?mode=searchfill&step=wordmatch&max=' . $max . '&start=' . $start;
			}

			meta_refresh($url);
			message_die(GENERAL_MESSAGE, $msg . $stop_indexing_link);
		break;

		//
		// Step 2: phpbb_search_wordlist
		//
		case 'wordlist':
			include($phpbb_root_path . 'includes/functions_search.' . $phpEx);
			$stopwords_file = @file($phpbb_root_path . 'language/lang_' . $board_config['default_lang'] . '/search_stopwords.txt'); 
			$synonyms_file = @file($phpbb_root_path . 'language/lang_' . $board_config['default_lang'] . '/search_synonyms.txt'); 
			
			while (still_on_time() && ($start <= $max))
			{
				$end = $start + 50;
				$sql = 'SELECT post_subject, post_text'
					. ' FROM ' . POSTS_TEXT_TABLE
					. ' WHERE post_id BETWEEN ' . $start . ' AND ' . $end;
				if (!$result = $db->sql_query($sql))
				{
					message_die(GENERAL_ERROR, 'Could not get posts text.', '', __LINE__, __FILE__, $sql);
				}

				$text = '';
				while (still_on_time() && $row = $db->sql_fetchrow($result))
				{
					$text .= $row['post_subject'] . ' ' . $row['post_text'] . ' ';
				}
				$db->sql_freeresult($result);
				$words = split_words(clean_words('post', $text, $stopword_array, $synonym_array));
				unset($text);

				if (count($words))
				{
					$words = words_unique($words);
					switch (SQL_LAYER)
					{
						case 'mysql':
						case 'mysql4':
							$sql = 'INSERT IGNORE INTO ' . SEARCH_WORD_TABLE . ' (word_text)'
								. ' VALUES ("' . implode('"),("', $words) . '")';

							if (!$db->sql_query($sql))
							{
								message_die(GENERAL_ERROR, 'Could not insert words.', '', __LINE__, __FILE__, $sql);
							}
							break;
					
						case 'mssql':
							$sql = 'INSERT INTO ' . SEARCH_WORD_TABLE . ' (word_text)'
								. ' ("' . implode('"),("', $words) . '")';
							if (!$db->sql_query($sql))
							{
								message_die(GENERAL_ERROR, 'Could not insert words.', '', __LINE__, __FILE__, $sql);
							}
							break;
					
						default:
							for ($i = 0; $i < count($words); ++$i)
							{
								$sql = 'INSERT INTO ' . SEARCH_WORD_TABLE . ' (word_text, word_common)'
									. ' VALUES ("' . $words[$i] . '", 0)';
								if (!$db->sql_query($sql))
								{
									message_die(GENERAL_ERROR, 'Could not insert word.', '', __LINE__, __FILE__, $sql);
								}
							}
					}
if (!empty($debug))
{
	echo "<pre>$sql\n</pre>";flush();
}
				}
				$start = $end + 1;
			}
			if ($end >= $max)
			{
				$msg = sprintf($lang['Moving_to_next_step'], 1, 3);
				$url = 'index.' . $phpEx . '?mode=searchfill&step=wordmatch';
			}
			else
			{
				$percentage = (($max / $end) == 0) ? 0 : floor(100 / ($max / $end));
				$msg = sprintf($lang['Step_percent_completed'], 1, 3, $percentage);
				$url = 'index.' . $phpEx . '?mode=searchfill&step=wordlist&max=' . $max . '&start=' . $start;
			}
			meta_refresh($url);
			message_die(GENERAL_MESSAGE, $msg . $stop_indexing_link);
		break;

		//
		// Step 1: clear the tables, lock the forum
		//
		default:
			$convert_settings['board_disable'] = $board_config['board_disable'];
			save_config('convert_settings', $convert_settings);
			save_config('board_disable', TRUE);

			$tables = array(SEARCH_WORD_TABLE, SEARCH_MATCH_TABLE, SEARCH_TABLE);
			for ($i = 0; $i < count($tables); ++$i)
			{
				if (!$db->sql_query('DELETE FROM ' . $tables[$i]))
				{
					message_die(GENERAL_ERROR, 'Could not empty search tables.');
				}
				if (SQL_LAYER == 'postgres')
				{
					$db->sql_query('VACUUM ' . $tables[$i]);
				}
			}

			meta_refresh('index.' . $phpEx . '?mode=searchfill&step=wordlist');
			message_die(GENERAL_MESSAGE, $lang['Search_tables_cleared'] . $stop_indexing_link);
		}
	break;
	
	//
	// default
	//
	default:
		$get_info = TRUE;
		$converters = $sort = array();

		if (!$convert_settings['converters_lock'])
		{
			$handle = opendir('.');
			while ($entry = readdir($handle))
			{
				if (preg_match('/^convert_([a-z0-9_]+).' . $phpEx . '/i', $entry, $m))
				{
					include('./' . $entry);
					if (isset($converter_infos))
					{
						$sort[strtolower($converter_infos['forum_name'])] = count($converters);
						$converters[] = array(
							'tag'			=>	$m[1],
							'forum_name'	=>	$converter_infos['forum_name'],
							'version'		=>	$converter_infos['version'],
							'table_prefix'	=>	$converter_infos['table_prefix'],
							'author'		=>	$converter_infos['author']
						);
					}
					unset($converter_infos);
				}
			}
			closedir($handle);
		}

		include($phpbb_root_path . 'admin/page_header_admin.' . $phpEx);
		$template->set_filenames(array(
			'body' => 'admin/convert_body.tpl'
		));

		$block = ($convert_settings['converters_lock']) ? 'converters_locked' : ((count($converters)) ? 'converters_unlocked' : 'no_converters');
		$template->assign_block_vars($block, array());

		$block = ($convert_settings['searchfill_lock']) ? 'searchfill_locked' : 'searchfill_unlocked';
		$template->assign_block_vars($block, array());

		$i = 0;
		@ksort($sort);
		while (list(, $index) = each($sort))
		{
			++$i;
			$template->assign_block_vars('converter', array(
				'ROW_CLASS'			=>	($i % 2) ? 'row1' : 'row2',

				'CONVERTER_TAG'		=>	$converters[$index]['tag'],
				'FORUM_NAME'		=>	$converters[$index]['forum_name'],
				'CONVERTER_VERSION'	=>	$converters[$index]['version'],
				'CONVERTER_AUTHOR'	=>	$converters[$index]['author'],
				'TABLE_PREFIX'		=>	((empty($converters[$index]['table_prefix'])) ? '' : $converters[$index]['table_prefix'])
			));
		}

		$template->assign_vars(array(
			'TABLE_PREFIX'				=>	(empty($convert_settings['table_prefix'])) ? '' : $convert_settings['table_prefix'],
			'URL'						=>	(empty($convert_settings['url'])) ? 'http://' : $convert_settings['url'],
			'PATH'						=>	(empty($convert_settings['path'])) ? '../forum/' : $convert_settings['path'],

			'L_CONVERT_TITLE'			=>	$lang['Convertors_panel'],
			'L_CONVERTERS'				=>	$lang['Convertors'],
			'L_NO_CONVERTERS'			=>	$lang['No_convertors_found'],
			'L_FORUM'					=>	$lang['Forum'],
			'L_VERSION'					=>	$lang['Version'],
			'L_AUTHOR'					=>	$lang['Author'],

			'L_CONVERT'					=>	$lang['Convert'],
			'L_DESTROY'					=>	$lang['Destroy'],
			'L_GET_CONVERTERS'			=>	$lang['Download_more_convertors'],

			'L_SEARCHFILL'				=>	$lang['Search_indexing'],
			'L_SEARCHFILL_EXPLAIN'		=>	$lang['Search_indexing_explain'],
			'L_GENERATE'				=>	$lang['Generate'],

			'L_OPTIONAL_INFOS'			=>	$lang['Optional_infos'],
			'L_TABLE_PREFIX'			=>	$lang['Table_prefix'],
			'L_FORUM_ADDRESS'			=>	$lang['Forum_address'],
			'L_FORUM_ADDRESS_EXPLAIN'	=>	$lang['Forum_address_explain'],
			'L_FORUM_PATH'				=>	$lang['Forum_path'],
			'L_FORUM_PATH_EXPLAIN'		=>	$lang['Forum_path_explain'],

			'L_SECURITY_NOTICE'			=>	$lang['Security_notice'],
			'L_FEATURE_LOCKED'			=>	$lang['Feature_locked'],
			'L_UNLOCK_FEATURE'			=>	$lang['Unlock_feature'],

			'U_FORM_ACTION'				=>	append_sid('index.' . $phpEx),
			'U_CONVERTERS_PAGE'			=>	'http://www.phpbb.com/downloads.php#converters',

		));
		$template->pparse('body');
		include($phpbb_root_path . 'admin/page_footer_admin.' . $phpEx);
}
?>