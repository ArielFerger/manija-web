<?php
function conectar(){
    ini_set("display_errors", "0");
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    #Ingresamos con los datos de conexion del servidor de la materia
    $conexion = new mysqli("127.0.0.1", "grupo12", "gRupp12#h66Tfva", "manija_web");
    $conexion->set_charset("utf8");
    return $conexion;
}
