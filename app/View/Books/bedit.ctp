 <!-- File: /app/View/Books/bedit.ctp -->
<div class="container">
 	<?php echo $this->Form->create("Book",
	        array("inputDefaults" => array(
	          "label" => false,
	          "div" => false
	        )
	     ));
	?>
	<table class="table table-bordered table-striped message">
	  <tr>
	    <td>书名： </td>
	    <td>
	      <?php echo $this->Form->input("bookname");?> 
	    </td>
	  </tr>
	  <tr>
	    <td>出版日期：</td>
	    <td> <?php
	     	echo $this->Form->input("pubdate", array(
	    		"type" => "date",
				"dateFormat" => "Y-M-D",
	    		"minYear" => 1940,
	    		"maxYear" => 2050,
			));
	     	?> </td>
	    </tr>
	  <tr>
	    <td>内容简介 （可不填）:</td>
	    <td>
	      <?php
	       	echo $this->Form->input("description", array("type" => "textarea"));
	       	echo $this->Form->input("user_id",array("type" => "hidden"));
	       	echo $this->Form->input("id",array("type" => "hidden"));
	      ?>	       
	     </td>
	  </tr>
	  <tr>
	    <td>
	      	<button type="submit" class="btn btn-success">保存</button>
	    </td>
	    <td>
	    	<button type="reset" class="btn btn-primary">重置</button>
	    	<?php
	    	   echo " | ";
	    	   echo $this->Html->link(
	           		"放弃编辑",
	           		array("controller"=>"Books", 
						  "action"=>"blist",
						  $uid
					)
	      	   );
	      
	    	?>
	    </td>
	  </tr>
	  <?php echo $this->Form->end(); ?>	  
	</table>
</div>