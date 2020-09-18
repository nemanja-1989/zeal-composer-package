<?php 

	class FormHelper {
		
		public static function openFormTag($action, $method, $id, $onsubmit = null) {
			echo "<form action='{$action}' method='{$method}' id='{$id}' onsubmit='{$onsubmit}'>";
		}
		
		public static function input($type, $name, $value = null, $id = null, $placeholder = null) {
			echo "<input type='{$type}' name='{$name}' value='{$value}' id='{$id}' placeholder='{$placeholder}'>";
		}

		public static function textarea($name, $id, $placeholder = null) {
			echo "<textarea name='{$name}' id='{$id}' placeholder='{$placeholder}'></textarea>";
		}
		
		public static function closeFormTag() {
			echo "</form>";
		}
	}