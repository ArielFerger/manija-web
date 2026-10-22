<div class="table-responsive">
    <table id="tablaProductos" class="table table-striped table-bordered align-middle">
        <thead class="table-dark">
            <tr><th>Nombre</th><th>Precio</th><th>Descripción</th><th>Acciones</th></tr>
        </thead>
        <tbody>
        <?php foreach($productos as $producto): ?>
            <tr>
                <td><?= htmlspecialchars($producto["nombre"], ENT_QUOTES, 'UTF-8') ?></td>
                <td data-order="<?= htmlspecialchars($producto["precio"]) ?>">$<?= number_format((float)$producto["precio"], 2, ',', '.') ?></td>
                <td class="descripcion-producto"><?= htmlspecialchars($producto["descripcion"], ENT_QUOTES, 'UTF-8') ?></td>
                <td>
                    <div class="d-flex gap-2">
                        <a class="btn btn-warning btn-sm" href="administracion.php?editar=<?= (int)$producto["id"] ?>">Editar</a>
                        <form method="post" action="administracion.php" class="formEliminar">
                            <input type="hidden" name="accion" value="baja">
                            <input type="hidden" name="id" value="<?= (int)$producto["id"] ?>">
                            <input type="hidden" name="token" value="<?= htmlspecialchars($_SESSION["token"]) ?>">
                            <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                        </form>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
