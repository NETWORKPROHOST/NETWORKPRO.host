$(function() {
$("#wire dd").hide();
$("#wire dt").click(function(event) {
	event.preventDefault();
	$(this).next("dd").toggle();
});
});