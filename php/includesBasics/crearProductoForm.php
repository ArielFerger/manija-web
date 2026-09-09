<form id="productoForm" class="row g-3">

    <div class="col-md-8">

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


    <div class="col-md-4">

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


    <div class="col-12">

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


    <div class="col-12" id="mensajeProducto"></div>


    <div class="col-12">

        <button
            type="submit"
            id="btnGuardarProducto"
            class="btn btn-primary"
            disabled
        >
            Guardar producto
        </button>

    </div>

</form>
