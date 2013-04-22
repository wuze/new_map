$(document).ready(function(){
	$('.sponsors').click(function(e){
		
			var display=$(this).next(".sponsors_down").css('display');
			if( display=='undefined' ||display=='none' )
			{
				$(this).next(".sponsors_down").slideDown('slow');
				$(this).next(".sponsors_down").css('display','block');
			}
			else
			{
				$(this).next(".sponsors_down").slideUp('slow');
				$(this).next(".sponsors_down").css('display','none');
			}
	})

});