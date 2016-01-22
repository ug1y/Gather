<?php
require 'medoo.php';
require 'config.php';
/**
* 数据库操作类
*/
class Model
{
	private $db;

	function __construct()
	{
		$this->db = new medoo([
			'database_type' => constant('DB_TYPE'),
			'database_name' => constant('DB_NAME'),
			'server' => constant('DB_HOST'),
			'username' => constant('DB_USER'),
			'password' => constant('DB_PASS'),
			'charset' => constant('DB_CHARSET'),
			]);
	}

	public function showTble($table)
	{
		$data = $this->db->select($table,'*');
		foreach ($data as $s) {
			var_dump($s);
		}
	}
}

$m = new Model();

$m->showTble('activity');

// $ans = $db->insert('activity',[
// 	'title' => 'test2',
// 	'description' => 'testforgather2',
// 	'createtime' => date('Y-m-d'),
// 	'deadline' => date('Y-m-d',mktime(0,0,0,1,28,2016)),
// 	'status' => 0,
// 	]);


//var_dump($ans);

// $data = $db->select('activity','*');

// foreach ($data as $s) {
// 	var_dump($s);
// }



?>