<?php

$thead = '';
// unset($field[0]);
// foreach ($field as $key => $value) {
// 	$thead = $thead."<th>".$value."</th>";
// }
$thead = $thead."<th>属性名</th>";
$thead = $thead."<th>标签名</th>";
$thead = $thead."<th>类型</th>";
$thead = $thead."<th>描述</th>";
$thead = $thead."<th>必填否</th>";


$tbody = '';
foreach ($pros as $key => $value) {
	$tbody = $tbody."<tr>";
	$tbody = $tbody."<td>".($key+1)."</td>";
	$tbody = $tbody."<td>".$value['name']."</td>";
	$tbody = $tbody."<td>".$value['label']."</td>";
	$tbody = $tbody."<td>".$value['type']."</td>";
	$tbody = $tbody."<td>".$value['description']."</td>";
	$tbody = $tbody."<td>".($value['isneed']==0?'否':'是')."</td>";
//	$tbody = $tbody."<td>".$value['constraint']."</td>";
//	$tbody = $tbody."<td>".$value['order']."</td>";
	$tbody = $tbody."<td>
	<a href='".dirname($_SERVER['PHP_SELF'])."/admin/editpro?proID=".$value['proID']."'>编辑</a>
	<a href='".dirname($_SERVER['PHP_SELF'])."/admin/deletepro?proID=".$value['proID']."'>删除</a>
	</td>";
	$tbody = $tbody."</tr>";
}


$nav = '
<div class="col-xs-11">
<ol class="breadcrumb">
<li><a href="'.dirname($_SERVER['PHP_SELF']).'/admin/getacts">Activities</a></li>
<li class="active">Properties</li>
</ol>
</div>
<div class="col-xs-1">
<a class="btn btn-primary" href='.dirname($_SERVER['PHP_SELF']).'/admin/addpro?actID='.$actID.' role="button">添加输入项</a>
</div>
';

$detail = '
'.$nav.'
<div class="col-xs-12">
<table class="table table-hover">
<thead><tr>
<th>#</th>
'.$thead.'
<th>操作</th>
</tr></thead>
<tbody>'.$tbody.'</tbody>
</table>
</div>
';


require 'Layout-admin.php';
?>