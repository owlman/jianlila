环境说明
------ 
本说明文件以debian类Linux系统为准（包括debian7和ubuntu12），其他Linux发行版可能会在个别细节上存在差异，请自行应变。
部署方法
------ 
+ 先将本站源码下载到某一指定目录中（本例放在当前用户的home目录中）：
	命令：git clone git@vps.owlman.org:jianlila.git  （密码是八个0）
	然后。在程序根目录的app目录下创建一个tmp目录，并赋予其www-data权限:
	命令：cd jianlila
	    mkdir app/tmp
	    chown -R www-data app/tmp
+ 确保LAMP环境已经正确安装，apache的rewrite模块也已经被激活。将网站根目录下的vhost_etc/vps_host拷贝到/etc/apache2/sites-enabled/目录下（请自行调整一下vps_host文件中的目录设置），然后重启apache：
	命令：cp vhost_etc/vps_host /etc/apache2/sites-enabled/ 
		service apache2 restart
		
+ 在mysql中创建一个数据库，并导入vhost_etc/jianlila.sql备份文件，然后修改app/Config/database.php文件中的数据库帐号和密码.
+ （可选 ），如果以上步骤一切顺利，该网站应该已经可以运行，如果觉得速度不理想，建议安装eAccelerator加速器，我的使用经验是可以提升两倍左右的速度 ，以下是该加速器的项目地址：
https://github.com/eaccelerator/eaccelerator
		