<?php
session_start();

//$_SESSION['user']='admin';
// unset($_SESSION['user']);

require 'flight/Flight.php';

require 'model.php';

require 'router.php';

require 'config.php';

Flight::set('flight.views.path', 'views');

Flight::start();



?>