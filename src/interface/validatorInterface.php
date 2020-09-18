<?php 


    interface IValidator {

        public static function wp_nonce_create_function();
        
        public static function wp_verify_nonce_field();

        public static function form_create();

        public static function validate_form();

        public static function validate_form_fields();
    }