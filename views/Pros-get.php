<!doctype html>
<html lang="zh-cn">
<head>
	<meta charset="utf-8"></meta>
</head>
<body>
	<a href=<?php echo dirname($_SERVER['PHP_SELF'])."/admin/addpro?actID=".$actID ?>>添加输入项</a>
	<table border="1">
	<tr>
		<?php
		echo "<th>序号</th>";
		//$tmp = $field[0];
		unset($field[0]);
		foreach ($field as $key => $value) {
			echo "<th>".$value."</th>";
		}
		echo "<th>操作</th>"
		?>
	</tr>
	<?php 
	foreach ($data as $key => $value) {
		echo "<tr>";
		echo "<td>".($key+1)."</td>";
		echo "<td>".$value['name']."</td>";
		echo "<td>".$value['label']."</td>";
		echo "<td>".$value['type']."</td>";
		echo "<td>".$value['description']."</td>";
		echo "<td>".$value['isneed']."</td>";
		echo "<td>".$value['constraint']."</td>";
		echo "<td>".$value['order']."</td>";
		echo "<td>
		<a href='".dirname($_SERVER['PHP_SELF'])."/admin/editpro?proID=".$value['proID']."'>编辑</a>
		<a href='".dirname($_SERVER['PHP_SELF'])."/admin/deletepro?proID=".$value['proID']."'>删除</a>
		</td>";
		echo "</tr>";
	}
	?>
	</table>
</body>
</html>