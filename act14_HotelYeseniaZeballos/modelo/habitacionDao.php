
<?php
require_once "modelo/Habitacion.php";

class HabitacionDao {

    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    // LISTAR HABITACIONES
    public function listar() {
        $sql = "SELECT id, numero, piso, tipo, precio, foto
                FROM habitacion
                ORDER BY id DESC";

        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();

        $habitaciones = [];

        while ($fila = $stmt->fetch()) {
            $habitaciones[] = new Habitacion(
                $fila["id"],
                $fila["numero"],
                $fila["piso"],
                $fila["tipo"],
                $fila["precio"],
                $fila["foto"]
            );
        }

        return $habitaciones;
    }

    // BUSCAR HABITACION POR ID
    public function buscarPorId($id) {
        $sql = "SELECT id, numero, piso, tipo, precio, foto
                FROM habitacion
                WHERE id = :id";

        $stmt = $this->conexion->prepare($sql);
        $stmt->execute(["id" => $id]);

        $fila = $stmt->fetch();

        if ($fila) {
            return new Habitacion(
                $fila["id"],
                $fila["numero"],
                $fila["piso"],
                $fila["tipo"],
                $fila["precio"],
                $fila["foto"]
            );
        }

        return null;
    }

    // INSERTAR HABITACION
    public function insertar(Habitacion $habitacion) {
        $sql = "INSERT INTO habitacion
                (numero, piso, tipo, precio, foto)
                VALUES
                (:numero, :piso, :tipo, :precio, :foto)";

        $stmt = $this->conexion->prepare($sql);

        return $stmt->execute([
            "numero" => $habitacion->getNumero(),
            "piso" => $habitacion->getPiso(),
            "tipo" => $habitacion->getTipo(),
            "precio" => $habitacion->getPrecio(),
            "foto" => $habitacion->getFoto()
        ]);
    }

    // ACTUALIZAR HABITACION
    public function actualizar(Habitacion $habitacion) {
        $sql = "UPDATE habitacion
                SET numero = :numero,
                    piso = :piso,
                    tipo = :tipo,
                    precio = :precio,
                    foto = :foto
                WHERE id = :id";

        $stmt = $this->conexion->prepare($sql);

        return $stmt->execute([
            "id" => $habitacion->getId(),
            "numero" => $habitacion->getNumero(),
            "piso" => $habitacion->getPiso(),
            "tipo" => $habitacion->getTipo(),
            "precio" => $habitacion->getPrecio(),
            "foto" => $habitacion->getFoto()
        ]);
    }

    // ELIMINAR HABITACION
    public function eliminar($id) {
        $sql = "DELETE FROM habitacion WHERE id = :id";

        $stmt = $this->conexion->prepare($sql);

        return $stmt->execute([
            "id" => $id
        ]);
    }
}
?>
