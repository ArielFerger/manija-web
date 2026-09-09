<form id="productoForm">

    <div class="mb-3">
        <label for="nombreProducto" class="form-label">
            Nombre del producto
        </label>

        <input
            type="text"
            class="form-control"
            id="nombreProducto"
            name="nombreProducto"
            placeholder="Ingrese el nombre del producto"
        >
    </div>

    <div class="mb-3">
        <label for="precioProducto" class="form-label">
            Precio
        </label>

        <input
            type="number"
            class="form-control"
            id="precioProducto"
            name="precioProducto"
            placeholder="Ingrese el precio"
            min="0"
            step="0.01"
        >
    </div>

    <div class="mb-3">
        <label for="descripcionProducto" class="form-label">
            Descripción
        </label>

        <textarea
            class="form-control"
            id="descripcionProducto"
            name="descripcionProducto"
            rows="3"
            placeholder="Ingrese una descripción"
        ></textarea>
    </div>

    <div id="mensajeProducto" class="mb-3"></div>

    <button
        type="submit"
        id="btnGuardarProducto"
        class="btn btn-primary"
    >
        Guardar producto
    </button>

</form>