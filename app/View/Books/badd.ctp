 <!-- File: /app/View/Books/badd.ctp -->
<div class="span7">
	<div class="page-header">
		<h3>添加新作品</h3>
	</div>
	<?php 
		echo $this->Form->create("Book",array(			
			"class" => "form-horizontal well"
		));
		echo $this->Form->input("bookname",array(
			"div" => "control-group",
			"class" => "span4",
			"label" => array(
				"class" => "control-label",
				"text" => "请输入书名："
			)
		));
		echo $this->Form->input("pubdate", array(
				"type" => "date",
				"dateFormat" => "YMD",
				"minYear" => 1940,
				"maxYear" => 2050,
				"monthNames" => false,
				"class" => "span1",
				"label" => array(
					"class" => "control-label",
					"text" => "出版日期："
				)
		));
		echo $this->Form->input("description", array(
				"type" => "textarea",
				"class" => "span4",
				"label" => array(
					"class" => "control-label",
					"text" => "内容简介（可不填）："
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
