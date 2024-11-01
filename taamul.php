<?php
/**
 * Plugin Name:       Taamul
 * Plugin URI:        https://www.taamul.com
 * Description:       The simplest way to collect user feedback, right on your website.
 * Author:            Taamul
 * Author URI:        https://taamul.com
 * Version:           1.0.4
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       taamul
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 */
define( 'TAAMUL_VERSION', '1.0.4' );
define( 'TAAMUL_SORT_NAME', 'taamul' );
/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-taamul-activator.php
 */
function activate_taamul() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-taamul-activator.php';
	Taamul_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-taamul-deactivator.php
 */
function deactivate_taamul() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-taamul-deactivator.php';
	Taamul_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_taamul' );
register_deactivation_hook( __FILE__, 'deactivate_taamul' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-taamul.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.4
 */
function run_taamul() {
	global $taamul_success_msg, $taamul_errors_msg;
	$plugin = new Taamul();
	$plugin->run();
}
run_taamul();
