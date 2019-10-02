<?php
/**
 * Form View: Input Type Password
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>
<div class="ur-input-type-password ur-admin-template" date-field_name="<?php echo esc_html( $this->get_general_setting_data( 'field_name' ) ); ?>">
	<div class="ur-label">
		<label><?php echo esc_html( $this->get_general_setting_data( 'label' ) ); ?></label>
	</div>
	<div class="ur-field" data-field-key="password">
		<input type="password" id="ur-input-type-password" disabled/>
	</div>
</div>
