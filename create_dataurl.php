<!doctype html>
<meta charset='utf-8'>
<title>Base64 Decode</title>
<style type='text/css'>

html{
	width: 100%;
	height: 100%;
}

body{
	width: 100%;
	height: 100%;
}

.box-limited {
	overflow: scroll;
	max-width: 75%;
	max-height: 75%;
}

</style>
<?php

function decode_file($name) {
	$c   = file_get_contents($name);
	$b64 = base64_encode($c);
	$tmp = getimagesizefromstring($c);
	$ret = "data:{$tmp['mime']};base64,$b64";
	return $ret;
}

$x = @$_FILES['file']['tmp_name'];
if (is_uploaded_file($x)):
	$x = decode_file($x);
endif;
?>

<?php if($x): ?>
<textarea><?=$x?></textarea>
<div class='box-limited'>
<img src="<?=$x?>">
</div>
<?php endif; ?>

<form enctype="multipart/form-data" action='./create_dataurl.php' method='post'>
<div>
  <input type='file' name='file'>
  <input type='submit'>
</div>
</form>
