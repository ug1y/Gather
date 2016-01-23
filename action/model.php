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

	/** 判断用户是否已经登录，已登录返回true，否则返回false */
	public static function islogin()
	{
		$flag = false;
		if (isset($_SESSION['user']) && $_SESSION['user']==constant('GA_USER')) {
			$flag = true;
		}
		return $flag;
	}

	/** 获取活动信息 */
	public function getActs($status=null)
	{
		if (is_null($status)) {
			$data = $this->db->select('activity','*');
		}else {
			$data = $this->db->select('activity','*',['status' => $status]);
		}
		return $data;
	}
	/** 根据id获取某个特定活动的信息 */
	public function getAct($actID)
	{
		$data = $this->db->select('activity','*',['actID' => $actID]);
		return $data;
	}
	/** 创建一个活动 */
	public function createAct($data)
	{
		$last_id = $this->db->insert('activity',$data);
		return $last_id;
	}

	/** 获取某个活动的表单属性 */
	public function getPros($actID)
	{
		$data = $this->db->select('property','*',['actID' => $actID]);
		return $data;
	}
	/** 添加一个表单属性 */
	public function createPro($actID,$data)
	{
		$data['actID'] = $actID;
		$last_id = $this->db->insert('property',$data);
		return $last_id;
	}

	/** 获取某个属性的实体内容 */
	public function getEnt($actID)
	{
		$proID = $this->db->select('property','proID',['actID' => $actID]);
		foreach ($proID as $key => $value) {
			$data[$key] = $this->db->select('entity','*',['proID' => $value]);
		}
		return $data;
	}
	/** 插入一行记录 */
	public function createEnt($actID,$data)
	{
		$proID = $this->db->select('property',['proID','label'],['actID' => $actID]);
		foreach ($proID as $key => $value) {
			$ent['proID'] = $value['proID'];
			$ent['content'] = $data[$value['label']];
			$ent['index'] = $data['index'];
			$last_id = $this->db->insert('entity',$ent);
		}
	}
}

$m = new Model();
$act = [
'title'=>'hello',
'description'=>'world',
'createtime'=>date('Y-m-d'),
'deadline'=>date('Y-m-d',mktime(0,0,0,1,28,2016)),
'status'=>0,
];
$pro = [
'name'=>'hello',
'type'=>'text',
'description'=>'input',
'isneed'=>1,
'order'=>0,
];
$ent = [
'text' => 'asd',
'index' => 1,
];
$test = $m->createEnt(3,$ent);

var_dump($test);

?>