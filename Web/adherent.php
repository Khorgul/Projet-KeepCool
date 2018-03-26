<?php
session_start();
?>

<?php
	$link=mysqli_connect("localhost","yoni","yoniphp1")or die("la connexion n'est pas passé");
	mysqli_select_db($link, "kcprojet")or die("la selection n'est pas passé");
	$sql="SELECT * FROM adherent;";
	$req=mysqli_query($link,$sql);
	
	
	
	
	?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
		<link rel="stylesheet" href="style.css" />
        <title>KeepCool</title>
    </head>

    <body style ="margin-top : 10%; text-align: center; font-size : 18px;">
    <header>
	</header>

	Ajout d'un nouvel adhérent :</p>
		
    <form method="post" action="ajoutAdherent.php" onsubmit="return verifForm(this)">
	
   <p>
       
       <label for="pass">Nom</label><br />
	   <input type="text" name="nom" id="nom" value="" onblur="verifNom(this)" />
	   <br />
	   <label for="pass">Prénom</label><br />
       <input type="text" name="prenom" id="nom" value="" onblur="verifNom(this)" />
	   <br />
	   <label for="pseudo">Sexe (H ou F)</label><br />
       <input type="text" name="sexe" id="sexe" value="" onblur="verifSexe(this)" />
       
	  
	
   </p>
   <input type="submit" name="ajout" value="Ajouter" onclick="if(!confirm('Etes-vous sur de vouloir ajouter cet enregistrement ?')) return false;">
</form>


	
	<p>Liste des adhérents</p>
	<table style="margin:auto;" border ="1" height="100" width="400">
		<tr>
			<td style="font-weight: bold;" align="center">Nom</td>
			<td style="font-weight: bold;" align="center">Prénom</td>
			<td style="font-weight: bold;" align="center">Sexe</td>
		</tr>
		<?php 
		while ($data=mysqli_fetch_assoc($req))  {
		?>
		<tr>
			<td align="center"><?php echo $data['adherent_nom'];?></td>
			<td align="center"><?php echo $data['adherent_prenom'];?></td>
			<td align="center"><?php echo $data['adherent_sexe'];?></td>
			<td align="center"><form action='modifPlaylist.php' method='post'><input type="hidden" type='submit' name="modif" value="<?php echo $data['playlist_id']; ?>"><input type="image" src="../KeepCool/image/modifier.jpg"></form>
			<td align="center"><form action='supprimer.php' method='post'><input type="hidden" type='submit' name="visu" value="<?php echo $data['playlist_id']; ?>"><input type="image" src="../KeepCool/image/supprimer.jpg"></form>
			</tr>
	<?php
		}
		?>
		</table>
		
		

		
    </body>
</html>

