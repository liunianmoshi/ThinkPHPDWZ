<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2015/8/10
 * Time: 22:25
 */

// 应用入口文件

// 检测PHP环境
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');

// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('APP_DEBUG',True);

// 定义应用目录
define('APP_PATH','./Admin/');

define('BUILD_DIR_SECURE', false);

$_GET['m'] = 'Admin';
$_GET['c'] = 'Home';


// 引入ThinkPHP入口文件
require './ThinkPHP/ThinkPHP.php';