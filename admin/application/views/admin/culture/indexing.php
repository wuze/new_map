<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>索引分类列表</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>skin/css/base.css">

</head>
<body leftmargin="8" topmargin="8" background='<?php echo base_url()?>skin/images/allbg.gif'>


<table width="98%" border="0" cellpadding="2" cellspacing="1" bgcolor="#D1DDAA" align="center" style="margin-top:8px">
<tr bgcolor="#E7E7E7">
	<td height="24" colspan="7" background="skin/images/tbg.gif">&nbsp;传统文化信息&nbsp;</td>
</tr>
<tr align="center" bgcolor="#FAFAF1" height="22">
	<td width="20%">名称</td>
	<td width="15%">图片</td>
	<td width="20%">地址</td>
	<td width="10%">电话</td>
	<td width="15%">网址</td>
	<td width="8%">邮编</td>
	<td width="20%">操作</td>
</tr>
<?php foreach($res as $key) {?>
<tr align='center' bgcolor="#FFFFFF" onMouseMove="javascript:this.bgColor='#FCFDEE';" onMouseOut="javascript:this.bgColor='#FFFFFF';" height="22" >
	<td><?php echo $key->addr_name;?></td>
	<td><img src="<?php echo '/'.$key->img_url;?>" height="50px" width="70px"></td>
	<td><?php echo $key->address;?></td>
	<td><?php echo $key->telephone;?></td>
	<td><?php echo $key->web_url;?></td>
	<td><?php echo $key->zipcode;?></td>
	<td><?php echo anchor('admin_login/culture/edit_indexing/'.$key->id,"编辑");?>  |<?php echo anchor('admin_login/culture/detail/'.$key->id,"详情");?>| <?php echo anchor('admin_login/culture/del_traditional/'.$key->id,"删除","onclick =  \"return confirm('删除将连详情的图片一并删除,确定删除吗?')\"");?></td>
</tr>
<?php }?>

<tr align="right" bgcolor="#EEF4EA">
	<td height="36" colspan="7" align="center"><?php echo $links?> 共<?php echo $total_rows?>条信息 每页<?php echo $per_page?>条信息</td>
</tr>
</table>

</form>

<!--  搜索表单  -->
</body>
</html>