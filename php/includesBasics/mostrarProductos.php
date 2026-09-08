<section class="mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Productos guardados</h2>
        <span id="cantidadProductos" class="badge text-bg-secondary">
            0 productos
        </span>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Descripción</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>

            <tbody id="tablaProductos">
                <tr>
                    <td colspan="4" class="text-center text-muted">
                        No hay productos guardados.
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</section>

<script>
function mostrarProductos() {
    const productos =
        JSON.parse(localStorage.getItem("productos")) || [];

    const tabla = document.getElementById("tablaProductos");
    const cantidad = document.getElementById("cantidadProductos");

    tabla.innerHTML = "";

    cantidad.textContent =
        productos.length +
        (productos.length === 1 ? " producto" : " productos");

    if (productos.length === 0) {
        tabla.innerHTML = `
            <tr>
                <td colspan="4" class="text-center text-muted">
                    No hay productos guardados.
                </td>
            </tr>
        `;
        return;
    }

    productos.forEach((producto, index) => {
        const fila = document.createElement("tr");

        fila.innerHTML = `
            <td>${escapeHTML(producto.nombre)}</td>
            <td>$${escapeHTML(String(producto.precio))}</td>
            <td>${escapeHTML(producto.descripcion)}</td>
            <td class="text-center">
                <button
                    type="button"
                    class="btn btn-danger btn-sm"
                    onclick="eliminarProducto(${index})">
                    Eliminar
                </button>
            </td>
        `;

        tabla.appendChild(fila);
    });
}

function eliminarProducto(index) {
    const productos =
        JSON.parse(localStorage.getItem("productos")) || [];

    productos.splice(index, 1);

    localStorage.setItem(
        "productos",
        JSON.stringify(productos)
    );

    mostrarProductos();
}

function escapeHTML(valor) {
    const div = document.createElement("div");
    div.textContent = valor ?? "";
    return div.innerHTML;
}

document.addEventListener(
    "DOMContentLoaded",
    mostrarProductos
);
</script>