<?php

/**
单一入口文件
1.定义常量
2.加载函数库
3.启动框架
 */
// 当前框架所在根目录
define('YangPHP',realpath('./'));
// 当前框架核心目录
define('CORE',YangPHP.'/core');
// 项目文件目录
define('APP',YangPHP.'/app');
define('MODULE','app');
// 开启调试模式
define('DEBUG',true);

if(DEBUG){
	ini_set('display_error', 'on');
}else{
	ini_set('display_error', 'off');
}
//加载函数库 
include CORE.'/common/function.php';
//加载核心文件
include CORE.'/yang.php';

spl_autoload_register('\core\yang::load');

\core\yang::run();



