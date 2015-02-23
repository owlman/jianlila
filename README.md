
项目说明
====== 
本项目是一个线上简历系统，用户可以根据自身填写的学历、技能、职业生涯、出版作品等信息来定制出各种针对不同申请对象的简历。

开发环境
------
+ 操作系统 —— Debian/Ubuntu Linux系统
+ Web服务器 —— Apache2
+ 数据库 —— MySql5
+ 开发语言 —— php5
+ 开发框架 —— CakePHP、Bootstrap

部署方法
------ 
+ 先将本站源码下载到某一指定目录中（例如当前用户的home目录）：`git clone git@github.com:owlman/jianlila.git`；中国大陆用户可以也可以：`git clone git@gitcafe.com:owlman/jianlila.git`  
+ 接着，在程序根目录的app目录下创建一个tmp目录，并赋予其www-data权限:  
	cd jianlila  
	mkdir app/tmp  
	chown -R www-data app/tmp
+ 然后，确保LAMP环境已经正确安装，apache的rewrite模块也已经被激活。将网站根目录下的vhost_etc/vps_host拷贝到/etc/apache2/sites-enabled/目录下（请自行调整一下vps_host文件中的目录设置），然后重启apache：  
	cp vhost_etc/vps_host /etc/apache2/sites-enabled/  
	service apache2 restart
+ 最后，在mysql中创建一个数据库，并导入vhost_etc/jianlila.sql备份文件，然后修改app/Config/database.php文件中的数据库帐号和密码.
+ （*可选*）如果以上步骤一切顺利，该网站应该已经可以运行，如果觉得速度不理想，建议安装eAccelerator加速器，我的使用经验是可以提升两倍左右的速度 ，以下是该加速器的项目地址：
https://github.com/eaccelerator/eaccelerator
