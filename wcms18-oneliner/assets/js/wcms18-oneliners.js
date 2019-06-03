(function($){

	$(document).ready(function(){
		// find all instances of our oneliner widget
		$('.widget_wcms18-oneliner-widget').each(function(i, widget) {
			console.log("Sending request for widget", widget);

			$.post(
				w18ol_settings.ajax_url, // URL to POST to
				{
					action: 'get_oneliner'
				}, // DATA to POST
				function(oneliner) {
					console.log("Got response for widget", widget);
					$(widget).find('.content').html(oneliner);
				}
			);
		});
	});

})(jQuery);