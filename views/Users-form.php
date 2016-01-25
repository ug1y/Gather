<!doctype html>
<html lang="zh-cn">
<head>
	<meta charset="utf-8"></meta>
</head>
<body>
	<form action=<?php echo dirname($_SERVER['PHP_SELF'])."/users/addform"?> method="post">
		<?php
		echo "<input type='hidden' name='actID' value=".$actID." />";
		foreach ($pros as $key => $value) {
			echo $value['label']."<input type=".$value['type']." name=".$value['name']." />";
			if ($value['isneed']==1) {
				echo "*<br>";
			}else {
				echo "<br>";
			}
		}
		?>
		<input type="submit" value="submit" />
	</form>
</body>
</html>