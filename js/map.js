var city_name="福州";

var imgurl = "http://d2.img.com/";
if(bmaplng==undefined) var bmaplng;
if(bmaplat==undefined) var bmaplat;
var all_mark=new Array();
var bmap;
var ac_addr_name;
var ac_area_name;
var ac_path_from,ac_path_to;







// 初始化地图
// 默认显示当前所在城市
function BmapInit() {  
 	bmap = new BMap.Map('map_canvas',{mapType:BMAP_NORMAL_MAP,minZoom:1,maxZoom:18});	
	bmaplat=$('#s_lat').val();
	bmaplng=$('#s_lng').val();
	
    var point = new BMap.Point(119.330221,26.047125);//福州市
    bmap.centerAndZoom(point,12);
    
    bmap.enableDragging();
    bmap.enableScrollWheelZoom();


	bmap.addControl(new BMap.NavigationControl());  			 //导航
	bmap.addControl(new BMap.MapTypeControl()); 				 //类型
	bmap.addControl(new BMap.OverviewMapControl());              //添加默认缩略地图控件
	bmap.addControl(new BMap.OverviewMapControl({isOpen:true, anchor: BMAP_ANCHOR_BOTTOM_RIGHT}));   //右上角，打开
	bmap.enableContinuousZoom();
	bmap.enableScrollWheelZoom();
	
	//自动搜索
	var ac_addr_name = new BMap.Autocomplete(    
    {"input" : "addr_name"
    ,"location" : city_name
	});
	
	var ac_area_name = new BMap.Autocomplete(    
		    {"input" : "area_name"
		    ,"location" : city_name
	});
	
	
	var ac_path_from = new BMap.Autocomplete(    
		    {"input" : "path_from"
		    ,"location" : city_name
	});
	
	var ac_path_to =   new BMap.Autocomplete(    
		    {"input" : "path_to"
		        ,"location" : city_name
	});
		    	
	//获得当前城市
	function getCity(result){
		city_name = result.name;
		bmap.centerAndZoom(result.name, 11);	
	}
}



function setLngLat(marker){
	marker.enableDragging(); //是否可以拖动
	marker.addEventListener('dblclick',function(e){
		document.getElementById('s_lng').value = e.point.lng;
		document.getElementById('s_lat').value = e.point.lat;
	});
}


//添加地标
function addMarker(point, index,info) {
	var myIcon = new BMap.Icon("/images/map/1.png", new BMap.Size(27, 38), {
		anchor: new BMap.Size(10, 27)
	});
	
	var marker = new BMap.Marker(point, { icon: myIcon });
	bmap.addOverlay(marker);
	getLngLat(marker,info);
	marker.enableDragging(); //是否可以拖动
	return marker;
}



//获得百度坐标
function getLngLat(marker,info){
	marker.enableDragging(); //是否可以拖动
	marker.addEventListener('dblclick',function(e){
		/*
		document.getElementById('s_lng').value = e.point.lng;
		document.getElementById('s_lat').value = e.point.lat;
		bmaplng = e.point.lng;
		bmaplat = e.point.lat;
		*/
		/*
		for(var i in info)
			alert(i+"  "+info[i]);
		*/
		
		

		//var sContent =markTemplate(info['addr_name'],info['telephone'],info['address'],info['zipcode'],info['web_url'],info['img_url']);
		
		//alert(sContent);
		
		sContent = markTp(info['addr_name'],info['telephone'],info['address'],info['zipcode'],info['web_url'],info['img_url']);
		var html = new BMap.InfoWindow(sContent);  // 创建信息窗口对象
		this.openInfoWindow(html);
		/*
		this.openInfoWindow(infoWindow);
   //图片加载完毕重绘infowindow
   document.getElementById('imgDemo').onload = function (){
       infoWindow.redraw();
   }*/
		});
	
	/*
	marker.addEventListener('mouseover',function(e){
		document.getElementById('s_lng').value = e.point.lng;
		document.getElementById('s_lat').value = e.point.lat;
		bmaplng = e.point.lng;
		bmaplat = e.point.lat;
		marker.openInfoWindow(new BMap.InfoWindow("地名:"+info['addr_name']));
	});
	*/
}



function searchPoint()
{
	var addr_name = $('#addr_name').val();
	var addr_car  = $('#addr_cat').find('option:selected').text();
	var addr_prov = $('#addr_prov').find('option:selected').text();
	if(!addr_name)
	{
		alert("请输入名称");
		return;
	}
	
	bmap.clearOverlays();    //清除地图上所有覆盖物
	var search_txt = addr_name;
	var bmyGeo = new BMap.Geocoder();
	bmyGeo.getPoint(search_txt, function(point){
		if (point) {
				bmap.centerAndZoom(point, 18);
				addMarker(point,1,"cc");
		}
		else
		{
				alert('查无此点');  
		}
	},"福建省");
}

