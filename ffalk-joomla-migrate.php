<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              none
 * @since             1.0.0
 * @package           Ffalk_Joomla_Migrate
 *
 * @wordpress-plugin
 * Plugin Name:       FF AlkovenJoomlaMigrate
 * Plugin URI:        none
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            ENFORMIO
 * Author URI:        none
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       ffalk-joomla-migrate
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'PLUGIN_NAME_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-ffalk-joomla-migrate-activator.php
 */
function activate_ffalk_joomla_migrate() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ffalk-joomla-migrate-activator.php';
	Ffalk_Joomla_Migrate_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-ffalk-joomla-migrate-deactivator.php
 */
function deactivate_ffalk_joomla_migrate() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ffalk-joomla-migrate-deactivator.php';
	Ffalk_Joomla_Migrate_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_ffalk_joomla_migrate' );
register_deactivation_hook( __FILE__, 'deactivate_ffalk_joomla_migrate' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-ffalk-joomla-migrate.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_ffalk_joomla_migrate() {

	$plugin = new Ffalk_Joomla_Migrate();
	$plugin->run();

}
run_ffalk_joomla_migrate();
