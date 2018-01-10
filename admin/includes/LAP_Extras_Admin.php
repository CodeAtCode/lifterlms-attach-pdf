<?php
/**
 * Plugin_name
 * 
 * @package   Plugin_name
 * @author    YCodeat <support@codeat.co>
 * @copyright 2018 Codeat
 * @license   GPL 2.0+
 * @link      http://codeat.co
 */
/**
 * This class contain all the snippet or extra that improve the experience on the backend
 */
class Lap_Extras_Admin {
	/**
	 * Initialize the snippet
	 */
	function initialize() {
			}
				}
$lap_extras_admin = new Lap_Extras_Admin();
$lap_extras_admin->initialize();
do_action( 'lifterlms_attach_pdf_lap_extras_admin_instance', $lap_extras_admin );
