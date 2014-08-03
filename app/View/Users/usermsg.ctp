<!-- File: /app/View/User/usermsg.ctp -->  
<h1>用户信息</h1>
<p><?php
      echo $this->Html->link(
           "编辑",
           array("controller"=>"Users", "action"=>"edituser",$user["User"]["id"])
      );
      echo " | ";
      echo $this->Html->link(
           "删除",
           array('controller' => 'Users', 'action' => 'deleteuser', $user["User"]["id"])
      );

?></p>

<table>		
    <tr>  
        <td>用户名</td>
		    <td><?php echo $user["User"]["username"] ?></td>                
    </tr>
	  <tr>  
        <td>真实姓名</td>
		    <td><?php echo $user["User"]["first_name"] ." " . $user["User"]["last_name"] ?></td>                
    </tr>
	  <tr>  
        <td>用户密码</td>
		    <td><?php echo $user["User"]["password"] ?></td>                
    </tr>
	  <tr>  
        <td>电子邮件</td>
		    <td><?php echo $user["User"]["email"] ?></td>                
    </tr>     
</table> 