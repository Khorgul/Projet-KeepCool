<?php
session_start();
?>
<?php
$link=mysqli_connect("localhost","yoni","yoniphp1")or die("la connexion n'est pas passé");
mysqli_select_db($link, "kcprojet")or die("la selection n'est pas passé");
$sql="SELECT gm_id, gm_nom FROM `groupe_musculaire`";
$req=mysqli_query($link,$sql);
?>
<p>Ajouter un exercice</p> 
<table border ="1">
		<tr>
			<td align="center">
				<label for="groupe">Groupe musculaire </label></br>
			</td>
			<td>
			</td>
			<td align="center">
				Exercice
			</td>
			<td align="center">
				Nombre de série
			</td>
			<td align="center">
				
			</td>
			
		</tr>
		<tr>
			<td align="center">
	<form name="groupe" method="post" action="ajoutPlaylist.php">
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
			</td>
			<td align="center">
				<input type="submit" value="->" />
	</form>
	
			</td>
			<td>
			<?php
	if(isset($_POST['groupe'])){
		$groupe = $_POST['groupe'];
		$_SESSION['groupe'] = $_POST['groupe'];
	
	
	?>
			<form name="exercice" method="post" action="ajoutPlaylist2.php">
				<?php
				
				
				$sql="SELECT listeexercice_id, listeexercice_nom FROM `listeexercice` WHERE listeexercice_gm = '$groupe'";
				$req=mysqli_query($link,$sql);
				?>
				
				<select name ="exercice" id="exercice">
				<?php
				while ($data2=mysqli_fetch_assoc($req)){
				?>
				<option name ="exercice" value="<?php echo $data2['listeexercice_id']?>"><?php echo $data2['listeexercice_nom']?></option>
				<?php
	}}
				?>
				</select>				
			</td>
			
			<td align="center">
				<input type="number" name="serie" min=1 /><br />
			</td>
			<td align="center">
				<input type="submit" value="->" />
			</form>
			<?php
				if(isset($_POST['exercice'])){
					$_SESSION['exercice'] = $_POST['exercice'];
					
				}
				if(isset($_POST['serie'])){
					$_SESSION['serie'] = $_POST['serie'];
				}
				?>
			</td>
		</tr>
	</table>	
	
	<?php
if (isset($_POST['rep1'])) {
			$exercice = $_SESSION['exercice'];
			$serie =  $_SESSION['serie'];//echo $serie;
			$id = $_SESSION['last_idP'];
			$sqlExercice = "INSERT INTO `exercice` (`exercice_id`,`listeexercice_id`,`playlist_id`)
			VALUES (NULL,$exercice, $id);";
			$reqEx=mysqli_query($link,$sqlExercice);
			$last_id = mysqli_insert_id($link);
			//echo "<br/>Last Id = ".$last_id;
			for ($i=1; $i<=$serie;$i++) {
			$seri = $_POST['rep'.$i];
			$poids = $_POST['poids'.$i];
			$sql = "INSERT INTO `serie` (`serie_id`,`serie_poids`,`serie_nb`,`serie_rang`, `exercice_id`)
			VALUES (NULL, $seri, $poids, $i, $last_id);";
			$req=mysqli_query($link,$sql);
		
		}
			$sqlPlaylist="SELECT `exercice_id` FROM `playlist` WHERE `playlist_id` = $id";
			$reqPlaylist = mysqli_query($link,$sqlPlaylist);
			$dataPlaylist=mysqli_fetch_assoc($reqPlaylist);
			//echo $dataPlaylist['exercice_id'];
			$dataPlaylist['exercice_id'] = $dataPlaylist['exercice_id'] . "/" . $last_id;
			//echo $dataPlaylist['exercice_id'];
			$exercice_id = $dataPlaylist['exercice_id'];
			$id = $_SESSION['last_idP'];			
			$sqlPlaylist="UPDATE `playlist` SET `exercice_id` = '$exercice_id' WHERE `playlist_id` = $id";
			$reqPlaylist = mysqli_query($link,$sqlPlaylist);
		}

?>
	<a href="playlist.php">Sortie</a>
