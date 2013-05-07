<!doctype html>
<meta charset='utf-8'>
<title>Link decode</title>
<?php
$x = @$_POST['link'];
if ($x):
?>
	<pre>
<?php
	$parts = parse_url($x);
	$q = @$parts['query'];
	if ($q):
		unset($parts['query']);
		var_dump($parts);
		parse_str($q,$qa);
		var_dump($qa);
	else:
		var_dump($parts);
	endif;
?>
	</pre>
<?php
endif;
?>
<form action='./link_decode.php' method='post'>
<div>
  <textarea name='link'></textarea>
  <input type='submit'>
</div>
</form>
