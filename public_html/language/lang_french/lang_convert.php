<?php
/***************************************************************************
 *                             lang_convert.php
 *                            -------------------
 *   begin                : Tuesday, Jul 02, 2002
 *   copyright            : Ludovic ARNAUD
 *   email                : ashe@mtgfrance.com
 *
 *   $Id: lang_convert.php,v 1.1 2002/09/04 00:00:00 Ashe Exp $
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

$lang['Generate'] = 'Génerer';
$lang['Convert'] = 'Convertir';
$lang['Destroy'] = 'Détruire';

$lang['Download_more_convertors'] = "Télécharger de nouveaux convertisseurs";
$lang['Version'] = 'Version';
$lang['Author'] = 'Auteur';
$lang['Table_prefix'] = 'Préfix de table';

$lang['Forum_address'] = 'Adresse du forum';
$lang['Forum_address_explain'] = "(c'est l'adresse http de votre ancien forum)";

$lang['Forum_path'] = "Chemin d'accès au forum";
$lang['Forum_path_explain'] = '(chemin relatif de votre dossier phpBB au dossier de votre ancien forum)';

$lang['Optional_infos'] = 'Infos optionnelles';

$lang['Step_percent_completed'] = 'Étape <b>%d</b> sur <b>%d</b> : %d%% complétée';
$lang['Moving_to_next_step'] = 'Étape <b>%d</b> sur <b>%d</b> : %d%% complétée, en route vers la nouvelle étape';
$lang['Search_tables_cleared'] = 'Les tables de recherche ont été vidées, restauration en cours';
$lang['Search_restore_done'] = 'Restauration des tables de recherche terminée';

$lang['Click_return_convert'] = 'Cliquez %sici%s pour retourner au panneau de conversion';
$lang['Click_to_continue'] = 'Cliquez %sici% pour continuer';

$lang['Conversion_final_step'] = 'Étape finale en cours, veuillez patienter';
$lang['Conversion_completed'] = "Conversion terminée. Veuillez vérifier que tout fonctionne correctement puis vous serez libre de détruire votre ancien forum. Merci d'utiliser phpBB ;)";

$lang['No_convertors_found'] = "Aucun convertisseur n'a été trouvé";
$lang['Convertors_panel'] = 'Panneau de conversion';
$lang['Convertors'] = 'Convertisseurs';

$lang['Security_notice'] = 'Avertissement de sécurité';
$lang['Feature_locked'] = 'Cette fonction a été désactivée pour des raisons de sécurité';
$lang['Unlock_feature'] = 'Cliquez ici pour réactiver cette fonction';

$lang['No_tables_found'] = 'Aucune table trouvée';
$lang['No_tables_dropped'] = "Aucune table n'a été effacée";
$lang['Check_table_prefix'] = 'Veuillez vérifier votre préfixe de table et réessayez';
$lang['Default_prefix_is'] = 'Le préfixe par défaut pour %s est <b>%s</b>';
$lang['Tables_missing'] = 'Impossible de trouver ces tables : <b>%s</b>.';
$lang['Blank_prefix_found'] = 'A scan of your tables has shown a valid installation using no table prefix.';
$lang['Prefix_found'] = 'A scan of your tables has shown a valid installation using <b>%s</b> as table prefix.';

$lang['Choose_convertor'] = 'Veuillez choisir un convertisseur et réessayez';
$lang['Could_not_find_path'] = "Impossible de déterminer le chemin d'accès à votre ancien forum. Veuillez vérifier vos paramètres et réessayez";
$lang['File_not_found'] = 'Fichier <b>%s</b> introuvable';
$lang['Could_not_copy'] = 'Impossible de copier le fichier <b>%s</b> vers <b>%s</b><br /><br />Veuillez vérifier que le serveur web est autorisé à écrire dans le répertoire de destination';
$lang['Could_not_read'] = 'Impossible de lire <b>%s</b>';
$lang['Config_table_empty'] = 'La table de configuration importée est vide';
$lang['Make_folder_writable'] = 'Veuillez vous assurer que ce répertoire existe et que le serveur web est autorisé à écrire dedans puis réessayez:<br /><br /><b>%s</b>';
$lang['Make_folders_writable'] = 'Veuillez vous assurer que ces répertoires existent et que le serveur web est autorisé à écrire dedans puis réessayez:<br /><br /><b>%s</b>';
$lang['Default_category'] = 'Catégorie par défaut';

$lang['Confirm_destroy_forum'] = 'Êtes-vous sûr de vouloir détruire ce forum ?<br /><br /><b>%s</b>';
$lang['All_tables_dropped'] = 'Toutes les tables ont été effacées';

$lang['Click_to_stop_indexing'] = 'Cliquez ici pour arrêter la procédure';
//
// These ones have been blatantly stolen from psoTFX's latest commit muhahahaha :D
//
$lang['Search_indexing'] = 'Ré-indexation des tables de recherche';
$lang['Search_indexing_explain'] = "phpBB2 utilise un système de recherche avancé. Celui-ci décompose chaque message et sépare chaque mot, si ce mot n'est pas déjà présent il est stocké dans une table. Ensuite un lien est établi entre ce message et chacun des mots utilisés. Cela autorise une recherche rapide même au sein d'une grande base de données et aide à réduire la charge du serveur comparé à la plupart des autres méthodes.<br /><br />Néanmoins, si pour une raison quelconque ces tables devaient être désynchronisées (ne plus correspondre à l'état réel des messages) ou si vous changez la liste de mots non-autorisés ces tables doivent être mises à jour. Cette fonction vous permet de le faire.<br /><br />Veuillez noter que cette procédure peut prendre beaucoup de temps, particulièrement avec une grande base de données. Durant cette période vos forums seront automatiquement désactivés pour empêcher les utilisateurs de poster. Vous pouvez annuler cette procédure à n'importe quel moment.";
$lang['Indexing_stop_explain'] = "L'indexation des tables de recherche a été arrêtée. Veuillez noter que du fait que vous ayiez arrêté cette procédure avant sa fin certains des messages actuels ne seront pas pris en compte lors des futures recherches.";
$lang['Indexing_finished_explain'] = "La ré-indexation des tables de recherche est terminée.";

?>