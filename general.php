<?
    $id_usuario=$_SESSION['user'];
	$id_junta = $_GET['id_junta'];
	$horario = "select horarios_usuarios.id_horario, usuarios.nick  as cont, juntas_usuarios.user_host from juntas_usuarios, horarios_usuarios, usuarios where usuarios.id_user = horarios_usuarios.id_user and juntas_usuarios.id_user = usuarios.id_user and juntas_usuarios.id_junta ='".$id_junta."'";
	
	$disponibilidad = array();
	$ho = mysqli_query($link, $horario);
	$cantho = count($ho);
	$d = 0;
	while($arr = mysqli_fetch_array($link, $ho))
	{
		$disponibilidad[$d] = $arr['id_horario'];
		$hosting[$d] = $arr['user_host'];
		$d++;
	
	}
	$host = "select user_host from juntas_usuarios where id_junta = ".$id_junta." and id_user = ".$id_usuario;
	$host_result = mysqli_query($link, $host);
	$host_result_row = mysqli_fetch_array($link, $host_result);
	 
	$sql3 = "select nombre from juntas where id_junta = ".$id_junta;
	$res3 = mysqli_query($link, $sql3);
	$row3 = mysqli_fetch_array($link, $res3);
	
	$sql4 = "select * from juntas_usuarios where id_junta = ".$id_junta." and id_user = ".$id_usuario;
	$res4 = mysqli_query($link, $sql4);
	$row4 = mysqli_num_rows($link, $res4);
?>
<table width="900" border="0" cellpadding="10" cellspacing="0" align="center"  >
	<tr>
    	<td>
			<strong><font style="font-size:18px"> Disponibilidad de juntaci&oacute;n para la junta <?=$row3['nombre']?> </font></strong><br />
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
			<table border = "0" cellspacing="1" cellpadding="5" bgcolor="#666">
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
					
					for($x=0;$x<count($disponibilidad);$x++)
					{
						if($disponibilidad[$x]==$horas[$n])
						{
						    if($hosting[$x] == 0){ 	
							    ?><center><img src = "images/tic.png" width="20"/></center><?
						    }
						    else{
						        ?><center><img src = "images/star.png" width="20"/></center><?
						    }
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
	</table>
	<?
	if($row4 == 0){ ?>
	<br><br>Si tienes este link es porque te invitaron, puedes inscribirte a este evento
	<br><input type='button' value="Inscribirme al evento" onClick="location.href='index.php?id=inscripcion&id_junta=<?=$id_junta?>'">
    <? } else { 
        if($host_result_row['user_host'] == 1){ ?>
            <br><br>En nuestros registros dice que eres el dueño de casa, quieren cambiar esto?
            <br><input type='button' value="No soy el dueño de casa" onClick="location.href='index.php?id=host&id_junta=<?=$id_junta?>'">
        <? } else{ ?>
        	<br><br>Si eres el dueño de casa, tu disponibilidad saldrá con un ícono de estrella<br> (ya que no puede ser la junta cuando tu no puedas XD)
        	<br><input type='button' value="Soy el dueño de casa!" onClick="location.href='index.php?id=host&id_junta=<?=$id_junta?>'">
    	<? } 
    }?>
	
	<br><br>Volver a mi perfil
	<br><input type='button' value="Volver a mi perfil" onClick="location.href='index.php?id=perfil'">
	
	
	