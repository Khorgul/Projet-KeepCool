<?php
session_start();
?>
<?php 

$link=mysqli_connect("localhost","yoni","yoniphp1")or die("la connexion n'est pas passé");
	mysqli_select_db($link, "kcprojet")or die("la selection n'est pas passé");
	
if(isset($_POST['supp'])){
		
		$id = $_POST['supp'] ;
		$select="SELECT * FROM `playlist` WHERE `playlist_id`=$id";
		$req=mysqli_query($link,$select);
		$data=mysqli_fetch_assoc($req);
		$exId = $data['exercice_id'];//echo $exId;echo"<br>";
		$adId = $data['adherent_id'];//echo $adId;echo"<br>";
		
		$selectadh = "SELECT `playlist_id` FROM adherent WHERE `adherent_id` = $adId";
		$req2=mysqli_query($link,$selectadh);
		$data2=mysqli_fetch_assoc($req2);
		$ad = $data2['playlist_id'];//echo "avant : $ad";echo"<br>";
		
		$delete ="DELETE FROM `playlist` WHERE `playlist`.`playlist_id` = $id";
		mysqli_query($link,$delete);
	
		$new = str_replace("/$id","","$ad");echo"<br>";
		//echo "apres $new";
		$update = "UPDATE `adherent` SET `playlist_id` = '$new' WHERE `adherent`.`adherent_id` = $adId";
		mysqli_query($link,$update);
		
		
		
		$selectEx = "SELECT exercice_id FROM `exercice` WHERE `playlist_id` = $id";
		$reqEx = mysqli_query($link,$selectEx);
		while ($data3=mysqli_fetch_assoc($reqEx))
{
	$exercice=$data3['exercice_id'];
	$delete ="DELETE FROM `serie` WHERE `exercice_id` = $exercice";
	mysqli_query($link,$delete);
}
		
		$suppEx ="DELETE FROM `exercice` WHERE `playlist_id` = $id";
		mysqli_query($link,$suppEx);
		
		
}
$_SESSION['a'] = "message";
header('Location: ../KeepCool/playlist.php'); 
?>