<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title> 登录</title>
<style>
body {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	line-height:20px;
	margin: 0;
	padding: 0;
	letter-spacing:1px;
	background:#BCCD6F; 
	overflow:hidden;
}
td {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	line-height:20px;
}
a:link,
a:visited
 {
	text-decoration: none;
	color: #ffffff;
}
a:hover {
	text-decoration: underline;
	color: #2582A4;
}
input{
	height:18px;
	background:none; 
	border:none;
	color: #ffffff;
	font-size: 12px;
	border-bottom: solid 1px; 
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
.button{
	height:23px;
	background:none; 
	border: #ffffff solid 1px;
	color: #ffffff;
	font-size: 12px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	padding-top:3px;
	padding-bottom:2px;
	padding-left:2px;
}

.index_font{
	color: #ffffff;
}


</style>
</head>
<body onLoad="javascript:document.myform.name.focus();">
<table width="100%" height="340"  border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td height="335" align="center" valign="bottom" background="lz_system/view/blue/login/indextop.jpg"><table width="700" border="0" height="80" cellpadding="0" cellspacing="0">
      <tr>
        <td align="left"><span style="font-size:30px;font-weight:bold;color:#fff;line-height:30px;font-family:simhei;">电子科技大学学报自然版网站管理后台</span></td>
      </tr>
    </table></td>
  </tr>
</table>
<table width="100%"  border="0" cellpadding="0">
  <tr>
    <td height="62" align="center" valign="top"><table width="700" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td height="50" align="left" valign="bottom">
		    <table width="644" height="22" border="0" cellpadding="0" cellspacing="0">
        <form name="myform" method="post" action="index.php?p=login&module=admin&m=login" >
		<tr>
          <td width="21">&nbsp;</td>
          <td width="223" class="index_font"> 用户名:
			  <input name="name" type="text" size="15" value=""></td>
          <td width="230" class="index_font"> 密码:
              <input name="password" type="password" size="15" value=""></td>
          <td width="170">
		  <input type="submit" name="dosubmit" value=" 登录" class="button"> 
		  </td>
        </tr>
		</form>
    </table>		</td>
      </tr>
      <tr>
        <td height="100" align="right" valign="bottom" class="index_font">Copyright &copy; <a href="http://www.longbill.cn" target="_blank">Longbill</a></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>