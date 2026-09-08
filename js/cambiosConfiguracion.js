document.addEventListener("DOMContentLoaded", function () {

    const modoOscuro = document.getElementById("modoOscuro");
    const fuente = document.getElementById("fuente");

    const configuracion =
        JSON.parse(localStorage.getItem("configuracion")) || {};

    function aplicarConfiguracion() {
        const oscuro = configuracion.modoOscuro === true;
        const fuenteActual = configuracion.fuente || "Arial";

        document.body.classList.toggle("bg-dark", oscuro);
        document.body.classList.toggle("text-white", oscuro);
        document.body.style.fontFamily = fuenteActual;

        document.querySelectorAll(".card").forEach(function (card) {
            card.classList.toggle("bg-dark", oscuro);
            card.classList.toggle("text-white", oscuro);
        });

        document.querySelectorAll(".card-header").forEach(function (header) {
            header.classList.toggle("bg-dark", oscuro);
            header.classList.toggle("text-white", oscuro);
        });

        document.querySelectorAll(".table").forEach(function (table) {
            table.classList.toggle("table-dark", oscuro);
        });

        document.querySelectorAll(".text-muted").forEach(function (element) {
            element.classList.toggle("text-white-50", oscuro);
        });
    }

    function guardarConfiguracion() {
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