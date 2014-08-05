<!-- File: /app/View/User/login.ctp -->
<?php if ($error): ?>
<p>用户名或密码错误！</p>
<?php endif; ?>
<h1>用户登陆</h1>
<?php
  echo $this->Form->create("User");
  echo $this->Form->input("username",array("label"=>"用户名"));
  echo $this->Form->input("password",array("label"=>"密码"));
  
  echo $this->Form->end("登陆！");
 
?>