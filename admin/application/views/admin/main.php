
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>main</title>
<base target="_self">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>skin/css/base.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>skin/css/main.css" />
</head>
<body leftmargin="8" topmargin='8'>
<table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><div style='float:left'> <img height="14" src="<?php echo base_url()?>skin/images/frame/book1.gif" width="20" />&nbsp;欢迎使用地图管理系统。 </div>
      <div style='float:right;padding-right:8px;'>
        <!--  //保留接口  -->
      </div></td>
  </tr>
  <tr>
    <td height="1" background="<?php echo base_url()?>skin/images/frame/sp_bg.gif" style='padding:0px'></td>
  </tr>
</table>

<table width="98%" align="center" border="0" cellpadding="4" cellspacing="1" bgcolor="#CBD8AC" style="margin-bottom:8px">
  <tr bgcolor="#EEF4EA">
    <td colspan="2" background="<?php echo base_url()?>skin/images/frame/wbg.gif" class='title'><span>系统基本信息</span></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td width="25%" bgcolor="#FFFFFF">使用环境：</td>
    <td width="75%" bgcolor="#FFFFFF"><?php echo PHP_OS;?></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td>WEB服务器版本：</td>
    <td><?php echo $_SERVER['SERVER_SOFTWARE'];?></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td>php版本</td>
    <td><?php echo PHP_VERSION;?></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td>MYSQL版本</td>
    <td><?php echo mysql_get_server_info();?></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td>图片上传目录</td>
    <td><?php 
	if(is_writable("./upload")){echo "可写";}else {echo "<span style='color:red'>不可写</span>";}
	?></td>
  </tr>

</table>
</body>
</html>