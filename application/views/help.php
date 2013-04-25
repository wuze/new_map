<?php $this->load->view("header"); ?>

<style type="text/css">
<!--

table{
    table-layout:fixed;
    empty-cells:show; 
    border-collapse: collapse;
    margin:0 auto;
}
td{
    height:50px;
}


table.t1{
    border:1px solid #cad9ea;
    color:#666;
}

table.t1 th {
    background-image: url(th_bg1.gif);
    background-repeat::repeat-x;
    height:30px;
}
table.t1 td,table.t1 th{
    border:1px solid #cad9ea;
    padding:0 1em 0;
}
table.t1 tr.a1{
    background-color:#f5fafe;
}



table.t2{
    border:1px solid #9db3c5;
    color:#666;
}
table.t2 th {
    background-image: url(th_bg2.gif);
    background-repeat::repeat-x;
    height:30px;
    color:#fff;
}
table.t2 td{
    border:1px dotted #cad9ea;
    padding:0 2px 0;
}
table.t2 th{
    border:1px solid #a7d1fd;
    padding:0 2px 0;
}
table.t2 tr.a1{
    background-color:#e8f3fd;
}



table.t3{
    border:1px solid #fc58a6;
    color:#720337;
}
table.t3 th {
    background-image: url(th_bg3.gif);
    background-repeat::repeat-x;
    height:30px;
    color:#35031b;
}
table.t3 td{
    border:1px dashed #feb8d9;
    padding:0 1.5em 0;
}
table.t3 th{
    border:1px solid #b9f9dc;
    padding:0 2px 0;
}
table.t3 tr.a1{
    background-color:#fbd8e8;
}

-->
</style>
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
			<div style="width:938px;margin-left:5px;margin-right:2px;padding:20px;">
				
				<h2>帮助</h2>
				<hr />

				<table width="100%" id="mytab"  border="1" class="t1">
				
				  <tr class="a1">
				    <td rowspan="4" style="width:100px;font-weight:bold;">地名查询:</td>
				    <td rowspan="4" style="width:200px;"><img src="/images/diming.jpg" style="height: 150px;width:180px;"/></td>
				    <td style="width:100px;font-weight:bold;">按“所属类别”查询</td>
				    <td>在“所属类别”下拉框选择所要查询的文化信息类别（例如：文化馆），点击“查询”按钮，即可</td>
				  </tr>
				  <tr>
				    <td style="width:100px;font-weight:bold;">按“所属区县”查询</td>
				    <td>在“所属区县”下拉框选择所要查询的文化信息所属区县（例如：徐汇区），点击“查询”按钮，即可。</td>
				  </tr>
				  <tr class="a1">
				    <td style="width:100px;font-weight:bold;">精确查询</td>
				    <td>在“名称”栏输入文化类相关地名，点击“查询”按钮，即可。支持模糊查询。</td>
				  </tr>
				  <tr>
				    <td style="width:100px;font-weight:bold;">逐步筛选查询</td>
				    <td>在“名称”栏输入文化类相关地名，在“所属类别”下拉框选择所要查询的文化信息类别，“所属区县”下拉框选择文化信息所属区县，点击“查询”按钮，可实现对文化信息的精确检索定位。</td>
				  </tr>
				
					<!--  周边  -->
					  <tr class="a1">
					    	<td style="width:100px;font-weight:bold;">周边查询:</td>
					    	<td style="width:200px;"><img src="/images/zhoubian.jpg" style="height: 150px;width:180px;"/></td>
					    	<td colspan="2" style="width:100px;font-weight:bold;">在“位置”栏输入任一地名，在“所属类别”下拉框选择所要查询的文化信息所属类别，并在“距离”下拉框选择所要查询的范围，点击“查询”按钮，即可。
							（例如：查询距离人民广场3000米范围内的电影院有哪些？1.在“位置”栏输入“人民广场”；2.“所属类别”下拉框选择“电影院”；3.“距离”下拉框选择“3000米”；4.点击“查询”按钮。）</td>
					  </tr>
				  
				  <!--   -->
				    <tr class="a1">
				    	<td style="width:100px;font-weight:bold;">线路查询:</td>
				    	<td style="width:200px;"><img src="/images/xianlu.jpg" style="height: 150px;width:180px;"/></td>
				    	<td colspan="2" style="width:100px;font-weight:bold;"> 	
							“线路查询”窗口提供两种出行方式的查询：驾车、步行。分别在“此处出发”、“到达此处”栏输入起始地点及目的地，并在“出行方式”栏选择“驾车”或是“步行”，点击“查询”按钮，即可。同时，地图窗口及详细信息窗口将显示线路走向及线路详细信息。</td>
				  	</tr>
				</table>
				
				
				<table width="100%" id="mytab2" style="margin-top:20px;display:none;"  border="1" class="t1">
				
				  <tr class="a1">
				    <td  style="width:100px;font-weight:bold;">文化信息索引类:</td>
				    <td  style="width:200px;"><img src="/images/diming.jpg" style="height: 150px;width:180px;"/></td>
				    <td>asdfasdf</td>
				    <td>在“所属类别”下拉框选择所要查询的文化信息类别（例如：文化馆），点击“查询”按钮，即可</td>
				  </tr>

				
								
				  <tr class="a1">
				    <td  style="width:100px;font-weight:bold;">文化信息传统类:</td>
				    <td  style="width:200px;"><img src="/images/diming.jpg" style="height: 150px;width:180px;"/></td>
				    <td>aasdfasdf</td>
				    <td>在“所属类别”下拉框选择所要查询的文化信息类别（例如：文化馆），点击“查询”按钮，即可</td>
				  </tr>

				</table>
</div>
</div>	
</div>



<?php $this->load->view("footer");?>