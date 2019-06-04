<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://localhost/myfirstplugin.test/page-called-page/
 * @since      1.0.0
 *
 * @package    Wcm18_Random_Dog
 * @subpackage Wcm18_Random_Dog/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Wcm18_Random_Dog
 * @subpackage Wcm18_Random_Dog/includes
 * @author     Anju <shahi.anju2000@gmail.com>
 */
class Wcm18_Random_Dog_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'wcm18-random-dog',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
