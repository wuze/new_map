<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>传统分类列表</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>skin/css/base.css">

</head>
<body leftmargin="8" topmargin="8" background='<?php echo base_url()?>skin/images/allbg.gif'>


<table width="98%" border="0" cellpadding="2" cellspacing="1" bgcolor="#D1DDAA" align="center" style="margin-top:8px">
<tr bgcolor="#E7E7E7">
	<td height="24" colspan="7" background="skin/images/tbg.gif">&nbsp;传统分类列表&nbsp;</td>
</tr>
<tr align="center" bgcolor="#FAFAF1" height="22">
	<td width="20%">一级分类</td>
	<td width="20%">二级分类</td>
	<td width="18%">创建时间</td>
	<td width="20%">操作</td>
</tr>
<?php foreach($res as $key) {
	$sql_second = "select * from map_category where parentid = $key->id";
	$result = $this->db->query($sql_second);
	$sub_cate_num = $result->num_rows();
	$result_sencond = $result->result();
	$key->sub_cate=$result_sencond;
?>
<tr align='center' bgcolor="#FFFFFF" onMouseMove="javascript:this.bgColor='#FCFDEE';" onMouseOut="javascript:this.bgColor='#FFFFFF';" height="22" >
	<td align="left" colspan='2'><?php echo $key->catname;?></td>
	<td><?php echo $key->create_time;?></td>
	<td><?php echo anchor('admin_login/category/add_traditional/'.$key->id,"添加子分类");?> | <?php echo anchor('admin_login/category/edit_traditional/'.$key->id,"修改");?>  <?php if(!$sub_cate_num){echo " | ".anchor('admin_login/category/del_traditional/'.$key->id,"删除","onclick =  \"return confirm('确定删除吗?')\"");}?></td>
</tr>
<?php foreach($key->sub_cate as $sencond_cate) {?>
	<tr align='center' bgcolor="#FFFFFF" onMouseMove="javascript:this.bgColor='#FCFDEE';" onMouseOut="javascript:this.bgColor='#FFFFFF';" height="22" >
	<td></td>
	<td align="left"><?php echo $sencond_cate->catname;?></td>
	<td><?php echo $sencond_cate->create_time;?></td>
	<td><?php echo anchor('admin_login/category/edit_traditional/'.$sencond_cate->id,"修改");?> | <?php echo anchor('admin_login/category/del_traditional/'.$sencond_cate->id,"删除","onclick =  \"return confirm('确定删除吗?')\"");?></td>
</tr>
	<?php }?>
<?php }?>

<tr align="right" bgcolor="#EEF4EA">
	<td height="36" colspan="7" align="center"><?php echo $links?> 共<?php echo $total_rows?>条信息 每页<?php echo $per_page?>条信息</td>
</tr>
</table>

</form>

<!--  搜索表单  -->
</body>
</html>