<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://voffice.pro
 * @since      0.0.4
 *
 * @package    Vof
 * @subpackage Vof/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Vof
 * @subpackage Vof/admin
 * @author     RA-MICRO Software AG <info@ra-micro.de>
 */
class Vof_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since      0.0.4
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since      0.0.4
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since      0.0.4
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since      0.0.4
	 */
	public function enqueue_styles() {

		wp_enqueue_style( 'bootstrap', plugin_dir_url( __FILE__ ) . 'css/bootstrap.css', array(), $this->version, 'all' );

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/vof-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since      0.0.4
	 */
	public function enqueue_scripts() {
		$lang_dir = ABSPATH . 'wp-content/plugins/wp-vOffice/languages/';

		wp_enqueue_script( 'bootstrap', plugin_dir_url( __FILE__ ) . 'js/bootstrap.js', array( 'jquery' ), '5.01', false );

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/vof-admin.js', array( 'jquery', 'wp-i18n' ), $this->version, true );

		wp_set_script_translations($this->plugin_name, 'vof', $lang_dir);

	}

	public function admin_menu_vof()
	{
		add_menu_page( 'vOffice Domain-Checking', 'vOffice', 'manage_options', 'vof/mainsettings.php', array($this, 'vof_admin_page') ,'dashicons-admin-links', 50);
	}

	public function vof_admin_page()
	{
		require_once "partials/vof-admin-display.php";
	}

	public function register_vof_settings()
	{
		register_setting( 'vof', 'mainurl' );
	}

}