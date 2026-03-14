   {ROTATE_BANNER_4}
   <div align="center"><span class="copyright"><br />
   {CLICK_HERE_TO_VIEW}</span></div><div align="center"><b>Kopiowanie wszelkich tre¶ci zawartych na forum, modyfikacji oraz instrukcji bez zgody administracji i autorów tematów/postów zabronione!</b></div>
   <table width="100%" border="0" class="footer">
	<tr>
		<td align="left"><span class="gensmall" style="position:relative; left: 5px; top: 1px;">{PAGE_LOAD_PLEASE_WAIT}<br />Theme <strong>ApartDark</strong> created by d!r3k modified by <a href="http://www.mario14125.wordpress.com/" title="¦wiat Mario14125">Mario14125</a></span></td>
		<td align="right"><span style="position:relative; right: 5px; top: 4px;">{GENERATE_TIME}</span></td>
	</tr>
   </table>
   <center>{BANNER_BOTTOM}</center></td></tr></table>{LOADING_FOOTER}
<!-- BEGIN forum_thin -->
</td>
</tr>
</table>
</td>
</tr>
</table>
<!-- END forum_thin -->
{ROTATE_BANNER_5}
<!-- BEGIN advert -->
	</td>
		<td><img src="images/spacer.gif" border="0" height="1" width="2" alt=""></td>
		<td valign="top" width="{advert.ADVERT_WIDTH}" nowrap="nowrap" height="100%" class="bodyline">
			<table width="100%" cellspacing="0" cellpadding="2" border="0" style="height: 100%;">
				<tr>
					<td valign="top" width="100%" height="100%">{advert.ADVERT}</td>
				</tr>
			</table>
		</td>
		<!-- BEGIN advert_forum_thin -->
		<td width="100%"><img src="images/spacer.gif" border="0" height="1" width="100%" alt=""></td>
		<!-- END advert_forum_thin -->
	</tr>
</table>
<!-- END advert -->
<!-- BEGIN pagina_pages -->
<div id="s_pagina" style="display: none; background: {T_TR_COLOR1}; border: solid {T_TR_COLOR3} 1px; width: 50px; height: 37px; position: absolute; filter: alpha(opacity=90); -moz-opacity: 0.90;" >
	<table align="center" cellspacing="0">
		<tr>
			<td align="right" valign="top">
				<div style="display: inline; font-size: 8px; width: 10px; height: 6px; cursor: pointer; margin: 0px;" align="right" onclick="document.getElementById('s_pagina').style.display='none';"><b>X</b></div>
			</td>
		</tr>
		<tr>
			<td align="center">
				<form action="{BASE_URL}" method="post"><select name="start" onchange="this.form.submit();">{pagina_pages.OPTIONS}</select></form>
			</td>
		</tr>
	</table>
</div>
<!-- END pagina_pages -->
</body>
</html>
