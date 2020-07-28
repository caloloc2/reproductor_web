<?php

include_once(__DIR__.'/readfiles.php');

$lectura = new ReadFiles(__DIR__."/archivo.txt");

if (isset($_POST)){
    $lectura->write_file($_POST, false);
}

$xxx = $lectura->get_file();

print_r($xxx);