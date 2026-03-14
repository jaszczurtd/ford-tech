<?php
/***************************************************************************
 *                             lang_convert.php
 *                            -------------------
 *   begin                : Tuesday, Jul 02, 2002
 *   copyright            : Ludovic ARNAUD
 *   email                : ashe@mtgfrance.com
 *
 *   $Id: lang_convert.php,v 1.2 2002/07/24 00:00:00 Ashe Exp $
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

$lang['Generate'] = 'Generate';
$lang['Convert'] = 'Convert';
$lang['Destroy'] = 'Destroy';

$lang['Download_more_convertors'] = 'Download more convertors';
$lang['Version'] = 'Version';
$lang['Author'] = 'Author';
$lang['Table_prefix'] = 'Table prefix';

$lang['Forum_address'] = 'Forum address';
$lang['Forum_address_explain'] = '(this is the http address of your former forum)';

$lang['Forum_path'] = 'Forum path';
$lang['Forum_path_explain'] = '(this is the relative -to phpBB main directory- server path to your former forum)';

$lang['Optional_infos'] = 'Optional infos';

$lang['Step_percent_completed'] = 'Step <b>%d</b> of <b>%d</b>: %d%% completed';
$lang['Moving_to_next_step'] = 'Step <b>%d</b> of <b>%d</b> completed, moving to the next step';
$lang['Search_tables_cleared'] = 'Search tables have been emptied, restore in progress';
$lang['Search_restore_done'] = 'Search tables restore completed';

$lang['Click_to_continue'] = 'Click %sHere%s to continue';
$lang['Click_return_convert'] = 'Click %sHere%s to return to the convertors panel';

$lang['Conversion_final_step'] = 'Final step in progress, please wait.';
$lang['Conversion_completed'] = 'Conversion completed. Please check that everything works correctly then you will be free to destroy your former forum. Thanks for using phpBB ;)';

$lang['No_convertors_found'] = 'No convertors have been found';
$lang['Convertors_panel'] = 'Convertors panel';
$lang['Convertors'] = 'Convertors';

$lang['Security_notice'] = 'Security notice';
$lang['Feature_locked'] = 'This feature has been disabled for security reasons.';
$lang['Unlock_feature'] = 'Click here to unlock this feature.';

$lang['No_tables_found'] = 'No tables found.';
$lang['No_tables_dropped'] = 'No tables have been removed.';
$lang['Check_table_prefix'] = 'Please check your table prefix and try again.';
$lang['Default_prefix_is'] = 'The default table prefix for %s is <b>%s</b>';
$lang['Tables_missing'] = 'Could not find these tables: <b>%s</b>.';
$lang['Blank_prefix_found'] = 'A scan of your tables has shown a valid installation using no table prefix.';
$lang['Prefix_found'] = 'A scan of your tables has shown a valid installation using <b>%s</b> as table prefix.';

$lang['Choose_convertor'] = 'Please choose a convertor then try again';
$lang['Could_not_find_path'] = 'Could not find path to your former forum. Please check your settings and try again';
$lang['File_not_found'] = 'File <b>%s</b> not found';
$lang['Could_not_copy'] = 'Could not copy file <b>%s</b> to <b>%s</b><br /><br />Please check that the target directory exists and is writable by the webserver';
$lang['Could_not_read'] = 'Could not read <b>%s</b>';
$lang['Config_table_empty'] = 'The imported config table is empty';
$lang['Make_folder_writable'] = 'Please make sure that this folder exists and is writable by the webserver then try again:<br /><br /><b>%s</b>';
$lang['Make_folders_writable'] = 'Please make sure that these folders exist and are writable by the webserver then try again:<br /><br /><b>%s</b>';
$lang['Default_category'] = 'Default category';

$lang['Confirm_destroy_forum'] = 'Are you sure you want to destroy this forum? <br /><br /><b>%s</b>';
$lang['All_tables_dropped'] = 'All the tables have been removed';

$lang['Click_to_stop_indexing'] = 'Click here to stop search re-indexing';

//
// These ones have been blatantly stolen from psoTFX's latest commit muhahahaha :D
//
$lang['Search_indexing'] = 'Search Indexing';
$lang['Search_indexing_explain'] = 'phpBB2 uses a fulltext search system. This breaks down each post into seperate words and then, if the word does not already exist it stores those words in a table. In turn the post is linked to each word it contains in this table. This allows quick searching of large databases and helps reduce load on the server compared to most other methods.<br /><br />However, if the tables get out of sync for some reason or you change the minimum, maximum or disallowed list of words the tables need updating. This facility allows you to do just that.<br /><br />Please be aware this procedure can take a long time, particularly on large databases. During this period your forum will be automatically shut down to prevent people posting. You can cancel the procedure at any time.';
$lang['Indexing_stop_explain'] = 'Search re-indexing has been stopped. Please note that because you stopped the procedure before it completed some posts will now not appear when words they contain are searched for.';
$lang['Indexing_finished_explain'] = 'Search re-indexing has been completed successfully.';

?>