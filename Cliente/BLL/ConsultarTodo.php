<?php

        $url = 'http://localhost/API/hoteles';         
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");                              
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                     
        $response = curl_exec($ch);
        curl_close($ch);  
		$data=json_decode($response);
		$removed=array_shift($data);
//print_r ($data);
 
    ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<div class="table-striped">
	<table class="table ">
	<thead class="thead-dark"><tr>
		<th scope='col'>#</th>
		<th scope='col'>NIT</th>
		<th scope='col'>NOMBRE</th>
		<th scope='col'>DIRECCION</th>
		<th scope='col'>CIUDAD</th>
		<th scope='col'>NUM_HABITACIONES</th>
		</tr>
	</thead>
	<?php  
	$cont=1;
	foreach ((array)$data as $idx ) { ?>

	 <tr>
	 <td><?php echo $cont++; ?></td>
	 <?php foreach ((array)$idx as $valor ) { ?>
	 
	 <td><?php echo $valor; ?></td> 
	 <?php } ?>
	 </tr>
	 <?php } ?> 
	 </table>
 </div>
<div class="card-footer bg-transparent text-right">
 	<button type="button" class="btn btn-dark" onclick="window.location.href='../index.html'" >Regresar</button>
 </div>