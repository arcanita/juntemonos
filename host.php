<?
	$id_user = $_SESSION['user'];
	$id_junta = $_GET['id_junta'];
	
	$sql = mysqli_query($link, "select * from juntas_usuarios where id_user = ".$id_user." and id_junta = ".$id_junta."");
	$row = mysqli_fetch_array($link, $sql);
	if($row['user_host'] == 0){
	    mysqli_query($link, "update juntas_usuarios set user_host = 1 where id_user = ".$id_user." and id_junta = ".$id_junta."");
	}else{
	    mysqli_query($link, "update juntas_usuarios set user_host = 0 where id_user = ".$id_user." and id_junta = ".$id_junta."");
	}
	
	
	?><script>location.href='index.php?id=general&id_junta=<?=$id_junta?>'</script><?
	