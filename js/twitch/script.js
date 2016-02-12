var containerWidth = $(".wrapper").width();
var padding = 0;

$(".panel").resizable({
	handles: 'e',
	resize: function(event, ui){
		var currentWidth = ui.size.width;
		console.log(containerWidth - currentWidth);
		// set the content panel width
		$(".panel").width(containerWidth - currentWidth);
		$(this).width(currentWidth);
	}
});