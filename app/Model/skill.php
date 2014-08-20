<?php
class skill extends AppModel {
	public $name = "skill";
	public $validate = array(
			"skillname" 	  => array(
					"rule"       => "NotEmpty",
					"message"    => "该项不能为空!"
			),
			"level"           => array(
					"rule"       => "NotEmpty",
					"message"    => "该项不能为空!"
			)
	);
};
?>