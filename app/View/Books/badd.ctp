 <!-- File: /app/View/Books/badd.ctp -->
<div class="container">
 	<table class="table table-bordered table-striped message"> 
	<?php echo $this->Form->create("Book",
	        array("inputDefaults" => array(
	          "label" => false,
	          "div" => false
	        )
	     ));
	?>
	  <tr>
	    <td>请输入书名 （必填）：</td>
	    <td>
	      <?php echo $this->Form->input("bookname");?> 
	    </td>
	  </tr>
	  <tr>
	    <td>出版日期 （必填）：</td>
	    <td> <?php
	     	echo $this->Form->input("pubdate", array(
	    		"type" => "date",
				"dateFormat" => "Y-M-D",
	    		"minYear" => 1940,
	    		"maxYear" => 2050
			));
	     	?> </td>
	    </tr>
	  <tr>
	    <td>内容简介 （可不填）：</td>
	    <td>
	      <?php 
	      	   echo $this->Form->input("description", array("type" => "textarea"));	      	   
	      ?>
	    </td>
	  </tr>
	  <tr>
	    <td>
	      	<button type="submit" class="btn btn-success">添加</button>
	    </td>
	    <td>
	    	<button type="reset" class="btn btn-primary">重置</button>
	    	<?php
	    	   echo " | ";
	    	   echo $this->Html->link(
	           		"放弃",
	           		array("controller"=>"Books", 
						  "action"=>"blist",
						  $uid
					)
	      	   );
	      
	    	?>
	    </td>
	  </tr>
	<?php echo $this->Form->end();?>
	</table>
</div>