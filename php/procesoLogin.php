<?php
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ../../pages/login.php");
    exit;
}

$usuario = trim($_POST["usuario"] ?? "");
$password = $_POST["password"] ?? "";

$usuarioCorrecto = "fcytuader";
$passwordCorrecta = "programacionavanzada";

if ($usuario === "" || $password === "") {
    header("Location: ../../pages/login.php?error=campos");
    exit;
}

if ($usuario === $usuarioCorrecto && $password === $passwordCorrecta) {
    ?>

    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Ingreso correcto</title>

        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
            rel="stylesheet"
        >
    </head>

    <body>

        <div class="container mt-5">

            <div class="row justify-content-center">

                <div class="col-md-6">

                    <div class="alert alert-success text-center" role="alert">

                        <h1 class="alert-heading">
                            Ingreso correctamente
                        </h1>

                        <p>
                            Bienvenido, <?php echo htmlspecialchars($usuario); ?>.
                        </p>

                        <hr>

                        <a href="../../pages/index.php" class="btn btn-success">
                            Continuar
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </body>

    </html>

    <?php

} else {
    header("Location: ../../pages/login.php?error=credenciales");
    exit;
}
?>