<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       none
 * @since      1.0.0
 *
 * @package    Ffalk_Joomla_Migrate
 * @subpackage Ffalk_Joomla_Migrate/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Ffalk_Joomla_Migrate
 * @subpackage Ffalk_Joomla_Migrate/includes
 * @author     ENFORMIO <gerald@zukrigl.at>
 */
class Ffalk_Joomla_Migrate_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'ffalk-joomla-migrate',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
