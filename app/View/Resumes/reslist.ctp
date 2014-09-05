<!-- File: /app/View/Resumes/reslist.ctp -->
<div class="span10">
	<h2>我的简历</h2>
	<p><?php echo $this->Html->link("添加新简历",array(
				"controller"=>"Resumes", 
				"action"=>"write",
				$this->Session->read("uid")
			));
			echo " | ";
			echo $this->Html->link("查看/修改个人信息", array(
				"controller" => "Users",
				"action" => "message",
				$this->Session->read("uid")
			));
	?></p>	
	<?php 
		echo $this->element("user_resume_list");
	?>
</div>		