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
<?php echo form_open('admin_login/main/form_area');?>
<table width="98%" border="0" cellpadding="2" cellspacing="1" bgcolor="#D1DDAA" align="center" style="margin-top:8px" >
<tr bgcolor="#E7E7E7">
	<td height="24" colspan="2" background="skin/images/tbg.gif" bgcolor="#E7E7E7">&nbsp;��ӵ���&nbsp;</td>
</tr>
<tr align="center" bgcolor="#FAFAF1" height="22">
	<td width="10%">��������</td>
	<td width="90%" align="left">
		<select name="parentid" id="select">
		<option value='0'>��</option>
		<?php foreach($first_cate as $key){?>
	    <option value="<?php echo $key->id;?>" <?php if($key->id==$parentid){ ?>selected<?php }?>><?php echo $key->name;?></option>
	    <?php }?>
		</select>
	</td>
</tr>

<tr align='center' bgcolor="#FFFFFF" onMouseMove="javascript:this.bgColor='#FCFDEE';" onMouseOut="javascript:this.bgColor='#FFFFFF';" height="22" >
  <td>����</td>
  <td align="left">
  	<input type="text" name="name" id="textfield2" value="">
  </td>
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