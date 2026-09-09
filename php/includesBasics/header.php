<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Manija Web</title>

    <link
        rel="shortcut icon"
        href="../image/iconoOficial.ico"
    >

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="../styles/stylesLogin.css"
    >

</head>


<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">

    <div class="container">

        <a
            class="navbar-brand fw-bold"
            href="index.php"
        >
            Manija Web
        </a>


        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Abrir navegación"
        >

            <span class="navbar-toggler-icon"></span>

        </button>


        <div
            class="collapse navbar-collapse"
            id="navbarNav"
        >

            <ul class="navbar-nav ms-auto">

                <li class="nav-item">

                    <a
                        class="nav-link"
                        href="index.php"
                    >
                        Inicio
                    </a>

                </li>


                <?php if (isset($_SESSION["usuario"])): ?>

                    <li class="nav-item">

                        <a
                            class="nav-link"
                            href="administracion.php"
                        >
                            Administración
                        </a>

                    </li>


                    <li class="nav-item">

                        <a
                            class="nav-link"
                            href="../php/logout.php"
                        >
                            Cerrar sesión
                        </a>

                    </li>

                <?php endif; ?>

            </ul>

        </div>

    </div>

</nav>


<main class="container py-4">


<script src="../js/cambiosConfiguracion.js"></script>