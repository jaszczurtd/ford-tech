<?php
/***************************************************************************
 *                       lang_admin_album.php [Polish]
 *                       -------------------
 *     begin             : Sunday, February 02, 2003
 *     copyright         : (C) 2003 Smartor
 *     email             : smartor_xp@hotmail.com
 ****************************************************************************/

/***************************************************************************
 *
 *   This program is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation; either version 2 of the License, or
 *   (at your option) any later version.
 *
 ***************************************************************************/

//
// Configuration
//

// Check for user gender
$he = ($userdata['user_gender'] != 2) ? true : false;

$lang['Album_config'] = 'Konfiguracja albumu';
$lang['Album_config_explain'] = 'Tutaj możesz zmieniać główne ustawienia Albumu zdjęć';
$lang['Album_config_updated'] = 'Konfiguracja zmieniona';
$lang['Click_return_album_config'] = 'Kliknij %sTutaj%s żeby powrócić do konfiguracji albumu';
$lang['Max_pics'] = 'Maksymalna liczba zdjęć w jednej kategorii (-1 = nielimitowane)';
$lang['User_pics_limit'] = 'Maksymalna ilość zdjęć dla jednego użytkownika (-1 = nielimitowane)';
$lang['Moderator_pics_limit'] = 'Limit kategorii dla jednego moderatora (-1 = nielimitowane)';
$lang['Pics_Approval'] = 'Ustawienia zdjęć';
$lang['Rows_per_page'] = 'Ilość rzędów w mini galerii';
$lang['Cols_per_page'] = 'Ilość kolumn w mini galerii';
$lang['Thumbnail_quality'] = 'Jakość miniatur zdjęć (1-100)';
$lang['Thumbnail_cache'] = 'Cache minigalerii';
$lang['Manual_thumbnail'] = 'Ręczna minigaleria';
$lang['GD_version'] = 'Optymalizacja dla wersji GD';
$lang['GD_version_e'] = 'W zależności od systemu i rodzaju zainstalowanego kompresora grafiki, musisz wybrać eksperymentalnie wersję optymalizacji. Wersja 2 w systemach unixowych z reguły działa dobrze, przy wersji 1 miniatury kompresuje brzydko. Wersja 2 natomiast w systemach windowsowych często powoduje błąd przy dodawaniu zdjęcia, a wersja 1 działa dobrze i miniatury wyglądają ładnie';
$lang['Pic_Desc_Max_Length'] = 'Opis zdjęcia/Komentarz wielkość (bytes)';
$lang['Hotlink_prevent'] = 'Zapobieganie hotlinkom';
$lang['Hotlink_allowed'] = 'Zezwolenia hotlinków dla domen (oddzielanie przecinkami)';
$lang['Personal_gallery'] = 'Zezwolenia na tworzenie prywatnych galerii dla użytkowników';
$lang['Personal_gallery_limit'] = 'Limit zdjęć dla jednej prywatnej galerii (-1 = nielimitowane)';
$lang['Personal_gallery_view'] = 'Kto może przeglądać prywatne galerie';
$lang['Rate_system'] = 'Włącz oceny';
$lang['Rate_Scale'] =' Skala ocen';
$lang['Comment_system'] = 'Włącz komentarze';
$lang['Thumbnail_Settings'] = 'Ustawienia minigalerii';
$lang['Extra_Settings'] = 'Dodatkowe ustawienia';
$lang['Default_Sort_Method'] = 'Domyślna metoda sortowania';
$lang['Default_Sort_Order'] = 'Domyślny porządek sortowania';
$lang['Fullpic_Popup'] = 'Oryginalny widok zdjęcia jako PopUp';


// Personal Gallery Page
$lang['Personal_Galleries'] = 'Prywatne galerie';
$lang['Album_personal_gallery_title'] = 'Prywatna galeria';
$lang['Album_personal_gallery_explain'] = 'Tutaj możesz ustawić, która grupa użytkowników ma prawa do tworzenia i przeglądania własnych galerii, jeśli ogólnie wyłączył' .  (($he) ? 'e' : 'a') . 'ś możliwość tworzenia i przeglądu prywatnych galerii.';
$lang['Album_personal_successfully'] = 'Ustawienia zapisane';
$lang['Click_return_album_personal'] = 'Kliknij %sTutaj%s żeby wrócić do ustawień prywatnych galerii';

