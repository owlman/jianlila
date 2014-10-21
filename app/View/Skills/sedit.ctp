<!-- File: /app/View/Skills/sedit.ctp -->

<div class="span6">
	<div class="page-header">
		<h3>编辑技能信息</h3>
	</div>
	<?php 
		echo $this->Form->create("Skill",array(			
			"class" => "form-horizontal well"
		));
		echo $this->Form->input("skillname",array(
			"div" => "control-group",
			"class" => "span3",
			"label" => array(
				"class" => "control-label",
				"text" => "您的技能："
			)
		));
		echo $this->Form->input("level", array(
				"empty" => "【请选择】",
				"class" => "span3",
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
		echo $this->Form->input("user_id",array("type" => "hidden"));
		echo $this->Form->input("id",array("type" => "hidden"));
		
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
		echo $this->Form->end();
	?>
</div> 
 
