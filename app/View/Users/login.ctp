<!-- File: /app/View/User/login.ctp -->
<?php if ($error): ?>
<p>用户名或密码错误！</p>
<?php endif; ?>
<h1>用户登陆</h1>
<?php
    echo $this->Form->create("User",
        array(
          "action" => "login",
          "inputDefaults" => array(
              "label" => false,
              "div" => false
        )
     ));
 ?>
<table>
  <tr>
    <td>用户名</td>
    <td>
      <?php echo $this->Form->input("username");?>
    </td>
    <tr>
      <td>密码</td>
      <td>
        <?php echo $this->Form->input("password");?>
      </td>
      <tr>
        <td>
        <?php echo $this->Form->end("登陆！");?></td>
        <td>
          <?php echo $this->Html->link(
                 "注册新用户",
                 array("controller" => "Users", "action" => "add")
           );?>
        </td>

</table>
