<?php
include("config.php");
if(isset($_POST['registrar']))
{
	
	$nom = $_POST['nick'];
	
	$mail = $_POST['email'];
	
	$pass = md5($_POST['clave']);
	
		
	$user = $_SESSION['user'];
		
		
	$sql = "INSERT INTO usuarios(nick,pass,email) VALUES ('".$nom."','".$pass."','".$mail."')";
    
	$resultado = mysqli_query($link, $sql);	
					
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