//
// Categories
//
$lang['Album_Categories_Title'] = 'Ustawienia kategorii Albumu';
$lang['Album_Categories_Explain'] = 'Tutaj możesz ustawić ustawienia tworzenia, dodawania, usuwania, sortowania, itp.';
$lang['Category_Permissions'] = 'Poziomy kategorii';
$lang['Category_Title'] = 'Tytuł kategorii';
$lang['Category_Desc'] = 'Opis kategorii';
$lang['View_level'] = 'Poziom dla podglądu';
$lang['Upload_level'] = 'Poziom dla dodawania';
$lang['Rate_level'] = 'Poziom dla oceny';
$lang['Comment_level'] = 'Poziom dla komentarzy';
$lang['Edit_level'] = ' Poziom dla edytowania';
$lang['Delete_level'] = 'Poziom dla kasowania';
$lang['New_category_created'] = 'Nowa kategoria została utworzona';
$lang['Click_return_album_category'] = 'Kliknij %sTutaj%s żeby powrócić do ustawień kategorii';
$lang['Category_updated'] = 'Kategoria została zaktualizowana';
$lang['Delete_Category'] = 'Usuń kategorie';
$lang['Delete_Category_Explain'] = 'W tym miejscu możesz usunąć kategorie i wybrać gdzie mają znaleźć się zdjęcia z usuwanej kategorii';

$lang['Delete_all_pics'] = 'Usuń wszystkie zdjęcia z tej kategorii';
$lang['Category_deleted'] = 'Kategoria usunięta';

//
// Permissions
//
$lang['Album_Auth_Title'] = 'Prawa użytkowników';
$lang['Album_Auth_Explain'] = 'Możesz wybrać które grupy lub użytkownicy będą moderatorami dla jakiej kategorii albumu.';
$lang['Select_a_Category'] = 'Wybierz kategorię';
$lang['Look_up_Category'] = 'Podgląd kategorii';
$lang['Album_Auth_successfully'] = 'Ustawienia zapisane';
$lang['Click_return_album_auth'] = 'Kliknij %sTutaj%s żeby powrócić do ustawień praw użytkowników';

$lang['Upload'] = 'Dodawanie';
$lang['Rate'] = 'Ocena';
$lang['Comment'] = 'Komentarz';

//
// Clear Cache
//
$lang['Clear_Cache'] = 'Wyczyść Cache';
$lang['Album_clear_cache_confirm'] = 'Jeśli masz włączony cache dla miniatur musisz wyczyścić cache po zmianie ustawień Albumu.<br /><br />Chcesz wyczyścić teraz?';

$lang['Create_album'] = 'Utwórz nowy album';
$lang['Create_sub_album'] = 'Utwórz podkategorie albumu';

$lang['Thumbnail_cache_cleared_successfully'] = '<br />Cache wyczyszczony<br />&nbsp;';

$lang['Watermark_transparent'] = 'Znak wodny';
$lang['Watermark_transparent_e'] = 'Podaj przezroczystość znaku wodnego w przedziale 1-99<br />Zostaje wykorzystany obrazek <b>/images/wm.png</b> możesz go zmienić.<br />0 - wyłączone';
$lang['Watermark_width'] = 'Znak wodny położenie w poziomie';
$lang['Watermark_width_e'] = 'Podaj wartość w punktach, wartość dodatnia - lewa strona<br />wartość ujemna - prawa strona, <b>mid</b> - wyśrodkowane';
$lang['Watermark_height'] = 'Znak wodny położenie w pionie';
$lang['Watermark_height_e'] = 'Podaj wartość w punktach, wartość dodatnia - góra<br />wartość ujemna - dół, <b>mid</b> - wyśrodkowane';

?>