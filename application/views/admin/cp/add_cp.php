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
<?php echo form_open_multipart('admin_login/cp/form_cp');?>
<input type="hidden" name="check" value="<?php echo $check;?>">
<table width="98%" border="0" cellpadding="2" cellspacing="1" bgcolor="#D1DDAA" align="center" style="margin-top:8px" >
<tr bgcolor="#E7E7E7">
	<td height="24" colspan="2" background="skin/images/tbg.gif" bgcolor="#E7E7E7">&nbsp;�������&nbsp;</td>
</tr>
<tr align="center" bgcolor="#FAFAF1" height="22">
	<td width="10%">����</td>
	<td width="90%" align="left"><input name="title" type="text" id="title" size="50" value="<?php echo $title;?>"></td>
</tr>

<tr align='center' bgcolor="#FFFFFF" onMouseMove="javascript:this.bgColor='#FCFDEE';" onMouseOut="javascript:this.bgColor='#FFFFFF';" height="22" >
  <td>����</td>
  <td align="left"><select name="select" id="select">
  <?php foreach($res as $key)
  {?>
    <option value="<?php echo $key->id;?>" <?php if($key->id==$fl){ ?>selected<?php }?>><?php echo $key->name;?></option>
    <?php }?>
  </select>  </td>
</tr>
<tr align='center' bgcolor="#FFFFFF" onMouseMove="javascript:this.bgColor='#FCFDEE';" onMouseOut="javascript:this.bgColor='#FFFFFF';" height="22" >
  <td>����ͼ</td>
  <td align="left"><input type="file" name="userfile" id="userfile">
    <span class="STYLE1"><?php if($check!="wu"){?>���粻�޸������գ�<?php }?>�������200*200</span></td>
</tr>
<?php if($check!="wu"){?>
<tr align='center' bgcolor="#FFFFFF" onMouseMove="javascript:this.bgColor='#FCFDEE';" onMouseOut="javascript:this.bgColor='#FFFFFF';" height="22" >
  <td>����ͼԤ��</td>
  <td align="left"><img src="<?php echo base_url().$photoname;?>" height="150" width="150"></td>
</tr> <?php }?>
<tr align='center' bgcolor="#FFFFFF" onMouseMove="javascript:this.bgColor='#FCFDEE';" onMouseOut="javascript:this.bgColor='#FFFFFF';" height="22" >
  <td>ʱ��</td>
  <td align="left"><input name="shijian" type="text" id="keywords" size="50" value="<?php echo $shijian;?>"></td>
</tr>
<tr align='center' bgcolor="#FFFFFF" onMouseMove="javascript:this.bgColor='#FCFDEE';" onMouseOut="javascript:this.bgColor='#FFFFFF';" height="22" >
  <td>����</td>
  <td align="left"><input type="text" name="zz" id="textfield" value="<?php echo $zz;?>"></td>
</tr>
<tr align='center' bgcolor="#FFFFFF" onMouseMove="javascript:this.bgColor='#FCFDEE';" onMouseOut="javascript:this.bgColor='#FFFFFF';" height="22" >
  <td>��Դ</td>
  <td align="left"><input type="text" name="ll" id="textfield2" value="<?php echo $ll;?>"></td>
</tr>
<tr align='center' bgcolor="#FFFFFF" onMouseMove="javascript:this.bgColor='#FCFDEE';" onMouseOut="javascript:this.bgColor='#FFFFFF';" height="22" >
  <td>����</td>
  <td align="left"><?php echo $kind;?></td>
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