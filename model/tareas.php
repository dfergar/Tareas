<?php
/*
$model_tareas=array(
    array('id'=>1, 'nombre'=>'tarea1'),
    array('id'=>2, 'nombre'=>'tarea2'),
    array('id'=>4, 'nombre'=>'tarea4'),
    array('id'=>5, 'nombre'=>'tarea5'),
    array('id'=>10, 'nombre'=>'tarea10'),
);

/**
 * Devuelve las tareas existentes.
 * Simulamos lectura de base de datos
 * @global array $model_tareas
 * @return array
 */
/*

function GetTareas()
{
    global $model_tareas;
    return $model_tareas;
}
*/
include 'patron.php';

//Devuelve array con el id y la descripcion de cada una de las tareas
function ListarTareas($nReg, $nElementosxPagina)
{
	//instanciamos y nos conectamos
	$db = Database::getInstance();

	$tareas= array();
	$sql ="select id_tarea as Codigo, descripcion as Tarea from tbl_tareas LIMIT $nReg, $nElementosxPagina";
		
	$db->Consulta($sql);
	while ($fila = $db->LeeRegistro())
	{
		$tareas[$fila['Codigo']]=$fila['Tarea'];
	}
		
	//$db->cerrar();
	return $tareas;
}

function ConsultaProvincias()
{
	$db = Database::getInstance();
	$sql ="select cod, nombre from tbl_provincias";
	$db->Consulta($sql);
	//Empiezo a recorrer la consulta de las provincias
	while ($fila = $db->LeeRegistro())
	{		
		//array con indice codigo provincia y valores los nombre de las provincias
		$provincias[$fila['cod']]=$fila['nombre'];
	}
	return $provincias;
}

function VerTareas($id)
{
	$db = Database::getInstance();
	$sql ="select * from tbl_tareas where id_tarea=$id";
	$db->Consulta($sql);
	$fila = $db->LeeRegistro();
	
	return $fila;
	
}

function NumeroTareas()
{
	//instanciamos y nos conectamos
	$db = Database::getInstance();

	$sql ='select count(*) as total from tbl_tareas';

	$db->Consulta($sql);
	$fila = $db->LeeRegistro();		
	//$db->cerrar();
	return $fila['total'];
}

function NuevaTarea($datos)
{
	//instanciamos y nos conectamos
	$db = Database::getInstance();
	
	$sql="insert into tbl_tareas (descripcion, 
								  contacto, 
								  telefono, 
								  email, 
								  direccion,
								  poblacion, 
								  cp, 
								  provincia, 
								  estado, 
								  fecha_crea, 
								  operario, 
								  fecha_realiza, 
								  anot_antes, 
								  anot_despues)
			values (			  '$datos[descripcion]', 
							      '$datos[contacto]', 
							      '$datos[telefono]', 
							      '$datos[email]', 
							      '$datos[direccion]',
							      '$datos[poblacion]', 
							      '$datos[cp]', 
							      '$datos[provincia]', 
							      '$datos[estado]', 
							      '$datos[fecha_crea]', 
							      '$datos[operario]', 
							      '$datos[fecha_realiza]',
							      '$datos[anot_antes]', 
								  '$datos[anot_despues]')";
	$db->Consulta($sql);
	$db->cerrar();
	

}

function VerError($campo)
{

	global $errores;
	if (isset($errores[$campo]))
	{
		echo $errores[$campo];
	}
}


/**
 * Muestra un paginador para una lista de elementos
 *
 * @param int $pag_actual
 * @param unknown $nPags
 * @param unknown $url
 */
function MuestraPaginador($pag_actual, $nPags, $url)
{
	// Mostramos paginador
	echo '<div style="text-align=center">';
	echo EnlaceAPagina($url, 1, 'Inicio');
	echo EnlaceAPagina($url, $pag_actual-1, 'Anterior', $pag_actual>1);
	for($pag=1; $pag<=$nPags; $pag++)
	{
		echo EnlaceAPagina($url, $pag, $pag, $pag_actual!=$pag);
	}
	echo EnlaceAPagina($url, $pag_actual+1, 'Siguiente', $pag_actual<$nPags);
	echo EnlaceAPagina($url, $nPags, 'Fin');
	echo "</div>";
}

/**
 * Devuelve el texto de un enlace (etiqueta <a>) a la p�gina $url si el enlace est� activo,
 * en otro caso solo devuelve el texto
 *
 * @param string $url		URL de la p�gina que muestra la lista
 * @param int $pag			N� de p�gina al cual enlazamos
 * @param string $texto		Texto del enlace
 * @param bool $activo		Se muestra enlace (true) o no (false)
 * @return string
 */
function EnlaceAPagina($url, $pag, $texto, $activo=true)
{
	if ($activo)
		return '<a href="'.$url.'?pag='.$pag.'">'.$texto.'</a> ';
	else
		return $texto;
}

//BIBLIOTECA DE FUNCIONES

//Display errores
/*function VerError($campo)
{
	global $errores;
	if (isset($errores[$campo]))
	{
		echo $errores[$campo];
	}
}
*/
//Función para crear selects
function CreaSelect3($array, $name, $selected='')
{
	echo "<select name=\"".$name."\">";

	foreach($array as $clave=>$valor)
	{
		if ($valor==$selected)
		{
			$htmlSel=" selected";
		}
		else 
		{
			$htmlSel='';
		}
		echo "<option $htmlSel value=\"".$clave."\">".$valor;
	}

	echo "</select>";
}

function CreaSelect($array, $name)
{
	echo "<select name=\"".$name."\">";

	foreach($array as $clave=>$valor)
	{
		
		echo "<option value=\"".$clave."\">".$valor;
	}

	echo "</select>";
}


/*
function FiltradoTareas($codigo)
{
	/*Los campos descripci�n y persona de contacto debe tener alg�n valor
El tel�fono de contacto debe tener un valor y si existe debe tener un formato v�lido, s�lo n�meros, y caracteres de separaci�n (espacio, gui�n, y otros que estim�is oportuno).
El c�digo postal, si existe, debe tener un formato v�lido, 5 n�meros.
La provincia debe ser alg�na de las existentes en espa�a. Se debe permitir seleccionar la provincia de una lista deplegable. 
El correo electr�nico es obligatorio y debe tener un formato correcto.
La fecha de realizaci�n debe tener un formato v�lido y ser posterior a la fecha actual.
La fecha de creaci�n no se podr� modificar.
	$errores=array();

	//Expresi�nes regulares 
	$telefono="/^\d{9}/i";

	if (!preg_match($telefono, $provincia))
	{
		$errores['sololetras']="Debe introducir palabras compuestas de letras, que pueden estar separadas por un espacio";
	}

	//Provincia en blanco
	if ($provincia=="")
	{
		$errores['provincia']="Debe introducir algún nombre de provincia";
	}

	//Provincia existe
	$existe=false;
	global $provincias;
	foreach($provincias as $id => $nombre)
	{
		if($provincia==$nombre)
		{
			$existe=true;
		}
	}
	if ($existe) $errores['existe']="La provincia ya existe en la base de datos";

	return $errores;
}*/




