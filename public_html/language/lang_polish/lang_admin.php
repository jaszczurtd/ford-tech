<?php

/***************************************************************************
 *                      lang_admin.php [Polish]
 *                      -------------------
 * begin                : Sat Dec 16 2000
 * copyright            : (C) 2001 The phpBB Group
 * e-mail               : support@phpbb.com
 *
 * modification         : (C) 2005 Przemo http://www.przemo.org
 * date modification    : ver. 1.12.5 2005/11/10 19:34
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

//
// Translation by Mike Paluchowski and Radek Kmiecicki
// http://www.phpbb.pl/
//

//
// Modules, this replaces the keys used
// in the modules[][] arrays in each module file
//

// Check for user gender
$he = ($userdata['user_gender'] != 2) ? true : false;

$lang['Groups'] = 'Grupy';
$lang['Styles'] = 'Style';
$lang['General'] = 'Ogólne';
$lang['Users'] = 'U¿ytkownicy';
$lang['Forums'] = 'Fora';

$lang['Configuration'] = 'Konfiguracja';
$lang['Manage'] = 'Zarz±dzaj';
$lang['Disallow'] = 'Zabroñ nazwy';
$lang['Prune'] = 'Czyszczenie';
$lang['Mass_Email'] = 'Mas. Korespondencja';
$lang['Ranks'] = 'Rangi';
$lang['Smilies'] = 'U¶mieszki';
$lang['Ban_Management'] = 'Banlista';
$lang['Word_Censor'] = 'Cenzura S³ów';
$lang['Export'] = 'Eksport';
$lang['Create_new'] = 'Utwórz';
$lang['Add_new'] = 'Dodaj';
$lang['Backup_DB'] = 'Kopia Zapasowa';
$lang['Restore_DB'] = 'Odtwarzanie';

//
// Index
//

$lang['Admin'] = 'Administracja';
$lang['Welcome_phpBB'] = 'Witamy w phpBB';
$lang['Admin_intro'] = 'Dziêkujemy, ¿e wybra³' .  (($he) ? 'e' : 'a') . '¶ phpBB by Przemo do obs³ugi Twojego forum. Ten ekran przedstawia krótki przegl±d ró¿norodnych danych statystycznych, dotycz±cych forum. Mo¿esz wróciæ do tej strony klikaj±c odno¶nik <u>Indeks Administracji</u> na lewym panelu. Aby powróciæ do strony g³ównej forum kliknij <u>Str. G³ówna Forum</u> lewym panelu. Inne odno¶niki po lewej stronie ekranu daj± dostêp do narzêdzi kontroluj±cych ka¿dy aspekt zachowania forum. Ka¿de z nich zawiera osobne instrukcje u¿ycia.';
$lang['Main_index'] = 'Str. G³ówna Forum';
$lang['Forum_stats'] = 'Statystyki Forum';
$lang['Admin_Index'] = 'Indeks Administracji';
$lang['Preview_forum'] = 'Podgl±d Forum';

$lang['Click_return_admin_index'] = 'Kliknij %sTutaj%s aby powróciæ do Indeksu Administracji';

$lang['Statistic'] = 'Statystyki';
$lang['Value'] = 'Warto¶æ';
$lang['Number_posts'] = 'Liczba postów';
$lang['Posts_per_day'] = 'Postów dziennie';
$lang['Number_topics'] = 'Liczba tematów';
$lang['Topics_per_day'] = 'Tematów dziennie';
$lang['Number_users'] = 'Liczba u¿ytkowników';
$lang['Users_per_day'] = 'U¿ytkowników dziennie';
$lang['Board_started'] = 'Start Forum';
$lang['Avatar_dir_size'] = 'U¿ycie dysku';
$lang['Database_size'] = 'Baza Danych';
$lang['Gzip_compression'] = 'Kompresja Gzip';
$lang['Not_available'] = 'Niedostêpne';
$lang['f_mail'] = 'Obs³uga funkcji <b>mail</b> na serwerze';
$lang['search_keywords_max'] = 'Maksymalna liczba s³ów, jak± u¿ytkownik mo¿e wykorzystaæ, u¿ywaj±c wyszukiwarki.';
$lang['languages_list'] = 'Dostêpne jêzyki: %s';
$lang['files_list'] = 'Dostêpne pliki: %s';


//
// DB Utils
//
$lang['Database_Utilities'] = 'Narzêdzia Bazy Danych';
$lang['Restore'] = 'Przywracanie';
$lang['Backup'] = 'Kopia Zapasowa';
$lang['Backup_explain'] = 'W tym miejscu mo¿esz w³±czyæ automatyczne tworzenie kopii zapasowej bazy danych, która bêdzie tworzona co 24 godziny (podczas tworzenia kopii, forum jest wy³±czone)<br />Masz mo¿liwo¶æ wyboru ile kopii zapasowych ma byæ przechowywane na serwerze. Bêd± one przetrzymywane w katalogu /db/db_backup/ katalog <b>db_backup</b> powinien mieæ prawa do zapisu ( chmod 777 ).<br />W tym miejscu masz te¿ mo¿liwo¶æ wykonania kopii zapasowej "na ¿±danie" po klikniêciu na link.<br />Plik kopii zapasowej ma nazwê np. db_backup_phpbb_psmdowhx_date-30-05-2005.sql.gz znaki psmdowhx s± losowe a wiêc nie ma mo¿liwo¶ci aby plik dosta³ sie w niepowo³ane rêce. Katalogu /db_backup/ nie mo¿na "wylistowaæ" gdy¿ znajduje siê tam plik index.html.<br />Masz mo¿liwo¶æ ustawienia aby kopia nie obejmowa³a danych z tabel: search i read_history. Tabele search mo¿na odbudowaæ narzêdziem do odbudowywania search w panelu admina. Tabele search i read_history zajmuj± najwiêcej miejsca w bazie danych, tabeli read_history nie mo¿na przywróciæ tak jak tabel search.<br />Na celeronie 1,4 256 ram baza danych o wielko¶ci 80MB jest kopiowana w oko³o 40 sekund, bez tabel search i read_history, rozpakowany plik zajmuje 42MB. Przy d³u¿szym czasie tworzenia kopii mog± wyst±piæ nieprzewidziane problemy.<br />Je¿eli masz dostêp do Cpanel\'u lub innego narzêdzia administracyjnego, sprawd¼, czy nie tworzy on automatycznych kopii zapasowych bazy SQL, je¶li tworzy nie musisz w³±czaæ automatycznego tworzenia przez forum.';
$lang['db_backup_enable'] = 'W³±cz automatyczne tworzenie kopii';
$lang['db_backup_copies'] = 'Ilo¶æ przetrzymywanych kopii';
$lang['db_backup_tables_search'] = 'Kopiuj zawarto¶æ tabel search';
$lang['db_backup_tables_rh'] = 'Kopiuj zawarto¶æ tabeli read_history';
$lang['db_backup_link'] = 'Wykonaj kopiê teraz';
$lang['db_backup_done'] = 'Kopia zosta³a wykonana.';
$lang['db_backup_last'] = 'Ostatnia kopia: ';

//
// Auth pages
//
$lang['Select_a_User'] = 'Wybierz U¿ytkownika';
$lang['Select_a_Group'] = 'Wybierz Grupê';
$lang['Select_a_Forum'] = 'Wybierz Forum';
$lang['Auth_Control_User'] = 'Kontrola Zezwoleñ U¿ytkowników';
$lang['Auth_Control_Group'] = 'Kontrola Zezwoleñ Grup';
$lang['Auth_Control_Forum'] = 'Kontrola Zezwoleñ For';
$lang['Look_up_User'] = 'Wybierz U¿ytkownika';
$lang['Look_up_Group'] = 'Wybierz Grupy';
$lang['Look_up_Forum'] = 'Wybierz Forum';

$lang['Group_auth_explain'] = 'Tutaj mo¿esz zmieniaæ zezwolenia i status moderatora przydzielony ka¿dej grupie u¿ytkowników. Nie zapomnij zmieniaj±c ustawienia, ¿e indywidualne uprawnienia mog± nadal zezwalaæ u¿ytkownikowi na dostêp do forów itp.';
$lang['User_auth_explain'] = 'Tutaj mo¿esz zmieniaæ zezwolenia i status moderatora dla ka¿dego u¿ytkownika. Nie zapomnij zmieniaj±c ustawienia, ¿e uprawnienia grupowe mog± nadal zezwalaæ u¿ytkownikowi na dostêp do forów itp.';
$lang['Forum_auth_explain'] = 'Tutaj mo¿esz zmieniæ poziomy autoryzacji dla ka¿dego forum. Masz do dyspozycji metodê prost± i zaawansowan±, z których druga oferuje wiêksze mo¿liwo¶ci kontroli ustawieñ. Pamiêtaj, ¿e zmiana ustawieñ dotycz±cych forów zadecyduje o tym, co u¿ytkownicy bêd± mogli na nich robiæ.';

$lang['Simple_mode'] = 'Tryb Prosty';
$lang['Advanced_mode'] = 'Tryb Zaawansowany';
$lang['Moderator_status'] = 'Status Moderatora';

$lang['Allowed_Access'] = 'Dostêp Zezwolony';
$lang['Disallowed_Access'] = 'Dostêp Zabroniony';
$lang['Is_Moderator'] = 'Moderator';
$lang['Not_auth_Moderator'] = 'Nie Moderator';

$lang['Public'] = 'Publiczne';
$lang['Private'] = 'Prywatne';
$lang['Registered'] = 'Zarejestrowani';
$lang['Hidden'] = 'Ukryte';

// These are displayed in the drop down boxes for advanced
// mode forum auth, try and keep them short!
$lang['Forum_ALL'] = 'WSZYSCY';
$lang['Forum_REG'] = 'ZAREJESTR.';
$lang['Forum_PRIVATE'] = 'PRYWATNE';
$lang['Forum_MOD'] = 'MODERAT.';
$lang['Forum_ADMIN'] = 'ADMIN';

$lang['View'] = 'Widoczny';
$lang['Read'] = 'Czytanie';
$lang['Post'] = 'Pisanie';
$lang['Reply'] = 'Odpowiedzi';
$lang['Edit'] = 'Edycja';
$lang['Sticky'] = 'Przyklejone';
$lang['Announce'] = 'Og³oszenia';
$lang['Vote'] = 'G³osowanie';
$lang['Pollcreate'] = 'Tworzenie ankiet';

$lang['Simple_Permission'] = 'Proste Zezwolenia';

$lang['User_Level'] = 'Poziom u¿ytkownika';
$lang['Auth_Admin'] = 'Administrator';
$lang['Group_memberships'] = 'Cz³onkostwo w grupach (Wszystkich: %d )';
$lang['Usergroup_members'] = 'Tak grupa ma nastêpuj±cych cz³onków (Wszystkich: %d )';

$lang['Forum_auth_updated'] = 'Zezwolenia Forów zosta³y zaktualizowane';
$lang['Auth_updated'] = 'Zezwolenia zosta³y zmienione';
$lang['Click_return_userauth'] = 'Kliknij %sTutaj%s aby powróciæ do Zezwoleñ U¿ytkowników';
$lang['Click_return_groupauth'] = 'Kliknij %sTutaj%s aby powróciæ do Zezwoleñ Grup';
$lang['Click_return_forumauth'] = 'Kliknij %sTutaj%s aby powróciæ do Zezwoleñ For';


//
// Banning
//
$lang['Ban_explain'] = 'Tutaj mo¿esz kontrolowaæ banlistê u¿ytkowników. Uzyskasz to przez banowanie danego u¿ytkownika, zakresu numerów IP lub hostów. Dziêki tym metodom u¿ytkownik nie dostanie siê nawet na stronê g³ówn±. Aby zapobiec rejestracji pod innymi nazwami mo¿esz tak¿e zbanowaæ konkretny adres e-mail.';
$lang['Select_username'] = 'Wybierz Nazwê U¿ytkownika';
$lang['Ban_IP'] = 'Zbanuj jeden lub wiêcej adresów IP lub hostów';
$lang['IP_hostname'] = 'Adresy IP lub hosty';
$lang['Ban_IP_explain'] = 'Aby podaæ kilka adresów IP lub hostów oddziel je przecinkami. Kiedy podajesz adres IP znak <b>*</b> zastêpuje dowolny ci±g cyfr. Aby okre¶liæ zakres tylko kilku adresów IP oddziel pocz±tkowy i koñcowy my¶lnikiem (-) Nie stosuj bardzo du¿ych zakresów IP, na przyk³ad zakres 20-80 doda do bazy a¿ 60 wpisów. Je¿eli podajesz host, mo¿esz u¿yæ znaku <b>*</b> który zast±pi dowolny ci±g znaków, oraz znaku <b>?</b> który zastêpuje dowolny jeden znak - przyk³ady: IP: <b>80.53.12.*</b> lub host: <b>*.neoplus.adsl.tpnet.pl</b> lub host: <b>host2?.firma.pl</b>';

$lang['Ban_email'] = 'Zbanuj jeden lub wiêcej adresów e-mail';
$lang['Ban_email_explain'] = 'Aby podaæ wiêcej ni¿ jeden adres e-mail, oddziel je przecinkami. Znakiem zamiennym jest *, np. *@hotmail.com.';

$lang['Ban_update_sucessful'] = 'Banlista zosta³a zaktualizowana';
$lang['Click_return_banadmin'] = 'Kliknij %sTutaj%s aby powróciæ do Kontroli banlisty';


//
// Configuration
//
$lang['General_Config'] = 'Ustawienia G³ówne';
$lang['Click_return_config'] = 'Kliknij %sTutaj%s aby powróciæ do Ustawieñ G³ównych';

$lang['Server_name'] = 'Nazwa Domeny';
$lang['Script_path'] = '¦cie¿ka skryptu';
$lang['Server_port'] = 'Port Serwera';
$lang['Acct_activation'] = 'W³±cz aktywacjê kont';
$lang['Acc_Admin'] = 'Admin';

$lang['Allow_BBCode'] = 'Zezwól na BBCode';
$lang['Allow_smilies'] = 'Zezwól na U¶mieszki';
$lang['Admin_email'] = 'Adres E-mail Administratora';

//
// Forum Management
//

$lang['Forum_admin'] = 'Administracja Forum';
$lang['Forum_admin_explain'] = 'W tym miejscu mo¿esz dodawaæ, usuwaæ, modyfikowaæ, zmieniaæ kolejno¶æ i ponownie synchronizowaæ kategorie i fora.<br />Pamiêtaj ¿e aby utworzyæ drzewo, czyli "forum w forum" musisz najpierw utworzyæ kategoriê w jakim¶ istniej±cym forum i dopiero pó¼niej w tej kategorii utworzyæ forum.<br />Mo¿esz równie¿ przesuwaæ istniej±ce fora do kategorii utworzonej w wybranym forum.';
$lang['Edit_forum'] = 'Edytuj forum';
$lang['Create_forum'] = 'Nowe Forum';
$lang['Create_category'] = 'Nowa Kategoria';
$lang['Config_updated'] = 'Konfiguracja Forum Zosta³a Zaktualizowana';
$lang['Move_up'] = 'W górê';
$lang['Move_down'] = 'W dó³';
$lang['Resync'] = 'Synch.';
$lang['No_mode'] = 'Nie okre¶lono trybu';
$lang['Forum_edit_delete_explain'] = 'Poni¿szy formularz pozwoli zmieniæ wszystkie podstawowe opcje forum. Aby zmieniæ szczegó³owe ustawienia U¿ytkowników i Forów skorzystaj z odno¶ników po lewej.';

$lang['Move_contents'] = 'Przenie¶ ca³± zawarto¶æ';
$lang['Forum_delete'] = 'Usuñ Forum';
$lang['Forum_delete_explain'] = 'Poni¿szy formularz pozwoli na usuniêcie forum (lub dzia³ów) i zdecydowanie co zrobiæ z tematami (lub forami), które by³y w nim zawarte.';

$lang['Forum_settings'] = 'Generalne Ustawienia Forum';
$lang['Forum_name'] = 'Nazwa Forum';
$lang['Forum_desc'] = 'Opis';
$lang['Forum_logo'] = 'Nazwa pliku z logiem dla tego forum (np. help_logo.gif)';
$lang['Forum_logo_expl'] = 'Pozostaw to pole puste aby pozostawiæ standardowe logo';
$lang['Forum_status'] = 'Status Forum';
$lang['Forum_pruning'] = 'Automatyczne Czyszczenie';

$lang['prune_freq'] = 'Sprawd¼ wiek tematu co';
$lang['prune_days'] = 'Usuñ tematy, w których nie pisano nic przez';
$lang['Set_prune_data'] = 'W³±czy³' .  (($he) ? 'e' : 'a') . '¶ automatyczne czyszczenie dla tego forum ale nie okre¶li³' .  (($he) ? 'e' : 'a') . '¶ jego parametrów. Wróæ i wpisz wszystkie dane.';

$lang['Move_and_Delete'] = 'Przenie¶ i Usuñ';

$lang['Delete_all_posts'] = 'Usuñ wszystkie posty';
$lang['Edit_Category'] = 'Edytuj Kategoriê';
$lang['Edit_Category_explain'] = 'U¿yj tego formularza do zmiany nazwy kategorii.';

$lang['Forums_updated'] = 'Dane dotycz±ce Forów i Kategorii zosta³y zaktualizowane';

$lang['Must_delete_forums'] = 'Musisz usun±æ wszystkie fora przed usuniêciem tej kategorii';

$lang['Click_return_forumadmin'] = 'Kliknij %sTutaj%s aby powróciæ do Administracji Forum';


//
// Smiley Management
//
$lang['smiley_title'] = 'Edycja U¶mieszków';
$lang['smile_desc'] = 'Na tej stronie mo¿esz dodawaæ, usuwaæ i zmieniaæ ikony emocji lub u¶mieszki, które u¿ytkownicy mog± u¿ywaæ w swoich postach i prywatnych wiadomo¶ciach.';

$lang['smiley_config'] = 'Dodaj U¶mieszki';
$lang['smiley_code'] = 'Kod U¶mieszku';
$lang['smiley_url'] = 'Plik Obrazka U¶mieszku';
$lang['smile_add'] = 'Nowy U¶mieszek';
$lang['Smile'] = 'U¶miech';

$lang['Select_pak'] = 'Wybierz Plik Paczki (.pak)';
$lang['replace_existing'] = 'Zamieñ Istniej±cy U¶miech';
$lang['keep_existing'] = 'Zachowaj Istniej±cy U¶miech';
$lang['smiley_import_inst'] = 'Powin' .  (($he) ? 'iene¶' : 'na¶') . ' rozpakowaæ paczkê u¶mieszków i wys³aæ pliki do odpowiedniego katalogu U¶mieszków. Potem ustaw odpowiednio poni¿szy formularz i importuj paczkê.';
$lang['smiley_import'] = 'Import Paczki U¶mieszków';
$lang['choose_smile_pak'] = 'Wybierz Plik .pak Paczki U¶mieszków';
$lang['import'] = 'Importuj U¶mieszki';
$lang['smile_conflicts'] = 'Co zrobiæ w przypadku konfliktów';
$lang['del_existing_smileys'] = 'Usuñ istniej±ce u¶mieszki przed importem';
$lang['import_smile_pack'] = 'Importuj Paczkê';
$lang['export_smile_pack'] = 'Utwórz Paczkê';
$lang['export_smiles'] = 'Aby utworzyæ paczkê u¶mieszków z obecnie zainstalowanych kliknij %sTutaj%s aby ¶ci±gn±æ plik .pak u¶mieszków. Nazwij go odpowiednio zachowuj±c rozszerzenie .pak. Potem spakuj ten plik razem z obrazkami u¶mieszków w archiwum zip.';

$lang['smiley_add_success'] = 'U¶mieszek zosta³ dodany';
$lang['smiley_edit_success'] = 'U¶mieszek zosta³ zaktualizowany';
$lang['smiley_import_success'] = 'Paczka U¶mieszków zosta³a zaimportowana!';
$lang['smiley_del_success'] = 'U¶mieszek zosta³ usuniêty';
$lang['Click_return_smileadmin'] = 'Kliknij %sTutaj%s aby powróciæ do Administracji U¶mieszkami';


//
// User Management
//
$lang['User_admin'] = 'Administracja U¿ytkownikami';
$lang['User_admin_explain'] = 'Tutaj mo¿esz zmieniæ informacje o u¿ytkowniku i ustawione przez niego opcje. Aby zmieniæ jego prawa dostêpu skorzystaj z systemu zmiany zezwoleñ.';

$lang['Look_up_user'] = 'Poka¿ u¿ytkownika';

$lang['Admin_user_fail'] = 'Nie mo¿na by³o zaktualizowaæ profilu u¿ytkownika.';
$lang['Admin_user_updated'] = 'Profil u¿ytkownika zosta³ zaktualizowany.';
$lang['Click_return_useradmin'] = 'Kliknij %sTutaj%s aby powróciæ do Administracji U¿ytkownikami';

$lang['User_delete'] = 'Usuñ tego u¿ytkownika';
$lang['User_delete_explain'] = 'Zaznacz aby usun±æ u¿ytkownika, nie mo¿na tego cofn±æ !';
$lang['User_deleted'] = 'U¿ytkownik zosta³ usuniêty.';

$lang['User_status'] = 'U¿ytkownik jest aktywny';
$lang['User_allowpm'] = 'Mo¿e wysy³aæ Prywatne Wiadomo¶ci';
$lang['User_allowavatar'] = 'Mo¿e pokazywaæ Avatar';

$lang['Admin_avatar_explain'] = 'Tutaj mo¿esz zobaczyæ i usun±æ obecny Avatar u¿ytkownika.';

$lang['User_special'] = 'Specjalne pola administratora';
$lang['User_special_explain'] = 'Tych pól nie mog± zmieniaæ sami u¿ytkownicy. Mo¿esz tutaj zmodyfikowaæ ich status i inne opcje dotycz±ce ich mo¿liwo¶ci dzia³ania.';


//
// Group Management
//
$lang['Group_administration'] = 'Administracja Grupami';
$lang['Group_admin_explain'] = 'Z tego panelu mo¿esz administrowaæ wszystkimi grupami u¿ytkowników; mo¿esz je usuwaæ, tworzyæ i zmieniaæ ustawienia. Mo¿esz wybieraæ moderatorów, zmieniaæ na otwarte lub zamkniête i modyfikowaæ nazwê oraz opis.';
$lang['Updated_group'] = 'Grupa zosta³a zaktualizowana';
$lang['Added_new_group'] = 'Nowa grupa zosta³a utworzona';
$lang['Deleted_group'] = 'Grupa zosta³a usuniêta';
$lang['New_group'] = 'Utwórz now± grupê';
$lang['Edit_group'] = 'Edytuj grupê';
$lang['group_name'] = 'Nazwa Grupy';
$lang['group_description'] = 'Opis Grupy';
$lang['group_moderator'] = 'Moderator Grupy';
$lang['group_status'] = 'Status Grupy';
$lang['group_open'] = 'Otwarta';
$lang['group_closed'] = 'Zamkniêta';
$lang['group_hidden'] = 'Ukryta';
$lang['group_delete'] = 'Usuñ Grupê';
$lang['group_delete_check'] = 'Usuñ tê grupê';
$lang['No_group_name'] = 'Musisz wpisaæ nazwê dla tej grupy';
$lang['No_group_moderator'] = 'Musisz podaæ moderatora tej grupy';
$lang['delete_group_moderator'] = 'Usun±æ poprzedniego moderatora grupy?';
$lang['delete_moderator_explain'] = 'Je¿eli zmieniasz moderatora zaznacz to pole aby usun±æ starego moderatora. Je¿eli tego nie zrobisz stanie siê on zwyk³ym cz³onkiem grupy.';
$lang['Click_return_groupsadmin'] = 'Kliknij %sTutaj%s aby powróciæ do Administracji Grupami.';
$lang['Select_group'] = 'Wybierz grupê';
$lang['Look_up_group'] = 'Poka¿ grupê';


//
// Prune Administration
//
$lang['Forum_Prune'] = 'Czyszczenie Forum';
$lang['Forum_Prune_explain'] = 'Usuniête zostan± tematy, w których nie napisano nic nowego przez okre¶lon± liczbê dni. Je¿eli nie wpiszesz ¿adnej liczby usuniête zostan± wszystkie tematy. Nietkniête pozostan± tematy z aktywnymi ankietami oraz og³oszenia. Bêdziesz musia³ usun±æ je rêcznie.';
$lang['Do_Prune'] = 'Wykonaj';
$lang['Prune_topics_not_posted'] = 'Wyczy¶æ tematy bez nowych odpowiedzi przez dni';
$lang['Topics_pruned'] = 'Usuniêto tematów';
$lang['Prune_success'] = 'Czyszczenie zosta³o wykonane';


//
// Word censor
//
$lang['Words_title'] = 'Cenzura S³ów';
$lang['Words_explain'] = 'Z tego miejsca mo¿esz dodawaæ, zmieniaæ i usuwaæ s³owa, które zostan± automatycznie ocenzurowane na Twoim forach. Dodatkowo ludzie nie bêd± mogli siê rejestrowaæ z nazwami zawieraj±cymi te s³owa. Znaki uniwersalne (*) s± dozwolone, np. *test* obejmie przetestowanie, test* obejmie testowanie, *test obejmie przedtest.';
$lang['Word'] = 'S³owo';
$lang['Edit_word_censor'] = 'Zmieñ Cenzurê';
$lang['Replacement'] = 'Zamiennik';
$lang['Add_new_word'] = 'Dodaj nowe s³owo';

$lang['Must_enter_word'] = 'Musisz wpisaæ s³owo i jego zamiennik';
$lang['No_word_selected'] = 'Nie wybrano s³owa do edycji';

$lang['Word_updated'] = 'Wybrana cenzura zosta³a zaktualizowana';
$lang['Word_added'] = 'Nowa cenzura zosta³a dodana';
$lang['Word_removed'] = 'Wybrana cenzura zosta³a usuniêta';

$lang['Click_return_wordadmin'] = 'Kliknij %sTutaj%s aby powróciæ do Administracji Cenzur±';

//
// Ranks admin
//

$lang['Ranks_title'] = 'Administracja Rangami';
$lang['Ranks_explain'] = 'U¿ywaj±c tego formularza mo¿esz dodawaæ, zmieniaæ, przegl±daæ i usuwaæ rangi. Mo¿esz te¿ tworzyæ specjalne rangi i przydzielaæ je poprzez system zarz±dzania u¿ytkowników.';

$lang['Add_new_rank'] = 'Dodaj now± rangê';

$lang['Rank_title'] = 'Nazwa Rangi';
$lang['Rank_title_e'] = 'Je¶li chcesz u¿yæ obrazka rangi w którym jest ju¿ nazwa rangi i chcesz ¿eby nie powtarza³a siê ona w nazwie rangi to przed nazw± rangi daj: <b>-#</b> wówczas nie bêdzie ona wy¶wietlana';
$lang['Rank_special'] = 'Jest Rang± personaln±';
$lang['Rank_minimum'] = 'Minimum Postów';
$lang['Rank_image'] = 'Obraz Rangi';
$lang['Rank_image_explain'] = 'Mo¿esz tutaj okre¶liæ obrazek zwi±zany z dan± rang±<br />Obrazki rang powinny siê znajdowaæ we wszystkich katalogach stylów w: /templates/Nazwa_stylu/images/ranks/';

$lang['Must_select_rank'] = 'Musisz wybraæ rangê';
$lang['No_assigned_rank'] = 'Nie okre¶lono rang specjalnych';

$lang['Rank_updated'] = 'Ranga zosta³a zaktualizowana';
$lang['Rank_added'] = 'Ranga zosta³a dodana';
$lang['Rank_removed'] = 'Ranga zosta³a usuniêta';
$lang['No_update_ranks'] = 'Ranga zosta³a usuniêta, jednak¿e konta u¿ytkowników, którym zosta³a przydzielona nie zosta³y zmienione. Bêdziesz musia³ rêcznie usun±æ rangê z tych kont';

$lang['Click_return_rankadmin'] = 'Kliknij %sTutaj%s aby powróciæ do Administracji Rangami';


//
// Disallow Username Admin
//
$lang['Disallow_control'] = 'Kontrola Zabronionych Nazw';
$lang['Disallow_explain'] = 'Tutaj mo¿esz kontrolowaæ nazwy u¿ytkowników, których nie wolno u¿ywaæ. Zabronione nazwy mog± zawieraæ znak zamienny *. Pamiêtaj, ¿e nie mo¿esz zabroniæ nazwy, która ju¿ zosta³a zarejestrowana. Najpierw usuñ tego u¿ytkownika a potem dopisz tutaj nazwê.';

$lang['Delete_disallow_title'] = 'Usuñ Zabronion± Nazwê';
$lang['Delete_disallow_explain'] = 'Mo¿esz usun±æ zabronion± nazwê wybieraj±c j± z tej listy i klikaj±c Wy¶lij.';

$lang['Add_disallow_title'] = 'Dodaj Zabronion± Nazwê';
$lang['Add_disallow_explain'] = 'Mo¿esz zabroniæ korzystania z jakiej¶ nazwy wykorzystuj±c znak * równowa¿ny dowolnemu ci±gowi znaków';
$lang['Disallowed_deleted'] = 'Zabroniona nazwa zosta³a usuniêta';
$lang['Disallow_successful'] = 'Zabroniona nazwa zosta³a dodana';
$lang['Disallowed_already'] = 'Nazwa, któr± wpisa³' .  (($he) ? 'e' : 'a') . '¶, nie mo¿e byæ zakazana. Albo jest ju¿ na li¶cie albo istnieje ju¿ taki u¿ytkownik.';

$lang['Click_return_disallowadmin'] = 'Kliknij %sTutaj%s aby powróciæ do Administracji Zabronionymi Nazwami';


//
// Styles Admin
//
$lang['Styles_admin'] = 'Administracja Stylami';
$lang['Styles_explain'] = 'Korzystaj±c z tego narzêdzia mo¿esz dodawaæ, usuwaæ i zarz±dzaæ stylami (oraz szablonami) dostêpnymi dla u¿ytkowników';
$lang['Styles_addnew_explain'] = 'Poni¿sza lista zawiera wszystkie style, które s± dostêpne dla posiadanych przez ciebie szablonów. Elementy na tej li¶cie nie zosta³y jeszcze zainstalowane w bazie danych phpBB. Aby zainstalowaæ styl po prostu kliknij odno¶nik Instaluj obok wpisu';

$lang['Select_template'] = 'Wybierz Szablon';

$lang['Style'] = 'Styl';
$lang['Template'] = 'Szablon';
$lang['Install'] = 'Instaluj';
$lang['Download'] = '¦ci±gnij';

$lang['Edit_theme'] = 'Edytuj Styl';
$lang['Edit_theme_explain'] = 'W formularzu poni¿ej mo¿esz zmieniæ ustawienia dla wybranego stylu';

$lang['Create_theme'] = 'Utwórz Styl';
$lang['Create_theme_explain'] = 'U¿yj formularza poni¿ej aby utworzyæ nowy styl dla wybranego szablonu. Wpisuj±c kolory (do których mo¿esz u¿ywaæ jedynie warto¶ci szesnastkowych) nie dodawaj pocz±tkowego #, np. CCCCCC jest poprawne ale #CCCCCC ju¿ nie.';

$lang['Export_themes'] = 'Eksportuj Styl';
$lang['Export_explain'] = 'Z tego panelu mo¿esz eksportowaæ dane stylu dla wybranego szablonu. Wybierz styl z poni¿szej listy, a skrypt utworzy plik jego konfiguracji i spróbuje zapisaæ go w wybranym katalogu stylów. Je¿eli nie bêdzie mo¿liwe zapisanie pliku otrzymasz mo¿liwo¶æ ¶ci±gniêcia go. Aby plik zosta³ zapisany serwer musi mieæ uprawnienia zapisu w danym katalogu. Wiêcej informacji znajdziesz w podrêczniku phpBB 2.';

$lang['Theme_installed'] = 'Wybrany styl zosta³ zainstalowany';
$lang['Style_removed'] = 'Wybrany styl zosta³ usuniêty z bazy danych. Aby ca³kowicie usun±æ styl z systemu musisz usun±æ go rêcznie z katalogu szablonów.';
$lang['Theme_info_saved'] = 'Informacje o stylu dla wybranego szablonu zosta³y zapisane. Powin' .  (($he) ? 'iene¶' : 'na¶') . ' teraz przywróciæ uprawnienia dostêpu pliku theme_info.cfg (i je¶li to potrzebne tak¿e dla katalogu szablonów) na \'tylko do odczytu\'.';
$lang['Theme_updated'] = 'Wybrany styl zosta³ zaktualizowany. Powin' .  (($he) ? 'iene¶' : 'na¶') . ' wyeksportowaæ nowe ustawienia.';
$lang['Theme_created'] = 'Styl utworzony. Powin' .  (($he) ? 'iene¶' : 'na¶') . ' teraz wyeksportowaæ go do pliku konfiguracyjnego aby go zabezpieczyæ lub u¿yæ gdzie indziej.';

$lang['Confirm_delete_style'] = 'Czy na pewno chcesz usun±æ ten styl';

$lang['Download_theme_cfg'] = 'Eksporter nie móg³ zapisaæ pliku z informacjami o stylu. Kliknij przycisk poni¿ej aby ¶ci±gn±æ ten plik przez przegl±darkê. Kiedy ju¿ go ¶ci±gniesz wy¶lij go rêcznie do katalogu z plikami szablonu. Mo¿esz wtedy spakowaæ pliki dla dystrybucji lub u¿ycia gdzie indziej.';
$lang['No_themes'] = 'Wybrany szablon nie ma ¿adnych do³±czonych stylów. Aby utworzyæ nowy styl kliknij odno¶nik Utwórz Nowy na lewym panelu.';
$lang['No_template_dir'] = 'Otwarcie katalogu szablonów by³o niemo¿liwe. Byæ mo¿e nie istnieje lub serwer nie ma do niego praw dostêpu.';
$lang['Cannot_remove_style'] = 'Nie mo¿esz usun±æ wybranego stylu, poniewa¿ jest obecnie domy¶lnym dla forum. Zmieñ ustawienia domy¶lne i spróbuj ponownie.';
$lang['Style_exists'] = 'Nazwa stylu, któr± wybra³' .  (($he) ? 'e' : 'a') . '¶ ju¿ istnieje, wróæ i spróbuj z inn± nazw±.';

$lang['Click_return_styleadmin'] = 'Kliknij %sTutaj%s aby powróciæ do Administracji Stylami';

$lang['Theme_settings'] = 'Ustawienia Tematu';
$lang['Theme_element'] = 'Element Tematu';
$lang['Simple_name'] = 'Prosta Nazwa';
$lang['Save_Settings'] = 'Zapisz Ustawienia';

$lang['Stylesheet'] = 'Arkusz CSS';
$lang['Background_image'] = 'Obrazek T³a';
$lang['Background_color'] = 'Kolor T³a';
$lang['Theme_name'] = 'Nazwa Tematu';
$lang['Link_color'] = 'Kolor Odno¶nika';
$lang['Text_color'] = 'Kolor Tekstu';
$lang['VLink_color'] = 'Kolor Odwiedzonego Odno¶nika';
$lang['ALink_color'] = 'Kolor Aktywnego Odno¶nika';
$lang['HLink_color'] = 'Kolor Odno¶nika pod Kursorem';
$lang['Tr_color1'] = 'Kolor Rzêdu Tabeli 1';
$lang['Tr_color2'] = 'Kolor Rzêdu Tabeli 2';
$lang['Tr_color3'] = 'Kolor Rzêdu Tabeli 3';
$lang['Tr_class1'] = 'Klasa Rzêdu Tabeli 1';
$lang['Tr_class2'] = 'Klasa Rzêdu Tabeli 2';
$lang['Tr_class3'] = 'Klasa Rzêdu Tabeli 3';
$lang['Th_color1'] = 'Kolor Nag³ówka Tabeli 1';
$lang['Th_color2'] = 'Kolor Nag³ówka Tabeli 2';
$lang['Th_color3'] = 'Kolor Nag³ówka Tabeli 3';
$lang['Th_class1'] = 'Klasa Nag³ówka Tabeli 1';
$lang['Th_class2'] = 'Klasa Nag³ówka Tabeli 2';
$lang['Th_class3'] = 'Klasa Nag³ówka Tabeli 3';
$lang['Td_color1'] = 'Kolor Komórki Tabeli 1';
$lang['Td_color2'] = 'Kolor Komórki Tabeli 2';
$lang['Td_color3'] = 'Kolor Komórki Tabeli 3';
$lang['Td_class1'] = 'Klasa Komórki Tabeli 1';
$lang['Td_class2'] = 'Klasa Komórki Tabeli 2';
$lang['Td_class3'] = 'Klasa Komórki Tabeli 3';
$lang['fontface1'] = 'Czcionka 1';
$lang['fontface2'] = 'Czcionka 2';
$lang['fontface3'] = 'Czcionka 3';
$lang['fontsize1'] = 'Rozmiar Czcionki 1';
$lang['fontsize2'] = 'Rozmiar Czcionki 2';
$lang['fontsize3'] = 'Rozmiar Czcionki 3';
$lang['fontcolor1'] = 'Kolor Czcionki 1';
$lang['fontcolor2'] = 'Kolor Czcionki 2';
$lang['fontcolor3'] = 'Kolor Czcionki 3';
$lang['span_class1'] = 'Klasa Span 1';
$lang['span_class2'] = 'Klasa Span 2';
$lang['span_class3'] = 'Klasa Span 3';

//
// Install Process
//

$lang['Default_lang'] = 'Domy¶lny Jêzyk Forum';
$lang['ftp_info'] = 'Wpisz informacjê o twoim FTP';
$lang['ftp_username'] = 'U¿ytkownik FTP';
$lang['Install'] = 'Instalacja';

//
// Modified addons
//

$lang['Poll Admin'] = 'Sondy';
$lang['Poll Results'] = 'Wyniki glosowañ';
$lang['Prune_User_Posts'] = 'Masowe kasowanie postów u¿ytkowników';
$lang['logs'] = 'Logi po³±czeñ';
$lang['portal_config'] = 'Ustawienia portalu';
$lang['v_top_posters'] = 'Ile najaktywniejszych u¿ytkowników. 0 Wy³±cza';
$lang['v_recent_topics'] = 'Ile ostatnich tematów. 0 Wy³±cza';
$lang['l_album_pics'] = 'Ile ostatnich zdjêæ. Wpisz 0 ¿eby wy³±czyæ';
$lang['album_pics'] = 'Ostatnie zdjêcia';
$lang['Categories'] = 'Kategorie';
$lang['Clear_Cache'] = 'Wyczy¶æ Cache';
$lang['Personal_Galleries'] = 'Prywatne galerie';
$lang['Photo_Album'] = 'Album zdjêæ';
$lang['Portal_index'] = 'Strona Portalu';
$lang['Preview_portal'] = 'Podgl±d Portalu';
$lang['body_footer'] = 'Stopka Portalu';
$lang['body_footer_e'] = 'Mo¿esz utworzyæ w³asn± stopkê portalu, lub zostaw puste.<br /><a href="../images/dynamic.html" target="_blank">Obs³uga zamienników</a>';
$lang['l_own_body'] = 'W³asna strona w miejscu newsów';
$lang['l_own_body_e'] = 'Je¿eli podasz tutaj kod HTML w³asnej strony, w miejscu newsów bêdzie twoja w³asna strona.<br /><a href="../images/dynamic.html" target="_blank">Obs³uga zamienników</a>';
$lang['l_number_of_news'] = 'Ilo¶æ newsów w portalu';
$lang['l_news_length'] = 'D³ugo¶æ newsa (znaków)';
$lang['l_witch_news_forum'] = 'Fora newsów';
$lang['l_witch_news_forum_e'] = 'Wybierz fora z których bêd± pobierane newsy. Mo¿esz w nich daæ odpowiednie uprawnienia moderatorom, wówczas w Portalu bêd± oni "Newsmenami".<br />Je¿eli chcesz wybraæ wiêcej ni¿ jedno, przytrzymaj klawisz Ctrl';
$lang['l_witch_poll_forum'] = 'Fora ankiet';
$lang['links_body'] = 'Tre¶æ linków (HTML)';
$lang['General_Portal_Config'] = 'Ustawienia G³ówne Portalu';
$lang['Config_Portal_e'] = 'Poni¿szy formularz pozwala dostosowaæ wszystkie opcje forum portalu.';
$lang['General_Portal_settings'] = 'Ustawienia portalu';
$lang['Click_return_portal_config'] = 'Kliknij %sTutaj%s aby powróciæ do Ustawieñ Portalu';
$lang['Config_portal_updated'] = 'Konfiguracja Portalu Zosta³a Zaktualizowana';

$lang['Status_locked'] = 'Zablokowane';
$lang['Status_unlocked'] = 'Odblokowane';
$lang['Sort_alpha'] = 'Tytu³u tematu';
$lang['Sort_fpdate'] = 'Czasu ostatniego postu';
$lang['Sort_ttime'] = 'Czasu napisania tematu';
$lang['Sort_author'] = 'Autora tematu';
$lang['User_allowsig'] = 'Mo¿e dodawaæ podpis';
$lang['No_group_action'] = 'Nie wybrano czynno¶ci';
$lang['Download2'] = 'Download';

$lang['Next_birthday_greeting'] = 'Nastêpne powitanie w roku';
$lang['Next_birthday_greeting_expain'] = 'Podaj rok w którym u¿ytkownik ma zostaæ powitany.';
$lang['Wrong_next_birthday_greeting'] = 'Podany rok powitania jest nieprawid³owy';
$lang['Active'] = 'Aktywny';
$lang['modules'] = 'Rozmieszczenie modu³ów';
$lang['modules_e'] = 'Portal jest podzielony na trzy kolumny, w ¶rodkowej s± newsy, w lewej i prawej modu³y. Poni¿sze jumpboxy pozwalaj± dostosowaæ, kolejno¶æ, oraz stronê z której bêdzie modu³.';
$lang['custom_body'] = 'Zawarto¶æ w³asnego menu';
$lang['custom_body_e'] = 'Wpisz w HTML-u zawarto¶æ menu';
$lang['custom_name'] = 'Tytu³ w³asnego menu';
$lang['custom_name_e'] = 'Wpisz tytu³ menu';
$lang['rmodule'] = 'Prawa strona portalu';
$lang['lmodule'] = 'Lewa strona portalu';
$lang['clock'] = 'Zegar';
$lang['custom_mod'] = 'W³asne menu';
$lang['custom_blank_mod'] = 'W³asny modu³';
$lang['l_portal_menu_a'] = 'Wyrównanie Menu';
$lang['album_pos'] = 'Wyrównanie Menu Ostatnich zdjêæ';
$lang['l_links_a'] = 'Wyrównanie Menu Linki';
$lang['l_search_a'] = 'Wyrównanie Menu Szukaj';
$lang['l_stat_a'] = 'Wyrównanie Menu Szybkich statystyk';
$lang['l_recent_topics_a'] = 'Wyrównanie Menu Ostatnich Tematów';
$lang['l_top_posters_a'] = 'Wyrównanie Menu Najaktywniejszych U¿ytkowników';
$lang['l_birthday_a'] = 'Wyrównanie Menu Dzisiaj';
$lang['l_info_a'] = 'Wyrównanie Menu Info U¿ytkownika';
$lang['l_login_a'] = 'Wyrównanie Menu Zaloguj';
$lang['l_whoonline_a'] = 'Wyrównanie Menu Kto jest na forum';
$lang['l_chat_a'] = 'Wyrównanie Menu Chat';
$lang['l_register_a'] = 'Wyrównanie Menu Szybka rejestracja';
$lang['l_links1'] = 'Link do forum';
$lang['l_links2'] = 'Link do portalu';
$lang['l_links3'] = 'Link do listy u¿ytkowników';
$lang['l_links4'] = 'Link Szukaj';
$lang['l_links5'] = 'Link Grupy';
$lang['l_links6'] = 'Link do profilu';
$lang['l_links7'] = 'link Zaloguj/Wyloguj';
$lang['l_links8'] = 'Link Rejestracja';
$lang['l_blank_body_on'] = 'W³asne modu³y';
$lang['l_blank_body_on_e'] = 'Poni¿ej znajduj± siê pola do wpisania w HTML-u w³asnych modu³ów.';
$lang['body_header'] = 'Kod HTML w³asnego nag³ówka';
$lang['body_header_e'] = 'W tym polu mo¿esz napisaæ w HTML w³asny nag³ówek, wraz z linkami. Mo¿esz daæ banner i wszystko co przyjdzie Ci do g³owy.<br />Je¿eli chcesz dostosowaæ nag³ówek osobno dla ka¿dego stylu wpisz w tym miejscu tylko: <b>get_from_template</b> Nag³ówek bêdzie pobierany z katalogu bie¿±cego stylu z pliku <b>portal_header.tpl</b><br /><a href="../images/dynamic.html" target="_blank">Obs³uga zamienników</a>';
$lang['Deactivate'] = 'Wy³±cz';
$lang['none'] = 'wy³±cz';
$lang['l_align_right'] = 'do prawej';
$lang['l_align_center'] = 'do ¶rodka';
$lang['l_align_left'] = 'do lewej';
$lang['custom_desc'] = 'Nazwa w³asnego linka';
$lang['custom_address'] = 'Adres do linka';
$lang['l_portal_on'] = 'Portal w³±czony';
$lang['l_link_logo'] = 'Logo forum linkiem do portalu';
$lang['l_own_header'] = 'W³asny nag³ówek portalu';
$lang['l_portal_on_e'] = 'Mo¿esz napisaæ swój w³asny nag³ówek dla portalu, lecz je¶li wy³±czysz, nag³ówek bêdzie taki sam jak na forum.';
$lang['l_news_forum'] = 'Nag³ówek Newsów';
$lang['l_body_news_forum'] = 'W³asny nag³ówek newsów';
$lang['l_body_news_forum_e'] = 'Mo¿esz napisaæ swój w³asny nag³ówek dla newsów.<br /><a href="../images/dynamic.html" target="_blank">Obs³uga zamienników</a>';
$lang['Logs'] = 'Logi';
$lang['LogsActions'] = 'Logi czynno¶ci';
$lang['Log_action_title'] = 'Logi administracyjne';
$lang['Log_action_explain'] = 'Poni¿ej znajduj± siê logi czynno¶ci wykonywanych przez administratorów i moderatorów';
$lang['Choose_sort_method'] = 'Wybierz metodê sortowania';
$lang['Id_log'] = 'Log Id';
$lang['Delete_log'] = 'Skasuj Log';
$lang['Action'] = 'Czynno¶æ';
$lang['Done_by'] = 'Wykonane przez';
$lang['User_ip'] = 'IP u¿ytkownika';
$lang['Log_delete'] = 'Log skasowany.';
$lang['Click_return_admin_log'] = 'Kliknij %sTutaj%s ¿eby przej¶æ do logów';
$lang['OverallPermissions'] = 'Zezwolenia ogólne';
$lang['OverallPermissions_all'] = 'Ustaw poni¿sze zezwolenia dla wszystkich for';
$lang['l_logsip_e'] = 'Logi domy¶lnie wy³±czone, mo¿esz je w³±czyæ w menu Konfiguracja. Do poprawnej pracy logowania plik /admin/admin_logs.php musi mieæ prawa do zapisu: chmod 777 admin_logs.php<br />Je¿eli chcesz wyczy¶ciæ logi, usuñ zawarto¶æ danych w pliku /admin/admin_logs.php';
$lang['l_logsip'] = 'Logi po³±czeñ';
$lang['Files'] = 'Pliki';
$lang['Globalannounce'] = 'Wa¿ne og³oszenie';
$lang['Group_rank'] = 'Rangi dla grup';
$lang['Group_rank_explain'] = 'Tutaj mo¿esz wybraæ rangi dla ca³ych grup. Bêdzie ignorowane je¶li ustawisz rangê specjaln±.';
$lang['Group_Rank_special'] = 'Personalna- / Ranga grupy';
$lang['Group_rank_order'] = 'Pierwszeñstwo Grup';
$lang['Group_rank_order_moved'] = 'Grupa przeniesiona.';
$lang['Group_rank_order_alreay_moved'] = 'Grupa ju¿ jest przeniesiona.';
$lang['Group_rank_order_could_not_moved'] = 'Grupa nie mo¿e byæ przeniesiona poniewa¿ ju¿ jest na górze lub na dole.';
$lang['Group_rank_resynced'] = 'Grupowanie zsynchronizowane';
$lang['Group_rank_order_explain'] = 'Je¶li u¿ytkownik jest w wiêcej ni¿ jednej grupie, bêdzie pokazywana ta ranga która jest wy¿ej na li¶cie.';

$lang['Inactive_title'] = 'Nieaktywni u¿ytkownicy';
$lang['Deleted_user'] = 'U¿ytkownik z ID #%d usuniêty';
$lang['Activate_title'] = 'Czynno¶æ konta u¿ytkownika';
$lang['Activate'] = 'Aktywuj';
$lang['Waiting_1'] = '(Oczekuje na aktywacjê %d dzieñ)';
$lang['Waiting_2'] = '(Oczekuje na aktywacjê od %d dni)';
$lang['No_users'] = 'Nie ma u¿ytkowników oczekuj±cych na aktywacjê';
$lang['Total_member'] = '<b>%d</b> u¿ytkownik oczekuje na aktywacjê.';
$lang['Total_members'] = '<b>%d</b> u¿ytkowników oczekuje na aktywacjê.';

$lang['Account_block'] = 'Konto zablokowane';
$lang['Account_block_explain'] = 'Tutaj znajduj± siê informacje dot. blokady konta, prób b³êdnego logowania, daty, adresu.';
$lang['Block_until'] = 'Zablokowane do: %s';
$lang['Block_by'] = 'Próby logowañ z IP: %s';
$lang['Last_block_by'] = 'Ostatnio z IP: %s';
$lang['Unblock_user'] = 'Odblokuj konto';
$lang['Block_user'] = 'Zablokuj konto na %s minut';
$lang['Badlogin_count'] = 'Ilo¶æ b³êdnych logowañ';

$lang['BM_Show_bans_by'] = 'Poka¿ bany na';
$lang['BM_All'] = 'Wszystkie';
$lang['BM_Show'] = 'Poka¿';
$lang['BM_Banned'] = 'Za³o¿ony';
$lang['BM_Expires'] = 'Wyga¶nie';
$lang['BM_By'] = 'Przez';
$lang['BM_Add_a_new_ban'] = 'Dodaj bana';
$lang['BM_Edit_ban'] = 'Edytuj bana';
$lang['BM_Delete_selected_bans'] = 'Usuñ wybrane bany';
$lang['BM_Private_reason'] = 'Prywatny powód';
$lang['BM_Private_reason_explain'] = 'Ten powód bêdzie widoczny tylko dla administratorów';
$lang['BM_Public_reason'] = 'Publiczny powód';
$lang['BM_Public_reason_explain'] = 'Ten powód bêdzie wy¶wietlany tylko zbanowanemu u¿ytkownikowi, je¶li bêdzie próbowa³ wej¶æ na forum';
$lang['BM_Generic_reason'] = 'Powód standardowy';
$lang['BM_Mirror_private_reason'] = 'Powód taki sam jak Prywatny Powód';
$lang['BM_Other'] = 'Inny/wpisz ni¿ej';
$lang['BM_Expire_time'] = 'Czas wyga¶niêcia';
$lang['BM_Expire_time_explain'] = 'Mo¿esz ustaliæ kiedy ban ma znikn±æ/wygasn±æ.';
$lang['BM_Never'] = 'Nigdy';
$lang['BM_After_specified_length_of_time'] = 'Po up³ywie:';
$lang['BM_Minutes'] = 'Minut';
$lang['BM_Weeks'] = 'Tygodni';
$lang['BM_Months'] = 'Miesiêcy';
$lang['BM_Years'] = 'Lat';

$lang['Custom_fields'] = 'Pola w profilu';
$lang['shoutbox_on'] = 'ShoutBox w³±czony';
$lang['date_on'] = 'Wy¶wietlanie daty';
$lang['sb_make_links'] = 'W³±cz automatyczne tworzenie linków';
$lang['sb_links_names'] = 'Nazwa linkiem do profilu';
$lang['sb_allow_edit'] = 'Zezwól na edycje wiadomo¶ci przez Administratorów';
$lang['sb_allow_edit_m'] = 'Zezwól na edycje wiadomo¶ci przez Moderatorów';
$lang['sb_allow_edit_all'] = 'Zezwól na edycje w³asnych wiadomo¶ci';
$lang['sb_allow_delete'] = 'Zezwól na usuwanie wiadomo¶ci przez Administratorów';
$lang['sb_allow_delete_m'] = 'Zezwól na usuwanie wiadomo¶ci przez Moderatorów';
$lang['sb_allow_delete_all'] = 'Zezwól na usuwanie w³asnych wiadomo¶ci';
$lang['sb_allow_guest'] = 'Go¶cie mog± pisaæ w ShoutBox\'ie ?';
$lang['sb_allow_guest_view'] = 'Shoutbox tylko widoczny dla go¶ci, bez mo¿liwo¶ci pisania';
$lang['sb_allow_users'] = 'Zarejestrowani u¿ytkownicy mog± pisaæ w ShoutBox\'ie ?';
$lang['sb_allow_users_view'] = 'Shoutbox tylko widoczny dla zarejestrowanych u¿ytkowników, bez mo¿liwo¶ci pisania';
$lang['delete_days'] = 'Po ilu dniach kasowaæ wiadomo¶ci';
$lang['sb_shout_refresh'] = 'Czêstotliwo¶æ od¶wie¿ania shoutboxa.<br>Po jakim czasie shoutbox ma pobraæ nowe wiadomo¶ci czekaj±ce w kolejce? Warto¶ci w sekundach, czyli 5 = 5 sekund';
$lang['sb_shout_group'] = 'Wybierz grupy, które bêd± mog³y pisaæ w shoutboxie. Przytrzymaj klawisz CTRL i myszk± wybieraj grupy.';
$lang['l_usercall'] = 'Po klikniêciu w nick przenosi jego nazwê do pola pisania wiadomo¶ci. User Call.';
$lang['sb_smilies'] = 'W³±cz wysuwany panel emotikon.';
$lang['sb_count_msg'] = 'Ilo¶æ wy¶wietlanych wiadomo¶ci';
$lang['sb_text_lenght'] = 'Maksymalna ilo¶æ znaków w wiadomo¶ci';
$lang['sb_word_lenght'] = 'Maksymalna ilo¶æ znaków w jednym wyrazie';
$lang['setup_shoutbox'] = 'Ustawienia Shoutboxa';
$lang['shout_size'] = 'Rozmiary ShoutBox\'a';
$lang['sb_banned_send'] = 'Zabroñ wysy³aæ wiadomo¶ci u¿ytkownikowi';
$lang['sb_banned_send_e'] = 'Wpisz ID u¿ytkownika, któremu chcesz odebraæ mo¿liwo¶æ wysy³ania wiadomo¶ci do ShoutBox\'a, mo¿esz podaæ kilka, oddziel je przecinkami. Przyk³ad: <b>18, 124</b>';
$lang['sb_banned_view'] = 'Wy³±cz ShoutBox dla u¿ytkownika';
$lang['sb_banned_view_e'] = 'Wpisz ID u¿ytkownika, któremu chcesz odebraæ mo¿liwo¶æ u¿ywania ShoutBox\'a, mo¿esz podaæ kilka, oddziel je przecinkami. Przyk³ad: <b>18, 124</b>';

$lang['disallow_forums'] = 'Zablokuj pisanie w forach';
$lang['disallow_forums_e'] = 'Zablokuj temu u¿ytkownikowi mo¿liwo¶æ pisania w okre¶lonych forach.<br />Dla wyboru kilku, przytrzymaj klawisz Ctrl';
$lang['can_custom_ranks'] = 'Mo¿e ustawiaæ swój tytu³';
$lang['can_custom_color'] = 'Mo¿e ustawiaæ kolor nazwy';

$lang['group_count'] = 'Ilo¶æ wymaganych postów';
$lang['group_count_explain'] = 'Je¶li u¿ytkownik bêdzie mia³ tyle postów lub wiêcej ni¿ ta warto¶æ zostanie automatycznie do³±czony do tej grupy';
$lang['Group_count_enable'] = 'Automatyczne dodawanie u¿ytkowników';
$lang['Group_count_update'] = 'Dodaj teraz u¿ytkowników z podan± lub wiêksz± ilo¶ci± postów';
$lang['Group_count_delete'] = 'Usuñ teraz wszystkich u¿ytkowników tej grupy';

$lang['Optimize_DB'] = 'Optymalizacja SQL';
$lang['Optimize'] = 'Optymalizuj';
$lang['Optimize_explain'] = 'Optymalizacja bazy SQL polega na czyszczeniu pustych pól w bazie';
$lang['Optimize_Table'] = 'Tabela';
$lang['Optimize_Record'] = 'Wpisów';
$lang['Optimize_Type'] = 'Typ';
$lang['Optimize_Size'] = 'Rozmiar';
$lang['Optimize_Status'] = 'Status';
$lang['Optimize_InvertChecked'] = 'Odwróæ zaznaczenia';
$lang['Optimize_success'] = 'Baza pomy¶lnie zoptymalizowana';
$lang['Optimize_NoTableChecked'] = 'Nie wybrano ¿adnej tabeli';

$lang['SQL_Admin_No_Access'] = 'Nie masz dostêpu do tego menu.<br /><br />Kliknij %sTutaj%s ¿eby zobaczyæ szczegó³y.';
$lang['Category_attachment'] = 'Przypisane do';
$lang['Category_desc'] = 'Opis';
$lang['Attach_forum_wrong'] = 'Nie mo¿esz przypisaæ forum do forum. Tylko kategorie.';
$lang['Attach_root_wrong'] = 'Nie mo¿esz przypisaæ forum do g³ównego forum, utwórz kategorie';
$lang['Forum_name_missing'] = 'Nie mo¿na utworzyæ forum bez nazwy';
$lang['Category_name_missing'] = 'Nie mo¿na utworzyæ kategorii bez nazwy';
$lang['Only_forum_for_topics'] = 'Tematy mog± byæ tylko w forum';
$lang['Delete_forum_with_attachment_denied'] = 'Nie mo¿esz usun±æ forum zawieraj±cego podkategorie';
$lang['Category_delete'] = 'Usuñ kategorie';
$lang['Category_delete_explain'] = 'W tym miejscu mo¿esz usun±æ kategorie i przenie¶æ fora oraz podkategorie które zawiera.';
$lang['Forum_link_url'] = 'Forum&nbsp;jako&nbsp;link';
$lang['Forum_link_url_explain'] = 'W tym miejscu mo¿esz podaæ adres lokalny lub pe³ny adres do zewnêtrznego miejsca.<br />Pamiêtaj ¿eby podaæ http://';
$lang['Forum_link_internal'] = 'Adres lokalny';
$lang['Forum_link_internal_explain'] = 'Wybierz Tak je¶li adres jest lokalny (katalog forum)';
$lang['Forum_link_hit_count'] = 'Klikniêæ';
$lang['Forum_link_hit_count_explain'] = 'Wybierz Tak, je¶li chcesz aby klikniêcia by³y zliczane i pokazywane.';
$lang['Forum_link_with_attachment_deny'] = 'Nie mo¿esz ustawiæ forum jako link, je¿eli zawiera podkategorie.';
$lang['Forum_link_with_topics_deny'] = 'Nie mo¿esz ustawiæ forum jako link, je¿eli zawiera tematy.';
$lang['Forum_attached_to_link_denied'] = 'Nie mo¿esz przypisaæ forum ani kategorii do forum które jest linkiem.';

$lang['mass_smilies_add'] = 'Dodaj u¶mieszki z katalogu';
$lang['Click_to_back_smilies'] = 'U¶mieszków dodanych: <b>%s</b><br /><br />Kliknij %sTutaj%s ¿eby wróciæ do zarz±dzania u¶mieszkami';
$lang['Resync_Stats'] = 'Synchronizacja';
$lang['Rebuild_search'] = 'Odbuduj Search';
$lang['Rebuild_search_explain'] = 'Ta funkcja pozwala na odbudowanie tabel phpbb_search_* pobiera ona dane z tabeli postów i kopiuje je do search\'u. Umo¿liwia to ca³kowite odzyskanie tabel search, przydatne jest to w sytuacji gdy mamy du¿± bazê danych i potrzebujemy przenie¶æ forum na inny serwer, wówczas mo¿emy usun±æ ca³kowicie tabele phpbb_search_* które zajmuj± oko³o 40% ca³ej bazy, skopiowaæ bazê danych na drugi serwer i wówczas odbudowaæ search.<br />Odbudowywanie search\'u przy du¿ej ilo¶ci postów mo¿e trwaæ kilka godzin, jest wyposa¿one w automat który pozwala na kontynuowanie odbudowywania po roz³±czeniu.<br />Je¿eli mamy forum na wolnym serwerze, musimy wybraæ wiêkszy czas oraz mniejszy limit postów, w przypadku "zaciêcia" siê funkcji w jakim¶ miejscu musimy chwilowo zmniejszyæ jeszcze bardziej limit postów (dzieje siê tak wtedy gdy skrypt natrafi na obszerny post)<br /><b>Pamiêtaj</b> ¿e podczas startu skryptu tabele phpbb_search_* zostaj± wyczyszczone.';
$lang['Time_limit'] = 'Limit czasu';
$lang['Post_limit'] = 'Limit postów';
$lang['Finished'] = 'Zakoñczono';
$lang['Refresh_rate'] = 'Od¶wie¿anie';
$lang['Percentage_complete'] = 'Postêp';
$lang['Resync_page_desc_simple'] = 'W tym miejscu mo¿esz zsynchronizowaæ bazê danych for, to narzêdzie ustala prawdziw± warto¶æ dla: ilo¶ci tematów, postów, ostatnich postów, odpowiedzi, mo¿esz wybraæ poszczególne fora do synchronizacji, lub zaznaczyæ wszystkie.<br />Je¿eli masz du¿e forum, z du¿± ilo¶ci± tematów i postów, u¿yj trybu zaawansowanego aby synchronizowaæ fora pojedynczo.<br /><b>Przed u¿yciem tego narzêdzia powin' .  (($he) ? 'iene¶' : 'na¶') . ' zrobiæ kopiê bazy danych.</b><br />Zalecane jest dwukrotne wykonanie synchronizacji.'; 
$lang['Resync_all_ask'] = 'Synchronizacja wszystkich for';
$lang['Resync_options'] = 'Opcje synchronizacji';
$lang['Resync_forum_topics'] = 'Ilo¶æ tematów w forum';
$lang['Resync_forum_posts'] = 'Ilo¶æ postów w forum';
$lang['Resync_forum_last_post'] = 'Ostatni post w forum';
$lang['Resync_topic_replies'] = 'Ilo¶æ odpowiedzi w tematach';
$lang['Resync_topic_last_post'] = 'Ostatni post w tematach';
$lang['Resync_question'] = 'Wybór';
$lang['Resync_do'] = 'Uruchom synchronizacjê';
$lang['Resync_redirect'] = '<br /><br />Wróæ do <a href="%s">Synchronizacji</a><br /><br />Wróæ do <a href="%s">Panelu admina</a>.';
$lang['Resync_completed'] = 'Fora oraz tematy zosta³y zsynchronizowane';
$lang['Resync_no_forums'] = 'Brak forów do synchronizacji';
$lang['resume_rebuild'] = '<b>Uwaga!</b> poprzednie odbudowywanie zosta³o przerwane przed ukoñczeniem zadania, kliknij %sTutaj%s aby je przywróciæ, lub %sTutaj%s aby anulowaæ. Je¿eli anulujesz, w tabelach phpbb_search_* pozostan± niepe³ne dane które zosta³y odtworzone do tej pory, zaleca sie wtedy rozpocz±æ przebudowywanie od pocz±tku.';
$lang['value_not'] = 'Warto¶æ: <b>%s</b> nie ma odpowiednika, popraw zapytanie<br /><br />Kliknij %sTutaj%s ¿eby powróciæ';
$lang['confirm_clear'] = 'Nie poda³' .  (($he) ? 'e' : 'a') . '¶ warunków, czy na pewno chcesz wyczy¶ciæ tê tabelê ?';
$lang['cannot_execute'] = 'Nie mogê wykonaæ: <b>%s</b><br /><br />Kliknij %sTutaj%s ¿eby powróciæ.';
$lang['execute_done'] = 'Ilo¶æ rekordów: <b>%s</b><br /><br /><b>%s</b><br /><br />Kliknij %sTutaj%s ¿eby powróciæ.';
$lang['mysql_e'] = '<span style="color: red"><b>UWAGA !!!</b></span> To narzêdzie jest dla zaawansowanych u¿ytkowników! Znaj±cych dzia³anie baz SQL, niew³a¶ciwe u¿ycie mo¿e spowodowaæ trwa³± utratê danych z bazy!<br />W tym miejscu mo¿esz wykonaæ jedno lub kilka zapytañ SQL. Aby wykonaæ kilka, oddziel je znakiem <b>;</b> jednak ten znak nie mo¿e wystêpowaæ w samym zapytaniu SQL.<br />Przed u¿yciem zalecane jest wykonanie kopii bazy SQL ! Prefix tabel: <b>%s</b>';
$lang['do_query'] = 'Wykonanie zapytania/zapytañ SQL';
$lang['execute'] = 'wykonaj';
$lang['access_title'] = 'Zezwolenia dla SQL\'a';
$lang['access_explain'] = 'Z powodów bezpieczeñstwa do menu SQL mog± mieæ dostêp tylko wybrani administratorzy.<br />Je¿eli nie masz dostêpu a uwa¿asz ¿e powin' .  (($he) ? 'iene¶' : 'na¶') . ' mieæ, zwróæ siê do g³ównego administratora.<br />Dopisywanie administratorów którzy maj± mieæ dostêp do SQL odbywa siê za pomoc± ID. Je¿eli nie wiesz co to znaczy to lepiej ¿eby¶ nie wiedzia³' .  (($he) ? '' : 'a') . ' i nie mia³' .  (($he) ? '' : 'a') . ' dostêpu do tej czê¶ci menu, bo mo¿e siê to skoñczyæ uszkodzeniem forum :><br />Je¶li jeste¶ "dopisanym" adminem poni¿ej jest formularz s³u¿±cy do dodania kolejnych adminów którzy bêd± mieli dostêp do SQL. Je¿eli jeste¶ g³ównym administratorem i nie widzisz formularza, kliknij %s<b>Tutaj</b>%s bêdziesz mia³' .  (($he) ? '' : 'a') . ' mo¿liwo¶æ dodania swojego ID (domy¶lnie 2)<br /><span style="color: red"><b>Pamiêtaj</b></span> ¿eby po zakoñczeniu koniecznie zmieniæ nazwê pliku <b>/admin/main_admin.php</b> lub go usun±æ, w przeciwnym razie twoi administratorzy bêd± mogli zast±piæ twoje ID swoim i bêd± mieæ dostêp do SQL.<br />W celu jeszcze wiêkszego bezpieczeñstwa wskazane jest po zakoñczeniu operacji na bazie danych, usuniêcie z tej listy zezwoleñ swojego numeru ID i zmianê nazwy pliku poprzez FTP';
$lang['change_main_admin'] = 'Wpisz swoje ID (dla kilku oddziel przecinkami)';
$lang['IPSearch_Search_by_IP'] = 'Szukaj adresu IP';
$lang['IPSearch_Enter_IP'] = 'Podaj adres IP';
$lang['IPSearch_Search_Results'] = 'Wyniki wyszukiwania IP';
$lang['IPSearch_Enter_an_IP'] = 'Cofnij sie i podaj adres IP';
$lang['IPSearch_Again'] = 'Szukaj jeszcze raz';
$lang['smiley_del_all_success'] = 'Wszystkie u¶mieszki zosta³y usuniête';
$lang['dell_all_smilies'] = 'Usuñ wszystkie u¶mieszki !';
$lang['can_topic_color'] = 'Mo¿e u¿ywaæ koloru tematu';
$lang['Uninstall18'] = 'Deinstalator modyfikacji';
$lang['uninstall_explain'] = 'W tym miejscu mo¿esz przywróciæ forum do oryginalnej postaci, mo¿e siê to okazaæ potrzebne gdy bêdziesz chcia³' .  (($he) ? '' : 'a') . ' uaktualniæ swoje forum np. do wersji phpBB 2.2.<br />Przywracanie sk³ada siê z dwóch etapów: 1. Odinstalowanie w tym miejscu modyfikacji z bazy danych. 2. Nadpisanie plików oryginalnymi plikami phpBB 2.0.x Lepszym sposobem jest usuniêcie z katalogu forum wszystkich plików, z wyj±tkiem katalogu \'images\' oraz pliku <b>config.php</b> i wgranie oryginalnych plików.<br /><br /><b>Odinstalowanie z bazy danych SQL</b><br />Pamiêtaj, ¿e gdy odinstalujesz modyfikacjê z bazy SQL nie bêdzie mo¿na tego cofn±æ. Stracisz wszystkie dodatkowe informacje, te których nie ma w oryginalnym phpBB. Zalecane jest wiêc zrobienie kopii bazy SQL.<br />Mo¿liwe jest oczywi¶cie ponowne przywrócenie forum do postaci z przed odinstalowania, pod warunkiem posiadania kopii bazy SQL. Je¿eli chcemy przywróciæ, czy¶cimy bazê danych, wgrywamy kopiê bazy i nadpisujemy pliki forum plikami phpBB modified v1.12.5 by Przemo z wyj±tkiem pliku <b>config.php</b>';
$lang['Uninstall'] = 'Odinstaluj';
$lang['confirm_uninstall'] = 'Czy jeste¶ pew' .  (($he) ? 'ien' : 'na') . ' ¿e chcesz odinstalowaæ modyfikacje?<br />Spowoduje to utratê niektórych danych, powin' .  (($he) ? 'iene¶' : 'na¶') . ' posiadaæ kopiê bazy danych.';
$lang['Set_new_version'] = 'Podaj wersjê plików phpBB2 którymi nadpiszesz istniej±ce';
$lang['uninstall_end'] = '<span class="nav"><b>Wynik deinstalacji:</b></span><br /><span class="gensmall">Je¿eli wszystkie zapytania s± w kolorze niebieskim, oznacza to ¿e deinstalacja przebieg³a pomy¶lnie. Usuñ wszystkie dodatkowe pliki pakietu phpBB modified by Przemo, i nadpisz wszystkie istniej±ce plikami z oryginalnego pakietu phpBB 2.0.15 lub wy¿szego.</span>';
$lang['query_executed'] = 'Instrukcja wykonana';
$lang['query_not_executed'] = 'Instrukcja nie wykonana';
$lang['Updates'] = 'Uaktualnienia';

$lang['Report_post'] = 'Zg³aszanie postów';
$lang['Report_config_updated'] = 'Ustawienia zg³aszanych postów zaktualizowane.';
$lang['Click_return_report_config'] = 'Kliknij %sTutaj%s aby przej¶æ do ustawieñ zg³aszania postów';
$lang['Click_return_report_auth'] = 'Kliknij %sTutaj%s aby przej¶æ do ustawieñ zezwoleñ zg³aszania postów';
$lang['Click_return_report_auth_select'] = 'Kliknij %sTutaj%s aby przej¶æ do wyboru zezwoleñ zg³aszania postów';
$lang['Report_config'] = 'Zg³aszanie postów - Konfiguracja';
$lang['Report_config_explain'] = '';
$lang['Report_popup_size'] = 'Rozmiary popup\'a';
$lang['Report_popup_size_explain'] = 'W tym miejscu mo¿esz ustawiæ szeroko¶æ i wysoko¶æ popup\'a (w pikselach)';
$lang['Report_popup_links_target'] = 'Okno popup\'a';
$lang['Report_popup_links_target_explain'] = 'W tym miejscu mo¿esz ustaliæ w jakim oknie ma byæ otwierany popup';
$lang['Report_popup_links_target_0'] = 'Jako popup';
$lang['Report_popup_links_target_1'] = 'W nowym oknie';
$lang['Report_popup_links_target_2'] = 'W tym samym oknie';
$lang['Report_only_admin'] = 'Tylko dla administratorów';
$lang['Report_only_admin_explain'] = 'Je¶li w³±czysz t± opcje, tylko administratorzy bêd± powiadamiani o zg³aszanych postach';
$lang['Report_no_guests'] = 'Tylko zarejestrowani';
$lang['Report_no_guests_explain'] = 'Tylko zarejestrowani u¿ytkownicy mog± zg³aszaæ posty';
$lang['No_group_specified'] = 'Nie ma ustalonej grupy/grup';
$lang['Report_already_auth'] = 'Ten u¿ytkownik/grupa ju¿ jest dodany';
$lang['Report_auth_field_explain'] = 'Mo¿esz zaznaczyæ kilka u¿ytkowników';
$lang['Report_permissions_explain'] = 'W tym miejscu mo¿esz zablokowaæ zg³aszanie postów, lub wy³±czyæ powiadamianie o zg³oszonych postach dla wybranych u¿ytkowników';
$lang['Report_no_auth'] = 'Zablokuj mo¿liwo¶æ zg³aszania postów wybranym u¿ytkownikom';
$lang['Report_disable'] = 'Wy³±cz powiadamianie o zg³aszanych postach dla wybranych u¿ytkowników';
$lang['Back'] = 'Cofnij';
$lang['Remove'] = 'Usuñ';
$lang['Report_post_disable'] = 'Zg³aszanie postów wy³±czone';
$lang['Prune_users'] = 'Masowe kasowanie u¿ytkowników'; 
$lang['Acat'] = 'Kategoria: Dodaj';
$lang['Ecat'] = 'Kategoria: Edytuj';
$lang['Dcat'] = 'Kategoria: Usuñ';
$lang['Rcat'] = 'Kategoria: Przemianuj';
$lang['Afile'] = 'Pliki: Dodaj';
$lang['Efile'] = 'Pliki: Edytuj';
$lang['Dfile'] = 'Pliki: Usuñ';
$lang['Afield'] = 'Dodatki: Dodaj';
$lang['Efield'] = 'Dodatki: Edytuj';
$lang['Dfield'] = 'Dodatki: Usuñ';
$lang['Alicense'] = 'Licencja: Dodaj';
$lang['Elicense'] = 'Licencja: Edytuj';
$lang['Dlicense'] = 'Licencja: Usuñ';
$lang['Fchecker'] = 'Pliki: Konserwacja';
$lang['wrong_config_parametr'] = $lang['Server_name'] . ' nie mo¿e zawieraæ <b>http://</b> !';
$lang['Birthday_explain'] = 'Format daty: %s, przyk³ad: 09-11-1982 Pamiêtaj ¿eby dodaæ zero je¶li trzeba';
$lang['Forum_link'] = 'Link zewnêtrzny';
$lang['User_allow_helped'] = 'Mo¿e u¿ywaæ punktów "Pomóg³"';
$lang['User_allow_helped_e'] = 'W³±cza lub wy³±cza zarówno u¿ywanie przycisku "Pomóg³" jak i ukrywa ilo¶æ punktów "Pomóg³" uzyskanych przez tego u¿ytkownika';
$lang['Admin_notepad'] = 'Notatnik Administratorów';
$lang['confirm_deluser'] = 'Czy jeste¶ pew' .  (($he) ? 'ien' : 'na') . ' ¿e chcesz usun±æ tego u¿ytkownika ?';
$lang['Donation'] = '<b>Wspomó¿ autora</b>';
$lang['Donation_e'] = '<br />Je¿eli podoba Ci siê modyfikacja forum, której u¿ywasz, mo¿esz wspomóc jej autora.<br />Aby to zrobiæ <a href="http://www.przemo.org/phpBB2/donation/">zobacz szczegó³y</a><br /><br /></span><span class="genmed">Modyfikacjê t± tworzê sam, praca nad ni± jest moim hobby i pasj±, a po¶wiêci³em jej oko³o 2,000 godzin.<br />Pocz±tkowo by³o to malutkie zmodyfikowane forum, które zrobi³em tylko do w³asnych potrzeb. Jednak od samego pocz±tku podoba³o siê wielu osobom, dlatego postanowi³em je opublikowaæ za darmo (darmowym jest do tej pory i darmowym pozostanie). Modyfikacja zdobywa³a coraz wiêksz± popularno¶æ a ja mia³em z niej coraz wiêksz± satysfakcjê (choæ równie¿ spoczywaj±ca na mnie odpowiedzialno¶æ, zwiêksza³a siê).<br />Ilo¶æ osób zainteresowanych ros³a b³yskawicznie (i dalej ro¶nie, nie tylko w Polsce). W efekcie, mojej stronie i forum gdzie mo¿na uzyskaæ pomoc, przesta³ wystarczaæ darmowy hosting. Skorzysta³em z komercyjnego serwera, oferuj±cego bardzo du¿e limity transferu miesiêcznego (15GB), jednak w ostatnich miesi±cach i te przesta³y wystarczaæ.<br />Ciesz±c siê dalej swoim projektem a tak¿e co najwa¿niejsze, zadowoleniem tysiêcy U¿ytkowników, nie mogê zaprzestaæ rozwijania tej modyfikacji.<br /><br />Mam g³êbok± nadziejê, ¿e phpBB by Przemo bêdzie istnieæ zawsze, je¶li tak siê stanie, bêdzie nad±¿a³o za potrzebami jego U¿ytkowników.<br /><br />Dlatego liczê na Twoje wsparcie. Je¿eli doceniasz moj± pracê, zawsze bêd± mnie cieszyæ s³owa pochwa³y i zadowolenia, ale je¶li masz ku temu wiêksze mo¿liwo¶ci, bardzo proszê o drobne wsparcie. Szczegó³y s± opisane w powy¿szym linku.<br />Uchylaj±c r±bka tajemnicy, napiszê, ¿e pomoc ka¿dej osoby zostanie doceniona i przyniesie jej korzy¶ci :)<br /><br />Przemo';
$lang['Forum_moderate'] = 'Forum moderowane';
$lang['Forum_moderate_e'] = 'Tematy i posty bêd± oczekiwa³y na akceptacjê przez Moderatora lub Administratora';
$lang['Tree_req'] = 'Tematy tylko w formie drzewa';
$lang['Tree_req_grade'] = 'Po ilu stopniach drzewa zmniejszenie odleg³o¶ci stopni drzewa<br />0 - Wy³±cza ca³kowicie drzewa w forum';
$lang['Prune_explain'] = 'Nie zostan± usuniête tematy zawieraj±ce sondy lub bêd±ce og³oszeniami lub tematami przyklejonymi.';
$lang['No_count'] = 'Niezliczanie postów';
$lang['Forums_shadow'] = 'Fora nieskojarzone z ¿adn± kategori±';
$lang['Wrong_category'] = 'Nie mo¿esz przypisaæ forum samego do siebie.';
$lang['All_forums'] = 'Wszystkie fora i kategorie';
$lang['log_file_limit_info'] = 'Plik logów <b>/admin/admin_logs.'.$phpEx.'</b> jest zbyt du¿y (%sMb) aby go otworzyæ w oknie przegl±darki.<br /><br />Plik zosta³ skompresowany i znajduje siê w: <b>%s</b><br /><br />Kliknij %sTutaj%s aby go pobraæ.<br /><br />Po ¶ci±gniêciu KONIECZNIE usuñ go z katalogu /files/ mo¿esz te¿ wyczy¶ciæ stary plik /admin/admin_logs.'.$phpEx;
$lang['log_file_limit_error1'] = 'B³±d odczytu pliku: <b>%s</b>';
$lang['log_file_limit_error2'] = 'B³±d zapisu skompresowanego pliku: <b>%s</b>';

$lang['Confirm_delete_all'] = 'Czy na pewno chcesz usun±æ wszystkie: <b>%s</b> ?';
$lang['Split'] = '£±czenie';
$lang['Expire'] = 'Wygasanie';
$lang['Warning_delete'] = 'Usuniêcie ostrze¿enia';
$lang['Warning_edit'] = 'Edycja ostrze¿enia';
$lang['Object'] = 'Obiekt';
$lang['Group_mail_enable'] = 'Moderator grupy mo¿e wysy³aæ masow± korespondencjê do cz³onków grupy ?';
$lang['Forum_trash'] = 'Forum jako ¶mietnik';
$lang['Forum_trash_e'] = 'Gdy ustawisz forum jako ¶mietnik, podczas kasowania tematów pojawi siê dodatkowy przycisk s³u¿±cy przenoszeniu tematu do ¶mietnika';
$lang['Resync_page_posts'] = 'Synchronizacja u¿ytkowników';
$lang['No_themes'] = 'Brak Szablonów w bazie danych';
$lang['Group_prefix'] = 'Prefix, pojawi siê przed nazw± u¿ytkowników';
$lang['Group_no_unsub'] = 'Zakaz opuszczania';
$lang['Groups_color_explain'] = 'Mo¿esz wyró¿niæ grupy, ustawiaj±c im kolor prefix oraz styl. Je¿eli w edycji danych stylu, usuniesz kolor dla Admina, Moda lub Junior Admina nie bêd± oni oznaczani kolorem i bêdziesz ' .  (($he) ? 'móg³' : 'mog³a') . ' ich przypisaæ do wyró¿nionej grupy, zniknie te¿ opis kolorów m.in. na stronie g³ównej.<br />Wiele stylów oddziel ¶rednikiem, przyk³ady: <b>font-weight: bold; font-size: 16px; text-decoration: line-through; font-style: italic; filter: glow(color=#FF0000);height:10</b> i wiele innych (max. 255 znaków)';
$lang['Group_style'] = 'Styl';
$lang['Separate_topics'] = 'Oddzielone wa¿ne tematy';
$lang['Separate_total'] = 'osobne tabele';
$lang['Separate_med'] = 'belka';
$lang['Show_global_announce'] = 'Pokazuj wa¿ne og³oszenia z innych for';
$lang['Advert_title'] = 'Reklama';
$lang['Show_hosts'] = 'Poka¿ hosty';
$lang['Forum_no_split'] = 'Nie ³±cz postów';
$lang['Forum_no_helped'] = 'Wy³±cz "Pomóg³"';
$lang['topic_tags'] = 'Tagi tematów, oddzielaj przecinkami, nie u¿ywaj znaków <b>[]</b>';
$lang['sort_methods'] = 'Zablokowane na dó³';

$lang['Statistics_management'] = 'Modu³y statystyk';
$lang['Statistics_config'] = 'Konfiguracja statystyk';
$lang['Acces_menu_denied'] = 'Nie masz dostêpu do tego menu';
$lang['Check-files'] = 'Kontrola Systemu';
$lang['New_info'] = 'Proszê czekaæ, trwa pobieranie informacji o aktualizacjach ...';
$lang['forum_compress'] = 'przez skrypt';
$lang['server_compress'] = 'przez serwer';
$lang['Name'] = 'Nazwa';
$lang['Files_count'] = 'Ilo¶æ plików';
$lang['Rows_count'] = 'Ilo¶æ wpisów';
$lang['Config_setup'] = 'Zapis konfiguracji';
$lang['Config_setup_e'] = 'W tym miejscu mo¿esz zapisaæ bie¿±c± konfiguracjê forum, odtworzyæ zapisan± konfiguracjê, ustawiæ minimaln± i maksymaln± konfiguracjê. Dotyczy to ogólnej konfiguracji forum, ustawieñ portalu, ostrze¿eñ, shoutbox\'a, za³±czników, albumu oraz zg³aszania postów. Dotyczy to tylko konfiguracji, nie dotyczy informacji które s± dodawane jak np. zezwolenia, u¶mieszki, cenzura s³ów, zainstalowane style, banlista, pola w profilu, zabronione nazwy, grupy, fora, kategorie, rozszerzenia za³±czników.';
$lang['Default_config'] = 'Ustaw domy¶ln± konfiguracjê';
$lang['Max_config'] = 'Ustaw maksymaln± konfiguracjê';
$lang['Min_config'] = 'Ustaw minimaln± konfiguracjê';
$lang['Save_config'] = 'Zapisz bie¿±c± konfiguracjê';
$lang['Saved_config'] = 'Ustaw konfiguracjê zapisan±: %s';
//
// That's all Folks!
// -------------------------------------------------

?>
