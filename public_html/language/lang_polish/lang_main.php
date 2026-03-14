<?php
/***************************************************************************
 *                      lang_main.php [Polish]
 *                      -------------------
 * begin                : Sat Dec 16 2000
 * copyright            : (C) 2001 The phpBB Group
 * email                : support@phpbb.com
 * modification         : (C) 2003 Przemo http://www.przemo.org
 * date modification    : ver. 1.12.5 2005/12/10 1:14
 *
 ****************************************************************************/

/***************************************************************************
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 ***************************************************************************/

//
// Translation by Mike Paluchowski and Radek Kmiecicki
// http://www.phpbb.pl/
//


//
// The format of this file is ---> $lang['message'] = 'text';
//
// You should also try to set a locale and a character encoding (plus direction). The encoding and direction
// will be sent to the template. The locale may or may not work, it's dependent on OS support and the syntax
// varies ... give it your best guess!
//



// Check for user gender
$he = ($userdata['user_gender'] != 2) ? true : false;

setlocale(LC_ALL, 'pl');
@setlocale (LC_ALL, 'pl_PL.iso-8859-2', 'pl_PL.latin2', 'pl_PL', 'pl', 'polish');
$lang['ENCODING'] = 'iso-8859-2';
$lang['DIRECTION'] = 'ltr';
$lang['DATE_FORMAT'] = 'd M Y';

//
// Common, these terms are used
// extensively on several pages
//
$lang['Forum'] = 'Forum';
$lang['Category'] = 'Kategoria';
$lang['Topic'] = 'Temat';
$lang['Topics'] = 'Tematy';
$lang['Replies'] = 'Odpowiedzi';
$lang['Views'] = 'Wy¶wietleñ';
$lang['Post'] = 'Post';
$lang['Posts'] = 'Posty';
$lang['Posted'] = 'Wys³any';
$lang['Username'] = 'U¿ytkownik';
$lang['Password'] = 'Has³o';
$lang['Email'] = 'E-mail';
$lang['Poster'] = 'Wys³a³';
$lang['Author'] = 'Autor';
$lang['Time'] = 'Czas';
$lang['Hours'] = 'Godzin';
$lang['Message'] = 'Wiadomo¶æ';

$lang['1_Day'] = '1 Dzieñ';
$lang['7_Days'] = '7 Dni';
$lang['2_Weeks'] = '2 Tygodnie';
$lang['1_Month'] = '1 Miesi±c';
$lang['3_Months'] = '3 Miesi±ce';
$lang['6_Months'] = '6 Miesiêcy';
$lang['1_Year'] = '1 Rok';

$lang['Jump_to'] = 'Skocz do';
$lang['Submit'] = 'Wy¶lij';
$lang['Reset'] = 'Wyczy¶æ';
$lang['Cancel'] = 'Anuluj';
$lang['Preview'] = 'Podgl±d';
$lang['Confirm'] = 'Zatwierd¼';
$lang['Yes'] = 'Tak';
$lang['No'] = 'Nie';
$lang['Enabled'] = 'W³±czony';
$lang['Disabled'] = 'Wy³±czony';
$lang['Error'] = 'B³±d';

$lang['Next'] = 'Dalej';
$lang['Previous'] = 'Wstecz';
$lang['Goto_page'] = 'Id¼ do strony';
$lang['Joined'] = 'Do³±czy³';
$lang['IP_Address'] = 'Adres IP';

$lang['Select_forum'] = 'Wybierz forum';
$lang['View_newest_post'] = 'Zobacz najnowszy post';
$lang['Page_of'] = 'Strona <b>%d</b> z <b>%d</b>';

$lang['ICQ'] = 'Numer ICQ';
$lang['AIM'] = 'Numer Gadu-Gadu';
$lang['MSNM'] = 'MSN Messenger';
$lang['YIM'] = 'Yahoo Messenger';

$lang['Forum_Index'] = '%s Strona G³ówna';

$lang['Post_new_topic'] = 'Napisz nowy temat';
$lang['Reply_to_topic'] = 'Odpowiedz do tematu';
$lang['Reply_with_quote'] = 'Odpowiedz z cytatem';

$lang['Click_return_topic'] = 'Kliknij %sTutaj%s aby powróciæ do tematu';
$lang['Click_return_forum'] = 'Kliknij %sTutaj%s aby powróciæ na forum';
$lang['Click_view_message'] = 'Kliknij %sTutaj%s aby zobaczyæ swoj± wiadomo¶æ';
$lang['Click_return_group'] = 'Kliknij %sTutaj%s aby powróciæ do informacji o grupach';

$lang['Admin_panel'] = 'Panel Administracyjny';

$lang['Board_disable'] = 'To forum jest teraz wy³±czone.';

//
// Global Header strings
//
$lang['Registered_users'] = 'Zarejestrowani U¿ytkownicy:';
$lang['Browsing_forum'] = 'U¿ytkownicy przegl±daj±cy to forum:';
$lang['Online_users_zero_total'] = 'Na Forum jest <b>0</b> u¿ytkowników :: ';
$lang['Online_users_total'] = 'Na Forum jest <b>%d</b> u¿ytkowników :: ';
$lang['Online_user_total'] = 'Na Forum jest <b>%d</b> u¿ytkownik :: ';
$lang['Reg_users_zero_total'] = '0 Zarejestrowanych, ';
$lang['Reg_users_total'] = '%d Zarejestrowanych, ';
$lang['Reg_user_total'] = '%d Zarejestrowany, ';
$lang['Hidden_users_zero_total'] = '0 Ukrytych i ';
$lang['Hidden_users_total'] = '%d Ukrytych i ';
$lang['Hidden_user_total'] = '%d Ukryty i ';
$lang['Guest_users_zero_total'] = '0 Go¶ci';
$lang['Guest_users_total'] = '%d Go¶ci';
$lang['Guest_user_total'] = '%d Go¶æ';
$lang['Record_online_users'] = 'Najwiêcej u¿ytkowników <b>%s</b> by³o obecnych %s';

$lang['Admin_online_color'] = 'Administrator';
$lang['Mod_online_color'] = 'Moderator';

$lang['You_last_visit'] = 'Ostatnio odwiedzi³' .  (($he) ? 'e' : 'a') . '¶ nas %s';
$lang['Current_time'] = 'Obecny czas to %s';

$lang['Flood_Search'] = 'Nie mo¿esz wyszukiwaæ tak szybko. Odczekaj kilka sekund i spróbuj ponowanie lub od¶wie¿ stronê.';
$lang['Search_your_posts'] = 'Zobacz swoje posty';
$lang['Search_unanswered'] = 'Zobacz posty bez odpowiedzi';

$lang['Register'] = 'Rejestracja';
$lang['Profile'] = 'Profil';
$lang['Edit_profile'] = 'Zmieñ swój profil';
$lang['Search'] = 'Szukaj';
$lang['Memberlist'] = 'U¿ytkownicy';
$lang['FAQ'] = 'FAQ';
$lang['BBCode_guide'] = 'Przewodnik BBCode';
$lang['Usergroups'] = 'Grupy';
$lang['Last_Post'] = 'Ostatni post';
$lang['Moderator'] = 'Moderator';
$lang['Moderators'] = 'Moderatorzy';


//
// Stats block text
//
$lang['Posted_articles_zero_total'] = 'Nasi u¿ytkownicy napisali <b>0</b> postów';
$lang['Posted_articles_total'] = 'Nasi u¿ytkownicy napisali <b>%d</b> postów';
$lang['Posted_article_total'] = 'Nasi u¿ytkownicy napisali <b>%d</b> wiadomo¶æ';
$lang['Registered_users_zero_total'] = 'Mamy <b>0</b> zarejestrowanych u¿ytkowników';
$lang['Registered_users_total'] = 'Mamy <b>%d</b> zarejestrowanych u¿ytkowników';
$lang['Registered_user_total'] = 'Mamy <b>%d</b> zarejestrowanego u¿ytkownika';
$lang['Newest_user'] = 'Ostatnio zarejestrowana osoba: <b>%s%s%s</b>';

$lang['No_new_posts'] = 'Brak nowych postów';
$lang['New_posts'] = 'Nowe posty';
$lang['New_post'] = 'Nowy post';
$lang['No_new_posts_hot'] = 'Brak nowych postów [ Popularny ]';
$lang['New_posts_hot'] = 'Nowe posty [ Popularny ]';
$lang['No_new_posts_locked'] = 'Brak nowych postów [ Zablokowany ]';
$lang['New_posts_locked'] = 'Nowe posty [ Zablokowany ]';
$lang['Forum_is_locked'] = 'Forum Zablokowane';


//
// Login
//
$lang['Login'] = 'Zaloguj';
$lang['Logout'] = 'Wyloguj';

$lang['Forgotten_password'] = 'Zapomnia³em has³a';

$lang['Log_me_in'] = 'Zaloguj mnie automatycznie przy ka¿dej wizycie';


//
// Index page
//
$lang['No_Posts'] = 'Brak Postów';
$lang['No_forums'] = 'Brak For';

$lang['Private_Message'] = 'Prywatna Wiadomo¶æ';
$lang['Private_Messages'] = 'Prywatne Wiadomo¶ci';
$lang['Who_is_Online'] = 'Kto jest na Forum';

$lang['Mark_all_forums'] = 'Oznacz wszystkie fora jako przeczytane';
$lang['Forums_marked_read'] = 'Wszystkie fora oznaczono jako przeczytane';


//
// Viewforum
//
$lang['View_forum'] = 'Zobacz Forum';

$lang['Forum_not_exist'] = 'Wybrane przez Ciebie forum nie istnieje';

$lang['Display_topics'] = 'Wy¶wietl tematy z ostatnich';

$lang['Topic_Announcement'] = '<b>Og³oszenie:</b>';
$lang['Topic_Sticky'] = '<b>Przyklejony:</b>';
$lang['Topic_Moved'] = '<b>Przesuniêty:</b>';
$lang['Topic_Poll'] = '<b>[ Ankieta ]</b>';

$lang['Mark_all_topics'] = 'Oznacz wszystkie tematy jako przeczytane';
$lang['Topics_marked_read'] = 'Tematy na tym forum zosta³y oznaczone jako przeczytane';

