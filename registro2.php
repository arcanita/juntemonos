<div class="formulario_registro">
	
	
	<? $id_junta = $_GET['id_junta']; 
	$sql = "select nombre from juntas where id_junta = ".$id_junta;
	$res = mysqli_query($link, $sql);
	$row = mysqli_fetch_array($link, $res);
	echo "Registrate para participar en el evento ".$row['nombre'];
	?>
	<form action="index.php?id=procesar_registro2" method="POST" enctype="multipart/form-data">
		<center><table>
		
			<tr>
				<td >
					Nick <font color="#FF0000">(*)</font>:
				</td>
				<td>
					<input name="nick" type="textarea" rows="1" cols="20" required/>
				</td>
			</tr>
			
			<tr>
				<td>
					Email <font color="#FF0000">(*)</font>:
				</td>
				<td>
					<input name="email" type="textarea" rows="1" cols="20" required/>
					<input type="hidden" name="id_junta">
				</td>
			</tr>
			
			
            <tr> 
				<td>
					Contrase&ntilde;a <font color="#FF0000">(*)</font>:
				</td>
				<td>
					<input name="clave" type="password" required/>
				</td>
			</tr>
		   
		
			
				<tr>
				<td>
					<input type="submit" value="Registrar" name="registrar" />
				</td>
			</tr>
	
		</table></center>
	</form>
</div>
