<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://example.com
 * @since             1.0.0
 * @package           Okin_Plugin
 *
 * @wordpress-plugin
 * Plugin Name:       Okin Plugin
 * Plugin URI:        https://okinsport.com
 * Description:       Plugin para crear landing pages para atletas en okinsport.com.
 * Version:           1.0.0
 * Author:            Araima Rodríguez
 * Author URI:        http://ARod84.github.io
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       okin-plugin
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
define( 'OKIN_PLUGIN_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-plugin-name-activator.php
 */
function activate_okin_plugin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-okin-plugin-activator.php';
	Okin_Plugin_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-plugin-name-deactivator.php
 */
function deactivate_okin_plugin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-okin-plugin-deactivator.php';
	Okin_Plugin_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_okin_plugin' );
register_deactivation_hook( __FILE__, 'deactivate_okin_plugin' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-okin-plugin.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_okin_plugin() {

	$plugin = new Okin_Plugin();
	$plugin->run();

}
run_okin_plugin();
