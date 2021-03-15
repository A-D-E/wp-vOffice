<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://voffice.pro
 * @since      0.0.7
 *
 * @package    Vof
 * @subpackage Vof/admin/partials
 */
?>


<div class="container-fluid px-4">
<h1><span style="color:#01879d">v</span>Office <?php  echo __('settings', 'vof'); ?></h1>
<form class="row g-3 needs-validation" novalidate id="vof-admin-form" method="post" action="options.php">
<?php  
settings_fields( 'vof' );
do_settings_sections( 'vof' );
?>
  <div class="col-md-4">
    <?php  $selected_option = get_option( 'mainurl' ); ?>
    <p><?php  echo __('Please select your partner-namespace', 'vof'); ?></p>
    <select name="mainurl" class="form-select form-select-lg" aria-label="Default select example">
        <option selected><?php  echo __('Please select your option: ', 'vof'); ?></option>
        <option value="" <?php  if($selected_option === ''){ echo "selected";}; ?>><?php  echo __('Standard', 'vof'); ?></option>
        <option value=".ra-micro" <?php  if($selected_option === '.ra-micro'){ echo "selected";}; ?>><?php  echo __('RA-MICRO', 'vof'); ?></option>
    </select>
  </div>
  <div class="col-12">
    <button class="btn btn-primary" type="submit" id="vof-set-admin-btn"><?php  echo __('Save', 'vof'); ?></button>
  </div>
</form>
</div>