$lang['Rules_post_can'] = '<b>Mo¿esz</b> pisaæ nowe tematy';
$lang['Rules_post_cannot'] = '<b>Nie mo¿esz</b> pisaæ nowych tematów';
$lang['Rules_reply_can'] = '<b>Mo¿esz</b> odpowiadaæ w tematach';
$lang['Rules_reply_cannot'] = '<b>Nie mo¿esz</b> odpowiadaæ w tematach';
$lang['Rules_edit_can'] = '<b>Mo¿esz</b> zmieniaæ swoje posty';
$lang['Rules_edit_cannot'] = '<b>Nie mo¿esz</b> zmieniaæ swoich postów';
$lang['Rules_delete_can'] = '<b>Mo¿esz</b> usuwaæ swoje posty';
$lang['Rules_delete_cannot'] = '<b>Nie mo¿esz</b> usuwaæ swoich postów';
$lang['Rules_vote_can'] = '<b>Mo¿esz</b> g³osowaæ w ankietach';
$lang['Rules_vote_cannot'] = '<b>Nie mo¿esz</b> g³osowaæ w ankietach';
$lang['Rules_moderate'] = '<b>Mo¿esz</b> %smoderowaæ to forum%s';

$lang['No_topics_post_one'] = 'Nie ma ¿adnych postów na tym forum<br />Kliknij na przycisk <b>Nowy Temat</b> aby co¶ napisaæ';
$lang['No_topics_post_one_ignore'] = 'Nie ma wiêcej tematów których nie ignorujesz na tym forum, kliknij link "Poka¿ ignorowane tematy" aby zobaczyæ wszystkie tematy';

//
// Viewtopic
//
$lang['View_topic'] = 'Zobacz temat';

$lang['Guest'] = 'Go¶æ';
$lang['Post_subject'] = 'Temat postu';
$lang['View_next_topic'] = 'Nastêpny temat';
$lang['View_previous_topic'] = 'Poprzedni temat';
$lang['Submit_vote'] = 'Wy¶lij G³os';
$lang['View_results'] = 'Zobacz Wyniki';

$lang['No_newer_topics'] = 'Nie ma nowszych tematów na tym forum';
$lang['No_older_topics'] = 'Nie ma starszych tematów na tym forum';
$lang['No_posts_topic'] = 'Nie istniej± ¿adne posty dla tego tematu';

$lang['Display_posts'] = 'Wy¶wietl posty z ostatnich';
$lang['All_Posts'] = 'Wszystkie Posty';
$lang['Newest_First'] = 'Najpierw Nowsze';
$lang['Oldest_First'] = 'Najpierw Starsze';

$lang['Back_to_top'] = 'Powrót do góry';

$lang['Read_profile'] = 'Zobacz profil autora';
$lang['Visit_website'] = 'Odwied¼ stronê autora';
$lang['Edit_delete_post'] = 'Zmieñ/Usuñ ten post';
$lang['View_IP'] = 'Zobacz IP autora';
$lang['Delete_post'] = 'Usuñ ten post';

$lang['wrote'] = 'napisa³/a';
$lang['Quote'] = 'Cytat';
$lang['Code'] = 'Kod';
$lang['youtube_link'] = "YouTube"; // YouTube Tag
$lang['Edited_time_total'] = 'Ostatnio zmieniony przez %s %s, w ca³o¶ci zmieniany %d raz';
$lang['Edited_times_total'] = 'Ostatnio zmieniony przez %s %s, w ca³o¶ci zmieniany %d razy';

$lang['Lock_topic'] = 'Zablokuj ten temat';
$lang['Unlock_topic'] = 'Odblokuj ten temat';
$lang['Move_topic'] = 'Przesuñ ten temat';
$lang['Delete_topic'] = 'Usuñ ten temat';
$lang['Split_topic'] = 'Podziel ten temat';

$lang['Stop_watching_topic'] = 'Przestañ ¶ledziæ ten temat';
$lang['Start_watching_topic'] = '¦led¼ odpowiedzi w tym temacie';
$lang['No_longer_watching'] = 'Przesta³' .  (($he) ? 'e' : 'a') . '¶ ¶ledziæ ten temat';
$lang['You_are_watching'] = 'Rozpocz' .  (($he) ? '±³e' : 'ê³a') . '¶ ¶ledzenie tego tematu';

$lang['Total_votes'] = 'Wszystkich G³osów';

//
// Posting/Replying (Not private messaging!)
//
$lang['Message_body'] = 'Tre¶æ wiadomo¶ci';
$lang['Topic_review'] = 'Przegl±d tematu';

$lang['No_post_mode'] = 'Nie okre¶lono typu postu';

$lang['Post_a_new_topic'] = 'Napisz nowy temat';
$lang['Post_a_reply'] = 'Napisz odpowied¼';
$lang['Post_topic_as'] = 'Napisz temat jako';
$lang['Edit_Post'] = 'Zmieñ post';
$lang['Options'] = 'Opcje';

$lang['Post_Announcement'] = 'Og³oszenie';
$lang['Post_Sticky'] = 'Przyklejony';
$lang['Post_Normal'] = 'Normalny';

$lang['Confirm_delete'] = 'Czy na pewno chcesz usun±æ ten post?';
$lang['Confirm_delete_poll'] = 'Czy na pewno chcesz usun±æ tê ankietê?';

$lang['Flood_Error'] = 'Nie mo¿esz wys³aæ nowego postu tak szybko po poprzednim, zaczekaj chwilê i spróbuj ponownie';
$lang['Empty_subject'] = 'Musisz wpisaæ temat je¶li wysy³asz nowy w±tek';
$lang['Empty_message'] = 'Musisz wpisaæ wiadomo¶æ przed wys³aniem';
$lang['Forum_locked'] = 'To forum jest zablokowane, nie mo¿esz pisaæ dodawaæ ani zmieniaæ na nim czegokolwiek';
$lang['Topic_locked'] = 'Ten temat jest zablokowany bez mo¿liwo¶ci zmiany postów lub pisania odpowiedzi';
$lang['No_topic_id'] = 'Musisz wybraæ temat do wys³ania odpowiedzi';
$lang['No_valid_mode'] = 'Mo¿esz jedynie pisaæ nowe, odpowiadaæ, zmieniaæ lub cytowaæ wiadomo¶ci, wróæ i spróbuj ponownie';
$lang['No_such_post'] = 'Taki post lub temat nie istnieje, byæ mo¿e zosta³ przed chwil± usuniêty, wróæ i spróbuj ponownie';
$lang['Edit_own_posts'] = 'Mo¿esz zmieniaæ jedynie swoje posty';
$lang['Delete_own_posts'] = 'Mo¿esz usuwaæ jedynie swoje posty';
$lang['Cannot_delete_replied'] = 'Nie mo¿esz usuwaæ postów, na które jest odpowied¼';
$lang['Cannot_delete_poll'] = 'Nie mo¿esz usun±æ aktywnej ankiety';
$lang['Empty_poll_title'] = 'Musisz wpisaæ tytu³ dla ankiety';
$lang['To_few_poll_options'] = 'Musisz wpisaæ przynajmniej dwie opcje ankiety';
$lang['To_many_poll_options'] = 'Poda³' .  (($he) ? 'e' : 'a') . '¶ zbyt wiele opcji dla ankiety';
$lang['Already_voted'] = 'Odda³' .  (($he) ? 'e' : 'a') . '¶ ju¿ g³os w tej ankiecie';
$lang['No_vote_option'] = 'Musisz wybraæ opcjê podczas g³osowania';

$lang['Add_poll'] = 'Dodaj Ankietê';
$lang['Add_poll_explain'] = 'Je¿eli nie chcesz dodawaæ ankiety do tego tematu, pozostaw pola puste';
$lang['Poll_question'] = 'Pytanie do ankiety';
$lang['Poll_option'] = 'Opcja ankiety';
$lang['Add_option'] = 'Dodaj opcjê';
$lang['Update'] = 'Aktualizuj';
$lang['Delete'] = 'Usuñ';
$lang['Poll_for'] = 'Czas trwania';
$lang['Days'] = 'Dni';
$lang['Poll_for_explain'] = '[ Wpisz 0 lub pozostaw puste dla niekoñcz±cej siê ankiety ]';
$lang['Delete_poll'] = 'Usuñ Ankietê';

$lang['Disable_HTML_post'] = 'Wy³±cz HTML w tym po¶cie';
$lang['Disable_BBCode_post'] = 'Wy³±cz BBCode w tym po¶cie';
$lang['Disable_Smilies_post'] = 'Wy³±cz U¶mieszki w tym po¶cie';

$lang['HTML_is_ON'] = 'HTML: <u>TAK</u>';
$lang['HTML_is_OFF'] = 'HTML: <u>NIE</u>';
$lang['BBCode_is_ON'] = '%sBBCode%s: <u>TAK</u>';
$lang['BBCode_is_OFF'] = '%sBBCode%s: <u>NIE</u>';
$lang['Smilies_are_ON'] = 'U¶mieszki: <u>TAK</u>';
$lang['Smilies_are_OFF'] = 'U¶mieszki: <u>NIE</u>';

$lang['Attach_signature'] = 'Dodaj podpis (mo¿e byæ zmieniony w profilu)';
$lang['Notify'] = 'Powiadom mnie gdy kto¶ odpowie';

$lang['Stored'] = 'Wiadomo¶æ zosta³a zapisana';
$lang['Deleted'] = 'Wiadomo¶æ zosta³a usuniêta';
$lang['Poll_delete'] = 'Ankieta zosta³a usuniêta';
$lang['Vote_cast'] = 'Twój g³os zosta³ zapisany';

$lang['Topic_reply_notification'] = 'Powiadomienie o Odpowiedzi';

