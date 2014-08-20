 <!-- File: /app/View/Experiences/expedit.ctp -->
<div class="container">
 	<?php echo $this->Form->create("Experience",
	        array("inputDefaults" => array(
	          "label" => false,
	          "div" => false
	        )
	     ));
	?>
	<table class="table table-bordered table-striped message">
	  <tr>
	    <td>职位： </td>
	    <td>
	      <?php echo $this->Form->input("title");?> 
	    </td>
	  </tr>
	  <tr>
	    <td>所在公司： </td>
	    <td>
	      <?php echo $this->Form->input("company");?> 
	    </td>
	  </tr>
	  <tr>
	    <td>在职时间：</td>
	    <td> <?php
	    	echo $this->Form->input("in_date", array(
	    		"type" => "date",
	    		"dateFormat" => "Y-M-D",
	    		"minYear" => 1940,
	    		"maxYear" => 2050,
	   		));
			echo "——";
	     	echo $this->Form->input("out_date", array(
	    		"type" => "date",
				"dateFormat" => "Y-M-D",
	    		"minYear" => 1940,
	    		"maxYear" => 2050,
			));
	     	?> </td>
	    </tr>
	  <tr>
	    <td>补充说明 （可不填）:</td>
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
	           		array("controller"=>"Experiences", 
						  "action"=>"explist",
						  $uid
					)
	      	   );
	      
	    	?>
	    </td>
	  </tr>
	  <?php echo $this->Form->end(); ?>	  
	</table>
</div>