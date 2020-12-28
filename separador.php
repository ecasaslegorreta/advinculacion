<?php 
    // archivo txt 
    $filas=file('remitentes.txt'); 
    foreach($filas as $value){
        list($nombre, $cargo, $area, $calle, $noInterior, $noExterior,$colonia,$cp,$ciudad,$telefono,$celular,$email) = explode(",", $value); 
        // imprimimos datos en pantalla 
        echo 'nombre: '.$nombre.'<br/>'; 
        echo 'cargo: '.$cargo.'<br/>'; 
        echo 'area: '.$area.'<br/>'; 
        echo 'calle: '.$calle.'<br/>'; 
        echo 'noInterior: '.$noInterior.'<br/>'; 
        echo 'noExterior: '.$noExterior.'<br/>';
        echo 'colonia: '.$colonia.'<br/>'; 
        echo 'cp: '.$cp.'<br/>'; 
        echo 'ciudad: '.$ciudad.'<br/>'; 
        echo 'telefono: '.$telefono.'<br/>'; 
        echo 'celular: '.$celular.'<br/>'; 
        echo 'email: '.$email.'<br/>'; 
  }
    ?>