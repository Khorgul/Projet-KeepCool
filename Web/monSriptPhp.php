<?php

$a = $_POST['id_marque'];
$link=mysqli_connect("localhost","yoni","yoniphp1")or die("la connexion n'est pas passé");
mysqli_select_db($link, "kcprojet")or die("la selection n'est pas passé");
	
$req = "SELECT exercice_id, exercice_nom FROM exercice WHERE gm_id = '$a' ;";
$resultat = mysqli_query($link, $req);
?>
<select name='modele'>
<option value='0'>Choix du modèle</option>
 <?php
while ($modele = mysqli_fetch_array($resultat))
{
    ?>
	<option value="<?php echo $modele['exercice_id'] ?>"><?php echo $modele['exercice_nom']?></option>
<?php
	} 
?>
</select>
 
