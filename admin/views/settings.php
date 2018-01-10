<div id="tabs-1" class="wrap">
			<?php
            /*
                Settings view
            */
			$cmb = new_cmb2_box( array(
				'id' => LAP_TEXTDOMAIN . '_options',
				'hookup' => false,
				'show_on' => array( 'key' => 'options-page', 'value' => array( LAP_TEXTDOMAIN ) ),
				'show_names' => true,
					) );
			$cmb->add_field( array(
				'name' => __( 'Label for the PDF', LAP_TEXTDOMAIN ),
				'desc' => __( 'This term will used to label the file on the frontend', LAP_TEXTDOMAIN ),
				'id' => 'text',
				'type' => 'text',
				'default' => 'Invoice',
			) );

			cmb2_metabox_form( LAP_TEXTDOMAIN . '_options', LAP_TEXTDOMAIN . '-settings' );
			?>
		</div>
