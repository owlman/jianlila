<div class="span10">
	<h3>技能列表</h3>
	<p><?php echo $this->Html->link(
			"添加新技能",array("controller"=>"Skills", 
							"action"=>"sadd",
							$uid
			));
	?></p>
	
	 <table class="table table-bordered table-striped">
		<tr>
	  		<th>技能</th>
			<th>熟练程度</th>
			<th>操作</th>
		</tr>
		<?php foreach ($skills as $skill): ?>
	    <tr> 
	    	<td><?php echo $skill["Skill"]["skillname"];?></td> 
	    	<td><?php echo $skill["Skill"]["level"];?></td>
	    	<td><?php
	    			echo $this->Html->link(
	    				"编辑",
	    				array("controller" => "Skills",
	    				      "action" => "sedit",
	    					  $skill["Skill"]["id"]
	    			    )
	    			 );
					echo "|";
	    			 echo $this->Html->link(
						"删除",
						array("controller" => "Skills", 
							  "action" => "sremove", 
							  $skill["Skill"]["id"]
						)
				    );
	    	?></td>    	    	
	    </tr>  
	    <?php endforeach; ?>  
	</table>
</div>