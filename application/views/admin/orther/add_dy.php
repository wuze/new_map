<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>skin/css/base.css">
<title>�ޱ����ĵ�</title>
<style type="text/css">
<!--
.STYLE1 {color: #FF0000}
-->
</style>
</head>

<body>
<!--  ����ת��λ�ð�ť  -->
<!--  �����б�   -->
<table width="98%" border="0" cellpadding="2" cellspacing="1" bgcolor="#D1DDAA" align="center" style="margin-top:8px" >
  <tr bgcolor="#E7E7E7">
    <td height="24" colspan="5" background="<?php echo base_url()?>skin/images/tbg.gif" bgcolor="#E7E7E7">&nbsp;��ҳ����&nbsp;</td>
  </tr>
  <tr align="center" bgcolor="#FAFAF1" height="22">
    <td width="7%">λ��</td>
    <td width="26%" align="center">����</td>
    <td width="10%" align="center">��ʶ</td>
    <td width="34%" align="center">��ַ</td>
    <td width="23%" align="center">����</td>
  </tr>
  <?php if(!empty($res)){ 
  foreach($res as $key) {
  ?>
  <?php echo form_open('admin_login/dy/change_dy');?>
  <input type="hidden" name="id" value="<?php echo $key->id;?>" />
  <tr align='center' bgcolor="#FFFFFF" onmousemove="javascript:this.bgColor='#FCFDEE';" onmouseout="javascript:this.bgColor='#FFFFFF';" height="22" >
  
    <td align="center"><input name="weizhi" type="text" id="textfield" size="5" value="<?php echo $key->weizhi;?>" /></td>
    <td align="center"><input name="name" type="text" id="textfield3"  value="<?php echo $key->title;?>" size="35" /></td>
    <td align="center"><input name="biaoshi" type="text" id="biaoshi" size="15"  value="<?php echo $key->biaoshi;?>"/></td>
    <td align="center">&nbsp;</td>
    <td align="left"><input type="submit" name="button" id="button" value="�޸�" /> 
      <?php echo anchor('admin_login/dy/del_dy/'.$key->id,"ɾ��");?></td>
  </tr>
  </form>
  <?php }}?>
  <tr align='center' bgcolor="#FFFFFF" onmousemove="javascript:this.bgColor='#FCFDEE';" onmouseout="javascript:this.bgColor='#FFFFFF';" height="22" >
    <td colspan="5" align="center">&nbsp;</td>
  </tr>
  <?php echo form_open('admin_login/dy/add_dy');?>
  <input type="hidden" name="check" value="<?php echo $check;?>" />
  <tr align='center' bgcolor="#FFFFFF" onmousemove="javascript:this.bgColor='#FCFDEE';" onmouseout="javascript:this.bgColor='#FFFFFF';" height="22" >
    <td align="center"><input name="weizhi" type="text" id="weizhi" size="5"  value="<?php echo $weizhi;?>"/></td>
    <td align="center"><input name="title" type="text" id="textfield4"  value="<?php echo $title;?>" size="35"/></td>
    <td align="center"><input name="biaoshi" type="text" id="biaoshi" size="15" value="<?php echo $biaoshi;?>" /></td>
    <td align="center">&nbsp;</td>
    <td align="left">&nbsp;</td>
  </tr>
  <tr align='center' bgcolor="#FFFFFF" onmousemove="javascript:this.bgColor='#FCFDEE';" onmouseout="javascript:this.bgColor='#FFFFFF';" height="22" >
    <td align="center">����</td>
    <td colspan="4" align="left"><?php echo $kind;?></td>
  </tr>
  <tr align='center' bgcolor="#FFFFFF" onmousemove="javascript:this.bgColor='#FCFDEE';" onmouseout="javascript:this.bgColor='#FFFFFF';" height="22" >
    <td align="center">&nbsp;</td>
    <td colspan="4" align="left"><input type="submit" name="button2" id="button2" value="<?php if($check=="wu"){?>���<?php }else{echo "�޸�";}?>" /></td>
  </tr>
  </form>
  <tr bgcolor="#FAFAF1">
    <td height="28" colspan="5">&nbsp;</td>
  </tr>
  <tr align="right" bgcolor="#EEF4EA">
    <td height="36" colspan="5" align="center"><!--��ҳ���� --></td>
  </tr>
</table>

<!--  ������  -->

</body>
</html>


