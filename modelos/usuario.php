<?php
function buscarUsuario($conexion, $usuario){
    $consulta = $conexion->prepare("SELECT id, usuario, password FROM usuarios WHERE usuario=?");
    $consulta->bind_param("s", $usuario);
    $consulta->execute();
    return $consulta->get_result()->fetch_assoc();
}
