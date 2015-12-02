<?php
include 'constantes.php';

include(MODEL_PATH.'tareas.php');

$codigo = $_REQUEST['id'];
$tareas=array();
$tareas=BorrarTarea($codigo);
$mensaje="Tarea borrada";
include(VIEW_PATH.'inicio.php');



