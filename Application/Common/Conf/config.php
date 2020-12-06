<?php
return array(
	//'配置项'=>'配置值'
	'DB_TYPE' => 'mysql', // 数据库类型
	'DB_HOST' => '127.0.0.1', // 服务器地址
	'DB_NAME' => 'my_mall', // 数据库名
	'DB_USER' => 'root', // 用户名
	'DB_PWD' => 'root', // 密码
	'DB_PORT' => '3306', // 端口
	'DB_CHARSET' => 'utf8', // 数据库编码默认采用utf8
	'DB_PREFIX'  => 'fw_',// 数据表前缀
	'SHOW_PAGE_TRACE' => true,//开启Trace调试
	'DEFAULT_MODULE' => 'Home',  // 默认模块
   	'DEFAULT_CONTROLLER' => 'index', // 默认控制器名称
   	'DEFAULT_ACTION' => 'index', // 默认操作名称
	'URL_MODEL' => 2,
	'URL_ROUTER_ON'   =>  true,//默认fllse,   // 是否开启URL路由
	//'TMPL_EXCEPTION_FILE'   =>  'Public:Exception',// 异常页面的模板文件
);