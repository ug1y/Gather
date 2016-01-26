<!doctype html>
<html lang="zh-cn">
<head>
	<meta charset="utf-8"></meta>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <!-- Bootstrap -->
    <link href=<?php echo dirname($_SERVER['PHP_SELF']).'/views/css/bootstrap.min.css';?> rel="stylesheet">
    <style type="text/css">body { padding-bottom: 70px; }</style>
</head>
<body>

	<div class="container-fluid">
    	<div class="row">
    		<div class="col-xs-10 col-sm-8 col-md-6 col-md-offset-3 col-sm-offset-2 col-xs-offset-1">
    			<div style="margin-top:100px" class="panel panel-default">
    				<div class="panel-heading">
    					<h3 class="panel-title">登录</h3>
    				</div>
    				<div class="panel-body">
    					<form class="col-sm-offset-1 col-sm-10" action=<?php echo dirname($_SERVER['PHP_SELF'])."/login"?> method="post">
							<div class="input-group">
								<span class="input-group-addon" id="basic-addon1"  aria-hidden="true"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>
								<input name="user" type="text" class="form-control" placeholder="username" aria-describedby="basic-addon1">
							</div>
							<br>
							<div class="input-group">
								<span class="input-group-addon" id="basic-addon2"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></span>
								<input name="pass" type="text" class="form-control" placeholder="password" aria-describedby="basic-addon2">
							</div>
							<br>
							<div class="col-xs-6 col-xs-offset-3 text-center">
								<input class="btn btn-primary" type="submit" value="login">
								&nbsp;
								<a href=<?php echo dirname($_SERVER['PHP_SELF'])."/"?> >返回</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
    </div>

	<nav class="navbar navbar-default navbar-fixed-bottom">
		<div class="container">
			<br>
			<p class="text-center">copyright© Author by <a href="https://github.com/ugly-yh/Gather" target="_blank">ugly-yh</a> about Gather </p>
   		</div>
	</nav>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src=<?php echo dirname($_SERVER['PHP_SELF']).'/views/js/jquery-1.12.0.min.js';?>></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src=<?php echo dirname($_SERVER['PHP_SELF']).'/views/js/bootstrap.min.js';?>></script>
</body>
</html>