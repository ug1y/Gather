<!doctype html>
<html lang="zh-cn">
<head>
	<meta charset="utf-8"></meta>
</head>
<body>
	<table border="1">
	<tr>
		<?php
		echo "<th>序号</th>";
		foreach ($field as $key => $value) {
			echo "<th>".$value."</th>";
		}
		?>
	</tr>
	<tr>
		<?php 
		foreach ($data as $key => $value) {
			echo "<td><a href='".dirname($_SERVER['PHP_SELF'])."/admin/editact?actID=".$value['actID']."'>".($key+1)."</a></td>";
			echo "<td>".$value['title']."</td>";
			echo "<td>".$value['description']."</td>";
			echo "<td>".$value['createtime']."</td>";
			echo "<td>".$value['deadline']."</td>";
			echo "<td>".$value['status']."</td>";
		}
		?>
	</tr>
	</table>
</body>
</html>