$lang['bbcode_b_help'] = 'Tekst pogrubiony: [b]tekst[/b] Rada: zaznacz tekst i kliknij';
$lang['bbcode_i_help'] = 'Tekst kursyw±: [i]tekst[/i] Rada: zaznacz tekst i kliknij';
$lang['bbcode_u_help'] = 'Tekst podkre¶lony: [u]tekst[/u] Rada: zaznacz tekst i kliknij';
$lang['bbcode_q_help'] = 'Cytat: [quote]tekst[/quote] Rada: zaznacz tekst i kliknij';
$lang['bbcode_c_help'] = 'Poka¿ kod: [code]kod[/code] Rada: zaznacz tekst i kliknij';
$lang['bbcode_l_help'] = 'Lista: [list]tekst[/list] Rada: zaznacz tekst i kliknij';
$lang['bbcode_o_help'] = 'Lista uporz±dkowana: [list=]tekst[/list] Rada: zaznacz tekst i kliknij';
$lang['bbcode_p_help'] = 'Wstaw obrazek: [img]http://adres_obrazka[/img] Rada: Kliknij i wpisz adres';
$lang['bbcode_w_help'] = '[url]http://adres[/url] Rada: Kliknij wpisz nazwê i adres';
$lang['bbcode_a_help'] = 'Zamknij wszystkie otwarte tagi bbCode';
$lang['bbcode_s_help'] = 'Kolor czcionki: [color=red]tekst[/color] Rada: zaznacz tekst i wybierz kolor';
$lang['bbcode_f_help'] = 'Rozmiar czcionki: [size=x-small]ma³y tekst[/size] Rada: zaznacz tekst i wybierz rozmiar';
$lang['bbcode_yt_help'] = "Umie¶æ link do filmiku miêdzy tagami: [youtube][/youtube]"; // YouTube Tag
$lang['Emoticons'] = 'Ikony Emocji';
$lang['More_emoticons'] = 'Wiêcej Ikon';

$lang['Font_color'] = 'Kolor';
$lang['color_default'] = 'Domy¶lny';
$lang['color_dark_red'] = 'Ciemnoczerwony';
$lang['color_red'] = 'Czerwony';
$lang['color_orange'] = 'Pomarañczowy';
$lang['color_brown'] = 'Br±zowy';
$lang['color_yellow'] = '¿ó³ty';
$lang['color_green'] = 'Zielony';
$lang['color_olive'] = 'Oliwkowy';
$lang['color_cyan'] = 'B³êkitny';
$lang['color_blue'] = 'Niebieski';
$lang['color_dark_blue'] = 'Ciemnoniebieski';
$lang['color_indigo'] = 'Purpurowy';
$lang['color_violet'] = 'Fioletowy';
$lang['color_white'] = 'Bia³y';
$lang['color_black'] = 'Czarny';

$lang['Font_size'] = 'Rozmiar';
$lang['font_tiny'] = 'Minimalny';
$lang['font_small'] = 'Ma³y';
$lang['font_normal'] = 'Normalny';
$lang['font_large'] = 'Du¿y';
$lang['font_huge'] = 'Ogromny';

$lang['Close_Tags'] = 'Zamknij Tagi';
$lang['Styles_tip'] = 'Rada: Style mog± byæ stosowane szybko do zaznaczonego tekstu';


//
// Private Messaging
//
$lang['Private_Messaging'] = 'Prywatne Wiadomo¶ci';

$lang['Login_check_pm'] = 'Zaloguj&nbsp;siê,&nbsp;by&nbsp;sprawdziæ&nbsp;wiadomo¶ci';
$lang['New_pms'] = 'Masz %d <span class=\'pm\'>*<b>nowe</b>*</span> wiadomo¶ci';
$lang['New_pm'] = 'Masz %d <span class=\'pm\'>*<b>now±</b>*</span> wiadomo¶æ';
$lang['No_new_pm'] = 'Nie&nbsp;masz&nbsp;wiadomo¶ci';
$lang['Unread_pms'] = 'Masz %d nieprzeczytanych wiadomo¶ci';
$lang['Unread_pm'] = 'Masz %d nieprzeczytan± wiadomo¶æ';
$lang['No_unread_pm'] = 'Nie masz nieprzeczytanych wiadomo¶ci';
$lang['You_new_pm'] = 'Nowa prywatna wiadomo¶æ czeka na Ciebie w Skrzynce';
$lang['You_new_pms'] = 'Nowe prywatne wiadomo¶ci czekaj± na Ciebie w Skrzynce';
$lang['You_no_new_pm'] = 'Nie ma dla Ciebie ¿adnych nowych prywatnych wiadomo¶ci';
$lang['Unread_message'] = 'Nowa wiadomo¶æ';
$lang['Read_message'] = 'Przeczytana wiadomo¶æ';

$lang['Read_pm'] = 'Odczytaj wiadomo¶æ';
$lang['Post_new_pm'] = 'Napisz wiadomo¶æ';
$lang['Post_reply_pm'] = 'Odpowiedz na post';
$lang['Post_quote_pm'] = 'Cytuj wiadomo¶æ';
$lang['Edit_pm'] = 'Zmieñ wiadomo¶æ';

$lang['Inbox'] = 'Skrzynka';
$lang['Outbox'] = 'Do Wys³ania';
$lang['Savebox'] = 'Zapisane';
$lang['Sentbox'] = 'Wys³ane';
$lang['Flag'] = 'Flaga';
$lang['Subject'] = 'Temat';
$lang['From'] = 'Od';
$lang['To'] = 'Do';
$lang['Date'] = 'Data';
$lang['Mark'] = 'Zaznacz';
$lang['Sent'] = 'Wys³ana';
$lang['Saved'] = 'Zapisana';
$lang['Delete_marked'] = 'Usuñ Zaznaczone';
$lang['Delete_all'] = 'Usuñ Wszystkie';
$lang['Save_marked'] = 'Zapisz Zaznaczone';
$lang['Save_message'] = 'Zapisz Wiadomo¶æ';
$lang['Delete_message'] = 'Usuñ Wiadomo¶æ';

$lang['Display_messages'] = 'Wy¶wietl wiadomo¶ci z ostatnich';
$lang['All_Messages'] = 'Wszystkie Wiadomo¶ci';

$lang['No_messages_folder'] = 'Nie masz wiadomo¶ci w tym folderze';

$lang['PM_disabled'] = 'Prywatne Wiadomo¶ci zosta³y wy³±czone na tym forum';
$lang['Cannot_send_privmsg'] = 'Administrator zabroni³ Ci wysy³aæ prywatnych wiadomo¶ci';
$lang['No_to_user'] = 'Musisz wpisaæ nazwê u¿ytkownika aby wys³aæ tê wiadomo¶æ';

$lang['Disable_HTML_pm'] = 'Wy³±cz HTML w tej wiadomo¶ci';
$lang['Disable_BBCode_pm'] = 'Wy³±cz BBCode w tej wiadomo¶ci';
$lang['Disable_Smilies_pm'] = 'Wy³±cz U¶mieszki w tej wiadomo¶ci';

$lang['Message_sent'] = 'Wiadomo¶æ zosta³a wys³ana';

$lang['Click_return_inbox'] = 'Kliknij %sTutaj%s aby powróciæ do Skrzynki';
$lang['Click_return_index'] = 'Kliknij %sTutaj%s aby powróciæ do Strony G³ównej';

$lang['Send_a_new_message'] = 'Wy¶lij now± prywatn± wiadomo¶æ';
$lang['Send_a_reply'] = 'Odpowiedz na prywatn± wiadomo¶æ';
$lang['Edit_message'] = 'Zmieñ prywatn± wiadomo¶æ';

$lang['Notification_subject'] = 'Nadesz³a nowa Prywatna Wiadomo¶æ';

$lang['Find_username'] = 'Znajd¼ u¿ytkownika';
$lang['Find'] = 'Znajd¼';
$lang['No_match'] = 'Nie znaleziono pasuj±cych';

$lang['No_post_id'] = 'Nie wybrano postów';
$lang['No_such_folder'] = 'Nie istnieje taki folder';

$lang['Mark_all'] = 'Zaznacz wszystkie';
$lang['Unmark_all'] = 'Odznacz wszystkie';

$lang['Confirm_delete_pm'] = 'Czy na pewno chcesz usun±æ tê wiadomo¶æ?';
$lang['Confirm_delete_pms'] = 'Czy na pewno chcesz usun±æ te wiadomo¶ci?';

$lang['Inbox_size'] = 'Wiadomo¶ci w Skrzynce zajmuj± %d%%';
$lang['Sentbox_size'] = 'Wys³ane wiadomo¶ci zajmuj± %d%%';
$lang['Savebox_size'] = 'Zapisane wiadomo¶ci zajmuj± %d%%';

$lang['Click_view_privmsg'] = 'Kliknij %sTutaj%s aby odwiedziæ twoj± Skrzynkê';


//
// Profiles/Registration
//

$lang['Preferences'] = 'Preferencje';

$lang['Website'] = 'Strona WWW';
$lang['Location'] = 'Sk±d';
$lang['Email_address'] = 'Adres email';
$lang['Send_private_message'] = 'Wy¶lij prywatn± wiadomo¶æ';
$lang['Interests'] = 'Zainteresowania';
$lang['Poster_rank'] = 'Ranga';

$lang['Total_posts'] = 'Postów';
$lang['User_post_pct_stats'] = '%d%% z ca³o¶ci';
$lang['User_post_day_stats'] = '%.2f postów dziennie';
$lang['Search_user_posts'] = 'Znajd¼ wszystkie posty %s';

$lang['No_user_id_specified'] = 'Wybrany u¿ytkownik nie istnieje';

$lang['Date_format'] = 'Format Daty';

$lang['Confirm_password'] = 'Potwierd¼ Has³o';

$lang['Avatar'] = 'Avatar';

$lang['No_user_specified'] = 'Nie okre¶lono ¿adnego u¿ytkownika';
$lang['Flood_email_limit'] = 'Nie mo¿esz teraz wys³aæ kolejnego email\'a. Spróbuj ponownie za jaki¶ czas.';
$lang['Email_sent'] = 'Email zosta³ wys³any';
$lang['Send_email'] = 'Wy¶lij email';
$lang['Empty_subject_email'] = 'Musisz okre¶liæ temat dla email\'a';
$lang['Empty_message_email'] = 'Musisz wpisaæ wiadomo¶æ do wys³ania';

