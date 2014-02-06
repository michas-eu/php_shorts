<!doctype html>
<meta charset='utf-8'>
<title>JSON decode</title>
<?php
$x = @$_POST['json'];
if ($x):
	$j = json_decode($x,true);
else:
	$j = null;
endif;

function print_nice_elm($a,$d=0) {
	if (is_array($a)):
		echo "Array\n";
		foreach ($a as $k=>$v):
			echo str_repeat('--',$d), ' ', $k, ': ';
			print_nice_elm($v,$d+1);
		endforeach;
	else:
		echo htmlspecialchars($a), "\n";
	endif;
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
