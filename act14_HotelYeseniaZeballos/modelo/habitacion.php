
<?php
class Habitacion {

    private $id;
    private $numero;
    private $piso;
    private $tipo;
    private $precio;
    private $foto;

    // CONSTRUCTOR
    public function __construct(
        $id = null,
        $numero = "",
        $piso = 1,
        $tipo = "",
        $precio = 0,
        $foto = ""
    ) {
        $this->id = $id;
        $this->numero = $numero;
        $this->piso = $piso;
        $this->tipo = $tipo;
        $this->precio = $precio;
        $this->foto = $foto;
    }

    // GETTERS
    public function getId() {
        return $this->id;
    }

    public function getNumero() {
        return $this->numero;
    }

    public function getPiso() {
        return $this->piso;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function getFoto() {
        return $this->foto;
    }

    // SETTERS
    public function setId($id) {
        $this->id = $id;
    }

    public function setNumero($numero) {
        $this->numero = $numero;
    }

    public function setPiso($piso) {
        $this->piso = $piso;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    public function setPrecio($precio) {
        $this->precio = $precio;
    }

    public function setFoto($foto) {
        $this->foto = $foto;
    }
}
?>
