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
			foreach ($pros as $key => $value) {
				echo "<th>".$value['name']."</th>";
			}
			echo "<th>操作</th>"
			?>
		</tr>
		<?php 
		
		foreach ($ents as $ent) {
			//var_dump($ent);
			foreach ($ent as $key => $value) {
				echo "<tr>";
				echo "<td>".($key+1)."</td>";
				echo "<td>".$value['content']."</td>";
				echo "<td>
				<a href='".dirname($_SERVER['PHP_SELF'])."/admin/delrec?actID=".$actID."&index=".$value['index']."'>删除</a>
				</td>";
				echo "</tr>";
			}
		}
		?>
</body>
</html>