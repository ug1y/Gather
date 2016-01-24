<!doctype html>
<html lang="zh-cn">
<head>
	<meta charset="utf-8"></meta>
</head>
<body>
	<form action=<?php echo dirname($_SERVER['PHP_SELF'])."/admin/updateact"?> method="post">
		<?php
		echo '<input type="hidden" name="actID" value="'.$data['actID'].'" />';
		echo 'title:<input type="text" name="title" value="'.$data['title'].'" /><br>';
		echo 'description:<br>';
		echo '<textarea rows="3" cols="20" name="description">'.$data['description'].'</textarea><br>';
		//<input type="textarea" name="description" value="'.$data['description'].'" /><br>';
		//echo 'createtime:<input type="date" name="createtime" value="'.$data['createtime'].'" /><br>';
		echo 'deadline:<input type="date" name="deadline" value="'.$data['deadline'].'" /><br>';
		echo 'status:<input type="text" name="status" value="'.$data['status'].'" /><br>';
		var_dump($data);
		?>
		<input type="submit" value="submit" />
	</form>
</body>
</html>