<?php

require 'action/welcome.php';
Flight::route('/','hello');

require 'action/info.php';
Flight::route('/act','getAct');
Flight::route('/form','getForm');

//用户登录退出
require 'action/profile.php';
Flight::route('/login','login');
Flight::route('/logout','logout');

?>