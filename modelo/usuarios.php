<?php
class User {
    public $usuarioId;
    protected $nombre;
    protected $contrasena;
    protected $direccion;

    public function __construct($usuarioId, $nombre, $contrasena, $direccion) {
        $this->usuarioId = $usuarioId;
        $this->nombre = $nombre;
        $this->contrasena = $contrasena;
        $this->direccion = $direccion;
    }

    public function __get($atributo) {
        return $this->$atributo;
    }
}
?>