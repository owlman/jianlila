<div id="eductions" class="tab-pane fade">
	<div class="pull-right item-operation"><?php echo $this->Html->link(
			$this->Html->tag("i", "",array("class" => "icon-plus icon-large"))." 添加",
			array("controller"=>"Educations", 
				  "action"=>"eduadd",
				  $uid
			),
			array("class" => "btn btn-info", "escape" => false)			
		);
	?></div>
	<div class="clear"></div>
	 <table class="table">
		<?php foreach ($edus as $edu): ?>
	    <tr>
	    	<td>
	    		<h3><?=$edu["Education"]["study"]."专业，".$edu["Education"]["degree"] ?></h3>
	    		<p> <strong><?=$edu["Education"]["school"]."：   " ?></strong>
	    			 <?=$edu["Education"]["in_date"]."至".$edu["Education"]["out_date"] ?>
	    		</p>
	    		<p> <strong>补充说明：</strong>
	    			<?=$edu["Education"]["description"] ?>
	    		</p>
	    	</td>
	    	<td><div class="pull-right item-operation"><?php
    			echo $this->Html->link(
					$this->Html->tag("i", "",array("class" => "icon-edit icon-large")),
					array("controller" => "Educations",
    				      "action" => "eduedit",
    					  $edu["Education"]["id"]
    			    ),
    				array("class" => "btn", "escape" => false)
				);
				echo $this->Html->link(
					$this->Html->tag("i", "",array("class" => "icon-trash icon-large")),
					array("controller" => "Educations", 
						  "action" => "eduremove", 
						  $edu["Education"]["id"]
					),
    				array("class" => "btn", "escape" => false)
				);	    		
		    ?></div></td>
	    </tr>  
	    <?php endforeach; ?>  
	</table>
</div>