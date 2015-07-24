<?php
	function call($controller, $action) {
		// taking the file which matches with the controller name.
		require_once('controllers/'. $controller . '_controller.php');

		switch ($controller) {
			case 'page':
				$controller = new PageController();
				break;
			case 'post':
				//to query database later in the controller
				require_once('models/post.php'); 
				$controller = new PostController();
				break;

		}

		$controller->{$action}();
	}

	// list of controllers and their actions..
	// considering those "allowed" values..

	$controllers = array('page' => ['home', 'error'],
						 'post' => ['index', 'show']);
	

	// checking if requested controller and actions are both allowed..
	if(array_key_exists($controller, $controllers)) {
		if(in_array($action, $controllers[$controller])) {
			call($controller, $action);
		}else {
			call('page', 'error');
		}
	}else {
			call('page', 'error');
		}

	// if someone tries to access something else he/she will be redirected to error landing page..
?>