<?php
session_start();
?>
<?php	

$link=mysqli_connect("localhost","yoni","yoniphp1")or die("la connexion n'est pas passé");
mysqli_select_db($link, "kcprojet")or die("la selection n'est pas passé");

	if(isset($_POST['nom'])){
		$nom= $_POST['nom'];
		echo "Playlist ' $nom ' créée";
		//echo $_SESSION['adherent'];
		$id = $_SESSION['adherent'];
		
		//echo $nom;
		$sql="INSERT INTO `playlist` (`playlist_id`, `playlist_nom`, `exercice_id`, `adherent_id`) 
		VALUES (NULL, '$nom', '', '$id')";
		$req=mysqli_query($link,$sql);
		$last_id = mysqli_insert_id($link);
		//echo "<br/>Last Id = ".$last_id;
		$_SESSION['last_idP']=$last_id;
		
		$sqlPlaylist="SELECT `playlist_id` FROM `adherent` WHERE `adherent_id` = $id";
		$reqPlaylist = mysqli_query($link,$sqlPlaylist);
		$dataPlaylist=mysqli_fetch_assoc($reqPlaylist);
		//echo $dataPlaylist['playlist_id'];
		$dataPlaylist['playlist_id'] = $dataPlaylist['playlist_id'] . "/" . $last_id;
		//echo $dataPlaylist['playlist_id'];
		$playlist_id = $dataPlaylist['playlist_id'];	
		$sqlPlaylist="UPDATE `adherent` SET `playlist_id` = '$playlist_id' WHERE `adherent_id` = $id";
		$reqPlaylist = mysqli_query($link,$sqlPlaylist);
	}	
?>

<form name="ajoutEx"  method="post" action="ajoutPlaylist.php">
		<label for="pass">Exercice </label>
		<input name="AjoutExercice" type="submit" value="+" /></br>
	</form>
		