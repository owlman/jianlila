<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>简历啦【Demo】</title>
	<?php		
		//echo $this->Html->css('cake.generic');
		echo $this->Html->css('bootstrap');
		echo $this->Html->css('boot strap-responsive');		
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
	<!--导航部分开始 -->
    <div class="navbar navbar-default navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="brand" href="/pages/index">简历啦</a>
          <div class="nav-collapse">
            <ul class="nav navbar-nav">
              <li><a href="#about">本站简介</a></li>
              <li><a href="#contact">关于我们</a></li>
            </ul>
            <ul class="nav navbar-nav pull-right">
              <li><a href="/users/login">登录</a></li>
              <li><a href="/users/add">注册</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    <!--导航部分结束 -->    
	
	<div class="container">		
		<?php echo $this->Session->flash(); ?>
	
		<?php echo $this->fetch('content'); ?>
	</div>
	<!--页脚部分开始 -->     
   	<footer class="footer">
		<p>© 2002-2014 owlman.org, all rights reserved </p>
	</footer>
	
	<?php //echo $this->element('sql_dump'); ?>				
</body>
</html>
