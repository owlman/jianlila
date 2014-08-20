 <!-- File: /app/View/Experiences/blist .ctp -->
<div>
	<h3>职位列表</h3>
	<p><?php echo $this->Html->link(
			"添加新职位",array("controller"=>"Experiences", 
							"action"=>"expadd",
							$uid
			));
	?></p>
	
	 <table class="table table-bordered table-striped">
		<tr>
	  		<th>职位</th>
			<th>所在公司</th>
			<th>在职时间</th>
			<th>内容简介</th>
			<th>操作</th>
		</tr>
		<?php foreach ($exps as $exp)://print_r($Experience) ; ?>
	    <tr> 
	    	<td><?php echo $exp["Experience"]["title"];?></td> 
	    	<td><?php echo $exp["Experience"]["company"];?></td> 
	    	<td><?php 
	    		echo $exp["Experience"]["in_date"];
	    		echo "——";
	    		echo $exp["Experience"]["out_date"];	    		 
	    	?></td>
	    	<td><?php echo $exp["Experience"]["description"];?></td>
	    	<td><?php
	    			echo $this->Html->link(
	    				"编辑",
	    				array("controller" => "Experiences",
	    				      "action" => "expedit",
	    					  $exp["Experience"]["id"]
	    			    )
	    			 );
					echo "|";
	    			 echo $this->Html->link(
						"删除",
						array("controller" => "Experiences", 
							  "action" => "expremove", 
							  $exp["Experience"]["id"]
						)
				    );
	    	?></td>    	    	
	    </tr>  
	    <?php endforeach; ?>  
	</table>
</div>