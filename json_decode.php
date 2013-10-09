<!doctype html>
<meta charset='utf-8'>
<title>JSON decode</title>
<?php
$x = @$_POST['json'];
if ($x):
	$j = json_decode($x,true);
else:
	$j = array();
endif;

function print_nice_elm($a,$d=0) {
	is_array($a);
	foreach ($a as $k=>$v):
		echo str_repeat('--',$d), ' ', $k, ': ';
		if (is_array($v)):
			echo 'Array';
			print_nice_elm($v,$d+1);
		else:
			echo htmlspecialchars($v), "<br>\n";
		endif;
	endforeach;
}
?>

<?php if ($j): ?>
<pre>
<?php print_nice_elm($j); ?>
</pre>
<br><br>
<?php endif; ?>

<form action='./json_decode.php' method='post'>
<div>
  <textarea name='json'></textarea>
  <input type='submit'>
</div>
</form>
