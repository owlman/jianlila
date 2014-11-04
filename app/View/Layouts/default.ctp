<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>简历啦【Demo】</title>
	<?php		
		//echo $this->Html->css('cake.generic');
		echo $this->Html->css("bootstrap.min");
		echo $this->Html->css("bootstrap-responsive.min");		
		echo $this->Html->css("font-awesome.min");
		echo "<!--[if IE 7]>";
		echo $this->Html->css("font-awesome-ie7.min");		
		echo "<![endif]-->";
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
	<header class="contalner">
		<div class="navbar navbar-default navbar-fixed-top">
	      <div class="navbar-inner">
	        <div class="container">
	          <a class="brand" href="/pages/index">
	          	简历啦
	          </a>
	          <div class="nav-collapse">
	            <ul class="nav navbar-nav">
	              <li><a href="#about">本站简介</a></li>
	              <li><a href="#contact">关于我们</a></li>
	            </ul>
	            <?php if($this->Session->check("uid")):?>
	            <ul class="nav navbar-nav pull-right">
	              <li><a href="/users/message/<?=$this->Session->read("uid") ?>">
	              		<i class="icon-user"></i>
	              		<?=$this->Session->read("username") ?>
	              </a></li>
	              <li><a href="/users/logout">
	              	<i class="icon-signout"></i>
	              	登出
	              	</a></li>
	            </ul>
	            <?php else:?>
	            <ul class="nav navbar-nav pull-right">
	              <li><a href="/users/login">
	              	<i class="icon-signin"></i>	              	
	              	登录
	              </a></li>
	              <li><a href="/users/add">
	              	<i class="icon-user"></i>
	              	注册
	              </a></li>
	            </ul>
	            <?php endif;?>
	          </div><!--/.nav-collapse -->
	        </div>
	      </div>
	    </div>
	    <div class="clear"></div>
	</header>		
	<!--主体部分开始 -->	
	<div id="wrap">	
		<div class="container">
			<div class="row">
				<?php echo $this->Session->flash(); ?>		
				<?php echo $this->fetch("content"); ?>
			</div>
		</div>
		<div class="clear"></div>
	</div>
	<!--主体部分结束 -->			
	
	<footer class="container">
   		<p class="muted">© 2014-<?=date("Y") ?> jianli.net, all rights reserved </p>
	</footer>
	<?php //echo $this->element('sql_dump'); ?>					
</body>
</html>
