<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://voffice.pro
 * @since             0.0.7.1
 * @package           Vof
 *
 * @wordpress-plugin
 * Plugin Name:       vOffice Domain Check
 * Plugin URI:        https://voffice.pro
 * Description:       vOffice URL-Checking
 * Version:           0.0.7.1
 * Author:            RA-MICRO Software AG
 * Author URI:        https://voffice.pro
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       vof
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 0.0.7.1 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'VOF_VERSION', '0.0.7.1' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-vof-activator.php
 */
function activate_vof() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-vof-activator.php';
	Vof_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-vof-deactivator.php
 */
function deactivate_vof() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-vof-deactivator.php';
	Vof_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_vof' );
register_deactivation_hook( __FILE__, 'deactivate_vof' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-vof.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since      0.0.7.1
 */
function run_vof() {

	$plugin = new Vof();
	$plugin->run();

}
run_vof();
