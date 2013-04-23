<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>友情链接列表</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>skin/css/base.css">

</head>
<body leftmargin="8" topmargin="8" background='<?php echo base_url()?>skin/images/allbg.gif'>
	<button onclick="window.location.href='<?php echo base_url();?>index.php/admin_login/main/add_friends'">添加友情链接</button>

<table width="98%" border="0" cellpadding="2" cellspacing="1" bgcolor="#D1DDAA" align="center" style="margin-top:8px">
<tr bgcolor="#E7E7E7">
	<td height="24" colspan="7" background="skin/images/tbg.gif">&nbsp;友情链接列表&nbsp;</td>
</tr>
<tr align="center" bgcolor="#FAFAF1" height="22">
	<td width="20%">网站名称</td>
	<td width="20%">网站网址</td>
	<td width="20%">操作</td>
</tr>
<?php foreach($res as $key) {?>
<tr align='center' bgcolor="#FFFFFF" onMouseMove="javascript:this.bgColor='#FCFDEE';" onMouseOut="javascript:this.bgColor='#FFFFFF';" height="22" >
	<td align="left"><?php echo $key->svar;?></td>
	<td><?php echo $key->ocontent;?></td>
	<td><?php echo anchor('admin_login/main/del_friends/'.$key->id,"删除","onclick =  \"return confirm('确定删除吗?')\"");?></td>
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