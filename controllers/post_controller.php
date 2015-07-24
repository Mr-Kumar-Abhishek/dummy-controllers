<?php
	class PostConroller {
		public function index() {
			$posts = Post::all();
			require_once("display/post/index.php");
		}

		public function show() {
			// expecing a url form ?controller=posts&action=show&id=x
			// without id redirect to error page
			if(!isset($_GET['id'])){
				return call('page', 'error');
			}

			// using given id to find the correct post
			$post = Post::find($_GET['id']);
			require_once('display/post/show.php');
		}
	}
?>