//
// Memberslist
//
$lang['Select_sort_method'] = 'Metoda sortowania';
$lang['Sort'] = 'Sortuj';
$lang['Sort_Top_Ten'] = '10 najaktywniejszych';
$lang['Sort_Joined'] = 'Data przy³±czenia';
$lang['Sort_Username'] = 'Nazwa u¿ytkownika';
$lang['Sort_Ascending'] = 'Rosn±co';
$lang['Sort_Descending'] = 'Malej±co';

//
// Group control panel
//
$lang['Group_Control_Panel'] = 'Panel Kontrolny Grupy';
$lang['Group_member_details'] = 'Cz³onkostwo w Grupach';

$lang['Group_Information'] = 'Informacje o Grupie';
$lang['Group_name'] = 'Nazwa Grupy';
$lang['Group_description'] = 'Opis Grupy';
$lang['Group_membership'] = 'Twoje cz³onkostwo';
$lang['Group_Members'] = 'Cz³onkowie Grupy';
$lang['Group_Moderator'] = 'Moderator Grupy';
$lang['Pending_members'] = 'Cz³onkowie Oczekuj±cy';

$lang['Group_type'] = 'Typ grupy';
$lang['Group_open'] = 'Grupa otwarta';
$lang['Group_closed'] = 'Grupa zamkniêta';
$lang['Group_hidden'] = 'Grupa ukryta';

$lang['Memberships_pending'] = 'Oczekujesz na przyjêcie';

$lang['No_groups_exist'] = '¿adna Grupa nie Istnieje';
$lang['Group_not_exist'] = 'Taka grupa nie istnieje';

$lang['Join_group'] = 'Do³±cz';
$lang['No_group_members'] = 'Ta grupa nie ma cz³onków';
$lang['Group_hidden_members'] = 'Ta grupa jest ukryta, nie mo¿esz zobaczyæ listy jej cz³onków';
$lang['Group_joined'] = 'Zosta³' .  (($he) ? 'e' : 'a') . '¶ do³±czony do tej grupy<br />Zostaniesz powiadomionu kiedy Twoje cz³onkostwo zostanie zaakceptowane przez moderatora';
$lang['Group_request'] = 'Pro¶ba o przy³±czenie do grupy %s';
$lang['Group_added'] = 'Zosta³' .  (($he) ? 'e' : 'a') . '¶ dodany do grupy %s';
$lang['Already_member_group'] = 'Jeste¶ ju¿ cz³onkiem tej grupy';
$lang['User_is_member_group'] = 'U¿ytkownik jest ju¿ cz³onkiem tej grupy';
$lang['Group_type_updated'] = 'Zaktualizowano typ grupy';

$lang['Could_not_anon_user'] = 'Anonimowy nie mo¿e byæ cz³onkiem grupy';

$lang['Confirm_unsub'] = 'Czy na pewno chcesz opu¶ciæ t± grupê?';
$lang['Confirm_unsub_pending'] = 'Twoje cz³onkostwo w tej grupie nie zosta³o jeszcze zaakceptowane, czy na pewno chcesz je zakoñczyæ?';

$lang['Unsub_success'] = 'Przesta³' .  (($he) ? 'e' : 'a') . '¶ byæ cz³onkiem tej grupy.';

$lang['Approve_selected'] = 'Zaakceptuj Wybrane';
$lang['Deny_selected'] = 'Odrzuæ Wybrane';
$lang['Remove_selected'] = 'Usuñ Wybrane';
$lang['Add_member'] = 'Dodaj Cz³onka';
$lang['Not_group_moderator'] = 'Nie jeste¶ moderatorem tej grupy i nie mo¿esz wykonaæ tego dzia³ania.';

$lang['Login_to_join'] = 'Zaloguj siê aby do³±czyæ do grupy lub zarz±dzaæ jej cz³onkostwem';
$lang['This_open_group'] = 'To jest grupa otwarta, kliknij aby poprosiæ o cz³onkostwo';
$lang['Member_this_group'] = 'Jeste¶ cz³onkiem tej grupy';
$lang['Pending_this_group'] = 'Twoje cz³onkowstwo w tej grupie czeka na akceptacjê';
$lang['Are_group_moderator'] = 'Jeste¶ moderatorem tej grupy';
$lang['None'] = 'Brak';
$lang['Unsubscribe'] = 'Opu¶æ';
$lang['View_Information'] = 'Zobacz Informacje';


//
// Search
//
$lang['Search_query'] = 'Poszukiwane Zapytanie';
$lang['Search_options'] = 'Opcje Wyszukiwania';

$lang['Search_keywords'] = 'Szukaj S³ów Kluczowych';
$lang['Search_keywords_explain'] = 'Mo¿esz u¿ywaæ <u>AND</u> aby okre¶laæ, które s³owa musz± znale¼æ siê w wynikach, <u>OR</u> dla tych, które mog± siê tam znale¼æ i <u>NOT</u> dla tych, które nie mog± wyst±piæ. Znak * zastêpuje dowolny ci±g znaków.<br />¿eby wyszukaæ wyra¿enie, wpisz je pomiêdzy <b>"</b>cudzys³owami<b>"</b><br />Nie bêd± znalezione znaki specjalne, za wyj±tkiem: <b>@ . - _</b>';
$lang['Search_author'] = 'Szukaj Autora';
$lang['Search_author_explain'] = 'U¿yj * jako zamiennika dowolnego ci±gu znaków';

$lang['Search_for_any'] = 'Szukaj któregokolwiek s³owa lub wyra¿enia';
$lang['Search_for_all'] = 'Szukaj wszystkich s³ów';
$lang['Search_title_msg'] = 'Przeszukaj tytu³, opis i tekst wiadomo¶ci';
$lang['Search_msg_only'] = 'Przeszukaj tylko tekst wiadomo¶ci';
$lang['Search_title_only'] = 'Przeszukaj tylko tytu³ wiadomo¶ci';
$lang['Search_title_e_only'] = 'Przeszukaj tylko opis tematu';

$lang['Return_first'] = 'Poka¿ pierwsze';
$lang['characters_posts'] = 'znaków z postu';

$lang['Search_previous'] = 'Przeszukaj ostanie';

$lang['Sort_by'] = 'Sortuj wed³ug';
$lang['Sort_Time'] = 'Czas wys³ania';
$lang['Sort_Topic_Title'] = 'Tytu³ tematu';

$lang['Display_results'] = 'Poka¿ wyniki jako';
$lang['All_available'] = 'Wszystkie dostêpne';
$lang['No_searchable_forums'] = 'Nie masz uprawnieñ do przeszukiwania któegokolwiek forum na tej stronie';

$lang['No_search_match'] = 'Nie znaleziono tematów ani postów pasuj±cych do Twoich kryteriów';
$lang['Found_search_match'] = 'Znaleziono %d wynik';
$lang['Found_search_matches'] = 'Znalezionych wyników: %d';

$lang['Close_window'] = 'Zamknij Okno';


//
// Auth related entries
//
// Note the %s will be replaced with one of the following \'user\' arrays
$lang['Sorry_auth_announce'] = 'Tylko %s mog± pisaæ og³oszenia na tym forum.';
$lang['Sorry_auth_sticky'] = 'Tylko %s mog± pisaæ tematy przyklejone na tym forum.';
$lang['Sorry_auth_read'] = 'Tylko %s mog± czytaæ tematy na tym forum.';
$lang['Sorry_auth_delete'] = 'Tylko %s mog± usuwaæ posty na tym forum.';
$lang['Sorry_auth_post'] = 'Tylko %s mog± pisaæ nowe tematy na tym forum.'; 
$lang['Sorry_auth_reply'] = 'Tylko %s mog± odpowiadaæ w tematach na tym forum.';
$lang['Sorry_auth_edit'] = 'Tylko %s mog± edytowaæ posty na tym forum.'; 
$lang['Sorry_auth_vote'] = 'Tylko %s mog± g³osowaæ w ankietach na tym forum.';

// These replace the %s in the above strings
$lang['Auth_Registered_Users'] = '<b>zarejestrowani u¿ytkownicy</b>';
$lang['Auth_Users_granted_access'] = '<b>u¿ytkownicy z uprawnieniami dostêpu</b>';
$lang['Auth_Moderators'] = '<b>moderatorzy</b>';
$lang['Auth_Administrators'] = '<b>administratorzy</b>';

$lang['Not_Authorised'] = 'Nie posiadasz uprawnieñ';

$lang['You_been_banned'] = 'Zosta³' .  (($he) ? 'e' : 'a') . '¶ wyrzucon' .  (($he) ? 'y' : 'a') . ' z tego forum<br />Skontaktuj siê z webmasterem lub administratorem forum je¿eli chcesz wyja¶niæ t± sytuacjê.';


//
// Viewonline
//
$lang['Reg_users_zero_online'] = 'Na Forum jest 0 Zarejestrowanych i ';
$lang['Reg_users_online'] = 'Na forum jest %d Zarejestrowanych i ';
$lang['Reg_user_online'] = 'Na forum jest %d Zarejestrowany u¿ytkownik i ';
$lang['Hidden_users_zero_online'] = '0 Ukrytych u¿ytkowników';
$lang['Hidden_users_online'] = '%d Ukrytych u¿ytkowników';
$lang['Hidden_user_online'] = '%d Ukryty u¿ytkownik';
$lang['Guest_users_zero_online'] = 'Na Forum jest 0 Go¶ci';
$lang['Guest_users_online'] = 'Na Forum jest %d Go¶ci';
$lang['Guest_user_online'] = 'Na Forum jest %d Go¶æ';
$lang['No_users_browsing'] = 'Obecnie nie ma ¿adnych u¿ytkowników na tym forum';

$lang['Online_explain'] = '';

$lang['Forum_Location'] = 'Lokalizacja';
$lang['Last_updated'] = 'Na forum';

