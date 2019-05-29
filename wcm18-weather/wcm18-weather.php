<?php
/**
 * Plugin Name: WCMS18 Weather Widget
 * Plugin URI:  https://thehiveresistance.com/wcms18-starwars
 * Description: This plugin displays the current weather for a location.
 * Version:     0.1
 * Author:     Anju Shahi
 * Author URI:  https://thehiveresistance.com
 * License:     WTFPL
 * License URI: http://www.wtfpl.net/
 * Text Domain: wcms18-weather
 * Domain Path: /languages
 */
require("inc/openweathermap.php");
require("inc/class.WeatherWidget.php");
function w18ww_widgets_init() {
	register_widget('WeatherWidget');
}
add_action('widgets_init', 'w18ww_widgets_init');
function w18ww_enqueue_styles() {
	wp_enqueue_style('wcms18-weather', plugin_dir_url(__FILE__) . 'assets/css/wcms18-weather.css');
	wp_enqueue_script('wcms18-weather', plugin_dir_url(__FILE__) . 'assets/js/wcms18-weather.js', ['jquery'], false, true);
	wp_localize_script('wcms18-weather', 'my_ajax_obj', [
		'ajax_url' => admin_url('admin-ajax.php'),
	]);
}
add_action('wp_enqueue_scripts', 'w18ww_enqueue_styles');
/**
 * Respond to AJAX request for 'get_current_weather'
 */
function w18ww_ajax_get_current_weather() {
	$current_weather = owm_get_current_weather('Lund', 'SE');
	wp_send_json($current_weather);
}
add_action('wp_ajax_get_current_weather', 'w18ww_ajax_get_current_weather');
add_action('wp_ajax_nopriv_get_current_weather', 'w18ww_ajax_get_current_weather');
