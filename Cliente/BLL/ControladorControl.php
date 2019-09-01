<?php
     require_once '../BO/Control.php';     
     
     //$url = 'http://localhost/API/control/'. filter_input(INPUT_POST, 'itNit',FILTER_SANITIZE_NUMBER_INT);
    
        $control = new Control();
        $control->setId_hotel(filter_input(INPUT_POST, 'itNit2',FILTER_SANITIZE_NUMBER_INT));
        $control->setCantidad(filter_input(INPUT_POST, 'itCantidad',FILTER_SANITIZE_STRING));
        $control->setId_tipoh(filter_input(INPUT_POST, 'itId_tipoh',FILTER_SANITIZE_STRING));     
        $control->setId_tipoa(filter_input(INPUT_POST, 'itId_tipoa',FILTER_SANITIZE_STRING));     
       
                
        $ch = curl_init('http://localhost/API/control');
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($control));     
        print_r($control);   
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");             
   
        
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                     
     $response = curl_exec($ch);
     curl_close($ch);  
     echo $response;         