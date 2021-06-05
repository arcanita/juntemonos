<?php
include("config.php");
if(isset($_POST['guardar']))
{
	
	$nom = $_POST['nombre'];
	$user = $_SESSION['user'];
	$sql = "INSERT INTO juntas(nombre) VALUES ('".$nom."')";
	$resultado = mysqli_query($link, $sql);	
	$last = "select id_junta from juntas order by id_junta desc limit 1";
	$last_res = mysqli_query($link, $last);	
	$last_row = mysqli_fetch_array($link, $last_res);
    $sql2 = "INSERT INTO juntas_usuarios(id_junta, id_user) VALUES ('".$last_row['id_junta']."', '".$user."')";
      
	$resultado2 = mysqli_query($link, $sql2);	
	
					
		echo "<br>junta creada con &eacute;xito<br>";	
		
		if($resultado)
    	{	   
    		?><script>location.href='index.php?id=perfil'</script><?
    		
    	}
    	
}
	
	
	
	
	
	
?>