<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ../pages/login.php");
    exit;
}

$usuario = trim($_POST["usuario"] ?? "");
$password = $_POST["password"] ?? "";

$usuarioCorrecto = "fcytuader";
$passwordCorrecta = "programacionavanzada";

if ($usuario === "" || $password === "") {
    header("Location: ../pages/login.php?error=campos");
    exit;
}

if ($usuario === $usuarioCorrecto && $password === $passwordCorrecta) {
    $_SESSION["usuario"] = $usuario;
    header("Location: ../pages/index.php");
    exit;
} else {
    header("Location: ../pages/login.php?error=credenciales");
    exit;
}