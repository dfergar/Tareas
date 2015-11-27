<?php
include 'constantes.php';

include(MODEL_PATH.'tareas.php');
$provincias=ConsultaProvincias();
$codigo = $_REQUEST['id'];
$tareas=array();
$tareas=VerTareas($codigo);

include(VIEW_PATH.'ModificarTareaForm.php');



