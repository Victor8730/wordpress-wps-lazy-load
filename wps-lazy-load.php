<?php
/**
 *
 * @since             1.0.0
 * @package           Wps_Lazy_Load
 * @wordpress-plugin
 * Plugin Name: Wps lazy load
 * Description: Plugin for organizing lazy loading of images
 * Version: 1.0.0
 * Author URI:  https://webpagestudio.net
 * Author: Victor Galiuzov
 * License:     GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
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
define( 'WPS_LAZY_LOAD_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wps-lazy-load-activator.php
 */
function activate_wps_lazy_load() {
    require_once plugin_dir_path( __FILE__ ) . 'includes/class-wps-lazy-load-activator.php';
    Wps_Lazy_Load_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wps-lazy-load-deactivator.php
 */
function deactivate_wps_lazy_load() {
    require_once plugin_dir_path( __FILE__ ) . 'includes/class-wps-lazy-load-deactivator.php';
    Wps_Lazy_Load_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wps_lazy_load' );
register_deactivation_hook( __FILE__, 'deactivate_wps_lazy_load' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wps-lazy-load.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wps_lazy_load() {

    $plugin = new Wps_Lazy_Load();
    $plugin->run();

}

run_wps_lazy_load();
