<?php
require 'medoo.php';
// require '../config.php';
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

	/** 获取活动表结构 */
	public function act()
	{
		$tmp = $this->db->query('DESC activity;')->fetchAll();
		foreach ($tmp as $key => $value) {
			$data[$key] = $value['Field'];
		}
		array_splice($data,0,1);
		return $data;
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
		if (empty($data)) {
			return $data;
		}else {
			return $data[0];
		}
	}
	/** 创建一个活动 */
	public function createAct($data)
	{
		$last_id = $this->db->insert('activity',$data);
		return $last_id;
	}
	/** 更新活动内容 */
	public function updateAct($actID,$data)
	{
		$modi_id = $this->db->update('activity',$data,['actID' => $actID]);
		return $modi_id;
	}
	/** 删除某个活动 */
	public function deleteAct($actID)
	{
		$del_id = $this->db->delete('activity',['actID' => $actID]);
		return $del_id;
	}


	/** 获取属性表结构 */
	public function pro()
	{
		$tmp = $this->db->query('DESC property;')->fetchAll();
		foreach ($tmp as $key => $value) {
			$data[$key] = $value['Field'];
		}
		array_splice($data,0,1);
		return $data;
	}
	/** 获取某个活动的表单属性 */
	public function getPros($actID)
	{
		$data = $this->db->select('property','*',['actID' => $actID]);
		return $data;
	}
	/** 获取某个属性的信息 */
	public function getPro($proID)
	{
		$data = $this->db->select('property','*',['proID' => $proID]);
		if (empty($data)) {
			return $data;
		}else {
			return $data[0];
		}
	}
	/** 添加一个表单属性 */
	public function createPro($actID,$data)
	{
		$data['actID'] = $actID;
		$last_id = $this->db->insert('property',$data);
		return $last_id;
	}
	/** 更新一个属性信息 */
	public function updatePro($proID,$data)
	{
		$modi_id = $this->db->update('property',$data,['proID' => $proID]);
		return $modi_id;
	}
	/** 删除一个属性 */
	public function deletePro($proID)
	{
		$del_id = $this->db->delete('property',['proID' => $proID]);
		return $del_id;
	}


	/** 获取某个表单的实体内容 */
	public function getEnts($actID)
	{
		$proID = $this->db->select('property','proID',['actID' => $actID,'ORDER' => 'order']);
		foreach ($proID as $key => $value) {
			$data[$key] = $this->db->select('entity','*',['proID' => $value,'ORDER' => 'index']);
		}
		return $data;
	}
	/** 获取表单的一行实体内容 */
	public function getEnt($actID,$index)
	{
		$proID = $this->db->select('property','proID',['actID' => $actID,'ORDER' => 'order']);
		foreach ($proID as $key => $value) {
			$tmp = $this->db->select('entity','*',['AND' => ['proID' => $value,'index' => $index]]);
			if (empty($tmp)) {
				$data[$key] = $tmp;
			}else {
				$data[$key] = $tmp[0];
			}
		}
		return $data;
	}
	/** 插入一行记录 */
	public function createEnt($actID,$data)
	{
		$proID = $this->db->select('property',['proID','label'],['actID' => $actID,'ORDER' => 'order']);
		$tmp = $this->db->select('entity','*',['proID' => $proID[0]['proID'],'ORDER' => 'index DESC']);
		if (empty($tmp)) {
			$index = 1;
		}else {
			var_dump($tmp);
			$index = $tmp[0]['index']+1;
		}
		foreach ($proID as $key => $value) {
			$ent['proID'] = $value['proID'];
			$ent['content'] = $data[$value['label']];
			$ent['index'] = $index;
			$last_id = $this->db->insert('entity',$ent);
		}
		return $last_id;
	}
	/** 更新一行记录 */
	public function updateEnt($actID,$index,$data)
	{
		$count = 0;
		$proID = $this->db->select('property',['proID','label'],['actID' => $actID,'ORDER' => 'order']);
		foreach ($proID as $key => $value) {
			$ent['content'] = $data[$value['label']];
			$modi_id = $this->db>update('entity',$ent,['AND' => ['proID' => $value['proID'],'index' => $index]]);
			$count = $count + $modi_id;
		}
		return $count;
	}
	/** 删除一行记录 */
	public function deleteEnt($actID,$index)
	{
		$count = 0;
		$proID = $this->db->select('property',['proID','label'],['actID' => $actID,'ORDER' => 'order']);
		foreach ($proID as $key => $value) {
			$del_id = $this->db->delete('entity',['AND' => ['proID' => $value['proID'],'index' => $index]]);
			$count = $count + $del_id;
		}
		return $count;
	}

}

// $m = new Model();
// $act = [
// 'title'=>'abc',
// 'description'=>'abc',
// 'createtime'=>date('Y-m-d'),
// 'deadline'=>date('Y-m-d',mktime(0,0,0,1,28,2016)),
// 'status'=>0,
// ];
// $pro = [
// 'name'=>'world',
// 'label' => 'text',
// 'type'=>'text',
// 'description'=>'hahaha',
// 'isneed'=>1,
// 'constraint'=>'',
// 'order'=>1,
// ];
// $ent = [
// 'text1' => 'assdd',
// 'text2' => 'ccfffc',
// ];
// $test = $m->act();

// var_dump($test);

?>