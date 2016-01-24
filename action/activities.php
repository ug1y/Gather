<?php
/*
* 管理员对活动的CRUD
*/
//require 'model.php';

/** 查看当前活动 actID是请求标识 */
function getActs()
{
	$m = new Model();
	$data = $m->getActs();
	$field = $m->act();
	Flight::render('Acts-get.php',['data' => $data,'field' => $field]);
}

/** 编辑一个活动 */
function editAct()
{
	$m = new Model();
	$query = Flight::request()->query;
	$actID = $query['actID'];
	if (is_null($actID)) {
		Flight::redirect('/admin/getacts');
	}else {
		$data = $m->getAct($actID);
		if (empty($data)) {
			echo "nope!";
		}else {
			Flight::render('Acts-edit.php',['data' => $data]);
		}
	}
}

/** 删除一个活动 */
function deleteAct()
{
	$m = new Model();
	$query = Flight::request()->query;
	$actID = $query['actID'];
	if (is_null($actID)) {
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
		if (is_null($post[$value])) {
			$data[$value] = '';
		}else {
			$data[$value] = $post[$value];
		}
	}
	unset($data['createtime']);
	$m->updateAct($post['actID'],$data);
	echo "<script>
	alert('success');
	window.location.href='".dirname($_SERVER['PHP_SELF'])."/admin/getacts';
	</script>";
	//Flight::redirect('/admin/editact?actID='.$post['actID']);
}

/** 创建一个活动 */
function createAct()
{
	$m = new Model();
	$post = Flight::request()->data;
	$field = $m->act();
	foreach ($field as $key => $value) {
		if (is_null($post[$value])) {
			$data[$value] = '';
		}else {
			$data[$value] = $post[$value];
		}
	}
	$data['createtime'] = date('Y-m-d');
	if ($data['title']=='' || $data['status']=='') {
		echo "nope!!!";
	}else {
		$m->createAct($data);
		echo "<script>
		alert('success');
		window.location.href='".dirname($_SERVER['PHP_SELF'])."/admin/getacts';
		</script>";
	}
	//Flight::redirect('/admin/getacts');
}



?>