<?php $this->load->view('admin_html_header'); ?>
<?php $this->load->view('admin_header'); ?>


<!--content starts-->
<div id="content">
	<?php $this->load->view('admin_left'); ?>
    <div id="right">
    	<?php $this->load->view('admin_notice'); ?>
    	
    	<div id="main"><h4><?php echo $html_title;?></h4></div>
		<div    style=" border: 1px solid #C4D5DF;margin: 0 auto 5px;padding: 5px;height:100px;">
		
		<div >
			<span class="inputSpan">分类ID:&nbsp;</span>
			<input class="inputClass" type="text" name="cid"  value="<?php echo  $data[id];?>"/>
		</div>
	
		</div>
		
    </div>
	<div class="iclear"></div>
</div>

<script type="text/javascript">
<!--
$(function(){
	$('#isubmit').click(function(){
		var title=$('input[name=title]').val();
		if($('input[name=author]').val() && title && title.length<30){
			$('form[name=form]').submit();
		}else if(title.length>30){
			alert("标题过长");
			return;
		}else{
			alert("新闻作者以及文章标题为必填项");
			return;
		}
	});
})
//-->
</script>

<!--{include admin_footer}-->