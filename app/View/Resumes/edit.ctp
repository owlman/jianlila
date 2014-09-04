
<div class="span10">
	<h2>改简历：</h2>
	<p><?php
		  echo $this->Html->link(
	           "添加教育经历",
	           array("controller"=>"Educations", "action"=>"eduadd",$uid)
	      );
	      echo " | ";
	      echo $this->Html->link(
	      		"添加职场经历",
	      		array("controller"=>"Experiences", "action"=>"expadd",$uid)
	      );
	      echo " | ";
	      echo $this->Html->link(
	      		"添加新技能",
	      		array("controller"=>"Skills", "action"=>"sadd",$uid)
	      );
	      echo " | ";
	      echo $this->Html->link(
	      		"添加新书",
	      		array("controller"=>"Books", "action"=>"badd",$uid)
	      );	      
	 ?></p>	
	<?php 
		echo $this->Form->create("Resume",array(
				"class" => "form-horizontal well"
		));
		
		$resLab = $this->Form->input("resume_label",array(
				"class" => "span6",
				"label" => false,
				"div" => "controls"
		));
		$label = $this->Form->label("resume_label","简历名称：", array(
				"class" => "control-label"
		));
		echo $this->Html->div("control-group",$label.$resLab);
					
		$fname = $this->Form->input("first_name", array(
				"class" => "span2",
				"label" => false,
				"div" => false
		));
		
		$lname = $this->Form->input("last_name", array(
				"class" => "span2",
				"label" => false,
				"div" => false
		));
		$label = $this->Form->label("name","真实姓名：", array(
				"class" => "control-label"
		));
		$name = $this->Html->div("controls",$fname.$lname);
		echo $this->Html->div("control-group",$label.$name);
		
		$email = $this->Form->input("email", array(
				"class" => "span6",
				"label" => false,
				"div" => "controls"
		));
		$label = $this->Form->label("email","电子邮件：", array(
				"class" => "control-label"
		));
		echo $this->Html->div("control-group",$label.$email);
		
		$edus = $this->Form->input("educations", array(
				"class" => "checkbox inline",
				"label" => false,
				"type" => "select",				
				"options" => $educations,
				"multiple" => "checkbox",
				"selected" => $showEdu,
				"div" => "controls"
		));
		$label = $this->Form->label("educations","教育经历：", array(
				"class" => "control-label"
		));
		echo $this->Html->div("control-group",$label.$edus);
		
		
		$exps = $this->Form->input("experiences", array(
				"class" => "checkbox inline",
				"label" => false,
				"options" => $experiences,
				"multiple" => "checkbox",
				"type" => "select",
				"selected" => $showExp,				
				"div" => "controls"
		));
		$label = $this->Form->label("experiences","职场经历：", array(
				"class" => "control-label"
		));
		echo $this->Html->div("control-group",$label.$exps);
		
		
		$sks = $this->Form->input("skills", array(
				"class" => "checkbox inline",
				"label" => false,
				"options" => $skills,
				"multiple" => "checkbox",
				"type" => "select",
				"selected" => $showSk,				
				"div" => "controls"
		));
		$label = $this->Form->label("skills","掌握技能：", array(
				"class" => "control-label"
		));
		echo $this->Html->div("control-group",$label.$sks);
		
		
		$bks = $this->Form->input("books", array(
				"class" => "checkbox inline",
				"label" => false,
				"options" => $books,
				"multiple" => "checkbox",
				"type" => "select",
				"selected" => $showBk,				
				"div" => "controls"
		));
		$label = $this->Form->label("books","出版书籍：", array(
				"class" => "control-label"
		));
		echo $this->Html->div("control-group",$label.$bks);
				
		$obj = $this->Form->input("objective", array(
				"class" => "span6",
				"label" => false,
				"div" => "controls"
		));
		$label = $this->Form->label("objective","目标职务：", array(
				"class" => "control-label"
		));
		echo $this->Html->div("control-group",$label.$obj);
		
		
		$label = $this->Form->label("ispublic","是否公开：", array(
			"class" => "control-label"
		));
		$check = $this->Form->checkbox("ispublic");
		$controldiv = $this->Html->div("controls",$check);
		echo $this->Html->div("control-group",$label.$controldiv);
		
	
		$desc = $this->Form->input("description", array(
				"class" => "span6",
				"label" => false,
				"div" => "controls"
		));
		$label = $this->Form->label("description","个人简介：", array(
				"class" => "control-label"
		));
		echo $this->Html->div("control-group",$label.$desc);
		
		echo $this->Form->input("user_id",array("type" => "hidden"));
		echo $this->Form->input("id",array("type" => "hidden"));		
		
		$submit = $this->Form->submit("完成", array(
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
				"class" => "btn",
				"onclick" => "javascript:history.back(-1)"
		));
		$otherbtn = $this->Html->div("controls btn-toolbar",$reset.$exit);
		echo $this->Html->div("control-group", $submit.$otherbtn);
		
		echo $this->Form->end();
	?>
</div>