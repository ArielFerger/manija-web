document.addEventListener("DOMContentLoaded", function () {

    const modoOscuro = document.getElementById("modoOscuro");
    const fuente = document.getElementById("fuente");

    function obtenerConfiguracion() {
        try {
            const datos = localStorage.getItem("configuracion");
            const configuracion = datos ? JSON.parse(datos) : {};

            return configuracion && typeof configuracion === "object"
                ? configuracion
                : {};
        } catch (error) {
            localStorage.removeItem("configuracion");
            return {};
        }
    }

    const configuracion = obtenerConfiguracion();

    function aplicarConfiguracion() {
        const oscuro = configuracion.modoOscuro === true;
        const fuenteActual = configuracion.fuente || "Arial";

        document.body.classList.toggle("modo-oscuro", oscuro);
        document.body.style.fontFamily = fuenteActual;

        document.querySelectorAll(".card").forEach(function (card) {
            card.classList.toggle("modo-oscuro-elemento", oscuro);
        });

        document.querySelectorAll(".card-header").forEach(function (header) {
            header.classList.toggle("modo-oscuro-elemento", oscuro);
        });

        document.querySelectorAll(".table").forEach(function (table) {
            table.classList.toggle("table-dark", oscuro);
        });

        document.querySelectorAll(".form-control, .form-select").forEach(function (element) {
            element.classList.toggle("modo-oscuro-input", oscuro);
        });

        /*
         * El color de ".text-muted" en modo oscuro se resuelve
         * por CSS (".modo-oscuro .text-muted"), no acá. Así
         * cubre también elementos generados dinámicamente
         * (como el mensaje de "No hay productos guardados"
         * que se recrea al agregar/eliminar productos) sin
         * depender de que este script vuelva a recorrer el DOM.
         */
    }

    function guardarConfiguracion() {
        if (!modoOscuro || !fuente) {
            return;
        }

        configuracion.modoOscuro = modoOscuro.checked;
        configuracion.fuente = fuente.value;

        localStorage.setItem(
            "configuracion",
            JSON.stringify(configuracion)
        );

        aplicarConfiguracion();
    }

    if (modoOscuro) {
        modoOscuro.checked = configuracion.modoOscuro === true;
        modoOscuro.addEventListener("change", guardarConfiguracion);
    }

    if (fuente) {
        fuente.value = configuracion.fuente || "Arial";
        fuente.addEventListener("change", guardarConfiguracion);
    }

    aplicarConfiguracion();
});