<?php

require 'action/welcome.php';
Flight::route('/','hello');

//用户登录退出
require 'action/profile.php';
Flight::route('/login','login');
Flight::route('/logout','logout');

require 'action/activities.php';
//页面型
Flight::route('/admin/getacts','getActs');
Flight::route('/admin/editact','editAct');
Flight::route('/admin/addact','addAct');
//功能型
Flight::route('/admin/createact','createAct');
Flight::route('/admin/updateact','updateAct');
Flight::route('/admin/deleteact','deleteAct');

require 'action/properties.php';
//页面型
Flight::route('/admin/getpros','getPros');
Flight::route('/admin/editpro','editPro');
Flight::route('/admin/addpro','addPro');
//功能型
Flight::route('/admin/createpro','createPro');
Flight::route('/admin/updatepro','updatePro');
Flight::route('/admin/deletepro','deletePro');

require 'action/users.php';
//页面型
Flight::route('/users/getform','getForm');
Flight::route('/users/getlist','getList');

//功能型
?>