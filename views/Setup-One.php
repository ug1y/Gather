<!doctype html>
<html lang="zh-cn">
<head>
	<meta charset="utf-8"></meta>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Setup</title>
    <!-- Bootstrap -->
    <link href=<?php echo dirname($_SERVER['PHP_SELF']).'/views/css/bootstrap.min.css';?> rel="stylesheet">
    <style type="text/css">body { padding-bottom: 70px; }</style>
</head>
<body>

	<div class="container-fluid">
    	<div class="row">
    		<div class="col-xs-12 col-sm-10 col-md-8 col-md-offset-2 col-sm-offset-1">
    			<div style="margin-top:50px" class="panel panel-primary">
    				<div class="panel-heading">
    					<h3 class="panel-title">Setup-管理员设置</h3>
    				</div>
    				<div class="panel-body">
    					<form class="form-horizontal" name="form" action="" method="post">
                            <input type="hidden" id="setup" name="setup" value="">
                            <input type="hidden" name="db_type" value="<?php echo isset($post['db_type'])?$post['db_type']:'';?>">
                            <input type="hidden" name="db_name" value="<?php echo isset($post['db_name'])?$post['db_name']:'';?>">
                            <input type="hidden" name="db_host" value="<?php echo isset($post['db_host'])?$post['db_host']:'';?>">
                            <input type="hidden" name="db_port" value="<?php echo isset($post['db_port'])?$post['db_port']:'';?>">
                            <input type="hidden" name="db_user" value="<?php echo isset($post['db_user'])?$post['db_user']:'';?>">
                            <input type="hidden" name="db_pass" value="<?php echo isset($post['db_pass'])?$post['db_pass']:'';?>">
    						<div class="form-group">
    							<label for="username" class="col-sm-2 control-label">管理员账号：</label>
    							<div class="col-sm-8">
    								<input type="text" class="form-control" id="username" name="username" placeholder="必填" value="<?php echo isset($post['username'])?$post['username']:'';?>" >
    							</div>
    						</div>
    						<div class="form-group">
    							<label for="password" class="col-sm-2 control-label">管理员密码：</label>
    							<div class="col-sm-8">
    								<input type="text" class="form-control" id="password" name="password" value="<?php echo isset($post['password'])?$post['password']:'';?>" placeholder="必填">
    							</div>
    						</div>
    						<div class="form-group">
                                <div class="col-sm-offset-7 col-sm-3" >
                                    <button type="submit" class="btn btn-primary" onclick="next()">下一步</button>
                                </div>
                            </div>
    					</div>
    				</form>
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
    <script type="text/javascript">
    function next() {
        if (document.getElementsByName('username')[0].value==''||document.getElementsByName('password')[0].value=='') {
            alert('please finish setup parse.');
        }else {
            document.getElementById('setup').value = "two";
            document.form.submit();
        }
    }
    </script>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src=<?php echo dirname($_SERVER['PHP_SELF']).'/views/js/jquery-1.12.0.min.js';?>></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src=<?php echo dirname($_SERVER['PHP_SELF']).'/views/js/bootstrap.min.js';?>></script>
</body>
</html>