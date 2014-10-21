 <!-- File: /app/View/Educations/eduadd.ctp -->
<div class="span7">
	<div class="page-header">
		<h3>添加新学历</h3>
	</div>
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
						"text" => "请选择您的学历："
				)
		));
		echo $this->Form->input("school",array(
			"div" => "control-group",
			"class" => "span4",
			"label" => array(
				"class" => "control-label",
				"text" => "请输入您就读的学校："
			)
		));
		echo $this->Form->input("study",array(
				"div" => "control-group",
				"class" => "span4",
				"label" => array(
						"class" => "control-label",
						"text" => "请输入您所学的专业："
				)
		));
		echo $this->Form->input("in_date", array(
				"type" => "date",
				"dateFormat" => "YMD",
				"monthNames" => false,
				"minYear" => 1940,
				"maxYear" => 2050,
				"class" => "span1",
				"label" => array(
					"class" => "control-label",
					"text" => "入学日期："
				)
		));
		echo $this->Form->input("out_date", array(
				"type" => "date",
				"dateFormat" => "YMD",
				"monthNames" => false,
				"minYear" => 1940,
				"maxYear" => 2050,
				"class" => "span1",
				"label" => array(
						"class" => "control-label",
						"text" => "毕业日期："
				)
		));
		echo $this->Form->input("description", array(
				"type" => "textarea",
				"class" => "span4",
				"label" => array(
					"class" => "control-label",
					"text" => "补充说明（可不填）："
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
 