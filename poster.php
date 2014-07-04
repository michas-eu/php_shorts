<!doctype html>
<meta charset='utf-8'>
<title>Poster</title>
<script type='application/javascript'>
document.addEventListener('DOMContentLoaded',function(){
	var elm = document.getElementById('actioner');
	var frm = document.getElementById('kicker');
	elm.addEventListener('change',function(){
		frm.action = elm.value;
		alert(frm.action);
	},false);
});
</script>
<h1>Poster</h1>
<form action='http://example.com' method='post' id='kicker'>
<input id='actioner'><br>
<input type='submit'>
</form>
