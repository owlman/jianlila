<!-- File: /app/View/User/usermsg.ctp -->  
<div class="container">
	<h3>用户信息</h3>
	<p><?php
	  	  echo $this->Html->link(
	           "编辑",
	           array("controller"=>"Users", "action"=>"edit",$user["User"]["id"])
	      );
	      
	      if($user["User"]["id"] === $uid) {
	         echo " | ";      
	         echo $this->Html->link(
	             "注销登录",
	             array("controller" => "Users", "action" => "logout")
	         );
	      }
	      if($isadmin) {
	         echo " | ";      
	         echo $this->Html->link(
	             "查看所有用户",
	             array("controller" => "Users", "action" => "ulist")
	         );
	      }
	?></p>
	<table class="table table-bordered table-striped">		
	    <tr>  
	        <td>用户名：</td>
			    <td><?php echo $user["User"]["username"] ?></td>                
	    </tr>
		  <tr>  
	        <td>真实姓名：</td>
			    <td><?php echo $user["User"]["first_name"] ." " . $user["User"]["last_name"] ?></td>                
	    </tr>
		  <tr>  
	        <td>用户密码：</td>
			    <td><?php echo $user["User"]["password"] ?></td>                
	    </tr>
		  <tr>  
	        <td>电子邮件：</td>
			    <td><?php echo $user["User"]["email"] ?></td>                
	    </tr>
	    <tr>
	      <td>用户身份：</td>
	      <td>
	        <?php if($user["User"]["isadmin"]){ echo "管理员";} else{ echo "普通用户";} ?>
	      </td>
	  </tr>  
	</table> 
</div>