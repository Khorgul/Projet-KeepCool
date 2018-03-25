<?php
session_start();
?>
<?php
$link=mysqli_connect("localhost","yoni","yoniphp1")or die("la connexion n'est pas passé");
mysqli_select_db($link, "kcprojet")or die("la selection n'est pas passé");

$id=$_POST['visu'];

?>
<table height ="100" width="550" border ="1">
	<tr>
		<td align="center" ROWSPAN=2>Exercice</td>
		<td align="center" ROWSPAN=2>Nb de série</td>
		
	
	<?php

$sql = "SELECT exercice_id FROM playlist where playlist_id = $id";
$req=mysqli_query($link,$sql);
$data=mysqli_fetch_assoc($req);
$ex= $data['exercice_id'];

$ln = strlen($ex);
$separe = explode("/",$ex);
$tab = array();
for ($i=1; $i<=$ln;$i++){
	if(isset($separe[$i])){
	$ex = $separe[$i];
$detail = "SELECT max(serie_rang) as ma  FROM serie WHERE exercice_id = $ex";
$reqDetail=mysqli_query($link,$detail);
$dataDetail=mysqli_fetch_assoc($reqDetail);
$max = $dataDetail['ma'];
//echo $max;
$tab[$i] = $max;
}}
$maxSerie = max($tab);

for ($j=1; $j<=$maxSerie;$j++){
	?>
	<td align="center" colspan=2><?php echo"Série $j";?></td>
<?php
}
?>
	</tr>
	<tr>
<?php
for ($j=1; $j<=$maxSerie;$j++){
	?>
		<td align="center"><img src="../KeepCool/image/repetition.jpg"></td>
		<td align="center"><img src="../KeepCool/image/poids.jpg"></td>
	<?php
	}	
	?></tr>
<?php
for ($i=1; $i<=$ln;$i++){
	if(isset($separe[$i])){
	$ex = $separe[$i];
	//echo $ex;
$idEx = "SELECT listeexercice_id FROM exercice WHERE exercice_id = $ex";
$reqId=mysqli_query($link,$idEx);
$dataId=mysqli_fetch_assoc($reqId);
$idL = $dataId['listeexercice_id'];

$nom = "SELECT listeexercice_nom from listeexercice where listeexercice_id = $idL";
$reqNom=mysqli_query($link,$nom);
$dataNom=mysqli_fetch_assoc($reqNom);
$idNom = $dataNom['listeexercice_nom'];

$serie = "SELECT count(exercice_id) as nb FROM serie WHERE exercice_id = $ex";
$reqSerie=mysqli_query($link,$serie);
$dataSerie=mysqli_fetch_assoc($reqSerie);
$nb = $dataSerie['nb'];
//echo $nb;

$detail = "SELECT serie_rang, serie_poids, serie_nb  FROM serie WHERE exercice_id = $ex ORDER BY serie_rang ASC";
$reqDetail=mysqli_query($link,$detail);

?>
		

	<tr>
		<td align="center"><?php echo $idNom ;?></td>
		<td align="center"><?php echo $nb; ?></td>
		<?php
			while ($dataDetail=mysqli_fetch_assoc($reqDetail)){
				$poids = $dataDetail['serie_poids'];
				$rep = $dataDetail['serie_nb'];
				$rang = $dataDetail['serie_rang'];
				echo "
				<td align='center'>$rep</td>
				<td align='center'>$poids</td>
				";
		
			}?>
		</td>
	</form>
	</tr>
<?php
}
}
/*<td align="center"><form name="voirPlus"  method="post" action="voir.php">
		<input name="detail" type="submit" value="+" />
</td>*/
?>


</table>