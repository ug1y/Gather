<?php
session_start();

/** 加载Flight应用web框架 */
require 'flight/Flight.php';

/** 加载数据库操作文件 */
require 'model.php';

/** 加载路由映射文件 */
require 'router.php';

/** 加载配置文件，数据库已经用户信息 */
if (file_exists('config.php')) {
	require 'config.php';
}

/** 设置视图目录 */
Flight::set('flight.views.path', 'views');

/** 启动web应用 */
Flight::start();



?>