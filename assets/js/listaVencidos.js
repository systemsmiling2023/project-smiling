$(()=>{
    mostrarVencidos();
});

function mostrarVencidos() {
    // Obtener fecha actual
    var fechaActual = new Date().toLocaleDateString();
    // Obtener todos los insumos con fecha de caducidad
    $.ajax({
        type: "GET",
        url: "notificarCaducidad",
        success: function (response) {
            
            $.each(response.insumo, function (key, value) {
                // Convertir fecha de caducidad a objeto Date
                let fecha = value['fechaCaducidad'];
                let date = fecha.replace(/[-]/g, '/');
                let jsDate = new Date(date).toLocaleDateString();
                var fechaCaducidad = new Date(jsDate).toLocaleDateString();
                
                let insumo = value['insumo'];
                let fechaCompra = value['fechaUltCompra'];
                var fechaUltCompra = new Date(fechaCompra).toLocaleDateString();
                // Agregar los datos a la tabla
                var fila = `<tr>
                    <td>${key + 1}</td>
                    <td>${insumo}</td>
                    <td>${fechaCaducidad}</td>
                    <td>${fechaUltCompra}</td>
                </tr>`;
                $('#bodyInsumosVencidos').append(fila);
            });
        }
    });
}
