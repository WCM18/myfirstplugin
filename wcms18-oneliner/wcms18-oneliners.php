<?php
/**
 * Plugin Name: WCMS18 Oneliners
 * Plugin URI:  https://thehiveresistance.com/wcms18-starwars
 * Description: This plugin for displaying funny oneliners in a widget.
 * Version:     0.1
 * Author:      Anju
 * Author URI:  https://thehiveresistance.com
 * License:     WTFPL
 * License URI: http://www.wtfpl.net/
 * Text Domain: wcms18-oneliners
 * Domain Path: /languages
 */
require("inc/oneliners.php");
require("inc/class.OnelinerWidget.php");
function w18ol_widgets_init() {
	register_widget('OnelinerWidget');
}
add_action('widgets_init', 'w18ol_widgets_init');
function w18ol_enqueue_styles() {
	wp_enqueue_style('wcms18-oneliners', plugin_dir_url(__FILE__) . 'assets/css/wcms18-oneliners.css');
	wp_enqueue_script('wcms18-oneliners-js', plugin_dir_url(__FILE__) . 'assets/js/wcms18-oneliners.js', ['jquery'], false, true);
	wp_localize_script('wcms18-oneliners-js', 'w18ol_settings', [
		'ajax_url' => admin_url('admin-ajax.php'),
	]);
}
add_action('wp_enqueue_scripts', 'w18ol_enqueue_styles');
/**
 * Register function for handling AJAX action 'get_oneliner'
 */
function w18ol_ajax_get_oneliner() {
	global $oneliners;
	$oneliner_index = array_rand($oneliners);
	$oneliner = $oneliners[$oneliner_index];
	echo $oneliner;
	// echo $oneliners[array_rand($oneliners)];
	wp_die();
}
add_action('wp_ajax_get_oneliner', 'w18ol_ajax_get_oneliner');
add_action('wp_ajax_nopriv_get_oneliner', 'w18ol_ajax_get_oneliner');