$lang['Forum_index'] = 'Strona G³ówna';
$lang['Logging_on'] = 'Loguje siê';
$lang['Posting_message'] = 'Pisze wiadomo¶æ';
$lang['Searching_forums'] = 'Przeszukuje fora';
$lang['Viewing_profile'] = 'Ogl±da profil';
$lang['Viewing_online'] = 'Przegl±da listê obecnych na forum';
$lang['Viewing_member_list'] = 'Ogl±da listê u¿ytkowników';
$lang['Viewing_priv_msgs'] = 'Ogl±da Prywatne Wiadomo¶ci';
$lang['Viewing_FAQ'] = 'Ogl±da FAQ';


//
// Moderator Control Panel
//

$lang['Select'] = 'Wybierz';
$lang['Move'] = 'Przenie¶';
$lang['Lock'] = 'Zablokuj';
$lang['Unlock'] = 'Odblokuj';
$lang['Topics_Moved'] = 'Wybrane tematy zosta³y przeniesione';

//
// Timezones ... for display on each page
//

$lang['datetime']['Sunday'] = 'Niedziela';
$lang['datetime']['Monday'] = 'Poniedzia³ek';
$lang['datetime']['Tuesday'] = 'Wtorek';
$lang['datetime']['Wednesday'] = '¦roda';
$lang['datetime']['Thursday'] = 'Czwartek';
$lang['datetime']['Friday'] = 'Pi±tek';
$lang['datetime']['Saturday'] = 'Sobota';
$lang['datetime']['Sun'] = 'Nie';
$lang['datetime']['Mon'] = 'Pon';
$lang['datetime']['Tue'] = 'Wto';
$lang['datetime']['Wed'] = '¦ro';
$lang['datetime']['Thu'] = 'Czw';
$lang['datetime']['Fri'] = 'Pi±';
$lang['datetime']['Sat'] = 'Sob';
$lang['datetime']['January'] = 'Styczeñ';
$lang['datetime']['February'] = 'Luty';
$lang['datetime']['March'] = 'Marzec';
$lang['datetime']['April'] = 'Kwiecieñ';
$lang['datetime']['May'] = 'Maj';
$lang['datetime']['June'] = 'Czerwiec';
$lang['datetime']['July'] = 'Lipiec';
$lang['datetime']['August'] = 'Sierpieñ';
$lang['datetime']['September'] = 'Wrzesieñ';
$lang['datetime']['October'] = 'Pa¼dziernik';
$lang['datetime']['November'] = 'Listopad';
$lang['datetime']['December'] = 'Grudzieñ';
$lang['datetime']['Jan'] = 'Sty';
$lang['datetime']['Feb'] = 'Lut';
$lang['datetime']['Mar'] = 'Mar';
$lang['datetime']['Apr'] = 'Kwi';
$lang['datetime']['May'] = 'Maj';
$lang['datetime']['Jun'] = 'Cze';
$lang['datetime']['Jul'] = 'Lip';
$lang['datetime']['Aug'] = 'Sie';
$lang['datetime']['Sep'] = 'Wrz';
$lang['datetime']['Oct'] = 'Pa¼';
$lang['datetime']['Nov'] = 'Lis';
$lang['datetime']['Dec'] = 'Gru';

//
// Errors (not related to a
// specific failure on a page)
//
$lang['Information'] = 'Informacja';
$lang['Critical_Information'] = 'Istotna Informacja';

$lang['General_Error'] = 'B³±d Ogólny';
$lang['Critical_Error'] = 'B³±d Krytyczny';
$lang['An_error_occured'] = 'Wyst±pi³ B³±d';
$lang['A_critical_error'] = 'Wyst±pi³ Krytyczny B³±d';

//
// Modified addons
//

$lang['2_Days'] = '2 Dni';
$lang['3_Days'] = '3 Dni';
$lang['4_Days'] = '4 Dni';
$lang['5_Days'] = '5 Dni';
$lang['6_Days'] = '6 Dni';
$lang['left'] = 'z lewej';
$lang['center'] = 'na ¶rodku';
$lang['right'] = 'z prawej';
$lang['registered_have'] = 'Mamy';
$lang['registered_users'] = 'zarejestrowanych u¿ytkowników';
$lang['users_write'] = 'Nasi u¿ytkownicy napisali';
$lang['posts'] = 'postów';
$lang['topics'] = 'tematów';
$lang['Search_new_unread'] = 'Zobacz posty nieprzeczytane';
$lang['Search_new'] = 'Zobacz posty od ostatniej wizyty';
$lang['Quick_register'] = 'Szybka rejestracja';
$lang['visitors_txt'] = 'To forum odwiedzono ju¿';
$lang['visitors_txt2'] = 'razy';
$lang['Sticky_topic'] = 'Przyklej ten temat';
$lang['Announce_topic'] = 'Oznacz jako og³oszenie';
$lang['Normal_topic'] = 'Oznacz jako normalny';
$lang['Sticky'] = 'Przyklejony';
$lang['Announce'] = 'Og³oszenie';
$lang['Normalise'] = 'Normalny';
$lang['Mark_topic_unread'] = 'Oznacz temat jako nieczytany';
$lang['Mark_topic_read'] = 'Oznacz temat jako przeczytany';
$lang['Board_navigation'] = 'Menu';
$lang['Statistics'] = 'Statystyki';
$lang['Comments'] = 'Komentarze';
$lang['Read_Full'] = 'Czytaj ca³o¶æ';
$lang['View_comments'] = 'Zobacz komentarze';
$lang['Post_your_comment'] = 'Dodaj swój komentarz';
$lang['Welcome'] = 'Witamy';
$lang['Remember_me'] = 'Zapamiêtaj';
$lang['Poll'] = 'Ankieta';
$lang['Login_to_vote'] = 'Musisz siê zalogowaæ ¿eby oddaæ g³os';
$lang['Vote'] = 'G³osuj';
$lang['Who_is_Chatting'] = 'Kto jest na czacie';
$lang['bbcode_y_help'] = 'Wy¶rodkowanie: [center]tekst[/center] Rada: zaznacz tekst i kliknij';
$lang['bbcode_e_help'] = 'Zanikaj±cy tekst: [fade]text[/fade] Rada: zaznacz tekst i kliknij';
$lang['bbcode_k_help'] = 'Przewijany tekst: [scroll]tekst[/scroll] Rada: zaznacz tekst i kliknij';
$lang['bbcode_s2_help'] = 'Cieñ: [shadow=red]text[/shadow] Rada: zaznacz tekst i wybierz kolor';
$lang['bbcode_g_help'] = 'Ogieñ: [glow=red]text[/glow] Rada: zaznacz tekst i wybierz kolor';
$lang['bbcode_h_help'] = 'Ukryj: [hide]tekst[/hide] Rada: zaznacz tekst i kliknij';
$lang['Shadow_color'] = 'Cieñ';
$lang['Glow_color'] = 'Ogieñ';
$lang['write_link_text'] = 'Wpisz tekst który bêdzie pokazywany jako nazwa linku';
$lang['write_address'] = 'Podaj adres';
$lang['img_address'] = 'Podaj adres do obrazka';
$lang['stream_address'] = 'Podaj adres pliku';
$lang['GG'] = 'Gadu-Gadu u¿ytkownika :: %s';
$lang['STAT_GG'] = 'Status Gadu-Gadu u¿ytkownika';
$lang['GG_wait'] = 'Wiadomo¶æ oczekuje w kolejce na odebranie.<br />Zostanie dostarczona gdy adresat w³±czy gadu-gadu<br /> lub adresat ma w tej chwili status <b>"niewidoczny"</b> b±d¼ "tylko dla znajomych".';
$lang['GG_full'] = 'Skrzynka odbiorcza adresata jest pe³na, wiadomo¶æ nie zosta³a dostarczona.';
$lang['GG_send'] = 'Wiadomo¶æ zosta³a dostarczona do adresata';
$lang['GG_not_send'] = 'Wiadomo¶æ nie zosta³a dostarczona, spróbuj jeszcze raz (od¶wie¿ strone).';
$lang['How_Many_Chatters'] = 'Na czacie jest <B>%d</B> u¿ytkowników';
$lang['Who_Are_Chatting'] = '<B>%s</B>';
$lang['Click_to_join_chat'] = 'Kliknij by wej¶æ na czat';
$lang['ChatBox'] = 'ChatRoom';
$lang['log_out_chat'] = 'Wylogowa³' .  (($he) ? 'e' : 'a') . '¶ siê z czata';
$lang['Login_to_join_chat'] = 'Zaloguj siê by wej¶æ na czat';
$lang['Last_visit'] = 'Ostatnia wizyta';
$lang['Never'] = 'Nigdy';
$lang['Sort_Last_visit'] = 'Data ostatniej aktywno¶ci';
$lang['Page_loading_wait'] = '£adowanie strony... proszê czekaæ!';
$lang['Page_loading_stop'] = 'Je¶li strona nie chce siê za³adowaæ kliknij <span onclick="hideLoadingPage()" style="cursor: pointer">Tutaj<\/span>';
$lang['Quick_Reply'] = 'Szybka odpowied¼';
$lang['QuoteSelelected'] = 'Cytowanie selektywne';
$lang['QuoteSelelectedEmpty'] = 'Zaznacz najpierw tekst';
$lang['Quick_Reply_smilies'] = 'Wszystkie emotikony';
$lang['No_birthday_specify'] = 'Nie okre¶lono';
$lang['Age'] = 'Wiek';
$lang['Wrong_birthday_format'] = 'Data urodzenia nie mie¶ci sie w dopuszczalnych granicach';
$lang['Birthday_greeting_today'] = '!!!! WSZYSTKIEGO NAJLEPSZEGO !!!!<br /><br /> Z okazji Twoich %s urodzin!<br /> ¿yczymy Ci wszystkiego co najlepsze zarówno w ¿yciu prywatnym, jak i tutaj w Internecie!<br /><br /> U¿ytkownicy i administratorzy forum';//%s is substituted with the users age
$lang['Birthday_greeting_prev'] = 'Sk³adamy Ci gratulacje z okazji %s urodzin.<br /><br /> U¿ytkownicy i administratorzy forum';//%s is substituted with the users age, and birthday 
$lang['Greeting_Messaging'] = 'Gratulacje!';
$lang['Birthday_today'] = 'U¿ytkownicy obchodz±cy dzi¶ urodziny:';
$lang['Birthday_week'] = 'U¿ytkownicy obchodz±cy urodziny w ci±gu nastêpnych %d dni:';
$lang['Nobirthday_week'] = 'Nikt nie ma urodzin przez nastêpne %d dni';
$lang['Nobirthday_today'] = 'Nikt nie ma dzi¶ urodzin.';
$lang['Year'] = 'Rok';
$lang['Month'] = 'Miesi±c';
$lang['Day'] = 'Dzieñ';
$lang['send_congratulations'] = 'z³ó¿ ¿yczenia';
$lang['congratulations_send'] = '¿yczenia dla u¿ytkownika zosta³y wys³ane.';
$lang['congratulations_send_no'] = 'Temu u¿ytkownikowi wysy³a³' .  (($he) ? 'e' : 'a') . '¶ ju¿ ¿yczenia';
$lang['l_whoisonline'] = 'zobacz szczegó³owo';
$lang['new_topicsss'] = 'Nowych tematów:';
$lang['new_postsss'] = 'Nowych postów:';
$lang['unread_topicsss'] = 'Nieczytanych tematów';
$lang['unread_postsss'] = 'Nieczytanych postów';
$lang['Board_style'] = 'Styl forum';
$lang['l_level'] = 'Poziom';
$lang['Ignore_list'] = 'Lista ignorowanych';
$lang['Ignore_users'] = 'Ten u¿ytkownik jest na twojej li¶cie ignorowanych';
$lang['Ignore_add'] = 'Dodaj u¿ytkownika do listy ignorowanych';
$lang['Ignore_delete'] = 'Usuñ u¿ytkownika z listy ignorowanych';
$lang['Ignore_added'] = 'U¿ytkownik dodany do listy ignorowanych';
$lang['Ignore_deleted'] = 'U¿ytkownik usuniêty z listy ignorowanych';
$lang['Ignore_submit'] = 'Dodaj do listy ignorowanych';
$lang['Ignore_exists'] = 'U¿ytkownik jest ju¿ na twojej li¶cie ignorowanych';
$lang['Click_return_ignore'] = 'Kliknij %sTutaj%s ¿eby przej¶æ do swojej listy ignorowanych';
$lang['Ignore_user_warn'] = 'Nie mo¿esz siê samemu ignorowaæ!';
$lang['Post_user_ignored'] = 'U¿ytkownik zosta³ dodany do twojej listy <b>ignorowanych</b>.';
$lang['Click_view_ignore'] = 'Kliknij %sTutaj%s ¿eby zobaczyæ jego post.<br />';
$lang['Search_for'] = 'Szukaj w tym dziale';
$lang['cicq'] = 'ICQ';

