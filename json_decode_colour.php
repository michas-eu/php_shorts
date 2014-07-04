<!doctype html>
<meta charset='utf-8'>
<title>JSON decode</title>

<style>
html {
	background-color: silver;
	font-family: monospace;
	color: black;
}

.gray {
	color: gray;
}

.txt {
	color: green;
}

.float {
	color: navy;
}

.int {
	color: brown;
}
</style>

<?php
$x = @$_POST['json'];
if ($x):
	$j = json_decode($x,true);
else:
	$j = null;
endif;

function get_colour($e) {
	if (is_string($e)):
		return 'txt';
	elseif (is_int($e)):
		return 'int';
	elseif (is_float($e)):
		return 'float';
	endif;
	return false;
}

function print_nice_elm($a,$d=0) {
	if (is_array($a)):
		if (!$a):
			echo "<span class='gray'>Array</span><br>\n";
			echo "<span class='gray'>", str_repeat('--',$d+1), "(empty) </span><br>\n";
			return;
		endif;
		echo "<span class='gray'>Array</span><br>\n";
		foreach ($a as $k=>$v):
			$k = htmlspecialchars($k);
			echo "<span class='gray'>", str_repeat('--',$d+1), "</span> $k: ";
			print_nice_elm($v,$d+1);
		endforeach;
	else:
		$c = get_colour($a);
		if ($a === ''):
			$a = '(empty string)';
			$c = 'gray';
		endif;
		echo "<span class='$c'>", htmlspecialchars($a), "</span><br>\n";
	endif;
}
?>

<?php if ($j): ?>
<?php print_nice_elm($j); ?>
<br><br>
<?php endif; ?>

<form action='./json_decode_colour.php' method='post'>
<div>
  <textarea name='json'></textarea>
  <input type='submit'>
</div>
</form>
