<!doctype html>
<html lang="zh-cn">
<head>
	<meta charset="utf-8"></meta>
</head>
<body>
	<form action="" method="post">
		<?php
		echo "<input type='hidden' name='actID' value=".$actID." />";
		foreach ($data as $key => $value) {
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