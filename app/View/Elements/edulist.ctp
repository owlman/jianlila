<div id="eductions" class="tab-pane fade span10">
	<p><?php echo $this->Html->link(
			"添加新学历",array("controller"=>"Educations", 
							"action"=>"eduadd",
							$uid
			));
	?></p>
	
	 <table class="table table-bordered table-striped">
		<tr>
	  		<th>学历</th>
			<th>学校</th>
			<th>专业</th>
			<th>入学时间</th>
			<th>毕业时间</th>
			<th>补充说明</th>
			<th>操作</th>
		</tr>
		<?php foreach ($edus as $edu): ?>
	    <tr> 
	    	<td><?php echo $edu["Education"]["degree"];?></td> 
	    	<td><?php echo $edu["Education"]["school"];?></td>
	    	<td><?php echo $edu["Education"]["study"];?></td>
	    	<td><?php echo $edu["Education"]["in_date"];?></td>
	    	<td><?php echo $edu["Education"]["out_date"];?></td>
	    	<td><?php echo $edu["Education"]["description"];?></td>
	    	<td><?php
	    			echo $this->Html->link(
	    				"编辑",
	    				array("controller" => "Educations",
	    				      "action" => "eduedit",
	    					  $edu["Education"]["id"]
	    			    )
	    			 );
					echo "|";
	    			 echo $this->Html->link(
						"删除",
						array("controller" => "Educations", 
							  "action" => "eduremove", 
							  $edu["Education"]["id"]
						)
				    );
	    	?></td>    	    	
	    </tr>  
	    <?php endforeach; ?>  
	</table>
</div>