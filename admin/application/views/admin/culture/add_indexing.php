<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>文档管理</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>skin/css/base.css">
<style type="text/css">
<!--
.STYLE1 {color: #FF0000}
-->
</style>
<!--引用百度地图API-->
<style type="text/css">
    html,body{margin:0;padding:0;}
    .iw_poi_title {color:#CC5522;font-size:14px;font-weight:bold;overflow:hidden;padding-right:13px;white-space:nowrap}
    .iw_poi_content {font:12px arial,sans-serif;overflow:visible;padding-top:4px;white-space:-moz-pre-wrap;word-wrap:break-word}
</style>
<script type="text/javascript" src="http://api.map.baidu.com/api?key=&v=1.1&services=true"></script>
<script type="text/javascript">
var first_category = Array();
first_category[0]="<option value='0'>二级分类</option>";
<?php foreach($first_cate as $key){?>
	  first_category['<?php echo $key->id?>']= "<option value='' selected>二级分类</option><?php foreach($key->sub_category as $sencond_cate){?><option value='<?php echo $sencond_cate->id;?>' ><?php echo $sencond_cate->catname?></option><?php }?>";
<?php }?>
function select_second_category(){
	var first_selected = document.getElementById("first_cate"); 
	var first_cate_id = first_selected.options[first_selected.selectedIndex].value;
	var sencond_cate = document.getElementById("sencond_cate"); 
	if(first_cate_id!=''){
		var city_options = first_category[first_cate_id];
		sencond_cate.innerHTML = city_options;
	}
	else{
		sencond_cate.innerHTML = "<option value=''>二级分类</option>";
	}
}
</script>
</head>
<body leftmargin="8" topmargin="8" background='<?php echo base_url()?>skin/images/allbg.gif'>

<!--  快速转换位置按钮  -->
<!--  内容列表   -->
<?php echo form_open_multipart('admin_login/culture/form_culture');?>
<input type="hidden" name="id" value="<?php echo $id;?>">
<input type="hidden" name="cid" value="1">
<table width="98%" border="0" cellpadding="2" cellspacing="1" bgcolor="#D1DDAA" align="center" style="margin-top:8px" >
<tr bgcolor="#E7E7E7">
	<td height="24" colspan="2" background="skin/images/tbg.gif" bgcolor="#E7E7E7">&nbsp;添加索引类文化信息&nbsp;</td>
</tr>
<tr align="center" bgcolor="#FAFAF1" height="22">
	<td width="10%">名称</td>
	<td width="90%" align="left"><input name="addr_name" type="text" id="title" size="50" value=""></td>
</tr>

<tr align='center' bgcolor="#FFFFFF" onMouseMove="javascript:this.bgColor='#FCFDEE';" onMouseOut="javascript:this.bgColor='#FFFFFF';" height="22" >
  <td>分类</td>
  <td align="left">
  <select id="first_cate" name="first_cate" onchange="select_second_category()">
  <option value="0">一级分类</option>
  <?php foreach($first_cate as $key){?>
    <option value="<?php echo $key->id;?>" <?php //if($key->id==$content['cat_id'])echo "selected";?>><?php echo $key->catname;?></option>
    <?php }?>
  </select>
  <select name="cat_id" id="sencond_cate">
  	<option value="">二级分类</option>
  </select>
  </td>
</tr>
<tr align='center' bgcolor="#FFFFFF" onMouseMove="javascript:this.bgColor='#FCFDEE';" onMouseOut="javascript:this.bgColor='#FFFFFF';" height="22" >
  <td>上传图片</td>
  <td align="left"><input name="img_url" type="file" id="keywords" size="50"></td>
</tr>
<tr align='center' bgcolor="#FFFFFF" onMouseMove="javascript:this.bgColor='#FCFDEE';" onMouseOut="javascript:this.bgColor='#FFFFFF';" height="22" >
  <td>电话</td>
  <td align="left"><input type="text" name="telephone" id="textfield" value=""></td>
</tr>
<tr align='center' bgcolor="#FFFFFF" onMouseMove="javascript:this.bgColor='#FCFDEE';" onMouseOut="javascript:this.bgColor='#FFFFFF';" height="22" >
  <td>邮编</td>
  <td align="left"><input type="text" name="zipcode" id="textfield" value=""></td>
</tr>
<tr align='center' bgcolor="#FFFFFF" onMouseMove="javascript:this.bgColor='#FCFDEE';" onMouseOut="javascript:this.bgColor='#FFFFFF';" height="22" >
  <td>网址</td>
  <td align="left"><input type="text" name="web_url" id="textfield2" value="">&nbsp;&nbsp;以http://开头</td>
</tr>
<tr align='center' bgcolor="#FFFFFF" onMouseMove="javascript:this.bgColor='#FCFDEE';" onMouseOut="javascript:this.bgColor='#FFFFFF';" height="22" >
  <td>地址</td><td align="left"><input type="text" name="address" id="keyword" value=""/><input type="button" value="获取坐标" id="search_button" ></td>
</tr>
<tr align='center' bgcolor="#FFFFFF" onMouseMove="javascript:this.bgColor='#FCFDEE';" onMouseOut="javascript:this.bgColor='#FFFFFF';" height="22" >
  <td>经度坐标</td><td align="left"><input type="text" name="lng" id="lng" value="">
  </td>
</tr>
<tr align='center' bgcolor="#FFFFFF" onMouseMove="javascript:this.bgColor='#FCFDEE';" onMouseOut="javascript:this.bgColor='#FFFFFF';" height="22" >
  <td>纬度坐标</td><td align="left"><input type="text" name="lat" id="lat" value="" >
  </td>
</tr>

<tr align='center' bgcolor="#FFFFFF" onMouseMove="javascript:this.bgColor='#FCFDEE';" onMouseOut="javascript:this.bgColor='#FFFFFF';" height="22" >
<td colspan='2'><div style="width:697px;height:550px;border:#ccc solid 1px; display:none" id="dituContent"></div></td>
</tr>

<tr bgcolor="#FAFAF1">
<td height="28" colspan="2">
	&nbsp;
	<input type="submit" name="button" id="button" value="保存"> 
	<span class="STYLE1"></span></td>
</tr>
<tr align="right" bgcolor="#EEF4EA">
	<td height="36" colspan="2" align="center"><!--翻页代码 --></td>
</tr>
</table>

</form>

<!--  搜索表单  -->
<script type="text/javascript" src="http://api.map.baidu.com/api?v=1.2"></script>
<script type="text/javascript">
function getUrlParas(){
    var hash = location.hash,
        para = {},
        tParas = hash.substr(1).split("&");
    for(var p in tParas){
        if(tParas.hasOwnProperty(p)){
            var obj = tParas[p].split("=");
            para[obj[0]] = obj[1];
        }
    }
    return para;
}
var para = getUrlParas(),
    center = para.address?decodeURIComponent(para.address) : "宝龙城市广场",
    city = para.city?decodeURIComponent(para.city) : "福州市";

//document.getElementById("keyword").value = center;

var marker_trick = false;

var map = new BMap.Map("dituContent");
map.enableScrollWheelZoom();

var marker = new BMap.Marker(new BMap.Point(119.330, 26.047), {
    enableMassClear: false,
    raiseOnDrag: true
 });
marker.enableDragging();
map.addOverlay(marker);

map.addEventListener("click", function(e){
    if(!(e.overlay)){
        map.clearOverlays();
        marker.show();
        marker.setPosition(e.point);
        setResult(e.point.lng, e.point.lat);
    }
});
marker.addEventListener("dragend", function(e){
    setResult(e.point.lng, e.point.lat);
});

var local = new BMap.LocalSearch(map, {
    renderOptions:{map: map},
	 pageCapacity: 1
});
local.setSearchCompleteCallback(function(results){
    if(local.getStatus() !== BMAP_STATUS_SUCCESS){
        alert("无结果");
    } else {
	     marker.hide();
	 }
});
local.setMarkersSetCallback(function(pois){
    for(var i=pois.length; i--; ){
        var marker = pois[i].marker;
        marker.addEventListener("click", function(e){
            marker_trick = true;
            var pos = this.getPosition();
            setResult(pos.lng, pos.lat);
        });
    }
});

window.onload = function(){
    //local.search(center);
    document.getElementById("search_button").onclick = function(){
    	document.getElementById("dituContent").style.display = "block";;
        local.search(document.getElementById("keyword").value);
    };
    document.getElementById("keyword").onkeyup = function(e){
        var me = this;
        e = e || window.event;
        var keycode = e.keyCode;
        if(keycode === 13){
            local.search(document.getElementById("keyword").value);
        }
    };
};
function a(){
    document.getElementById("float_search_bar").style.display = "none";
}

/*
 * setResult : 定义得到标注经纬度后的操作
 * 请修改此函数以满足您的需求
 * lng: 标注的经度
 * lat: 标注的纬度
 */
function setResult(lng, lat){
    document.getElementById("lng").value = lng;
    document.getElementById("lat").value = lat;
} 
</script>
</body>
</html>