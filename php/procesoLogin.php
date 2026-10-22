<?php
session_start();
require_once __DIR__."/../config/conexion.php";
require_once __DIR__."/../modelos/usuario.php";

function volverLogin($error){
    header("Location: ../pages/login.php?error=".$error);
    exit;
}

if($_SERVER["REQUEST_METHOD"] !== "POST"){
    volverLogin("campos");
}

$usuario = is_string($_POST["usuario"] ?? null) ? trim($_POST["usuario"]) : "";
$password = is_string($_POST["password"] ?? null) ? $_POST["password"] : "";
$captcha = is_string($_POST["captcha"] ?? null) ? strtoupper(trim($_POST["captcha"])) : "";
$codigo = $_SESSION["captcha"] ?? "";
unset($_SESSION["captcha"]);

if($usuario === "" || $password === "" || $captcha === ""){
    volverLogin("campos");
}
if($codigo === "" || $captcha !== $codigo){
    volverLogin("captcha");
}

try{
    $conexion = conectar();
    $datos = buscarUsuario($conexion, $usuario);
}catch(mysqli_sql_exception $error){
    error_log("ManijaWeb login: ".$error->getMessage());
    volverLogin("bd");
}

// La contraseña se compara con el hash guardado, no con un texto fijo.
if(!$datos || !password_verify($password, $datos["password"])){
    volverLogin("credenciales");
}

session_regenerate_id(true);
$_SESSION["usuario"] = $datos["usuario"];
$_SESSION["token"] = bin2hex(random_bytes(32));
header("Location: ../pages/inicio.php");
exit;
