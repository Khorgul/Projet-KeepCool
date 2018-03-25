<?php
session_start();
?>

<?php
	$link=mysqli_connect("localhost","yoni","yoniphp1")or die("la connexion n'est pas passé");
	mysqli_select_db($link, "kcprojet")or die("la selection n'est pas passé");
	?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
		<link rel="stylesheet" href="style.css" />
        <title>KeepCool</title>
    </head>

    <body>
    <header>
	</header>
</br></br></br></br></br></br></br></br></br></br>
	<?php
		$sql="SELECT adherent_id, adherent_nom FROM `adherent`";
		$req=mysqli_query($link,$sql);
	
	if(!isset($_POST['adherent'])){?>
	<form name="adherent" method="post" action="adherent.php">
	<label for="adherent">Créer une playlist pour :</label>
		<select name ="adherent" id="adherent">
			<option name ="adherent" value=""></option>
			<?php
			while ($data=mysqli_fetch_assoc($req)){
			?>
				<option name ="adherent" value="<?php echo $data['adherent_id']?>">Id : <?php echo $data['adherent_id']?> Nom : <?php echo $data['adherent_nom']?></option>
			<?php
			}
			?>
			
		</select>
		 <label for="pass">intitulé :</label>
       <input type="text" name="nom" id="nom" value=""/>
		<input type="submit" value="Ajouter playlist" />
	</form>
	<?php
	}
	?>
	
	
	
	<?php
	if(isset($_POST['adherent'])){
		$nom= $_POST['nom'];
		$id = $_POST['adherent'];
		$sql="INSERT INTO `playlist` (`playlist_id`, `playlist_nom`, `exercice_id`, `adherent_id`) 
		VALUES (NULL, '$nom', '', '$id')";
		$req=mysqli_query($link,$sql);

	
		$sql="SELECT gm_id, gm_nom FROM `groupe_musculaire`";
		$req=mysqli_query($link,$sql);
	?>
	<form name="groupe" method="post" action="adherent.php">
	<label for="groupe">Groupe musculaire :</label>
		<select name ="groupe" id="groupe">
			<option name ="groupe" value=""></option>
			<?php
			while ($data=mysqli_fetch_assoc($req)){
			?>
				<option name ="groupe" value="<?php echo $data['gm_id']?>"><?php echo $data['gm_nom']?></option>
			<?php
			}
			?>
		</select>
		<p><input type="submit" value="Voir les exercices" /></p>
	</form>
	<?php
	}
	?>
	
	
	
	<form name="exercice" method="post" action="adherent.php">
		<?php
		if(isset($_POST['groupe'])){
			$groupe = $_POST['groupe'];
			$sql="SELECT listeexercice_id, listeexercice_nom FROM `listeexercice` WHERE listeexercice_gm = '$groupe'";
			$req=mysqli_query($link,$sql);
		?>
		<label for="groupe">Exercice :</label>
		<select name ="exercice" id="exercice">
		<?php
		while ($data2=mysqli_fetch_assoc($req)){
		?>
           <option name ="exercice" value="<?php echo $data2['listeexercice_id']?>"><?php echo $data2['listeexercice_nom']?></option>
		<?php
		}
		?>
		</select>
		<p><input type="submit" value="Ajouter" /></p>
		<?php
		}
		?>
		
	</form>
	
	<?php
		if(isset($_POST['exercice'])){
			$exercice = $_POST['exercice'];
			$sql ="INSERT INTO `exercice` (`exercice_id`, `listeexercice_id`, `playlist_id`) 
			VALUES (NULL, '$exercice', '1')";
			$req =mysqli_query($link,$sql);
			$sql="SELECT listeexercice_id, listeexercice_nom FROM `listeexercice` WHERE listeexercice_id = '$exercice'";
			$req=mysqli_query($link,$sql);
			$data2=mysqli_fetch_assoc($req);
			echo $data2['listeexercice_nom'] . " : ";
		
			?>
			
			<form method="post" action="adherent.php">
				<label for="pseudo">Nombre de série</label>
				<input type="number" name="serie" min=1 /><br />
				<br />
			<input type="submit" value="Ajouter Serie">
			<?php
		}
			?>
			</form>
			
			
			<?php
			if(isset($_POST['serie'])){
				?>
				<form method="post" action="adherent.php">
				<table width="400" height="166" >
			<tr>
				<td align="center"></td>
				<td align="center">Nb Répétitions</td>
				<td align="center">Poids (kg)</td>
			</tr>
			<?php
				$serie = $_POST['serie'];
				$_SESSION['serie'] = $_POST['serie'];
				for ($i=1; $i<=$serie;$i++) 
				{
					echo "<tr><td align='center'>Série $i </td>";?>
					<td align="center"><input type="number" name="rep<?php echo $i;?>"/></td>
					<td align="center"><input type="number" name="poids<?php echo $i;?>" /></td>
				   </tr>
					<?php
				}
			?>
		<?php
		echo"</table>
		<input type='submit' value='Ajouter Exercice'>
		</form>";
		}
		?>
		
		<?php
		
		if (isset($_POST['rep1'])) {
			$serie =  $_SESSION['serie'];echo $serie;
			for ($i=1; $i<=$serie;$i++) {
			$seri = $_POST['rep'.$i];
			$poids = $_POST['poids'.$i];
			$sql = "INSERT INTO `serie` (`serie_id`,`serie_poids`,`serie_nb`,`serie_rang`, `exercice_id`)
			VALUES (NULL, $seri, $poids, $i, 1);";
			$req=mysqli_query($link,$sql);
		}
		}
		?>
		
	
	
	
    </body>
</html>