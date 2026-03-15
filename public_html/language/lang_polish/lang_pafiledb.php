<?php

// Check for user gender
$he = ($userdata['user_gender'] != 2) ? true : false;

// Toplist
$lang['Toplist'] = 'Toplista';
$lang['Select_list'] = 'Wybierz liste do pokazania';
$lang['By_date'] = 'Według daty';
$lang['By_download'] = 'Wedlug ściągnięć';
$lang['By_rated'] = 'Według ocen';
$lang['Latest_downloads'] = 'Starszy download';
$lang['Most_downloads'] = 'Najczęściej ściągane';
$lang['Rated_downloads'] = 'Najlepiej oceniany';

// Main
$lang['Files'] = 'Pliki';
$lang['Viewall'] = 'Pokaż wszystkie pliki';
$lang['Vainfo'] = 'Pokaż wszystkie pliki w bazie';
$lang['Jump'] = "Wybierz kategorię";

// Sort 
$lang['Next'] = 'Następny';
$lang['Pagenums'] = 'Strony';
$lang['Prev'] = 'Wcześniejsze';
$lang['Name'] = 'Nazwa';

// Category
$lang['No_files'] = 'Nie znaleziono plików';
$lang['No_files_cat'] = 'Nie ma plików w tej kategorii.';

// File
$lang['File'] = 'Plik';
$lang['Desc'] = 'Opis';
$lang['Creator'] = 'Autor';
$lang['Version'] = 'Wersja';
$lang['Scrsht'] = 'Screenshot';
$lang['Docs'] = 'Dokumentacja';
$lang['Lastdl'] = 'Ostatni plik';
$lang['Never'] = 'Nigdy';
$lang['Votes'] = ' głosów';
$lang['Date'] = 'Data';
$lang['DlRating'] = 'Oceny';
$lang['Dls'] = ' Ściągnięć';
$lang['Downloadfile'] = 'Ściągnij plik';

// License
$lang['License'] = 'Licencja';
$lang['Licensewarn'] = 'Musisz zgodzić się z licencją żeby ściągnąć plik';
$lang['Iagree'] = 'Zgadzam się';
$lang['Dontagree'] = 'Nie zgadzam się';

// Search
$lang['Search'] = 'Szukaj';
$lang['Search_for'] = 'Szukaj';
$lang['Results'] = 'Rezultaty dla';
$lang['No_matches'] = 'Nic nie znaleziono';
$lang['Matches'] = 'Znaleziono';

// Statistics
$lang['Statistics'] = 'Statystyki';
$lang['Stats_text'] = "Mamy {total_files} plików w {total_categories} kategoriach<br />";
$lang['Stats_text'] .= "Wszystkich: {total_downloads}<br /><br />";
$lang['Stats_text'] .= "Ostatni plik <a href=\"{u_newest_file}\">{newest_file}</a><br />";
$lang['Stats_text'] .= "Najstarszy plik <a href=\"{u_oldest_file}\">{oldest_file}</a><br /><br />";
$lang['Stats_text'] .= "Średnia ocen {average}/10<br />";
$lang['Stats_text'] .= "Najwyżej oceniany <a href=\"{u_popular}\">{popular}</a> oceny: {most}/10<br />";
$lang['Stats_text'] .= "Ostatnio najwyżej oceniany: <a href=\"{u_lpopular}\">{lpopular}</a> oceny: {least}/10<br /><br />";
$lang['Stats_text'] .= "Suma plików {avg_dls}<br />";
$lang['Stats_text'] .= "Najczęściej ściągany <a href=\"{u_most_dl}\">{most_dl}</a> ściągnięć: {most_no}<br />";
$lang['Stats_text'] .= "Ostatnio najczęściej ściągany: <a href=\"{u_least_dl}\">{least_dl}</a> ściągnięć: {least_no}<br />";

