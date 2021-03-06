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
 * This class contain the Enqueue stuff for the backend
 */
class Lap_Enqueue_Admin {

	/**
	 * Slug of the plugin screen.
	 *
	 * @var string
	 */
    protected $admin_view_page = null;

	/**
	 * Initialize the class
	 */
	public function initialize() {
		if ( !apply_filters( 'lifterlms_attach_pdf_lap_enqueue_admin_initialize', true ) ) {
			return;
		}

		// Add the options page and menu item.
		add_action( 'admin_menu', array( $this, 'add_plugin_admin_menu' ) );
		// Add an action link pointing to the options page.
		$plugin_basename = plugin_basename( plugin_dir_path( realpath( dirname( __FILE__ ) ) ) . LAP_TEXTDOMAIN . '.php' );
		add_filter( 'plugin_action_links_' . $plugin_basename, array( $this, 'add_action_links' ) );
		// Load admin style sheet and JavaScript.
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_styles' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_scripts' ) );
	}

	/**
	 * Register and enqueue admin-specific style sheet.
	 *
	 * @since 1.0.0
	 *
	 * @return mixed Return early if no settings page is registered.
	 */
	public function enqueue_admin_styles() {
		if ( !isset( $this->admin_view_page ) ) {
			return;
		}

		$screen = get_current_screen();
		if ( $this->admin_view_page === $screen->id || strpos( $_SERVER[ 'REQUEST_URI' ], 'index.php' ) || strpos( $_SERVER[ 'REQUEST_URI' ], get_bloginfo( 'wpurl' ) . '/wp-admin/' ) ) {
			wp_enqueue_style( LAP_TEXTDOMAIN . '-settings-styles', plugins_url( 'admin/assets/css/settings.css', LAP_PLUGIN_ABSOLUTE ), array( 'dashicons' ), LAP_VERSION );
        }

		wp_enqueue_style( LAP_TEXTDOMAIN . '-admin-styles', plugins_url( 'admin/assets/css/admin.css', LAP_PLUGIN_ABSOLUTE ), array( 'dashicons' ), LAP_VERSION );
    }

	/**
	 * Register and enqueue admin-specific JavaScript.
	 *
	 * @since 1.0.0
	 *
	 * @return mixed Return early if no settings page is registered.
	 */
	public function enqueue_admin_scripts() {
		if ( !isset( $this->admin_view_page ) ) {
			return;
		}

		$screen = get_current_screen();
		if ( $this->admin_view_page === $screen->id ) {
			wp_enqueue_script( LAP_TEXTDOMAIN . '-settings-script', plugins_url( 'admin/assets/js/settings.js', LAP_PLUGIN_ABSOLUTE ), array( 'jquery', 'jquery-ui-tabs' ), LAP_VERSION );
		}

		wp_enqueue_script( LAP_TEXTDOMAIN . '-admin-script', plugins_url( 'admin/assets/js/admin.js', LAP_PLUGIN_ABSOLUTE ), array( 'jquery' ), LAP_VERSION );
	}

	/**
	 * Register the administration menu for this plugin into the WordPress Dashboard menu.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function add_plugin_admin_menu() {
        /*
         * Add a settings page for this plugin to the main menu
         *
         */
        $this->admin_view_page = add_submenu_page( 'lifterlms', __( 'LifterLMS Attach PDF', LAP_TEXTDOMAIN ), __( 'Attach PDF', LAP_TEXTDOMAIN ), 'manage_options', LAP_TEXTDOMAIN, array( $this, 'display_plugin_admin_page' ) );
    }

    /**
     * Render the settings page for this plugin.
     *
     * @since 1.0.0
     *
     * @return void
     */
    public function display_plugin_admin_page() {
        include_once( LAP_PLUGIN_ROOT . 'admin/views/admin.php' );
    }

    /**
     * Add settings action link to the plugins page.
     *
     * @since 1.0.0
     *
     * @param array $links Array of links.
     *
     * @return array
     */
    public function add_action_links( $links ) {
        return array_merge(
            array(
                'settings' => '<a href="' . admin_url( 'options-general.php?page=' . LAP_TEXTDOMAIN ) . '">' . __( 'Settings' ) . '</a>',
                'donate'   => '<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business=danielemte90@alice.it&item_name=Donation">' . __( 'Donate', LAP_TEXTDOMAIN ) . '</a>',
            ), $links
        );
    }

}

$lap_enqueue_admin = new Lap_Enqueue_Admin();
$lap_enqueue_admin->initialize();
do_action( 'lifterlms_attach_pdf_lap_enqueue_admin_instance', $lap_enqueue_admin );
