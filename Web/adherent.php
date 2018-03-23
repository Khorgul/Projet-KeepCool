<?php
session_start();
?>

<?php
	$link=mysqli_connect("localhost","yoni","yoniphp1")or die("la connexion n'est pas passé");
	mysqli_select_db($link, "kcprojet")or die("la selection n'est pas passé");
	?>
<!DOCTYPE html>
<html><a href="Exercice.html">Gestion de l'application</a>
    <head>
        <meta charset="utf-8" />
		<link rel="stylesheet" href="style.css" />
        <title>KeepCool</title>
    </head>

    <body>
    <header>
	<a href="adherent.html">Adhérent</a>
	<a href="machine.html">Machine</a>
	<a href="Exercice.html">Gestion de l'application</a>
	</header>
	</br>
	</br>
	</br>
	 
	<?php
		$sql="SELECT gm_id, gm_nom FROM `groupe_musculaire`";
		$req=mysqli_query($link,$sql);
	?>
	<form name="groupe" method="post" action="adherent.php">
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
	
	<form name="exercice" method="post" action="adherent.php">
		<?php
		if(isset($_POST['groupe'])){
			$groupe = $_POST['groupe'];
			$sql="SELECT listeexercice_id, listeexercice_nom FROM `listeexercice` WHERE listeexercice_gm = '$groupe'";
			$req=mysqli_query($link,$sql);
		?>
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
			$sql="SELECT exercice_id, exercice_nom FROM `exercice` WHERE exercice_id = '$exercice'";
			$req=mysqli_query($link,$sql);
			$data2=mysqli_fetch_assoc($req);
			echo $data2['exercice_nom'] . " : ";
		
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
		$serie =  $_SESSION['serie'];
		for ($i=1; $i<=$serie;$i++) 
		{
		if (isset($_POST['rep'.$i])) {
		
		
		
			echo $_POST['rep'.$i];
			$_POST['poids'.$i]
			"INSERT INTO exercice () VALUES "
	
		}}
		
		?>
		
	
	
	
    </body>
</html>