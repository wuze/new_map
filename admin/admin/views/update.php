<?php $this->load->view('admin_html_header'); ?>
<?php $this->load->view('admin_header'); ?>


<!--content starts-->
<div id="content">
	<?php $this->load->view('admin_left'); ?>
    <div id="right">
    	<?php $this->load->view('admin_notice'); ?>
    	
   		<form name="updateform" method="POST" action="#">
    	<div id="main"><h4><?php echo $html_title;?></h4></div>
		<div    style=" border: 1px solid #C4D5DF;margin: 0 auto 5px;padding: 5px;height:250px;">
		
			<div style="margin: 0px auto;padding: 1px;height:50px;">
				<span class="inputSpan">分&nbsp;&nbsp;类&nbsp;&nbsp;ID:&nbsp;</span>
				<input class="inputClass" type="text" name="cid" disabled value="<?php echo  $data[id];?>"/>
			</div>
			
			<div style="margin: 0 auto 5px;padding: 1px;height:50px;">
				<span class="inputSpan">旧分类名称:&nbsp;</span>
				<input class="inputClass" type="text" name="cid" disabled value="<?php echo  $data[catname];?>"/>
			</div>
			
			<div style="margin: 0 auto 5px;padding: 1px;height:50px;">
				<span class="inputSpan">新分类名称:&nbsp;</span>
				<input class="inputClass" type="text" name="new_catname"  id="new_catname"/>
			</div>
			
			<div style="margin:0 auto 5px;padding 5px;height:50px;">	
				<input type="button" class="submitbtnClass" id="submit" value="提交修改"  style="margin-left:100px;"/>
			</div>
			</form>
    </div>
	<div class="iclear"></div>
</div>

<script type="text/javascript">
<!--
function submitform()
{
	if(!$('#cat_name').val()){
		alert("");
	}
}
//-->
</script>

<!--{include admin_footer}-->