$lang['Print_View'] = 'Wersja do druku';
$lang['Wrong_reg_key'] = 'Nieprawid³owy kod!';
$lang['Validation'] = 'Uwierzytelnianie';
$lang['Msg_Icon_No_Icon'] = 'Bez';
$lang['messageicon'] = 'Ikona tematu';
$lang['postmsgicon'] = 'Ikona Tematu/Postu';
$lang['Topic_view_users'] = 'Kto przegl±da³ temat';
$lang['Topic_time'] = 'Ostatnio ogl±dany';
$lang['Topic_count'] = 'Ogl±dany';
$lang['Topic_global_announcement'] = '<b>Wa¿ne og³oszenie:</b>';
$lang['Post_global_announcement'] = 'Wa¿ne og³oszenie';
$lang['Forum_not_exist'] = 'Nie znaleziono forum';
$lang['Enter_forum_password'] = 'Podaj has³o dzia³u';
$lang['Incorrect_forum_password'] = 'B³êdne has³o';
$lang['Only_alpha_num_chars'] = 'Has³o mo¿e zawieraæ od 3 do 20 znaków z zakresu: (A-Z, a-z, 0-9)';
$lang['Album'] = 'Album';
$lang['Personal_Gallery_Of_User'] = 'Prywatna galeria %s';
$lang['l_whois'] = 'Whois';
$lang['Staff'] = 'Osoby odpowiedzialne za Forum';
$lang['Admin'] = 'Administrator';
$lang['Junior'] = 'Junior Admin';
$lang['Period'] = 'Na forum od <b>%d</b> dni';
$lang['Topic_bookmark'] = 'Dodaj temat do Ulubionych';
$lang['Day_users'] = 'Przez ostatnie %s godziny byli na forum:';
$lang['last_visitors_more'] = 'Pe³na lista';
$lang['search_keywords_error'] = 'U¿y³e¶ za du¿o s³ów przy próbie szukania. <br>Mo¿esz ich wykorzystaæ (maksymalnie): <b>%s</b>.';
$lang['hidden_user'] = 'Ukryte';
$lang['post_expire'] = 'Post wyga¶nie:';
$lang['topic_expire'] = 'Wyga¶nie';
$lang['expire_unlimit'] = 'Bez limitu';
$lang['l_expire_p'] = 'Czas wa¿no¶ci postu/tematu';
$lang['Tree_width_topic'] = 'Skok drzewa tematu w pixelach';
$lang['l_expire_p_e'] = 'Wybierz, po ilu dniach post ma byæ automatycznie usuniêty. Je¶li jest to nowy temat, zostanie usuniêty w ca³o¶ci.';
$lang['expire_e'] = 'Ustaw, po ilu dniach temat ma byæ skasowany';
$lang['announce-stick'] = 'Przyklejanie tematów, oznaczanie jako og³oszenie lub jako globalne og³oszenie';
$lang['Merge_post'] = 'Scalaj posty w tym temacie';
$lang['Merge_posts'] = 'Scalaj wybrane posty';
$lang['post_expire_q'] = 'Wyga¶nie za';
$lang['Password_not_complex'] = 'Has³o ';
$lang['Downloads2'] = 'Download';
$lang['See_all'] = 'Zobacz wszystkie';
$lang['Ignore_mini'] = 'Ignoruj';
$lang['pm_mini'] = 'PM';
$lang['aim_mini'] = 'GG';
$lang['quote_mini'] = 'Cytuj';
$lang['edit_mini'] = 'Edytuj';
$lang['mini_reply'] = 'ODPOWIEDZ';
$lang['mini_newtopic'] = 'NOWY TEMAT';
$lang['mini_locked'] = 'ZAMKNIÊTY';

$lang['too_long_word'] = 'Za d³ugie s³owo';
$lang['login_to_shoutcast'] = 'Musisz siê zalogowaæ ¿eby wys³aæ wiadomo¶æ lub wysy³anie wiadomo¶ci jest mo¿liwe tylko dla Administratorów i Moderatorów';
$lang['sb_banned_send'] = 'Nie mo¿esz wysy³aæ wiadomo¶ci';
$lang['l_alert_sb'] = 'Czy na pewno chcesz usun±æ wiadomo¶æ?';
$lang['l_refresh_sb'] = 'Shoutbox otrzyma³ 100 pustych odpowiedzi od serwera, aby kontynuowaæ naci¶nij ten przycisk.';
$lang['sb_restriction'] = 'Shoutbox zosta³ wy³±czony lub otrzyma¶eœ bana.';
$lang['l_cancel_sb'] = 'Anuluj';
$lang['l_edit_sb'] = 'Zapisz';
$lang['emotki'] = 'Bu¼ki';
$lang['Email_explain'] = 'Je¿eli twój mail to np. janek@jan.pl to w pierwsze pole wpisz janek, a w drugie jan.pl';

$lang['banned_forum'] = 'Administrator zablokowa³ Tobie mo¿liwo¶æ pisania w tym forum';

$lang['edit_time_past'] = 'Nie mo¿esz juz zmieniæ swojego postu. Post mo¿na zmieniaæ przez <b>%d</b> minut, Od momentu jego wys³ania';
$lang['This_closed_group'] = 'To jest zamkniêta grupa, %s';
$lang['This_hidden_group'] = 'To jest ukryta grupa, %s';
$lang['No_more'] = 'nowi u¿ytkownicy nie bêd± przyjmowani';
$lang['No_add_allowed'] = 'automatyczne przyjmowanie u¿ytkowników nie jest dozwolone';
$lang['Join_auto'] = 'Mo¿esz do³±czyæ do grupy je¶li ilo¶æ twoich postów osi±gnie wystarczaj±c± warto¶æ';
$lang['Permissions'] = 'Zezwolenia';
$lang['quote_image'] = 'Obrazek';
$lang['Gender'] = 'P³eæ';
$lang['Male'] = 'Mê¿czyzna';
$lang['Female'] = 'Kobieta';
$lang['No_gender_specify'] = 'Nie wiadomo :)';
$lang['not_gg_account'] = 'Brak numeru lub has³a bramki GG. Poinformuj administratora';
$lang['not_gg_addresat'] = 'Brak adresata';
$lang['wrong_gg_addresat'] = 'Z³y format numeru adresata';
$lang['not_gg_msg'] = 'Brak tre¶ci wiadomo¶ci';
$lang['gg_too_long'] = 'D³ugo¶æ wiadomo¶ci nie mo¿e przekraczaæ 1800 znaków';
$lang['topic_expire_mod'] = 'Wyga¶nie za: ';
$lang['Forum_link_visited'] = 'Odwiedzono %d razy';
$lang['Redirect'] = 'Przeniesienie';
$lang['Never'] = 'Nigdy';
$lang['login_require'] = 'Dostêp do tej czê¶ci forum wymaga zalogowania siê.';
$lang['login_require_register'] = 'Je¿eli nie jeste¶ jeszcze zarejestrowany, kliknij %sTutaj%s ¿eby przej¶æ do formularza rejestracyjnego.';