function searchArea()
{
	var area_name = $('#area_name').val();
	var area_car  = $('#area_cat').find('option:selected').text();
	var area_dist = $('#area_dist').find('option:selected').text();
	if(!area_name)
	{
		alert("请输入地址");
		return;
	}
	
	bmap.clearOverlays();    //清除地图上所有覆盖物
	var search_txt = addr_name;
	bmap.centerAndZoom("福州", 11);
	var local = new BMap.LocalSearch(bmap, {
	  renderOptions:{map: bmap, autoViewport:true}
	});
	local.searchNearby("小吃", "福州南站","1000");
}

function searchPath()
{
	var path_from = $('#path_from').val();
	var path_to   = $('#path_to').val();
	
	if(!path_from)
	{
		alert("请输入出发地点");
		return;
	}
	
	if(!path_to)
	{
		alert("请输入目的地点");
		return;
	}
	
	bmap.centerAndZoom("福州", 14);
	var transit = new BMap.TransitRoute(bmap, {
	  renderOptions: {map: bmap}
	});
	transit.search("福建师大", "福州南站");
	
}






















//-------------------------------------------------------------------------------------------------------
// 添加信息窗口
function addInfoWindow(marker, poi, index) {
	var maxLen = 6;
	var name = null;
	var address="";
	if (poi.type == BMAP_POI_TYPE_NORMAL) {
		name = "地址：  "                
		address=poi.title;                
	} else if (poi.type == BMAP_POI_TYPE_BUSSTOP) {
		name = "公交：  "
		address=poi.title+"公交站";
	} else if (poi.type == BMAP_POI_TYPE_SUBSTOP) {
		name = "地铁：  "
		address=poi.title+"地铁站";
	}else{
		address=poi.title;                
	}
	
	
	
	var infoWindowHtml = contentinfohtml(address, poi.point, poi.city);
	var infoWindow = new BMap.InfoWindow(infoWindowHtml, { width: 320, offset: new BMap.Size(0, -14) });
	var openInfoWinFun = function () {
		ifmarker = "marker";
		marker.openInfoWindow(infoWindow);
		for (var cnt = 0; cnt < maxLen; cnt++) {
			if (!$("#divid" + cnt)) { continue; }
			if (cnt == index) {
				$("#divid" + cnt).css("background", "#CAE1FF");
				$("img", $("#divid" + cnt)).attr("src", imgurl + "static/img/other/gaode/" + (cnt + 1) + "_1.png");
				var myIcon = new BMap.Icon(imgurl + "static/img/other/gaode/" + (cnt + 1) + "_1.png", new BMap.Size(22, 29), {
					anchor: new BMap.Size(10, 27)
				});
				markers[cnt].setIcon(myIcon);
			} else {
				$("#divid" + cnt).css("background", "");
				$("img", $("#divid" + cnt)).attr("src", imgurl + "static/img/other/gaode/" + (cnt + 1) + ".png");
				var myIcon = new BMap.Icon(imgurl + "static/img/other/gaode/" + (cnt + 1) + ".png", new BMap.Size(22, 29), {
					anchor: new BMap.Size(10, 27)
				});
				markers[cnt].setIcon(myIcon);
			}
		}
	}
	
	
	marker.addEventListener("click", openInfoWinFun);
	marker.addEventListener("mouseout", function (e) {
		ifmarker = "";
	});
	ifmarker = "";
	return openInfoWinFun;
}

 function contentinfohtml(address, pt, city) {
            var contentinfo = "";
            contentinfo = "<div><p style='width:290px;'>地址：" + address + "</p>"
		+ "</div>";
            return contentinfo;
}

 
function openMarkerTipById0(pointid, thiss) {  //鼠标经过时候       
            for (i = 0; i < markers.length; i++) {
                if (pointid == i) {
                    $(thiss).css("background", "#CAE1FF");
                    var imgid = parseInt(pointid) + 1;
                    $("img", thiss).attr("src", imgurl + "static/img/other/gaode/" + imgid + "_1.png");
                    var myIcon = new BMap.Icon(imgurl + "static/img/other/gaode/" + imgid + "_1.png", new BMap.Size(22, 29), {
                        anchor: new BMap.Size(10, 27)
                    });
                    markers[pointid].setIcon(myIcon);
                } else {
                    $("#divid" + i).css("background", "");
                    $("img", $("#divid" + i)).attr("src", imgurl + "static/img/other/gaode/" + (i + 1) + ".png");
                    var myIcon = new BMap.Icon(imgurl + "static/img/other/gaode/" + (i + 1) + ".png", new BMap.Size(22, 29), {
                        anchor: new BMap.Size(10, 27)
                    });
                    markers[i].setIcon(myIcon);
                }
            }
}

