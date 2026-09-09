<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit;
}

include("../php/includesBasics/header.php");

?>


<section class="hero-inicio mb-5">

    <div class="row align-items-center g-4">

        <div class="col-lg-7">

            <p class="text-uppercase fw-semibold text-primary mb-2">
                Bienvenido a Manija Web
            </p>

            <h1>
                ¡Hola, <?php echo htmlspecialchars($_SESSION["usuario"]); ?>!
            </h1>

            <p class="lead text-muted mt-3 mb-4">
                Has ingresado correctamente a la plataforma.
                Desde aquí podés administrar tus productos
                y configurar tu experiencia.
            </p>

            <a
                href="administracion.php"
                class="btn btn-primary btn-inicio"
            >
                Ir a Administración
            </a>

        </div>


        <div class="col-lg-5 text-center">

            <img
                src="../image/monito.png"
                alt="Mascota de Manija Web"
                class="hero-monito"
            >

        </div>

    </div>

</section>


<section class="mb-5">

    <div class="mb-4">

        <h2 class="fw-bold">
            ¿Qué podés hacer?
        </h2>

        <p class="text-muted mb-0">
            Accedé rápidamente a las principales funciones.
        </p>

    </div>


    <div class="row g-4">


        <div class="col-md-4">

            <div class="card shadow-sm inicio-card h-100">

                <div class="card-body">

                    <div class="icono-inicio mb-3">
                        📦
                    </div>

                    <h3 class="h5">
                        Productos
                    </h3>

                    <p class="text-muted mb-0">
                        Agregá, editá y eliminá productos
                        de manera sencilla.
                    </p>

                </div>

            </div>

        </div>


        <div class="col-md-4">

            <div class="card shadow-sm inicio-card h-100">

                <div class="card-body">

                    <div class="icono-inicio mb-3">
                        ⚙️
                    </div>

                    <h3 class="h5">
                        Configuración
                    </h3>

                    <p class="text-muted mb-0">
                        Personalizá la apariencia del sitio
                        con el modo oscuro y diferentes fuentes.
                    </p>

                </div>

            </div>

        </div>


        <div class="col-md-4">

            <div class="card shadow-sm inicio-card inicio-card-destacada h-100">

                <div class="card-body">

                    <div class="icono-inicio icono-inicio-destacado mb-3">
                        💻
                    </div>

                    <h3 class="h5">
                        Administración
                    </h3>

                    <p class="text-muted mb-3">
                        Gestioná toda la información desde
                        un único lugar.
                    </p>

                    <a
                        href="administracion.php"
                        class="btn btn-outline-primary btn-sm"
                    >
                        Ir ahora →
                    </a>

                </div>

            </div>

        </div>


    </div>

</section>


<?php include("../php/includesBasics/footer.php"); ?>
