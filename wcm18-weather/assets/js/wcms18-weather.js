(function($){
  $(document).ready(function(){
		$('.widget_wcms18-weather-widget').each(function(i, widget) {
			var current_weather = $(widget).find('.current-weather'),
				widget_city = $(current_weather).data('city'),
				widget_country = $(current_weather).data('country');
			$.post(
				wcms18_weather_settings.ajax_url, // URL
				{
					action: 'get_current_weather',
					city: widget_city,
					country: widget_country,
				} // Data to send to server
			)
			.done(function(response) {
				var output = "";
				console.log("Got response", response);

				if (response.success) {
					console.log("Got successful response");
					var weather = response.data;

					output += '<div class="conditions">';
					weather.conditions.forEach(function(condition) {    // foreach ($weather->conditions as $condition)
						output += '<img src="http://openweathermap.org/img/w/'+condition.icon+'.png" alt="'+condition.main+'" title="'+condition.description+'">';
					});
					output += '</div>';
					output += '<strong>Temperature:</strong> ' + weather.temperature + '&deg; C<br>';
					output += '<strong>Humidity:</strong> ' + weather.humidity + '%<br>';
				} else {
					console.log("Got UNSUCCESSFUL response");
					if (response.data == 404) {
						output += "Could not find current weather for city.";
					} else {
						output += "Something went wrong, please try again 😅.";
					}
				}
				console.log("OUTPUT will be", output);

				$(current_weather).html(output);
			})
			.fail(function(error) {
				var output = "Unknown error";
				if (error.status == 404) {
					output = "Could not find weather server.";
				}
				$(current_weather).html(output);
			});
		});
});})(jQuery);