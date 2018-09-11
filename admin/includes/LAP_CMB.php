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
 * All the CMB related code.
 */
class Lap_CMB {
	/**
	 * Initialize CMB2.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		require_once( 'lib/cmb2/init.php' );
		add_action( 'cmb2_init', array( $this, 'pdf_metabox' ) );
	}
	/**
	 * PDF metabox
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function pdf_metabox() {
		// Start with an underscore to hide fields from custom fields list
		$prefix = '_llms_attach_pdf_';
		
		$cmb_pdfs = new_cmb2_box( array(
			'id' => $prefix . 'metabox',
			'title' => __( 'Attach a PDF', LAP_TEXTDOMAIN ),
			'object_types' => array( 'llms_order' ), // Post type
			'context' => 'normal',
			'priority' => 'low',
			'show_names' => true, // Show field names on the left
		) );

		$cmb_pdfs_group = $cmb_pdfs->add_field( array(
			'id' => $prefix . 'group',
			'type' => 'group',
			'options' => array(
				'group_title' => __( 'Fattura {#}', LAP_TEXTDOMAIN ),
				'add_button' => __( 'Aggiungi Nuova Fattura', LAP_TEXTDOMAIN ),
				'remove_button' => __( 'Rimuovi Fattura', LAP_TEXTDOMAIN ),
				'sortable' => false
			),
			'after_group' => array( $this, 'repeatable_title' ),
		) );
		$cmb_pdfs->add_group_field( $cmb_pdfs_group, array(
			'id' => $prefix . 'name',
			'name' => __( 'Nome Fattura', LAP_TEXTDOMAIN ),
			'type' => 'text'
		) );
		$cmb_pdfs->add_group_field( $cmb_pdfs_group, array(
			'name' => __( 'PDF', LAP_TEXTDOMAIN ),
            'id' => $prefix . 'url',
			'type' => 'file',
	        'query_args' => array(
        		'type' => 'application/pdf', // Make library only display PDFs.
        	),
            'preview_size' => 'large',
		) );
		
    }
    
    public function repeatable_title() {
        ?>
        <script type="text/javascript">
            (function($) {
                var $box = $( document.getElementById( '_llms_attach_pdf_metabox' ) );
                var replaceTitles = function() {
                    $box.find( '.cmb-group-title' ).each( function() {
                        var $this = $( this );
                        var txt = $this.next().find( '[id$="name"]' ).val();
                        var rowindex;
                        if ( ! txt ) {
                            txt = $box.find( '[data-grouptitle]' ).data( 'grouptitle' );
                            if ( txt ) {
                                rowindex = $this.parents( '[data-iterator]' ).data( 'iterator' );
                                txt = txt.replace( '{#}', ( rowindex + 1 ) );
                            }
                        }
                        if ( txt ) {
                            $this.text( txt );
                        }
                    });
                };
                var replaceOnKeyUp = function( evt ) {
                    var $this = $( evt.target );
                    var id = 'title';
                    if ( evt.target.id.indexOf(id, evt.target.id.length - id.length) !== -1 ) {
                        console.log( 'val', $this.val() );
                        $this.parents( '.cmb-row.cmb-repeatable-grouping' ).find( '.cmb-group-title' ).text( $this.val() );
                    }
                };
                $box
                    .on( 'cmb2_add_row cmb2_shift_rows_complete', function( evt ) {
                        replaceTitles();
                    })
                    .on( 'keyup', replaceOnKeyUp );
                replaceTitles();
            })( jQuery );
        </script>
        <?php
    }
}

new Lap_CMB();
