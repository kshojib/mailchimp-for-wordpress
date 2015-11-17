<?php

/**
 * Class IntegrationTest
 * @ignore
 */
class IntegrationTest extends PHPUnit_Framework_TestCase {

	/**
	 * @covers MC4WP_Integration::__construct
	 */
	public function test_constructor() {
		$slug = 'my-integration';

		$instance = $this->getMockForAbstractClass('MC4WP_Integration', array(
			$slug,
			array()
		));

		$this->assertAttributeEquals( $slug, 'slug', $instance );
	}

	/**
	 * @covers MC4WP_Integration::checkbox_was_checked
	 */
	public function test_checkbox_was_checked() {
		$slug = 'my-integration';
		$instance = $this->getMockForAbstractClass('MC4WP_Integration', array(
			$slug,
			array()
		));

		$this->assertFalse( $instance->checkbox_was_checked() );

		// copy of request data is stored in constructor so we should create a new instance to replicate
		$_REQUEST[ PHPUnit_Framework_Assert::readAttribute( $instance, 'checkbox_name' ) ] = 1;
		$slug = 'my-integration';
		$instance = $this->getMockForAbstractClass('MC4WP_Integration', array(
			$slug,
			array()
		));
		$this->assertTrue( $instance->checkbox_was_checked() );
	}

}