<?php
	class User extends AppModel{
		public $name = "User";
		public $validate = array(
//			"username" => array("rule" => "noEmpty"),
//			"password" => array("rule" => "noEmpty"),
			"email" => array("rule" => "email"),
		);
	};
?>