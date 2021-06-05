<?  session_start(); 
	include("config.php");
	//existe el id se la persona que esta logueada o se borro?
	/*$user = $_SESSION['sid'];
	$sqli="SELECT mail_es from estilistas where mail_es=".$user;
	$resultado = mysql_query($sqli);
	if(isset($_SESSION['sid']))
	{
		if(mysql_num_rows($resultado)< 1)
		{
			session_destroy();
		}
	}
	*/
?>
<html>
<head>
<title>
.:Juntemonos!:.
</title>
<LINK rel="stylesheet" type="text/css" href="style.css">
<style>
body 
{
background-image: url('images/gato.png');
background-repeat: no-repeat;
background-attachment: fixed;
background-position:right;
}
@font-face
{
font-family: 'Imfashion';
src: url('fonts/im.ttf'),
     url('fonts/im.eot');
}
@font-face
{
font-family: 'calen';
src: url('fonts/calen.ttf'),
     url('fonts/calen.eot');
}
</style>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		
		<link rel="stylesheet" href="css/basic.css" type="text/css" />
		<link rel="stylesheet" href="css/galleriffic-2.css" type="text/css" />
		<script type="text/javascript" src="js/jquery-1.3.2.js"></script>
		<script type="text/javascript" src="js/jquery.galleriffic.js"></script>
		<script type="text/javascript" src="js/jquery.opacityrollover.js"></script>
		<!-- We only want the thunbnails to display when javascript is disabled -->
		<script type="text/javascript">
			document.write('<style>.noscript { display: none; }</style>');
		</script>
</head>
<body bgcolor="#000">
<div id="header">
	<div style="clear:both"><a href="index.php"><img src="images/logo2.png" width="719" /></a></div>
	
	 
	<div style="float:left; clear:both; text-align:left; margin-top:-110px; margin-left:50px;">
	<? /* if(!isset($_SESSION['user']))
	{ ?>
	
		<form action="index.php?id=procesar_login"  method="post">
			Inicia sesi&oacute;n
			<table border = "0">
				<tr>
					<td>Email</td>
					<td><input type="text" name="email"  size="14" required></td>
				</tr>
				<tr>
					<td>Pass:</td>
					<td><input type="password" name="pass" size="14" required></td>
				</tr>
				<tr>
					<td><input type="submit" name="logeo" value="Login"></td>
					<td>&oacute; <input type="button" name="registro" value="Reg&iacute;strate!" onClick="location.href='index.php?id=registro_user'">
				</tr>
			</table>
		</form>
	</div>
	<? } else { 
		$holi = "select * from usuarios where id_user=".$_SESSION['user']."";
		$re=mysql_query($holi);
		$ro = mysql_fetch_array($re);
		echo "Bienvenido <br><strong>".$ro['mail']."</strong><br>";
		?><input type="button" value="Salir" onClick="location.href='index.php?id=logout'" ><?
		 } */ ?>
		 </div>
	
	
</div>
<br><br>
<div class="contenido">
		<? 				
			if(!isset($_GET['id'])) 
			{
		?>
				<a href="index.php?id=perfil"><img src="images/totoro.png" width="300"><br>Comenzar!</a>
		<?
			} 
			else 
			{
				if(file_exists($_GET['id'].".php")) 
				{
					$id = htmlspecialchars(trim($_GET["id"]));
					include("$id.php");
				} 
				else 
				{
					//include("index.php");
					
				}
			}
		?>
</div>
		
</body>
</html>
