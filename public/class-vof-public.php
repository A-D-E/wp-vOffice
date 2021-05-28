<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://voffice.pro
 * @since      1.0.3
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
	 * @since      1.0.3
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since      1.0.3
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since      1.0.3
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
	 * @since      1.0.3
	 */
	public function enqueue_styles() {

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/vof-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since      1.0.3
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
		$locale = get_locale();
		$german = (get_locale() === "de_DE" || get_locale() === "de_DE_formal");
		?>
		
		<vof-checker 
				isRaMicro="<?php echo get_option( 'is-ra-micro' ); ?>"
				partnerId="<?php echo get_option( 'partner-id' ); ?>"
				placeholder="<?php echo ( $german ? get_option( 'slot-placeholder-de' ) : get_option( 'slot-placeholder-en' )); ?>"
				>
				<span slot="label"><?php echo ( $german ? get_option( 'slot-label-de' ) : get_option( 'slot-label-en' )); ?></span>
				<span slot="feedback"><?php echo ( $german ? get_option( 'slot-feedback-de' ) : get_option( 'slot-feedback-en' )); ?></span>
				<span slot="button"><?php echo ( $german ?  get_option( 'slot-button-de' ) : get_option( 'slot-button-en' )); ?></span>
				<span slot="setup-button"><?php echo ( $german ? get_option( 'slot-setup-button-de' ) : get_option( 'slot-setup-button-en' )); ?></span>
				<span slot="chip-error"><?php echo ( $german ? get_option( 'slot-chip-error-de' ) :  get_option( 'slot-chip-error-en' )); ?></span>
				<span slot="chip-success"><?php echo ( $german ? get_option( 'slot-chip-success-de' ) : get_option( 'slot-chip-success-en' )); ?></span>
				
			</vof-checker>
		<?php

		return ob_get_clean();
	}

}
