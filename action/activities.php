<?php
/*
* 管理员对活动的CRUD
*/
//require 'model.php';

/** 查看当前活动 actID是请求标识 */
function getActs()
{
	$m = new Model();
	$acts = $m->getActs();
	$field = $m->act();
	Flight::render('Acts-get.php',['acts' => $acts,'field' => $field]);
}

/** 编辑一个活动 */
function editAct()
{
	$m = new Model();
	$query = Flight::request()->query;
	$actID = Model::filter_data($query['actID']);
	if (!isset($actID) || $actID=='') {
		Flight::redirect('/admin/getacts');
	}else {
		$act = $m->getAct($actID);
		if (empty($act)) {
			echo "<script>
			alert('please check the activity !');
			window.location.href='".dirname($_SERVER['PHP_SELF'])."/admin/getacts';
			</script>";
		}else {
			Flight::render('Acts-edit.php',['act' => $act]);
		}
	}
}

/** 删除一个活动 */
function deleteAct()
{
	$m = new Model();
	$query = Flight::request()->query;
	$actID = Model::filter_data($query['actID']);
	if (!isset($actID) || $actID=='') {
		Flight::redirect('/admin/getacts');
	}else {
		$m->deleteAct($actID);
		Flight::redirect('/admin/getacts');
	}
}

/** 添加一个活动 */
function addAct()
{
	Flight::render('Acts-add.php');
}

/** 更新一个活动 */
function updateAct()
{
	$m = new Model();
	$post = Flight::request()->data;
	$field = $m->act();
	foreach ($field as $key => $value) {
		if (!isset($post[$value])) {
			$data[$value] = '';
		}else {
			$data[$value] = Model::filter_data($post[$value]);
		}
	}
	unset($data['createtime']);
	if ($data['title']=='' || $data['status']=='' || $data['deadline']=='') {
		echo "<script>
		alert('input cannot be empty !');
		window.location.href='".dirname($_SERVER['PHP_SELF'])."/admin/getacts';
		</script>";
	}else {
		$m->updateAct($post['actID'],$data);
		Flight::redirect('/admin/getacts');
	}
}

/** 创建一个活动 */
function createAct()
{
	$m = new Model();
	$post = Flight::request()->data;
	$field = $m->act();
	foreach ($field as $key => $value) {
		if (!isset($post[$value])) {
			$data[$value] = '';
		}else {
			$data[$value] = Model::filter_data($post[$value]);
		}
	}
	$data['createtime'] = date('Y-m-d');
	if ($data['title']=='' || $data['status']=='' || $data['deadline']=='') {
		echo "<script>
		alert('input cannot be empty !');
		window.location.href='".dirname($_SERVER['PHP_SELF'])."/admin/getacts';
		</script>";
	}else {
		$m->createAct($data);
		Flight::redirect('/admin/getacts');
	}
	
}

?>