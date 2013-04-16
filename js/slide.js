


function detailInfo(id)
{
	var photos=new Array();
	var num = 0;
	var html_text = "";

	$.post('/index.php/welcome/GetPhoto/',{cid:id},function(e){
		photos=eval(e);
		if( photos )
		{
			for(var i=0;i<photos.length;i++)
			{
				html_text += slidetpl(photos[i]['img_url'],photos[i]['describe'],photos[i]['img_name'],i);
			}			
			//
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
	var str="<img src='"+imgurl+"'>";
	return str;
}

function closeShow(){
	$('div#wrap').css("display","none");
}