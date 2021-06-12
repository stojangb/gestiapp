<script type="text/javascript">
    $("#recargar2").hide();
    $("#recargar1").show();
    $('#idMatricula').keyup(function() {
        $(this).val($(this).val().toUpperCase());
    });

    $('#vueltaFalsa').click(function() {
        $("#recargar2").hide();
        $("#recargar1").show();
        var fechaInicio = $("#fechaInicio").val();
        var fechaTermino = $("#fechaTermino").val();
        var idCliente = $("#idCliente").val();
        var tablaProductos = $('#tablaproductos').DataTable();

        if (fechaInicio == "") {
            alert("Debe ingresar una fecha de Inicio de búsqueda.")
        } else {
            if (fechaTermino == "") {
                alert("Debe ingresar una fecha de Fin de búsqueda.")
            } else {
                 //Fechas, clientes             
                var datosAgregar = new FormData();
                datosAgregar.append("tipoOperacion", "listarBusquedaVueltaFalsa");
                datosAgregar.append("fechaInicio", fechaInicio);
                datosAgregar.append("fechaTermino", fechaTermino);
                datosAgregar.append("idCliente", idCliente);
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
                        for (var i = 0; i < contadora; i++) {
                            if (valor1[i][7] == 1) {
                                vuelta1 = "Sí"
                            } else {
                                vuelta1 = "No"
                            }
                            tablaProductos.row.add([
                                '<form action="productos" method="post"><input hidden type="text" name="id" value="' + valor1[i][0] + '"><input style="margin-bottom: 4px;  margin-right:6px;" type="submit" value="Servicio: ' + valor1[i][0] + '" class="btn btn-outline-primary"></form>',
                                valor1[i][1] + ' ' + valor1[i][2],
                                valor1[i][3],
                                valor1[i][4],
                                valor1[i][5],
                                valor1[i][6],
                                     vuelta1,
                            ]).draw(false);
                        }
                    }
                });
                $('#tablaproductos').dataTable();
            }
        }
    });
    $('#idBotonBuscarCertificado').click(function(e) {
        $("#recargar2").hide();
        $("#recargar1").show();
        var tablaProductos = $('#tablaproductos').DataTable();
        var certificado = $('#idCertificado').val();
        var datosAgregar = new FormData();
        datosAgregar.append("tipoOperacion", "listarBusquedaCertificado");
        datosAgregar.append("certificado", certificado);
        var tablaProductos = $('#tablaproductos').DataTable();
        $.ajax({
            url: 'ajax/ajaxEmpresas.php',
            type: 'POST',
            data: datosAgregar,
            processData: false,
            contentType: false,
            success: function(respuesta) {
                $('#modalCertificado').modal("hide");
                tablaProductos.clear();
                tablaProductos.draw();
                var valor1 = JSON.parse(respuesta);
                contadora = valor1.length;
                if (contadora == 0) {
                    alert("Sin resultados");
                }
                for (var i = 0; i < contadora; i++) {
                    if (valor1[i][7] == 1) {
                        vuelta1 = "Sí"
                    } else {
                        vuelta1 = "No"
                    }
                    tablaProductos.row.add([
                        '<form action="productos" method="post"><input hidden type="text" name="id" value="' + valor1[i][0] + '"><input style="margin-bottom: 4px;  margin-right:6px;" type="submit" value="Servicio: ' + valor1[i][0] + '" class="btn btn-outline-primary"></form>',
                        valor1[i][1] + ' ' + valor1[i][2],
                        valor1[i][3],
                        valor1[i][4],
                        valor1[i][5],
                        valor1[i][6],
                             vuelta1,
                    ]).draw(false);
                }
            }
        });
    });

    $('#idBotonBuscarMatricula').click(function(e) {
        $("#recargar2").hide();
        $("#recargar1").show();
        var matricula = $('#idMatricula').val();
        var tablaProductos = $('#tablaproductos').DataTable();
        var datosAgregar = new FormData();
        datosAgregar.append("tipoOperacion", "listarBusquedaMatricula");
        datosAgregar.append("matricula", matricula);
        $.ajax({
            url: 'ajax/ajaxEmpresas.php',
            type: 'POST',
            data: datosAgregar,
            processData: false,
            contentType: false,
            success: function(respuesta) {
                $('#modalMatricula').modal("hide");
                tablaProductos.clear();
                tablaProductos.draw();
                var valor1 = JSON.parse(respuesta);
                contadora = valor1.length;
                if (contadora == 0) {
                    alert("Sin resultados");
                }
                for (var i = 0; i < contadora; i++) {
                    if (valor1[i][7] == 1) {
                        vuelta1 = "Sí"
                    } else {
                        vuelta1 = "No"
                    }
                    tablaProductos.row.add([
                        '<form action="productos" method="post"><input hidden type="text" name="id" value="' + valor1[i][0] + '"><input style="margin-bottom: 4px;  margin-right:6px;" type="submit" value="Servicio: ' + valor1[i][0] + '" class="btn btn-outline-primary"></form>',
                        valor1[i][1] + ' ' + valor1[i][2],
                        valor1[i][3],
                        valor1[i][4],
                        valor1[i][5],
                        valor1[i][6],
                             vuelta1,
                    ]).draw(false);
                }
            }
        });
    });

    $("#id-formulario-busqueda-maritimo-terrestre").submit(function(e) {
        e.preventDefault();
        $("#recargar2").hide();
        $("#recargar1").show();
        var fechaInicio = $("#fechaInicio").val();
        var fechaTermino = $("#fechaTermino").val();
        var idCliente = $("#idCliente").val();
        var tablaProductos = $('#tablaproductos').DataTable();

        if (fechaInicio == "") {
            alert("Debe ingresar una fecha de Inicio de búsqueda.")
        } else {
            if (fechaTermino == "") {
                alert("Debe ingresar una fecha de Fin de búsqueda.")
            } else {
                var todosMaritimo = $('input:checkbox[name=todosMaritimo]:checked').val()
                var todosTerrestre = $('input:checkbox[name=todosTerrestre]:checked').val()
                if (todosTerrestre != "trueTerrestre" && todosMaritimo != "trueMaritimo") {
                    alert("No ha seleccionado ningún producto");
                } else {
                    bloquearTipoTrabajo = 0;
                    var todosTiposDeTrabajo = $('input:checkbox[name=todosTiposDeTrabajo]:checked').val()
                    $("#AgregarNuevoTipoTrabajo").empty();
                    $('.seleccionTipoTrabajo:checked').each(
                        function() {
                            $("#AgregarNuevoTipoTrabajo").append('<input hidden type="text" name="tipotrabajo[]" value="' + ($(this).val()) + '" >');
                            bloquearTipoTrabajo = 1;
                        }
                    );
                    if (bloquearTipoTrabajo == 1 || todosTiposDeTrabajo == "true") {
                        $("#AgregarMaritimoOTerrestre").empty();
                        $('.seleccionMaritimo:checked').each(
                            function() {
                                $("#AgregarMaritimoOTerrestre").append('<input hidden type="text" name="MaritimoOTerrestre[]" value="' + ($(this).val()) + '" >');
                            }
                        );
                        //Fechas, terrestres y/o maritimos y tipos de trabajo y clientes             
                        var datosAgregar = new FormData($(this)[0]);
                        datosAgregar.append("tipoOperacion", "listarBusquedaMaritimoOTerrestre");
                        datosAgregar.append("fechaInicio", fechaInicio);
                        datosAgregar.append("fechaTermino", fechaTermino);
                        datosAgregar.append("idCliente", idCliente);
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
                                for (var i = 0; i < contadora; i++) {
                                    if (valor1[i][7] == 1) {
                                        vuelta1 = "Sí"
                                    } else {
                                        vuelta1 = "No"
                                    }
                                    tablaProductos.row.add([
                                        '<form action="productos" method="post"><input hidden type="text" name="id" value="' + valor1[i][0] + '"><input style="margin-bottom: 4px;  margin-right:6px;" type="submit" value="Servicio: ' + valor1[i][0] + '" class="btn btn-outline-primary"></form>',
                                        valor1[i][1] + ' ' + valor1[i][2],
                                        valor1[i][3],
                                        valor1[i][4],
                                        valor1[i][5],
                                        valor1[i][6],
                                             vuelta1,
                                    ]).draw(false);
                                }
                            }
                        });
                        $('#tablaproductos').dataTable();
                    } else {
                        alert("Debe seleccionar un tipo de trabajo.");
                    }
                }
            }
        }
    });

    $("#id-formulario-busqueda-otros").submit(function(e) {
        e.preventDefault();
        $("#recargar1").hide();
        $("#recargar2").show();
        var fechaInicio = $("#fechaInicio").val();
        var fechaTermino = $("#fechaTermino").val();
        var idCliente = $("#idCliente").val();
        if (fechaInicio == "") {
            alert("Debe ingresar una fecha de Inicio de búsqueda.")
        } else {
            if (fechaTermino == "") {
                alert("Debe ingresar una fecha de Fin de búsqueda.")
            } else {
                bloquearOtros = 0;
                var otros = $('input:checkbox[name=todosTiposDeTrabajo]:checked').val()
                $("#AgregarOtros").empty();
                $('.seleccionOtros:checked').each(
                    function() {
                        $("#AgregarOtros").append('<input hidden type="text" name="otros[]" value="' + ($(this).val()) + '" >');
                        bloquearOtros = 1;
                    }
                );
                if (bloquearOtros == 1) {
                    //Fechas, terrestres y/o maritimos y tipos de trabajo y clientes             
                    var datosAgregar = new FormData($(this)[0]);
                    datosAgregar.append("tipoOperacion", "listarBusquedaOtros");
                    datosAgregar.append("fechaInicio", fechaInicio);
                    datosAgregar.append("fechaTermino", fechaTermino);
                    datosAgregar.append("idCliente", idCliente);
                    var tablaObjetos = $('#tablaobjetos').DataTable();
                    $.ajax({
                        url: 'ajax/ajaxBusquedas.php',
                        type: 'POST',
                        data: datosAgregar,
                        processData: false,
                        contentType: false,
                        async: false,
                        success: function(respuesta) {
                            tablaObjetos.clear();
                            tablaObjetos.draw();
                            var valor1 = JSON.parse(respuesta);
                            contadora = valor1.length;
                            for (var i = 0; i < contadora; i++) {
                                tablaObjetos.row.add([
                                    '<form action="productos" method="post"><input hidden type="text" name="id" value="' + valor1[i][0] + '"><input style="margin-bottom: 4px;  margin-right:6px;" type="submit" value="Servicio: ' + valor1[i][0] + '" class="btn btn-outline-primary"></form>',
                                    valor1[i][1] + ' ' + valor1[i][2],
                                    valor1[i][3],
                                    valor1[i][4],
                                    valor1[i][5],
                                    valor1[i][6]
                                ]).draw(false);
                            }
                        }
                    });
                    //    $('#tablaobjetos').dataTable();
                } else {
                    alert("No ha seleccionado ningún objeto");
                }
            }
        }
    });
</script>