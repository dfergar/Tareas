<?php
include 'constantes.php';

include(MODEL_PATH.'tareas.php');

$codigo = $_REQUEST['id'];
$tareas=array();
$tareas=VerTareas($codigo);

include(VIEW_PATH.'VerTareasForm.php');



