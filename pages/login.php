<?php
session_start();

if (isset($_SESSION["usuario"])) {
    header("Location: inicio.php");
    exit;
}

// Generamos un código nuevo cada vez que se abre el formulario.
$caracteres = "ABCDEFGHJKLMNPQRSTUVWXYZ23456789";
$codigo = "";
for ($i = 0; $i < 5; $i++) {
    $codigo .= $caracteres[random_int(0, strlen($caracteres) - 1)];
}
$_SESSION["captcha"] = $codigo;

include("../php/includesBasics/header.php");
?>

<div class="container login-container">

    <div class="card shadow">

        <div class="card-body">

            <h2 class="text-center mb-4">Iniciar sesión</h2>

            <?php if (isset($_GET["error"])): ?>

                <?php if ($_GET["error"] === "campos"): ?>

                    <div class="alert alert-warning" role="alert">
                        Debe completar todos los campos.
                    </div>

                <?php elseif ($_GET["error"] === "credenciales"): ?>

                    <div class="alert alert-danger" role="alert">
                        Usuario o contraseña incorrectos.
                    </div>

                <?php elseif ($_GET["error"] === "captcha"): ?>

                    <div class="alert alert-danger" role="alert">
                        El código de verificación es incorrecto. Intentá nuevamente.
                    </div>

                <?php endif; ?>

            <?php endif; ?>


            <form
                id="loginForm"
                action="../php/procesoLogin.php"
                method="POST"
            >

                <div class="mb-3">

                    <label for="usuario" class="form-label">Usuario</label>

                    <input
                        type="text"
                        class="form-control"
                        id="usuario"
                        name="usuario"
                        placeholder="Ingrese su usuario"
                        autocomplete="username"
                    >

                </div>


                <div class="mb-3">

                    <label for="password" class="form-label">Contraseña</label>

                    <input
                        type="password"
                        class="form-control"
                        id="password"
                        name="password"
                        placeholder="Ingrese su contraseña"
                        autocomplete="current-password"
                    >

                </div>


                <div class="mb-3">
                    <label for="captcha" class="form-label">Escribí el código que ves:</label>
                    <div class="captcha-codigo" aria-label="Código de verificación">
                        <?php echo $codigo; ?>
                    </div>
                    <input type="text" class="form-control" id="captcha" name="captcha"
                           maxlength="5" autocomplete="off" required>
                    <a href="login.php" class="small">Generar otro código</a>
                </div>


                <div class="d-grid">

                    <button
                        type="submit"
                        id="btnIngresar"
                        class="btn btn-primary"
                        disabled
                    >Ingresar</button>

                </div>

            </form>

        </div>

    </div>

</div>


<script src="../js/validacionesForm.js"></script>

<?php include("../php/includesBasics/footer.php"); ?>
