<?php
/**
 * @package Wordpress_Nonce
 */

class Test_Nonce extends WP_UnitTestCase {

	/**
	 * A single example test.
	 */
	public function test_construct_init_action() {
        
        $nonce = new Nonce();
        $instantiated_init = has_action("init", [$nonce, "process_zeal_form"]);
        $is_instantiated_init = (10 === $instantiated_init);

        $this->assertTrue($is_instantiated_init);
    }
    
    public function test_construct_add_shortcode() {

        $nonce = new Nonce();
        $instantiated_shortcode = shortcode_exists("nonce_form");
        
        $this->assertTrue($instantiated_shortcode);
    }

    public function test_zeal_wordpress_nonce_post_exists() {

        $nonce = new Nonce();
        $post_exists = post_exists("zeal-wordpress-nonce");
        $is_post_exists = (0 === $post_exists);

        $this->assertTrue($is_post_exists);
    }

    public function test_zeal_nonce_class_is_instantiated() {

        $nonce = new Nonce();

        $this->assertIsObject($nonce);
    }
}