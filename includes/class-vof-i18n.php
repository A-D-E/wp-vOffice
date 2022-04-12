<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://voffice.pro
 * @since      1.0.7
 *
 * @package    Vof
 * @subpackage Vof/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.7
 * @package    Vof
 * @subpackage Vof/includes
 * @author     RA-MICRO Software AG <info@ra-micro.de>
 */
class Vof_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since      1.0.7
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'vof',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
