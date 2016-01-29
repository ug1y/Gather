<?php
$elem = '';
foreach ($pros as $key => $value) {
	$x = $value['isneed']==1?'<span style="color:red">*</span>':'';
	$elem = $elem.'<div class="form-group">
	<label for='.$value['label'].' class="col-sm-2 control-label">'.$x.$value['name'].'</label>
	<div class="col-sm-8">
	<input type='.$value['type'].' class="form-control" id='.$value['label'].' name='.$value['label'].' placeholder="">
	</div>
	</div>';
}

$detail = '
<div class="col-xs-12">
<a class="btn btn-default" href='.dirname($_SERVER['PHP_SELF'])."/users/getlist".' role="button">&lt;&lt;返回</a>
<div style="margin-top:5px" class="panel panel-primary">
<div class="panel-heading">
<h3 class="panel-title">'.$act['title'].'</h3>
</div>
<div class="panel-body">
'.$act['description'].'
<hr>
</div>
<form class="form-horizontal" action='.dirname($_SERVER['PHP_SELF']).'/users/addform method="post">
<input type="hidden" name="actID" value='.$act['actID'].' />
'.$elem.'
'.(
	$elem==''?'
	<!--<div class="col-sm-offset-2 col-sm-8">啥也没有~</div>-->
	':'
	<div class="form-group">
	<div class="col-sm-offset-2 col-sm-8">
	<button type="submit" class="btn btn-primary">提交</button>
	</div>
	</div>
	'
	).'
</form>
</div>
</div>

';

require 'Layout-users.php';
?>