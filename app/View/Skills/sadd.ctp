 <!-- File: /app/View/Books/sadd.ctp -->
<div class="span10">
	<h3>添加新技能</h3>
	
	<?php 
		echo $this->Form->create("Skill",array(			
			"class" => "form-horizontal well"
		));
		echo $this->Form->input("skillname",array(
			"div" => "control-group",
			"class" => "span6",
			"label" => array(
				"class" => "control-label",
				"text" => "请输入要添加的技能："
			)
		));
		echo $this->Form->input("level", array(
				"empty" => "【请选择】",
				"options" => array(
						"初学"=>"初学",
						"熟悉"=>"熟悉",
						"精通"=>"精通",
						"专家"=>"专家"
				),
				"label" => array(
						"class" => "control-label",
						"text" => "熟练程度："
				)
		));
		
		$submit = $this->Form->submit("添加", array(
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
 