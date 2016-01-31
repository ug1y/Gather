<?php

$thead = '';
foreach ($pros as $key => $value) {
	$thead = $thead."<th>".$value['name']."</th>";
}

$tbody = '';
// var_dump($ents);
if (!empty($ents)) {
	$cols = count($ents);
	$rows = count($ents[0]);
	for ($i=0; $i < $rows ; $i++) { 
		$tbody = $tbody."<tr>";
		$tbody = $tbody."<td>".($i+1)."</td>";
		for ($j=0; $j < $cols; $j++) { 
			$tbody = $tbody."<td>".$ents[$j][$i]['content']."</td>";
		}
		$tbody = $tbody."<td>
		<a href='".dirname($_SERVER['PHP_SELF'])."/admin/delrec?actID=".$actID."&index=".$ents[0][$i]['index']."'>删除</a>
		</td>";
		$tbody = $tbody."</tr>";
	}
}


$nav = '
<div class="col-xs-12">
<ol class="breadcrumb">
<li><a href="'.dirname($_SERVER['PHP_SELF']).'/admin/getacts">Activities</a></li>
<li class="active">result</li>
</ol>
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