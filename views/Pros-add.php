<?php
$elem = '
<div class="form-group">
<label for="name" class="col-sm-2 control-label"><span style="color:red">*</span>属性名</label>
<div class="col-sm-8">
<input type="text" class="form-control" id="name" name="name" placeholder="必填，显示给用户的内容">
</div>
</div>
<div class="form-group">
<label for="label" class="col-sm-2 control-label"><span style="color:red">*</span>标签名</label>
<div class="col-sm-8">
<input type="text" class="form-control" id="label" name="label" placeholder="必填，表单的html标签">
</div>
</div>
<div class="form-group">
<label for="type" class="col-sm-2 control-label">类型</label>
<div class="col-sm-8">
<select class="form-control" id="type" name="type" placeholder="">
<option value="text" selected>text</option>
</select>
</div>
</div>
<div class="form-group">
<label for="description" class="col-sm-2 control-label">描述</label>
<div class="col-sm-8">
<textarea class="form-control" rows="3" id="description" name="description" placeholder="可选"></textarea>
</div>
</div>
<div class="form-group">
<label for="isneed" class="col-sm-2 control-label">必填否</label>
<div class="col-sm-8">
<select class="form-control" id="isneed" name="isneed" placeholder="">
<option value="0" selected>否</option>
<option value="1" >是</option>
</select>
</div>
</div>
<!--
<div class="form-group">
<label for="constraint" class="col-sm-2 control-label">输入约束</label>
<div class="col-sm-8">
<input type="text" class="form-control" id="constraint" name="constraint" placeholder="文本过滤">
</div>
</div>
-->
<div class="form-group">
<label for="order" class="col-sm-2 control-label">排序</label>
<div class="col-sm-8">
<input type="number" class="form-control" id="order" name="order" placeholder="从小到大排列">
</div>
</div>
';

$nav = '
<div class="col-xs-12">
<ol class="breadcrumb">
<li><a href="'.dirname($_SERVER['PHP_SELF']).'/admin/getacts">Activities</a></li>
<li><a href="'.dirname($_SERVER['PHP_SELF']).'/admin/getpros?actID='.$actID.'">Properties</a></li>
<li class="active">Add</li>
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
<form class="form-horizontal" action='.dirname($_SERVER['PHP_SELF']).'/admin/createpro method="post">
<input type="hidden" name="actID" value='.$actID.' />
'.$elem.'
<div class="form-group">
<div class="col-sm-offset-2 col-sm-8">
<button type="submit" class="btn btn-primary">添加</button>
&nbsp;
<a href='.dirname($_SERVER['PHP_SELF']).'/admin/getpros?actID='.$actID.' ?>返回</a>
</div>
</div>
</form>
</div>
</div>
</div>
';

require 'Layout-admin.php';
?>