<?php
return array(
	//'配置项'=>'配置值'
    'APP_AUTOLOAD_PATH' =>'@.Common,@.Tool',

    //mysql连接方式
    'DB_TYPE'   => 'mysql', // 数据库类型
    'DB_HOST'   => 'localhost', // 服务器地址
    'DB_NAME'   => 'liunian_managedb', // 数据库名
    'DB_USER'   => 'root', // 用户名
    'DB_PWD'    => '123456', // 密码
    'DB_PREFIX' => 'think_', // 数据库表前缀
    'DB_CHARSET'=> 'utf8', // 字符集
    'SHOW_PAGE_TRACE'=>true,
);