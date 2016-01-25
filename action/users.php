<?php
/*
* 关于填写表单
*/

function getForm()
{
	$m = new Model();
	$query = Flight::request()->query;
	$actID = $query['actID'];
	if (is_null($actID)) {
		Flight::redirect('/users/getlist');
	}else {
		$pros = $m->getPros($actID);
		Flight::render('Users-form.php',['pros' => $pros,'actID' => $actID]);
	}
}

function getList()
{
	$m = new Model();
	$acts = $m->getActs(1);
	$field = $m->act();
	Flight::render('Users-list.php',['acts' => $acts,'field' => $field]);
}

function addForm()
{
	$m = new Model();
	$post = Flight::request()->data;
	$actID = $post['actID'];
	$pros = $m->getPros($actID);
	foreach ($pros as $key => $value) {
		if (is_null($post[$value['label']])) {
			$data[$value['label']] = '';
		}else {
			$data[$value['label']] = $post[$value['label']];
		}
	}
	$m->createEnt($actID,$data);
	if (Model::islogin()) {
		echo "<script>
		alert('success');
		window.location.href='".dirname($_SERVER['PHP_SELF'])."/admin/getacts';
		</script>";
	}else {
		echo "<script>
		alert('success');
		window.location.href='".dirname($_SERVER['PHP_SELF'])."/users/getlist';
		</script>";
	}
}

function delRec()
{
	$m = new Model();
	$query = Flight::request()->query;
	$actID = $query['actID'];
	$index = $query['index'];
	if (is_null($index)||is_null($actID)) {
		echo "nonono";
	}else {
		$m->deleteEnt($actID,$index);
		Flight::redirect('/admin/showrec?actID='.$actID);
	}
}

function showRec()
{
	$m = new Model();
	$query = Flight::request()->query;
	$actID = $query['actID'];
	if (is_null($actID)) {
		Flight::redirect('/admin/getacts');
	}else {
		$pros = $m->getPros($actID);
		$ents = $m->getEnts($actID);
		// var_dump($pros);
		// var_dump($ents);
		Flight::render('Ents.php',['actID' => $actID,'pros' => $pros,'ents' => $ents]);
	}
}

?>