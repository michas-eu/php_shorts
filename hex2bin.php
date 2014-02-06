<!doctype html>
<meta charset='utf-8'>
<title>Hex2Bin</title>
<?php

$x = @$_POST['hex'];
$x = pack('H*',$x);

?>

<?php if($x): ?>
<pre>
<?php echo htmlspecialchars($x); ?>
</pre>
<?php endif; ?>

<form action='./hex2bin.php' method='post'>
<div>
  <textarea name='hex'></textarea>
  <input type='submit'>
</div>
</form>
