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
			echo "<th>操作</th>"
			?>
		</tr>
		<?php 
		foreach ($acts as $key => $value) {
			echo "<tr>";
			echo "<td>".($key+1)."</td>";
			echo "<td>".$value['title']."</td>";
			echo "<td>".$value['description']."</td>";
			echo "<td>".$value['createtime']."</td>";
			echo "<td>".$value['deadline']."</td>";
			echo "<td>".$value['status']."</td>";
			echo "<td>
			<a href='".dirname($_SERVER['PHP_SELF'])."/users/getform?actID=".$value['actID']."'>填写表单</a>
			</td>";
			echo "</tr>";
		}
		?>
	</table>
</body>
</html>