<div align="center">
<div id="nav_back">
<table cellpadding="0" cellspacing="0" border="0" align="center">
   <tr>

     <td><img src="templates/ApartDark/images/nav_div.png" alt="" /></td>
     <td class="h_nav"><a href="{U_INDEX_PORTAL}">{L_INDEX_PORTAL}</a></td>
     <td><img src="templates/ApartDark/images/nav_div.png" alt="" /></td>
     <td class="h_nav"><a href="{U_FAQ}">{L_FAQ}</a></td>
     <td><img src="templates/ApartDark/images/nav_div.png" alt="" /></td>
     <td class="h_nav"><a href="{U_SEARCH}">{L_SEARCH}</a></td>
     <td><img src="templates/ApartDark/images/nav_div.png" alt="" /></td>
     <td class="h_nav"><a href="{U_MEMBERLIST}">{L_MEMBERLIST}</a></td>
     <td><img src="templates/ApartDark/images/nav_div.png" alt="" /></td>
     <td class="h_nav"><a href="{U_GROUP_CP}">{L_USERGROUPS}</a></td>
     <td><img src="templates/ApartDark/images/nav_div.png" alt="" /></td>
     <td class="h_nav"><a href="{U_STAT}">{L_STATISTICS}</a></td>
     <td><img src="templates/ApartDark/images/nav_div.png" alt="" /></td>
     <td class="h_nav"><a href="{U_PROFILE}">{L_PROFILE}</a></td>
	 <!-- BEGIN switch_user_logged_out -->
	 <td><img src="templates/ApartDark/images/nav_div.png" alt="" /></td>
     <td class="h_nav"><a href="{U_REGISTER}">{L_REGISTER}</a></td>
	 <!-- END switch_user_logged_out -->
	 <td><img src="templates/ApartDark/images/nav_div.png" alt="" /></td>
     <td class="h_nav"><a href="{U_PRIVATEMSGS}">{PRIVATE_MESSAGE_INFO}</a></td>
	 <td><img src="templates/ApartDark/images/nav_div.png" alt="" /></td>
	 <td class="h_nav"><a href="{U_LOGIN_LOGOUT}">{L_LOGIN_LOGOUT}</a></td>
	 <td><img src="templates/ApartDark/images/nav_div.png" alt="" /></td>
   </tr>

</table>
</div>
<div id="nav_btm"></div><br />
<table width="850px" cellspacing="0" cellpadding="7" border="0" align="center">
   <tr>
      <td class="bodyline">
         <table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
            <tr>
               <td align="center"><div id="top"></div></td>
            </tr>
         </table>
<table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
   <tr>
      {BEGIN_LEFT_PANEL_OFF}
      <td valign="top" width="200">
         <table width="100%" cellspacing="1" cellpadding="1" border="0" align="left">
            <tr>
               <td>
                  {module1}
                  {module2}
                  {module3}
                  {module4}
                  {module5}
                  {module6}
                  {module7}
                  {module8}
                  {module9}
                  {module10}
                  {module11}
                  {module12}
               </td>
            </tr>
         </table>
      </td>
      {END_LEFT_PANEL_OFF}
      <td valign="top">
         {BEGIN_NEWS}
         <table width="99%" cellspacing="1" cellpadding="1" border="0" align="center">
               <tr>
               <td>
                  {NEWS_HEADER}
                  <!-- BEGIN fetchpost_row -->
                  <table width="100%" cellpadding="2" cellspacing="1" border="0" class="forumline">
                     <tr>
                        <td class="catHead" height="25"><span class="genmed"><b>{fetchpost_row.TITLE}</b></span></td>
                     </tr>
                     <tr>
                        <td class="row2" align="left" height="24"><span class="gensmall">{L_POSTED}: <b>{fetchpost_row.POSTER}</b> @ {fetchpost_row.TIME}</span></td>
                     </tr>
                     <tr>
			<td class="row1" align="left"><span class="gensmall" style="line-height:150%">
				<!-- BEGIN image -->
				<div  style="float:left; border: 1px {T_TR_COLOR3} solid; margin:5px">{fetchpost_row.image.IMAGE}</div>
				<!-- END image -->
				{fetchpost_row.TEXT}<br><br>
				{fetchpost_row.OPEN}<a href="{fetchpost_row.U_READ_FULL}">{fetchpost_row.L_READ_FULL}</a>{fetchpost_row.CLOSE}
			</span></td>
                     </tr>
                     <tr>
                        <td class="row3" align="left" height="24"><span class="gensmall">{L_COMMENTS}: {fetchpost_row.REPLIES} :: <a href="{fetchpost_row.U_VIEW_COMMENTS}">{L_VIEW_COMMENTS}</a> (<a href="{fetchpost_row.U_POST_COMMENT}">{L_POST_COMMENT}</a>)</span></td>
                     </tr>
                  </table>
                  <font size="1"><br></font>
                  <!-- END fetch_post_row -->
               </td>
            </tr>
         </table>
         {END_NEWS}
         <table width="99%" cellspacing="1" cellpadding="1" border="0" align="center">
               <tr>
               <td>
		{OWN_BODY}
               </td>
            </tr>
         </table>
      </td>
      {BEGIN_RIGHT_PANEL_OFF}
      <td valign="top" width="200">
         <table width="100%" cellspacing="1" cellpadding="1" border="0" align="right">
            <tr>
               <td>
                  {module13}
                  {module14}
                  {module15}
                  {module16}
                  {module17}
                  {module18}
                  {module19}
                  {module20}
                  {module21}
                  {module22}
                  {module23}
                  {module24}
               </td>
            </tr>
         </table>
      </td>
     {END_RIGHT_PANEL_OFF}
   </tr>
</table>