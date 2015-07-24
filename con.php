<?php
	class db {
		private static $instance = NULL;
		private function __construct() {}
		private function __clone() {}
		public static function get_instance() {
			if (!isset(self::$instance)) {
				$pdo_option[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
				self::$instance = new PDO('mysql:host=localhost;dbname=dummy', 'root', '', $pdo_option);
			}
			return self::$instance;
		}
	}
?>
