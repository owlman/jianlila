	<table class="table table-bordered table-striped">
		<tr>
	  		<th>简历名称</th>
			<th>所有者</th>
			<th>目标职位</th>
			<th>模版</th>
			<th>联系他</th>			
			<th>可执行的操作</th>
		</tr>
		<?php foreach ($resumes as $res): ?>
	    <tr> 
	    	<td><?php echo $res["Resume"]["resume_label"];?></td> 
	    	<td><?php 
	    		echo $res["Resume"]["first_name"]." ".$res["Resume"]["last_name"];
	    	?></td>
	    	<td><?php echo $res["Resume"]["objective"];?></td>
	    	<td><?php
	    		echo "模版1 | 模版2";
	    	?></td>
	    	<td>
	    		<a href="mailto:<?=$res["Resume"]["email"]; ?>">发邮件</a>
	    	</td>
	    	<td><?php
	    		if ($this->Session->check("uid") 
	    				&&$this->Session->read("uid")===$res["Resume"]["user_id"]) {
	    			echo $this->Html->link(
						"编辑",
						array("controller" => "Resumes",
							"action" => "edit",
							$res["Resume"]["id"]
						)
					);
					echo "|";
					echo $this->Html->link(
							"删除",
							array("controller" => "Resumes",
									"action" => "remove",
									$res["Resume"]["id"]
							)
					);
	    		}
	       	?></td>    	    	
	    </tr>  
	    <?php endforeach; ?>  
	</table>