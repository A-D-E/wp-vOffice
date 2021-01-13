<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://voffice.pro
 * @since      1.0.0
 *
 * @package    Vof
 * @subpackage Vof/admin/partials
 */
?>


<div class="container-fluid px-4">
<h1><span style="color:#01879d">v</span>Office Einstellungen</h1>
<form class="row g-3 needs-validation" novalidate id="vof-admin-form" method="post" action="options.php">
<?php  
settings_fields( 'vof' );
do_settings_sections( 'vof' );
?>
  <div class="col-md-4">
    <?php  $selected_option = get_option( 'mainurl' ); ?>
    <select name="mainurl" class="form-select form-select-lg" aria-label="Default select example">
        <option selected>Bitte wählen Sie Ihre option: </option>
        <option value="ch" <?php  if($selected_option === 'ch'){ echo "selected";}; ?>>CH</option>
        <option value="es" <?php  if($selected_option === 'es'){ echo "selected";}; ?>>ES</option>
    </select>
  </div>
  <div class="col-12">
    <button class="btn btn-primary" type="submit" id="vof-set-admin-btn">Speichern</button>
  </div>
</form>
</div>
