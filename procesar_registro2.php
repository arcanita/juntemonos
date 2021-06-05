<?php
include("config.php");
if(isset($_POST['registrar']))
{
	
	$nom = $_POST['nick'];
	
	$mail = $_POST['email'];
	
	$pass = md5($_POST['clave']);
	$id_junta= $_POST['id_junta']; 
		
	$user = $_SESSION['user'];
		
		
	$sql = "INSERT INTO usuarios(nick,pass,email) VALUES ('".$nom."','".$pass."','".$mail."')";
    
	$resultado = mysqli_query($link, $sql);	
    $sql2 = mysqli_query($link, "insert into juntas_usuarios(id_junta, id_user) values ('".$id_junta."', '".$user."')");
					
		echo "<br>Usuario agregado con &eacute;xito<br>";	
		echo "<a href='index.php?id=logout'><input type='button' value='Volver al inicio'></a>";
		if($resultado)
    	{	   
    		
    		?><script>location.href='index.php?id=perfil'</script><?
    	}
    	else 
    	{
    		echo "Ya existe el email";
    	}
}
	
	
	
	
	
	
?>