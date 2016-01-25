<!doctype html>
<html lang="zh-cn">
<head>
	<meta charset="utf-8"></meta>
</head>
<body>
	<form action=<?php echo dirname($_SERVER['PHP_SELF'])."/login"?> method="post">
		username:<input type="text" name="user" /><br>
		password:<input type="text" name="pass" /><br>
		<input type="submit" value="submit" /><br>
	</form>
</body>
</html>