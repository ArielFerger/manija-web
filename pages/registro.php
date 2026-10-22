<?php
session_start();
if(isset($_SESSION["usuario"])){
    header("Location: inicio.php");
    exit;
}
if(!isset($_SESSION["tokenRegistro"])){
    $_SESSION["tokenRegistro"] = bin2hex(random_bytes(32));
}
$error = $_SESSION["errorRegistro"] ?? "";
$usuario = $_SESSION["usuarioRegistro"] ?? "";
unset($_SESSION["errorRegistro"], $_SESSION["usuarioRegistro"]);
include("../php/includesBasics/header.php");
?>

<div class="container login-container">
    <div class="card shadow">
        <div class="card-body">
            <h2 class="text-center mb-4">Crear cuenta</h2>
            <?php if($error !== ""): ?>
                <div class="alert alert-danger" role="alert"><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></div>
            <?php endif; ?>

            <form id="registroForm" action="../php/procesoRegistro.php" method="post">
                <input type="hidden" name="token" value="<?= htmlspecialchars($_SESSION["tokenRegistro"]) ?>">
                <div class="mb-3">
                    <label for="usuarioRegistro" class="form-label">Usuario</label>
                    <input type="text" class="form-control" id="usuarioRegistro" name="usuario" required
                           minlength="3" maxlength="50" pattern="[a-zA-Z0-9_.\-]{3,50}" autocomplete="username"
                           value="<?= htmlspecialchars($usuario, ENT_QUOTES, 'UTF-8') ?>" aria-describedby="ayudaUsuario">
                    <div class="form-text" id="ayudaUsuario">Entre 3 y 50 caracteres: letras sin tilde, números, punto, guion o guion bajo.</div>
                </div>
                <div class="mb-3">
                    <label for="passwordRegistro" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="passwordRegistro" name="password" required
                           minlength="8" maxlength="72" autocomplete="new-password" aria-describedby="ayudaPassword">
                    <div class="form-text" id="ayudaPassword">Usá al menos 8 caracteres.</div>
                </div>
                <div class="mb-3">
                    <label for="confirmarPassword" class="form-label">Repetir contraseña</label>
                    <input type="password" class="form-control" id="confirmarPassword" name="confirmacion" required
                           minlength="8" maxlength="72" autocomplete="new-password">
                </div>
                <p id="mensajeRegistro" class="text-danger small" role="alert"></p>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary" id="btnRegistrar">Crear cuenta</button>
                </div>
            </form>
            <p class="text-center mt-3 mb-0">¿Ya tenés cuenta? <a href="login.php">Iniciar sesión</a></p>
        </div>
    </div>
</div>

<script src="../js/validarRegistro.js"></script>
<?php include("../php/includesBasics/footer.php"); ?>
