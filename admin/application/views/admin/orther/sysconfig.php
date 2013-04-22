<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>文档管理</title>
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
<?php echo form_open('admin_login/main/change_sysconfig');?>
<input type="hidden" name="check" value="<?php echo $check;?>">
<table width="98%" border="0" cellpadding="2" cellspacing="1" bgcolor="#D1DDAA" align="center" style="margin-top:8px" >
<tr bgcolor="#E7E7E7">
	<td height="24" colspan="2" background="skin/images/tbg.gif" bgcolor="#E7E7E7">&nbsp;系统设置&nbsp;</td>
</tr>
<tr align="center" bgcolor="#FAFAF1" height="22">
	<td width="10%">网站名称</td>
	<td width="90%" align="left"><input name="name" type="text" id="name" size="50" value="<?php echo $sitename;;?>"></td>
</tr>

<tr align='center' bgcolor="#FFFFFF" onMouseMove="javascript:this.bgColor='#FCFDEE';" onMouseOut="javascript:this.bgColor='#FFFFFF';" height="22" >
  <td>关键字</td>
  <td align="left"><input name="keywords" type="text" id="keywords" size="50" value="<?php echo $keyword;?>"></td>
</tr>
<tr align='center' bgcolor="#FFFFFF" onMouseMove="javascript:this.bgColor='#FCFDEE';" onMouseOut="javascript:this.bgColor='#FFFFFF';" height="22" >
  <td>网站描述</td>
  <td align="left"><textarea name="des" id="des" cols="48" rows="5"><?php echo $des;?></textarea></td>
</tr>
<tr align='center' bgcolor="#FFFFFF" onMouseMove="javascript:this.bgColor='#FCFDEE';" onMouseOut="javascript:this.bgColor='#FFFFFF';" height="22" >
  <td>站点关闭</td>
  <td align="left"><input name="radio1" type="radio" id="radio" value="1" <?php if($sitestatic==1){ ?>checked <?php }?>>
    开启
      <input type="radio" name="radio1" id="radio2" value="0" <?php if($sitestatic!=1){ ?>checked <?php }?>>
    关闭</td>
</tr>
<tr align='center' bgcolor="#FFFFFF" onMouseMove="javascript:this.bgColor='#FCFDEE';" onMouseOut="javascript:this.bgColor='#FFFFFF';" height="22" >
  <td>关闭内容</td>
  <td align="left"><textarea name="content" id="content" cols="48" rows="5"><?php echo $content;?>
</textarea></td>
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