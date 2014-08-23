 <!-- File: /app/View/Books/bedit.ctp -->
<div class="span10">
	<h3>编辑作品信息</h3>
	
	<?php 
		echo $this->Form->create("Book",array(			
			"class" => "form-horizontal well"
		));
		echo $this->Form->input("bookname",array(
			"div" => "control-group",
			"class" => "span6",
			"label" => array(
				"class" => "control-label",
				"text" => "书名："
			)
		));
		echo $this->Form->input("pubdate", array(
				"type" => "date",
				"dateFormat" => "Y-M-D",
				"minYear" => 1940,
				"maxYear" => 2050,
				"class" => "span2",
				"label" => array(
					"class" => "control-label",
					"text" => "出版日期："
				)
		));
		echo $this->Form->input("description", array(
				"type" => "textarea",
				"class" => "span6",
				"label" => array(
					"class" => "control-label",
					"text" => "内容简介（可不填）："
				)
		));
		echo $this->Form->input("user_id",array("type" => "hidden"));
		echo $this->Form->input("id",array("type" => "hidden"));
		$submit = $this->Form->submit("保存 ", array(
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
 