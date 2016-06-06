jQuery(document).ready(function($) {
	$('body').removeClass('no-js');

	$('.home .project-title').click(function() {
		$(this).next('.collapsed').slideToggle();
	});
});