<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>�ĵ�����</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>skin/css/base.css">
<style type="text/css">
<!--
.STYLE1 {color: #FF0000}
-->
</style>
</head>
<body leftmargin="8" topmargin="8" background='<?php echo base_url()?>skin/images/allbg.gif'>

<!--  ����ת��λ�ð�ť  -->
<!--  �����б�   -->
<?php echo form_open('admin_login/main/change_sysconfig');?>
<input type="hidden" name="check" value="<?php echo $check;?>">
<table width="98%" border="0" cellpadding="2" cellspacing="1" bgcolor="#D1DDAA" align="center" style="margin-top:8px" >
<tr bgcolor="#E7E7E7">
	<td height="24" colspan="2" background="skin/images/tbg.gif" bgcolor="#E7E7E7">&nbsp;ϵͳ����&nbsp;</td>
</tr>
<tr align="center" bgcolor="#FAFAF1" height="22">
	<td width="10%">��վ����</td>
	<td width="90%" align="left"><input name="name" type="text" id="name" size="50" value="<?php echo $sitename;;?>"></td>
</tr>

<tr align='center' bgcolor="#FFFFFF" onMouseMove="javascript:this.bgColor='#FCFDEE';" onMouseOut="javascript:this.bgColor='#FFFFFF';" height="22" >
  <td>�ؼ���</td>
  <td align="left"><input name="keywords" type="text" id="keywords" size="50" value="<?php echo $keyword;?>"></td>
</tr>
<tr align='center' bgcolor="#FFFFFF" onMouseMove="javascript:this.bgColor='#FCFDEE';" onMouseOut="javascript:this.bgColor='#FFFFFF';" height="22" >
  <td>��վ����</td>
  <td align="left"><textarea name="des" id="des" cols="48" rows="5"><?php echo $des;?></textarea></td>
</tr>
<tr align='center' bgcolor="#FFFFFF" onMouseMove="javascript:this.bgColor='#FCFDEE';" onMouseOut="javascript:this.bgColor='#FFFFFF';" height="22" >
  <td>վ��ر�</td>
  <td align="left"><input name="radio1" type="radio" id="radio" value="1" <?php if($sitestatic==1){ ?>checked <?php }?>>
    ����
      <input type="radio" name="radio1" id="radio2" value="0" <?php if($sitestatic!=1){ ?>checked <?php }?>>
    �ر�</td>
</tr>
<tr align='center' bgcolor="#FFFFFF" onMouseMove="javascript:this.bgColor='#FCFDEE';" onMouseOut="javascript:this.bgColor='#FFFFFF';" height="22" >
  <td>�ر�����</td>
  <td align="left"><textarea name="content" id="content" cols="48" rows="5"><?php echo $content;?>
</textarea></td>
</tr>












<tr bgcolor="#FAFAF1">
<td height="28" colspan="2">
	&nbsp;
	<input type="submit" name="button" id="button" value="�ύ"> 
	<span class="STYLE1"></span></td>
</tr>
<tr align="right" bgcolor="#EEF4EA">
	<td height="36" colspan="2" align="center"><!--��ҳ���� --></td>
</tr>
</table>

</form>

<!--  ������  -->
</body>
</html>