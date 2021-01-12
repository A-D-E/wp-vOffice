<?php

/**
 *
 * @link       https://voffice.pro
 * @since      1.0.0
 *
 * @package    Vof
 * @subpackage Vof/public/partials
 */
?>

<?php

add_shortcode( 'voffice', 'voficeDomainChecking' );

function voficeDomainChecking(){
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
