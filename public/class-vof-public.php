<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://voffice.pro
 * @since      0.0.2
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
	 * @since      0.0.2
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since      0.0.2
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since      0.0.2
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
	 * @since      0.0.2
	 */
	public function enqueue_styles() {

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/vof-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since      0.0.2
	 */
	public function enqueue_scripts() {

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/vof-public.js', array( 'jquery' ), $this->version, true );

		$script_params = array(
			'mainAdminUrl' => get_option( 'mainurl' )
		);

		wp_localize_script( $this->plugin_name, 'scriptParams', $script_params );
		wp_enqueue_script( 'axios',"https://unpkg.com/axios/dist/axios.min.js", "", $this->version, false );

	}

	public function voficeDomainChecking(){
	ob_start();

	?>
    <div class="vof__form">
        <p class="vof__form-title">Bitte tragen Sie Ihr Wunschdomain ein:</p>
        <form id="vof-form" class="vof__form-form">
            <input class="vof__form-input" id="vof-input" />
            <span class="vof__form-img sending" id="spiner"><img src="<?php echo plugins_url( 'img/logo.gif', __FILE__ ); ?>" alt="Checking"></span>
            <span id="vof-btn" class="vof__form-img notactive"><img src="<?php echo plugins_url( 'img/logo.svg', __FILE__ ); ?>" alt="Checking"></span>
        </form>
        <p class="vof__form-domain"></p>
    </div>
    <?php

	return ob_get_clean();
}

}
