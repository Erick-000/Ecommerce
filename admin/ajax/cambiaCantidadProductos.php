<?php   
    $productos = unserialize($_COOKIE['productos']);
    foreach($productos as $key => $value){
        if($_REQUEST['id'] == $value['id']){
            if($_REQUEST['tipo']=="menos" && $productos[$key]['cantidad'] > 0){   //Evita que se resten productos por debajo de 0 unidades
                   
                  $productos[$key]['cantidad']--;}
            
            if($_REQUEST['tipo']=="mas"){ 
                
                  $productos[$key]['cantidad']++;}
            }    
        }
    setcookie("productos", serialize($productos));
    echo json_encode($productos);
?>