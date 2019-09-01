<?php
     require_once '../BO/Hotel.php';     
     
     $url = 'http://localhost/API/hoteles/'. filter_input(INPUT_POST, 'itNit',FILTER_SANITIZE_NUMBER_INT);
     
     if ($_POST['itCampoClave'] == 'R') // R = Read Consultar un Hotel
     {
         $ch = curl_init($url);
         curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");           
     }                  
     elseif ($_POST['itCampoClave'] == 'D') // D = Delete Eliminar un Hotel
     {
         $ch = curl_init($url);
         curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");       
     }    
     else // Create o Update
     {
        $hotel = new Hotel();
        $hotel->setNit(filter_input(INPUT_POST, 'nit',FILTER_SANITIZE_NUMBER_INT));
        $hotel->setNombre(filter_input(INPUT_POST, 'nombre',FILTER_SANITIZE_STRING));
        $hotel->setDireccion(filter_input(INPUT_POST, 'direccion',FILTER_SANITIZE_STRING));     
        $hotel->setId_Ciudad(filter_input(INPUT_POST, 'id_ciudad',FILTER_SANITIZE_STRING));     
        $hotel->setNum_habitaciones(filter_input(INPUT_POST, 'num_habitaciones',FILTER_SANITIZE_STRING));     
               print_r($Hotel);
        $ch = curl_init('http://localhost/API/hoteles');
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($hotel));        
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");             
     }
        
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                     
     $response = curl_exec($ch);
     curl_close($ch);  
     echo $response;         