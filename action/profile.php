<?php
/** 用户相关访问 */

function login()
{
	$post = Flight::request()->data;
	$user = $post['user'];
	$pass = $post['pass'];
	if (!is_null($user) && 
		!is_null($pass) && 
		$user==constant('GA_USER') && 
		$pass==constant('GA_PASS')) {
		$_SESSION['user'] = constant('GA_USER');
		Flight::redirect('/admin/getacts');
	}else {
		unset($_SESSION['user']);
		Flight::render('Sign.php');
	}
}

function logout()
{
	unset($_SESSION['user']);
	if (!isset($_SESSION['user'])) {
		echo Flight::json(['sucess']);
	}
}

function sign()
{
	Flight::render('Sign.php');
}

function check()
{
	if (Model::islogin()) {
		return true;
	}else {
		echo "please login !";
	}
	
}

?>