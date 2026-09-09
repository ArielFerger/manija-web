<section class="mt-5">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Productos guardados</h2>

        <span
            id="cantidadProductos"
            class="badge text-bg-secondary"
        >
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
                    <td
                        colspan="4"
                        class="text-center text-muted"
                    >
                        No hay productos guardados.
                    </td>
                </tr>

            </tbody>

        </table>

    </div>

</section>

<div
    class="modal fade"
    id="modalEditarProducto"
    tabindex="-1"
    aria-labelledby="modalEditarProductoLabel"
    aria-hidden="true"
>

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h5
                    class="modal-title"
                    id="modalEditarProductoLabel"
                >
                    Editar producto
                </h5>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Cerrar"
                ></button>

            </div>


            <div class="modal-body">

                <div class="mb-3">

                    <label
                        for="editarNombre"
                        class="form-label"
                    >
                        Nombre del producto
                    </label>

                    <input
                        type="text"
                        class="form-control"
                        id="editarNombre"
                    >

                </div>


                <div class="mb-3">

                    <label
                        for="editarPrecio"
                        class="form-label"
                    >
                        Precio
                    </label>

                    <input
                        type="number"
                        class="form-control"
                        id="editarPrecio"
                        min="0"
                        step="0.01"
                    >

                </div>


                <div class="mb-3">

                    <label
                        for="editarDescripcion"
                        class="form-label"
                    >
                        Descripción
                    </label>

                    <textarea
                        class="form-control"
                        id="editarDescripcion"
                        rows="3"
                    ></textarea>

                </div>


                <div id="mensajeEditarProducto"></div>

            </div>


            <div class="modal-footer">

                <button
                    type="button"
                    class="btn btn-secondary"
                    data-bs-dismiss="modal"
                >
                    Cancelar
                </button>

                <button
                    type="button"
                    class="btn btn-primary"
                    onclick="guardarEdicionProducto()"
                >
                    Guardar cambios
                </button>

            </div>

        </div>

    </div>

</div>


<script>

let productoEditando = null;

function obtenerProductos() {

    try {

        const datos = localStorage.getItem("productos");

        if (!datos) {
            return [];
        }

        const productos = JSON.parse(datos);

        return Array.isArray(productos)
            ? productos
            : [];

    } catch (error) {

        localStorage.removeItem("productos");

        return [];
    }
}

function mostrarProductos() {

    const productos = obtenerProductos();

    const tabla = document.getElementById("tablaProductos");
    const cantidad = document.getElementById("cantidadProductos");

    tabla.innerHTML = "";


    cantidad.textContent =
        productos.length +
        (productos.length === 1
            ? " producto"
            : " productos");

    if (productos.length === 0) {

        tabla.innerHTML = `
            <tr>
                <td
                    colspan="4"
                    class="text-center text-muted"
                >
                    No hay productos guardados.
                </td>
            </tr>
        `;

        return;
    }

    productos.forEach(function (producto, index) {

        const fila = document.createElement("tr");


        const nombre =
            producto.nombre?.trim() !== ""
                ? producto.nombre
                : "Sin nombre";


        const precio =
            producto.precio !== "" &&
            producto.precio !== null &&
            producto.precio !== undefined &&
            !isNaN(Number(producto.precio))
                ? "$" + Number(producto.precio).toFixed(2)
                : "Sin precio";


        const descripcion =
            producto.descripcion?.trim() !== ""
                ? producto.descripcion
                : "Sin descripción";


        fila.innerHTML = `

            <td>
                ${escapeHTML(nombre)}
            </td>

            <td>
                ${escapeHTML(precio)}
            </td>

            <td>
                ${escapeHTML(descripcion)}
            </td>

            <td class="text-center">

                <div class="d-flex justify-content-center gap-2">

                    <button
                        type="button"
                        class="btn btn-warning btn-sm"
                        onclick="editarProducto(${index})"
                    >
                        Editar
                    </button>

                    <button
                        type="button"
                        class="btn btn-danger btn-sm"
                        onclick="eliminarProducto(${index})"
                    >
                        Eliminar
                    </button>

                </div>

            </td>

        `;

        tabla.appendChild(fila);

    });

}

function editarProducto(index) {

    const productos = obtenerProductos();

    if (!productos[index]) {
        return;
    }


    productoEditando = index;

    const producto = productos[index];


    document.getElementById("editarNombre").value =
        producto.nombre ?? "";


    document.getElementById("editarPrecio").value =
        producto.precio ?? "";


    document.getElementById("editarDescripcion").value =
        producto.descripcion ?? "";


    document.getElementById("mensajeEditarProducto").innerHTML = "";


    const modalElement =
        document.getElementById("modalEditarProducto");


    const modal =
        bootstrap.Modal.getOrCreateInstance(modalElement);


    modal.show();

}

function guardarEdicionProducto() {

    if (productoEditando === null) {
        return;
    }


    const nombre =
        document.getElementById("editarNombre").value.trim();


    const precioTexto =
        document.getElementById("editarPrecio").value.trim();


    const descripcion =
        document.getElementById("editarDescripcion").value.trim();

    if (precioTexto !== "") {

        const precio = Number(precioTexto);

        if (isNaN(precio) || precio < 0) {

            document.getElementById(
                "mensajeEditarProducto"
            ).innerHTML = `
                <div class="alert alert-warning">
                    El precio debe ser un número mayor o igual a 0.
                </div>
            `;

            return;
        }
    }


    const productos = obtenerProductos();


    if (!productos[productoEditando]) {
        return;
    }


    productos[productoEditando] = {

        nombre: nombre,

        precio: precioTexto === ""
            ? ""
            : Number(precioTexto),

        descripcion: descripcion

    };


    localStorage.setItem(
        "productos",
        JSON.stringify(productos)
    );

    const modalElement =
        document.getElementById("modalEditarProducto");


    const modal =
        bootstrap.Modal.getOrCreateInstance(modalElement);


    modal.hide();


    productoEditando = null;

    mostrarProductos();

}

function eliminarProducto(index) {

    if (!confirm("¿Está seguro de eliminar este producto?")) {
        return;
    }


    const productos = obtenerProductos();


    productos.splice(index, 1);


    localStorage.setItem(
        "productos",
        JSON.stringify(productos)
    );


    mostrarProductos();

}

function escapeHTML(valor) {

    const div =
        document.createElement("div");

    div.textContent =
        valor ?? "";

    return div.innerHTML;
}

document.addEventListener(
    "DOMContentLoaded",
    mostrarProductos
);

</script>