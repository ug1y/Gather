<?php

$thead = '';
foreach ($pros as $key => $value) {
	$thead = $thead."<th>".$value['name']."</th>";
}

$tbody = '';
foreach ($ents as $ent) {
	foreach ($ent as $key => $value) {
		$tbody = $tbody."<tr>";
		$tbody = $tbody."<td>".($key+1)."</td>";
		$tbody = $tbody."<td>".$value['content']."</td>";
		$tbody = $tbody."<td>
		<a href='".dirname($_SERVER['PHP_SELF'])."/admin/delrec?actID=".$actID."&index=".$value['index']."'>删除</a>
		</td>";
		$tbody = $tbody."</tr>";
	}
}

$nav = '
<ol class="breadcrumb">
<li><a href="'.dirname($_SERVER['PHP_SELF']).'/admin/getacts">Activities</a></li>
<li class="active">result</li>
</ol>
';

$detail = '
'.$nav.'
<table class="table table-hover">
<thead><tr>
<th>#</th>
'.$thead.'
<th>操作</th>
</tr></thead>
<tbody>'.$tbody.'</tbody>
</table>
';

require 'Layout-admin.php';
?>