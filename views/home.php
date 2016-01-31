<?php
$wel = 'active';
$h1 = 'Hello,Everybody!';
$p = 'welcome to my projects,admin user please <a href='.dirname($_SERVER['PHP_SELF']).'/sign'.'>login</a>';

$detail = '
<div class="col-xs-12">
<div class="jumbotron">
<h1>'.$h1.'</h1>
<p>'.$p.'</p>
<p><a class="btn btn-primary btn-lg" href="users/getlist" role="button">填写表单</a></p>
</div>
</div>
';

require 'Layout-users.php';
?>