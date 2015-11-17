<?php

class MC4WP_MailChimp_Merge_Var {

	public $name;

	public $field_type;

	public $tag;

	public $required = false;

	public $choices = array();

	public $public = true;

	public $default = '';

	/**
	 * @param      $name
	 * @param      $field_type
	 * @param      $tag
	 * @param bool $required
	 * @param array $choices
	 */
	public function __construct( $name, $field_type, $tag, $required = false, $choices = array() ) {
		$this->name = $name;
		$this->field_type = $field_type;
		$this->tag = strtoupper( $tag );
		$this->required = $required;
		$this->choices = $choices;
	}

	/**
	 * Creates our local object from MailChimp API data.
	 *
	 * @param $data
	 *
	 * @return MC4WP_MailChimp_Merge_Var
	 */
	public static function from_data( $data ) {

		$instance = new self( $data->name, $data->field_type, $data->tag, $data->req );

		$optional = array(
			'choices',
			'public',
			'default'
		);

		foreach( $optional as $key ) {
			if( isset( $data->$key ) ) {
				$instance->$key = $data->$key;
			}
		}

		return $instance;
	}

}