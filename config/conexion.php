<?php
function conectar(){
    ini_set("display_errors", "0");
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $conexion = new mysqli("127.0.0.1", "manija", "manija123", "manija_web", 3306);
    $conexion->set_charset("utf8mb4");
    return $conexion;
}
