<div id="skills" class="tab-pane fade">
	<div class="pull-right item-operation"><?php echo $this->Html->link(
			$this->Html->tag("i", "",array("class" => "icon-plus icon-large"))." 添加",
			array("controller"=>"Skills", 
			      "action"=>"sadd",
				  $uid
			),
			array("class" => "btn btn-info", "escape" => false)			
		);
	?></div>
	<div class="clear"></div>
	
	 <table class="table">
		<?php foreach ($skills as $skill): ?>
	    <tr>
	    	<td>
	    		<h3><?=$skill["Skill"]["skillname"] ?></h3>
	    		<p> <strong>熟练程度：</strong>
	    			 <?=$skill["Skill"]["level"]; ?>
	    		</p>	    		
	    	</td>
	    	<td><div class="pull-right item-operation"><?php
    			echo $this->Html->link(
					$this->Html->tag("i", "",array("class" => "icon-edit icon-large")),
					array("controller" => "Skills",
	    			      "action" => "sedit",
	    				  $skill["Skill"]["id"]
	    			),
    				array("class" => "btn", "escape" => false)
				);
				echo $this->Html->link(
					$this->Html->tag("i", "",array("class" => "icon-trash icon-large")),
					array("controller" => "Skills", 
						  "action" => "sremove", 
						  $skill["Skill"]["id"]
					),
    				array("class" => "btn", "escape" => false)
				);	    		
		    ?></div></td>
	    </tr>
	    <?php endforeach; ?>  
	</table>
</div>