<?php $editando = !empty($productoEditar["id"]); ?>
<form id="productoForm" class="row g-3" method="post" action="administracion.php">
    <input type="hidden" name="token" value="<?= htmlspecialchars($_SESSION["token"]) ?>">
    <input type="hidden" name="accion" value="<?= $editando ? 'modificacion' : 'alta' ?>">
    <input type="hidden" name="id" value="<?= $editando ? (int)$productoEditar["id"] : '' ?>">
    <div class="col-md-8">
        <label for="nombreProducto" class="form-label">Nombre del producto</label>
        <input type="text" class="form-control" id="nombreProducto" name="nombre" required maxlength="120"
               value="<?= htmlspecialchars($productoEditar["nombre"] ?? '', ENT_QUOTES, 'UTF-8') ?>">
    </div>
    <div class="col-md-4">
        <label for="precioProducto" class="form-label">Precio</label>
        <input type="number" class="form-control" id="precioProducto" name="precio" required min="0" max="99999999.99" step="0.01"
               value="<?= htmlspecialchars($productoEditar["precio"] ?? '', ENT_QUOTES, 'UTF-8') ?>">
    </div>
    <div class="col-12">
        <label for="descripcionProducto" class="form-label">Descripción</label>
        <textarea class="form-control" id="descripcionProducto" name="descripcion" rows="3" required maxlength="1000"><?= htmlspecialchars($productoEditar["descripcion"] ?? '', ENT_QUOTES, 'UTF-8') ?></textarea>
    </div>
    <div class="col-12" id="mensajeProducto" role="alert"></div>
    <div class="col-12">
        <button type="submit" id="btnGuardarProducto" class="btn btn-primary"><?= $editando ? 'Guardar cambios' : 'Guardar producto' ?></button>
        <?php if($editando): ?>
            <a href="administracion.php" class="btn btn-secondary">Cancelar edición</a>
        <?php endif; ?>
    </div>
</form>
