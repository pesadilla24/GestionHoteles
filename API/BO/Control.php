<?php // Clase que representa la estructura en BD para Control

class Control implements JsonSerializable
{
    protected $id_control = 0;
    protected $id_hotel;
    protected $cantidad;
    protected $id_tipoh;
	protected $id_tipoa;
    
    public function __construct() {}
        
    
    function getId_control() {
        return $this->id_control;
    }

    function getId_hotel() {
        return $this->id_hotel;
    }

    function getCantidad() {
        return $this->cantidad;
    }

    function getId_tipoh() {
        return $this->id_tipoh;
    }

	function getId_tipoa() {
        return $this->id_tipoa;
    }


    function setId_control($id_control) {
        $this->id_control = $id_control;
    }

    function setId_hotel($id_hotel) {
        $this->id_hotel = $id_hotel;
    }

    function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    function setId_tipoh($id_tipoh) {
        $this->id_tipoh = $id_tipoh;
    }
	function setId_tipoa($id_tipoa) {
        $this->id_tipoa = $id_tipoa;
    }

    
    public function jsonSerialize() 
    {
        return 
        [
            'id_control' => $this->getId_control(),
            'id_hotel'    => $this->getId_hotel(),
            'cantidad'    => $this->getCantidad(),
            'id_tipoh'  => $this->getId_tipoh(),    
			'id_tipoa'  => $this->getId_tipoa(),  
		];
    }
}