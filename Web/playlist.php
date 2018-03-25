<?php
session_start();
?>
<?php
$link=mysqli_connect("localhost","yoni","yoniphp1")or die("la connexion n'est pas passé");
mysqli_select_db($link, "kcprojet")or die("la selection n'est pas passé");

$sql="SELECT adherent_id, adherent_nom FROM `adherent`";
$req=mysqli_query($link,$sql);
	
?>
	<form name="adherent" method="post" action="playlist.php">
		<label for="adherent">Adhérent : </label>
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
			<input type="submit" value="Consulter" />
	</form>
	

<?php

if(isset($_POST['adherent'])){
	$_SESSION['adherent']=$_POST['adherent'];
	?>
<table width="450" height="120" border="1">
	<tr>
		<td align="center">Playlist</td>
		<td align="center">Nom</td>
		<td align="center">Nombre d'exercices</td>
	</tr>
	
<?php
$id = $_POST['adherent'];
$sql = "SELECT `playlist_id`,`playlist_nom` FROM `playlist` WHERE `adherent_id`= $id";
$req=mysqli_query($link,$sql);
while ($data=mysqli_fetch_assoc($req))
{
?>
	<tr>
		<td align="center"><?php echo $data['playlist_id'] ?></td>
		<td align="center"><?php echo $data['playlist_nom'] ?></td>
		<td align="center"></td>
		<td align="center">Voir</td>
		<td align="center">Modifier</td>
		<td align="center" >Supprimer</td>
		
	</tr>
<?php
}
}
?>
</table>


	</br></br>Ajouter une playlist : </br></br><br>
<form name="nomPlay"  method="post" action="playlist.php">
	<label for="pass">intitulé :</label>
	<input type="text" name="nom" id="nom" value=""/>
	<input type="submit" value="Créer la playlist" /></br>
</form>	
	<form name="ajoutEx"  method="post" action="ajoutPlaylist.php">
		<label for="pass">Exercice </label>
		<input name="AjoutExercice" type="submit" value="+" /></br>
	</form>
	
	<?php	
	if(isset($_POST['nom'])){
		echo $_SESSION['adherent'];
		$id = $_SESSION['adherent'];
		$nom= $_POST['nom'];
		echo $nom;
		$sql="INSERT INTO `playlist` (`playlist_id`, `playlist_nom`, `exercice_id`, `adherent_id`) 
		VALUES (NULL, '$nom', '', '$id')";
		$req=mysqli_query($link,$sql);
		$last_id = mysqli_insert_id($link);
		echo "<br/>Last Id = ".$last_id;
		$_SESSION['last_idP']=$last_id;
		
		$sqlPlaylist="SELECT `playlist_id` FROM `adherent` WHERE `adherent_id` = $id";
		$reqPlaylist = mysqli_query($link,$sqlPlaylist);
		$dataPlaylist=mysqli_fetch_assoc($reqPlaylist);
		echo $dataPlaylist['playlist_id'];
		$dataPlaylist['playlist_id'] = $dataPlaylist['playlist_id'] . "/" . $last_id;
		echo $dataPlaylist['playlist_id'];
		$playlist_id = $dataPlaylist['playlist_id'];	
		$sqlPlaylist="UPDATE `adherent` SET `playlist_id` = '$playlist_id' WHERE `adherent_id` = $id";
		$reqPlaylist = mysqli_query($link,$sqlPlaylist);
	}	
?>
		