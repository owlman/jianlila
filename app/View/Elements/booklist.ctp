<div id="books" class="tab-pane fade">
	<div class="pull-right item-operation"><?php echo $this->Html->link(
			$this->Html->tag("i", "",array("class" => "icon-plus icon-large"))." 添加",
			array("controller"=>"Books", 
				  "action"=>"badd",
				  $uid
			),
			array("class" => "btn btn-info", "escape" => false)			
		);
	?></div>
	<div class="clear"></div>
	
	<table class="table">
		<?php foreach ($books as $book): ?>
	    <tr>
	    	<td>
	    		<h3><?=$book["Book"]["bookname"] ?></h3>
	    		<p> <strong>出版日期：</strong>
	    			 <?=$book["Book"]["pubdate"] ?>
	    		</p>
	    		<p> <strong>补充说明：</strong>
	    			 <?=$book["Book"]["description"] ?>
	    		</p>	    		
	    	</td>
	    	<td><div class="pull-right item-operation"><?php
    			echo $this->Html->link(
					$this->Html->tag("i", "",array("class" => "icon-edit icon-large")),
					array("controller" => "Books",
	    			      "action" => "bedit",
	    				  $book["Book"]["id"]
	    			),
    				array("class" => "btn", "escape" => false)
				);
				echo $this->Html->link(
					$this->Html->tag("i", "",array("class" => "icon-trash icon-large")),
					array("controller" => "Books", 
						  "action" => "bremove", 
						  $book["Book"]["id"]
					),
    				array("class" => "btn", "escape" => false)
				);	    		
		    ?></div></td>
	    </tr>
	    <?php endforeach; ?> 
	</table>
</div>