<?php
function buscarUsuario($conexion, $usuario){
    $consulta = $conexion->prepare("SELECT id, usuario, password FROM usuarios WHERE usuario=?");
    $consulta->bind_param("s", $usuario);
    $consulta->execute();
    return $consulta->get_result()->fetch_assoc();
}

function crearUsuario($conexion, $usuario, $password){
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $consulta = $conexion->prepare("INSERT INTO usuarios(usuario, password) VALUES(?, ?)");
    $consulta->bind_param("ss", $usuario, $hash);
    $consulta->execute();
}
