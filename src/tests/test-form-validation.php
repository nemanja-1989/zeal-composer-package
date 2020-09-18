<?php
/**
 * @package Wordpress_Nonce
 */

class Test_FormValidation extends WP_UnitTestCase {

	/**
	 * A single example test.
	 */

    public function test_wp_nonce_create() {

        $this->assertIsString(FormValidation::wp_nonce_create_function());
    }

    public function test_wp_verify_nonce_field() {

        $this->assertTrue(FormValidation::wp_verify_nonce_field());
    }

    public function test_set_get_nonce_create_field() {

        FormValidation::set_nonce_create("edde234322dedd23e3");

        $this->assertEquals(FormValidation::get_nonce_create(), "edde234322dedd23e3");
    }

    public function test_nonce_not_error() {

        FormValidation::set_nonce_create("edde234322dedd23e3");

        $this->assertNotWPError(FormValidation::get_nonce_create(), "edde234322dedd23e3");
    }

    public function test_nonce_create_field_is_empty() {

        FormValidation::set_nonce_create("");

        $this->assertEmpty(FormValidation::get_nonce_create(), "edde234322dedd23e3");
    }

    public function test_nonce_create_field_is_string() {

        FormValidation::set_nonce_create("edde234322dedd23e3");

        $this->assertStringContainsString(FormValidation::get_nonce_create(), "edde234322dedd23e3");
    }

    public function test_nonce_create_is_string_with_is_string_assertion() {

        FormValidation::set_nonce_create("edde234322dedd23e3");

        $this->assertIsString(FormValidation::get_nonce_create(), "edde234322dedd23e3");
    }

    public function test_set_get_fname_field() {

        FormValidation::set_fname("John");

        $this->assertEquals(FormValidation::get_fname(), "John");
    }

    public function test_set_get_lname_field() {

        FormValidation::set_lname("Doe");

        $this->assertEquals(FormValidation::get_lname(), "Doe");
    }

    public function test_set_get_email_field() {

        FormValidation::set_email("johndoe@gmail.com");

        $this->assertEquals(FormValidation::get_email(), "johndoe@gmail.com");
    }

    public function test_set_get_comment_field() {

        FormValidation::set_comment("This is a first comment!");

        $this->assertEquals(FormValidation::get_comment(), "This is a first comment!");
    }

    public function test_trim_fname() {

        FormValidation::set_fname("    John   ");

        $this->assertEquals(FormValidation::get_fname(), "John");
    }

    public function test_trim_lname() {

        FormValidation::set_lname("  Doe");

        $this->assertEquals(FormValidation::get_lname(), "Doe");
    }

    public function test_trim_email() {

        FormValidation::set_email("    johndoe@gmail.com    ");

        $this->assertEquals(FormValidation::get_email(), "johndoe@gmail.com");
    }
	
}