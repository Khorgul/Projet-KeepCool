<?php
session_start();
?>

<?php
echo $_SESSION['groupe'];
echo $_POST['exercice'] ;
$_SESSION['exercice'] = $_POST['exercice'] ;
echo $_POST['serie'];
?>

<form method="post" action="ajoutPlaylist.php">
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
				{?>
					<tr>
						<td align='center'>Série <?php echo $i;?> </td>
						<td align="center"><input type="number" name="rep<?php echo $i;?>"/></td>
						<td align="center"><input type="number" name="poids<?php echo $i;?>" /></td>
				   </tr>
					<?php
				}
					?>
		</table>
		<input type='submit' value='Ajouter Exercice'>
</form>



