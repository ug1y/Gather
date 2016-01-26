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
		$act = $m->getAct($actID);
		Flight::render('Users-form.php',['pros' => $pros,'act' => $act]);
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
	$data = [];
	foreach ($pros as $key => $value) {
		if (is_null($post[$value['label']])) {
			$data[$value['label']] = '';
		}else {
			$data[$value['label']] = $post[$value['label']];
		}
	}
	$m->createEnt($actID,$data);
	echo "<script>
	alert('success');
	window.location.href='".dirname($_SERVER['PHP_SELF'])."/users/getlist';
	</script>";
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
		Flight::render('Ents.php',['actID' => $actID,'pros' => $pros,'ents' => $ents]);
	}
}

?>