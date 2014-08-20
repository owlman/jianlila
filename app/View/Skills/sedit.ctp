<!-- File: /app/View/Skills/sedit.ctp -->
<div class="container">
 	<?php echo $this->Form->create("Skill",
	        array("inputDefaults" => array(
	          "label" => false,
	          "div" => false
	        )
	     ));
	?>
	<table class="table table-bordered table-striped message">
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
	      	<button type="submit" class="btn btn-success">保存</button>
	    </td>
	    <td>
	    	<button type="reset" class="btn btn-primary">重置</button>
	    	<?php
	    	   echo " | ";
	    	   echo $this->Html->link(
	           		"放弃编辑",
	           		array("controller"=>"Skills", 
						  "action"=>"slist",
						  $uid
					)
	      	   );
	      
	    	?>
	    </td>
	  </tr>
	  <?php echo $this->Form->end(); ?>	  
	</table>
</div>