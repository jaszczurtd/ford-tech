<?php 
/*************************************************************************** 
*                             lang_convert.php 
*                            ------------------- 
*   begin                : Tuesday, Jul 02, 2002 
*   copyright            : Ludovic ARNAUD 
*   email                : ashe@mtgfrance.com 
* 
*   $Id: lang_convert.php,v 1.1 2002/07/20 00:00:00 Ashe Exp $ 
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
// German translation by likeatim
//

$lang['Generate'] = 'Erzeugen'; 
$lang['Convert'] = 'Konvertieren'; 
$lang['Destroy'] = 'Zerstören'; 

$lang['Download_more_converters'] = 'Mehr Konverter runterladen'; 
$lang['Version'] = 'Version'; 
$lang['Author'] = 'Autor'; 
$lang['Table_prefix'] = 'Prefix der Tabellen'; 

$lang['Forum_address'] = 'Adresse des Forums'; 
$lang['Forum_address_explain'] = '(Das ist die HTTP-Addresse Ihres alten Forums)'; 

$lang['Forum_path'] = 'Pfad zum Forum'; 
$lang['Forum_path_explain'] = '(Das ist der relative Pfad (relativ zum phpBB-Ordner) zu ihrem alten Forum)'; 

$lang['Optional_infos'] = 'Zusätzliche Informationen'; 

$lang['Step_percent_completed'] = 'Schritt <b>%d</b> von <b>%d</b>: %d%% durchgeführt'; 
$lang['Moving_to_next_step'] = 'Schritt <b>%d</b> von <b>%d</b> durchgeführt, beginne mit dem nächsten Schritt'; 
$lang['Search_tables_cleared'] = 'Die Suche-Tabellen wurden geleert und werden gerade wiederhergestellt'; 
$lang['Search_restore_done'] = 'Wiederherstellung der Suche-Tabellen komplett.'; 

$lang['Click_return_convert'] = '%sHier klicken%s um zum Anfangsbildschirm des Konverters zurückzukehren'; 
$lang['Click_to_continue'] = '%sHier klicken%s, um fortzufahren';

$lang['Conversion_final_step'] = 'Konvertierung wird abgeschlossen, bitte warten.'; 
$lang['Conversion_completed'] = 'Konvertierung abgeschlossen. Wenn alles korrekt funktioniert, können Sie Ihr altes Forum löschen. Danke, daß Sie sich für phpBB entschieden haben ;)'; 

$lang['No_converters_found'] = 'Kein Konverter gefunden'; 
$lang['Converters_panel'] = 'Konverter-Anfangsbildschirm'; 
$lang['Converters'] = 'Konverter'; 

$lang['Security_notice'] = 'Sicherheitshinweis'; 
$lang['Feature_locked'] = 'Diese Funktion ist aus Sicherheitsgründen nicht verfügbar.'; 
$lang['Unlock_feature'] = 'Hier klicken, um diese Funktion zu aktivieren.'; 

$lang['No_tables_found'] = 'Keine Tabellen gefunden.'; 
$lang['No_tables_dropped'] = 'Es wurden keine Tabellen entfernt.'; 
$lang['Check_table_prefix'] = 'Bitte überprüfen Sie den Prefix ihrer Tabellen und versuchen Sie es nochmals.'; 
$lang['Default_prefix_is'] = 'Der übliche Tabellen Prefix für das %s ist <b>%s</b>';
$lang['Tables_missing'] = 'Diese Tabellen wurden nicht gefunden: <b>%s</b>.'; 
$lang['Blank_prefix_found'] = 'A scan of your tables has shown a valid installation using no table prefix.';
$lang['Prefix_found'] = 'A scan of your tables has shown a valid installation using <b>%s</b> as table prefix.';

$lang['Choose_converter'] = 'Bitte wählen Sie einen Konverter aus und versuchen Sie es nochmals.'; 
$lang['Could_not_find_path'] = 'Pfad zum alten Forum nicht gefunden. Bitte überprüfen Sie ihre Angaben und versuchen Sie es nochmals.'; 
$lang['File_not_found'] = 'Datei <b>%s</b> nicht gefunden'; 
$lang['Could_not_copy'] = 'Konnte die Datei <b>%s</b> nicht nach <b>%s</b> kopieren<br /><br />Bitte überprüfen Sie, ob das Zielverzeichnis Schreibrechte hat und versuchen Sie es nochmals.'; 
$lang['Could_not_read'] = 'Konnte <b>%s</b> nicht lesen'; 
$lang['Config_table_empty'] = 'Die importierte Konfigurationstabelle ist leer.'; 
$lang['Make_folder_writable'] = 'Bitte überprüfen Sie, das folgender Ordner Schreibrechte hat und versuchen Sie es nochmals:<br /><br /><b>%s</b>'; 
$lang['Make_folders_writable'] = 'Bitte überprüfen Sie, das folgende Ordner Schreibrechte haben und versuchen Sie es nochmals:<br /><br /><b>%s</b>'; 
$lang['Default_category'] = 'Standard Kategorie'; 

$lang['Confirm_destroy_forum'] = 'Sind Sie sicher, daß Sie folgendes Forum löschen wollen?<br /><br /><b>%s</b>'; 
$lang['All_tables_dropped'] = 'Alle Tabellen wurden entfernt'; 

$lang['Click_to_stop_indexing'] = 'Hier klicken um die Neuindizierung der Suche zu stoppen'; 

$lang['Search_indexing'] = 'Suchindizierung'; 
$lang['Search_indexing_explain'] = 'phpBB2 benutzt ein Volltext-Suchsystem. Jedes Wort jeden Beitrags wird separat in einer Tabelle gespeichert, wenn es nicht schon vorhanden ist. Der Beitrag wird mit dem gespeicherten Wort verlinkt. Das ermöglicht eine schnelle Suche auch in grossen Datenbanken und reduziert die Serverbelastung verglichen mit den meisten anderen Methoden.<br /><br />Wenn aber die Tabellen aus bestimmten Gründen nicht mehr syncron sind oder die Minimum-, Maximum- oder Verbotene-Worte-Liste verändert wird, brauchen die entsprechenden Tabellen ein Update. Die Suchindizierung macht genau das.<br /><br />Dies kann ein lange Zeit dauern, besonders bei grossen Datenbanken. Während der Suchindizierung ist ihr Forum automatisch offline. Die Indizierung kann aber jederzeit angehalten werden.'; 
$lang['Indexing_stop_explain'] = 'Die Suchindizierung wurde angehalten. Daher werden bei der Suche manche Beiträge nicht angezeigt werden.'; 
$lang['Indexing_finished_explain'] = 'Die Neuindizierung der Suche wurde erfolgreich abgeschlossen.'; 
?>