$(document).ready(function(){
	$('.sponsors').click(function(e){
		
			if( $(this).find(".sponsors_down").css('display') !='none' )
			{
				$(this).find(".sponsors_down").slideUp('slow');
				$(this).find(".sponsors_down").css('display','none');
			}
			else
			{
				$(this).find(".sponsors_down").slideDown('slow');
				$(this).find(".sponsors_down").css('display','block');
			}
	})

});