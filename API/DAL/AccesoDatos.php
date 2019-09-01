<?php // DAL: Data Access Layer - Capa Acceso Datos

require_once 'Conexion.php';
require_once 'BO/Usuario.php';
require_once 'BO/Hotel.php';
require_once 'BO/Control.php';
require_once 'IAccesodatos.php';

class AccesoDatos implements IAccesodatos{
    
    private $cn = NULL;      // Alias para la Conexion
    private $vecr = array(); // Vector con Resultados
  
   private static function BuscarRegistro($DatoBuscar)
   { // Funcion para buscar un registro especifico             
     try 
     {           
        $cn = Conexion::ObtenerConexion();
        $rs= $cn->query("CALL spr_Listados('" . $DatoBuscar . "')");
        $vecresultado = array(); // Recorremos el resultado de la consulta y lo almacenamos en el array
        while ($fila = $rs->fetch_row()) {
               array_push($vecresultado, $fila);                
        }
        mysqli_free_result($rs);
        mysqli_close($cn);
        return $vecresultado;
     }
     catch (Exception $ex)
     { 
       mysqli_close($cn);
       echo $ex;     
     }
   }
  
    public function ObtenerListadoUsuarios() {
     $cn = Conexion::ObtenerConexion();
     $DatoBuscar = 0;
     $ListaUsuarios = array();
     $vecr = array(); 
     try
        {
             $rs= $cn->query("CALL spr_Listados('" . $DatoBuscar . "')");  
             $i=0;
             while ($fila = $rs->fetch_row()) {
                    array_push($vecr, $fila);   
                    $usuario = new Usuario();
                    $usuario->setUsuario_id($vecr[$i][0]);
                    $usuario->setNombres($vecr[$i][1]);
                    $usuario->setApellidos($vecr[$i][2]); 
                    array_push($ListaUsuarios, $usuario);
                    $i++;
             }
             mysqli_free_result($rs);
             mysqli_close($cn);
             return $ListaUsuarios;
       }
       catch (Exception $ex)
       {
           echo $ex;
       }   
  }

    public function ObtenerListadoHoteles() {
     $cn = Conexion::ObtenerConexion();
     $DatoBuscar = 0;
     $ListaHoteles = array();
     $vecr = array(); 
     try
        {
             $rs= $cn->query("SELECT * FROM HOTEL");  
             // $rs= $cn->query("CALL spr_ListadoHoteles('" . $DatoBuscar . "')");  
             $i=0;
             while ($fila = $rs->fetch_row()) {
                    array_push($vecr, $fila);   
                    $hotel = new Hotel();
                    $hotel->setNit($vecr[$i][0]);
                    $hotel->setNombre($vecr[$i][1]);
                    $hotel->setDireccion($vecr[$i][2]); 
                    $hotel->setId_Ciudad($vecr[$i][3]); 
                    $hotel->setNum_habitaciones($vecr[$i][4]); 
                    array_push($ListaHoteles, $hotel);
                    $i++;
             }
             mysqli_free_result($rs);
             mysqli_close($cn);
             return $ListaHoteles;
       }
       catch (Exception $ex)
       {
           echo $ex;
       }   
  }

 public function ObtenerHotel($DatoBuscar)
   { // Funcion para buscar un registro especifico             
     try 
     {           
        $cn = Conexion::ObtenerConexion();
        $rs= $cn->query("SELECT * FROM HOTEL where nit='"  . $DatoBuscar . "'");
        $vecr = array(); // Recorremos el resultado de la consulta y lo almacenamos en el array
         $i=0;
        while ($fila = $rs->fetch_row()) {
               array_push($vecr, $fila);  
                $hotel = new Hotel();
                    $hotel->setNit($vecr[$i][0]);
                    $hotel->setNombre($vecr[$i][1]);
                    $hotel->setDireccion($vecr[$i][2]); 
                    $hotel->setId_Ciudad($vecr[$i][3]); 
                    $hotel->setNum_habitaciones($vecr[$i][4]); 
                    array_push($vecr, $hotel);              
        }
        mysqli_free_result($rs);
        mysqli_close($cn);
        return $hotel;
     }
     catch (Exception $ex)
     { 
       mysqli_close($cn);
       echo $ex;     
     }
   }

