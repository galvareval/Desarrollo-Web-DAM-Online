<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
			<meta http-equiv="content-type" content="text/html; charset=UTF-8">
			<title>Gianfranco DW07</title
	</head>
	<body>
		<?php
			// si no hay datos en oculto.
			if (empty($_POST['oculto'])) 
			{
				
				// Crear un nuevo array de datos.
				$datos=array();
				$n_elementos=0;
			}
			else
			{
				// Almacenar en el array de datos los datos que ya habían.
				$datos = explode("," , $_POST['oculto']);
				// Almacenar cuantos elmentos.
				$n_elementos = count($datos);
			}
			// Si el campo nombre tiene datos.
			if(!empty($_POST['nombre']))
			{
				// Almacenar el valor en nombre.
				$nombre = $_POST['nombre'];
				// Comprobar si ya existe en el array y almacenar la posición
				$posNombreExiste = existe($datos,$nombre);
				// Si el campo correo tiene datos.
				if(!empty($_POST['Correo']))
				{
					// Almacenar el correo
					$correo=$_POST['Correo'];
					if($posNombreExiste || $posNombreExiste === 0)
					{
						// El nombre ya existe
						// Hay que cambiar el valor para el índice del array siguiente al encontrado ya que los datos se almacenan clave1, valor1, clave2, valor2....
						$datos[$posNombreExiste + 1] = $correo;
						// Alert avisando del correo cambiado
						alert("Correo cambiado");
					}
					else
					{
						// El nombre no existe, añadir a la agenda el nombree y el correo
						$datos[$n_elementos] = $nombre;
						// Correo el valor para el índice del array siguiente al del nombre ya que los datos se almacenan clave1, valor1, clave2, valor2....
						$datos[$n_elementos + 1] = $correo;
						// Alert avisando correo añadido
						alert("Contacto añadido");
					}
				}
				else
				{
					// El campo nombre tiene valor pero el correo no, hay que borrar el contacto.
					$correo = NULL;
					if( $posNombreExiste || $posNombreExiste === 0)
					{
						// Eliminar contacto.
						unset($datos[$posNombreExiste]);
						unset($datos[$posNombreExiste + 1]);
						// Reorganizar
						$datos = array_values($datos);
						// Aleert contacto eliminado
						alert("Contacto eliminado");
					}
					else
					{
						// Nombre no esta y falta correo.
						alert("Falta correo");
					}
				}
			}
			// El campo nombre no tieene datos.
			else
			{
				$nombre = NULL;
				if(!empty($_POST['Correo']))
				{
					// Alert avisando de que falta nombre
					alert("Falta nombre");
				}else
				{
					// Aviso falta nombre y correo
					echo "<span>No hay datos</span>";
				}
			}
			// Mostrar la agenda
			if (count($datos) > 1)
			{
				echo "<h1>***Agenda***</h1>";
				// Crear lista
				echo "<ul>";
				for ($i = 0 ; $i < count($datos) ; $i += 2)
				{
					if($datos[$i] !== NULL && $datos[$i+1] !== NULL)
						echo "<li>Nombre: ".$datos[$i]." Correo: ".$datos[$i+1]."</li>";
				}
				echo "</ul>";
			}
			// Función para comprobar si un nombre existe en un array
			function existe($datosEv,$nombreEv)
			{
				$n_elementosicion = array_search($nombreEv,$datosEv,false);
				return $n_elementosicion;
			}
			// Función para mostrar un alert
			function alert($msg) 
			{
				echo "<script type='text/javascript'>alert('$msg');</script>";
			}
		?>
		<!-- Formulario -->
		<form name="formulario" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
			<table>
				<th>Nuevo Contacto</th>
				<tr>
					<!-- Nombre -->
					<td>
						<fieldset>
								<legend>Nombre</legend>
								<input name="nombre" type="text" />
						</fieldset>
					</td>
					<!-- Correo -->
					<td>
						<fieldset>
								<legend>Correo</legend>
								<input name="Correo" type="text" />
						</fieldset>
					</td>
				</tr>
			</table>
			<!-- Campo oculto para almacenar todos los contactos-->
			<input name="oculto" type="hidden" value="<?php if (isset($datos)) echo implode("," , $datos) ?>" style="text-align:right;" />
			<input type="submit" value="Añadir Contacto" /> 
		</form>
	</body>
</html>