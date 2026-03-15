<?php
/***************************************************************************
 *                          lang_main_album.php [English]
 *                              -------------------
 *     begin                : Sunday, February 02, 2003
 *     copyright            : (C) 2003 Smartor
 *     email                : smartor_xp@hotmail.com
 *
 *     $Id: lang_main_album.php,v 1.0.6 2003/03/05 20:12:38 ngoctu Exp $
 *
 ****************************************************************************/

/***************************************************************************
 *
 *   This program is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation; either version 2 of the License, or
 *   (at your option) any later version.
 *
 ***************************************************************************/

// Check for user gender
$he = ($userdata['user_gender'] != 2) ? true : false;

//
// Album Index
//
$lang['Photo_Album'] = 'Album zdjęć';
$lang['Pics'] = 'Zdjęcia';
$lang['Last_Pic'] = 'Ostatnie zdjęcie';
$lang['Public_Categories'] = 'Kategorie publiczne';
$lang['No_Pics'] = 'Brak zdjęć';
$lang['Users_Personal_Galleries'] = 'Galerie użytkowników';
$lang['Your_Personal_Gallery'] = 'Twoja prywatna galeria';
$lang['Recent_Public_Pics'] = 'Ostatnie zdjęcia';

$lang['View'] = 'Odsłon';

//
// Category View
//
$lang['Category_not_exist'] = 'Ta kategoria nie istnieje lub nie posiadasz do niej praw dostępu';
$lang['Upload_Pic'] = 'Dodaj zdjęcia';
$lang['Pic_Title'] = 'Tytuł zdjęcia';

$lang['Album_moderate_can'] = '<b>Możesz</b> %smoderować%s tę kategorie';

$lang['Edit_pic'] = 'Edytuj';
$lang['Delete_pic'] = 'Usuń';
$lang['Rating'] = 'Oceny';
$lang['Comments'] = 'Komentarze';
$lang['New_Comment'] = 'Dodaj komentarz';

$lang['Not_rated'] = '<i>nie ocenione</i>';

//
// Upload
//
$lang['Pic_Desc'] = 'Opis zdjęcia';
$lang['Plain_text_only'] = 'Tylko normalny tekst';
$lang['Max_length'] = 'Max długość (bytes)';
$lang['Upload_pic_from_machine'] = 'Wybierz zdjęcie ze swojego komputera';
$lang['Upload_to_Category'] = 'Dodaj do kategorii';
$lang['Upload_thumbnail'] = 'Dodaj miniaturkę zdjęcia';
$lang['Upload_thumbnail_explain'] = 'Musi być tego samego typu co twoje zdjęcie';
$lang['Thumbnail_size'] = 'Rozmiar miniatury (pixele)';
$lang['Filetype_and_thumbtype_do_not_match'] = 'Twoje zdjęcie i miniatura musi być tego samego typu';

$lang['Upload_no_title'] = 'Musisz dodać tytuł swojego zdjęcia';
$lang['Upload_no_file'] = 'Musisz podać ścieżkę i nazwę pliku';
$lang['Desc_too_long'] = 'Opis jest za długi';

$lang['Max_file_size'] = 'Maksymalna wielkość pliku (bytes)';
$lang['Max_width'] = 'Maksymalna szerokość (pixel)';
$lang['Max_height'] = 'Maksymalna wysokość (pixel)';

$lang['JPG_allowed'] = 'Dozwolony plik JPG';
$lang['PNG_allowed'] = 'Dozwolony plik PNG';
$lang['GIF_allowed'] = 'Dozwolony plik GIF ';

$lang['Album_reached_quota'] = 'W tej kategorii została osiągnięta maksymalna ilość zdjęć, nie możesz więc dodać już żadnego.';
$lang['User_reached_pics_quota'] = 'Przekroczył' .  (($he) ? 'e' : 'a') . 'ś limit dodanych zdjęć, nie możesz już dodać żadnego. Jeśli jest to konieczne i możliwe, usuń jakieś swoje poprzednie zdjęcie.';

