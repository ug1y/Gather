<!doctype html>
<html lang="zh-cn">
<head>
	<meta charset="utf-8"></meta>
</head>
<body>
	<form action=<?php echo dirname($_SERVER['PHP_SELF'])."/admin/createpro"?> method="post">
		<?php
		echo '<input type="hidden" name="actID" value="'.$actID.'" />';
		echo 'name:<input type="text" name="name" /><br>';
		echo 'label:<input type="text" name="label" /><br>';
		echo 'type:<input type="text" name="type" /><br>';
		echo 'description:<br>';
		echo '<textarea rows="3" cols="20" name="description"></textarea><br>';
		//<input type="textarea" name="description" value="'.$data['description'].'" /><br>';
		//echo 'createtime:<input type="date" name="createtime" value="'.$data['createtime'].'" /><br>';
		echo 'isneed:<input type="text" name="isneed" /><br>';
		echo 'constraint:<input type="text" name="constraint" /><br>';
		echo 'order:<input type="text" name="order" /><br>';
		?>
		<input type="submit" value="submit" />
	</form>
</body>
</html>