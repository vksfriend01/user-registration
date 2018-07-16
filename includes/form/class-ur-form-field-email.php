<?php
/**
 * UserRegistration Admin.
 *
 * @class    UR_Form_Field_Email
 * @version  1.0.0
 * @package  UserRegistration/Form
 * @category Admin
 * @author   WPEverest
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * UR_Form_Field_Email Class
 */
class UR_Form_Field_Email extends UR_Form_Field {

	private static $_instance;


	public static function get_instance() {
		// If the single instance hasn't been set, set it now.
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	/**
	 * Hook in tabs.
	 */
	public function __construct() {

		$this->id = 'user_registration_email';

		$this->form_id = 1;

		$this->registered_fields_config = array(

			'label' => __( 'Secondary Email ','user-registration' ),

			'icon' => 'dashicons dashicons-email-alt',
		);
		$this->field_defaults = array(

			'default_label' => __( 'Secondary Email','user-registration' ),

			'default_field_name' => 'email_' . ur_get_random_number(),
		);
	}



	public function get_registered_admin_fields() {

		return '<li id="' . $this->id . '_list "

				class="ur-registered-item draggable"

                data-field-id="' . $this->id . '"><span class="' . $this->registered_fields_config['icon'] . '"></span>' . $this->registered_fields_config['label'] . '</li>';
	}


	public function validation( $single_form_field, $form_data, $filter_hook, $form_id ) {

		$required = isset( $single_form_field->general_setting->required ) ? $single_form_field->general_setting->required : 'no';
		$field_label = isset( $form_data->label ) ? $form_data->label : '';
		$value = isset( $form_data->value ) ? $form_data->value : '';

		if ( 'yes' == $required && empty( $value ) ) {
			add_filter( $filter_hook, function ( $msg ) use ( $field_label ) {
				return __( $field_label . ' is required.', 'user-registration' );
			});
		}

		if( ! is_email( $value ) ) {
			add_filter( $filter_hook, function ( $msg ) use ( $field_label ) {
				return __( $field_label . ' must be a valid email address.', 'user-registration' );
			});
		}
	}
}

return UR_Form_Field_Email::get_instance();
