<?php
namespace core\lib;
use core\lib\conf;
use Medoo\Medoo;
class model extends Medoo {
	public function  __construct(){

		$database = conf::all('database');
		parent::__construct($database);
		// p($database);
		// try{
		// 	parent::__construct($database['DSN'],$database['USERNAME'],$database['PASSWD']);
		// } catch(\PDOException $e){
		// 	p($e->getMessage());
		// }
	}
}