<div align="center"><h1>{L_CONVERT_TITLE}<br /><br /></h1></div>

<form method="post" action="{U_FORM_ACTION}">
<table width="600" cellspacing="1" cellpadding="4" border="0" align="center" class="forumline">
	<tr> 
		<th height="25" class="thHead" colspan="2"><b>{L_CONVERTERS} :: {L_OPTIONAL_INFOS}</b></th>
	</tr>
	<tr>
		<td class="row1"><span class="gen">{L_TABLE_PREFIX}</span></td>
		<td class="row2"><input type="text" name="src_table_prefix" size="8" value="{TABLE_PREFIX}" /></td>
	</tr>
	<tr>
		<td class="row1"><span class="gen">{L_FORUM_ADDRESS}</span><br /><span class="gensmall"><i>{L_FORUM_ADDRESS_EXPLAIN}</i></span></td>
		<td class="row2"><input type="text" name="src_url" size="50" value="{URL}" /></td>
	</tr>
	<tr>
		<td class="row1"><span class="gen">{L_FORUM_PATH}</span><br /><span class="gensmall"><i>{L_FORUM_PATH_EXPLAIN}</i></span></td>
		<td class="row2"><input type="text" name="src_path" size="50" value="{PATH}" /></td>
	</tr>
</table>

<br /><br />

<table width="600" cellspacing="1" cellpadding="4" border="0" align="center" class="forumline">
	<!-- BEGIN converters_locked -->
	<tr> 
		<th height="25" class="thHead"><b>{L_CONVERTERS} :: {L_SECURITY_NOTICE}</b></th>
	</tr>
	<tr> 
		<td class="row1"><table width="100%" border="0" cellspacing="0" cellpadding="1">
			<tr> 
				<td>&nbsp;</td>
			</tr>
			<tr> 
				<td align="center"><span class="gen">{L_FEATURE_LOCKED}<br /><br /><br /><input type="submit" name="unlock_converters" value="{L_UNLOCK_FEATURE}" /></span></td>
			</tr>
			<tr> 
				<td>&nbsp;</td>
			</tr>
		</table></td>
	</tr>
	<!-- END converters_locked -->
	<!-- BEGIN converters_unlocked -->
	<tr>
		<th class="thCornerL"></th>
		<th class="thTop">{L_FORUM}</th>
		<th class="thTop">{L_VERSION}</th>
		<th class="thCornerR">{L_AUTHOR}</th>
	</tr>
	<!-- END converters_unlocked -->
	<!-- BEGIN converter -->
	<tr>
		<td class="{converter.ROW_CLASS}" align="center" width="6%"><input type="radio" name="converter_tag" value="{converter.CONVERTER_TAG}" onClick="default_prefix('{converter.TABLE_PREFIX}')" /></td>
		<td class="{converter.ROW_CLASS}" align="left"><span class="gen">{converter.FORUM_NAME}</span></td>
		<td class="{converter.ROW_CLASS}" align="center" width="12%"><span class="gen">{converter.CONVERTER_VERSION}</span></td>
		<td class="{converter.ROW_CLASS}" align="center"><span class="gen">{converter.CONVERTER_AUTHOR}</span></td>
	</tr>
	<!-- END converter -->
	<!-- BEGIN converters_unlocked -->
	<tr>
		<td class="catBottom" colspan="4" align="center">
		<input type="hidden" name="mode" value="convert">
		<input type="submit" name="convert" value="{L_CONVERT}" class="mainoption" />&nbsp;&nbsp;&nbsp;
		<input type="submit" name="destroy" value="{L_DESTROY}" class="mainoption" /></td>
	</tr>
	<!-- END converters_unlocked -->
	<!-- BEGIN no_converters -->
	<tr> 
		<th height="25" class="thHead"><b>{L_CONVERTERS}</b></th>
	</tr>
	<tr>
		<td align="center" class="row2"><span class="gen">{L_NO_CONVERTERS}</span></td>
	</tr>
	<tr>
		<td class="catBottom" align="center"><input type="button" value="{L_GET_CONVERTERS}" class="mainoption" onClick="window.open('{U_CONVERTERS_PAGE}', 'download')" /></td>
	</tr>
	<!-- END no_converters -->
</table>

<br /><br />

<table width="600" cellspacing="1" cellpadding="4" border="0" align="center" class="forumline">
	<!-- BEGIN searchfill_locked -->
	<tr> 
		<th height="25" class="thHead"><b>{L_SEARCHFILL} :: {L_SECURITY_NOTICE}</b></th>
	</tr>
	<tr> 
		<td class="row1"><table width="100%" border="0" cellspacing="0" cellpadding="1">
			<tr> 
				<td>&nbsp;</td>
			</tr>
			<tr> 
				<td align="center"><span class="gen">{L_FEATURE_LOCKED}<br /><br /><br /><input type="submit" name="unlock_searchfill" value="{L_UNLOCK_FEATURE}" /></span></td>
			</tr>
			<tr> 
				<td>&nbsp;</td>
			</tr>
		</table></td>
	</tr>
	<!-- END searchfill_locked -->
	<!-- BEGIN searchfill_unlocked -->
	<tr> 
		<th height="25" class="thHead"><b>{L_SEARCHFILL}</b></th>
	</tr>
	<tr> 
		<td class="row1"><table width="100%" border="0" cellspacing="0" cellpadding="1">
			<tr> 
				<td>&nbsp;</td>
			</tr>
			<tr> 
				<td align="justify"><span class="gen">{L_SEARCHFILL_EXPLAIN}</span></td>
			</tr>
			<tr> 
				<td>&nbsp;</td>
			</tr>
		</table></td>
	</tr>
	<tr>
		<td class="catBottom" align="center"><input type="submit" name="searchfill" value="{L_GENERATE}" class="mainoption" /></td>
	</tr>
	<!-- END searchfill_unlocked -->
</table>
</form>

<script language="javascript" defer>
function default_prefix(prefix) {
	if (prefix) {
		if (document.forms[0].src_table_prefix.value == "") {
			document.forms[0].src_table_prefix.value = prefix;
		}
	}
}
</script>