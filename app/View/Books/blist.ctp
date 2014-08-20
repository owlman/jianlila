 <!-- File: /app/View/Books/blist .ctp -->
<div>
	<h3>作品列表</h3>
	<p><?php echo $this->Html->link(
			"添加新作品",array("controller"=>"Books", 
							"action"=>"badd",
							$uid
			));
	?></p>
	
	 <table class="table table-bordered table-striped">
		<tr>
	  		<th>书名</th>
			<th>出版日期</th>
			<th>内容简介</th>
			<th>操作</th>
		</tr>
		<?php foreach ($books as $book)://print_r($book) ; ?>
	    <tr> 
	    	<td><?php echo $book["Book"]["bookname"];?></td> 
	    	<td><?php echo $book["Book"]["pubdate"];?></td>
	    	<td><?php echo $book["Book"]["description"];?></td>
	    	<td><?php
	    			echo $this->Html->link(
	    				"编辑",
	    				array("controller" => "Books",
	    				      "action" => "bedit",
	    					  $book["Book"]["id"]
	    			    )
	    			 );
					echo "|";
	    			 echo $this->Html->link(
						"删除",
						array("controller" => "Books", 
							  "action" => "bremove", 
							  $book["Book"]["id"]
						)
				    );
	    	?></td>    	    	
	    </tr>  
	    <?php endforeach; ?>  
	</table>
</div>