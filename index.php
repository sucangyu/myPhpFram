<?php
/**
*	入口文件
*	1.定义常量
*	2.加载函数库
*	3.启动函数库
*/
define('myPhpFram',realpath('./'));//定义框架根目录
define('CORE',myPhpFram.'/core');//定义框架核心文件目录
define('APP',myPhpFram.'/app');//定义框架项目文件目录
define('MODULE','app');//
//是否开启调试模式false是关闭
define('DEBUG',true);
//引入报错第三方类库
include "vendor/autoload.php";
if (DEBUG) {
	$whoops = new \Whoops\Run;
	//自定义框架出错的title
	$errorTitle = '框架出错了';
	$option = new \Whoops\Handler\PrettyPageHandler();
	$option->setPageTitle($errorTitle);
	$whoops->pushHandler($option);
	$whoops->register();
	ini_set('dispaly_error', 'On');
}else{
	ini_set('dispaly_error', 'Off');
}

//加载函数库
include CORE.'/common/function.php';

//加载框架核心文件启动框架
include CORE.'/imooc.php';
//spl_autoload_register是实现自动加载未定义类功能的的重要方法
spl_autoload_register('\core\imooc::load');

//命名空间静态方法
\core\imooc::run();
