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
 * This class contain all the snippet or extra that improve the experience on the frontend
 */
class Lap_Extras {
	/**
	 * Initialize the snippet
	 */
	function initialize() {
	}
	}
$lap_extras = new Lap_Extras();
$lap_extras->initialize();
do_action( 'lifterlms_attach_pdf_lap_extras_instance', $lap_extras );
