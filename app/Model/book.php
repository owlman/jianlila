<?php
class book extends AppModel {
	public $name = "book";
	public $validate = array(
			"bookname" 	  => array(
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
			
			"pubdate"    => array(
					"rule"       => "date",
					"message"    => "日期格式不正确！",
					"allowEmpty" => false
			)
	);
};
?>