 <!-- File: /app/View/User/edit.ctp -->
<div class="container">
	<h3>编辑 <?php echo $user["User"]["username"];?> 的用户信息：</h3>
	<?php echo $this->Form->create("User",
	        array(
	          "action" => "edit",
	          "inputDefaults" => array(
	              "label" => false,
	              "div" => false
	        )
	));?>
	<table class="table table-bordered table-striped message">
	  <tr>
	    <td>用户名：</td>
	    <td>
	      <?php echo $this->Form->input("username");?>
	    </td>
	  </tr>		
	  <tr>
	    <td>密码：</td>
	    <td>
	      <?php echo $this->Form->input("password",array("type"=>"text",));?>
	    </td>
	  </tr>
	  <tr>
	    <td>电子邮件：</td>
	    <td>
	      <?php echo $this->Form->input("email");?>
	    </td>
	  </tr>
	  <tr>
	    <td>姓氏：</td>
	    <td>
	      <?php echo $this->Form->input("first_name");?>
	    </td>
	  </tr>
	  <tr>
	    <td>名字：</td>
	    <td>
	      <?php echo $this->Form->input("last_name");?>
	    </td>
	  </tr>
	  <?php if($isadmin): ?>
	  <tr>
	    <td>管理员身份：</td>
	    <td>
	      <?php echo $this->Form->checkbox("isadmin");?>
	    </td>
	  </tr>
	  <?php endif;?>
	  <tr>
	    <td>
	      	<button type="submit" class="btn btn-success">保存</button>
	    </td>
	    <td>
	    	<button type="reset" class="btn btn-primary">重置</button>
	    	<?php
	    	   echo " | ";
	    	   echo $this->Html->link(
	           		"放弃编辑",
	           		array("controller"=>"Users", "action"=>"ulist")
	      	   );
	      
	    	?>
	    </td>	    
	  </tr>
	  <?php 
	        echo $this->Form->input("id",array("type" => "hidden"));
	        echo $this->Form->end();
	  ?>
	</table>
</div>