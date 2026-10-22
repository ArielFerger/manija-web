document.addEventListener("DOMContentLoaded", function(){
    if(document.getElementById("tablaProductos")){
        new DataTable("#tablaProductos", {
            pageLength: 5,
            lengthMenu: [5, 10, 25],
            order: [],
            columnDefs: [{targets: 3, orderable: false, searchable: false}],
            language: {
                search: "Buscar:",
                lengthMenu: "Mostrar _MENU_ productos",
                info: "Mostrando _START_ a _END_ de _TOTAL_ productos",
                infoEmpty: "Mostrando 0 productos",
                infoFiltered: "(de _MAX_ productos en total)",
                zeroRecords: "No se encontraron productos",
                emptyTable: "No hay productos guardados",
                paginate: {first: "Primera", last: "Última", next: "Siguiente", previous: "Anterior"}
            }
        });
    }
});
