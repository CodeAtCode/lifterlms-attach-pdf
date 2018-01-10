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
 * This class contain the Enqueue stuff for the frontend
 */
class Lap_Enqueue {
	/**
	 * Initialize the class
	 */
	public function initialize() {
		if ( !apply_filters( 'lifterlms_attach_pdf_lap_enqueue_initialize', true ) ) {
			return;
		}
		// Load public-facing style sheet and JavaScript.
		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'enqueue_styles' ) );
		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'enqueue_scripts' ) );
		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'enqueue_js_vars' ) );
	}
		/**
	 * Register and enqueue public-facing style sheet.
	 *
	 * @since 1.0.0
	 * 
	 * @return void
	 */
	public static function enqueue_styles() {
		wp_enqueue_style( LAP_TEXTDOMAIN . '-plugin-styles', plugins_url( 'public/assets/css/public.css', LAP_PLUGIN_ABSOLUTE ), array(), LAP_VERSION );
	}
			/**
	 * Register and enqueues public-facing JavaScript files.
	 *
	 * @since 1.0.0
	 * 
	 * @return void
	 */
	public static function enqueue_scripts() {
		wp_enqueue_script( LAP_TEXTDOMAIN . '-plugin-script', plugins_url( 'public/assets/js/public.js', LAP_PLUGIN_ABSOLUTE ), array( 'jquery' ), LAP_VERSION );
	}
			/**
	 * Print the PHP var in the HTML of the frontend for access by JavaScript
	 *
	 * @since 1.0.0
	 * 
	 * @return void
	 */
	public static function enqueue_js_vars() {
		wp_localize_script( LAP_TEXTDOMAIN . '-plugin-script', 'lap_js_vars', array(
			'alert' => __( 'Hey! You have clicked the button!', LAP_TEXTDOMAIN )
				)
		);
	}
	
}
$lap_enqueue = new Lap_Enqueue();
$lap_enqueue->initialize();
do_action( 'lifterlms_attach_pdf_lap_enqueue_instance', $lap_enqueue );