$lang['Click_return_custom_sending'] = 'Kliknij %sTutaj%s aby powróciæ do wysy³ania ¿yczeñ';
$lang['choose_congratulations_format'] = 'Wybierz rodzaj ¿yczeñ:';
$lang['congratulations_format_standart'] = 'Standardowe';
$lang['congratulations_format_standart_e'] = 'Wysy³ane od razu po klikniêciu';
$lang['congratulations_format_custom'] = 'W³asne';
$lang['congratulations_format_custom_e'] = 'Mo¿esz wpisaæ swoj± tre¶æ';
$lang['generate_time'] = 'Strona wygenerowana w';
$lang['second'] = 'sekundy';
$lang['seconds'] = 'sekund';
$lang['Warnings'] = 'Ostrze¿enia u¿ytkowników';
$lang['Warnings_viewtopic'] = 'Ostrze¿eñ';
$lang['warnings_banned_info'] = '<b>Masz zakaz wstêpu na forum !</b><br /><br />Na swoim koncie masz ostrze¿eñ: <b>%s</b> o ³±cznej warto¶ci: <b>%s</b>. Warto¶æ po której u¿ytkownik jest banowany to: <b>%s</b><br /><br />Ostatnie ostrze¿enie dosta³' .  (($he) ? 'e' : 'a') . '¶: <b>%s</b><br />Powód: <i>%s</i>';
$lang['disallow_posting'] = 'Przekroczy³' .  (($he) ? 'e' : 'a') . '¶ limit ostrze¿eñ. Nie mo¿esz pisaæ nowych postów ani tematów.<br /><br />Kliknij %sTutaj%s ¿eby przej¶æ do strony ostrze¿eñ.';
$lang['warnings_lastwar_info'] = '<b>Dosta³' .  (($he) ? 'e' : 'a') . '¶ ostrze¿enie !</b><br /><br />Kliknij %sTutaj%s ¿eby je zobaczyæ.<br /><br />Mo¿e byæ konieczne ponowne zalogowanie.';
$lang['support'] = '<br /><br />Je¶li nie potrafisz znale¼æ rozwi±zania tego problemu,<br />mo¿esz spróbowaæ poszukaæ, lub zadaæ pytanie na forum: <a href="http://www.przemo.org/phpBB2/" target="_blank">http://www.przemo.org/phpBB2/</a>';
$lang['poster_posts'] = 'Bra³' .  (($he) ? 'e' : 'a') . '¶ udzia³ w tej dyskusji';
$lang['Sort_per_letter'] = 'Poka¿ u¿ytkowników na literê';
$lang['Others'] = 'inna';
$lang['All'] = 'wszystkich';
$lang['ignore_topic_added'] = 'Wybrany temat/tematy zosta³y dodane do listy ignorowanych.<br />Nie bêdziesz ich widzia³' .  (($he) ? '' : 'a') . ' w li¶cie tematów, oraz w li¶cie tematów nieprzeczytanych (lub "od ostatniej wizyty" w zale¿no¶ci od ustawieñ forum)<br /><br />Kliknij %sTutaj%s ¿eby zobaczyæ swoj± liste ignorowanych tematów.<br /><br />Kliknij %sTutaj%s ¿eby wróciæ na stronê g³ówn±.';
$lang['ignore_topic_unignored'] = 'Wybrany temat/tematy zosta³y usuniête z twojej listy ignorowanych tematów.<br /><br />Kliknij %sTutaj%s ¿eby zobaczyæ swoj± liste ignorowanych tematów.<br /><br />Kliknij %sTutaj%s ¿eby wróciæ na stronê g³ówn±.';
$lang['ignore_mark'] = 'Ignoruj zaznaczone tematy';
$lang['ignore_topics'] = 'Ignorowane tematy';
$lang['list_ignore'] = 'Lista tematów które ignorujesz';
$lang['list_ignore_e'] = 'Z listy automatycznie s± kasowane tematy w których nie pojawi³a siê odpowied¼ przez ostatnie 3 miesi±ce';
$lang['ignore_list_empty'] = 'Nie ignorujesz ¿adnego tematu.<br /><br />Kliknij %sTutaj%s ¿eby wróciæ na stronê g³ówn±.';
$lang['ignore_topic'] = 'Ignoruj ten temat';
$lang['current_topic_ignore'] = 'Ignorujesz ten temat';
$lang['bbcode_ct_help'] = 'Kolor tematu, widoczny w widoku tematów';
$lang['topic_color'] = 'Kolor tematu';
$lang['15_min'] = '15 Minut';
$lang['30_min'] = '30 Minut';
$lang['1_Hour'] = '1 Godziny';
$lang['2_Hour'] = '2 Godzin';
$lang['6_Hour'] = '6 Godzin';
$lang['12_Hour'] = '12 Godzin';
$lang['icons'] = 'Wszystkie ikony postu/tematu';
$lang['your_posts'] = 'twoich postów';
$lang['replys_last_post'] = 'odpowiedzi od czasu twojego ostatniego postu';
$lang['unread_posts'] = 'postów nieprzeczytanych';
$lang['not_poster_post'] = 'Nie bra³' .  (($he) ? 'e' : 'a') . '¶ udzia³u w tej dyskusji';
$lang['lang_q_quote_e'] = 'Po zaznaczeniu czê¶ci tekstu który chcesz cytowaæ i klikniêciu tutaj, tekst wraz ze znacznikami BBCode pojawi siê na dole w szybkiej odpowiedzi. Mo¿esz u¿yæ kilkukrotnie.';
$lang['ignore_topic_submit_e'] = 'Dodaje zaznaczone wy¿ej tematy do twojej listy ignorowanych tematów. Nie bêd± one wy¶wietlane w widoku forum, oraz w wynikach wyszukiwania.';
$lang['data'] = 'Administrator forum narusza zasady korzystania ze skryptu forum dyskusyjnego <a href="http://www.przemo.org/phpBB2/">phpBB modified by Przemo</a><br />Forum zosta³o zablokowane !<br /><br />Wiêcej informacji mo¿na uzyskaæ pisz±c na e-mail: przemo@przemo.org';
$lang['more_topicicons'] = 'Masz do wyboru wiêksz± ilo¶æ ikon, po klikniêciu w to pole, otworzy siê okno z dodatkowymi ikonami.';
$lang['online_minutes'] = 'Jest na forum minut: <b>%s</b>';
$lang['online_hours'] = 'Jest na forum godzin: <b>%s</b>';
$lang['Viewing_topic'] = 'Czyta temat';
$lang['gg_header_info_pm'] = 'Otrzyma³' .  (($he) ? 'e' : 'a') . '¶ now± prywatn± wiadomo¶æ od: %s';
$lang['gg_notify_topic'] = 'W obserwowanym przez Ciebie temacie: "%s" u¿ytkownik: %s napisa³ odpowied¼';
$lang['l_notify_gg_privmsg'] = 'Link do twojej skrzynki: %s';
$lang['l_notify_gg_topic'] = '¿eby zobaczyæ temat kliknij: %s';
$lang['generate_queries'] = 'Zapytañ do SQL';
$lang['unread_post'] = 'Nieczytany post';
$lang['refresh'] = 'Od¶wie¿';
$lang['new_board_topic'] = 'Na forum %s u¿ytkownik %s napisa³ nowy temat: %s';
$lang['new_board_post'] = 'Na forum %s u¿ytkownik %s napisa³ odpowied¼ w temacie: %s';
$lang['Search_post_time'] = 'Wy¶wietl posty z ostatnich:</span><br /><span class="gensmall">Wy¶wietla posty napisane w ci±gu ostatniego wybranego czasu. Mo¿na wybraæ metodê wy¶wietlania: Posty i Tematy';
$lang['user_not_allowpm'] = 'Nie mo¿esz wys³aæ prywatnej wiadomo¶ci do tego u¿ytkownika. U¿ytkownik wy³±czy³ prywatne wiadomo¶ci.';
$lang['open_all_new_window'] = 'Otwórz wszystkie w nowych oknach';

$lang['s_email_friend'] = 'Powiadom znajomego o tym temacie';
$lang['s_email_friend_f_name'] = 'Imiê znajomego:';
$lang['s_email_friend_f_email'] = 'Email znajomego:';
$lang['s_email_friend_title'] = '%s zobacz temat na: %s';
$lang['s_email_friend_message'] = 'Przeczyta³' .  (($he) ? 'e' : 'a') . 'm temat %s na %s i pomy¶la³' .  (($he) ? 'e' : 'a') . 'm, ¿e musisz go zobaczyæ! Naprawdê warto! Tutaj jest link: %s';

$lang['mstr'] = 'Automatyczna naprawa tabeli w bazie SQL';
$lang['rrtf'] = "Tabela %s uleg³a uszkodzeniu, próba automatycznej naprawy nie powiod³a siê:\n%s\n%s\nSpróbuj naprawiæ tabelê rêcznie wykonuj±c zapytanie: REPAIR TABLE %s";
$lang['rrts'] = "Tabela %s uleg³a uszkodzeniu, próba automatycznej naprawy prawdopodobnie powiod³a siê:\n%s\n Je¶li nie, spróbuj wykonac zapytanie rêcznie: REPAIR TABLE %s";
$lang['rrsum'] = 'Wyst±pi³ drobny problem techniczny, skrypt dokona³ próby naprawy i wys³a³ powiadomienie do Administratora forum<br />Sprobuj od¶wie¿yæ stronê';

