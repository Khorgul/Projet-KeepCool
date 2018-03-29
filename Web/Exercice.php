<?php
session_start();
?>



<?php
	$link=mysqli_connect("localhost","yoni","yoniphp1")or die("la connexion n'est pas passé");
	mysqli_select_db($link, "kcprojet")or die("la selection n'est pas passé");
	$sql="SELECT * FROM adherent;";
	$req=mysqli_query($link,$sql);
	
	$sqlG="SELECT gm_id, gm_nom FROM `groupe_musculaire` ORDER BY gm_nom";
	$reqG=mysqli_query($link,$sqlG);
?>
	
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
		<link rel="stylesheet" href="style.css" />
        <title>KeepCool</title>
    </head>
	


    <body style ="margin-top : 0%; text-align: center; font-size : 18px;">
	
    <header>
		<?php
			include("menu.html");
		?>
	</header>

	Création d'un exercice :</p>
		
    <form method="post" action="creerExercice.php" onsubmit="return verifForm(this)">
	
   <p>
       
       <label for="pass">Nom</label><br />
	   <input type="text" name="nomEx" id="nomEx" value="" onblur="verifNom(this)" />
	   <br /><br /><br />
	   <label for="pass">Associer au groupe musculaire </label><br /><br />
       <select name ="groupe" id="groupe">
				<?php
				while ($data=mysqli_fetch_assoc($reqG)){
				?>
					<option name ="groupe" value="<?php echo $data['gm_id']?>"><?php echo $data['gm_nom']?></option>
				<?php
				}
				?>
			</select>

   </p>
   <input type="submit" name="ajout" value="Créer">
</form>
</br>
	<?php
	if(isset($_SESSION['a']))
		echo "Exercice créée avec succès";
	?>
		
		

		
    </body>
</html>
<?php
session_destroy();
?>
