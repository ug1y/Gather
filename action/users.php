<?php
/*
* 关于填写表单
*/

function getForm()
{
	$m = new Model();
	$query = Flight::request()->query;
	$actID = Model::filter_data($query['actID']);
	if (!isset($actID) || $actID=='') {
		Flight::redirect('/users/getlist');
	}else {
		$pros = $m->getPros($actID);
		$act = $m->getAct($actID);
		if (empty($act)) {
			echo "<script>
			alert('please check the activity !');
			window.location.href='".dirname($_SERVER['PHP_SELF'])."/users/getlist';
			</script>";
		}
		elseif ($act['status']==0) {
			echo "<script>
			alert('forbidden !');
			window.location.href='".dirname($_SERVER['PHP_SELF'])."/users/getlist';
			</script>";
		}
		else {
			Flight::render('Users-form.php',['pros' => $pros,'act' => $act]);
		}
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
	if (!isset($post['actID']) || $post['actID']=='') {
		echo "<script>
		alert('unexpected error !');
		window.location.href='".dirname($_SERVER['PHP_SELF'])."/users/getlist';
		</script>";
	}else {
		$isneed = true;
		$actID = Model::filter_data($post['actID']);
		$pros = $m->getPros($actID);
		$data = [];
		foreach ($pros as $key => $value) {
			if (!isset($post[$value['label']]) || $post[$value['label']]=='') {
				$data[$value['label']] = '';
				if ($value['isneed']==1) {
					$isneed = false;
				}
			}else {
				$data[$value['label']] = Model::filter_data($post[$value['label']]);
			}
		}
		if (empty($data)) {
			echo "<script>
			alert('empty property !');
			window.location.href='".dirname($_SERVER['PHP_SELF'])."/users/getform?actID=".$actID."';
			</script>";
		}elseif ($isneed) {
			$m->createEnt($actID,$data);
			echo "<script>
			alert('submit success !');
			window.location.href='".dirname($_SERVER['PHP_SELF'])."/users/getlist';
			</script>";
		}else {
			echo "<script>
			alert('something you forget it !');
			window.location.href='".dirname($_SERVER['PHP_SELF'])."/users/getform?actID=".$actID."';
			</script>";
		}
	}
}

function delRec()
{
	$m = new Model();
	$query = Flight::request()->query;
	$actID = Model::filter_data($query['actID']);
	$index = Model::filter_data($query['index']);
	if (!isset($index) || !isset($actID) || $index=='' || $actID=='') {
		echo "<script>
		alert('unexpected error !');
		window.location.href='".dirname($_SERVER['PHP_SELF'])."/admin/getacts';
		</script>";
	}else {
		$m->deleteEnt($actID,$index);
		Flight::redirect('/admin/showrec?actID='.$actID);
	}
}

function showRec()
{
	$m = new Model();
	$query = Flight::request()->query;
	$actID = Model::filter_data($query['actID']);
	if (!isset($actID) || $actID=='') {
		Flight::redirect('/admin/getacts');
	}else {
		$pros = $m->getPros($actID);
		$ents = $m->getEnts($actID);
		Flight::render('Ents.php',['actID' => $actID,'pros' => $pros,'ents' => $ents]);
	}
}

?>