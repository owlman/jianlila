<!-- File: /app/View/User/message.ctp -->  
<h2>欢迎回来，<?=$user["User"]["username"] ?>！</h2>
<p><?php 
if($user["User"]["id"] === $uid) {
	echo $this->Html->link("注销登录", array(
			"controller" => "Users", 
			"action" => "logout"
	));
	echo " | ";
	echo $this->Html->link("查看我的简历",array(
			"controller"=>"Resumes",
			"action"=>"index"
	));
}
if($isadmin) {
	echo " | ";
	echo $this->Html->link(
			"查看所有用户",
			array("controller" => "Users", "action" => "ulist")
	);
}
?></p>
<?php 
	echo $this->element("user_message");
	echo $this->element("edulist");
	echo $this->element("explist");
	echo $this->element("skillslist");
	echo $this->element("booklist");
?>