<?php
/**
   * @package   LifterLMS_Attach_PDF
 * @author    YCodeat <support@codeat.co>
 * @copyright 2018 Codeat
 * @license   GPL 2.0+
 * @link      http://codeat.co
 *
 * Plugin Name:       LifterLMS Attach PDF
 * Plugin URI:        @TODO
 * Description:       @TODO
 * Version:           1.0.0
 * Author:            YCodeat
 * Author URI:        http://codeat.co
 * Text Domain:       lifterlms-attach-pdf
 * License:           GPL 2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 * lifterlms-attach-pdf: v2.0.5
 */
// If this file is called directly, abort.
if ( !defined( 'WPINC' ) ) {
	die;
}
define( 'LAP_VERSION', '1.0.0' );
define( 'LAP_TEXTDOMAIN', 'lifterlms-attach-pdf' );
define( 'LAP_NAME', 'LifterLMS Attach PDF' );
define( 'LAP_PLUGIN_ROOT', plugin_dir_path( __FILE__ ) );
define( 'LAP_PLUGIN_ABSOLUTE',  __FILE__  );
/**
 * Load the textdomain of the plugin
 * 
 * @return void
 */
function lap_load_plugin_textdomain() {
	$locale = apply_filters( 'plugin_locale', get_locale(), LAP_TEXTDOMAIN );
	load_textdomain( LAP_TEXTDOMAIN, trailingslashit( WP_PLUGIN_DIR ) . LAP_TEXTDOMAIN . '/languages/' . LAP_TEXTDOMAIN . '-' . $locale . '.mo' );
}
add_action( 'plugins_loaded', 'lap_load_plugin_textdomain', 1 );
require_once( LAP_PLUGIN_ROOT . 'composer/autoload.php' );
require_once( LAP_PLUGIN_ROOT . 'public/LifterLMS_Attach_PDF.php' );
if ( defined( 'WP_CLI' ) && WP_CLI ) {
	require_once( LAP_PLUGIN_ROOT . 'includes/LAP_WPCli.php' );
}
/*
 * If you want to include Ajax within the dashboard, change the following
 * conditional to:
 *
 * if ( is_admin() ) {
 *   ...
 * }
 *
 * The code below is intended to to give the lightest footprint possible.
 */
if ( is_admin() ) {
	if (
			(function_exists( 'wp_doing_ajax' ) && !wp_doing_ajax() ||
			(!defined( 'DOING_AJAX' ) || !DOING_AJAX ) )
	) {
		require_once( LAP_PLUGIN_ROOT . 'admin/LifterLMS_Attach_PDF_Admin.php' );
	}
}
