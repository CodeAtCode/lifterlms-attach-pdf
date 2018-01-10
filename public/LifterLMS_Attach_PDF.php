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
 * This class should ideally be used to work with the public-facing side of the WordPress site.
 */
class LifterLMS_Attach_PDF {
	/**
	 * Instance of this class.
	 *
	 * @var object
	 */
	private static $instance;
	
	/**
	 * Initialize the plugin by setting localization and loading public scripts
	 * and styles.
	 *
	 * @since 1.0.0
	 * 
	 * @return void
	 */
	public static function initialize() {
			require_once( LAP_PLUGIN_ROOT . 'public/includes/LAP_Enqueue.php' );
			require_once( LAP_PLUGIN_ROOT . 'public/includes/LAP_Extras.php' );
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
				do_action( 'lifterlms_attach_pdf_failed', $err );
				if ( WP_DEBUG ) {
					throw $err->getMessage();
				}
			}
		}
		return self::$instance;
	}
}
/*
 * @TODO:
 *
 * - 9999 is used for load the plugin as last for resolve some
 *   problems when the plugin use API of other plugins, remove
 *   if you don' want this
 */
add_action( 'plugins_loaded', array( 'LifterLMS_Attach_PDF', 'get_instance' ), 9999 );
