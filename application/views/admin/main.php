
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
    <td><div style='float:left'> <img height="14" src="<?php echo base_url()?>skin/images/frame/book1.gif" width="20" />&nbsp;��ӭʹ�����ݹ���ϵͳ����վ����ѡ���ߡ� </div>
      <div style='float:right;padding-right:8px;'>
        <!--  //�����ӿ�  -->
      </div></td>
  </tr>
  <tr>
    <td height="1" background="<?php echo base_url()?>skin/images/frame/sp_bg.gif" style='padding:0px'></td>
  </tr>
</table>
<table width="98%" align="center" border="0" cellpadding="3" cellspacing="1" bgcolor="#CBD8AC" style="margin-bottom:8px;margin-top:8px;">
  <tr>
    <td background="<?php echo base_url()?>skin/images/frame/wbg.gif" bgcolor="#EEF4EA" class='title'><span>��Ϣ</span></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td>&nbsp;</td>
  </tr>
</table>
<table width="98%" align="center" border="0" cellpadding="4" cellspacing="1" bgcolor="#CBD8AC" style="margin-bottom:8px">
  <tr>
    <td colspan="2" background="<?php echo base_url()?>skin/images/frame/wbg.gif" bgcolor="#EEF4EA" class='title'>
    	<div style='float:left'><span>��ݲ���</span></div>
    	<div style='float:right;padding-right:10px;'></div>
   </td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td height="30" colspan="2" align="center" valign="bottom"><table width="100%" border="0" cellspacing="1" cellpadding="1">
        <tr>
          <td width="15%" height="31" align="center"><img src="<?php echo base_url()?>skin/images/frame/qc.gif" width="90" height="30" /></td>
          <td width="85%" valign="bottom"><div class='icoitem'>
              <div class='ico'><img src='<?php echo base_url()?>skin/images/frame/addnews.gif' width='16' height='16' /></div>
              <div class='txt'><a href=''><u>�ĵ��б�</u></a></div>
            </div>
            <div class='icoitem'>
              <div class='ico'><img src='<?php echo base_url()?>skin/images/frame/menuarrow.gif' width='16' height='16' /></div>
              <div class='txt'><a href=''><u>���۹���</u></a></div>
            </div>
            <div class='icoitem'>
              <div class='ico'><img src='<?php echo base_url()?>skin/images/frame/manage1.gif' width='16' height='16' /></div>
              <div class='txt'><a href=''><u>���ݷ���</u></a></div>
            </div>
            <div class='icoitem'>
              <div class='ico'><img src='<?php echo base_url()?>skin/images/frame/file_dir.gif' width='16' height='16' /></div>
              <div class='txt'><a href=''><u>��Ŀ����</u></a></div>
            </div>
            <div class='icoitem'>
              <div class='ico'><img src='<?php echo base_url()?>skin/images/frame/part-index.gif' width='16' height='16' /></div>
              <div class='txt'><a href=''><u>����ϵͳ����</u></a></div>
            </div>
            <div class='icoitem'>
              <div class='ico'><img src='<?php echo base_url()?>skin/images/frame/manage1.gif' width='16' height='16' /></div>
              <div class='txt'><a href=''><u>�޸�ϵͳ����</u></a></div>
            </div></td>
        </tr>
      </table></td>
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
    <td>��Ʒ����ͼĿ¼</td>
    <td><?php 
	if(is_writable("./cphoto")){echo "��д";}else {echo "<span style='color:red'>����д</span>";}
	?></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td>�༭���ϴ�Ŀ¼</td>
    <td><?php if(is_writable("./js/kindeditor/attached")){echo "��д";}else {echo "<span style='color:red'>����д</span>";}?></td>
  </tr>
</table>
<table width="98%" align="center" border="0" cellpadding="4" cellspacing="1" bgcolor="#CBD8AC">
  <tr bgcolor="#EEF4EA">
    <td colspan="2" background="<?php echo base_url()?>skin/images/frame/wbg.gif" class='title'><span>ʹ�ð���</span></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td height="32">����ǿƼ���</td>
    <td><a href="http://www.5jstar.net" target="_blank"><u>http://www.5jstar.net</u></a></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td height="32">��ַ:</td>
    <td>����������3��Ԫ606</td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td width="25%" height="32">�ͷ���</td>
    <td width="75%">QQ:  Tel:  Email:</td>
  </tr>
</table>
</body>
</html>