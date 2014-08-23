<!-- File: /app/View/User/login.ctp -->
<div class="span10">
	<?php 
		echo $this->Form->create("User", array(
			"action" => "login",
			"class" => "form-signin"
		));
	?>
	<h2>用户登录：</h2>	
	<?php 
		echo $this->Form->input("username", array(
			"label" => "用户名：",
			"class" => "input-block-level"
		));
		echo $this->Form->input("password",array(
			"label" => "密  码：",
			"class" => "input-block-level"
		));
		echo $this->Form->submit("登录", array(
			"class" => "btn btn-primary",
				"div" => false
		));
		echo $this->Html->link("注册新用户", 
			array(
				"controller" => "Users", 
				"action" => "add"			
			),
			array(
				"class" => "btn"
			)
		);
		echo $this->Form->end();
	?>
</div>
