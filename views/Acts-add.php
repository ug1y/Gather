<?php
$elem = '
<div class="form-group">
<label for="title" class="col-sm-2 control-label"><span style="color:red">*</span>活动标题</label>
<div class="col-sm-8">
<input type="text" class="form-control" id="title" name="title" placeholder="必填">
</div>
</div>
<div class="form-group">
<label for="description" class="col-sm-2 control-label">活动描述</label>
<div class="col-sm-8">
<textarea class="form-control" rows="3" id="description" name="description" placeholder="可选"></textarea>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">当前时间</label>
<div class="col-sm-8">
<p class="form-control-static"><b>'.date('Y-m-d').'</b></p>
</div>
</div>
<div class="form-group">
<label for="deadline" class="col-sm-2 control-label"><span style="color:red">*</span>截止时间</label>
<div class="col-sm-8">
<input type="date" class="form-control" id="deadline" name="deadline" placeholder="">
</div>
</div>
<div class="form-group">
<label for="status" class="col-sm-2 control-label"><span style="color:red">*</span>当前状态</label>
<div class="col-sm-8">
<select class="form-control" id="status" name="status" placeholder="">
<option value="0" selected>未发布</option>
<option value="1">已发布</option>
</select>
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
<button type="submit" class="btn btn-primary">添加</button>
&nbsp;
<a href='.dirname($_SERVER['PHP_SELF']).'/admin/getacts ?>返回</a>
</div>
</div>
</form>
</div>
</div>
</div>
';


require 'Layout-admin.php';
?>