<!doctype html>
<meta charset='utf-8'>
<title>Tiem converter</title>
<?php

function mk_input($name, $value=null) {
	$x =& $_POST[$name];
	if (isset($x)):
		$value = $x;
	endif;
	$ret = "$name: <input name='$name'";
	$ret.= " style='width: 7em;'";
	if (isset($value)):
		$value = htmlspecialchars($value);
		$ret.= " value='$value'";
	endif;
	$ret.= '>';
	return $ret;
}

$now = getdate();

if (isset($_POST['y'])):
	extract($_POST,EXTR_PREFIX_ALL,'p');
	$ts = mktime($p_h,$p_hm,$p_hs,$p_m,$p_d,$p_y);
	echo "<p>Timestamp: $ts ($p_y-$p_m-$p_d $p_h:$p_hm:$p_hs)</p>";
	$ts = mktime(0,0,0,$p_m,$p_d,$p_y);
	echo "<p>Timestamp: $ts ($p_y-$p_m-$p_d)</p>";
	$date = date('Y-m-d H:i:s',$p_t);
	echo "<p>Date $date ($p_t)<p>";
endif;

?>
<form action='./time_converter.php' method='post'>
<div>
  <?php echo mk_input('y',$now['year']); ?>
  <?php echo mk_input('m',$now['mon']); ?>
  <?php echo mk_input('d',$now['mday']); ?>
  <?php echo mk_input('h',$now['hours']); ?>
  <?php echo mk_input('hm',$now['minutes']); ?>
  <?php echo mk_input('hs',$now['seconds']); ?>
  <?php echo mk_input('t',$now[0]); ?>
  <input type='submit'>
</div>
</form>