$lang['Report_no_access'] = 'Nie masz mo¿liwo¶ci u¿ywania tej opcji';
$lang['Report_disabled'] = 'Post tego u¿ytkownika nie mo¿e zostaæ zg³oszony';
$lang['Report_post_already_reported'] = 'Ten post zosta³ ju¿ zg³oszony wcze¶niej';
$lang['Report_post_self'] = 'Nie mo¿esz zg³aszaæ swoich postów';
$lang['Report_already_removed'] = 'Ten post zosta³ usuniêty';
$lang['Report_no_posts'] = 'Nie ma zg³oszonych ¿adnych postów';
$lang['Report_no_title'] = 'Brak tytu³u';
$lang['Reporter'] = 'Zg³aszaj±cy';
$lang['Report_posts'] = 'Zg³oszone posty';
$lang['Report_popup_text'] = 'Nastêpuj±ce posty zosta³y zg³oszone:';
$lang['Report_deleted'] = 'Zg³oszenie usuniête.';
$lang['Report_post_reported'] = 'Zg³oszenie zosta³o wys³ane. Dziêkujemy.';
$lang['Report_post'] = 'Zg³o¶ ten post do Moderatora i Administratora';
$lang['Report_del'] = 'Usuñ zg³oszenie';
$lang['Report_no_popup'] = 'Otwórz popup o zg³oszonych postach';
$lang['Report_no_mail'] = 'Powiadom na e-mail o zg³oszonych postach';
$lang['Report_reload_window'] = 'Od¶wie¿ okno';
$lang['Report_no_auth'] = 'Nie mo¿esz zg³osiæ postów, ta funkcja zosta³a Ci odebrana, lub nie jestes zalogowany.';
$lang['Report_open_popup'] = 'Otwórz popup zg³oszeñ';
$lang['Report_list'] = 'Lista zg³oszeñ';
$lang['added'] = 'Dodano';
$lang['Voted_show'] = 'G³osowañ: '; // it means :  users that voted  (the number of voters will follow)
$lang['Results_after'] = 'Wynik bêdzie pokazany po zakoñczeniu trwania ankiety';
$lang['Poll_expires'] = 'Zakoñczenie ankiety za: ';
$lang['Minutes'] = 'Minut';
$lang['Max_vote'] = 'Maksimum "zaznaczeñ"';
$lang['Max_vote_explain'] = '[ Wpisz 1 lub pozostaw puste dla jednego "zaznaczenia" ]';
$lang['Max_voting_1_explain'] = 'Wybierz tylko ';
$lang['Max_voting_2_explain'] = ' odpowiedzi';
$lang['Max_voting_3_explain'] = ' (wiêcej odpowiedzi bêdzie ignorowane)';
$lang['Vhide'] = 'Ukryj';
$lang['Hide_vote'] = 'Wynik';
$lang['Tothide_vote'] = 'Sumê g³osów';
$lang['Hide_vote_explain'] = ' [ Ukrycie do czasu zakoñczenia ankiety ]';
$lang['rname'] = 'Szybka rejestracja';

$lang['helped_confirm'] = 'Jeste¶ ' .  (($he) ? 'autorem' : 'autork±') . ' tego tematu, je¿eli ta odpowied¼ Ci pomog³a, mo¿esz dodaæ jeden punkt "POMÓG£" temu u¿ytkownikowi<br /><br />Kliknij %sTUTAJ%s aby dodaæ punkt, lub kliknij %sTUTAJ%s aby anulowaæ i powróciæ do tematu';
$lang['helped_delete_confirm'] = 'Jeste¶ ' .  (($he) ? 'pewien' : 'pewna') . ' ¿e chcesz usun±æ punkt "POMÓG£" dla tego postu ?<br /><br />Kliknij %sTUTAJ%s je¿eli chcesz usun±æ punkt, lub %sTUTAJ%s aby powróciæ do tematu';
$lang['helped_added'] = 'Punkt zosta³ dodany<br /><br />Kliknij %sTUTAJ%s aby powrócic do tematu.';
$lang['He_helped'] = 'Je¿eli ten post pomóg³ Ci, kliknij aby dodaæ punkt temu u¿ytkownikowi';
$lang['He_helped_delete'] = 'Usuñ punkt \'pomóg³\' dla tego postu';
$lang['help_1'] = ' raz';
$lang['help_more'] = ' razy';
$lang['postrow_help'] = '<b>Pomóg³:</b> ';
$lang['postrow_help_she'] = '<b>Pomog³a:</b> ';
$lang['helped'] = 'Pomóg³';
$lang['Joined_she'] = 'Do³±czy³a';
$lang['that_same_msg'] = 'Nie mo¿esz wys³aæ dwóch takich samych wiadomo¶ci !';
$lang['Total_vots'] = 'G³osów';
$lang['Seeker'] = 'Szukaj u¿ytkowników';
$lang['No_split_post'] = 'Nie ³±cz tego postu';
$lang['too_many_voting'] = 'W tej sondzie maksymaln± warto¶ci± oddanych g³osów jest: <b>%s</b>, Ty zaznaczy³' .  (($he) ? 'e' : 'a') . '¶ <b> %s</b>.<br />G³os nie zosta³ oddany, wróæ i zag³osuj jeszcze raz.';
$lang['failed_sending_email'] = 'B³ad wysy³ania email\'a<br />Mo¿e zosta³ podany z³y adres e-mail, w przeciwnym razie Administrator pownien sprawdziæ przyczynê lub wy³aczyæ wysy³anie email\'i przez forum.';

$lang['Print_topic'] = 'To jest tylko wersja do druku, aby zobaczyæ pe³n± wersjê tematu, kliknij TUTAJ';

$lang['notify_message'] = 'Twój %s napisany przez Ciebie na: %s, zosta³ usuniêty przez Administratora lub Moderatora%s';
$lang['your_post'] = ' Twój post:';
$lang['Reason'] = 'Powód';
$lang['subject_notify_delete'] = 'Twój %s zosta³ usuniêty';
$lang['topic_link'] = "\n\rLink do tematu: %s";
$lang['forum_service'] = 'Obs³uga forum';
$lang['confirm_report_post'] = 'Czy na pewno chcesz zg³osiæ ten post do Moderatora i Administratora?';
$lang['Accept'] = 'Zaakceptuj';
$lang['Reject'] = 'Odrzuæ';
$lang['Accept-reject'] = 'Zaakceptuj/Odrzuæ wybrane';
$lang['Post_no_approved'] = 'Oczekuje na akceptacjê';
$lang['Loser_protect'] = 'UWAGA! Próbujesz odpowiedziec w temacie na <b>%s</b> stronie tematu, temat zawiera stron <b>%s</b>.<br />Przeczytaj ca³y temat aby w nim odpowiedzieæ!<br /><br />Kliknij %sTutaj%s aby przej¶æ do nastêpnej strony tematu.<br />Kliknij %sTutaj%s je¶li jeste¶ przekonanan' .  (($he) ? 'y' : 'a') . ', ¿e chcesz odpowiedzieæ nie czytaj±c ca³ego tematu.';
$lang['User_deleted'] = 'Usuniêty';
$lang['Account_delete'] = 'Usuniêcie konta na %s';
$lang['User_report_post'] = 'U¿ytkownik zg³osi³ post';
$lang['Birthday_subject'] = 'Wszystkiego najlepszego z okazji twoich %s urodzin!!!';
$lang['Subject_e'] = 'Opis tematu';
$lang['Subject_e_info'] = 'nieobowi±zkowy';
$lang['show_ignore_topics'] = 'Poka¿ ignorowane tematy';
$lang['footer'] = 'Stopka forum zosta³a zmodyfikowana, forum nie bêdzie dzia³aæ prawid³owo!<br />Ustaw prawid³owo stopkê w pliku overall_footer.tpl, musi byæ ona widoczna w przegladarce, nie mo¿e zawieraæ "sztuczek" maskujacych.<br /><br />Wzór: <b>Powered by &lt;a href=&quot;http://www.phpbb.com&quot; target=&quot;_blank&quot; class=&quot;copyright&quot;&gt;phpBB&lt;/a&gt; modified by &lt;a href=&quot;http://www.przemo.org/phpBB2/&quot; class=&quot;copyright&quot; target=&quot;_blank&quot;&gt;Przemo&lt;/a&gt; &amp;copy; 2003 phpBB Group</b>';
$lang['db_backup_done'] = 'W tym momencie forum rozpoczê³o tworzenie kopii zapasowej bazy danych.<br />Proszê wróciæ na forum za minutê.';
$lang['Freak_undo'] = 'Ctrl+Z aby cofn±æ';
$lang['Today'] = 'Dzisiaj';
$lang['Yesterday'] = 'Wczoraj';
$lang['TA_Locked'] = 'Zamkniêty';
$lang['TA_Unocked'] = 'Otwarty';
$lang['TA_Moved'] = 'Przesuniêty';
$lang['TA_Expired'] = 'Wygaszony';
$lang['TA_Who'] = 'przez';
$lang['TA_Delete'] = 'Usuñ t± informacjê';
$lang['Comment_post'] = 'Dopisz komentarz do postu';
$lang['Comment_added'] = 'Komentarz dodany przez: %s';
$lang['Topic_important'] = 'Warto¶æ merytoryczna';
$lang['First_post'] = 'Pierwszy post';
$lang['Post_history'] = 'Historia edycji postu';
$lang['Custom_Rank'] = 'Tytu³ u¿ytkownika';
$lang['Your_topic_moved'] = 'Twój temat na %s zosta³ przesuniêty';
$lang['Your_topic_moved_message'] = 'Napisany przez Ciebie temat: "%s" w forum: "%s" zosta³ przesuniêty do forum: "%s" Link do tematu: %s %s';
$lang['Important_topics'] = 'Wa¿ne tematy';
$lang['View_next_unread_posts'] = 'Zobacz kolejne nieczytane posty';
$lang['Go'] = 'Id¼';
$lang['adv_person'] = 'Zaproszone osoby';
$lang['adv_person_link'] = 'Aby zaprosiæ znajomego na to forum, skopiuj ten link: %s';
$lang['Invalid_session'] = 'Sesja po³±czenia wygas³a lub numer ID sesji jest nieprawid³owy.<br />Spróbuj ponownie.';
$lang['Not_admin'] = 'Nie posiadasz uprawnieñ administratora.';
$lang['Posting_disabled'] = 'Pisanie postów i tematów zosta³o wy³±czone.';
$lang['Registering_disabled'] = 'Rejestracja zosta³a wy³±czona.';
$lang['Pruning_unread_posts'] = 'Twoje konto przekroczy³o maksymaln± ilo¶æ nieprzeczytanych postów: <b>%s</b> Zosta³y usuniête informacje o nieczytanych postach z wyj±tkiem postów napisanych przez ostatnie: <b>%s</b> dni<br />Ilo¶æ usuniêtych nieczytanych postów: <b>%s</b><br /><br />Aby nie otrzymywaæ tego komunikatu, przeczytaj oznaczone tematy, lub oznacz wszystkie jako przeczytane.<br />W ka¿dej chwili mo¿esz skorzystaæ z wyszukiwarki postów aby odszukaæ posty napisane w ci±gu ostatniego wybranego czasu.';
//
// That's all Folks!
// -------------------------------------------------

?>