<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>���������б�</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>skin/css/base.css">

</head>
<body leftmargin="8" topmargin="8" background='<?php echo base_url()?>skin/images/allbg.gif'>


<table width="98%" border="0" cellpadding="2" cellspacing="1" bgcolor="#D1DDAA" align="center" style="margin-top:8px">
<tr bgcolor="#E7E7E7">
	<td height="24" colspan="7" background="skin/images/tbg.gif">&nbsp;��ͳ�Ļ���Ϣ&nbsp;</td>
</tr>
<tr align="center" bgcolor="#FAFAF1" height="22">
	<td width="20%">����</td>
	<td width="15%">ͼƬ</td>
	<td width="20%">��ַ</td>
	<td width="10%">�绰</td>
	<td width="15%">��ַ</td>
	<td width="8%">�ʱ�</td>
	<td width="20%">����</td>
</tr>
<?php foreach($res as $key) {?>
<tr align='center' bgcolor="#FFFFFF" onMouseMove="javascript:this.bgColor='#FCFDEE';" onMouseOut="javascript:this.bgColor='#FFFFFF';" height="22" >
	<td><?php echo $key->addr_name;?></td>
	<td><img src="<?php echo '/'.$key->img_url;?>" height="50px" width="70px"></td>
	<td><?php echo $key->address;?></td>
	<td><?php echo $key->telephone;?></td>
	<td><?php echo $key->web_url;?></td>
	<td><?php echo $key->zipcode;?></td>
	<td><?php echo anchor('admin_login/culture/edit_indexing/'.$key->id,"�༭");?>  |<?php echo anchor('admin_login/culture/detail/'.$key->id,"����");?>| <?php echo anchor('admin_login/culture/del_traditional/'.$key->id,"ɾ��","onclick =  \"return confirm('ɾ�����������ͼƬһ��ɾ��,ȷ��ɾ����?')\"");?></td>
</tr>
<?php }?>

<tr align="right" bgcolor="#EEF4EA">
	<td height="36" colspan="7" align="center"><?php echo $links?> ��<?php echo $total_rows?>����Ϣ ÿҳ<?php echo $per_page?>����Ϣ</td>
</tr>
</table>

</form>

<!--  ������  -->
</body>
</html>