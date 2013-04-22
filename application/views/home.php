<?php $this->load->view("header"); ?>


<body>
	<div id="site">
		<div id="header">
			<a href="#" class="logo">
				<img src="/images/logo.gif"   width="200" height="110" />
			</a>	
			<img src="/images/title.png"  width="300" height="110" />						
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
			
			<div id="sidebar">
				<div class="bottom_menu">
					<div id="navigate" >
						<ul>
							<li class="current_page_item"><a id="popup_box" href="#" onclick="showDivs();">搜索条件</a></li>
							<li class="page_item page-item-675"><a href="#">文化索引类信息</a>
								<ul class='children'>
								<?php  foreach($index as $k=>$row){ ?>
									<li class="page_item page-item-173"><a><?php echo $k?></a>
										<ul class='children'>
											<?php foreach( $row as $kk=>$v){?>
												<li class="page_item page-item-172"><a onclick="GetPointer(<?php echo $v['id']?>)" ><?php echo $v['catname']?></a></li>
											<?php }?>
										</ul>
									</li>
								<?php }?>
								</ul>
							</li>
							
							
							<li class="page_item page-item-174"><a href="#" >文化传统类信息</a>
								<ul class='children'>
								<?php  foreach($tradition as $k=>$row){ ?>
									<li class="page_item page-item-173"><a><?php echo $k?></a>
										<ul class='children'>
											<?php foreach( $row as $kk=>$v){?>
												<li class="page_item page-item-172"><a onclick="GetPointer(<?php echo $v['id']?>); " ><?php echo $v['catname']?></a></li>
											<?php }?>
										</ul>
									</li>
								<?php }?>
								</ul>
							</li>
							
							
							<li class="page_item page-item-146"><a href="#" >友情链接</a>
								<ul class='children'>
								
								<?php  if($link) { foreach($link as$k=>$row){ ?>
									<li class="page_item page-item-173"><a target="_blank" href="<?php echo $row['ocontent'];?>"><?php echo $row['svar']?></a></li>
								<?php } }?>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</div>
			
			<!--  右边栏    -->
		</div>
	</div>


	<!--  浮动框   -->
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
	    <!-- 
	        <div><img src="upload/1.jpg" alt="photo" width="700px" height="380px"/><p>This is photo number one. Neato!</p></div>
	        <div><img src="upload/2.jpg" alt="photo" width="700px" height="380px"/><p>This is photo number two. Neato!</p></div>
	        <div><img src="upload/3.jpg" alt="photo" width="700px" height="380px"/><p>This is photo number three. Neato!</p></div>
	    -->
	    </div>
	</div>


<div id="light" class="poppup_content">
 <a style="margin-left:230px;text-decoration:none;margin-top:-5px; " href = "javascript:void(0)" onclick = "closeDivs();">关闭</a>
 <!-- start  -->
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
															<option>A</option>
													</select>
												</td>
											</tr>
	
											<tr>
												<td><span class="labelClass" style="margin-top:10px;font-weight:bolder;" >所属区县:</span></td>
												<td>
													<select  class="selectClass" style="width:154px;margin-top:10px;" id="addr_prov" name="addr_prov">
														<option>B</option>
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
															<option>A</option>
													</select>
												</td>
											</tr>
	
											<tr>
												<td><span class="labelClass" style="margin-top:10px;font-weight:bolder;">距&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;离:</span></td>
												<td>
													<select  class="selectClass" style="width:154px;margin-top:10px;" name="area_dist" id="area_dist">
														<option>B</option>
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
 <!-- end  -->
 </div>


<div id="fade" class="poppup_overlay"></div>
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
			$.post("/index.php/welcome/GetInitPoint/",{type:type},function(e){
				bmap.clearOverlays(); 
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