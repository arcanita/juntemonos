<?
if(isset($_POST['cambiar']))
{
	
	$horarios = $_POST['horarios'];
	$id_user = $_SESSION['user'];
	$totalHorarios = count ($horarios);
	mysqli_query($link, "DELETE from horarios_usuarios where id_user = ".$id_user."");
	for($i=0; $i < $totalHorarios; $i++)
	{	
		$sql3="INSERT INTO horarios_usuarios (id_user, id_horario) VALUES ('".$id_user."','".$horarios[$i]."')";
		mysqli_query($link, $sql3);
		
	}
	echo "Horario cambiado con &eacute;xito";
	?> 
	<br />
	<input type="button" value="Volver a mi Perfil" onClick="location.href='index.php?id=perfil'" />
	<?
	
}
