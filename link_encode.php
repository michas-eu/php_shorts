<!doctype html>
<meta charset='utf-8'>
<title>Link encode</title>
<?php
$x = @$_POST['link'];
if ($x):
	$x = htmlspecialchars(urlencode($x));
endif;
?>

<?php if ($x): ?>
http://www.podyplomie.pl/redirect.php?r=<?= $x; ?>
<?php endif; ?>

<form action='./link_encode.php' method='post'>
<div>
  <textarea name='link'></textarea>
  <input type='submit'>
</div>
</form>
