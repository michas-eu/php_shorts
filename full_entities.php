<!doctype html>
<meta charset='utf-8'>
<title>Make full entities</title>
<?php

function to_entity($x) {
	$x = "&#$x;";
	return $x;
}

function utf8_want($x) {
	if ($x < 0x80):
		return 0;
	elseif ($x < 0xC0):
		return -1;
	elseif ($x < 0xE0):
		return 1;
	elseif ($x < 0xF0):
		return 2;
	else:
		return 3;
	endif;
}

function utf8_group($x) {
	$ret = array();
	$toget = 0;
	$tmp = 0;
	foreach ($x as $e):
		$w = utf8_want($e);
		if ($w == 0):
			$tmp = $e;
			$toget = 0;
		elseif ($w == 1):
			$tmp = 0x1F & $e;
			$toget = 1;
		elseif ($w == 2):
			$tmp = 0x0F & $e;
			$toget = 2;
		elseif ($w == 3):
			$tmp = 0x07 & $e;
			$toget = 3;
		else:
			$tmp = $tmp << 6;
			$tmp+= 0x3F & $e;
			$toget--;
		endif;
		if (!$toget):
			$ret[] = $tmp;
			$tmp = 0;
		endif;
	endforeach;
	return $ret;
}

$x = @$_POST['input'];
if ($x):
	$x = str_split($x);
	$x = array_map('ord',$x);
	$x = utf8_group($x);	
	$x = array_map('to_entity',$x);	
	$x = join($x,'');
endif;

?>

<?php if($x): ?>
<pre>
<?php echo htmlspecialchars($x); ?>


<?php echo $x; ?>
</pre>
<?php endif; ?>

<form action='./full_entities.php' method='post'>
<div>
  <textarea name='input'></textarea>
  <input type='submit'>
</div>
</form>
