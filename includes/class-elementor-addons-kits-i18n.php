<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://thatpeoples.com/
 * @since      1.0.0
 *
 * @package    Elementor_Addons_Kits
 * @subpackage Elementor_Addons_Kits/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Elementor_Addons_Kits
 * @subpackage Elementor_Addons_Kits/includes
 * @author     Rahul Harkhani <rahul.harkhani11@gmail.com>
 */
class Elementor_Addons_Kits_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'tp-elementor-addons-kits',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
