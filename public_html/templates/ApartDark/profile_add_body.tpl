<script language="JavaScript" type="text/javascript">
<!--//
function _dom_menu()
{
	return this;
}
	_dom_menu.prototype.objref = function(id)
	{
		return document.getElementById ? document.getElementById(id) : (document.all ? document.all[id] : (document.layers ? document.layers[id] : null));
	}
	_dom_menu.prototype.cancel_event = function()
	{
		if ( window.event )
		{
			window.event.cancelBubble = true;
		}
	}

	_dom_menu.prototype.set = function(menu) {
		var menus = new Array(
			'reginfo',
			'profileinfo',
                  <!-- BEGIN switch_avatar_block -->
			'avatarinfo',
                  <!-- END switch_avatar_block -->
                  <!-- BEGIN switch_edit_profile --> 
                  'notes',
                  <!-- END switch_edit_profile -->
			'prefinfo'
		);
		var object;
		var opt;
		var flag;
		for (i=0; i < menus.length; i++)
		{
			cur_menu = menus[i];
			object = this.objref(cur_menu);
			if ( object && object.style )
			{
				object.style.display = (cur_menu == menu) ? '' : 'none';
			}
			opt = this.objref(cur_menu + '_opt');
			if ( opt && opt.style )
			{
                        opt.style.color = (cur_menu == menu) ? '{T_BODY_TEXT}' : '{T_BODY_LINK}';
			}
		}
            <!-- BEGIN switch_avatar_block -->
		pic = this.objref('avatarinfo_cur');
		if ( pic && pic.style )
		{
			pic.style.display = ( menu == 'avatarinfo' ) ? '' : 'none';
		}
            <!-- END switch_avatar_block -->
		this.cancel_event();
	}

// instantiate
dom_menu = new _dom_menu();
//-->
</script>

<form action="{S_PROFILE_ACTION}" {S_FORM_ENCTYPE} method="post">

{ERROR_BOX}

<table width="100%" cellspacing="2" cellpadding="0" border="0" align="center">
	<tr> 
		<td align="left" width="100%" colspan="2" valign="top"><span class="nav"><a href="{U_INDEX}" class="nav">{L_INDEX}</a></span></td>
	</tr>
      <tr>
            <td width="200" valign="top">

<table cellpadding="4" cellspacing="1" border="0" class="forumline" width="200">
      <tr>
	      <th class="thHead"><span class="gensmall2">Nawigacja</span></th>
      </tr>
      <tr>
		<td class="row1" nowrap="nowrap" onMouseOver="this.className='row2'; this.style.cursor='pointer';" onMouseOut="this.className='row1'; this.style.cursor='pointer';" onClick="dom_menu.set('reginfo'); return false;"><div id="reginfo_opt" class="menu" style="color: {T_BODY_TEXT}"><b>&raquo;</b> <span class="gensmall">Informacje Rejestracji</span></div></td>
	</tr>
	<tr>
		<td class="row1" nowrap="nowrap" onMouseOver="this.className='row2'; this.style.cursor='pointer';" onMouseOut="this.className='row1'; this.style.cursor='pointer';" onClick="dom_menu.set('profileinfo'); return false;"><div id="profileinfo_opt" class="menu"><b>&raquo;</b> <span class="gensmall">Informacje Profilu</span></div></td>
	</tr>
	<!-- BEGIN switch_avatar_block -->
	<tr>
		<td class="row1" nowrap="nowrap" onMouseOver="this.className='row2'; this.style.cursor='pointer';" onMouseOut="this.className='row1'; this.style.cursor='pointer';" onClick="dom_menu.set('avatarinfo'); return false;"><div id="avatarinfo_opt" class="menu"><b>&raquo;</b> <span class="gensmall">Panel kontrolny avatar�w</span></div></td>
	</tr>
	<!-- END switch_avatar_block -->
	<tr>
	      <td class="row1" nowrap="nowrap" onMouseOver="this.className='row2'; this.style.cursor='pointer';" onMouseOut="this.className='row1'; this.style.cursor='pointer';" onClick="dom_menu.set('prefinfo'); return false;"><div id="prefinfo_opt" class="menu"><b>&raquo;</b> <span class="gensmall">Preferencje</span></div></td>
	</tr>
</table>

