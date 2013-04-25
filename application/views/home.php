
<?php $this->load->view("header"); ?>


<body>
	<div id="site">
		<div id="header">
			<a href="#" class="logo">
				<img src="/images/logo.gif"   width="200" height="90" />
			</a>	
			<img src="/images/title.png"  width="200" height="90" />						

			<div style="position:absolute;top:60px;left:560px;height:30px;width:400px;">
				福州:<img  src="http://www.weather.com.cn/m2/i/icon_weather/29x20/<?php echo $wether['img1']?>"/><?php echo $wether['weather']."   "?>温度:<?php echo $wether['temp1']."~".$wether['temp2']."  " .$wether['ptime']."发布数据"?>				
			</div>
			
			<?php $wk = array(1=>"星期一",2=>"星期二",3=>"星期三",4=>"星期四",5=>"星期五",6=>"星期六",0=>"星期天");
				$now = date("w");
			?>
			<div id="menu">
				<ul style="float:left;font-weight:bolder;margin-top:12px;margin-left:20px;font-color:#000FFF;"><li ><?php echo "今天是".date("Y-m-d")."  ".$wk[$now]; ?></li></ul>
				<ul style="float:right;font-weight:bolder;margin-top:12px;margin-right:50px;cursor:pointer;">
				<li><a href="<?php echo site_url('');?>" style="text-decoration:none;">首页</a></li>
				<li><a>|</a></li>
				<li><a href="<?php echo site_url('/about/');?>" style="text-decoration:none;">关于我们</a></li>
				<li><a>|</a></li>
				<li><a href="<?php echo site_url('/help/');?>" style="text-decoration:none;">帮助</a></li>
				</ul>
			</div>
		</div>
	
		<div id="content">	
			<!-- 左边栏   -->
			<div id="main">
				<div class="current" id="map_canvas" style="margin-left:5px;border:1px solid #ddd;float:left;"></div>
				<div id="panel"></div>
			</div>
			
			<!--  右边栏    -->
			<div id="sidebar">
				<div class="block">
					<div class="news">
					
					
						<!--   搜索条件   -->
						<div id="tabbed_box_1">
							<div class="tabbed_area">
									<ul class="tabs">
										<li ><a id="tab_1" href="javascript:tabSwitch('tab_1', 'content_1');"  name="content_1" class="tab active">地名查询</a></li>
										<li ><a id="tab_2" href="javascript:tabSwitch('tab_2', 'content_2');"  name="content_2" class="tab">周边查询</a></li>
										<li ><a id="tab_3" href="javascript:tabSwitch('tab_3', 'content_3');"  name="content_3" class="tab">线路查询</a></li>
									</ul>
									
									<div id="content_1" class="content"  style="width:234px;">
										<table>
										<tr style="width:140px;">
											<td><span class="labelClass" style="margin-top:10px;font-weight:bolder;">名&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;称:</span></td>
											<td><input type="text" class="inputClass"  style="width:142px;margin-top:10px;" name="addr_name" id="addr_name"/></td>
										</tr>

										<tr>
											<td><span class="labelClass" style="margin-top:10px;font-weight:bolder;" >所属类别:</span></td>
											<td>
												<select class="selectClass" style="width:154px;margin-top:10px;" name="addr_cat" id="addr_cat">
														<?php if($cate){ foreach($cate as $k=>$v){?>
															<option <?php echo $v['id']?>"><?php echo $v['catname'];?></option>
														<?php }}?>
												</select>
											</td>
										</tr>

										<tr>
											<td><span class="labelClass" style="margin-top:10px;font-weight:bolder;" >所属区县:</span></td>
											<td>
												<select  class="selectClass" style="width:154px;margin-top:10px;" id="addr_prov" name="addr_prov">
													<?php if($area){ foreach( $area as $k=>$v){?>
													<option value="<?php echo $v['id']?>"><?php echo $v['name']?></option>
													<?php }}?>
												</select>
											</td>
										</tr>
										
										<tr >
											<td colspan="2">
												<input type="button" onclick="searchPoint();" class="btnClass" name="query" value="查询" style="float:right;margin-right:10px;margin-top:5px;"/>
											</td>
										</tr>
										</table>
									</div>
									
									
									<div id="content_2" class="content" style="width:234px;">
										<table>
										<tr style="width:140px;">
											<td><span class="labelClass" style="margin-top:10px;font-weight:bolder;">地&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;址:</span></td>
											<td><input type="text" class="inputClass"  style="width:142px;margin-top:10px;" name="area_name" id="area_name"/></td>
										</tr>

										<tr>
											<td><span class="labelClass" style="margin-top:10px;font-weight:bolder;" >所属类别:</span></td>
											<td>
												<select class="selectClass" style="width:154px;margin-top:10px;" name="area_cat" id="area_cat">
														<?php if($cate){ foreach($cate as $k=>$v){?>
															<option <?php echo $v['id']?>"><?php echo $v['catname'];?></option>
														<?php }}?>
												</select>
											</td>
										</tr>

										<tr>
											<td><span class="labelClass" style="margin-top:10px;font-weight:bolder;">距&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;离:</span></td>
											<td>
												<select  class="selectClass" style="width:154px;margin-top:10px;" name="area_dist" id="area_dist">
													<option value="500">500米</option>
													<option value="1000">1000米</option>
													<option value="1500">1500米</option>
													<option value="3000">3000米</option>
												</select>
											</td>
										</tr>
										
										<tr >
											<td colspan="2">
												<input type="button" onclick="searchArea();" class="btnClass" name="查询" value="查询" style="float:right;margin-right:10px;margin-top:5px;"/>
											</td>
										</tr>
										</table>
									</div>
									
									<div id="content_3" class="content" style="width:234px;">
										<table>
										<tr style="width:140px;">
											<td><span class="labelClass" style="margin-top:10px;font-weight:bolder;">此处出发:</span></td>
											<td><input type="text" class="inputClass"  style="width:142px;margin-top:10px;" name="path_from" id="path_from"/></td>
										</tr>

										<tr>
											<td><span class="labelClass" style="margin-top:10px;font-weight:bolder;">到达此处:</span></td>
											<td>
												<input type="text" class="inputClass"  style="width:142px;margin-top:10px;" name="path_to" id="path_to"/>
											</td>
										</tr>
										<tr >
											<td colspan="2">
												<input type="button" onclick="searchPath();" class="btnClass" name="查询" value="查询" style="float:right;margin-right:10px;margin-top:5px;"/>
											</td>
										</tr>
										</table>
									</div>
							</div>
						</div>
					</div>
				</div>
				
				<!---   start  -->
				<div class="sponsors" id="index">
					<a class="orange">文化信息索引类</a>
				</div>
				<div class="sponsors_down">
					<ul>
						<?php if($index){ foreach( $index as $k=>$row){?>
						<li><a><?php echo $k?></a>
							<?php if( $row){?>
							<ul style="">
								<?php foreach( $row as $kk=>$v){?>
								<li><a onclick="GetPointer(<?php echo $v['id']?>);"><?php echo $v['catname']?></a></li>
								<?php }?>
							</ul>	
							<?php }?>
						</li>
						<?php  }} ?>
						<li><a>aaa</a></li>
						<li><a>aaa</a></li>
						<li><a>aaa</a></li>
						<li><a>aaa</a></li>
						<li><a>aaa</a></li>
						<li><a>aaa</a></li>
					</ul>
				</div>
				<div class="sponsors" id="tradition">
					<a class="green">文化信息传统类</a>
				</div>
				<div class="sponsors_down">
				</div>
		
				<div class="sponsors" id="link">
					<a class="blue">友情链接</a>
				</div>
				<div class="sponsors_down">
					<ul style="">
						<?php if($link){ foreach( $link as $k=>$v){?>
						<li><a style="text-decoration:none;" target="_blank" href="<?php echo $v['ocontent']?>"><?php echo $v['svar']?></a></li>
						<?php  }} ?>
					</ul>
				</div>
				<!---   end -->
			</div>
		</div>
	</div>


	<div id="wrap">
	    <div id="controller" class="hidden">
	        <span class="jFlowControl">No 1</span>
	        <span class="jFlowControl">No 2</span>
	        <span class="jFlowControl">No 3</span>
	    </div>
	    
	    <div id="prevNext">
	        <img src="images/prev.png" alt="Previous Tab" class="jFlowPrev" />
	        <img src="images/next.png" alt="Next Tab" class="jFlowNext" />
	        <img src="images/close.png" alt="Close Tab" class="jFlowNext"  style="margin-left:400px;" onclick="closeShow();"/>
	    </div>
	    
	    <div id="slides">
	        <div><img src="upload/1.jpg" alt="photo" width="700px" height="380px"/><p>This is photo number one. Neato!</p></div>
	        <div><img src="upload/2.jpg" alt="photo" width="700px" height="380px"/><p>This is photo number two. Neato!</p></div>
	        <div><img src="upload/3.jpg" alt="photo"width="700px" height="380px"/><p>This is photo number three. Neato!</p></div>
	    </div>
	</div>


<div>
	<input type="hidden" id="s_lat"/>
	<input type="hidden" id="s_lng"/>
</div>


<script type="text/javascript">
	BmapInit();
	var data="";
	
	var lng=0,lat=0;
	GetPointer(0);
	function GetPointer(type){
		$(function(){
			$.post("/index.php/main/GetInitPoint/",{type:type},function(e){
				if(e){
				data=eval(e);
				if(data){
					for(var i=0;i<data.length;i++){	
						    var pt = new BMap.Point(data[i].lng,data[i].lat);
							var mk = new BMap.Marker(pt);
							addMarker(pt, 1,data[i]);
					}
				}
				}
			});		
		});
	}
</script>



<?php $this->load->view("footer");?>