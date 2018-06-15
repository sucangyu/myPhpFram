<?php
namespace core;

class imooc {
	//$classMap临时变量储存已经加载好的类
	public static $classMap = array();

	public $assign;

	static public function run(){
		
		//记入日志
		\core\lib\log::init();
		
		$route = new \core\lib\route();
		$ctrlClass = $route->ctrl;
		$action = $route->action;
		$ctrlfile = APP.'/ctrl/'.$ctrlClass.'Ctrl.php';
		$cltrlClass = '\\'.MODULE.'\ctrl\\'.$ctrlClass.'Ctrl';
		if (is_file($ctrlfile)) {
			include $ctrlfile;
			$ctrl = new $cltrlClass;
			$ctrl->$action();

			\core\lib\log::log('ctrl:'.$ctrlClass.'        '.'action:'.$action);
		}else{
			throw new \Exception('找不到控制器'.$ctrlClass);
		}
	}

	static public function load($class){
		//自动加载类库
		// new \core\route(); 引入路由类
		// $class = '\core\route'; 把$class的样式转换为下面的样式
		// IMOOC.'/core/route.php';


		if (isset($classMap[$class])) {
			//如果已经引入过就不在引入
			return true;
		}else{
			str_replace('\\', '/', $class);
			$file = myPhpFram.'/'.$class.'.php';
			if (is_file($file)) {
				include $file;
				self::$classMap[$class] = $class;
			}else{
				return false;
			}
		}		
	}

	public function assign($name,$value){
		$this->assign[$name] = $value;
	}
	public function display($file){
		$file = APP.'/views/'.$file;
		if (is_file($file)) {
			$loader = new \Twig_Loader_Filesystem(APP.'/views');
			$twig = new \Twig_Environment($loader, array(
			    'cache' => myPhpFram.'/log/Twig',
			    'debug' =>'DEBUG'
			));
			$template = $twig->load(basename($file));
			$template->display($this->assign?$this->assign:array());
			// extract($this->assign);
			// include $file;
		}
	}
}
