
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
    <td><div style='float:left'> <img height="14" src="<?php echo base_url()?>skin/images/frame/book1.gif" width="20" />&nbsp;��ӭʹ�õ�ͼ����ϵͳ�� </div>
      <div style='float:right;padding-right:8px;'>
        <!--  //�����ӿ�  -->
      </div></td>
  </tr>
  <tr>
    <td height="1" background="<?php echo base_url()?>skin/images/frame/sp_bg.gif" style='padding:0px'></td>
  </tr>
</table>

<table width="98%" align="center" border="0" cellpadding="4" cellspacing="1" bgcolor="#CBD8AC" style="margin-bottom:8px">
  <tr bgcolor="#EEF4EA">
    <td colspan="2" background="<?php echo base_url()?>skin/images/frame/wbg.gif" class='title'><span>ϵͳ������Ϣ</span></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td width="25%" bgcolor="#FFFFFF">ʹ�û�����</td>
    <td width="75%" bgcolor="#FFFFFF"><?php echo PHP_OS;?></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td>WEB�������汾��</td>
    <td><?php echo $_SERVER['SERVER_SOFTWARE'];?></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td>php�汾</td>
    <td><?php echo PHP_VERSION;?></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td>MYSQL�汾</td>
    <td><?php echo mysql_get_server_info();?></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td>ͼƬ�ϴ�Ŀ¼</td>
    <td><?php 
	if(is_writable("./upload")){echo "��д";}else {echo "<span style='color:red'>����д</span>";}
	?></td>
  </tr>

</table>
</body>
</html>