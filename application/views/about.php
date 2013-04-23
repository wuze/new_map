<?php $this->load->view("header"); ?>
<body>
	<div id="site">
		<div id="header">
			<a href="#" class="logo">
				<img src="<?php echo base_url("/images/logo.gif"); ?>"   width="200" height="110" />
			</a>	
			<img src="<?php echo base_url("/images/title.png"); ?>"  width="300" height="110" />						
			<?php $wk = array(1=>"星期一",2=>"星期二",3=>"星期三",4=>"星期四",5=>"星期五",6=>"星期六",0=>"星期天");
				$now = date("w");
			?>
			
			<div id="menu">
				<ul style="float:left;font-weight:bolder;margin-top:12px;margin-left:20px;font-color:#000FFF;"><li ><?php echo "今天是".date("Y-m-d")."  ".$wk[$now]; ?></li></ul>
				<ul style="float:right;font-weight:bolder;margin-top:12px;margin-right:50px;cursor:pointer;">
				<li><a href="<?php echo site_url();?>" style="text-decoration:none;">首页</a></li>
				<li><a>|</a></li>
				<li><a href="<?php echo site_url('/about/');?>" style="text-decoration:none;">关于我们</a></li>
				<li><a>|</a></li>
				<li><a href="<?php echo site_url('/help/');?>" style="text-decoration:none;">帮助</a></li>
				</ul>
			</div>
		</div>
		
	
		<div id="content" >
			<div style="background:url('/images/about_bk.jpg');height:600px;width:938px;margin-left:5px;margin-right:2px;padding:20px;">
				
				<h2>关于我们</h2>
				<hr />
				<?php echo $about['ocontent']; ?>
				
			</div>	
		</div>



</div>




<?php $this->load->view("footer");?>