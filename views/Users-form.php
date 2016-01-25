<?php
$elem = '';
foreach ($pros as $key => $value) {
	$x = $value['isneed']==1?'*':'';
	$elem = $elem.'<div class="form-group">
	<label for='.$value['label'].' class="col-sm-2 control-label">'.$value['name'].$x.'</label>
	<div class="col-sm-8">
	<input type='.$value['type'].' class="form-control" id='.$value['label'].' name='.$value['label'].' placeholder="">
	</div>
	</div>';
}

$detail = '
<a class="btn btn-default" href='.dirname($_SERVER['PHP_SELF'])."/users/getlist".' role="button">&lt;&lt;返回</a>
<div style="margin-top:5px" class="panel panel-primary">
<div class="panel-heading">
<h3 class="panel-title">'.$act['title'].'</h3>
</div>
<div class="panel-body">
<form class="form-horizontal" action='.dirname($_SERVER['PHP_SELF']).'/users/addform method="post">
<input type="hidden" name="actID" value='.$act['actID'].' />
'.$elem.'
<div class="form-group">
<div class="col-sm-offset-2 col-sm-8">
<button type="submit" class="btn btn-default">Submit</button>
</div>
</div>
</form>
</div>
</div>
';

require 'Layout-users.php';
?>