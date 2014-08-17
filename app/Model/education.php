<?php
class education extends AppModel {
	public $name = "education";
	public $validate = array(
		"school" 	  => array(
			"rule"       => "NotEmpty",
			"message"    => "该项不能为空!"
		),
		"degree"	  => array(
				"rule"       => "NotEmpty",
				"message"    => "该项不能为空!"
		),
		"study" 	  => array(
				"rule"       => "NotEmpty",
				"message"    => "该项不能为空!"
		),
		"description" => array(
				"rule" => array (
						"maxLength",
						"250"
				),
				"message" => "描述内容不得大于字符！",
				"allowEmpty" => true
		),
		"in_date" 	  => array(
			"rule"       => "date",
			"message"    => "日期格式不正确！",
			"allowEmpty" => false
		),
		"out_date"    => array(
			"rule"       => "date",
			"message"    => "日期格式不正确！",
			"allowEmpty" => false
		)
	);
};
?>