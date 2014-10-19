<div id="userid">
	<h4>
		<i class="icon-user"></i>			
		<?=$user["User"]["username"] ?> 
		<small class="pull-right">（<?php 
			echo $this->Html->link(
				"修改信息",
				array("controller"=>"Users", "action"=>"edit",$user["User"]["id"])
			);
		?>）</small>
	</h4>
</div>
<div id="userdesc">
	<table class="table table-condensed">		
		<tr>		
		    <th>姓名：</th>
			<td><?php 
				echo $user["User"]["first_name"] ." " . $user["User"]["last_name"]
			?></td>                
		</tr>
		<tr>     
		    <th>邮件：</th>
			<td><?php 
				echo $user["User"]["email"] 
			?></td>
		</tr>
		<tr>                
		    <th>身份：</th>
		    <td><?php 
		    	if($user["User"]["isadmin"]){ echo "管理员";} else{ echo "普通用户";} 
		    ?></td>
		</tr>
	 </table>
</div>  
<div class="bottom"></div>		  
