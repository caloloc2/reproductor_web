<?php

$respuesta['estado'] = false;

try{
    include_once('funciones/readfiles.php');

    if (isset($_POST)){
        $modulo = $_POST['modulo'];
        
        $lectura = new ReadFiles("../videos.player");    

        if ($modulo=='read'){
            $respuesta['datos'] = $lectura->get_file();
        }else{
            $campos = $_POST['campos'];
            $respuesta['datos'] = $lectura->write_file($campos, false);
        }
        
        $respuesta['estado'] = true;
    }
}catch(Exception $e){
    $respuesta['error'] = $e->getMessage();
}

echo json_encode($respuesta);