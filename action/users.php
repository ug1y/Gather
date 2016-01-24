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
		$data = $m->getPros($actID);
		Flight::render('Users-form.php',['data' => $data,'actID' => $actID]);
	}
	
}

function getList()
{
	echo "string";
}

?>