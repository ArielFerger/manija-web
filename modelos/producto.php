<?php
function listarProductos($conexion){
    return $conexion->query("SELECT id, nombre, precio, descripcion FROM productos ORDER BY id DESC")->fetch_all(MYSQLI_ASSOC);
}

function buscarProducto($conexion, $id){
    $consulta = $conexion->prepare("SELECT id, nombre, precio, descripcion FROM productos WHERE id=?");
    $consulta->bind_param("i", $id);
    $consulta->execute();
    return $consulta->get_result()->fetch_assoc();
}

function agregarProducto($conexion, $nombre, $precio, $descripcion){
    $consulta = $conexion->prepare("INSERT INTO productos(nombre, precio, descripcion) VALUES(?, ?, ?)");
    $consulta->bind_param("sss", $nombre, $precio, $descripcion);
    $consulta->execute();
}

function modificarProducto($conexion, $id, $nombre, $precio, $descripcion){
    $consulta = $conexion->prepare("UPDATE productos SET nombre=?, precio=?, descripcion=? WHERE id=?");
    $consulta->bind_param("sssi", $nombre, $precio, $descripcion, $id);
    $consulta->execute();
}

function eliminarProducto($conexion, $id){
    $consulta = $conexion->prepare("DELETE FROM productos WHERE id=?");
    $consulta->bind_param("i", $id);
    $consulta->execute();
    return $consulta->affected_rows;
}
