<!-- File: /app/View/User/login.ctp -->
<div class="container">
	<h2>用户登录：</h2>
	<table class="table table-bordered table-striped login">
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
	  <tr>
	    <td>用户名：</td>
	    <td>
	      <?php echo $this->Form->input("username");?>
	    </td>
	   </tr> 
	   <tr>
	      <td>密  码：</td>
	      <td>
	        <?php echo $this->Form->input("password");?>
	      </td>
	    </tr>
	    <tr>
	        <td>
	        	<button type="submit" class="btn btn-success">登录</button>
	        </td>
	        <td>
	          <?php echo $this->Html->link(
	                 "注册新用户",
	                 array("controller" => "Users", "action" => "add")
	           );?>
	        </td>
	      </tr>
	</table>
</div>