<?php
namespace core\lib;
use core\lib\conf;
class route {
	public $ctrl;
	public $action;
	public function __construct(){
		//1.隐藏index.php入口文件
		//2.获取URL参数部分
		//3.返回控制器和方法
		
		if (isset($_SERVER['REDIRECT_URL']) && $_SERVER['REDIRECT_URL'] != '/myPhpFram/') {
			// /index/index
			$path = $_SERVER['REDIRECT_URL'];
			$pathArr = explode('/',trim($path,'/'));
			// p($pathArr);
			if (isset($pathArr[1])) {
				$this->ctrl = $pathArr[1];
			}
			if (isset($pathArr[2])) {
				$this->action = $pathArr[2];
			}else{
				$this->action = conf::get('ACTION','route');
			}
			unset($pathArr[0],$pathArr[1],$pathArr[2]);
			//url多余部分转换成GET
			$count = count($pathArr)+3;
			$i = 3;
			while($i<$count){
				if (isset($pathArr[$i+1])) {
					$_GET[$pathArr[$i]] = $pathArr[$i+1];
				}
				
				$i = $i+2;
			}
			// p($_GET);
		}else{
			$this->ctrl = conf::get('CTRL','route');
			$this->action = conf::get('ACTION','route');
		}
	}
}