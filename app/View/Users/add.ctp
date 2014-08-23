<!-- File: /app/View/User/add.ctp -->
<div class="span10">
	<h3><?php
		if ($isadmin) {
			echo "添加新用户";
		} else {
			echo "注册新用户";
		}
	?></h3>
	<?php 
		echo $this->Form->create("User", array(
	        "action" => "add",
			"class" => "form-horizontal well"
	    ));
		echo $this->Form->input("username", array(
			"div" => "control-group",
			"class" => "span6",
			"label" => array(
				"class" => "control-label",
				"text" => "请输入用户名："
			)
		));
		echo $this->Form->input("password", array(
			"div" => "control-group",
			"class" => "span6",
			"label" => array(
				"class" => "control-label",
				"text" => "请输入密码："
			)
		));
		echo $this->Form->input("password2", array(
				"div" => "control-group",
				"class" => "span6",
				"type" => "password",
				"label" => array(
						"class" => "control-label",
						"text" => "请确认密码："
				)
		));				
		echo $this->Form->input("email", array(
			"div" => "control-group",
			"class" => "span6",
			"label" => array(
				"class" => "control-label",
				"text" => "请输入电子邮件："
			)
		));
		echo $this->Form->input("first_name", array(
			"div" => "control-group",
			"label" => array(
				"class" => "control-label",
				"text" => "请输入您的姓氏："
			)
		));
		echo $this->Form->input("last_name", array(
			"div" => "control-group",
			"label" => array(
				"class" => "control-label",
				"text" => "请输入您的名字："
			)
		));
		if($isadmin) { 
			$label = $this->Form->label("isadmin","赋予管理员身份：", array(
				"class" => "control-label"
			));
			$check = $this->Form->checkbox("isadmin");
			
			echo $this->Html->div("control-group",$label.$check);
		}
		$submit = $this->Form->submit("注册", array(
				"div" => array("class" => "control-label"),
				"type" => "submit",
				"class" => "btn btn-large btn-primary"
		));
		$reset = $this->Form->button("重置", array(
				"type" => "reset",
				"class" => "btn btn-inverse"
		));
		$exit = $this->Form->button("放弃", array(
				"type" => "button",
				"class" => "btn btn-link",
				"onclick" => "javascript:history.back(-1)"
		));
		$otherbtn = $this->Html->div("controls btn-toolbar",$reset.$exit);
		echo $this->Html->div("control-group", $submit.$otherbtn);
		echo $this->Form->end();
	?>
</div>
