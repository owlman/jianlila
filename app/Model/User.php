<?php
	class User extends AppModel{
		public $name = "User";
		public $validate = array(
			"username" => array(
				array("rule" => "NotEmpty","message" => "Please enter your username..."),
				array("rule" => "isUnique","message" => "The username already exitsts..."),
				array("rule" => "alphaNumeric","message" => "Letters and numbers only...")
			),
			"password" => array(
				array("rule" => "NotEmpty","message" => "Please enter your password..."),
				array("rule" => array("minLength","8"),
								"message" =>"Password must be at least 8 characters long..."),
			),
			"email" => array(
				array("rule" => "email","message" =>"Please enter a valid E-mail..."),
				array("rule" => "isUnique","message" =>"The E-mail already exitsts...")
			)
		);			
	};
?>