 <!-- File: /app/View/Educations/eduedit.ctp -->
<div class="span10">
	<h3>编辑学历信息</h3>
	
	<?php 
		echo $this->Form->create("Education",array(			
			"class" => "form-horizontal well"
		));
		echo $this->Form->input("degree", array(
				"class" => "span2",
				"empty" => "【请选择】",
				"options" => array(
						"博士"=>"博士",
						"硕士"=>"硕士",
						"本科"=>"本科",
						"高中"=>"高中",
						"初中"=>"初中"
				),
				"label" => array(
						"class" => "control-label",
						"text" => "您的学历："
				)
		));
		echo $this->Form->input("school",array(
			"div" => "control-group",
			"class" => "span6",
			"label" => array(
				"class" => "control-label",
				"text" => "您就读的学校："
			)
		));
		echo $this->Form->input("study",array(
				"div" => "control-group",
				"class" => "span6",
				"label" => array(
						"class" => "control-label",
						"text" => "您所学的专业："
				)
		));
		echo $this->Form->input("in_date", array(
				"type" => "date",
				"dateFormat" => "Y-M-D",
				"minYear" => 1940,
				"maxYear" => 2050,
				"class" => "span2",
				"label" => array(
					"class" => "control-label",
					"text" => "入学日期："
				)
		));
		echo $this->Form->input("out_date", array(
				"type" => "date",
				"dateFormat" => "Y-M-D",
				"minYear" => 1940,
				"maxYear" => 2050,
				"class" => "span2",
				"label" => array(
						"class" => "control-label",
						"text" => "毕业日期："
				)
		));
		echo $this->Form->input("description", array(
				"type" => "textarea",
				"class" => "span6",
				"label" => array(
					"class" => "control-label",
					"text" => "补充说明（可不填）："
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
 
 