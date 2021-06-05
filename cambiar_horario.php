	<center>
	<?	
	echo "<h3>Horario actual</h3>";
	if(isset($_SESSION['user']))
	{
		$id_usuario=$_SESSION['user'];
		$sql = "select * from usuarios where id_user = '".$id_usuario."'";
		$consulta= mysqli_query($link, $sql);
		$row = mysqli_fetch_array($link, $consulta);
		$nombre = $row['nick'];
		$correo=$row['email'];
		$horario = "select id_horario from horarios_usuarios where id_user = ".$id_usuario."";
		$disponibilidad = array();
		$ho = mysqli_query($link, $horario);
		if(mysqli_num_rows($link, $ho)<1)
		{
			echo "<img src='images/alerta.png'>No ha agregado su horario";
		}
		else
		{
		$cantho = count($ho);
		$d = 0;
		while($arr = mysqli_fetch_array($link, $ho))
		{
			$disponibilidad[$d] = $arr['id_horario'];
			$d++;
		}
		$horas = array(); // 8-16-24-32
		$horario = array(); 
		$horario[0] = "8:00 - 13:00";
		$horario[1] = "13:00 - 17:00";
		$horario[2] = "17:00 - 21:00";
		$horario[3] = "21:00 - ...";
		for($i=1;$i<=32;$i++)
		{
			$horas[($i-1)] = $i;
		}
	
	?>
	<table border = "0" cellspacing="1" cellpadding="5" bgcolor="#666">
		<tr bgcolor="#000000">
			<td>Horarios</td>
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
	<? }
	}
	
	else{
		echo "Inicie sesi&oacute;n para ver esta p&aacute;gina";
		}
		
		?>
		<h3>Marque sus nuevos horarios de disponibilidad</h3><h4>Debes marcar los horarios en que puedes juntarte</h4> <br>
		<form action="index.php?id=procesar_horario" method="post">
		
		
		
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
						<td>Horarios</td>
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
						$check = "";
						for($x=0;$x<count($disponibilidad);$x++){
							//echo $disponibilidad[$x]."=".$horas[$n]."&nbsp;&nbsp;&nbsp;";
							if($disponibilidad[$x]==$horas[$n]){
								$check = 'checked="checked"';
							}
							
						}
						
						?>
						<center><input type="checkbox" name = "horarios[]" <?=$check?>  value="<?=$horas[$n]?>" /></center>
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
		
		
				
				<br><input type="submit" name="cambiar" value="Cambiar Horario">    
		</form>
</center>