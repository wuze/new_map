<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>��������</title>
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
<?php echo form_open('admin_login/main/form_friends');?>
<input type="hidden" name="check" value="<?php if(!empty($content)){echo $content['id'];}?>">
<table width="98%" border="0" cellpadding="2" cellspacing="1" bgcolor="#D1DDAA" align="center" style="margin-top:8px" >
<tr bgcolor="#E7E7E7">
	<td height="24" colspan="2" background="skin/images/tbg.gif" bgcolor="#E7E7E7">&nbsp;������������&nbsp;</td>
</tr>
<tr align="center" bgcolor="#FAFAF1" height="22">
	<td width="10%">��վ����</td>
	<td width="90%" align="left"><input name="svar" type="text" id="title" size="50" ></td>
</tr>


<tr align='center' bgcolor="#FFFFFF" onMouseMove="javascript:this.bgColor='#FCFDEE';" onMouseOut="javascript:this.bgColor='#FFFFFF';" height="22" >
  <td>��ַ</td>
  <td align="left"><input name="ocontent" type="text" id="title" size="50" value="http://"><font color='red'>��ַ��http://��ͷ</font></td>
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

<!--  ��������  -->
</body>
</html>