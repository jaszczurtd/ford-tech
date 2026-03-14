<?php
/***************************************************************************
 *                             lang_convert.php
 *                            -------------------
 *   begin                : Tuesday, Jul 02, 2002
 *   copyright            : Ludovic ARNAUD
 *   email                : ashe@mtgfrance.com
 *
 *   $Id: lang_convert.php,v 1.1 2002/07/17 00:00:00 Ashe Exp $
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
// Translation by JuniorZ
//

$lang['Generate'] = 'Gerar';
$lang['Convert'] = 'Converter';
$lang['Destroy'] = 'Destruir';

$lang['Download_more_converters'] = 'Baixar mais conversores';
$lang['Version'] = 'Versão';
$lang['Author'] = 'Autor';
$lang['Table_prefix'] = 'Prefíxo da Tabela';

$lang['Forum_address'] = 'Endereço do Fórum';
$lang['Forum_address_explain'] = '(esse é o endereço http de seu fórum formador)';

$lang['Forum_path'] = 'Diretório do Fórum';
$lang['Forum_path_explain'] = '(esse é o diretório de seu fórum formador - relativo ao diretório principal do phpBB)';

$lang['Optional_infos'] = 'Informações Opcionais';

$lang['Step_percent_completed'] = 'Passo <b>%d</b> de <b>%d</b>: %d%% completo';
$lang['Moving_to_next_step'] = 'Passo <b>%d</b> de <b>%d</b> completo, seguindo para o próximo passo';
$lang['Search_tables_cleared'] = 'Tabelas buscadas foram esvaziadas, restauração em progresso';
$lang['Search_restore_done'] = 'Restauração de Tabelas buscadas completa';

$lang['Click_to_continue'] = 'Clique %saqui%s para continuar';
$lang['Click_return_convert'] = 'Clique %saqui%s para voltar ao Painel de Controle de Conversores';

$lang['Conversion_final_step'] = 'Último passo em progresso, por favor aguarde.';
$lang['Conversion_completed'] = 'Conversão completa. Por favor verifique se tudo funciona corretamente e então você estará livre para destruir seu fórum formador. Obrigado por usar o phpBB ;)';

$lang['No_converters_found'] = 'Nenhum conversor encontrado';
$lang['Converters_panel'] = 'Painel de Conversores';
$lang['Converters'] = 'Conversores';

$lang['Security_notice'] = 'Aviso de Segurança';
$lang['Feature_locked'] = 'Esse recurso foi desabilitado por motivos de segurança.';
$lang['Unlock_feature'] = 'Clique aqui para habilitar esse recurso.';

$lang['No_tables_found'] = 'Nenhuma tabela encontrada.';
$lang['No_tables_dropped'] = 'Nenhuma tabela foi removida.';
$lang['Check_table_prefix'] = 'Por favor verifique o prefixo da sua tabela e tente novamente.';
$lang['Tables_missing'] = 'Não foi possível encontrar essas tabelas: <b>%s</b>.';
$lang['Default_prefix_is'] = 'The default table prefix for %s is <b>%s</b>';
$lang['Blank_prefix_found'] = 'A scan of your tables has shown a valid installation using no table prefix.';
$lang['Prefix_found'] = 'A scan of your tables has shown a valid installation using <b>%s</b> as table prefix.';

$lang['Choose_converter'] = 'Por favor escolha um conversor e então tente novamente';
$lang['Could_not_find_path'] = 'Não foi possível encontrar o diretório para seu fórum formador. Por favor verifique suas configurações e tente novamente';
$lang['File_not_found'] = 'Arquivo <b>%s</b> não foi encontrado';
$lang['Could_not_copy'] = 'Não foi possível copiar o arquivo <b>%s</b> para <b>%s</b><br /><br />Por favor verifique se o diretório alvo possui permissões para ser escrito pelo servidor.';
$lang['Could_not_read'] = 'Não foi possível abrir <b>%s</b>';
$lang['Config_table_empty'] = 'A tabela de configuração importada está vazia';
$lang['Make_folder_writable'] = 'Por favor certifique-se que a seguinte pasta existe e se possui permissão de escrita pelo servidor e então tente novamente:<br /><br /><b>%s</b>';
$lang['Make_folders_writable'] = 'Por favor certifique-se que as seguintes pastas existem e se possuem permissões de escrita pelo servidor e então tente novamente:<br /><br /><b>%s</b>';
$lang['Default_category'] = 'Categoria Padrão';

$lang['Confirm_destroy_forum'] = 'Deseja realmente destruir esse fórum? <br /><br /><b>%s</b>';
$lang['All_tables_dropped'] = 'Todas as tabelas foram removidas';

$lang['Click_to_stop_indexing'] = 'Clique aqui para parar a busca de re-indexacão';

$lang['Search_indexing'] = 'Busca de Indexação';
$lang['Search_indexing_explain'] = 'O phpBB2 usa um sistema de busca de texto completo. Ele divide cada mensagem em palavras separadas e então, se a palavra não existir ele guarda aquela palavra em uma tabela. Ao mesmo tempo a mensagem é ligada a cada palavra contida nessa tabela. Isso permite uma busca rápida em bancos de dados grandes e ajuda a reduzir o acesso excessivo ao servidor se comparado com a maioria dos métodos.<br /><br />Entretanto, se as tabelas saírem de sincronismo por alguma razão ou você alterar a lista de palavras miníma, máxima ou desabilitadas as tabelas precisarão de atualização. Esse painel ajudará-lo a fazer isso.<br /><br />Por favor seja atencioso pois esse procedimento pode levar um longo tempo, particularmente em bancos de dados muito grandes. Durante essa operação seu fórum será desligado automaticamente para prevenir que outras pessoas enviem mensagens. Você pode cancelar o procedimento a qualquer momento.';
$lang['Indexing_stop_explain'] = 'Search re-indexing has been stopped. Please note that because you stopped the procedure before it completed some posts will now not appear when words they contain are searched for.';
$lang['Indexing_finished_explain'] = 'Busca de re-indexação concluída com sucesso.';
?>