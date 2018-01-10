<?php
/**
 * Represents the view for the administration dashboard.
 *
 * This includes the header, options, and other information that should provide
 * The User Interface to the end user.
 *
 * @package   LifterLMS_Attach_PDF
 * @author    YCodeat <support@codeat.co>
 * @copyright 2018 Codeat
 * @license   GPL 2.0+
 * @link      http://codeat.co
 */
?>
<div class="wrap">
    <h2><?php echo esc_html( get_admin_page_title() ); ?></h2>
    <div id="tabs" class="settings-tab">
		<ul>
			<li><a href="#tabs-1"><?php _e( 'Settings' ); ?></a></li>
		</ul>
		<?php
		require_once( plugin_dir_path( __FILE__ ) . 'settings.php' );		?>
		<?php
				?>
    </div>
    <div class="right-column-settings-page metabox-holder">
		<div class="postbox">
			<h3 class="hndle"><span><?php _e( 'About Codeat<F20>[<0;133;15M', LAP_TEXTDOMAIN ); ?></span></h3>
			<div class="inside">
				<a href="https://github.com/codeatcode/lifterlms-attach-pdf"><img src="https://raw.githubusercontent.com/WPBP/boilerplate-assets/master/icon-256x256.png" alt=""></a>
			</div>
		</div>
    </div>
</div>
