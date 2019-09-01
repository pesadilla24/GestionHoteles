<?php // Este es el servicio Rest como tal, quien recibe las peticiones desde el exterior
     require_once 'Funciones.php';       
     
     
class GestionAPI {
    
    public function __construct(){}
             
    public function API(){
        header('Content-Type: application/JSON');                
        $method = $_SERVER['REQUEST_METHOD'];
        switch ($method) {
        case 'GET':
             $this->ObtenerInformacion();
             break;     
        case 'POST':
             $this->AgregarHotel();
             break;                
        case 'PUT':
             $this->AgregarControl();
             break;                         
        case 'DELETE':
             $this->EliminarUsuario();
             break;
        default: 
                echo 'Metodo No Valido';
                break;
        }
    }
    
    
 function ObtenerInformacion(){
  if(isset($_GET['action']))
  {       
     $DatoBuscar=NULL;
     if(isset($_GET['id']))
     {
        $DatoBuscar = $_GET['id'];
     }
    
     if ($_GET['action']=='hoteles')
     {
        $controlador = Funciones::CrearControlador(); 
        $ad = new AccesoDatos();
        if ($DatoBuscar!= NULL) 
        {
         $response = $controlador->ObtenerHotel($DatoBuscar);             
        }    
        else
        {
           $response = $controlador->ObtenerListadoHoteles();              
        }   
        echo json_encode($response, JSON_PRETTY_PRINT);
     }         
  }
 }
 
 function AgregarHotel(){
     $obj = json_decode( file_get_contents('php://input') );   
     $objArr = (array)$obj;        
     if (empty($objArr))
     {
        $this->response(422,"Error","No hay datos json");                           
     }
     else
     {
                $hotel = new Hotel();    
                $hotel->setNit($obj->nit);
                $hotel->setNombre($obj->nombre);
                $hotel->setDireccion($obj->direccion);
                $hotel->setId_Ciudad($obj->id_ciudad);
                $hotel->setNum_habitaciones($obj->num_habitaciones);
                $controlador = Funciones::CrearControlador();
                $Resultado = $controlador->GuardarHotel($hotel); 
                if ($Resultado == 0)
                {
                   if ($hotel->getNit() == 0)
                   {
                     $this->response(200,"Exito", "El nuevo registro ha sido grabado");
                   }
                   else 
                   {
                     if ($Resultado == 0)
                     {  
                       $this->response(200,"Exito", "El registro ha sido actualizado");                         
                     }
                     else if ($Resultado == -2)
                     {             
                       $this->response(200,"Error","No existe este hotel");
                     }  
                     else
                     {
                       $this->response(200,"Error","Se ha producido un error accesando la base de datos");                         
                     }                  
                   }
                }                
                else 
                {
                 $this->response(200,"Error","Se ha producido un error accesando la base de datos");
                }                             
     }
 }
 
  function AgregarControl(){
     $obj = json_decode( file_get_contents('php://input') );   
     $objArr = (array)$obj;        
     if (empty($objArr))
     {
        $this->response(422,"Error","No hay datos json");                           
     }
     else
     {
                $control = new Control();    
                $control->setId_hotel($obj->id_hotel);
                $control->setCantidad($obj->cantidad);
                $control->setId_tipoh($obj->id_tipoh);
                $control->setId_tipoa($obj->id_tipoa);
                $controlador = Funciones::CrearControlador();
                $Resultado = $controlador->GuardarControl($control); 
                if ($Resultado == 0)
                {
                   if ($control->getId_hotel() == 0)
                   {
                     $this->response(200,"Exito", "El nuevo registro ha sido grabado");
                   }
                   else 
                   {
                     if ($Resultado == 0)
                     {  
                       $this->response(200,"Exito", "El registro ha sido actualizado");                         
                     }
                     else if ($Resultado == -2)
                     {             
                       $this->response(200,"Error","No existe este hotel");
                     }  
                     else
                     {
                       $this->response(200,"Error","Se ha producido un error accesando la base de datos");                         
                     }                  
                   }
                }                
                else 
                {
                 $this->response(200,"Error","Se ha producido un error accesando la base de datos");
                }                             
     }
 }
 
 function EliminarHotel(){
  if(isset($_GET['action']))
  {       
     $DatoBuscar=NULL;
     if(isset($_GET['id']))
     {
        $DatoBuscar = $_GET['id'];
     }
    
     if ($_GET['action']=='usuarios')
     {
         $controlador = Funciones::CrearControlador();
         $Resultado = $controlador->EliminarUsuario($DatoBuscar);
         if ($Resultado == 0)
         {
           $this->response(200,"Exito", "El registro ha sido eliminado");
         }
         else if ($Resultado == -2)
         {             
            $this->response(200,"Error","No existe este usuario");
         }
         else
         {             
            $this->response(200,"Error","Se ha producido un error accesando la base de datos");
         }
     }         
  }
 }
 
 
    function response($code=200, $status="", $message="") {
    http_response_code($code);
    if( !empty($status) && !empty($message) ){
        $response = array("status" => $status ,"message"=>$message);  
        echo json_encode($response,JSON_PRETTY_PRINT);    
    }            
 }   
}
