<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>地区管理</title>
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
<?php echo form_open('admin_login/main/form_area');?>
<table width="98%" border="0" cellpadding="2" cellspacing="1" bgcolor="#D1DDAA" align="center" style="margin-top:8px" >
<tr bgcolor="#E7E7E7">
	<td height="24" colspan="2" background="skin/images/tbg.gif" bgcolor="#E7E7E7">&nbsp;添加地区&nbsp;</td>
</tr>
<tr align="center" bgcolor="#FAFAF1" height="22">
	<td width="10%">所属城市</td>
	<td width="90%" align="left">
		<select name="parentid" id="select">
		<option value='0'>无</option>
		<?php foreach($first_cate as $key){?>
	    <option value="<?php echo $key->id;?>" <?php if($key->id==$parentid){ ?>selected<?php }?>><?php echo $key->name;?></option>
	    <?php }?>
		</select>
	</td>
</tr>

<tr align='center' bgcolor="#FFFFFF" onMouseMove="javascript:this.bgColor='#FCFDEE';" onMouseOut="javascript:this.bgColor='#FFFFFF';" height="22" >
  <td>地区</td>
  <td align="left">
  	<input type="text" name="name" id="textfield2" value="">
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