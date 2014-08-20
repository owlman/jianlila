<!-- File: /app/View/User/add.ctp -->
<div class="container">
	<h3><?php
		if ($isadmin) {
			echo "添加新用户";
		} else {
			echo "注册新用户";
		}
	?></h3>
	<table class="table table-bordered table-striped message">
	<?php echo $this->Form->create("User",
	        array("inputDefaults" => array(
	          "label" => false,
	          "div" => false
	        )
	     ));
	?>
	  <tr>
	    <td>请输入用户名 （必填）：</td>
	    <td><?php echo $this->Form->input("username");?></td>
	  </tr>
	  <tr>
	    <td>请输入密码 （必填）：</td>
	    <td><?php echo $this->Form->input("password");?> </td>
	  </tr>
	  <tr>
	    <td>请再次输入密码 （必填）：</td>
	    <td>
	      <?php echo $this->Form->input("password2", array("type" => "password" )); ?>
	    </td>
	  </tr>
	  <tr>
	    <td>请输入电子邮件 （必填）：</td>
	    <td> <?php echo $this->Form->input("email");?> </td>
	  </tr>
	  <tr>
	    <td>请输入您的姓氏：</td>
	    <td>
	      <?php echo $this->Form->input("first_name");?> </td>
	  </tr>
	  <tr>
	    <td>请输入您的名字：</td>
	    <td>
	      <?php echo $this->Form->input("last_name");?>
	    </td>
	  </tr>
	  <?php if($isadmin): ?>
	  <tr>
	    <td>是否赋予管理员身份：</td>
	    <td>
	      <?php echo $this->Form->checkbox("isadmin",array("hiddenField"=>false));?>
	    </td>
	  </tr>
	  <?php endif;?>
	  <tr>
	    <td>
	      	<button type="submit" class="btn btn-success">注册</button>
	    </td>
	    <td>
	    	<button type="reset" class="btn btn-primary">重置</button>
	    	<?php
	    	   echo " | ";
	    	   echo $this->Html->link(
	           		"放弃",
	           		array("controller"=>"Users", "action"=>"ulist")
	      	   );
	      
	    	?>
	    </td>
	  </tr>
	  <?php echo $this->Form->end(); ?>
	</table>
</div>
