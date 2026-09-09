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

    <div class="col-lg-8 mx-auto">

        <p class="text-uppercase fw-semibold text-primary mb-2">
            Bienvenido a Manija Web
        </p>


        <h1>
            ¡Hola, <?php echo htmlspecialchars($_SESSION["usuario"]); ?>!
        </h1>


        <p class="lead text-muted mt-3">
            Has ingresado correctamente a la plataforma.
            Desde aquí podés administrar tus productos
            y configurar tu experiencia.
        </p>


        <img
            src="../image/monito.png"
            alt="Mascota de Manija Web"
            class="hero-monito"
        >


        <div class="mt-3">

            <a
                href="administracion.php"
                class="btn btn-primary btn-inicio"
            >
                Ir a Administración
            </a>

        </div>

    </div>

</section>



<section class="mb-5">

    <div class="text-center mb-4">

        <h2 class="fw-bold">
            ¿Qué podés hacer?
        </h2>

        <p class="text-muted">
            Accedé rápidamente a las principales funciones.
        </p>

    </div>


    <div class="row g-4">


        <div class="col-md-4">

            <div class="card shadow-sm inicio-card">

                <div class="card-body">

                    <div class="fs-1 mb-3">
                        📦
                    </div>

                    <h3 class="h4">
                        Productos
                    </h3>

                    <p class="text-muted">
                        Agregá, editá y eliminá productos
                        de manera sencilla.
                    </p>

                </div>

            </div>

        </div>



        <div class="col-md-4">

            <div class="card shadow-sm inicio-card">

                <div class="card-body">

                    <div class="fs-1 mb-3">
                        ⚙️
                    </div>

                    <h3 class="h4">
                        Configuración
                    </h3>

                    <p class="text-muted">
                        Personalizá la apariencia del sitio
                        con el modo oscuro y diferentes fuentes.
                    </p>

                </div>

            </div>

        </div>



        <div class="col-md-4">

            <div class="card shadow-sm inicio-card">

                <div class="card-body">

                    <div class="fs-1 mb-3">
                        💻
                    </div>

                    <h3 class="h4">
                        Administración
                    </h3>

                    <p class="text-muted">
                        Gestioná toda la información desde
                        un único lugar.
                    </p>

                </div>

            </div>

        </div>


    </div>

</section>



<section class="text-center py-4">

    <div class="card shadow-sm">

        <div class="card-body py-4">

            <h2 class="h4">
                Manija Web
            </h2>

            <p class="text-muted mb-0">
                Una aplicación desarrollada para
                Programación Avanzada.
            </p>

        </div>

    </div>

</section>



<?php include("../php/includesBasics/footer.php"); ?>