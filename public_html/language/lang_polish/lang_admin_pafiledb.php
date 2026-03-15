<?php

// Check for user gender
$he = ($userdata['user_gender'] != 2) ? true : false;

// Categories
$lang['Acattitle'] = 'Dodaj kategorię'; 
$lang['Ecattitle'] = 'Edytuj kategorię'; 
$lang['Dcattitle'] = 'Usuń kategorię'; 
$lang['Rcattitle'] = 'Przemianuj kategorię'; 
$lang['Catexplain'] = 'Możesz użyć tego menadżera do dodawania, edytowania i przemianowywania kategorii. Żeby dodać plik, musisz stworzyć przynajmniej jedną kategorię.'; 
$lang['Rcatexplain'] = 'Możesz przemianować kategorię, aby była pokazywana w innym miejscu na stronie.';
$lang['Catadded'] = 'Kategoria dodana';
$lang['Catname'] = 'Nazwa kategorii';
$lang['Catnameinfo'] = 'To będzie nazwa kategorii.';
$lang['Catdesc'] = 'Opis kategorii';
$lang['Catdescinfo'] = 'To jest opis kategorii';
$lang['Catparent'] = 'Główny katalog';
$lang['Catparentinfo'] = 'Jeśli chcesz aby ta kategoria była podkategorią innej, wybierz główną kategorię, w której bedzie utworzona.';
$lang['None'] = 'Brak';
$lang['Catedited'] = 'Kategoria zmieniona';
$lang['Delfiles'] = 'Usunąć pliki z tej kategorii?';
$lang['Catsdeleted'] = 'Kategoria usunięta';
$lang['Cdelerror'] = 'Nie wybrał' .  (($he) ? 'e' : 'a') . 'ś kategorii do usunięcia';
$lang['Rcatdone'] = 'Kategoria przemianowana';

// Configuration
$lang['Settingstitle'] = 'Konfiguracja downloadu';
$lang['Settingsexplain'] = 'W tym miejscu możesz zmienić główne ustawienia downloadu.';
$lang['Dbname'] = 'Nazwa bazy danych';
$lang['Dbnameinfo'] = 'Nazwa bazy danych \'Download Index\'';
$lang['Sitename'] = 'Nazwa strony';
$lang['Sitenameinfo'] = 'Nazwa twojej strony \'Home\'';
$lang['Dburl'] = 'Adres bazy danych';
$lang['Dburlinfo'] = 'Adres bazy danych, do miejsca w którym jest ona zainstalowana';
$lang['Hpurl'] = 'Adres strony głównej';
$lang['Hpurlinfo'] = 'Adres URL do twojego portalu lub strony';
$lang['Topnum'] = 'Toplista';
$lang['Topnuminfo'] = 'Ile pokazywać plików w topliscie';
$lang['Nfdays'] = 'Data dla nowych plików';
$lang['Nfdaysinfo'] = 'Ile dni w stecz będzie określało nowe pliki';
$lang['Showva'] = 'Pokaż wszystkie pliki';
$lang['Showvainfo'] = 'Czy pokazywać widok wszystkich plików?';
$lang['Showss'] = 'Pokaż screenshot';
$lang['Showssinfo'] = 'Wyświetlać screenshot?';
$lang['Dbdl'] = 'Wyłącz Download';
$lang['Dbdlinfo'] = 'Wyłącza download dla użytkowników';
$lang['Com_settings'] = 'Ustawienia komentarzy';
$lang['Com_allowh'] = 'Zezwól na HTML';
$lang['Com_allowb'] = 'Zezwól na BBCode';
$lang['Com_allows'] = 'Zezwól na Uśmieszki';
$lang['Com_allowl'] = 'Zezwól na linki';
$lang['Com_messagel'] = 'Informacja "No Links"';
$lang['Com_messagel_info'] = 'Informacja wyświetlana, jesli nie ma zezwolenia na linki';
$lang['Com_allowi'] = 'Zezwól na obrazki';
$lang['Com_messagei'] = 'Informacja "No Images"';
$lang['Com_messagei_info'] = 'Informacja wyświetlana, jesli nie ma zezwolenia na obrazki';
$lang['Max_char'] = 'Maksymalna ilość znaków';
$lang['Max_char_info'] = 'Maksymalna ilość znaków dla komentarzy';
$lang['Settings_changed'] = 'Ustawienia zaktualizowane';
$lang['l_dlinked'] = 'Zabezpieczenie ściągania z innych adresów';
$lang['l_dlinked_e'] = 'Zabezpiecza przed ściąganiem plików w menu download bezpośrednio z innych adresow';

// Custom Field
$lang['Afieldtitle'] = 'Dodaj Dodatkowe pole dla pliku';
$lang['Efieldtitle'] = 'Edytuj';
$lang['Dfieldtitle'] = 'Usuń';
$lang['Fieldexplain'] = 'W tym miejscu możesz dodać dodatkowe pole dla plików, np: \'Data\' lub \'Rozmiar\'';
$lang['Fieldname'] = 'Nazwa';
$lang['Fieldnameinfo'] = '';
$lang['Fielddesc'] = 'Opis';
$lang['Fielddescinfo'] = '';
$lang['Fieldadded'] = 'Dodatkowe pole dodane';
$lang['Fieldedited'] = 'Dodatkowe pole zmienione';
$lang['Dfielderror'] = 'Nie wybrał' .  (($he) ? 'e' : 'a') . 'ś dodatkowych pól do skasowania';
$lang['Fieldsdel'] = 'Dodatkowe pole usunięte';

