<?php
/**
 * Functions for communicating with the OpenWeatherMap API
 */
function owm_get_current_weather($city, $country) {
	// 1. Get current weather from OpenWeatherMap
	$response = wp_remote_get("http://api.openweathermap.org/data/2.5/weather?q={$city},{$country}&units=metric&appid=5ae275d1a0023fc435486dc31a45cd67");
	// 2. Make sure we get a valid response
	if (is_wp_error($response) || wp_remote_retrieve_response_code($response) !== 200) {
		return false;
	}
	// 3. Parse response
	$data = json_decode(wp_remote_retrieve_body($response));
	// 4. Pick out data we need
	$current_weather = [];
	$current_weather['temperature'] = $data->main->temp;
	$current_weather['humidity'] = $data->main->humidity;
	$current_weather['city'] = $data->name;
	$current_weather['country'] = $data->sys->country;
	$current_weather['conditions'] = $data->weather;
	// 5. Return picked data to caller.
	return $current_weather;
}