function openMarkerTipById1(pointid, thiss) {  //根据id打开搜索结果点tip
	$(thiss).css("background", "#CAE1FF");
	var imgid = parseInt(pointid) + 1;
	openInfoWinFuns[pointid]();
	var myIcon = new BMap.Icon(imgurl + "static/img/other/gaode/" + imgid + "_1.png", new BMap.Size(22, 29), {
		anchor: new BMap.Size(10, 27)
	});
	markers[pointid].setIcon(myIcon);
	marker_on = pointid;
}

function onmouseout_MarkerStyle(pointid, thiss) { //鼠标移开后点样式恢复          
	ifmarker = "";
}


/*
-webkit-border-radius: 10px;
-moz-border-radius: 10px;
border-radius: 10px;
*/
function markTp1(addrname,tel,address,zipcode,weburl,imgurl)
{
	var str="<h4 style='margin:0 0 5px 0;padding:0.2em 0'>天安门</h4>" + 
			"<img style='float:right;margin:4px' id='imgDemo' src='http://app.baidu.com/map/images/tiananmen.jpg' width='139' height='104' title='天安门'/>" + 
			"<p style='margin:0;line-height:1.5;font-size:13px;text-indent:2em'>天安门坐落在中国北京市中心,故宫的南侧,与天安门广场隔长安街相望,是清朝皇城的大门...</p>" + 
			"</div>";
	return  str;
}


function markTp(addrname,tel,address,zipcode,weburl,imgurl)
{
	var str ="<div id='divnav'>"+address+"</div>"+ 
				"<div id='divmid'>"+ 
					"<div id='divleft'>"+
							"<div class='divfields'>" +
								"<div class='divfield'>" +
									"<div class='divfield_left'><label>电话:</label></div>"+
									"<div class='divfield_right'>"+tel+"</div>"+
								"</div>" +
								
								"<div class='divfield'>" +
									"<div class='divfield_left'><label>地址:</label></div>"+
									"<div class='divfield_right'>"+address+"</div>"+
								"</div>" +
								
								"<div class='divfield'>" +
									"<div class='divfield_left'><label>邮编:</label></div>"+
									"<div class='divfield_right'>"+zipcode+"</div>"+
								"</div>" +
								
								"<div class='divfield'>" +
									"<div class='divfield_left'><label>网址:</label></div>"+
									"<div class='divfield_right'>"+weburl+"</div>"+
								"</div>" +
								"</div>"+
					"</div>"+ 
					"<div id='divright'>"+ 
							"<div class='divcontent'>" +
							"<img src='"+imgurl+"' width='300' height='252'>"+
							"</div>"+ 
					"</div>"+ 
				"</div>"+ 
			 "<div id='divfooter'style='float:left;margin-left:2px;' >" +
			 "<a href='#' style='font-size:large;font-weight:bolder;padding:5px;;'>详细信息</a></div>";
		return str;
	}