$lang['Stats_portal'] = "<tr><td class='row1' align='$portal_config[download_pos]'><span class='gensmall'>Wszystkich plików: {total_files}</span></td></tr>";
$lang['Stats_portal'] .= "<tr><td class='row2' align='$portal_config[download_pos]'><span class='gensmall'>Najwyżej oceniany: <a href=\"{u_popular}\">{popular}</a></span></td></tr>";
$lang['Stats_portal'] .= "<tr><td class='row1' align='$portal_config[download_pos]'><span class='gensmall'>Najczęściej ściągany: <a href=\"{u_most_dl}\">{most_dl}</a></span></td></tr>";
$lang['Stats_portal'] .= "<tr><td class='row2' align='$portal_config[download_pos]'><span class='gensmall'>Ostatni plik: <a href=\"{u_newest_file}\">{newest_file}</a></span></td></tr>";
$lang['Stats_portal'] .= "<tr><td class='row1' align='$portal_config[download_pos]'><span class='gensmall'>Ostatnio najczęściej ściągany: <a href=\"{u_least_dl}\">{least_dl}</a></span></td></tr>";
$lang['Stats_portal'] .= "<tr><td class='row2' align='$portal_config[download_pos]'><span class='gensmall'>Ostatnio najwyżej oceniany: <a href=\"{u_lpopular}\">{lpopular}</a></span></td></tr>";

// Rate
$lang['Rate'] = 'Oceń plik';
$lang['Rerror'] = 'Już oceniał' .  (($he) ? 'e' : 'a') . 'ś ten plik.';
$lang['Rateinfo'] = ' <i>{filename}</i>.<br />Wybierz swoją ocenę w skali 1 - 10';
$lang['Rconf'] = 'Ocenił' .  (($he) ? 'e' : 'a') . 'ś plik na: <b>{filename}</b> z {rate}.<br />Ogólna ocena pliku: <b>{newrating}/10</b>';
$lang['R1'] = '1';
$lang['R2'] = '2';
$lang['R3'] = '3';
$lang['R4'] = '4';
$lang['R5'] = '5';
$lang['R6'] = '6';
$lang['R7'] = '7';
$lang['R8'] = '8';
$lang['R9'] = '9';
$lang['R10'] = '10';

// Email
$lang['Emailfile'] = 'Wyślij email do znajomego z informacją o tym pliku';
$lang['Emailinfo'] = '';
$lang['Yname'] = 'Twoję imię';
$lang['Yemail'] = 'Twój email';
$lang['Fname'] = 'Imię znajomego';
$lang['Femail'] = 'E-mail znajomego';
$lang['Esub'] = 'Temat listu';
$lang['Etext'] = 'Treść';
$lang['Defaultmail'] = 'Myślę że może Cię zainteresować plik, który znalazłem na';
$lang['Semail'] = 'Wyślij email';
$lang['Econf'] = "Email wysłany.";

// Comments
$lang['Comments'] = 'Komentarze';
$lang['Comment_subject'] = 'Temat komentarza'; 
$lang['Comment_explain'] = 'Uzyj pola powyżej aby skomentować plik.'; 
$lang['Comment_add'] = 'Dodaj komentarz'; 
$lang['Comment_delete'] = 'Usuń'; 
$lang['Comment_posted'] = 'Komentarz dodany'; 
$lang['Comment_deleted'] = 'Komentarz usunięty'; 
$lang['No_comments'] = 'Brak komentarzy.';

// Download
$lang['Directly_linked'] = 'Nie możesz ściągnąć pliku bezpośrednio z innego adresu!';

// General
$lang['Click_return'] = 'Kliknij %sTutaj%s żeby wrócić do poprzedniej strony';
$lang['never'] = 'Nie';
$lang['jump'] = 'Wybierz kategorię';
$lang['viewall_disabled'] = 'Wyłączone przez administratora.';
$lang['New_file'] = 'Nowy plik';
$lang['you_have_login'] = "Musisz się %sZalogować%s żeby ściągnąć ten plik";

?>