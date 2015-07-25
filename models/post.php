<?php
	class Post{
		//defining 3 attributes
		// they are public ...

		public $id;
		public $author;
		public $content;

		public function __construct($id, $author, $content) {
			$this->id 		= $id;
			$this->author 	= $author;
			$this->content 	= $content;
		}

		public static function all(){
			$list =[];
			$DB = db::get_instance();
			$cm = $DB->query('SELECT * FROM posts');

			//creating a list fo post objects from the database results...

			foreach($cm->fetchAll() as $perpost) {
				$list[] = new Post($perpost['id'], $perpost['author'], $perpost['content']);
			}
			return $list;
		}

		public static function find($id) {
			$DB = db::get_instance();
			$id = intval($id); //making sure id is an integer

			$cm = $DB->prepare('SELECT * FROM posts WHERE id = :id');

			// the above query is prepared now to replace :id with actual $id

			$cm->execute(array('id' => $id));
			$post = $cm->fetch();

			return new Post($post['id'], $post['author'], $post['content']);

		}
	}