// File
$lang['Afiletitle'] = 'Dodaj plik';
$lang['Efiletitle'] = 'Edytuj plik';
$lang['Dfiletitle'] = 'Usuń plik';
$lang['Fileexplain'] = 'W tym miejscu, możesz dodawać, edytować i kasować pliki';
$lang['Upload'] = 'Wyslij plik';
$lang['Uploadinfo'] = 'Wyślij plik';
$lang['Uploaderror'] = 'Nazwa pliku istnieje, zmień nazwę i spróbuj jeszcze raz';
$lang['Uploaddone'] = 'Plik zapisany, adres dla pliku to';
$lang['Uploaddone2'] = 'Kliknij tutaj aby umieścić adres pliku w formularzu';
$lang['Upload_do_done'] = 'Plik zapisany';
$lang['Upload_do_not'] = 'Plik nie zapisany';
$lang['Upload_do_exist'] = 'Plik istnieje';
$lang['Filename'] = 'Nazwa pliku';
$lang['Filenameinfo'] = 'Nazwa dla twojego pliku';
$lang['Filesd'] = 'Krótki opis';
$lang['Filesdinfo'] = '';
$lang['Fileld'] = 'Długi opis';
$lang['Fileldinfo'] = '';
$lang['Filecreator'] = 'Autor';
$lang['Filecreatorinfo'] = '';
$lang['Fileversion'] = 'Wersja';
$lang['Fileversioninfo'] = '';
$lang['Filess'] = 'Adres screenshotu';
$lang['Filessinfo'] = '';
$lang['Filessupload'] = 'Wyślij screenshot na serwer';
$lang['Filedocs'] = 'Adres dokumentacji';
$lang['Filedocsinfo'] = '';
$lang['Fileurl'] = 'Adres pliku';
$lang['Fileurlinfo'] = 'Wpisz adres, lub ';
$lang['Fileurlupload'] = 'Wyslij plik na serwer';
$lang['Filepi'] = 'Ikona dla pliku';
$lang['Filepiinfo'] = '';
$lang['Filecat'] = 'Kategoria';
$lang['Filecatinfo'] = '';
$lang['Filelicense'] = 'Licencja';
$lang['Filelicenseinfo'] = 'Licencja, która musi być zaakceptowana przez ściągającego';
$lang['Filepin'] = 'Pin File';
$lang['Filepininfo'] = 'Wybierz jeśli chcesz żeby pliki były zawsze pokazywane nad innymi plikami.';
$lang['Filedls'] = 'Download Total';
$lang['Fileadded'] = 'Plik dodany';
$lang['Fileedited'] = 'Plik dodany';
$lang['Fderror'] = 'You didn\'t select any files to delete';
$lang['Filesdeleted'] = 'Plik skasowany';
$lang['File_checker'] = 'Konserwacja plików';
$lang['File_checker_explain'] = 'Tutaj możesz sprawdzić pliki w bazie danych i w katalogu';
$lang['File_saftey'] = 'Konserwacja plików służy do usuwania wszystkich niepotrzbnych, zalegających plików (z wyjątkiem plików z innego katalogu niż: {html_path} oraz czyszczenia wpisów w bazie danych odnoszących się do nie istniejących plików.<br />Przed rozpoczęciem konserwacji ' .  (($he) ? 'powinieneś' : 'powinnaś') . ' zrobić kopię katalogu plików oraz kopię bazy danych.';
$lang['File_checker_perform'] = 'Konserwuj';
$lang['Checker_saved'] = 'Całkowita zapisana powierzchnia';
$lang['Checker_sp1'] = 'Konserwacja wpisów dla nieistniejących plików...';
$lang['Checker_sp2'] = 'Konserwacja wpisów dla nieistniejących scrrenshot\'ów...';
$lang['Checker_sp3'] = 'Kasowanie nieużywanych plików...'; 

// License 
$lang['Alicensetitle'] = 'Dodaj licencje';
$lang['Elicensetitle'] = 'Edytuj licencje';
$lang['Dlicensetitle'] = 'Skasuj licencje';
$lang['Licenseexplain'] = 'W tym miejscu możesz ustawić parametry Licencji. Licencja musi być zaakceptowana przez użytkownika, zanim ściągnie plik';
$lang['Lname'] = 'Nazwa licencji';
$lang['Ltext'] = 'Treść licencji';
$lang['Licenseadded'] = 'Licencja dodana';
$lang['Licenseedited'] = 'Licencja zmieniona';
$lang['Ldeleted'] = 'Licencja dodana';

$lang['file_not_type'] = 'Plik zbyt duży, ma niewłaściwy format, lub twój serwer nie obsługuje uploadu plików.<br />Prześlij plik poprzez FTP do katalogu pafiledb/uploads i podaj adres w polu formularza: pafiledb/uploads/nazwa_pliku ';

$lang['Click_return'] = 'Kliknij %sTutaj%s żeby wrócić do poprzedniej strony';

$lang['extension_forbidden'] = "Rozszerzenie '%s' jest niedozwolone.";

?>