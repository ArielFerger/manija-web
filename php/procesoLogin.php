<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ../pages/login.php");
    exit;
}

unset($_SESSION["usuario"]);

$usuario = trim($_POST["usuario"] ?? "");
$password = $_POST["password"] ?? "";
$captcha = trim($_POST["captcha"] ?? "");

$usuarioCorrecto = "fcytuader";
$passwordCorrecta = "programacionavanzada";

if ($usuario === "" || $password === "" || $captcha === "") {
    header("Location: ../pages/login.php?error=campos");
    exit;
}

// Cada captcha se puede usar una sola vez.
$respuestaCorrecta = $_SESSION["captcha"] ?? null;
unset($_SESSION["captcha"]);

if ($respuestaCorrecta === null || $captcha !== (string) $respuestaCorrecta) {
    header("Location: ../pages/login.php?error=captcha");
    exit;
}

if ($usuario === $usuarioCorrecto && $password === $passwordCorrecta) {
    session_regenerate_id(true);
    $_SESSION["usuario"] = $usuario;
    header("Location: ../pages/inicio.php");
    exit;
} else {
    header("Location: ../pages/login.php?error=credenciales");
    exit;
}
