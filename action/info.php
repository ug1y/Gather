<?php
require 'model.php';
/** 获取信息 */
function getAct()
{
	$flag = Model::islogin();
	$m = new Model();
	$data = $m->getAct($flag);
	echo Flight::json($data);
}

function getForm()
{
	$query = Flight::request()->query;
	$id = $query['id'];
	if (isset($id)) {
		$flag = Model::islogin();
		$m = new Model();
		$data = $m->getPro($id,$flag);
	}else {
		$data = null;
	}
	echo Flight::json($data);
}

?>