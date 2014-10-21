 <!-- File: /app/View/User/edit.ctp -->
<div class="span6">
	<div class="page-header">
		<h3>编辑 <?=$user["User"]["username"];?> 的用户信息：</h3>
	</div>
	<?php 
		echo $this->Form->create("User", array(
	        "action" => "edit",
			"class" => "form-horizontal well"
	    ));
		echo $this->Form->input("username", array(
			"div" => "control-group",
			"label" => array(
				"class" => "control-label",
				"text" => "用户名："
			)
		));
		echo $this->Form->input("password", array(
			"div" => "control-group",
			"label" => array(
				"class" => "control-label",
				"text" => "修改密码："
			)
		));
		echo $this->Form->input("password2", array(
			"div" => "control-group",
			"type" => "password",
			"label" => array(
				"class" => "control-label",
				"text" => "确认密码："
			)
		));
		
		echo $this->Form->input("email", array(
			"div" => "control-group",
			"label" => array(
				"class" => "control-label",
				"text" => "电子邮件："
			)
		));
		echo $this->Form->input("first_name", array(
			"div" => "control-group",
			"label" => array(
				"class" => "control-label",
				"text" => "姓氏："
			)
		));
		echo $this->Form->input("last_name", array(
			"div" => "control-group",
			"label" => array(
				"class" => "control-label",
				"text" => "名字："
			)
		));
		if($isadmin) { 
			$label = $this->Form->label("isadmin","赋予管理员身份：", array(
				"class" => "control-label"
			));
			$check = $this->Form->checkbox("isadmin");
			
			echo $this->Html->div("control-group",$label.$check);
		}
		$submit = $this->Form->submit("保存", array(
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
		echo $this->Form->input("id",array("type" => "hidden"));
		echo $this->Form->end();
	?>	
</div>	