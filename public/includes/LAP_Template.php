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
 * This class contain the Templating stuff for the frontend
 */
class Lap_Template {
	/**
	 * Initialize the class
	 */
	public function initialize() {
		if ( !apply_filters( 'lifterlms_attach_pdf_lap_template_initialize', true ) ) {
			return;
		}
		
	}
	
}
$lap_template = new Lap_Template();
$lap_template->initialize();
do_action( 'lifterlms_attach_pdf_lap_template_instance', $lap_template );
