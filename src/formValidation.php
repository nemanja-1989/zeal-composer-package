<?php 

    require_once "classes/formHelper.class.php";
    require_once  "interface/validatorInterface.php";

    class FormValidation implements IValidator {

        private static $fname;
        private static $lname;
        private static $email;
        private static $comment;
        private static $nonce_create;
        private static $errors = [];

        public static function set_fname($fname) {
            self::$fname = trim($fname);
        }

        public static function set_lname($lname) {
            self::$lname = trim($lname);
        }

        public static function set_email($email) {
            self::$email = trim($email);
        }

        public static function set_nonce_create($nonce_create) {
            self::$nonce_create = $nonce_create;
        }

        public static function set_comment($comment) {
            self::$comment = $comment;
        }

        public static function get_fname() {
            return self::$fname;
        }

        public static function get_lname() {
            return self::$lname;
        }

        public static function get_email() {
            return self::$email;
        }

        public static function get_nonce_create() {
            return self::$nonce_create;
        }

        public static function get_comment() {
            return self::$comment;
        }

        public static function wp_nonce_create_function() {

            return wp_create_nonce("zeal_nonce_field");
        }

        public static function wp_verify_nonce_field() {

            if(wp_verify_nonce(self::wp_nonce_create_function(), "zeal_nonce_field")) {
                return true;
            }else {
                return false;
            }
        }

        public static function form_create() {

            FormHelper::openFormTag("#", "POST", "form", "return onSubmit(event)");
            FormHelper::input("hidden", "nonce_create", self::wp_nonce_create_function());
            FormHelper::input("text", "fname", null, "fname", "First name...");
            FormHelper::input("text", "lname", null, "lname", "Last name...");
            FormHelper::input("text", "email", null, "email", "Email address...");
            FormHelper::textarea("comment", "comment", "Leave comment here...");
            FormHelper::input("submit", "submit", "SUBMIT", "submit");
            FormHelper::closeFormTag();
        }

        public static function validate_form() {

            if(isset($_POST["nonce_create"], $_POST["fname"], $_POST["lname"], $_POST["email"], $_POST["submit"])) {
                self::set_fname($_POST["fname"]);
                self::set_lname($_POST["lname"]);
                self::set_email($_POST["email"]);
                self::set_nonce_create($_POST["nonce_create"]);
                
                self::validate_form_fields();
            }
        }

        public static function validate_form_fields() {

            // MORE VALIDATION 
            // if(!preg_match("/^[a-zA-Z]{2, 20}$/", self::get_fname())) {
            //     self::$errors["fname"] = "<p>Please check your First name characters!</p>";
            // }else if(!preg_match("/^[a-zA-Z]{2, 25}$/", self::get_lname())) {
            //     self::$errors["lname"] = "<p>Please check your Last name characters!</p>";
            // }else if(!preg_match("/^[a-zA-Z0-9\.\_\-]+\@[a-zA-Z]+\.[a-z]{2,4}$/", self::get_email())) {
            //     self::$errors["email"] = "<p>Please enter valid Email address!</p>";
            // }
            
            if(!self::wp_verify_nonce_field()) {
                self::$errors["nonce_field"] = "Nonce not verified!";
            }else if(self::get_fname() === "") {
                self::$errors["fname"] = "<p>Please enter your First name!</p>";
            }else if(self::get_lname() === "") {
                self::$errors["lname"] = "<p>Please enter your Last name!</p>";
            }else if(self::get_email() === "") {
                self::$errors["email"] = "<p>Please enter your Email address!</p>";
            }else {
                self::display_success();
            }

            
        }

        public static function display_errors() {

            // print_r(self::$errors);
            if(self::$errors) {
                echo "<ul>";
                foreach(self::$errors as $error) {
                    echo "<li>{$error}</li>";
                }
                echo "</ul>";
            }
        }

        public static function display_success() {

            if(!self::$errors) {
                echo "<script>alert('Congratulations!');</script>";
            }
        }
    }