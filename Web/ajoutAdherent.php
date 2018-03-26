<?php 

$link=mysqli_connect("localhost","yoni","yoniphp1")or die("la connexion n'est pas passé");
	mysqli_select_db($link, "kcprojet")or die("la selection n'est pas passé");
	
if(isset($_POST['nom'])){
	
		$nom = $_POST['nom'] ;
		$prenom = $_POST['prenom'] ;
		$sexe = $_POST['sexe'];
		$insert = "INSERT INTO `adherent` (`adherent_id`, `adherent_cle`, `adherent_nom`, `adherent_prenom`, `adherent_sexe`, `playlist_id`) 
		VALUES (NULL, '', '$nom', '$prenom', '$sexe', '')";
		mysqli_query($link,$insert);
	}
	
	
	
	
	header('Location: ../KeepCool/adherent.php'); 
?>