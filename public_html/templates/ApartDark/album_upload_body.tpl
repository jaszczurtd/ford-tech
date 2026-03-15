<script language="JavaScript" type="text/javascript">
<!--
function checkAlbumForm() {
	var fileInput = document.upload['pic_file[]'];
	var fileCount = (fileInput && fileInput.files) ? fileInput.files.length : (fileInput && fileInput.value.length > 0 ? 1 : 0);

	if (fileCount < 1) {
		alert("{L_UPLOAD_NO_FILE}");
		return false;
	}
	if (fileCount == 1 && document.upload.pic_title.value.length < 2) {
		alert("{L_UPLOAD_NO_TITLE}");
		return false;
	}
	if (document.upload.pic_desc.value.length > {S_PIC_DESC_MAX_LENGTH}) {
		alert("{L_DESC_TOO_LONG}");
		return false;
	}
	return true;
}
// -->
</script>

<form name="upload" action="{S_ALBUM_ACTION}" method="post" enctype="multipart/form-data" onSubmit="return checkAlbumForm()">
<table width="100%" cellspacing="2" cellpadding="2" border="0">
  <tr>
	<td class="nav"><span class="nav"><a href="{U_INDEX}" class="nav">{L_INDEX}</a> -> <a class="nav" href="{U_ALBUM}">{L_ALBUM}</a> -> <a class="nav" href="{U_VIEW_CAT}">{CAT_TITLE}</a></span></td>
  </tr>
</table>

<table width="100%" cellpadding="3" cellspacing="1" border="0" class="forumline">
  <tr>
	<th class="thTop" height="25" colspan="2">{L_UPLOAD_PIC}</th>
  </tr>
<!-- BEGIN switch_user_logged_out -->
  <tr>
	<td class="row1" width="30%" height="28"><span class="gen">{L_USERNAME}:</span></td>
	<td class="row2"><input class="post" type="text" name="pic_username" size="32" maxlength="32"></td>
  </tr>
<!-- END switch_user_logged_out -->
  <tr>
	<td class="row1" height="28"><span class="gen">{L_PIC_TITLE}:</span><br><span class="gensmall">(opcjonalny przy wielu plikach — użyta zostanie nazwa pliku)</span></td>
	<td class="row2"><input class="post" type="text" name="pic_title" size="60"></td>
  </tr>
  <tr>
	<td class="row1" valign="top" height="28"><span class="gen">{L_PIC_DESC}:<br>
	</span><span class="genmed">{L_PLAIN_TEXT_ONLY}<br>{L_MAX_LENGTH}: <b>{S_PIC_DESC_MAX_LENGTH}</b></span></td>
	<td class="row2"><textarea class="post" cols="60" rows="4" name="pic_desc" size="60"></textarea></td>
  </tr>
  <tr>
	<td class="row1" colspan="2"><span class="gensmall" style="display:block;padding:6px 8px;background:#1a1a2e;border-left:3px solid #5577aa;line-height:1.6;">Mo&#380;esz doda&#263; kilka zdj&#281;&#263; na raz. Kliknij przycisk &quot;Wybierz plik&quot;, a nast&#281;pnie &mdash; trzymaj&#261;c wci&#347;ni&#281;ty klawisz <b>Ctrl</b> &mdash; klikaj kolejne zdj&#281;cia. Wszystkie zaznaczone zostan&#261; dodane do galerii jednocze&#347;nie.<br>Tytu&#322; jest opcjonalny: je&#347;li go nie wpiszesz, ka&#380;de zdj&#281;cie otrzyma tytu&#322; taki jak nazwa pliku.</span></td>
  </tr>
  <tr>
	<td class="row1"><span class="gen">{L_UPLOAD_PIC_FROM_MACHINE}:</span></td>
	<td class="row2"><input class="post" type="file" name="pic_file[]" multiple accept="image/jpeg,image/png,image/gif" size="49"></td>
  </tr>
<!-- BEGIN switch_manual_thumbnail -->
  <tr>
	<td class="row1"><span class="gen">{L_UPLOAD_THUMBNAIL}:<br></span><span class="gensmall">{L_UPLOAD_THUMBNAIL_EXPLAIN}</span></td>
	<td class="row2"><input class="post" type="file" name="pic_thumbnail" size="49"></td>
  </tr>
  <tr>
	<td class="row1" height="28"><span class="gen">{L_THUMBNAIL_SIZE}:</span></td>
	<td class="row2"><span class="gen"><b>{S_THUMBNAIL_SIZE}</b></span></td>
  </tr>
<!-- END switch_manual_thumbnail -->
  <tr>
	<td height="28" class="row1"><span class="gen">{L_UPLOAD_TO_CATEGORY}:</span></td>
	<td class="row2">{SELECT_CAT}</td>
  </tr>
  <tr>
	<td class="row1" height="28"><span class="gen">{L_MAX_FILESIZE}:</span></td>
	<td class="row2"><span class="gen"><b>{S_MAX_FILESIZE}</b></span></td>
  </tr>
  <tr>
	<td class="row1" height="28"><span class="gen">{L_MAX_WIDTH}:</span></td>
	<td class="row2"><span class="gen"><b>{S_MAX_WIDTH}</b></span></td>
  </tr>
  <tr>
	<td class="row1" height="28"><span class="gen">{L_MAX_HEIGHT}:</span></td>
	<td class="row2"><span class="gen"><b>{S_MAX_HEIGHT}</b></span></td>
  </tr>
  <tr>
	<td class="row1" height="28"><span class="gen">{L_ALLOWED_JPG}:</span></td>
	<td class="row2"><span class="gen"><b>{S_JPG}</b></span></td>
  </tr>
  <tr>
	<td class="row1" height="28"><span class="gen">{L_ALLOWED_PNG}:</span></td>
	<td class="row2"><span class="gen"><b>{S_PNG}</b></span></td>
  </tr>
  <tr>
	<td class="row1" height="28"><span class="gen">{L_ALLOWED_GIF}:</span></td>
	<td class="row2"><span class="gen"><b>{S_GIF}</b></span></td>
  </tr>
  <tr>
	<td class="catBottom" align="center" height="28" colspan="2"><input type="reset" value="{L_RESET}" class="liteoption">&nbsp;&nbsp;&nbsp;<input type="submit" name="submit" value="{L_SUBMIT}" class="mainoption"></td>
  </tr>
</table>
</form>

<br>

<!--
You must keep my copyright notice visible with its original content
-->
<div align="center" style="font-family: Verdana; font-size: 10px; letter-spacing: -1px">Powered by Photo Album Addon {ALBUM_VERSION} &copy; 2002-2003 <a href="http://smartor.is-root.com" target="_blank">Smartor</a></div>