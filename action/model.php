<?php
require 'medoo.php';
require '../config.php';
/**
* 数据库操作类
*/
class Model
{
	private $db;

	/** 构造函数，初始化数据库连接 */
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

	public static function islogin()
	{
		$flag = false;
		if (isset($_SESSION['user']) && $_SESSION['user']==constant('GA_USER')) {
			$flag = true;
		}
		return $flag;
	}

	public function getAct($flag)
	{
		//判断是导出全部，还是只导出已发布
		if ($flag) {
			$data = $this->db->select('activity','*');
		}else {
			$data = $this->db->select('activity','*',[
				'status' => 1,
				]);
		}
		return $data;
	}

	public function getPro($actID,$flag)
	{
		$status = $this->db->select('activity','status',['actID' => $actID]);
		if ($flag || $status[0]==1) {
			$data = $this->db->select('property','*',[
				'actID' => $actID,
				]);
		}else {
			$data = null;
		}
		return $data;
	}
}

$m = new Model();

$test = $m->getAct(true);

var_dump($test);

?>