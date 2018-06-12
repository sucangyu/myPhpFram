<?php
namespace app\ctrl;
class indexCtrl extends \core\imooc{
	public function index(){
		$temp = new \core\lib\model();
		// p($temp);
		$data = 'hello world';
		$this->assign('data',$data);
		$this->display('index.php');
	}
}