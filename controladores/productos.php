<?php
require_once __DIR__."/../php/sesion.php";
require_once __DIR__."/../config/conexion.php";
require_once __DIR__."/../modelos/producto.php";

$productos = [];
$productoEditar = null;
$error = "";
$errorBD = false;
$avisos = ["alta"=>"Producto agregado correctamente.", "modificacion"=>"Cambios guardados correctamente.", "baja"=>"Producto eliminado correctamente."];
$aviso = is_string($_GET["mensaje"] ?? null) ? $_GET["mensaje"] : "";
$mensaje = $avisos[$aviso] ?? "";

if(!isset($_SESSION["token"])){
    $_SESSION["token"] = bin2hex(random_bytes(32));
}

try{
    $conexion = conectar();

    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $token = is_string($_POST["token"] ?? null) ? $_POST["token"] : "";
        $accion = is_string($_POST["accion"] ?? null) ? $_POST["accion"] : "";
        $id = filter_var($_POST["id"] ?? "", FILTER_VALIDATE_INT, ["options"=>["min_range"=>1]]);

        if(!hash_equals($_SESSION["token"], $token)){
            $error = "El formulario venció. Recargá la página e intentá nuevamente.";
        }elseif(!in_array($accion, ["alta", "modificacion", "baja"], true)){
            $error = "La operación no es válida.";
        }elseif($accion !== "alta" && (!$id || !buscarProducto($conexion, $id))){
            $error = "El producto ya no existe. Actualizá la lista.";
        }elseif($accion === "baja"){
            if(eliminarProducto($conexion, $id) === 0){
                $error = "El producto ya fue eliminado.";
            }
        }else{
            $nombre = is_string($_POST["nombre"] ?? null) ? trim($_POST["nombre"]) : "";
            $precio = is_string($_POST["precio"] ?? null) ? trim($_POST["precio"]) : "";
            $descripcion = is_string($_POST["descripcion"] ?? null) ? trim($_POST["descripcion"]) : "";
            $productoEditar = ["id"=>$accion === "modificacion" ? $id : "", "nombre"=>$nombre, "precio"=>$precio, "descripcion"=>$descripcion];

            if($nombre === "" || mb_strlen($nombre)>120 || $descripcion === "" || mb_strlen($descripcion)>1000){
                $error = "Completá el nombre (hasta 120 caracteres) y la descripción (hasta 1000).";
            }elseif(!preg_match('/^\d{1,8}(\.\d{1,2})?$/', $precio)){
                $error = "El precio debe estar entre 0 y 99999999.99, con hasta dos decimales.";
            }elseif($accion === "alta"){
                agregarProducto($conexion, $nombre, $precio, $descripcion);
            }else{
                modificarProducto($conexion, $id, $nombre, $precio, $descripcion);
            }
        }

        // Volvemos a la lista para no repetir el envío al actualizar.
        if($error === ""){
            header("Location: administracion.php?mensaje=".$accion);
            exit;
        }
    }elseif(isset($_GET["editar"])){
        $id = filter_var($_GET["editar"], FILTER_VALIDATE_INT, ["options"=>["min_range"=>1]]);
        $productoEditar = $id ? buscarProducto($conexion, $id) : null;
        if(!$productoEditar){
            $error = "No se encontró el producto que querés editar.";
        }
    }

    $productos = listarProductos($conexion);
}catch(mysqli_sql_exception $excepcion){
    error_log("ManijaWeb productos: ".$excepcion->getMessage());
    $error = "No pudimos acceder a la base de datos. Revisá que MySQL esté iniciado e intentá nuevamente.";
    $errorBD = true;
    $mensaje = "";
    http_response_code(503);
}
