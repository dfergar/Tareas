<?php 
if (isset($errores)) // Evaluamos N� elementos
{
	foreach($errores as $clave=>$error)
	{
		VerError($clave);
		?><br><?php
	}
}
?>
<?php
/**
 * VISTA QUE MUESTA FORMULARIO DE MODIFICACIONES
 * 
 */
?>
<html>
    <head>
        <title>Controlador frontal</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>    
<body>
<?php 
include(TEMPLATE_PATH.'encabezado.php');
include(TEMPLATE_PATH.'menu.php'); 
?>

<form action="" method="POST">
<h2>Modificación de Tarea</h2>
<table>
	
	<input type="hidden" name="id_tarea" value="<?=$tareas['id_tarea'];?>">
	<tr>
		<td>Descripción</td><td><input type="text" name="descripcion" value="<?=$tareas['descripcion'];?>"></td>
	</tr>
	<tr>	
		<td>Persona de contacto</td><td><input type="text" name="contacto" value="<?=$tareas['contacto'];?>"></td>
	<tr>
		<td>Teléfono</td><td><input type="text" name="telefono" value="<?=$tareas['telefono'];?>"></td>
	</tr>
	<tr>
		<td>Correo electrónico</td><td><input type="text" name="email" value="<?=$tareas['email'];?>"></td>
	</tr>
	<tr>
		<td>Dirección</td><td><input type="text" name="direccion" value="<?=$tareas['direccion'];?>"></td>
	</tr>
	<tr>
		<td>Población</td><td><input type="text" name="poblacion" value="<?=$tareas['poblacion'];?>"></td>
	</tr>
	<tr>
		<td>Provincia</td><td><input type="text" name="provincia" value="<?=$tareas['provincia'];?>"></td>
	</tr>
	<tr>
		<td>cp</td><td><input type="text" name="cp" value="<?=$tareas['cp'];?>"></td>
	</tr>
	<tr>
		<td>Estado(P=Pendiente, R=Realizada, C=Cancelada)</td><td><input type="text" name="estado" value="<?=$tareas['estado'];?>"></td>
	</tr>
	<tr>
		<td>Fecha de creación</td><td><input type="text" name="fecha_crea" value="<?=$tareas['fecha_crea'];?>"></td>
	</tr>
	<tr>
		<td>Operario encargado</td><td><input type="text" name="operario" value="<?=$tareas['operario'];?>"></td>
	</tr>
	<tr>
		<td>Fecha de realización</td><td><input type="text" name="fecha_realiza" value="<?=$tareas['fecha_realiza'];?>"></td>
	</tr>
	<tr>
		<td>Anotaciones anteriores</td><td><input type="text" name="anot_antes" value="<?=$tareas['anot_antes'];?>"></td>
	</tr>
	<tr>
		<td>Anotaciones posteriores</td><td><input type="text" name="anot_despues" value="<?=$tareas['anot_despues'];?>"></td>
	</tr>
	<tr>
		<td><input type="submit" value="Enviar"></td>
	</tr>

</table>
</form>
<?php
include(TEMPLATE_PATH.'pie.php');
?>
</body>
</html>




	






