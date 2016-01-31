<?php

function setup()
{
	if (file_exists('config.php')) {
		return true;
	}else {
		$post = Flight::request()->data;
		//$post['setup'] = Model::filter_data($post['setup']);
		$post['username'] = Model::filter_data($post['username']);
		$post['password'] = Model::filter_data($post['password']);
		$post['db_type'] = Model::filter_data($post['db_type']);
		$post['db_name'] = Model::filter_data($post['db_name']);
		$post['db_host'] = Model::filter_data($post['db_host']);
		$post['db_port'] = Model::filter_data($post['db_port']);
		$post['db_user'] = Model::filter_data($post['db_user']);
		$post['db_pass'] = Model::filter_data($post['db_pass']);
		if (!isset($post['setup']) || $post['setup']=='one') {
			Flight::render('Setup-One',['post' => $post]);
		}elseif ($post['setup']=='two') {
			Flight::render('Setup-Two',['post' => $post]);
		}elseif ($post['setup']=='finish') {
			if($post['username']==''||$post['password']==''){Flight::render('Setup-One',['post' => $post]);}
			elseif($post['db_type']==''||$post['db_name']==''||$post['db_host']==''||$post['db_user']==''||$post['db_pass']==''){Flight::render('Setup-Two',['post' => $post]);}
			else{if($post['db_port']==''){$post['db_port']==3306;}
			setupConfig($post);
			require 'sqlset.php';
			sqlset('config.php');
			echo "<script>
			alert('you finished the setup !');
			window.location.href='".dirname($_SERVER['PHP_SELF'])."/';
			</script>";}
		}else {
			if($post['username']==''||$post['password']==''){Flight::render('Setup-One',['post' => $post]);}
			elseif($post['db_type']==''||$post['db_name']==''||$post['db_host']==''||$post['db_user']==''||$post['db_pass']==''){Flight::render('Setup-Two',['post' => $post]);}
			else{setupConfig($post);
			echo "<script>
			alert('you finished the setup !');
			window.location.href='".dirname($_SERVER['PHP_SELF'])."/';
			</script>";}
		}
	}
}

function home()
{
	Flight::render('home');
}

function about()
{
	Flight::render('about');
}

function setupConfig($post)
{
	$file = 'config.php';
	$content = "<?php
/*
* 自动生成配置文件
* 保存数据库连接以及用户信息
*/

/** 使用的数据库类型 */
define('DB_TYPE', '".$post['db_type']."');

/** Gahter数据库的名称 */
define('DB_NAME', '".$post['db_name']."');

/** 数据库用户名 */
define('DB_USER', '".$post['db_user']."');

/** 数据库密码 */
define('DB_PASS', '".$post['db_pass']."');

/** 主机 */
define('DB_HOST', '".$post['db_host']."');

/** 创建数据表时默认的文字编码 */
define('DB_CHARSET', 'utf8');

/** 端口号 */
define('DB_PORT', '".$post['db_port']."');

/** 系统用户 */
define('GA_USER', '".$post['username']."');

/** 系统密码 */
define('GA_PASS', '".$post['password']."');

?>
	";
	$myfile = fopen($file, "w");
	fwrite($myfile, $content);
}

?>