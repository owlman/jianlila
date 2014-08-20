<?php 
class experience extends AppModel {
	public $name = "experience";
	public $validate = array(
			"company" 	  => array(
					"rule"       => "NotEmpty",
					"message"    => "该项不能为空!"
			),
			"title"	  => array(
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
