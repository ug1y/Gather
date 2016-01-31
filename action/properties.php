<?php
/*
* 管理员对输入项的CRUD
*/
//require 'model.php';

/** 查看当前活动的输入项 actID是请求标识 */
function getPros()
{
	$m = new Model();
	$query = Flight::request()->query;
	$actID = Model::filter_data($query['actID']);
	if (!isset($actID) || $actID==''){
		Flight::redirect('/admin/getacts');
	}else {
		$pros = $m->getPros($actID);
		$field = $m->pro();
		Flight::render('Pros-get.php',['pros' => $pros,'field' => $field,'actID' => $actID]);
	}
}

/** 编辑一个输入项 */
function editPro()
{
	$m = new Model();
	$query = Flight::request()->query;
	$proID = Model::filter_data($query['proID']);
	if (!isset($proID) || $proID=='') {
		Flight::redirect('/admin/getacts');
	}else {
		$pro = $m->getPro($proID);
		if (empty($pro)) {
			echo "nope!";
		}else {
			Flight::render('Pros-edit.php',['pro' => $pro]);
		}
	}
}

/** 删除一个输入项 */
function deletePro()
{
	$m = new Model();
	$query = Flight::request()->query;
	$proID = Model::filter_data($query['proID']);
	if (!isset($proID) || $proID=='') {
		Flight::redirect('/admin/getacts');
	}else {
		$pro = $m->getPro($proID);
		if (empty($pro)) {
			Flight::redirect('/admin/getacts');
		}else {
			$m->deletePro($proID);
			Flight::redirect('/admin/getpros?actID='.$pro['actID']);
		}
	}
}

/** 添加一个输入项 */
function addPro()
{
	$query = Flight::request()->query;
	$actID = Model::filter_data($query['actID']);
	if (!isset($actID) || $actID=='') {
		Flight::redirect('/admin/getacts');
	}else {
		Flight::render('Pros-add.php',['actID' => $actID]);
	}
	
}

/** 更新一个输入项 */
function updatePro()
{
	$m = new Model();
	$post = Flight::request()->data;
	$field = $m->pro();
	foreach ($field as $key => $value) {
		if (!isset($post[$value])) {
			$data[$value] = '';
		}else {
			$data[$value] = Model::filter_data($post[$value]);
		}
	}
	$m->updatePro($post['proID'],$data);
	// echo "<script>
	// alert('success');
	// window.location.href='".dirname($_SERVER['PHP_SELF'])."/admin/getpros?actID=".$post['actID']."';
	// </script>";
	Flight::redirect('/admin/getpros?actID='.$post['actID']);
}

/** 添加一个输入项 */
function createPro()
{
	$m = new Model();
	$post = Flight::request()->data;
	$field = $m->pro();
	foreach ($field as $key => $value) {
		if (!isset($post[$value])) {
			$data[$value] = '';
		}else {
			$data[$value] = Model::filter_data($post[$value]);
		}
	}
	if ($data['actID']=='') {
			echo "<script>
			alert('activity not be selected !');
			window.location.href='".dirname($_SERVER['PHP_SELF'])."/admin/getacts';
			</script>";
		}elseif ($data['name']=='' || $data['label']=='' || $data['type']=='' || $data['isneed']=='') {
			echo "<script>
			alert('input cannot be empty !');
			window.location.href='".dirname($_SERVER['PHP_SELF'])."/admin/getpros?actID=".$data['actID']."';
			</script>";
		}else {
			$m->createPro($data);
			Flight::redirect('/admin/getpros?actID='.$data['actID']);
	}
}

?>