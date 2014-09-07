<div class="span10">
	<center>
		<div style="height: 231px; margin-top: 20px">
			<img style="padding-top:112px; height:95; width:265;" alt="search" src="/img/searchImg.png">
		</div>
		<div style="height: 102px">
			<?php 
				echo $this->Form->create("Resume",array(
						"class" => "form-horizontal"
				));
				$searchKey = $this->Form->input("searchbox",array(
					"class" => "span6",
					"placeholder"=>"请输入要搜索的内容……",
					"label" => false,
					"div" => false
				));
				$searchList = $this->Form->input("searchlist",  array(
					"class" => "span1",
					"label" => false,
					"div" => false,
					"options" => array(
							"专业",
							"技能",
							"职业"
					),
				));
				$submit = $this->Form->submit("搜索", array(
						"div" => false,
						"type" => "submit",
						"class" => "btn btn-primary"
				));
				
				echo $this->Html->div("input-append",
						$searchList.$searchKey.$submit,
						array("style" => "margin-top:20px")
				);	
				echo $this->Form->end();
				
				if (!empty($resumes)) {
					$h4 = "<h4>搜索结果</h4>";
					$table = $this->element("user_resume_list");
					echo $this->Html->div("span10",
							$h4.$table,
							array("style" => "margin-top:20px")
					);
				} elseif(!empty($notfind))
				{
					echo $notfind;			
				}				
			?>
		</div>		
  	</center>
</div>