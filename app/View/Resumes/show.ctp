<div class="span10">
	<h2>晒简历</h2>
	<p><?php echo $this->Html->link("查看我的简历",array(
				"controller"=>"Resumes", 
				"action"=>"index"
			 ));
	?></p>	
	<?php 
		echo $this->element("user_resume_list");
	?>
</div>