$lang['Bad_upload_file_size'] = 'Plik twojego zdjęcia jest zbyt duży, lub uszkodzony';
$lang['Not_allowed_file_type'] = 'Typ twojego pliku nie jest dozwolony';
$lang['Upload_image_size_too_big'] = 'Rozmiar (w pixelach) twojego zdjęcia jest za duży';
$lang['Upload_thumbnail_size_too_big'] = 'Rozmiar miniatury twojego zdjęcia (w pixelach) jest za duży';

$lang['Missed_pic_title'] = 'Musisz podać tytuł zdjęcia';

$lang['Album_upload_successful'] = 'Zdjęcie dodane';
$lang['Album_upload_need_approval'] = 'Twoje zdjęcie zostało dodane<br /><br />Zdjęcie musi zostać zaakceptowane przez moderatora, lub administratora';

$lang['Click_return_category'] = 'Kliknij %sTutaj%s żeby powrócić do kategorii';
$lang['Click_return_album_index'] = 'Kliknij %sTutaj%s żeby powrócić do menu głównego albumu';

// View Pic
$lang['Pic_not_exist'] = 'To zdjęcie nie istnieje';

// Edit Pic
$lang['Edit_Pic_Info'] = 'Zmień informacje o zdjęciu';
$lang['Pics_updated_successfully'] = 'Informacje zaktualizowane';

// Delete Pic
$lang['Album_delete_confirm'] = 'Jesteś pew' .  (($he) ? 'ien' : 'na') . ' że chcesz usunąć zdjęcie?';
$lang['Pics_deleted_successfully'] = 'Zdjęcie usunięte.';

//
// ModCP
//
$lang['Approval'] = 'Zatwierdzono';
$lang['Approve'] = 'Zatwierdz';
$lang['Unapprove'] = 'Confij';
$lang['Status'] = 'Status';
$lang['Locked'] = 'Zablokowane';
$lang['Not_approved'] = 'Nie Zatwierdzone';
$lang['Approved'] = 'Zatwierdzone';
$lang['Move_to_Category'] = 'Przenies do kategorii';
$lang['Pics_moved_successfully'] = 'Zdjęcie(a) zostało(y) przeniesione';
$lang['Pics_locked_successfully'] = 'Zdjęcie(a) zostało(y) zablokowane';
$lang['Pics_unlocked_successfully'] = 'Zdjęcie(a) zostało(y) odblokowane';
$lang['Pics_approved_successfully'] = 'Zdjęcie(a) zostało(y) Zatwierdzone';
$lang['Pics_unapproved_successfully'] = 'Zdjęcie(a) zostało(y) Cofnięte';

//
// Rate
//
$lang['Current_Rating'] = 'Aktualne oceny';
$lang['Please_Rate_It'] = 'Oceń';
$lang['Already_rated'] = 'Już oceniał' .  (($he) ? 'e' : 'a') . 'ś to zdjęcie';
$lang['Album_rate_successfully'] = 'Zdjęcie zostało ocenione';

//
// Comment
//
$lang['Comment_no_text'] = 'Dodaj swój komentarz';
$lang['Comment_too_long'] = 'Komentarz za długi';
$lang['Comment_delete_confirm'] = 'Jesteś pew' .  (($he) ? 'ien' : 'na') . ' że chcesz usunąć swój komentarz?';
$lang['Pic_Locked'] = 'To zdjęcie zostało zablokowane przez moderatora, nie można dodawać komentarzy.';

//
// Personal Gallery
//
$lang['Personal_Gallery_Explain'] = 'Możesz przeglądać galerie innych użytkowników, klikając na link w ich profilu';
$lang['Personal_gallery_not_created'] = 'Galeria %s jest pusta lub nie została utworzona';
$lang['Not_allowed_to_create_personal_gallery'] = 'Prywatne galerie są wyłączone';
$lang['Click_return_personal_gallery'] = 'Kliknij %sTutaj%s żeby wrócić do prywatnej galerii';

$lang['No_convert'] = 'Nie można stworzyć miniatury zdjęcia. Na serwerze brak zainstalowanego konwertera zdjęć.<br />Możesz wyłączyć kompresję GD i ustawić ręczne tworzenie miniatur w Panelu Admina.';
$lang['Sub-catagories'] = 'Podkategorie';
?>