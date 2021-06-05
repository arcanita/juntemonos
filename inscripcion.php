<?php
include("config.php");
$id_junta = $_GET['id_junta'];
if(isset($_SESSION['user']))
{
    
	$sql = mysqli_query($link, "insert into juntas_usuarios (id_junta, id_user, user_host) values ('".$id_junta."', '".$_SESSION['user']."', 0)  ");
	echo "Listo! ahora tu horario de disponibilidad se incluirá en este evento";
	?>
	<br><input type="button" value="Volver a mi Perfil" onClick="location.href='index.php?id=perfil'" />
	<?
}
else 
{
?>
<div class="form_login">
	<font> Si ya tienes perfi, completa tus datos para ingresar</font><br>
	<form action="index.php?id=procesar_login2" method="POST">
		<center>
		<table border = "0">
				<tr>
					<td><font>Email:</font></td>
					<td><input type = "text" name="email"></td>
				</tr>
				<tr>	
					<td><font>Pass:</font></td>
					<td><input type="password" name="pass">
					<input type="hidden" name="id_junta"></td>
				</tr>
				<tr>
					<td></td>	
					<td><input type="submit" name ="log" value = "Login"></td>
				</tr>
			</table>	</center>
		</form>
</div>
<div class="registrarse">
	<font>Si no tienes perfil, create uno!<br></font>
	<a href="index.php?id=registro2&id_junta=<?=$id_junta?>"><input type="button" name ="reg" value = "Registrarse"></a></td>
</div> 
<?
} 
?>