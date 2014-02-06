<!doctype html>
<meta charset='utf-8'>
<title>Hex2Utf8</title>
<?php

$x = @$_POST['hex'];
$x = hexdec($x);

$r = array();
if ($x <= pow(2,7)):
	$r[0] = $x;
elseif ($x < pow(2,12)):
	$r[0] = 0xC0 | ($x >> 6);
	$r[1] = 0x80 | $x & 0x3f;
elseif ($x < pow(2,17)):
	$r[0] = 0xE0 | ($x >> 12);
	$r[1] = 0x80 | ($x >> 6) & 0x3f;
	$r[2] = 0x80 | $x & 0x3f;
else:
	$r[0] = 0xF0 | ($x >> 18);
	$r[1] = 0x80 | ($x >> 12) & 0x3f;
	$r[2] = 0x80 | ($x >> 6)  & 0x3f;
	$r[3] = 0x80 | $x & 0x3f;
endif;

$d = array_map('chr',$r);
$d = htmlspecialchars(implode($d));

?>

<?php if($x): ?>
<pre>
<?php echo "Dec: $x\n"; ?>
<?php echo "Char: $d\n"; ?>
</pre>
<?php endif; ?>

<form action='./hex2utf8.php' method='post'>
<div>
  <input name='hex'>
  <input type='submit'>
</div>
</form>
