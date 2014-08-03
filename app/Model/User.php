<?php
	class User extends AppModel{
		public $name = "User";
		public $validate = array(
			"username" => array(
				array("rule" => "NotEmpty","message" => "The username must not be empty!"),
				array("rule" => "isUnique","message" => "The username must be Unique!")
			),
			"password" => array(
				array("rule" => "NotEmpty","message" => "Password must not be empty!"),
				array("rule" => array("minLength","8"),"message" => "password must be at least 8 characters!"),
			),
			"email" => array("rule" => "email")
		);			
	};
?>