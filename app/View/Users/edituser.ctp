<?xml version="1.0" encoding="utf-8"?>
 <!-- File: /app/View/User/edituser.ctp -->
<h1>编辑 <?php echo $user["User"]["username"];?> 的用户信息</h1>
<?php
  echo $this->Form->create("User",array("action" => "edituser"));
  echo $this->Form->input("password",array("type"=>"text","label"=>"用户密码"));
  echo $this->Form->input("email",array("label"=>"电子邮件"));
  echo $this->Form->input("first_name",array("label"=>"姓氏"));
  echo $this->Form->input("last_name",array("label"=>"名字"));
  echo $this->Form->input("id",array("type" => "hidden"));

  echo $this->Form->end("保存用户信息!");
?>