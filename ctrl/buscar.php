<?php
include 'constantes.php';


include(MODEL_PATH.'tareas.php');

$provincias=ConsultaProvincias();
include(VIEW_PATH.'buscar.php');

$datos = array();

$datos['descripcion']=$_REQUEST['descripcion'];
$datos['provincia']=$_REQUEST['provincia'];
$datos['estado']=$_REQUEST['estado'];

buscartarea($datos);

