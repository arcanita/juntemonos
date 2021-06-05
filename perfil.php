<?
//_______________________________________________Si esta iniciada la sesion:______________________________________
if(isset($_SESSION['user']))
{
	$id_usuario=$_SESSION['user'];
	$sql = "select * from usuarios where id_user = '".$id_usuario."'";
	$consulta= mysqli_query($link, $sql);
	$row = mysqli_fetch_array($link, $consulta);
	$nombre = $row['nick'];
	$correo=$row['email'];
	
	
	
//________________________________________________Mostrar datos usuario___________________________________
?>
<CENTER>
<table width="900" border="0"  cellspacing="10" cellpadding="10" align="center">
  <tr>
    <td rowspan="3" width="250">
		<? 	
			echo "<img src='fotos/f8b101ee61ce69a3b6782180e7a4258c.jpg' width='250'>"; 
			//echo "<a href='index.php?id=nueva_foto'><img src='imagenes/camarita.png' width='28' title='Cambiar mi foto de perfil'></a>";
		?> 
	</td>
    <td width="600">
		<span style="font-family:'calen'; font-size:49px">
			<? echo "Bienvenido ".ucwords(strtolower($row['nick']));?> </span>
			<br>Mis eventos:
			<?php
            $sql2 = "select * from juntas where id_junta in (select id_junta from juntas_usuarios where id_user = '".$id_usuario."')";
            
            $result2 = mysqli_query($link , $sql2);
            
            $cantidad_eventos = mysqli_num_rows($link, $result2);
            print_r(mysqli_fetch_array($link, $row2));
            if($cantidad_eventos == 0){
                echo "<br>no tienes ningun evento creado o no te han invitado jeje<br>puedes crear un evento<br><br> ";
            }else{
                while($arr2 = mysqli_fetch_array($link, $result2)){
        		?><br><input type='button' value="Ver horario evento <?=$arr2['nombre']?>" onClick="location.href='index.php?id=general&id_junta=<?=$arr2['id_junta']?>'"><br> <?php
            	}
            	
            }
            ?>
            <br>Puedes crear un nuevo evento
			<br><input type='button' value="Crear evento" onClick="location.href='index.php?id=crear_evento'"> 
			<br><br>Salir
			<br><input type='button' value="Cerrar sesi&oacute;n" onClick="location.href='index.php?id=logout'">
			
		
	</td>
  </tr>
 </table>
	
	
	
<?
    
	$horario = "select id_horario from horarios_usuarios where id_user = ".$id_usuario."";
	
	$disponibilidad = array();
	$ho = mysqli_query($link, $horario);
	$cantho = count($ho);
	$d = 0;
	while($arr = mysqli_fetch_array($link, $ho)){
		$disponibilidad[$d] = $arr['id_horario'];
		$d++;
	}
	
	
?>
<table width="900" border="0" cellpadding="10" cellspacing="0" align="center"  >
	<tr>
    	<td>
				<strong><font style="font-size:18px"> Tu horario de disponibilidad</font></strong><br />
			<?	
			$horas = array(); // 8-16-24-32
			$horario = array(); 
			$horario[0] = "8:00 - 13:00";
			$horario[1] = "13:00 - 17:00";
			$horario[2] = "17:00 - 21:00";
			$horario[3] = "21:00 - ...";
			
			for($i=1;$i<=32;$i++){
				$horas[($i-1)] = $i;
			}
			
			?>
			<table border = "1" cellspacing="1" cellpadding="5" bgcolor="#666">
				<tr bgcolor="#000000">
					<td width="200">Horarios</td>
					<td>Lunes</td>
					<td>Martes</td>
					<td>Miercoles</td>
					<td>Jueves</td>
					<td>Viernes</td>
					<td>S&aacute;bado</td>
					<td>Domingo</td>
					<td>Feriados</td>
				</tr>	
			<?
			$n = 0;
			$m = 0;
			$col = 1;
			while($m<4){
				while($n<=32){
				if($col == 1 && $n!=32){
				
					?>
					<tr bgcolor="#000000">
					<td>
					<?=$horario[$m]?>
					</td>
					<?
					$m++;
				}
				if($n!=32){
				?>
				<td>
				<?
				
					//echo $horas[$n];
					for($x=0;$x<count($disponibilidad);$x++){
						//echo $disponibilidad[$x]."=".$horas[$n]."&nbsp;&nbsp;&nbsp;";
						if($disponibilidad[$x]==$horas[$n]){
							?><center><img src = "images/tic.png" width="25"/></center><?
						}
						
					}
					?>
				</td>
					<?
				}
					if($col == 8){
						echo "</tr>";
						
							$col = 1;
						
					} else {
						$col++;
					}
					$n++;
				}
			}
			?>
				
			</table>
		</td>
	</tr>
	<tr>
	<td>
		<a href="index.php?id=cambiar_horario"><img src ="images/pen.png" width="28" title="Editar mi horario"/>Editar mi Horario</a>
	</td>	
	</tr>
	
	
</table>
<?
//________________________________________Si no se ha iniciado sesion___________________________________________________
}
else 
{
?>
<div class="form_login">
	<font> Si ya tienes perfi, completa tus datos para ingresar</font><br>
	<form action="index.php?id=procesar_login" method="POST">
		<center>
		<table border = "0">
				<tr>
					<td><font>Email:</font></td>
					<td><input type = "text" name="email"></td>
				</tr>
				<tr>	
					<td><font>Pass:</font></td>
					<td><input type="password" name="pass"></td>
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
	<a href="index.php?id=registro"><input type="button" name ="reg" value = "Registrarse"></a></td>
</div> 
<?
} 
?>
