$(document).ready(function()
{
	$(".nav_icon").click(function()
	{
		$(".side_nav").addClass("open");
	});

	$(".nav_close").click(function()
	{
		$(".side_nav").remove("open");
	});
});