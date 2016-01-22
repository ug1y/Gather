<?php
/** 用户相关访问 */

function login()
{
	$query = Flight::request()->query;
	$user = $query['user'];
	$pass = $query['pass'];
	if (isset($user) && 
		isset($pass) && 
		$user==constant('GA_USER') && 
		$pass==constant('GA_PASS')) {
		$_SESSION['user'] = constant('GA_USER');
		echo Flight::json(['sucess']);
	}else {
		unset($_SESSION['user']);
		echo Flight::json(['error']);
	}
}

function logout()
{
	unset($_SESSION['user']);
	if (!isset($_SESSION['user'])) {
		echo Flight::json(['sucess']);
	}
	
}

?>