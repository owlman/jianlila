 <!-- File: /app/View/User/add.ctp -->
<h1>注册新用户</h1>

<?php echo $this->Form->create("User",
        array("inputDefaults" => array(
          "label" => false,
          "div" => false
        )
     ));?>
<table>
  <tr>
    <td>用户名</td>
    <td>
      <?php echo $this->Form->input("username");?></td>
  </tr>
  <tr>
    <td>密码</td>
    <td>
      <?php echo $this->Form->input("password");?> </td>
    </tr>
  <tr>
    <td>电子邮件</td>
    <td>
      <?php echo $this->Form->input("email");?> </td>
    </tr>
  <tr>
    <td>姓氏</td>
    <td>
      <?php echo $this->Form->input("first_name");?> </td>
    </tr>
  <tr>
    <td>名字</td>
    <td>
      <?php echo $this->Form->input("last_name");?>
    </td>
  </tr>
  <?php if($isadmin): ?>
  <tr>
    <td>管理员身份</td>
    <td>
      <?php echo $this->Form->checkbox("isadmin",array("hiddenField"=>false));?>
    </td>
  </tr>
  <?php endif;?>
  <tr>
    <td>
      <?php echo $this->Form->end("注册！"); ?>
    </td>
    <td>
      <?php 
        echo $this->Form->button("重填！",array("type"=>"reset"));
        echo " | ";
        echo $this->Html->link(
           "返回",
           array("controller" => "Users", "action" => "index")
      );

      ?>
    </td>
  </tr>
</table>
