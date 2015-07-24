<?php
	function call($controller, $action) {
		// taking the file which matches with the controller name.
		require_once('controllers/'. $controller . '_controller.php');

		switch ($controller) {
			case 'pages':
				$controller = new PageController();
				break;
		}

		$controller->{$action}();
	}

	// list of controllers and their actions..
	// considering those "allowed" values..

	$controllers = array('pages' => ['home', 'error']);

	// checking if requested controller and actions are both allowed..
	if(array_key_exists($controller, $controllers)) {
		if(in_array($action, $controllers[$controller])) {
			call($controller, $action);
		}else {
			call('pages', 'error');
		}
	}else {
			call('pages', 'error');
		}

	// if someone tries to access something else he/she will be redirected to error landing page..
?>