<!-- File: /app/View/User/message.ctp -->  
<div class="page-header">
<h1>欢迎回来，<?=$user["User"]["username"] ?>！
<small> 
	<?php 
		if($isadmin) {
			echo " | ";
			echo $this->Html->link(
					"查看所有用户",
					array("controller" => "Users", "action" => "ulist")
			);
		}
	?>
</small>
</h1>
</div>
<div id="Tabable">
	<ul id="iTab" class="nav nav-tabs">
		<li class="active"><a href="#myresume" data-toggle="tab">
			我的简历
		</a></li>		
		<li><a href="#userMessage" data-toggle="tab">
			基本信息
		</a></li>
		<li><a href="#eductions" data-toggle="tab">
			学历信息	
		</a></li>
		<li><a href="#experiences" data-toggle="tab">
			职位信息
		</a></li>
		<li><a href="#skills" data-toggle="tab">
			熟悉技能
		</a></li>
		<li><a href="#books" data-toggle="tab">
			出版书籍
		</a></li>
	</ul>
	<div class="tab-content">			
	<?php 
		echo $this->element("user_resume_list");
		echo $this->element("user_message");
		echo $this->element("edulist");
		echo $this->element("explist");
		echo $this->element("skillslist");
		echo $this->element("booklist");
	?>
	</div>
</div>