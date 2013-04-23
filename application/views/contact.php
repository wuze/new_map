<?php $this->load->view("header"); ?>

<body>
	<div id="site">
		<div id="header">
			<a href="#" class="logo">
				<img src="/images/logo.gif"   width="200" height="90" />
			</a>	
			<img src="/images/title.png"  width="200" height="90" />						
			<?php $wk = array(1=>"星期一",2=>"星期二",3=>"星期三",4=>"星期四",5=>"星期五",6=>"星期六",0=>"星期天");
				$now = date("w");
			?>
			<div style="position:absolute;top:60px;left:560px;height:30px;width:400px;">
				福州:<img  src="http://www.weather.com.cn/m2/i/icon_weather/29x20/<?php echo $wether['img1']?>"/><?php echo $wether['weather']."   "?>温度:<?php echo $wether['temp1']."~".$wether['temp2']."  " .$wether['ptime']."发布数据"?>				
			</div>
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
				
				<h2>联系我们</h2>
				<hr />
				<div style="width:300px;float:left;">
				<table>
					<tr><td>公司名称:</td><td>adsfasdfasdfasdf</td><td></td></tr>
					<tr><td>公司aa:</td><td>adsfasdfasdfasdf</td><td></td></tr>
					<tr><td>公司ss:</td><td>adsfasdfasdfasdf</td><td></td></tr>
				</table>
				</div>
				<div style="float:left;">asdfadf</div>
				
			</div>	
		</div>
</div>









<?php $this->load->view("footer");?>