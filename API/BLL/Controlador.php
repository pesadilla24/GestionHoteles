<?php // Este es el Controlador Manager general de todo el sistema. Todo tiene que pasar por esta clase
     require_once 'DAL/AccesoDatos.php';       
     
 class Controlador  {
    
    protected $iaccesoDatos;
    
    public function __construct(IAccesodatos $iaccesoDatos)
    {
        $this->iaccesoDatos=new AccesoDatos();
    }             
  
    public function ObtenerListadoUsuarios() 
    {
       return $this->iaccesoDatos->ObtenerListadoUsuarios();
    }
    
    public function ObtenerUsuario($DatoBuscar)
    {
        return $this->iaccesoDatos->ObtenerUsuario($DatoBuscar);
    }
    
    public function GuardarUsuario ($Object)
    {
       return $this->iaccesoDatos->GuardarUsuario($Object); 
    }
    
    public function EliminarUsuario ($DatoEliminar)
    {
       return $this->iaccesoDatos->EliminarUsuario($DatoEliminar); 
    }


    //hoteles
    public function ObtenerListadoHoteles() 
    {
       return $this->iaccesoDatos->ObtenerListadoHoteles();
    }
 public function GuardarHotel ($Object)
    {
       return $this->iaccesoDatos->GuardarHotel($Object); 
    }
     public function ObtenerHotel($DatoBuscar)
    {
        return $this->iaccesoDatos->ObtenerHotel($DatoBuscar);
    }
    
     public function GuardarControl ($Object)
    {
       return $this->iaccesoDatos->GuardarControl($Object); 
    }
 }
