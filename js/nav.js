/**
 * @author some effect with the navigation
 */

jQuery(document).ready(
	function()
	{
		$('.linkImg img').mouseover(
		function()
		{
			$(this).stop().fadeTo('fast',0.75).animate({width:'165px'},'fast').fadeTo('fast',1.0);
		}
		);
		$('.linkImg img').mouseout(
		function()
		{
			$(this).stop().animate({width:'150px'},'fast');
		}
		)	

	}

)
