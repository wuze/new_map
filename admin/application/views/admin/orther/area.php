<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>�����б�</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>skin/css/base.css">

</head>
<body leftmargin="8" topmargin="8" background='<?php echo base_url()?>skin/images/allbg.gif'>
<button onclick="window.location.href='<?php echo base_url();?>index.php/admin_login/main/add_area'">��ӵ���</button>

<table width="98%" border="0" cellpadding="2" cellspacing="1" bgcolor="#D1DDAA" align="center" style="margin-top:8px">
<tr bgcolor="#E7E7E7">
	<td height="24" colspan="7" background="skin/images/tbg.gif">&nbsp;�����б�&nbsp;</td>
</tr>
<tr align="center" bgcolor="#FAFAF1" height="22">
	<td width="20%">����</td>
	<td width="20%">����</td>
	<td width="18%">����ʱ��</td>
	<td width="20%">����</td>
</tr>
<?php foreach($res as $key) {
	$sql_second = "select * from map_area where parentid = $key->id";
	$result = $this->db->query($sql_second);
	$sub_cate_num = $result->num_rows();
	$result_sencond = $result->result();
	$key->sub_cate=$result_sencond;
?>
<tr align='center' bgcolor="#FFFFFF" onMouseMove="javascript:this.bgColor='#FCFDEE';" onMouseOut="javascript:this.bgColor='#FFFFFF';" height="22" >
	<td align="left" colspan='2'><?php echo $key->name;?></td>
	<td><?php echo $key->createtime;?></td>
	<td><?php echo anchor('admin_login/main/add_area/'.$key->id,"�������");?>  <?php if(!$sub_cate_num){echo " | ".anchor('admin_login/main/del_area/'.$key->id,"ɾ��","onclick =  \"return confirm('ȷ��ɾ����?')\"");}?></td>
</tr>
<?php foreach($key->sub_cate as $sencond_cate) {?>
	<tr align='center' bgcolor="#FFFFFF" onMouseMove="javascript:this.bgColor='#FCFDEE';" onMouseOut="javascript:this.bgColor='#FFFFFF';" height="22" >
	<td></td>
	<td align="left"><?php echo $sencond_cate->name;?></td>
	<td><?php echo $sencond_cate->createtime;?></td>
	<td><?php echo anchor('admin_login/main/del_area/'.$sencond_cate->id,"ɾ��","onclick =  \"return confirm('ȷ��ɾ����?')\"");?></td>
</tr>
	<?php }?>
<?php }?>

<tr align="right" bgcolor="#EEF4EA">
	<td height="36" colspan="7" align="center"><?php echo $links?> ��<?php echo $total_rows?>����Ϣ ÿҳ<?php echo $per_page?>����Ϣ</td>
</tr>
</table>

</form>

<!--  ������  -->
</body>
</html>