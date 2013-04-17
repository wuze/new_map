<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>编辑索引信息分类</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>skin/css/base.css">
<style type="text/css">
<!--
.STYLE1 {color: #FF0000}
-->
</style>
</head>
<body leftmargin="8" topmargin="8" background='<?php echo base_url()?>skin/images/allbg.gif'>

<!--  快速转换位置按钮  -->
<!--  内容列表   -->
<?php echo form_open('admin_login/category/form_indexing');?>
<input type="hidden" name="cat" value="1">
<input type="hidden" name="id" value="<?php echo $content->id?>">
<table width="98%" border="0" cellpadding="2" cellspacing="1" bgcolor="#D1DDAA" align="center" style="margin-top:8px" >
<tr bgcolor="#E7E7E7">
	<td height="24" colspan="2" background="skin/images/tbg.gif" bgcolor="#E7E7E7">&nbsp;编辑索引信息分类&nbsp;</td>
</tr>
<tr align="center" bgcolor="#FAFAF1" height="22">
	<td width="10%">父分类</td>
	<td width="90%" align="left">
		<select name="parentid" id="select">
		<option value='0'>无父分类</option>
		<?php foreach($first_cate as $key){?>
	    <option value="<?php echo $key->id;?>" <?php if($key->id == $content->parentid){ ?>selected<?php }?>><?php echo $key->catname;?></option>
	    <?php }?>
		</select>
	</td>
</tr>

<tr align='center' bgcolor="#FFFFFF" onMouseMove="javascript:this.bgColor='#FCFDEE';" onMouseOut="javascript:this.bgColor='#FFFFFF';" height="22" >
  <td>子分类</td>
  <td align="left">
  	<input type="text" name="catname" id="textfield2" value="<?php echo $content->catname; ?>">
  </td>
</tr>

<tr bgcolor="#FAFAF1">
<td height="28" colspan="2">
	&nbsp;
	<input type="submit" name="button" id="button" value="提交"> 
	<span class="STYLE1"></span></td>
</tr>
<tr align="right" bgcolor="#EEF4EA">
	<td height="36" colspan="2" align="center"><!--翻页代码 --></td>
</tr>
</table>

</form>

<!--  搜索表单  -->
</body>
</html>