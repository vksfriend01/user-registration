<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * UR_Setting_User_login Class
 *
 * @package  UserRegistration/Form/Settings
 * @category Abstract Class
 * @author   WPEverest
 */
class UR_Setting_User_login extends UR_Field_Settings {


	public function __construct() {
		$this->field_id = 'user_login_advance_setting';
	}

	public function output( $field_data = array() ) {

		$this->field_data = $field_data;
		$this->register_fields();
		$field_html = $this->fields_html;

		return $field_html;
	}

	public function register_fields() {
		$fields = array(

			'custom_class' => array(
				'label'       => __( 'Custom Class', 'user-registration' ),
				'data-id'     => $this->field_id . '_custom_class',
				'name'        => $this->field_id . '[custom_class]',
				'class'       => $this->default_class . ' ur-settings-custom-class',
				'type'        => 'text',
				'required'    => false,
				'default'     => '',
				'placeholder' => __( 'Custom Class', 'user-registration' ),
				'tip'         => __( 'Class name to embed in this field.', 'user-registration' ),
			),
			'special_characters'    => array(
				'type'     => 'select',
				'data-id'  => $this->field_id . '_special_characters',
				'label'    => __( 'Allow Special Characters in Username', 'user-registration' ),
				'name'     => $this->field_id . '[special_characters]',
				'class'    => $this->default_class . 'ur-settings-special-characters',
				'default'  => 'false',
				'required' => false,
				'options'  => array(
					'true'  => 'Yes',
					'false' => 'No',
				),
				'tip'      => __( 'Select yes to allow special characters in username.', 'user-registration' ),
			),
		);

		$this->render_html( $fields );
	}
}

return new UR_Setting_User_login();