<br style="font-size: 3px" />
<table id="avatarinfo_cur" style="display:none" cellpadding="4" cellspacing="1" border="0" class="forumline" width="100%">
<tr>
	<th class="thHead"><span class="gensmall2">Obecny Obraz</span></th>
</tr>
<tr>
	<td class="row1" align="center">{AVATAR}<span class="gensmall"><br /><input type="checkbox" name="avatardel" />&nbsp;{L_DELETE_AVATAR}
	</span></td>
</tr>
</table>

            </td>
            <td valign="top" width="100%">

<table id="reginfo" border="0" cellpadding="3" cellspacing="1" width="100%" class="forumline">
      <tr> 
	      <th class="thHead" colspan="2" height="25" valign="middle"><span class="gensmall2">Obowi&#261;zkowe Dane Rejestracji</span></th>
	</tr>
      <tr> 
            <td class="row2" colspan="2"><span class="gensmall">{L_ITEMS_REQUIRED}</span></td>
	</tr>
	<!-- BEGIN switch_namechange_disallowed -->
	<tr> 
		<td class="row1" width="38%"><span class="gen">{L_USERNAME}: *</span></td>
		<td class="row2"><input type="hidden" name="username" value="{USERNAME}" /><span class="gen"><b>{USERNAME}</b></span></td>
	</tr>
	<!-- END switch_namechange_disallowed -->
	<!-- BEGIN switch_namechange_allowed -->
	<tr> 
		<td class="row1" width="38%"><span class="gen">{L_USERNAME}: *</span></td>
		<td class="row2"><input type="text" class="post" style="width:200px" name="username" size="25" maxlength="25" value="{USERNAME}" /></td>
	</tr>
	<!-- END switch_namechange_allowed -->
	<!-- BEGIN switch_register --> 
	<tr> 
        <td class="row1"><span class="gen">{L_EMAIL_ADDRESS}: *</span><br /> 
        <span class="gensmall">{L_EMAIL_EXPLAIN}</td> 
        <td class="row2"> 
        <input type="text" class="post" style="width:100px" name="email1" size="25" maxlength="200" value="" /> 
        <span class="genmed">@</span> 
        <input type="text" class="post" style="width:100px" name="email2" size="25" maxlength="200" value="" /> 
        </td> 
	</tr> 
	<!-- END switch_register --> 
	
	<!-- BEGIN switch_edit_profile -->
	<tr> 
        <td class="row1"><span class="gen">{L_EMAIL_ADDRESS}: *</span></td> 
        <td class="row2"><input type="text" class="post" style="width:200px" name="email1" size="25" maxlength="255" value="{EMAIL}" /></td> 
    </tr> 
	<tr> 
	      <td class="row1"><span class="gen">{L_CURRENT_PASSWORD}: *</span><br />
		<span class="gensmall">{L_CONFIRM_PASSWORD_EXPLAIN}</span></td>
	      <td class="row2"> 
		<input type="password" class="post" style="width: 200px" name="cur_password" size="25" maxlength="32" value="{CUR_PASSWORD}" />
	      </td>
	</tr>
	<!-- END switch_edit_profile -->
	<tr> 
	      <td class="row1"><span class="gen">{L_NEW_PASSWORD}: *</span><br />
		<span class="gensmall">{L_PASSWORD_IF_CHANGED}</span></td>
	      <td class="row2"> 
		<input type="password" class="post" style="width: 200px" name="new_password" size="25" maxlength="32" value="{NEW_PASSWORD}" />
	      </td>
	</tr>
	<tr> 
	      <td class="row1"><span class="gen">{L_CONFIRM_PASSWORD}: * </span><br />
	 	<span class="gensmall">{L_PASSWORD_CONFIRM_IF_CHANGED}</span></td>
	      <td class="row2"> 
		<input type="password" class="post" style="width: 200px" name="password_confirm" size="25" maxlength="32" value="{PASSWORD_CONFIRM}" />
	      </td>
	</tr>
	<!-- Visual Confirmation -->
	<!-- BEGIN validation -->
	<tr>
	  <td class="row2" colspan="2">�eby zapobiec automatycznym rejestracjom, forum wymaga wpisania kodu potwierdzaj�cego. Kod jest pokazywany na obrazku poni�ej. Je�li nie mo�esz go przeczyta�, to skontaktuj si� z administratorem forum.</td>
	</tr>
	<tr>
	  <td class="row1" valign="top"><span class="gen">{validation.L_VALIDATION}:<br /></span><span class="gensmall">{validation.L_VALIDATION_EXPLAIN}</span></td>
	  <td class="row2" align="left"><span class="gen">{validation.VALIDATION}<br /><input type="text" name="reg_key" class="post" onFocus="Active(this)" onBlur="NotActive(this)" maxlength="4" size="24"></span></td>
	</tr>
	<!-- END validation -->
      <tr>
	      <td class="catBottom" colspan="2" align="center" height="28"><input type="submit" name="submit" value="{L_SUBMIT}" class="mainoption" />&nbsp;&nbsp;<input type="reset" value="{L_RESET}" name="reset" class="liteoption" />
	      </td>
      </tr>
