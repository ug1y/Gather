<?php

require 'action/welcome.php';
Flight::route('/','hello');

//用户登录退出
require 'action/profile.php';
Flight::route('/login','login');
Flight::route('/logout','logout');

require 'action/activities.php';
Flight::route('/admin/getacts','getActs');
Flight::route('/admin/createact','createAct');
Flight::route('/admin/editact','editAct');
Flight::route('/admin/updateact','updateAct');

?>