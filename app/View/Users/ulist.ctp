<!-- File: /app/View/User/ulist.ctp -->
<h1>用户列表</h1>
<p><?php echo $this->Html->link(
		"注册新用户",
		array("controller"=>"Users", "action"=>"add")
		);
?></p>

<table>  
    <tr>  
        <th>用户名</th>  
        <th>电子邮件</th>
        <th>用户身份</th>
        <th>操作</th>
    </tr>  
    <?php foreach ($users as $user): ?>  
    <tr>  
        <td><?php   
	          echo $this->Html->link(
	  	        $user["User"]["username"],
		          array("controller" => "Users", "action" => "message", $user["User"]["id"])
		        );              
        ?></td>  
        <td><?php echo $user["User"]["email"]; ?></td>
	      <td><?php if($user["User"]["isadmin"]){ echo "管理员";} else{ echo "普通用户";}; ?></td>
	      <td><?php   
	          echo $this->Html->link(
		          "编辑",
		          array("controller" => "Users", "action" => "edit", $user["User"]["id"])
		        );
	          echo " | ";
	          echo $this->Form->postlink(
		           "删除",
		           array("controller" => "Users", "action" => "remove", $user["User"]["id"])
		        );
        ?></td>
    </tr>  
    <?php endforeach; ?>  
</table> 
 