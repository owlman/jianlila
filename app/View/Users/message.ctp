<!-- File: /app/View/User/message.ctp -->  
<div id="userMessage" class="span3">
	<?php 
		echo $this->element("user_message");
	?>
</div>
<div id="Tabable" class="span8">
	<ul id="iTab" class="nav nav-tabs">
		<li class="active"><a href="#myresume" data-toggle="tab">
			<i class="icon-folder-open"></i>
			我的简历
		</a></li>		
		<li><a href="#eductions" data-toggle="tab">
			<i class="icon-pencil"></i>
			学历信息	
		</a></li>
		<li><a href="#experiences" data-toggle="tab">
			<i class="icon-coffee"></i>
			职位信息
		</a></li>
		<li><a href="#skills" data-toggle="tab">
			<i class="icon-wrench"></i>			
			熟悉技能
		</a></li>
		<li><a href="#books" data-toggle="tab">
			<i class="icon-book"></i>
			出版书籍
		</a></li>
	</ul>
	<div class="tab-content">			
	<?php 
		echo $this->element("user_resume_list");
		echo $this->element("edulist");
		echo $this->element("explist");
		echo $this->element("skillslist");
		echo $this->element("booklist");
	?>
	</div>
</div>