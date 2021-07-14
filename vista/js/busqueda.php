<script type="text/javascript">
    //   $("#id-formulario-busqueda-maritimo-terrestre").submit(function(e) {
    //  e.preventDefault();
    $("#busquedaBTN").click(function() {
        alert("Iniciando busqueda");
        var fechaInicio = $("#fechaInicio").val();
        var fechaTermino = $("#fechaTermino").val();
        var idCliente = $("#idCliente").val();
        var idEmpresa = $("#idEmpresa").val();

        var tablaProductos = $('#tablaproductos').DataTable();
        if (fechaInicio == "") {
            alert("Debe ingresar una fecha de Inicio de búsqueda.")
        } else {
            if (fechaTermino == "") {
                alert("Debe ingresar una fecha de Fin de búsqueda.")
            } else {
                //Fechas, terrestres y/o maritimos y tipos de trabajo y clientes             
          //  $(this)[0]
                var datosAgregar = new FormData();
                datosAgregar.append("tipoOperacion", "listarBusquedaMaritimoOTerrestre");
                datosAgregar.append("fechaInicio", fechaInicio);
                datosAgregar.append("fechaTermino", fechaTermino);
                datosAgregar.append("idCliente", idCliente);
                datosAgregar.append("idEmpresa", idEmpresa);
                //Tipos de trabajo y maritimo o terrestre
                $.ajax({
                    url: 'ajax/ajaxBusquedas.php',
                    type: 'POST',
                    data: datosAgregar,
                    processData: false,
                    contentType: false,
                    async: false,
                    success: function(respuesta) {
                        tablaProductos.clear();
                        tablaProductos.draw();
                        var valor1 = JSON.parse(respuesta);
                        contadora = valor1.length;
                        alert(contadora);
                        for (var i = 0; i < contadora; i++) {
                            tablaProductos.row.add([
                                valor1[i][1] + ' ' + valor1[i][2],
                                valor1[i][3],
                                valor1[i][4],
                                valor1[i][5],
                                valor1[i][6],
                            ]).draw(false);
                        }
                    }
                });
                $('#tablaproductos').dataTable();
            }
        }
    });
</script>