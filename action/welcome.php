<?php

function hello()
{
	Flight::render('body');
	$id = Flight::request()->query['id'];
	var_dump($id);
}
?>