<?php
class Resume extends AppModel {
	
	public $name = "Resume";
	public $validate = array (
			"resume_label" => array (
					array (
							"rule" => "NotEmpty",
							"message" => "简历名称不能为空！"
					),
			),			
			"email" => array (
					array (
							"rule" => "email",
							"message" => "请输入有效的电子邮件！"
					),
					array (
							"rule" => "isUnique",
							"message" => "该邮件地址已经被人占用了，请换另一个试试？"
					)
			),
			"objective" => array (
					array (
							"rule" => "NotEmpty",
							"message" => "目标职位不能为空！"
					),					
			),
	);
};
?>