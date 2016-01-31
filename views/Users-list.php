<?php
$for = 'active';

$thead = '';
// foreach ($field as $key => $value) {
// 	$thead = $thead."<th>".$value."</th>";
// }
$thead = $thead."<th>活动标题</th>";
$thead = $thead."<th>截止时间</th>";
//$thead = $thead."<th></th>";

$tbody = '';
foreach ($acts as $key => $value) {
	$tbody = $tbody."<tr>";
	$tbody = $tbody."<td>".($key+1)."</td>";
	$tbody = $tbody."<td>".$value['title']."</td>";
//	$tbody = $tbody."<td>".$value['description']."</td>";
//	$tbody = $tbody."<td>".$value['createtime']."</td>";
	$tbody = $tbody."<td>".$value['deadline']."</td>";
//	$tbody = $tbody."<td>".$value['status']."</td>";
	$tbody = $tbody."<td>
	<a href='".dirname($_SERVER['PHP_SELF'])."/users/getform?actID=".$value['actID']."'>填写表单</a>
	</td>";
	$tbody = $tbody."</tr>";
}

$detail = '
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

require 'Layout-users.php';
?>