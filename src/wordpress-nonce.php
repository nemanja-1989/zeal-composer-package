<?php 


/* 
Plugin name: Wordpress Nonces plugin
Plugin URI:
Description: Put nonce field functions into form plugin
Author: zeaL
AuthorURI:
Version: 1.0
*/

    require_once "interface/nonceInterface.php";
    require_once "classes/formHelper.class.php";
    require_once "formValidation.php";

    class Nonce implements INonce {

        public function __construct() {
            
            add_action("init", [$this, "process_zeal_form"]);
            add_shortcode("nonce_form", [$this, "zeal_form"]);
 
        }

        public function zeal_form() {

            ob_start();

            if(!empty(FormValidation::display_errors())) {
                FormValidation::display_errors();
            }
            FormValidation::form_create();
            
            return ob_get_clean();
        }

        public function process_zeal_form() {

            FormValidation::validate_form();
        }
    }

    $nonce = new Nonce();
