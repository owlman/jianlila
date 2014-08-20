<!-- File: /app/View/Experiences/expadd.ctp -->

<div class="container">
 	<table class="table table-bordered table-striped message"> 
	<?php echo $this->Form->create("Experience",
	        array("inputDefaults" => array(
	          "label" => false,
	          "div" => false
	        )
	     ));
	?>
	 <tr>
	    <td>请输入您的职务：</td>
	    <td><?php 
	      	echo $this->Form->input("title");
	    ?></td>
	  </tr>
	  <tr>
	    <td>请输入您就职的公司 ：</td>
	    <td>
	      <?php echo $this->Form->input("company");?> 
	    </td>
	  </tr>
	  <tr>
	    <td>您的在职时间 ：</td>
	    <td> <?php
	     	echo $this->Form->input("in_date", array(
				"type" => "date",
	    		"dateFormat" => "Y-M-D",
	    		"minYear" => 1940,
	    		"maxYear" => 2050
			));
	     	echo "—";
	     	echo $this->Form->input("out_date", array(
	    		"type" => "date",
				"dateFormat" => "Y-M-D",
	    		"minYear" => 1940,
	    		"maxYear" => 2050
			));
	     	?> </td>
	    </tr>
	  <tr>
	    <td>补充说明  （可不填）：</td>
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
	           		array("controller"=>"Experiences", 
						  "action"=>"explist",
						  $uid
					)
	      	   );
	      
	    	?>
	    </td>
	  </tr>
	  
	<?php echo $this->Form->end();?>
	</table>
</div>