    public function GuardarUsuario($usuario) {
     $cn = Conexion::ObtenerConexion();    
     try
     {        
        $cn->query("SET @result = 1");
        $cn->query("CALL spr_IUUsuarios('" . $usuario->getUsuario_id() . "', 
                                        '" . $usuario->getNombres() . "', 
                                        '" . $usuario->getApellidos() . "',                                               
                                        @result)");

          $res = $cn->query("SELECT @result AS result");
          $row = $res->fetch_assoc();
          mysqli_close($cn);
          if($row['result'] == 0) {
            return 0;
          }
          else {
              return -1;
          }
   }
   catch (Exception $ex)
   {
       mysqli_close($cn);
       echo $ex;
   }     
 } 

  public function GuardarHotel($hotel) {
     $cn = Conexion::ObtenerConexion();    
     try
     {        
       // $cn->query("SET @result = 1");
        $cn->query("INSERT INTO HOTEL (NIT, NOMBRE,DIRECCION,ID_CIUDAD,TOTAL_HABITACIONES) VALUES ('" . $hotel->getNit() . "', 
                                        '" . $hotel->getNombre() . "', 
                                        '" . $hotel->getDireccion() . "',                                               
                                        '" . $hotel->getId_ciudad() . "',                                               
                                        '" . $hotel->getNum_habitaciones() . "')") or die($cn->error);

      //    $res = $cn->query("SELECT @result AS result");
        //  $row = $res->fetch_assoc();
          mysqli_close($cn);
         // if($row['result'] == 0) {
            return 0;
         // }
         // else {
         //     return -1;
         // }
   }
   catch (Exception $ex)
   {
       mysqli_close($cn);
       echo $ex;
   }     
 } 

  public function GuardarControl($control) {
     $cn = Conexion::ObtenerConexion();    
     try
     {        
       // $cn->query("SET @result = 1");
        $cn->query("INSERT INTO CONTROL (ID_HOTEL, CANTIDAD,ID_TIPO_H,ID_TIPOA) VALUES ('" . $control->getId_hotel() . "', 
                                        '" . $control->getCantidad() . "', 
                                        '" . $control->getId_tipoh() . "',                                                            
                                        '" . $control->getId_tipoa() . "')") or die($cn->error);

      //    $res = $cn->query("SELECT @result AS result");
        //  $row = $res->fetch_assoc();
          mysqli_close($cn);
         // if($row['result'] == 0) {
            return 0;
         // }
         // else {
         //     return -1;
         // }
   }
   catch (Exception $ex)
   {
       mysqli_close($cn);
       echo $ex;
   }     
 } 
  
    public function ObtenerUsuario($DatoBuscar) {  
     try
        {         
          $vecr = AccesoDatos::BuscarRegistro($DatoBuscar);
          if ($vecr!= NULL)
          {
            $usuario = new Usuario();
            $usuario->setUsuario_id($vecr[0][0]);
            $usuario->setNombres($vecr[0][1]);
            $usuario->setApellidos($vecr[0][2]); 
            $vecr = NULL;
            return $usuario;
          }
          else
          {
              return NULL;
          }
       }
       catch (Exception $ex)
       {
           echo $ex;
       }   
    }

    public function EliminarUsuario($DatoEliminar)
    {
     try
     {   
        $cn = Conexion::ObtenerConexion();    
        $cn->query("SET @result = 1");
        $cn->query("CALL spr_DUsuario('" . $DatoEliminar . "',  @result)");

        $res = $cn->query("SELECT @result AS result");
        $row = $res->fetch_assoc();
        mysqli_close($cn);
        return $row['result'];
     }
     catch (Exception $ex)
     {
        mysqli_close($cn);
        echo $ex;
     }  
    }
}

?>


