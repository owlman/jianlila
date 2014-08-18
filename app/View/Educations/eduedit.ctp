 <!-- File: /app/View/Educations/eduedit.ctp -->
<?php echo $this->Form->create("Education",
        array("inputDefaults" => array(
          "label" => false,
          "div" => false
        )
     ));
?>

<div>
	<table class="table table-bordered table-striped">
	  <tr>
	    <td>您的学历 ：</td>
	    <td><?php 
	      	echo $this->Form->input("degree", array(
				"empty" => "【请选择】",
				"options" => array(
					"博士"=>"博士",
					"硕士"=>"硕士",
					"本科"=>"本科",
					"高中"=>"高中",
					"初中"=>"初中"
				)
			));
	    ?></td>
	  </tr>
	  <tr>
	    <td>您就读的学校： </td>
	    <td>
	      <?php echo $this->Form->input("school");?> 
	    </td>
	  </tr>
	  <tr>
	    <td>您的专业 ：</td>
	    <td>
	      <?php echo $this->Form->input("study"); ?>
	    </td>
	  </tr>	  
	  <tr>
	    <td>您的就读时间 ：</td>
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
	    		"maxYear" => 2050,
			));
	     	?> </td>
	    </tr>
	  <tr>
	    <td>补充说明  （可不填）:</td>
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
	           		array("controller"=>"Educations", 
						  "action"=>"edulist",
						  $uid
					)
	      	   );
	      
	    	?>
	    </td>
	  </tr>
	  <?php echo $this->Form->end(); ?>	  
	</table>
</div>