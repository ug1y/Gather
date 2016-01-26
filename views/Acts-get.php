<?php
$thead = '';
foreach ($field as $key => $value) {
	$thead = $thead."<th>".$value."</th>";
}

$tbody = '';
foreach ($acts as $key => $value) {
	$tbody = $tbody."<tr>";
	$tbody = $tbody."<td>".($key+1)."</td>";
	$tbody = $tbody."<td>".$value['title']."</td>";
	$tbody = $tbody."<td>".$value['description']."</td>";
	$tbody = $tbody."<td>".$value['createtime']."</td>";
	$tbody = $tbody."<td>".$value['deadline']."</td>";
	$tbody = $tbody."<td>".$value['status']."</td>";
	$tbody = $tbody."<td>
	<a href='".dirname($_SERVER['PHP_SELF'])."/admin/showrec?actID=".$value['actID']."'>查看结果</a>
	<a href='".dirname($_SERVER['PHP_SELF'])."/admin/editact?actID=".$value['actID']."'>编辑</a>
	<a href='".dirname($_SERVER['PHP_SELF'])."/admin/getpros?actID=".$value['actID']."'>输入项</a>
	<a href='".dirname($_SERVER['PHP_SELF'])."/admin/deleteact?actID=".$value['actID']."'>删除</a>
	</td>";
	$tbody = $tbody."</tr>";
}
//<li><a href="'.dirname($_SERVER['PHP_SELF']).'/admin/getacts">Activities</a></li>
$nav = '
<div class="col-xs-11">
<ol class="breadcrumb">
<li class="active">Activities</li>
</ol>
</div>
<div class="col-xs-1">
<a class="btn btn-primary" href='.dirname($_SERVER['PHP_SELF']).'/admin/addact role="button">添加活动</a>
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