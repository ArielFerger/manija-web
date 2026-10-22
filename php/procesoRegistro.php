<?php
session_start();
require_once __DIR__."/../config/conexion.php";
require_once __DIR__."/../modelos/usuario.php";

if(isset($_SESSION["usuario"])){
    header("Location: ../pages/inicio.php");
    exit;
}
if($_SERVER["REQUEST_METHOD"] !== "POST"){
    header("Location: ../pages/registro.php");
    exit;
}

$usuario = is_string($_POST["usuario"] ?? null) ? trim($_POST["usuario"]) : "";
$password = is_string($_POST["password"] ?? null) ? $_POST["password"] : "";
$confirmacion = is_string($_POST["confirmacion"] ?? null) ? $_POST["confirmacion"] : "";
$token = is_string($_POST["token"] ?? null) ? $_POST["token"] : "";
$error = "";

if(!isset($_SESSION["tokenRegistro"]) || !hash_equals($_SESSION["tokenRegistro"], $token)){
    $error = "El formulario venció. Volvé a completarlo.";
}elseif(!preg_match('/^[a-zA-Z0-9_.-]{3,50}$/', $usuario)){
    $error = "El usuario debe tener entre 3 y 50 caracteres: letras sin tilde, números, punto, guion o guion bajo.";
}elseif(mb_strlen($password)<8){
    $error = "La contraseña debe tener al menos 8 caracteres.";
}elseif(strlen($password)>72){
    $error = "La contraseña es demasiado larga. Probá una más corta.";
}elseif($password !== $confirmacion){
    $error = "Las contraseñas no coinciden.";
}else{
    try{
        $conexion = conectar();
        crearUsuario($conexion, $usuario, $password);
    }catch(mysqli_sql_exception $excepcion){
        if($excepcion->getCode() === 1062){
            $error = "Ese nombre de usuario ya está registrado. Elegí otro.";
        }else{
            error_log("ManijaWeb registro: ".$excepcion->getMessage());
            $error = "No pudimos crear la cuenta. Revisá que MySQL esté iniciado e intentá nuevamente.";
        }
    }
}

if($error !== ""){
    $_SESSION["errorRegistro"] = $error;
    $_SESSION["usuarioRegistro"] = substr($usuario, 0, 50);
    header("Location: ../pages/registro.php");
    exit;
}

unset($_SESSION["tokenRegistro"], $_SESSION["usuarioRegistro"], $_SESSION["errorRegistro"]);
header("Location: ../pages/login.php?mensaje=registro");
exit;
