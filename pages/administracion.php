<?php
require_once __DIR__."/../controladores/productos.php";
include("../php/includesBasics/header.php");
?>

<div class="container">

    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4 admin-toolbar">

        <div>
            <h1 class="h3 mb-1">Panel de administración</h1>
            <p class="text-muted mb-0">
                Gestión de productos y configuración del sitio.
            </p>
        </div>

        <span
            id="cantidadProductos"
            class="badge text-bg-primary fs-6 px-3 py-2"
        >
            <?= count($productos) ?> <?= count($productos) === 1 ? "producto" : "productos" ?>
        </span>

    </div>

    <?php if($error !== ""): ?>
        <div class="alert alert-danger" role="alert"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
    <?php if($mensaje !== ""): ?>
        <div class="alert alert-success" role="status"><?= htmlspecialchars($mensaje) ?></div>
    <?php endif; ?>
    <div class="row g-4">

        <div class="col-lg-8">

            <div class="card shadow-sm mb-4">

                <div class="card-header d-flex align-items-center gap-2">
                    <span>➕</span>
                    <h2 class="h5 mb-0"><?= !empty($productoEditar["id"]) ? "Editar producto" : "Nuevo producto" ?></h2>
                </div>

                <div class="card-body">

                    <?php if(!$errorBD){ include("../php/includesBasics/crearProductoForm.php"); }else{ ?>
<p>No se pueden guardar cambios hasta recuperar la conexión.</p>
<?php } ?>

                </div>

            </div>


            <div class="card shadow-sm">

                <div class="card-header d-flex align-items-center gap-2">
                    <span>📦</span>
                    <h2 class="h5 mb-0">Productos guardados</h2>
                </div>

                <div class="card-body">

                    <?php include("../php/includesBasics/mostrarProductos.php"); ?>

                </div>

            </div>

        </div>


        <div class="col-lg-4">

            <div class="card shadow-sm admin-sidebar-sticky">

                <div class="card-header d-flex align-items-center gap-2">
                    <span>⚙️</span>
                    <h2 class="h5 mb-0">Configuración</h2>
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
<script src="../js/tablaProductos.js"></script>

<?php include("../php/includesBasics/footer.php"); ?>
