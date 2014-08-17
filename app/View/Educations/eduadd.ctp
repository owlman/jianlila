 <!-- File: /app/View/Educations/eduadd.ctp -->
<?php echo $this->Form->create("Education",
        array("inputDefaults" => array(
          "label" => false,
          "div" => false
        )
     ));
?>
<table>
  <tr>
    <td>请选择您的学历 （必填）</td>
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
    <td>请输入您就读的学校 （必填）</td>
    <td>
      <?php echo $this->Form->input("school");?> 
    </td>
  <tr>
    <td>请输入您的专业 （必填）</td>
    <td>
      <?php echo $this->Form->input("study"); ?>
    </td>
  </tr>
  </tr>
  <tr>
    <td>您的就读时间 （必填）</td>
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
    <td>补充说明  （可不填）</td>
    <td>
      <?php echo $this->Form->input("description", array("type" => "textarea"));?> </td>
    </tr>
  <tr>
  <tr>
    <td>
      <?php 
      	echo $this->Form->input("user_id",array("type" => "hidden"));
      	$options = array(
      			"type" => "reset",
      			"div" => array("class" => "reset")
      	);
      	echo $this->Form->input("重填",$options);
      ?>
  	</td>
  	<td>
      <?php 
	    echo $this->Form->end("添加");
      ?>
  	</td>
  </tr>
</table>
