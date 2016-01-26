<!doctype html>
<html lang="zh-cn">
<head>
	<meta charset="utf-8"></meta>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome Template</title>
    <!-- Bootstrap -->
    <link href=<?php echo dirname($_SERVER['PHP_SELF']).'/views/css/bootstrap.min.css';?> rel="stylesheet">
    <style type="text/css">body { padding-bottom: 70px; }</style>
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid ">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
        			<span class="icon-bar"></span>
        			<span class="icon-bar"></span>
        			<span class="icon-bar"></span>
        		</button>
        		<a class="navbar-brand" href="#">Gather System</a>
        	</div>
            <?php
            if (Model::islogin()) {
                echo '<ul class="nav navbar-nav navbar-left">
                <li><a href='.dirname($_SERVER['PHP_SELF']).'/admin/getacts'.'><b>admin&gt;&gt;</b></a></li>
                </ul>';
            }
            ?>
        	<!-- Collect the nav links, forms, and other content for toggling -->
        	<div class="collapse navbar-collapse" id="navbar-collapse-1">
        		<ul class="nav navbar-nav navbar-right">
        			<li class=<?php echo isset($wel)?$wel:''; ?> ><a href=<?php echo dirname($_SERVER['PHP_SELF']).'/'?>>Welcome</a></li>
        			<li class=<?php echo isset($for)?$for:''; ?> ><a href=<?php echo dirname($_SERVER['PHP_SELF']).'/users/getlist'?>>Form</a></li>
        			<li class=<?php echo isset($abo)?$abo:''; ?> ><a href=<?php echo dirname($_SERVER['PHP_SELF']).'/about'?>>About</a></li>
        		</ul>
        	</div>
        </div>
    </nav>

    <div class="container-fluid">
    	<div class="row">
    		<div class="col-md-10 col-md-offset-1">
    			<?php echo isset($detail)?$detail:''; ?>
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