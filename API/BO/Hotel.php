<?php // Clase que representa la estructura en BD para Usuarios

class Hotel implements JsonSerializable
{
    protected $nit = 0;
    protected $nombre;
    protected $direccion;
      protected $id_ciudad;
        protected $num_habitaciones;
    
    public function __construct() {}
        
    
    function getNit() {
        return $this->nit;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getDireccion() {
        return $this->direccion;
    }

     function getId_ciudad() {
        return $this->id_ciudad;
    }

      function getNum_habitaciones() {
        return $this->num_habitaciones;
    }


    function setNit($nit) {
        $this->nit = $nit;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setId_Ciudad($id_ciudad) {
        $this->id_ciudad = $id_ciudad;
    }

    function setNum_habitaciones($num_habitaciones) {
        $this->num_habitaciones = $num_habitaciones;
    }

    
    public function jsonSerialize() // Esto es para poder visualizar bien el objeto Usuario como JSON
    {
        return 
        [
            'nit' => $this->getNit(),
            'nombre'    => $this->getNombre(),
            'direccion'  => $this->getDireccion(),
            'id_ciudad'  => $this->getId_ciudad(),
            'num_habitaciones'  => $this->getNum_habitaciones(),

        ];
    }
}