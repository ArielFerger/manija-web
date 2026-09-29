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
$captcha = strtoupper(trim($_POST["captcha"] ?? ""));

$usuarioCorrecto = "fcytuader";
$passwordCorrecta = "programacionavanzada";

if ($usuario === "" || $password === "" || $captcha === "") {
    header("Location: ../pages/login.php?error=campos");
    exit;
}

// Se borra después de cada intento para que no se pueda reutilizar.
$codigoCorrecto = $_SESSION["captcha"] ?? null;
unset($_SESSION["captcha"]);

if ($codigoCorrecto === null || $captcha !== $codigoCorrecto) {
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
