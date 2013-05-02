
<?php $this->load->view("header"); ?>
	<script type="text/javascript">
		$(function(){
			var d = $("<div id='d' style='background-color:white;border:1px solid #DCE6F5;display:none;padding:10px 20px 10px 20px;}'/> <div>");// 获取<div id="d">的
			var tableTag = $("table");
			tableTag.append(d);
			var dTag = d.get(0);
			var timer = null;
			$("td[name$='_td']").each(
				function(i){
					var tdTag = $(this);
					var offset = tdTag.offset();
					var left = offset.left;
					var top = offset.top;
					tdTag.mouseover(function(){
							timer=setTimeout(
								function(){
									timer=0;d.css("display","");
									dTag.style.position="absolute";
									dTag.style.left=left+10;
									dTag.style.top=top+3;
									d.text(tdTag.text());
								},110
							);
						}
					);
					tdTag.mouseout(function(){
						if(timer)  {
							clearTimeout(timer);
							timer=0;
							return;
						}
						d.blur(function(){
							d.css("display","none");
						});
					});
				}
			);
		});
		</script>
<body>

<div >
 	
 	<div>选择出发地:<input type="text" /></div>
 	<div>选择</div>
 	
</div>


<div>
		
		<table border="1" cellpadding="0" cellspacing="0" align="center">
			<tr height="30px">
				<td name="one_td">aaaaaaaaaa</td><td name="two_td">bbbbbbbbbbbbbbbbbbbbbbb</td>
			</tr>
			<tr height="30px">
				<td name="one_td">cccccccccc</td><td name="two_td">ddddddddd</td>
			</tr>
		</table>

</div>









<?php $this->load->view("footer");?>