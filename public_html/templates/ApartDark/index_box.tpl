				<!-- BEGIN catrow -->
				<!-- BEGIN tablehead -->
				<!-- BEGIN br -->
				<div id="hc_{catrow.tablehead.br.CAT_ID}" style="display: ''; position: relative;">
				<!-- END br -->
				<table width="100%" cellpadding="2" cellspacing="1" border="0" class="forumline">
				<tr>
					<th colspan="5" align="center" width="100%" nowrap="nowrap"<!-- BEGIN br --> onclick="javascript:ShowHide('hc_{catrow.tablehead.CAT_ID}','hc2_{catrow.tablehead.CAT_ID}','hc3_{catrow.tablehead.CAT_ID}');" style="cursor: pointer" title="{L_VHIDE}"<!-- END br -->><span class="poz">&nbsp;{catrow.tablehead.L_FORUM}&nbsp;</span></th>
				</tr>
				<!-- END tablehead -->
				<!-- BEGIN cathead -->
				<tr>
					<!-- BEGIN inc -->
					<td width="46" class="{catrow.cathead.inc.INC_CLASS}"><img src="{SPACER}" width="46" height="0"></td>
					<!-- END inc -->
					<td class="{catrow.cathead.CLASS_CAT}" width="100%" colspan="{catrow.cathead.INC_SPAN}"><span class="poz"><a href="{catrow.cathead.U_VIEWCAT}" class="cattitle">{catrow.cathead.CAT_TITLE}</a></span></td>
					<td class="{catrow.cathead.CLASS_CAT}" colspan="1" align="center"><span class="cattitle">&nbsp;{L_STATISTICS}&nbsp;</span></td>
					<td class="{catrow.cathead.CLASS_CAT}" colspan="2" align="center"><span class="cattitle">&nbsp;{L_LASTPOST}&nbsp;</span></td>
				</tr>
				<!-- END cathead -->
				<!-- BEGIN cattitle -->
				<tr>
					<!-- BEGIN inc -->
					<td width="46" class="{catrow.cattitle.inc.INC_CLASS}"><img src="{SPACER}" width="46" height="0"></td>
					<!-- END inc -->
					<td class="row3" colspan="{catrow.cattitle.INC_SPAN_ALL}"><span class="gensmall">{catrow.cattitle.CAT_DESCRIPTION}</span></td>
				</tr>
				<!-- END cattitle -->
				<!-- BEGIN forumrow -->
				<tr>
					<!-- BEGIN inc -->
					<td width="46" class="{catrow.forumrow.inc.INC_CLASS}"><img src="{SPACER}" width="46" height="0"></td>
					<!-- END inc -->
					<td class="{catrow.forumrow.INC_CLASS}" align="center" valign="middle" height="50"><img src="{catrow.forumrow.FORUM_FOLDER_IMG}" alt="" title="{catrow.forumrow.L_FORUM_FOLDER_ALT}"></td>
					<td class="row1" width="100%" height="50" colspan="{catrow.forumrow.INC_SPAN}">
						<span class="forumlink"><a href="{catrow.forumrow.U_VIEWFORUM}" class="forumlink"{catrow.forumrow.FORUM_COLOR}>{catrow.forumrow.FORUM_NAME}</a></span><br />
						<span class="genmed">{catrow.forumrow.FORUM_DESC}<br></span>
						<span class="gensmall">
							{catrow.forumrow.L_MODERATOR} - [ {catrow.forumrow.MODERATORS} ]
							<!-- BEGIN links -->
							{catrow.forumrow.links.L_LINKS} {catrow.forumrow.links.LINKS}
							<!-- END links -->
						</span></td>
					<!-- BEGIN forum_link_no -->
					<td class="row2" align="center" valign="middle" nowrap="nowrap" width="110px" height="50"><span class="gensmall">{L_TOPICS}: <b>{catrow.forumrow.TOPICS}</b><br />{L_POSTS}: <b>{catrow.forumrow.POSTS}</b></span></td>
					<td class="row2" align="left" valign="middle" nowrap="nowrap" colspan="2" width="210px" height="50"><span class="gensmall">{catrow.forumrow.LAST_POSTMSG}<br />{catrow.forumrow.LAST_POST}{catrow.forumrow.NUM_NEW_TOPICS}{catrow.forumrow.NUM_NEW_POSTS}</span></td>
					<!-- END forum_link_no -->
					<!-- BEGIN forum_link -->
					<td class="row2" align="center" valign="middle" height="50" colspan="3"><span class="gensmall">{catrow.forumrow.forum_link.HIT_COUNT}</span></td>
					<!-- END forum_link -->
				</tr>
				<!-- END forumrow -->
				<!-- BEGIN catfoot -->
				<!-- BEGIN inc -->
				<!-- END inc -->
				<!-- END catfoot -->
				<!-- BEGIN tablefoot -->
				</table>
				<!-- BEGIN br_bottom -->
				</div>
				<div id="hc2_{catrow.tablefoot.br_bottom.CAT_ID}" style="display: none; position: relative;">
				<table width="100%" cellpadding="2" cellspacing="1" border="0" class="forumline">
					<tr>
						<th width="100%" align="center" nowrap="nowrap" onclick="javascript:ShowHide('hc_{catrow.tablefoot.br_bottom.CAT_ID}','hc2_{catrow.tablefoot.br_bottom.CAT_ID}','hc3_{catrow.tablefoot.br_bottom.CAT_ID}');" style="cursor: pointer;"><span class="poz">&nbsp;{catrow.tablefoot.br_bottom.CAT_TITLE}&nbsp;</span></th>
					</tr>
				</table>
				</div>
				<script language="javascript" type="text/javascript">
				<!--
				if(GetCookie('hc3_{catrow.tablefoot.br_bottom.CAT_ID}') == '2') ShowHide('hc_{catrow.tablefoot.br_bottom.CAT_ID}', 'hc2_{catrow.tablefoot.br_bottom.CAT_ID}', 'hc3_{catrow.tablefoot.br_bottom.CAT_ID}');
				//-->
				</script>
				{catrow.tablefoot.br_bottom.BR}
				<!-- END br_bottom -->
				<!-- END tablefoot -->
				<!-- END catrow -->
