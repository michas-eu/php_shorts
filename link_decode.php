<!doctype html>
<meta charset='utf-8'>
<title>Link decode</title>
<?php
$x = @$_POST['link'];
if ($x):
	$parts = parse_url($x);
	$q = @$parts['query'];
	if ($q):
		unset($parts['query']);
		parse_str($q,$qa);
		$qp = '<br><br>'.htmlspecialchars(urldecode($q));
	else:
		$qa = array();
		$qp = false;
	endif;
endif;
?>

<?php if ($x): ?>
<?= $x; ?>
<?= $qp; ?>
<br><br>
<table border>
<?php foreach ($parts as $k => $v): ?>
  <tr><th><?= $k ?></th><td><?= $v ?></td></tr>
<?php endforeach; ?>
  <tr><td colspan='2'> ### </td></tr>
<?php foreach ($qa as $k => $v): ?>
  <tr>
    <th><?= $k ?></th>
    <td>
      <?php
if (is_array($v)):
	echo '<pre>';
	print_r($v);
	echo '</pre>';
else:
	echo $v;
endif;
      ?>
    </td>
  </tr>
<?php endforeach; ?>
</table>
<br><br>
<?php endif; ?>

<form action='./link_decode.php' method='post'>
<div>
  <textarea name='link'></textarea>
  <input type='submit'>
</div>
</form>
