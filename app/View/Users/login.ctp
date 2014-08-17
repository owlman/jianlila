<!-- File: /app/View/User/login.ctp -->
<h3>用户登录</h3>
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
        <?php echo $this->Form->end("登录");?></td>
        <td>
          <?php echo $this->Html->link(
                 "注册新用户",
                 array("controller" => "Users", "action" => "add")
           );?>
        </td>

</table>
