<?php
$elem = '
<div class="form-group">
<label for="title" class="col-sm-2 control-label">title</label>
<div class="col-sm-8">
<input type="text" class="form-control" id="title" name="title" placeholder="">
</div>
</div>
<div class="form-group">
<label for="description" class="col-sm-2 control-label">description</label>
<div class="col-sm-8">
<textarea class="form-control" rows="3" id="description" name="description" placeholder=""></textarea>
</div>
</div>
<div class="form-group">
<label for="deadline" class="col-sm-2 control-label">deadline</label>
<div class="col-sm-8">
<input type="date" class="form-control" id="deadline" name="deadline" placeholder="">
</div>
</div>
<div class="form-group">
<label for="status" class="col-sm-2 control-label">status</label>
<div class="col-sm-8">
<input type="text" class="form-control" id="status" name="status" placeholder="">
</div>
</div>
';

$nav = '
<div class="col-xs-12">
<ol class="breadcrumb">
<li><a href="'.dirname($_SERVER['PHP_SELF']).'/admin/getacts">Activities</a></li>
<li class="active">Add</li>
</ol>
</div>
';

$detail = '
'.$nav.'
<div class="col-xs-12">
<div style="margin-top:5px" class="panel panel-primary">
<div class="panel-heading">
<h3 class="panel-title">添加活动</h3>
</div>
<div class="panel-body">
<form class="form-horizontal" action='.dirname($_SERVER['PHP_SELF']).'/admin/createact method="post">
'.$elem.'
<div class="form-group">
<div class="col-sm-offset-2 col-sm-8">
<button type="submit" class="btn btn-default">Submit</button>
</div>
</div>
</form>
</div>
</div>
</div>
';


require 'Layout-admin.php';
?>