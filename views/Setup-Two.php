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
    					<h3 class="panel-title">Setup-数据库设置</h3>
    				</div>
    				<div class="panel-body">
    					<form class="form-horizontal" name="form" action="" method="post">
                            <input type="hidden" id="setup" name="setup" value="">
                            <input type="hidden" name="username" value="<?php echo isset($post['username'])?$post['username']:'';?>">
                            <input type="hidden" name="password" value="<?php echo isset($post['password'])?$post['password']:'';?>">
    						<div class="form-group">
    							<label for="db_type" class="col-sm-2 control-label">类型：</label>
    							<div class="col-sm-8">
    								<input type="text" class="form-control" id="db_type" name="db_type" placeholder="必填,例如：mysql" value="<?php echo isset($post['db_type'])?$post['db_type']:'';?>">
    							</div>
    						</div>
    						<div class="form-group">
    							<label for="db_name" class="col-sm-2 control-label">数据库：</label>
    							<div class="col-sm-8">
    								<input type="text" class="form-control" id="db_name" name="db_name" placeholder="必填,例如：gather" value="<?php echo isset($post['db_name'])?$post['db_name']:'';?>">
    							</div>
    						</div>
    						<div class="form-group">
    							<label for="db_host" class="col-sm-2 control-label">地址：</label>
    							<div class="col-sm-8">
    								<input type="text" class="form-control" id="db_host" name="db_host" placeholder="必填,例如：localhost" value="<?php echo isset($post['db_host'])?$post['db_host']:'';?>">
    							</div>
    						</div>
    						<div class="form-group">
    							<label for="db_user" class="col-sm-2 control-label">账号：</label>
    							<div class="col-sm-8">
    								<input type="text" class="form-control" id="db_user" name="db_user" placeholder="必填" value="<?php echo isset($post['db_user'])?$post['db_user']:'';?>">
    							</div>
    						</div>
    						<div class="form-group">
    							<label for="db_pass" class="col-sm-2 control-label">密码：</label>
    							<div class="col-sm-8">
    								<input type="text" class="form-control" id="db_pass" name="db_pass" placeholder="必填" value="<?php echo isset($post['db_pass'])?$post['db_pass']:'';?>">
    							</div>
    						</div>
                            <div class="form-group">
                                <label for="db_port" class="col-sm-2 control-label">端口：</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="db_port" name="db_port" placeholder="可选,默认为3306" value="<?php echo isset($post['db_port'])?$post['db_port']:'';?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-3">
                                    <button type="submit" class="btn btn-default" onclick="pre()" >上一步</button>
                                </div>
                                <div class="col-sm-offset-1 col-sm-3" >
                                    <button type="submit" class="btn btn-primary" onclick="finish()" >完&nbsp;&nbsp;成</button>
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
    function pre() {
        document.getElementById('setup').value = "one";
        document.form.submit();
    }
    function finish() {
        if (document.getElementsByName('username')[0].value==''||document.getElementsByName('password')[0].value=='') {
            document.getElementById('setup').value = "one";
            document.form.submit();
        } else if (document.getElementsByName('db_type')[0].value==''||document.getElementsByName('db_name')[0].value==''||document.getElementsByName('db_host')[0].value==''||document.getElementsByName('db_user')[0].value==''||document.getElementsByName('db_pass')[0].value=='') {
            alert('please finish setup parse.');
        } else {
            var retval=confirm("是否自动创建数据库表？");
            if (retval) {
                document.getElementById('setup').value = "finish";
            }else {
                document.getElementById('setup').value = "end";
            }
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