
<?php

require_once "config/database.php";
require_once "modelo/Habitacion.php";
require_once "modelo/HabitacionDao.php";
require_once "controlador/HabitacionController.php";

// CONEXION A LA BASE DE DATOS
$database = new Database();
$conexion = $database->conectar();

// DAO
$dao = new HabitacionDao($conexion);

// CONTROLADOR
$controlador = new HabitacionController($dao);

// ACCION SOLICITADA
$accion = $_GET["accion"] ?? "index";

// EJECUTAR ACCION
switch ($accion) {

    case "nuevo":
        $controlador->nuevo();
        break;

    case "guardar":
        if ($_SERVER["REQUEST_METHOD"] !== "POST") {
            die("Solicitud no válida.");
        }
        $controlador->guardar();
        break;

    case "editar":
        $controlador->editar();
        break;

    case "actualizar":
        if ($_SERVER["REQUEST_METHOD"] !== "POST") {
            die("Solicitud no válida.");
        }
        $controlador->actualizar();
        break;

    case "eliminar":
        $controlador->eliminar();
        break;

    case "index":
    default:
        $controlador->index();
        break;
}
?>
