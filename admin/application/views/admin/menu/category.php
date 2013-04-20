<html>
<head>
<title>menu</title>
<link rel="stylesheet" href="<?php echo base_url()?>skin/css/base.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url()?>skin/css/menu.css" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<script language='javascript'>var curopenItem = '1';</script>
<script language="javascript" type="text/javascript" src="<?php echo base_url()?>skin/js/frame/menu.js"></script>
<base target="main" />
</head>
<body target="main">
<table width='99%' height="100%" border='0' cellspacing='0' cellpadding='0'>
  <tr>
    <td style='padding-left:3px;padding-top:8px' valign="top">
	<!-- Item 1 Strat -->

      <!-- Item 1 End -->
      <!-- Item 2 Strat -->
      <dl class='bitem'>
        <dt onClick='showHide("items2_1")'><b>传统信息分类</b></dt>
        <dd style='display:block' class='sitem' id='items2_1'>
          <ul class='sitemu'>
            <li><a href='<?php echo site_url('admin_login/category/traditional');?>' target='main'>传统信息分类列表</a></li>
            <li><a href='<?php echo site_url('admin_login/category/add_traditional ');?>' target='main'>添加传统分类</a></li>

          </ul>
        </dd>
      </dl>
      <!-- Item 2 End -->
      
      
       <dl class='bitem'>
        <dt onClick='showHide("items2_2")'><b>索引信息分类</b></dt>
        <dd style='display:block' class='sitem' id='items2_2'>
          <ul class='sitemu'>
            <li><a href='<?php echo site_url('admin_login/category/indexing');?>' target='main'>索引信息分类列表</a></li>
            <li><a href='<?php echo site_url('admin_login/category/add_indexing');?>' target='main'>添加索引分类</a></li>
          </ul>
        </dd>
      </dl>
	  </td>
  </tr>
</table>
</body>
</html>