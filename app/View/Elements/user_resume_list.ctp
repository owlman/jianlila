<div id="myresume" class="tab-pane fade in active">
	<div class="pull-right item-operation"><?php echo $this->Html->link(
			$this->Html->tag("i", "",array("class" => "icon-plus icon-large"))." 添加",
			array(
				"controller"=>"Resumes", 
				"action"=>"write",
				$this->Session->read("uid")
			), 
			array("class" => "btn btn-info", "escape" => false)
		);			
	?></div>
	<div class="clear"></div>		
	<table class="table">
		<?php foreach ($resumes as $res): ?>
	    <tr>
	    	 	<td><h3><?php 
	    		echo $this->Html->link(
					$res["Resume"]["resume_label"],
					array("controller"=>"Resumes",
						"action" => "baseResume",
						$res["Resume"]["id"]
				   )
				);
	    	?></h3>
	    	<p><strong>申请人：</strong>
	    		<?=$res["Resume"]["first_name"]." ".$res["Resume"]["last_name"]?> 
	    	</p>
	    	<p><strong>申请职位：</strong>
	    		<?=$res["Resume"]["objective"] ?>
	    	</p>
	    	</td>
	    	<td><div class="pull-right item-operation"><?php
	    		echo $this->Html->link(
	    			$this->Html->tag("i", "",array("class" => "icon-envelope icon-large")),
	    			"mailto:".$res["Resume"]["email"],
	    			array("class" => "btn", "escape" => false)
	    		);		    		
	    		if ($this->Session->check("uid") 
	    				&&$this->Session->read("uid")===$res["Resume"]["user_id"]) {
	    			echo $this->Html->link(
						$this->Html->tag("i", "",array("class" => "icon-edit icon-large")),
						array("controller" => "Resumes",
							"action" => "edit",
							$res["Resume"]["id"]
						),
	    				array("class" => "btn", "escape" => false)
					);
					echo $this->Html->link(
						$this->Html->tag("i", "",array("class" => "icon-trash icon-large")),
						array("controller" => "Resumes",
							  "action" => "remove",
							  $res["Resume"]["id"]
						),
	    				array("class" => "btn", "escape" => false)
					);
	    		}
		    ?></div></td>    	    	
	    </tr>  
	    <?php endforeach; ?>  
	</table>
</div>	