</table>

<table id="profileinfo" style="display:none" border="0" cellpadding="3" cellspacing="1" width="100%" class="forumline">
      <tr>
	      <th class="thHead" colspan="2" height="25" valign="middle"><span class="gensmall2">Informacje Profilu</span></th>
	</tr>
	<tr> 
	  <td class="row2" colspan="2"><span class="gensmall">{L_PROFILE_INFO_NOTICE}</span></td>
	</tr>
	<!-- BEGIN custom_fields -->
	<tr>
		<td class="row1"><span class="gen">{custom_fields.CF_DESCRIPTION}</span></td>
		<td class="row2">
		<!-- BEGIN input_text -->
		<input type="text" size="35" style="width: 200px" name="{custom_fields.input_text.INPUT_NAME}" maxlength="{custom_fields.input_text.INPUT_MAXVALUE}" value="{custom_fields.input_text.INPUT_VALUE}" class="post" onFocus="Active(this)" onBlur="NotActive(this)">
		<!-- END input_text -->
		<!-- BEGIN input_textarea -->
		<textarea cols="30" rows="2" name="{custom_fields.input_textarea.INPUT_NAME}" class="post" onFocus="Active(this)" onBlur="NotActive(this)">{custom_fields.input_textarea.INPUT_VALUE}</textarea>
		<!-- END input_textarea -->
		<!-- BEGIN jumpbox -->
		{custom_fields.jumpbox.INPUT}
		<!-- END jumpbox -->
		</td>
	</tr>
	<!-- END custom_fields -->
	<!-- BEGIN custom_color -->
	<tr>
	<td class="row1"><span class="gen">{custom_color.L_CUSTOM_color}:</span><br /><span class="gensmall">{custom_color.L_CUSTOM_color_EXPLAIN}<br /></span></td>
	<td class="row2">
			<select class="post" name="custom_color">
			<option class="post" style="color:black" value="" class="genmed" {DEFAULT_SELECT}>{L_COLOR_DEFAULT}</option>
			<option style="color:darkred" value="CC0000" class="genmed" {DARK_RED_SELECT}>{L_COLOR_DARK_RED}</option>
			<option style="color:red" value="FF3300" class="genmed" {RED_SELECT}>{L_COLOR_RED}</option>
			<option style="color:orange" value="FF9900" class="genmed" {ORANGE_SELECT}>{L_COLOR_ORANGE}</option>
			<option style="color:brown" value="800000" class="genmed" {BROWN_SELECT}>{L_COLOR_BROWN}</option>
			<option style="color:yellow" value="FFFF00" class="genmed" {YELLOW_SELECT}>{L_COLOR_YELLOW}</option>
			<option style="color:green" value="008000" class="genmed" {GREEN_SELECT}>{L_COLOR_GREEN}</option>
			<option style="color:olive" value="808000" class="genmed" {OLIVE_SELECT}>{L_COLOR_OLIVE}</option>
			<option style="color:cyan" value="33FFFF" class="genmed" {CYAN_SELECT}>{L_COLOR_CYAN}</option>
			<option style="color:blue" value="3366FF" class="genmed" {BLUE_SELECT}>{L_COLOR_BLUE}</option>
			<option style="color:darkblue" value="000080" class="genmed" {DARK_BLUE_SELECT}>{L_COLOR_DARK_BLUE}</option>
			<option style="color:indigo" value="990099" class="genmed" {INDIGO_SELECT}>{L_COLOR_INDIGO}</option>
			<option style="color:violet" value="CC66CC" class="genmed" {VIOLET_SELECT}>{L_COLOR_VIOLET}</option>
			<option style="color:white" value="F5FFFA" class="genmed" {WHITE_SELECT}>{L_COLOR_WHITE}</option>
			<option style="color:black" value="000000" class="genmed" {BLACK_SELECT}>{L_COLOR_BLACK}</option></select>
	</td>
	</tr>
	<!-- END custom_color -->
	<!-- BEGIN custom_rank -->
    <tr> 
	<td class="row1"><span class="gen">{custom_rank.L_CUSTOM_RANK}:</span><br /><span class="gensmall">{custom_rank.L_CUSTOM_RANK_EXPLAIN}<br /></span></td>
	<td class="row2"><input type="text" class="post" onFocus="Active(this)" onBlur="NotActive(this)" style="width: 200px" name="custom_rank" size="35" maxlength="50" value="{custom_rank.CUSTOM_RANK}" /></td>
    </tr>
	<!-- END custom_rank -->
	<!-- BEGIN icq -->
	<tr>
	  <td class="row1"><span class="gen">{L_ICQ_NUMBER}:</span></td>
	  <td class="row2"><input type="text" name="icq" class="post" onFocus="Active(this)" onBlur="NotActive(this)" style="width: 200px"  size="10" maxlength="15" value="{ICQ}" /></td>
	</tr>
	<!-- END icq -->
	<!-- BEGIN aim -->
	<tr>
	  <td class="row1"><span class="gen">{L_AIM}:</span></td>
	  <td class="row2"><input type="text" class="post" onFocus="Active(this)" onBlur="NotActive(this)" style="width: 200px" name="aim" size="20" maxlength="255" value="{AIM}" /></td>
	</tr>
	<!-- END aim -->
	<!-- BEGIN msn -->
	<tr>
	  <td class="row1"><span class="gen">{L_MESSENGER}:</span></td>
	  <td class="row2"><input type="text" class="post" onFocus="Active(this)" onBlur="NotActive(this)" style="width: 200px" name="msn" size="20" maxlength="255" value="{MSN}" /></td>
	</tr>
	<!-- END msn -->
	<!-- BEGIN yahoo -->
	<tr>
	  <td class="row1"><span class="gen">{L_YAHOO}:</span></td>
	  <td class="row2"><input type="text" class="post" onFocus="Active(this)" onBlur="NotActive(this)" style="width: 200px" name="yim" size="20" maxlength="255" value="{YIM}" /></td>
	</tr>
	<!-- END yahoo -->
	<tr>
	  <td class="row1"><span class="gen">{L_WEBSITE}:</span></td>
	  <td class="row2"><input type="text" class="post" onFocus="Active(this)" onBlur="NotActive(this)" style="width: 200px" name="website" size="25" maxlength="255" value="{WEBSITE}" /></td>
	</tr>
	<tr>
	  <td class="row1"><span class="gen">{L_LOCATION}:</span></td>
	  <td class="row2"><input type="text" class="post" onFocus="Active(this)" onBlur="NotActive(this)" style="width: 200px" name="location" size="25" maxlength="100" value="{LOCATION}" /></td>
	</tr>
	<!-- BEGIN job -->
	<tr>
	  <td class="row1"><span class="gen">{L_OCCUPATION}:</span></td>
	  <td class="row2"><input type="text" class="post" onFocus="Active(this)" onBlur="NotActive(this)" style="width: 200px" name="occupation" size="25" maxlength="100" value="{OCCUPATION}" /></td>
	</tr>
	<!-- END job -->
	<!-- BEGIN interests -->
	<tr>
	  <td class="row1"><span class="gen">{L_INTERESTS}:</span></td>
	  <td class="row2"><input type="text" class="post" onFocus="Active(this)" onBlur="NotActive(this)" style="width: 200px" name="interests" size="35" maxlength="150" value="{INTERESTS}" /></td>
	</tr>
	<!-- END interests -->
	<!-- BEGIN switch_gender -->
	<tr>
		<td class="row1"><span class="gen">{L_GENDER}:</span></td>
		<td class="row2">
		<!--<input type="radio" {LOCK_GENDER} name="gender" value="0" {GENDER_NO_SPECIFY_CHECKED}/>
		<span class="gen">{L_GENDER_NOT_SPECIFY}</span>&nbsp;&nbsp;-->
		<input type="radio" name="gender" value="1" {GENDER_MALE_CHECKED}/>
		<span class="gen">{L_GENDER_MALE}</span>&nbsp;&nbsp;
		<input type="radio" name="gender" value="2" {GENDER_FEMALE_CHECKED}/><span class="gen">{L_GENDER_FEMALE}</span></td>
	</tr>
	<!-- END switch_gender -->
	<tr>
	   <td class="row1"><span class="gen">{L_BIRTHDAY}:</span></td>
	   <td class="row2"><span class="gensmall">{S_BIRTHDAY}</span></td>
	</tr>
	<!-- BEGIN switch_signature_block -->
	<tr>
	  <th class="thHead" colspan="2" height="25" valign="middle"><span class="gensmall2">{L_SIGNATURE_PANEL}</span></th>
	</tr>

	<!-- BEGIN switch_signature_allowimage -->
	<tr>
		<td class="row2" colspan="2">{L_SIGNATURE_EXPLAIN}</td>
	</tr>
	<tr>
		<td class="row1" colspan="2">
		<table width="100%" cellspacing="2" cellpadding="0" border="0" align="center">
			<tr>
				<td align="center"><span class="gensmall">{L_CURRENT_IMAGE}</span><br /><div align="center">{switch_signature_block.SIGNATURE_IMAGE}</div><input type="checkbox" name="sig_image_del" />&nbsp;<span class="gensmall">{L_DELETE_SIGNATURE_IMAGE}</span></td>
			</tr>
		</table>
		</td>
	</tr>
	<!-- END switch_signature_allowimage -->
	<!-- BEGIN switch_signature_local -->
	<tr>
		<td class="row1"><span class="gen">{L_UPLOAD_SIGNATURE_FILE}:</span></td>
		<td class="row2"><input type="hidden" name="MAX_FILE_SIZE" value="{SIG_IMAGE_SIZE}" /><input type="file" name="sig_image" class="post" onFocus="Active(this)" onBlur="NotActive(this)" style="width:200px" /></td>
	</tr>
	<!-- END switch_signature_local -->
	<!-- BEGIN switch_signature_remote -->
	<tr> 
		<td class="row1"><span class="gen">{L_UPLOAD_SIGNATURE_URL}:</span><br /><span class="gensmall">{L_UPLOAD_SIGNATURE_URL_EXPLAIN}</span></td>
		<td class="row2"><input type="text" name="sig_image_url" size="40" class="post" onFocus="Active(this)" onBlur="NotActive(this)" style="width:200px" /></td>
	</tr>
	<!-- END switch_signature_remote -->
	<tr>
	  <td class="row1"><span class="gen">{L_SIGNATURE_TEXT}:</span><br /><span class="gensmall">{L_SIGNATURE_TEXT_EXPLAIN}<br /><br />{HTML_STATUS}<br />{BBCODE_STATUS}<br />{SMILIES_STATUS}</span></td>
	  <td class="row2"> 
		<textarea name="signature" style="width: 300px" rows="6" cols="30" class="post" onFocus="Active(this)" onBlur="NotActive(this)">{switch_signature_block.SIGNATURE}</textarea></td>
	</tr>
	<tr>
	  <td class="row1"><span class="gen">{L_ALWAYS_ADD_SIGNATURE}:</span></td>
	  <td class="row2">
		<input type="radio" name="attachsig" value="1" {switch_signature_block.ALWAYS_ADD_SIGNATURE_YES} />
		<span class="gen">{L_YES}</span>&nbsp;&nbsp;
		<input type="radio" name="attachsig" value="0" {switch_signature_block.ALWAYS_ADD_SIGNATURE_NO} />
		<span class="gen">{L_NO}</span></td>
	</tr>
	<!-- END switch_signature_block -->
	<tr>
		<td class="catBottom" colspan="2" align="center" height="22">{S_HIDDEN_FIELDS}{S_ANTIBOT_FIELDS}<input type="submit" name="submit" value="{L_SUBMIT}" class="mainoption" />&nbsp;&nbsp;<input type="reset" value="{L_RESET}" name="reset" class="liteoption" /></td>
	</tr>
      </tr>
