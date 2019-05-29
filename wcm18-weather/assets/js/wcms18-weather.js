(function($){

	$(document).ready(function(){
		// fire some async request
		console.log("Firing away request");

		$.post(
			my_ajax_obj.ajax_url, // URL
			{
				action: 'get_current_weather'
			}, // Data to send to server
			function(response) {
				console.log("GOT RESPONSE!!!! YAY!!", response);
			}
		);

		// deal with response 😎
	});

})(jQuery);