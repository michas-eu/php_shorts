<!doctype html>
<meta charset='utf-8'>
<title>Base64 Decode</title>
<?php

$x = @$_POST['base64'];
$x = base64_decode($x);

?>

<?php if($x): ?>
<pre>
<?php echo htmlspecialchars($x, ENT_QUOTES|ENT_HTML5, 'ISO-8859-1'); ?>
</pre>
<?php endif; ?>

<form action='./base64_decode.php' method='post'>
<div>
  <textarea name='base64'></textarea>
  <input type='submit'>
</div>
</form>
