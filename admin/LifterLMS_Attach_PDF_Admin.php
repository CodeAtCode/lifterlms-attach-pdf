<?php
/**
 * LifterLMS_Attach_PDF
 *
 * @package   LifterLMS_Attach_PDF
 * @author    YCodeat <support@codeat.co>
 * @copyright 2018 Codeat
 * @license   GPL 2.0+
 * @link      http://codeat.co
 */
/**
 * This class should ideally be used to work with the administrative side of the WordPress site.
 */
class LifterLMS_Attach_PDF_Admin {
	/**
	 * Instance of this class.
	 *
	 * @var object
	 */
	protected static $instance = null;
	/**
	 * Initialize the plugin by loading admin scripts & styles and adding a
	 * settings page and menu.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public static function initialize() {
		if ( !apply_filters( 'lifterlms_attach_pdf_lap_admin_initialize', true ) ) {
			return;
		}
		require_once( LAP_PLUGIN_ROOT . 'admin/includes/LAP_Enqueue_Admin.php' );
		/*
		 * Load CMB
		 */
		require_once( LAP_PLUGIN_ROOT . 'admin/includes/LAP_CMB.php' );
		/*
		 * All the extras functions
		 */
		require_once( LAP_PLUGIN_ROOT . 'admin/includes/LAP_Extras_Admin.php' );
	}
	/**
	 * Return an instance of this class.
	 *
	 * @since 1.0.0
	 *
	 * @return object A single instance of this class.
	 */
	public static function get_instance() {
		// If the single instance hasn't been set, set it now.
		if ( null === self::$instance ) {
			try {
				self::$instance = new self;
				self::initialize();
			} catch ( Exception $err ) {
				do_action( 'lifterlms_attach_pdf_admin_failed', $err );
				if ( WP_DEBUG ) {
					throw $err->getMessage();
				}
			}
		}
		return self::$instance;
	}
}
add_action( 'plugins_loaded', array( 'LifterLMS_Attach_PDF_Admin', 'get_instance' ) );
