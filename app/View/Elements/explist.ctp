<div id="experiences" class="tab-pane fade">
	<div class="pull-right item-operation"><?php echo $this->Html->link(
			$this->Html->tag("i", "",array("class" => "icon-plus icon-large"))." 添加",
			array("controller"=>"Experiences", 
			      "action"=>"expadd",
				  $uid
			),
			array("class" => "btn btn-info", "escape" => false)			
		);
	?></div>
	<div class="clear"></div>
	
	<table class="table">
		<?php foreach ($exps as $exp): ?>
	    <tr>
	    	<td>
	    		<h3><?=$exp["Experience"]["title"] ?></h3>
	    		<p> <strong><?=$exp["Experience"]["company"]."：   " ?></strong>
	    			 <?=$exp["Experience"]["in_date"]."至".$exp["Experience"]["out_date"] ?>
	    		</p>
	    		<p> <strong>补充说明：</strong>
	    			<?=$exp["Experience"]["description"] ?>
	    		</p>
	    	</td>
	    	<td><div class="pull-right item-operation"><?php
    			echo $this->Html->link(
					$this->Html->tag("i", "",array("class" => "icon-edit icon-large")),
					array("controller" => "Experiences",
	    			      "action" => "expedit",
	    				  $exp["Experience"]["id"]
	    			),
    				array("class" => "btn", "escape" => false)
				);
				echo $this->Html->link(
					$this->Html->tag("i", "",array("class" => "icon-trash icon-large")),
					array("controller" => "Experiences", 
						  "action" => "expremove", 
						  $exp["Experience"]["id"]
					),
    				array("class" => "btn", "escape" => false)
				);	    		
		    ?></div></td>
	    </tr>  
	    <?php endforeach; ?>  
	</table>
</div>