</table>

<table id="prefinfo" style="display:none" border="0" cellpadding="3" cellspacing="1" width="100%" class="forumline">
      <tr>
	      <th class="thHead" colspan="2" height="25" valign="middle"><span class="gensmall2">Preferencje</span></th>
	</tr>
	<!-- BEGIN email -->
	<tr> 
	  <td class="row1"><span class="gen">{L_PUBLIC_VIEW_EMAIL}:</span></td>
	  <td class="row2"> 
		<input type="radio" name="viewemail" value="1" {VIEW_EMAIL_YES} />
		<span class="gen">{L_YES}</span>&nbsp;&nbsp; 
		<input type="radio" name="viewemail" value="0" {VIEW_EMAIL_NO} /><span class="gen">{L_NO}</span></td>
	</tr>
	<!-- END email -->
	<!-- BEGIN aim -->
	<tr> 
	  <td class="row1"><span class="gen">{L_PUBLIC_VIEW_AIM}:</span></td>
	  <td class="row2"> 
		<input type="radio" name="viewaim" value="1" {VIEW_AIM_YES} />
		<span class="gen">{L_YES}</span>&nbsp;&nbsp; 
		<input type="radio" name="viewaim" value="0" {VIEW_AIM_NO} /><span class="gen">{L_NO}</span></td>
	</tr>
	<!-- END aim -->
	<tr> 
	  <td class="row1"><span class="gen">{L_HIDE_USER}:</span></td>
	  <td class="row2"> 
		<input type="radio" name="hideonline" value="1" {HIDE_USER_YES} />
		<span class="gen">{L_YES}</span>&nbsp;&nbsp; 
		<input type="radio" name="hideonline" value="0" {HIDE_USER_NO} />
		<span class="gen">{L_NO}</span></td>
	</tr>
	<tr>
	  <td class="row1"><span class="gen">{L_NOTIFY_ON_REPLY}:</span><br />
		<span class="gensmall">{L_NOTIFY_ON_REPLY_EXPLAIN}</span></td>
	  <td class="row2"> 
		<input type="radio" name="notifyreply" value="1" {NOTIFY_REPLY_YES} />
		<span class="gen">{L_YES}</span>&nbsp;&nbsp; 
		<input type="radio" name="notifyreply" value="0" {NOTIFY_REPLY_NO} />
		<span class="gen">{L_NO}</span></td>
	</tr>
	<!-- BEGIN switch_report -->
	<tr> 
	  <td class="row1"><span class="gen">{switch_report.L_NO_REPORT_POPUP}:</span></td>
	  <td class="row2"> 
		<input type="radio" name="no_report_popup" value="0" {switch_report.NO_REPORT_POPUP_YES} />
		<span class="gen">{L_YES}</span>&nbsp;&nbsp; 
		<input type="radio" name="no_report_popup" value="1" {switch_report.NO_REPORT_POPUP_NO} />
		<span class="gen">{L_NO}</span></td>
	</tr>
	<tr> 
	  <td class="row1"><span class="gen">{switch_report.L_NO_REPORT_MAIL}:</span></td>
	  <td class="row2"> 
		<input type="radio" name="no_report_mail" value="0" {switch_report.NO_REPORT_MAIL_YES} />
		<span class="gen">{L_YES}</span>&nbsp;&nbsp; 
		<input type="radio" name="no_report_mail" value="1" {switch_report.NO_REPORT_MAIL_NO} />
		<span class="gen">{L_NO}</span></td>
	</tr>
	<!-- END switch_report -->
	<tr> 
	  <td class="row1"><span class="gen">{L_NOTIFY_ON_PRIVMSG}:</span></td>
	  <td class="row2"> 
		<input type="radio" name="notifypm" value="1" {NOTIFY_PM_YES} />
		<span class="gen">{L_YES}</span>&nbsp;&nbsp; 
		<input type="radio" name="notifypm" value="0" {NOTIFY_PM_NO} />
		<span class="gen">{L_NO}</span></td>
	</tr>
	<tr> 
	  <td class="row1"><span class="gen">{L_POPUP_ON_PRIVMSG}:</span><br /><span class="gensmall">{L_POPUP_ON_PRIVMSG_EXPLAIN}</span></td>
	  <td class="row2"> 
		<input type="radio" name="popup_pm" value="1" {POPUP_PM_YES} />
		<span class="gen">{L_YES}</span>&nbsp;&nbsp; 
		<input type="radio" name="popup_pm" value="0" {POPUP_PM_NO} />
		<span class="gen">{L_NO}</span></td>
	</tr>
	<tr> 
	  <td class="row1"><span class="gen">{L_ALLOWPM}:</span><br /><span class="gensmall">{L_ALLOWPM_E}</span></td>
	  <td class="row2"> 
		<input type="radio" name="allowpm" value="1" {ALLOWPM_YES} />
		<span class="gen">{L_YES}</span>&nbsp;&nbsp; 
		<input type="radio" name="allowpm" value="0" {ALLOWPM_NO} />
		<span class="gen">{L_NO}</span></td>
	</tr>
	<!-- BEGIN switch_gg -->
	<tr> 
	  <td class="row1"><span class="gen">{L_NOTIFY_GG}:</span><br /><span class="gensmall">{L_NOTIFY_GG_E}</span></td>
	  <td class="row2"> 
		<input type="radio" name="user_notify_gg" value="1" {NOTIFY_GG_YES} />
		<span class="gen">{L_YES}</span>&nbsp;&nbsp; 
		<input type="radio" name="user_notify_gg" value="0" {NOTIFY_GG_NO} />
		<span class="gen">{L_NO}</span></td>
	</tr>
	<!-- END switch_gg -->
	<!-- BEGIN switch_ip_login_check -->
	<tr> 
	  <td class="row1"><span class="gen">{L_LOG_IN_CHECK}:</span><br /><span class="gensmall">{L_LOG_IN_CHECK_E}</span></td>
	  <td class="row2"> 
		<input type="radio" name="user_ip_login_check" value="1" {LOG_IN_CHECK_YES} />
		<span class="gen">{L_YES}</span>&nbsp;&nbsp; 
		<input type="radio" name="user_ip_login_check" value="0" {LOG_IN_CHECK_NO} />
		<span class="gen">{L_NO}</span></td>
	</tr>
	<!-- END switch_ip_login_check -->
	<!-- BEGIN bbcode -->
	<tr> 
	  <td class="row1"><span class="gen">{L_ALWAYS_ALLOW_BBCODE}:</span></td>
	  <td class="row2"> 
		<input type="radio" name="allowbbcode" value="1" {ALWAYS_ALLOW_BBCODE_YES} />
		<span class="gen">{L_YES}</span>&nbsp;&nbsp;
		<input type="radio" name="allowbbcode" value="0" {ALWAYS_ALLOW_BBCODE_NO} />
		<span class="gen">{L_NO}</span></td>
	</tr>
	<!-- END bbcode -->
	<!-- BEGIN html -->
	<tr> 
	  <td class="row1"><span class="gen">{L_ALWAYS_ALLOW_HTML}:</span></td>
	  <td class="row2"> 
		<input type="radio" name="allowhtml" value="1" {ALWAYS_ALLOW_HTML_YES} />
		<span class="gen">{L_YES}</span>&nbsp;&nbsp; 
		<input type="radio" name="allowhtml" value="0" {ALWAYS_ALLOW_HTML_NO} />
		<span class="gen">{L_NO}</span></td>
	</tr>
	<!-- END html -->
	<!-- BEGIN smiles -->
	<tr> 
	  <td class="row1"><span class="gen">{L_ALWAYS_ALLOW_SMILIES}:</span></td>
	  <td class="row2"> 
		<input type="radio" name="allowsmilies" value="1" {ALWAYS_ALLOW_SMILIES_YES} />
		<span class="gen">{L_YES}</span>&nbsp;&nbsp; 
		<input type="radio" name="allowsmilies" value="0" {ALWAYS_ALLOW_SMILIES_NO} />
		<span class="gen">{L_NO}</span></td>
	</tr>
	<!-- END smiles -->
	<!-- BEGIN lang -->
	<tr> 
		<td class="row1"><span class="gen">{L_BOARD_LANGUAGE}:</span></td>
		<td class="row2"><span class="gensmall">{LANGUAGE_SELECT}</span></td>
	</tr>
	<!-- END lang -->
	<!-- BEGIN style -->
	<tr> 
		<td class="row1"><span class="gen">{L_BOARD_STYLE}:</span></td>
		<td class="row2"><span class="gensmall">{STYLE_SELECT}</span></td>
	</tr>
	<!-- END style -->
	<!-- BEGIN timezone -->
	<tr> 
	  <td class="row1"><span class="gen">{L_TIMEZONE}:</span></td>
	  <td class="row2"><span class="gensmall">{TIMEZONE_SELECT}</span></td>
	</tr>
	<!-- END timezone -->
	<!-- BEGIN switch_signature_block -->
      <tr>
	      <td class="catBottom" colspan="2" align="center" height="28"><input type="submit" name="submit" value="{L_SUBMIT}" class="mainoption" />&nbsp;&nbsp;<input type="reset" value="{L_RESET}" name="reset" class="liteoption" />
	</td>
      </tr>
