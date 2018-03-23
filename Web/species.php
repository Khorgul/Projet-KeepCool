<?php
header('Content-type: text/html; charset=iso-8859-1');

$link=mysqli_connect("localhost","yoni","yoniphp1")or die("la connexion n'est pas passé");
	mysqli_select_db($link, "kcprojet")or die("la selection n'est pas passé");
	
	
	$sql="SELECT gm_id, gm_nom FROM `groupe_musculaire`";
	$req=mysqli_query($link,$sql);



echo 'var o = null;';
echo 'var s = document.forms["'.$_POST["form"].'"].elements["'.$_POST["select"].'"];';
echo 's.options.length = 0;';
while($r = mysqli_fetch_array($req))
	echo 's.options[s.options.length] = new Option("'.$r["Species"].'");';

mysqli_close($mysql_db);

?>