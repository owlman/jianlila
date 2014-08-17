<?php
class User extends AppModel {
	public $name = "User";
	public $validate = array (
			"username" => array (
					array (
							"rule" => "NotEmpty",
							"message" => "用户名不能为空！" 
					),
					array (
							"rule" => "isUnique",
							"message" => "该用户名已经存在！" 
					),
					array (
							"rule" => "alphaNumeric",
							"message" => "用户名只能由数字和字母组成！" 
					) 
			),
			"password" => array (
					array (
							"rule" => "NotEmpty",
							"message" => "密码不能为 空！" 
					),
					array (
							"rule" => array (
									"minLength",
									"8" 
							),
							"message" => "密码必须大于八个字符！" 
					) 
			),
			"email" => array (
					array (
							"rule" => "email",
							"message" => "请输入有效的电子邮件！" 
					),
					array (
							"rule" => "isUnique",
							"message" => "该邮件地址已经被人注册了，请换另一个试试？" 
					) 
			) 
	);
};
?>