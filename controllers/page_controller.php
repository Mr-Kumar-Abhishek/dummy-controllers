<?php
class PageController {
	public function home() {
		$first_message = "Hi";
		$second_message  = "Welcome";
		require_once('dispay/page/home.php');
	}
	public function error(){
		require_once('display/page/error.php');	
	}
	
}
?>