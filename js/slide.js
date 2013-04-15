


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
			$('#center').css('display','block');
		}
	});
}


function slidetpl(imgurl,describe,imgname)
{
	var str="<img src='"+imgurl+"'>";
	return str;
}