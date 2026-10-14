
<?php
require_once "modelo/Habitacion.php";
require_once "modelo/HabitacionDao.php";

class HabitacionController {

    private $dao;

    public function __construct($dao) {
        $this->dao = $dao;
    }

    // LISTAR
    public function index() {
        $habitaciones = $this->dao->listar();
        require "vista/habitaciones/index.php";
    }

    // NUEVA HABITACION
    public function nuevo() {
        $habitacion = new Habitacion();
        require "vista/habitaciones/formulario.php";
    }

    // GUARDAR
    public function guardar() {
        $habitacion = new Habitacion();

        $habitacion->setNumero(trim($_POST["numero"]));
        $habitacion->setPiso((int) $_POST["piso"]);
        $habitacion->setTipo($_POST["tipo"]);
        $habitacion->setPrecio((float) $_POST["precio"]);
        $habitacion->setFoto(trim($_POST["foto"]));

        $this->dao->insertar($habitacion);

        header("Location: index.php");
        exit;
    }

    // EDITAR
    public function editar() {
        $id = (int) ($_GET["id"] ?? 0);
        $habitacion = $this->dao->buscarPorId($id);

        if (!$habitacion) {
            die("La habitación no existe.");
        }

        require "vista/habitaciones/formulario.php";
    }

    // ACTUALIZAR
    public function actualizar() {
        $habitacion = new Habitacion();

        $habitacion->setId((int) $_POST["id"]);
        $habitacion->setNumero(trim($_POST["numero"]));
        $habitacion->setPiso((int) $_POST["piso"]);
        $habitacion->setTipo($_POST["tipo"]);
        $habitacion->setPrecio((float) $_POST["precio"]);
        $habitacion->setFoto(trim($_POST["foto"]));

        $this->dao->actualizar($habitacion);

        header("Location: index.php");
        exit;
    }

    // ELIMINAR
    public function eliminar() {
        $id = (int) ($_GET["id"] ?? 0);

        $this->dao->eliminar($id);

        header("Location: index.php");
        exit;
    }
}
?>
