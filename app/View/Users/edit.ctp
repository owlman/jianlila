 <!-- File: /app/View/User/edit.ctp -->
<h1>编辑 <?php echo $user["User"]["username"];?> 的用户信息</h1>
<?php echo $this->Form->create("User",
        array(
          "action" => "edit",
          "inputDefaults" => array(
              "label" => false,
              "div" => false
        )
     ));?>
<table>
  <tr>
    <td>密码</td>
    <td>
      <?php echo $this->Form->input("password",array("type"=>"text",));?>
    </td>
  </tr>
  <tr>
    <td>电子邮件</td>
    <td>
      <?php echo $this->Form->input("email");?>
    </td>
  </tr>
  <tr>
    <td>姓氏</td>
    <td>
      <?php echo $this->Form->input("first_name");?>
    </td>
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
      <?php echo $this->Form->checkbox("isadmin");?>
    </td>
  </tr>
  <?php endif;?>
  <tr>
    <td>
      <?php 
         echo $this->Form->input("id",array("type" => "hidden"));
        echo $this->Form->end("保存信息！"); ?>
    </td>
    <td>
      <?php 
        echo $this->Html->link(
           "返回",
           array("controller" => "Users", "action" => "message",$user["User"]["id"])
      );
      ?>
    </td>
  </tr>
</table>


