<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>简历啦【Demo】</title>
	<?php		
		echo $this->Html->css('cake.generic');
		echo $this->Html->css('bootstrap.min');
		echo $this->Html->css('font-awesome.min');
		
		echo $this->Html->script("jquery");
		echo $this->Html->script("bootstrap.min");
		echo $this->Html->script("Script");

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1>简历啦<small> 最漂亮的简历，最直接的投递！</small></h1>
		</div>
		<div id="content">
			<?php echo $this->Session->flash(); ?>
			
			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			<?php echo $this->element('sql_dump'); ?>		
		</div>
	</div>	
</body>
</html>
