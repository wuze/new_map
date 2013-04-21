$(document).ready(function(){
	$("a.tab").click(function(){
		
		$(".active").removeClass("active");
		$(this).addClass("active");
		$(".tabContent").slideUp("slow");
		
		var content_show=$(this).attr("name");
		$("#"+content_show).slideDown("slow");
	})
});

function ShowDiv(s)
{
    if(s>0)
    {
        document.getElementById('ceng').style.display='block';
        document.getElementById('close').style.display='block';
    }else{
        document.getElementById('ceng').style.display='none';
        document.getElementById('close').style.display='none';
    }
}

function tabSwitch(new_tab, new_content) {
	
	document.getElementById('content_1').style.display = 'none';
	document.getElementById('content_2').style.display = 'none';
	document.getElementById('content_3').style.display = 'none';		
	document.getElementById(new_content).style.display = 'block';	
		
	document.getElementById('tab_1').className = '';  
    document.getElementById('tab_2').className = '';  
    document.getElementById('tab_3').className = '';          
	document.getElementById(new_tab).className = 'active';		

}


function tabSwitch_2(active, number, tab_prefix, content_prefix) {
	
	for (var i=1; i < number+1; i++) {
	  document.getElementById(content_prefix+i).style.display = 'none';
	  document.getElementById(tab_prefix+i).className = '';
	}
	document.getElementById(content_prefix+active).style.display = 'block';
	document.getElementById(tab_prefix+active).className = 'active';	
}


function showDivs()
{
	document.getElementById('light').style.display='block';
	document.getElementById('fade').style.display='block'
}
function closeDivs()
{
	document.getElementById('light').style.display='none';
	document.getElementById('fade').style.display='none';
}