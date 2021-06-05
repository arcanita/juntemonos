<?
session_start();
include("config.php");
if(isset($_POST['log']))
{
	$email = $_POST['email']; 
	$clave= md5($_POST['pass']); 
	$id_junta= $_POST['id_junta']; 
	
	
	$sql = "SELECT id_user FROM usuarios WHERE email = '".$email."' AND pass = '".$clave."'";
	$consulta = mysqli_query ($link, $sql) or die(mysqli_error());
	if(mysqli_num_rows($link, $consulta)>0)
	{
		$row = mysqli_fetch_array($link, $consulta);
        $_SESSION['user'] = $row['id_user']; 
        $sql2 = mysqli_query("insert into juntas_usuarios(id_junta, id_user) values ('".$id_junta."', '".$_SESSION['user']."')");
		?><script>location.href='index.php?id=perfil&id_user=<?=$_SESSION['user']?>'</script><?
	}
	
	else 
	{
		echo "Usuario o clave invalidos";
		?>
			<br><a href="index.php?id=perfil"><input type="button" value="Intentalo denuevo"></a>
		<?
	}
}
elseif(isset($_POST['logeo']))
{
	$email = $_POST['email']; 
	$clave= md5($_POST['pass']); 
	
	
	$sql = "SELECT id_user FROM usuarios WHERE email = '".$email."' AND pass = '".$clave."'";
	$consulta = mysqli_query ($link, $sql) or die(mysqli_error());
	if(mysqli_num_rows($link, $consulta)>0)
	{
		$row = mysqli_fetch_array($link, $consulta);
        $_SESSION['user'] = $row['id_user']; 
		?><script>	location.href="index.php?id=perfil&id_user=<?=$_SESSION['user']?>"</script><?
	}
	
	else 
	{
		echo "Usuario o clave invalidos";
		?>
			<br><a href="index.php?id=perfil"><input type="button" value="Intentalo denuevo"></a>
		<?
	}
}
?>