</table>

<!-- BEGIN switch_edit_profile -->
<table id="notes" style="display:none" border="0" cellpadding="3" cellspacing="1" width="100%" class="forumline">
      <tr>
	      <th class="thHead" colspan="2" height="25" valign="middle">{L_NOTES_PANEL}</th>
	</tr>
	<tr> 
	      <td class="row1"><textarea style="width: 100%; height: 200px;" name="note" value="{NOTE}">{NOTE}</textarea></td>
	</tr>
      <tr>
	      <td class="catBottom" colspan="2" align="center" height="28"><input type="submit" name="submit" value="{L_SUBMIT}" class="mainoption" />&nbsp;&nbsp;<input type="reset" value="{L_RESET}" name="reset" class="liteoption" />
	</td>
      </tr>
</table>
<!-- END switch_edit_profile -->

<!-- BEGIN switch_avatar_block -->
<table id="avatarinfo" style="display:none" border="0" cellpadding="3" cellspacing="1" width="100%" class="forumline">
	<tr> 
	  <th class="thSides" colspan="2" height="12" valign="middle"><span class="gensmall2">Panel kontrolny Avatar�w</span></th>
	</tr>
	<tr> 
		<td class="row2" colspan="2">{L_AVATAR_EXPLAIN}</td>
	</tr>
	<!-- BEGIN switch_avatar_local_upload -->
	<tr> 
		<td class="row1"><span class="gen">{L_UPLOAD_AVATAR_FILE}:</span></td>
		<td class="row2"><!--<input type="hidden" name="MAX_FILE_SIZE" value="{AVATAR_SIZE}" />-->
		<input type="file" name="avatar" class="post" onFocus="Active(this)" onBlur="NotActive(this)" style="width:200px" /></td>
	</tr>
	<!-- END switch_avatar_local_upload -->
	<!-- BEGIN switch_avatar_remote_upload -->
	<tr> 
		<td class="row1"><span class="gen">{L_UPLOAD_AVATAR_URL}:</span><br /><span class="gensmall">{L_UPLOAD_AVATAR_URL_EXPLAIN}</span></td>
		<td class="row2"><input type="text" name="avatarurl" size="40" class="post" onFocus="Active(this)" onBlur="NotActive(this)" style="width:200px" /></td>
	</tr>
	<!-- END switch_avatar_remote_upload -->
	<!-- BEGIN switch_avatar_remote_link -->
	<tr> 
		<td class="row1"><span class="gen">{L_LINK_REMOTE_AVATAR}:</span><br /><span class="gensmall">{L_LINK_REMOTE_AVATAR_EXPLAIN}</span></td>
		<td class="row2"><input type="text" name="avatarremoteurl" size="40" class="post" onFocus="Active(this)" onBlur="NotActive(this)" style="width:200px" /></td>
	</tr>
	<!-- END switch_avatar_remote_link -->
	<!-- BEGIN switch_avatar_local_gallery -->
	<tr> 
		<td class="row1"><span class="gen">{L_AVATAR_GALLERY}:</span></td>
		<td class="row2"><input type="submit" name="avatargallery" value="{L_SHOW_GALLERY}" class="liteoption" /></td>
	</tr>
	<!-- END switch_avatar_local_gallery -->
	<tr>
		<td class="catBottom" colspan="2" align="center" height="22">{S_HIDDEN_FIELDS}{S_ANTIBOT_FIELDS}<input type="submit" name="submit" value="{L_SUBMIT}" class="mainoption" />&nbsp;&nbsp;<input type="reset" value="{L_RESET}" name="reset" class="liteoption" /></td>
	</tr>
</table>
<!-- END switch_avatar_block -->
</td>
</tr>
</table>
{S_HIDDEN_FIELDS}
</form>
