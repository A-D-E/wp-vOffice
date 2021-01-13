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
    <label for="validationCustomUsername" class="form-label">Bitte tragen Sie Ihre main-url ein: </label>
    <div class="input-group has-validation">
      <input name="mainurl" type="text" class="form-control" id="validationCustomUsername" placeholder="" aria-describedby="inputGroupPrepend" required value="<?php echo get_option( 'mainurl' ); ?>">
      <span class="input-group-text" id="inputGroupPrepend">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-link" viewBox="0 0 16 16">
            <path d="M6.354 5.5H4a3 3 0 0 0 0 6h3a3 3 0 0 0 2.83-4H9c-.086 0-.17.01-.25.031A2 2 0 0 1 7 10.5H4a2 2 0 1 1 0-4h1.535c.218-.376.495-.714.82-1z"/>
            <path d="M9 5.5a3 3 0 0 0-2.83 4h1.098A2 2 0 0 1 9 6.5h3a2 2 0 1 1 0 4h-1.535a4.02 4.02 0 0 1-.82 1H12a3 3 0 1 0 0-6H9z"/>
        </svg>
        </span>
      <div class="invalid-feedback">
        Bitte überprüfen Sie Ihre Angaben
      </div>
    </div>
  </div>
  <div class="col-12">
    <button class="btn btn-primary" type="submit" id="vof-set-admin-btn">Speichern</button>
  </div>
</form>
</div>