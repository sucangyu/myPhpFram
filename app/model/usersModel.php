<?php
namespace app\model;
use core\lib\model;
class usersModel extends model{
	public $table = 'users';
	public function lists(){
		$ret = $this->select($this->table,'*');
		return $ret;
	}

	public function gitOne($id){
		$ret = $this->get($this->table,"*",array(
			'id'=>$id
		));
		return $ret;
	}
	public function setOne($id,$data){
		$ret = $this->update($this->table,$data,array(
			'id'=>$id
		));
		return $ret;
	}
}