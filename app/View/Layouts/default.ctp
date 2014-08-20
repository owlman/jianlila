<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>简历啦【Demo】</title>
	<?php		
		//echo $this->Html->css('cake.generic');
		echo $this->Html->css('bootstrap');
		echo $this->Html->css('style');
		
		echo $this->Html->script("jquery");
		echo $this->Html->script("bootstrap");
		echo $this->Html->script("Script");

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div class="container">
		<div class="page-header">
			<h1>简历啦<small> 最漂亮的简历，最直接的投递！</small></h1>
		</div>
		
		<?php echo $this->Session->flash(); ?>
	
		<?php echo $this->fetch('content'); ?>
	</div>
	<div class="footer">
		<p>© 2014－<?php echo date("Y"); ?> jianlila.net, all rights reserved </p>	
	</div>
	<?php //echo $this->element('sql_dump'); ?>				
</body>
</html>
