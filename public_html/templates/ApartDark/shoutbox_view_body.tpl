<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<head>
 <meta http-equiv="Content-Type" content="text/html; charset={S_CONTENT_ENCODING}">
 <meta http-equiv="Content-Style-Type" content="text/css">
 <title>Czat</title>
 <link rel="stylesheet" href="templates/ApartDark/{T_HEAD_STYLESHEET}" type="text/css">
</head>
<body bgcolor="#E5E5E5" text="#000000" link="#006699" vlink="#5493B4" onload="window.scrollTo(0,99999);" style="padding: 0px; margin: 0px;">
<table width="100%" cellpadding="3" cellspacing="1" border="0" class="forumline">
{SYSTEM_PM}
<!-- BEGIN shoutrow -->
	<tr>
		<td class="row1" width="100" align="right" style="padding: 3px; padding-right: 10px">{shoutrow.NAME}</td>
		<td class="row1" style="font-size: 10px">{shoutrow.MSG}</td>
		<td class="row1" style="font-size: 9px;" width="90" align="center">{shoutrow.DATE}<br />&nbsp;{shoutrow.EDITMSG}&nbsp;{shoutrow.DELMSG}&nbsp;</td>
	</tr>
<!-- END shoutrow -->
</table>
<script language="JavaScript" type="text/javascript"> 
<!-- 
    if (window.parent && window.parent.document && window.parent.document.post) 
        window.parent.document.post.message.value = ''; 
//--> 
</script> 
</body>
</html>