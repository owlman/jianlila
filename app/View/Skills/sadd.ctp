 <!-- File: /app/View/Books/sadd.ctp -->
<div class="container">
 	<table class="table table-bordered table-striped message"> 
	<?php echo $this->Form->create("Skill",
	        array("inputDefaults" => array(
	          "label" => false,
	          "div" => false
	        )
	     ));
	?>
	  <tr>
	    <td>您熟悉的技能 ：</td>
	    <td>
	      <?php echo $this->Form->input("skillname");?> 
	    </td>
	  </tr>
	  <tr>
	    <td>熟练程度：</td>
	    <td> <?php
	     	echo $this->Form->input("level", array(
				"empty" => "【请选择】",
				"options" => array(
					"初学"=>"初学",
					"熟悉"=>"熟悉",
					"精通"=>"精通",
					"专家"=>"专家"
				)
			));
	     	?> </td>
	  </tr>
	  <tr>
	    <td>
	      	<button type="submit" class="btn btn-success">添加</button>
	    </td>
	    <td>
	    	<button type="reset" class="btn btn-primary">重置</button>
	    	<?php
	    	   echo $this->Form->input("user_id",array("type" => "hidden"));
	    	   echo $this->Form->input("id",array("type" => "hidden"));
	    	   echo " | ";
	    	   echo $this->Html->link(
	           		"放弃",
	           		array("controller"=>"Skills", 
						  "action"=>"slist",
						  $uid
					)
	      	   );
	      
	    	?>
	    </td>
	  </tr>
	<?php echo $this->Form->end();?>
	</table>
</div>