<?php
namespace app\ctrl;
use \core\lib\model;
class indexCtrl extends \core\imooc{
	public function index(){
		// $model = new \app\model\usersModel();
		// $ret = $model->lists();
		// dump($ret);
		$data = 'body内容';
		$this->assign('data',$data);
		$this->assign('title','首页');
		$this->display('index.php');
	}
	public function test(){
		// $model = new \app\model\usersModel();
		// $ret = $model->lists();
		// dump($ret);
		$data = 'test body内容';
		$this->assign('data',$data);
		$this->assign('title','测试');
		$this->display('test.php');
	}
}