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

<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1>Panel de administración</h1>
            <p class="text-muted mb-0">
                Gestión de productos y configuración del sitio.
            </p>
        </div>
    </div>

    <div class="row g-4">

        <div class="col-lg-8">
            <div class="card shadow-sm">

                <div class="card-header">
                    <h2 class="h4 mb-0">Productos</h2>
                </div>

                <div class="card-body">

                    <?php include("../php/includesBasics/crearProductoForm.php"); ?>

                    <hr class="my-4">

                    <?php include("../php/includesBasics/mostrarProductos.php"); ?>

                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow-sm">

                <div class="card-header">
                    <h2 class="h4 mb-0">Configuración</h2>
                </div>

                <div class="card-body">

                    <div class="form-check form-switch mb-4">

                        <input
                            class="form-check-input"
                            type="checkbox"
                            id="modoOscuro"
                        >

                        <label
                            class="form-check-label"
                            for="modoOscuro"
                        >Modo oscuro</label>

                    </div>


                    <div class="mb-3">

                        <label
                            for="fuente"
                            class="form-label"
                        >Fuente del texto</label>

                        <select
                            class="form-select"
                            id="fuente"
                        >
                            <option value="Arial">Arial</option>

                            <option value="Verdana">Verdana</option>

                            <option value="Georgia">Georgia</option>

                            <option value="Courier New">Courier New</option>
                        </select>

                    </div>

                </div>
            </div>
        </div>

    </div>

</div>

<script src="../js/validarProductoForm.js"></script>
<script src="../js/guardarProductos.js"></script>
<script src="../js/cambiosConfiguracion.js"></script>

<?php include("../php/includesBasics/footer.php"); ?>