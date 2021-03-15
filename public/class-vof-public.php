<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://voffice.pro
 * @since      0.0.7
 *
 * @package    Vof
 * @subpackage Vof/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Vof
 * @subpackage Vof/public
 * @author     RA-MICRO Software AG <info@ra-micro.de>
 */
class Vof_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since      0.0.7
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since      0.0.7
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since      0.0.7
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since      0.0.7
	 */
	public function enqueue_styles() {

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/vof-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since      0.0.7
	 */
	public function enqueue_scripts() {
		$lang_dir = ABSPATH . 'wp-content/plugins/vof/languages/';

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/vof-public.js', array( 'jquery', 'wp-i18n' ), $this->version, true );

		$script_params = array(
			'mainAdminUrl' => get_option( 'mainurl' )
		);

		wp_localize_script( $this->plugin_name, 'scriptParams', $script_params );
		wp_set_script_translations($this->plugin_name, 'vof', $lang_dir);

		// wp_enqueue_script( 'axios',"https://unpkg.com/axios/dist/axios.min.js", "", $this->version, false );
	}
	public function voficeDomainChecking(){
	ob_start();

	?>
    <div class="vof__form">
        <p class="vof__form-title"><?php echo __('Please enter your wish domain: ', 'vof');  ?></p>
        <form id="vof-form" class="vof__form-form">
			<span class="vof-form__inputwrap">
				<span>https://</span>
				<input class="vof__form-input" id="vof-input" />
				<span class="vof__form-input--text" id=""><?php echo get_option( 'mainurl' ); ?>.voffice.pro</span>
			</span>
			<span class="vof__form-btn--span notactive" id="vof-btn">
				<span class="vof__form-btn--text notactive" id="vof-btn-text"><?php  echo __('Check it', 'vof'); ?></span>
			</span>
        </form>
        <p class="vof__form-domain"></p>
    </div>
    <?php

	return ob_get_clean();
}

}
