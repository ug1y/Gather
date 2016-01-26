<?php
$elem = '
<div class="form-group">
<label for="name" class="col-sm-2 control-label">name</label>
<div class="col-sm-8">
<input type="text" class="form-control" id="name" name="name" value="'.$pro['name'].'">
</div>
</div>
<div class="form-group">
<label for="label" class="col-sm-2 control-label">label</label>
<div class="col-sm-8">
<input type="text" class="form-control" id="label" name="label" value="'.$pro['label'].'">
</div>
</div>
<div class="form-group">
<label for="type" class="col-sm-2 control-label">type</label>
<div class="col-sm-8">
<input type="text" class="form-control" id="type" name="type" value="'.$pro['type'].'">
</div>
</div>
<div class="form-group">
<label for="description" class="col-sm-2 control-label">description</label>
<div class="col-sm-8">
<textarea class="form-control" rows="3" id="description" name="description" placeholder="">'.$pro['description'].'</textarea>
</div>
</div>
<div class="form-group">
<label for="isneed" class="col-sm-2 control-label">isneed</label>
<div class="col-sm-8">
<input type="text" class="form-control" id="isneed" name="isneed" value="'.$pro['isneed'].'">
</div>
</div>
<div class="form-group">
<label for="constraint" class="col-sm-2 control-label">constraint</label>
<div class="col-sm-8">
<input type="text" class="form-control" id="constraint" name="constraint" value="'.$pro['constraint'].'">
</div>
</div>
<div class="form-group">
<label for="order" class="col-sm-2 control-label">order</label>
<div class="col-sm-8">
<input type="number" class="form-control" id="order" name="order" value="'.$pro['order'].'">
</div>
</div>
';

$nav = '
<div class="col-xs-12">
<ol class="breadcrumb">
<li><a href="'.dirname($_SERVER['PHP_SELF']).'/admin/getacts">Activities</a></li>
<li><a href="'.dirname($_SERVER['PHP_SELF']).'/admin/getpros?actID='.$pro['actID'].'">Properties</a></li>
<li class="active">Edit</li>
</ol>
</div>
';

$detail = '
'.$nav.'
<div class="col-xs-12">
<div style="margin-top:5px" class="panel panel-primary">
<div class="panel-heading">
<h3 class="panel-title">添加输入项</h3>
</div>
<div class="panel-body">
<form class="form-horizontal" action='.dirname($_SERVER['PHP_SELF']).'/admin/updatepro method="post">
<input type="hidden" name="actID" value='.$pro['actID'].' />
<input type="hidden" name="proID" value='.$pro['proID'].' />
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