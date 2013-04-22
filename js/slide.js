


function detailInfo(id)
{
	var photos=new Array();
	var num = 0;
	var html_text = "";
	var cont_text = "";
	$.post('/index.php/welcome/GetPhoto/',{cid:id},function(e){
		photos=eval(e);
		if( photos )
		{
			for(var i=0;i<photos.length;i++)
			{
				var j=i+1;
				cont_text += "<span class='jFlowControl'>No "+j+"</span>";
				html_text += slidetpl(photos[i]['img_url'],photos[i]['describe'],photos[i]['img_name'],i);
			}			
			$('#slides').html(html_text);
			$('#controller').html(cont_text);
			
			$('#wrap').css('display','block');
			$("div#controller").jFlow({ 
				slides: "#slides", 
				width: "700px", 
				height: "400px" 
				}); 
		}
	});
}


function slidetpl(imgurl,describe,imgname)
{
	var str="<div><img src='"+imgurl+"' alt='"+imgname+"' width='700px' height='380px'/>"+
			"<p>"+describe+"</p></div>";
	return str;
}

function closeShow(){
	$('div#wrap').css("display","none");
}