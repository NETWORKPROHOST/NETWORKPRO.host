$(function() {
$("#S-1-5 dd").hide();
$("#S-1-5 dt").click(function(event) {
	event.preventDefault();
	$(this).next("dd").toggle();
});
});