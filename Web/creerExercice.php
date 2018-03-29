<?php
session_start();
?>
<?php 

$link=mysqli_connect("localhost","yoni","yoniphp1")or die("la connexion n'est pas passé");
	 mysqli_select_db($link, "kcprojet")or die("la selection n'est pas passé");
	
if(isset($_POST['nomEx'])){
	
		$nom = $_POST['nomEx'] ;
		$groupe = $_POST['groupe'] ;
		$insert = "INSERT INTO `listeexercice` (`listeexercice_id`, `listeexercice_nom`, `listeexercice_gm`) 
		VALUES (NULL,'$nom','$groupe')";
		mysqli_query($link,$insert);
	}
	
	$_SESSION['a'] = "message";
	

	header('Location: ../KeepCool/Exercice.php'); 
?>