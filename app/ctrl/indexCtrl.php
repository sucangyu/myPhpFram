<?php
namespace app\ctrl;
use \core\lib\model;
class indexCtrl extends \core\imooc{
	public function index(){
		// $model = new \app\model\usersModel();
		// $ret = $model->lists();
		// dump($ret);
		$data = 'hello world';
		$this->assign('data',$data);
		$this->display('index.php');
	}
}