function markTemplate(addrname,tel,address,zipcode,weburl,imgurl)
{
	var str= "<div style='position: absolute; left: 437px; top: -160px;' class='gmnoprint'>"+
	"<div style='position: relative; left: 0px; top: 0px; z-index: 10; width: 475px; height: 239px;' class='gmnoprint'>"+
			"<img style='position: absolute; left: 451px; top: 11px; width: 12px; height: 12px; border: 0px; padding: 0px; margin: 0px; cursor: pointer; z-index: 10000;' src='http://maps.gstatic.com/intl/zh-CN_ALL/mapfiles/iw_close.gif'>"+
			"<img style='position: absolute; left: 0px; top: 0px; width: 12px; height: 12px; border: 0px; padding: 0px; margin: 0px; cursor: pointer; z-index: 10000; display: none;' src='http://maps.gstatic.com/intl/zh-CN_ALL/mapfiles/iw_plus.gif'>"+
				"<a style='position: absolute; left: 0px; top: 0px; text-decoration: none; white-space: nowrap; display: none;' href='javascript:void(0)'>"+
			"<img style='position: relative; left: 0px; top: 0px; width: 15px; height: 12px; border: 0px; padding: 0px; margin: 0px; cursor: pointer; z-index: 10000; display: none; vertical-align: top;' src='http://maps.gstatic.com/intl/zh-CN_ALL/mapfiles/iw_fullscreen.gif'>"+
			"<span style='font-size: small; text-decoration: underline; padding-left: 5px; overflow: hidden; position: relative; top: -1px;'>全屏显示</span></a>"+
			"<img style='position: absolute; left: 0px; top: 0px; width: 12px; height: 12px; border: 0px; padding: 0px; margin: 0px; cursor: pointer; z-index: 10000; display: none;' src='http://maps.gstatic.com/intl/zh-CN_ALL/mapfiles/iw_minus.gif'>"+
		
		"<div style='position: absolute; left: 16px; top: 16px; width: 443px; height: 207px; z-index: 10;'><div>"+
		"<table class='list_table' style='width:100%; height: 168px;'>"+
		"<tbody>"+
			"<tr>"+
				"<td style='width: 250px; height: 168px;'>"+
					"<img src='images/20000008a.jpg' style='size:30; width:250px; height: 164px;'>"+
				"</td>"+
				"<td>"+
					"<table style='width: 100%; height: 168px'> "+
						"<tbody>"+
							"<tr>"+
								"<td align='left' style='white-space:nowrap;'>名称:上海话剧艺术中心</td> "+
							"</tr> "+
							"<tr>"+ 
								"<td style='white-space:nowrap;'>电话:54656200</td>"+
							"</tr>"+
							"<tr>"+ 
								"<td style='height: 27px:white-space:nowrap;'> 地址:安福路288号</td> "+
							"</tr>"+
							"<tr>"+
								"<td>邮编:200031</td>"+
							"</tr>"+
							"<tr>"+ 
								"<td style='height: 27px'> "+
									"<a href='http://www.china-drama.com/' target='_blank'>http://www.china-drama.com/</a>"+
								"</td>"+
							"</tr>"+ 
							"<tr>"+
								"<td style='height: 27px;'>"+
									"<a href='javascript:showDetailDIV('landmark&'+'20000008'+'&上海话剧艺术中心')'> 详细信息</a>"+
								"</td>"+
							"</tr>"+
						"</tbody>"+
					"</table>"+
				"</td>"+ 
			"</tr> "+
		"</tbody>"+
		"</table>"+
		"</div>"+
		"</div>"+
	"</div>"+
	"<div style='width: 25px; height: 25px; overflow: hidden; z-index: 1; position: absolute; left: 0px; top: 0px;'>"+
		"<img style='position: absolute; left: 0px; top: 0px; width: 690px; height: 786px; border: 0px; padding: 0px; margin: 0px;' src='http://maps.gstatic.com/intl/zh-CN_ALL/mapfiles/iw3.png'></div>"+
		"<div style='width: 25px; height: 25px; overflow: hidden; z-index: 1; position: absolute; left: 450px; top: 0px;'>"+
			"<img style='position: absolute; left: -665px; top: 0px; width: 690px; height: 786px; border: 0px; padding: 0px; margin: 0px;' src='http://maps.gstatic.com/intl/zh-CN_ALL/mapfiles/iw3.png'>"+
		"</div>"+
	
	"<div style='width: 97px; height: 96px; overflow: hidden; z-index: 1; position: absolute; left: 189px; top: 214px;'>"+
		"<img style='position: absolute; left: 0px; top: -691px; width: 690px; height: 786px; border: 0px; padding: 0px; margin: 0px;' src='http://maps.gstatic.com/intl/zh-CN_ALL/mapfiles/iw3.png'></div><div style='width: 25px; height: 25px; overflow: hidden; z-index: 1; position: absolute; left: 0px; top: 214px;'>"+
		"<img style='position: absolute; left: 0px; top: -665px; width: 690px; height: 786px; border: 0px; padding: 0px; margin: 0px;' src='http://maps.gstatic.com/intl/zh-CN_ALL/mapfiles/iw3.png'></div><div style='width: 25px; height: 25px; overflow: hidden; z-index: 1; position: absolute; left: 450px; top: 214px;'>"+
		"<img style='position: absolute; left: -665px; top: -665px; width: 690px; height: 786px; border: 0px; padding: 0px; margin: 0px;' src='http://maps.gstatic.com/intl/zh-CN_ALL/mapfiles/iw3.png'></div><div style='position: absolute; left: 25px; top: 0px; width: 425px; height: 25px; background-color: white; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(171, 171, 171);'></div>"+
	"<div style='position: absolute; left: 0px; top: 25px; width: 473px; height: 189px; background-color: white; border-left-width: 1px; border-left-style: solid; border-left-color: rgb(171, 171, 171); border-right-width: 1px; border-right-style: solid; border-right-color: rgb(171, 171, 171);'></div>"+
	"<div style='position: absolute; left: 25px; top: 214px; width: 425px; height: 24px; background-color: white; border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(171, 171, 171);'></div>"+
"</div>";

	return str;
}


