<?xml version="1.0" encoding="utf-8"?>
 <!-- File: /app/View/User/adduser.ctp -->
<h1>注册新用户</h1>
<?php
  echo $this->Form->create("User");
  echo $this->Form->input("username",array("label"=>"用户名"));
  echo $this->Form->input("password",array("label"=>"密码"));
  echo $this->Form->input("email",array("label"=>"电子邮件"));
  echo $this->Form->input("first_name",array("label"=>"姓氏"));
  echo $this->Form->input("last_name",array("label"=>"名字"));
  
  echo $this->Form->end("注册！");
?>