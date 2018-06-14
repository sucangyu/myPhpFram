<?php
namespace core;

class imooc {
	public static $classMap = array();
	public $assign;
	static public function run(){
		//p('ok');
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
		// new \core\route();
		//$class = '\core\route';
		//IMOOC.'/core/route.php';
		if (isset($classMap[$class])) {
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
			require_once myPhpFram.'/vendor/autoload.php';
			
			// \Twig_Autoloader::register();
			$loader = new \Twig_Loader_Filesystem(APP.'/views');
			$twig = new \Twig_Environment($loader, array(
			    'cache' => myPhpFram.'/log/Twig',
			    'debug' =>'DEBUG'
			));
			// $template = $twig->load('index.html');
			// $template->display($this->assign?$this->assign:'');
			echo $twig->render(basename($file).$this->assign);
			// extract($this->assign);
			// include $file;
		}
	}
}
