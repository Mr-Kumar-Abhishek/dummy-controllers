<?php
	class db {
		private static $instance = NULL;
		private function __construct() {}
		private function __clone() {}
		public static function get_instance() {
			if (!isset(self::$instance)) {
				$pdo_option[PDO::ATTR_ERRORMODE] = PDO::ERRORMODE_EXCEPTION;
				self::$instance = new PDO('mysql:host=localhost;dbname=dummy', 'root', 'pass', $pdo_option);
			}
			return self::$instance;
		}
	}
?>
