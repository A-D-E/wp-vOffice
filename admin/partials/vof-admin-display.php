<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://voffice.pro
 * @since      1.0.3
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
  <div class="col-md-12">
    <?php  
      $selected_option = get_option( 'mainurl' ); 
      $is_ra_micro = get_option( 'is-ra-micro' );
      $partner_id = get_option( 'partner-id' );
      $slot_label_de = get_option( 'slot-label-de' );
      $slot_label_en = get_option( 'slot-label-en' );
      $slot_feedback_de = get_option( 'slot-feedback-de' );
      $slot_feedback_en = get_option( 'slot-feedback-en' );
      $slot_button_de = get_option( 'slot-button-de' );
      $slot_button_en = get_option( 'slot-button-en' );
      $slot_setup_button_de = get_option( 'slot-setup-button-de' );
      $slot_setup_button_en = get_option( 'slot-setup-button-en' );
      $slot_chip_error_de = get_option( 'slot-chip-error-de' );
      $slot_chip_error_en = get_option( 'slot-chip-error-en' );
      $slot_chip_success_de = get_option( 'slot-chip-success-de' );
      $slot_chip_success_en = get_option( 'slot-chip-success-en' );
      $slot_placeholder_de = get_option( 'slot-placeholder-de' );
      $slot_placeholder_en = get_option( 'slot-placeholder-en' );
    ?>
    <p><?php  echo __('Please select your partner-namespace', 'vof'); ?></p>
    <select name="is-ra-micro" class="form-select form-select-lg" aria-label="Default select example">
        <option selected><?php  echo __('Please select your option: ', 'vof'); ?></option>
        <option value="" <?php  if($selected_option === ''){ echo "selected";}; ?>><?php  echo __('Standard', 'vof'); ?></option>
        <option value="ja" <?php  if($selected_option === 'ja'){ echo "selected";}; ?>><?php  echo __('RA-MICRO', 'vof'); ?></option>
    </select>
  </div>

    <div class="form-group">
      <label for="slot-label-de">Label</label>
      <div class="input-group">
      <div class="input-group-prepend"><span class="input-group-text" id="slot-label-de">DE</span></div>
      <div class="col-md-3"><input value="<?php echo $slot_label_de; ?>" type="text" class="form-control mb-2" name="slot-label-de" id="slot-label-de" aria-describedby="slot-label-de" /></div>
      </div>
      <div class="input-group">
      <div class="input-group-prepend"><span class="input-group-text" id="slot-label-en">EN</span></div>
      <div class="col-md-3"><input value="<?php echo $slot_label_en; ?>" type="text" class="form-control mb-2" name="slot-label-en" id="slot-label-en" aria-describedby="slot-label-en" /></div>
      </div>
    </div>

    <div class="form-group">
      <label for="slot-feedback-de">Feedback</label>
      <div class="input-group">
      <div class="input-group-prepend"><span class="input-group-text" id="slot-feedback-de">DE</span></div>
      <div class="col-md-3"><input value="<?php echo $slot_feedback_de; ?>" type="text" class="form-control mb-2" name="slot-feedback-de" id="slot-feedback-de" aria-describedby="slot-feedback-de" /></div>
      </div>
      <div class="input-group">
      <div class="input-group-prepend"><span class="input-group-text" id="slot-feedback-en">EN</span></div>
      <div class="col-md-3"><input value="<?php echo $slot_feedback_en; ?>" type="text" class="form-control mb-2" name="slot-feedback-en" id="slot-feedback-en" aria-describedby="slot-feedback-en" /></div>
      </div>
    </div>

    <div class="form-group">
      <label for="slot-button-de">Button</label>
      <div class="input-group">
      <div class="input-group-prepend"><span class="input-group-text" id="slot-button-de">DE</span></div>
      <div class="col-md-3"><input value="<?php echo $slot_button_de; ?>" type="text" class="form-control mb-2" name="slot-button-de" id="slot-button-de" aria-describedby="slot-button-de" /></div>
      </div>
      <div class="input-group">
      <div class="input-group-prepend"><span class="input-group-text" id="slot-button-en">EN</span></div>
      <div class="col-md-3"><input value="<?php echo $slot_button_en; ?>" type="text" class="form-control mb-2" name="slot-button-en" id="slot-button-en" aria-describedby="slot-button-en" /></div>
      </div>
    </div>

    <div class="form-group">
      <label for="slot-setup-button-de">Setup Button</label>
      <div class="input-group">
      <div class="input-group-prepend"><span class="input-group-text" id="slot-setup-button-de">DE</span></div>
      <div class="col-md-3"><input value="<?php echo $slot_setup_button_de; ?>" type="text" class="form-control mb-2" name="slot-setup-button-de" id="slot-setup-button-de" aria-describedby="slot-setup-button-de" /></div>
      </div>
      <div class="input-group">
      <div class="input-group-prepend"><span class="input-group-text" id="slot-setup-button-en">EN</span></div>
      <div class="col-md-3"><input value="<?php echo $slot_setup_button_en; ?>" type="text" class="form-control mb-2" name="slot-setup-button-en" id="slot-setup-button-en" aria-describedby="slot-setup-button-en" /></div>
      </div>
    </div>

    <div class="form-group">
      <label for="slot-chip-error-de">Chip error</label>
      <div class="input-group">
      <div class="input-group-prepend"><span class="input-group-text" id="slot-chip-error-de">DE</span></div>
      <div class="col-md-3"><input value="<?php echo $slot_chip_error_de; ?>" type="text" class="form-control mb-2" name="slot-chip-error-de" id="slot-chip-error-de" aria-describedby="slot-chip-error-de" /></div>
      </div>
      <div class="input-group">
      <div class="input-group-prepend"><span class="input-group-text" id="slot-chip-error-en">EN</span></div>
      <div class="col-md-3"><input value="<?php echo $slot_chip_error_en; ?>" type="text" class="form-control mb-2" name="slot-chip-error-en" id="slot-chip-error-en" aria-describedby="slot-chip-error-en" /></div>
      </div>
    </div>

    <div class="form-group">
      <label for="slot-chip-success-de">Chip success</label>
      <div class="input-group">
      <div class="input-group-prepend"><span class="input-group-text" id="slot-chip-success-de">DE</span></div>
      <div class="col-md-3"><input value="<?php echo $slot_chip_success_de; ?>" type="text" class="form-control mb-2" name="slot-chip-success-de" id="slot-chip-success-de" aria-describedby="slot-chip-success-de" /></div>
      </div>
      <div class="input-group">
      <div class="input-group-prepend"><span class="input-group-text" id="slot-chip-success-en">EN</span></div>
      <div class="col-md-3"><input value="<?php echo $slot_chip_success_en; ?>" type="text" class="form-control mb-2" name="slot-chip-success-en" id="slot-chip-success-en" aria-describedby="slot-chip-success-en" /></div>
      </div>
    </div>

    <div class="form-group">
      <label for="slot-chip-success-de">Placeholder</label>
      <div class="input-group">
      <div class="input-group-prepend"><span class="input-group-text" id="slot-placeholder-de">DE</span></div>
      <div class="col-md-3"><input value="<?php echo $slot_placeholder_de; ?>" type="text" class="form-control mb-2" name="slot-placeholder-de" id="slot-placeholder-de" aria-describedby="slot-placeholder-de" /></div>
      </div>
      <div class="input-group">
      <div class="input-group-prepend"><span class="input-group-text" id="slot-placeholder-en">EN</span></div>
      <div class="col-md-3"><input value="<?php echo $slot_placeholder_en; ?>" type="text" class="form-control mb-2" name="slot-placeholder-en" id="slot-placeholder-en" aria-describedby="slot-placeholder-en" /></div>
      </div>
    </div>

  <div class="col-12">
    <button class="btn btn-primary" type="submit" id="vof-set-admin-btn"><?php  echo __('Save', 'vof'); ?></button>
  </div>
</form>
</div>