<script type="text/javascript">
    //Inicialización de variables, botones principales

    $("#idEditarProducto").hide();

    $('#cancelarMaritimo').click(function() {
        //Borrando carácteres
        $("#idId").val("");
        $("#idProducto").val("");
        $("#idCantidad").val("");
        $("#idPrecio").val("");

        $("#idEditarProducto").hide();
        $("#idGuardarProducto").show();
        $("#cancelarMaritimo").hide();
        var datosAgregar3 = new FormData();
        datosAgregar3.append("tipoOperacion", "listarCertificados2Meses");
        $.ajax({
            url: 'ajax/ajaxBarcazas.php',
            type: 'POST',
            data: datosAgregar3,
            processData: false,
            contentType: false,
            async: false,
            success: function(res) {
                var valor0 = JSON.parse(res);
                var val = valor0[0][0];
                var val1 = parseInt(val);
                val1 = val1 + 1;
                $("#certificadoMaritimo").val(val1)
            }
        });
        $("#idProductoMaritimo").val("");
        $('#vuelta').prop("checked", false);
    });

    $('#cancelarTerrestre').click(function() {
        $("#editarTerrestre").hide();
        $("#guardarTerrestre").show();
        $("#cancelarTerrestre").hide();
        $('.reiniciarTerrestre').prop("checked", false);
        var datosAgregar3 = new FormData();
        datosAgregar3.append("tipoOperacion", "listarCertificados2Meses");
        $.ajax({
            url: 'ajax/ajaxBarcazas.php',
            type: 'POST',
            data: datosAgregar3,
            processData: false,
            contentType: false,
            async: false,
            success: function(res) {
                var valor0 = JSON.parse(res);
                var val = valor0[0][0];
                var val1 = parseInt(val);
                val1 = val1 + 1;
                $("#certificadoTerrestre").val(val1)
            }
        });
        $("#patenteTerrestre").val("");
        $("#idProductoTerrestre").val("");
        $("#idIdTerrestre").val("");
        $("#idRelacionTerrestre").val("null");
    });

    $('#cancelarOtro').click(function() {
        $("#editarOtro").hide();
        $("#guardarOtro").show();
        $("#cancelarOtro").hide();
        //Vaciando parametros
        $("#idIdOtro").val("");
        $('#idProductoOtros').val("null");
        $('#idProductoOtros').trigger('change');
        $("#cantidadOtros").val("");
        $("#idRelacionOtros_Maritimo").val("null");
        $("#idRelacionOtros_Terrestre").val("null");
        $("#idRelacionOtros_Terrestre").attr("disabled", false);
        $("#idRelacionOtros_Maritimo").attr("disabled", false);
    });

    //D = Delete 
    function reply_clickBorrarMaritimo(id) {
        confirmar = confirm('¿Estás seguro de eliminar el producto?, Si no puede eliminarlo, revise que no tenga un objeto relacionado en otra tabla.');
        if (confirmar == true) {
            var DdatosOtros = new FormData();
            DdatosOtros.append("id", id);
            DdatosOtros.append("tipoOperacion", "eliminarProducto");
            $.ajax({
                url: 'ajax/ajaxProductos.php',
                type: 'POST',
                data: DdatosOtros,
                processData: false, // tell jQuery not to process the data
                contentType: false, // tell jQuery not to set contentType
                success: function(res) {


                    //Inicio

                    //LLamada Ajax para obtener los valores de la tabla maritimos.
                    var datos11 = new FormData();
                    datos11.append("id", idservicio);
                    $.ajax({
                        url: 'vista/tablamaritimo.php',
                        type: 'POST',
                        data: datos11,
                        processData: false,
                        contentType: false,
                        success: function(respuesta) {
                            $('#tablaMaritimo').html(respuesta);
                        }
                    });

                    //Fin
                    $("#editarMaritimo").hide();
                    $("#guardarMaritimo").show();
                    $("#cancelarMaritimo").hide();
                    $("#idProductoMaritimo").val("");
                    $('#vuelta').prop("checked", false);
                    //$('#tablaMaritimo').html(res);
                }
            });
        }
    }

    function reply_clickBorrarTerrestre(id) {
        confirmar = confirm('¿Estás seguro de eliminar el producto?, Si no puede eliminarlo, revise que no tenga un objeto relacionado en la pestaña "Otros".');
        if (confirmar == true) {
            var DdatosOtros = new FormData();
            DdatosOtros.append("id_terrestre", id);
            DdatosOtros.append("tipoOperacion", "eliminarTerrestre");
            $.ajax({
                url: 'ajax/ajaxEmpresas.php',
                type: 'POST',
                data: DdatosOtros,
                processData: false, // tell jQuery not to process the data
                contentType: false, // tell jQuery not to set contentType
                success: function(res) {
                    var datos11 = new FormData();
                    datos11.append("id", idservicio);
                    $.ajax({
                        url: 'vista/tablaterrestre.php',
                        type: 'POST',
                        data: datos11,
                        processData: false,
                        contentType: false,
                        success: function(respuesta) {
                            $('.reiniciarTerrestre').prop("checked", false);
                            var datosAgregar3 = new FormData();
                            datosAgregar3.append("tipoOperacion", "listarCertificados2Meses");
                            $.ajax({
                                url: 'ajax/ajaxBarcazas.php',
                                type: 'POST',
                                data: datosAgregar3,
                                processData: false,
                                contentType: false,
                                async: false,
                                success: function(res) {
                                    var valor0 = JSON.parse(res);
                                    var val = valor0[0][0];
                                    var val1 = parseInt(val);
                                    val1 = val1 + 1;
                                    $("#certificadoTerrestre").val(val1)
                                }
                            });
                            $("#editarTerrestre").hide();
                            $("#guardarTerrestre").show();
                            $("#cancelarTerrestre").hide();
                            $("#patenteTerrestre").val("");
                            $("#idProductoTerrestre").val("");
                            $("#idIdTerrestre").val("");
                            $("#idRelacionTerrestre").val("null");
                            $('#tablaterrestre').html(respuesta);
                        }
                    });

                }
            });
        }
    }

    function reply_clickBorrarOtros(id) {
        confirmar = confirm('¿Estás seguro de eliminar el objeto?');
        if (confirmar == true) {
            var DdatosOtros = new FormData();
            DdatosOtros.append("id_otro", id);
            DdatosOtros.append("tipoOperacion", "eliminarOtro");
            $.ajax({
                url: 'ajax/ajaxEmpresas.php',
                type: 'POST',
                data: DdatosOtros,
                processData: false, // tell jQuery not to process the data
                contentType: false, // tell jQuery not to set contentType
                success: function(res) {
                    var datos11 = new FormData();
                    datos11.append("id", idservicio);
                    $.ajax({
                        url: 'vista/tablaotros.php',
                        type: 'POST',
                        data: datos11,
                        processData: false,
                        contentType: false,
                        success: function(respuesta) {
                            $("#editarOtro").hide();
                            $("#guardarOtro").show();
                            $("#cancelarOtro").hide();
                            $("#idIdOtro").val("");
                            $('#idProductoOtros').val("null");
                            $('#idProductoOtros').trigger('change');
                            $("#cantidadOtros").val("");
                            $("#idRelacionOtros_Maritimo").val("null");
                            $("#idRelacionOtros_Terrestre").val("null");
                            $('#tablaotros').html(respuesta);
                        }
                    });
                }
            });
        }
    }

    $(document).ready(function() {
        var idServicio = $("#idservicio00").val();
        idservicio = $("#idservicio00").val();
        $('.js-example-basic-single').select2();
        //-----------------------------------------Marítimo----------------------------------------------------
        $('#idBotonCollapseMaritimo').click(function() {
            $("#idEditarProducto").hide();
            $("#cancelarMaritimo").hide();
            $("#guardarMaritimo").show();
            $("#collapseTerrestre").collapse("hide");
            $("#collapseOtros").collapse("hide");
            $("#botonActualizarMaritimo").show();
            $("#idProductoMaritimo").empty();
            $('.reiniciarMaritimo').prop("checked", false);
            $('#vuelta').prop("checked", false);

            //LLamada Ajax para obtener los valores de la tabla maritimos.
            var datos11 = new FormData();
            datos11.append("id", idservicio);
            $.ajax({
                url: 'vista/tablamaritimo.php',
                type: 'POST',
                data: datos11,
                processData: false,
                contentType: false,
                success: function(respuesta) {
                    $('#tablaMaritimo').html(respuesta);
                }
            });
        });

        //EDITAR EDICION
        $("#idEditarProducto").click(function(e) {
            var producto = $("#idProducto").val();
            var cantidad = $("#idCantidad").val();
            var precio = $("#idPrecio").val();
            var id = $("#idId").val();

            if (producto == "" || cantidad == "" || precio == "") {
                alert("Campo Vacío Detectado");
            } else {
                var datosAgregarx = new FormData();
                datosAgregarx.append("tipoOperacion", "editarProducto");
                datosAgregarx.append("id", id);
                datosAgregarx.append("producto", producto);
                datosAgregarx.append("cantidad", cantidad);
                datosAgregarx.append("precio", precio);
                $.ajax({
                    url: 'ajax/ajaxProductos.php',
                    type: 'POST',
                    data: datosAgregarx,
                    processData: false,
                    contentType: false,
                    success: function(res) {
                        var datos11 = new FormData();
                        datos11.append("id", idservicio);
                        $.ajax({
                            url: 'vista/tablamaritimo.php',
                            type: 'POST',
                            data: datos11,
                            processData: false,
                            contentType: false,
                            success: function(respuesta) {
                                var producto = $("#idProducto").val("");
                                var cantidad = $("#idCantidad").val("");
                                var precio = $("#idPrecio").val("");
                                $("#idEditarProducto").hide();
                                $("#cancelarMaritimo").hide();
                                $("#idGuardarProducto").show();
                                $('#tablaMaritimo').html(respuesta);
                                $("#idProductoMaritimo").val("");
                                $('#ModalEditar').modal("show");
                            }
                        });
                    }
                });
            }
        });


        //EDITAR EDICION FIN

        $("#idGuardarProducto").click(function(e) {
            var producto = $("#idProducto").val();
            var cantidad = $("#idCantidad").val();
            var precio = $("#idPrecio").val();
            var idServicio = $("#idservicio00").val();

            if (producto == "" || cantidad == "" || precio == "") {
                alert("Campo Vacío Detectado");
            } else {
                var datosAgregarx = new FormData();
                datosAgregarx.append("tipoOperacion", "insertarProducto");
                datosAgregarx.append("idServicio", idServicio); 
                datosAgregarx.append("producto", producto); 
                datosAgregarx.append("cantidad", cantidad);
                datosAgregarx.append("precio", precio);

                $.ajax({
                    url: 'ajax/ajaxProductos.php',
                    type: 'POST',
                    data: datosAgregarx,
                    processData: false,
                    contentType: false,
                    success: function(res) {
                        var datos11 = new FormData();
                        datos11.append("id", idservicio);
                        $.ajax({
                            url: 'vista/tablamaritimo.php',
                            type: 'POST',
                            data: datos11,
                            processData: false,
                            contentType: false,
                            success: function(respuesta) {
                                $('#tablaMaritimo').html(respuesta);
                                $('.reiniciarMaritimo').prop("checked", false);
                                $("#idProductoMaritimo").val("");
                                $('#ModalAgregar').modal("show");
                                $("#idProducto").val("");
                                $("#idCantidad").val("");
                                $("#idPrecio").val("");
                            }
                        });
                    }
                });

            }

        });
        //----------------------------------------------TERRESTRE---------------------------------------------------
        $('#idBotonCollapseTerrestre').click(function() {
            $("#editarTerrestre").hide();
            $("#cancelarTerrestre").hide();
            $("#guardarTerrestre").show();
            $("#collapseMaritimo").collapse("hide");
            $("#collapseOtros").collapse("hide");
            $("#idProductoTerrestre").empty();
            $("#idRelacionTerrestre").empty();
            $('.reiniciarTerrestre').prop("checked", false);
            $('#patenteTerrestre').val("");
            var tipodeproducto = "Terrestre";
            var datos10 = new FormData();
            datos10.append("tipoOperacion", "listarProductoPorTipo");
            datos10.append("tipodeproducto", tipodeproducto);
            $.ajax({
                url: 'ajax/ajaxBarcazas.php',
                type: 'POST',
                data: datos10,
                processData: false,
                contentType: false,
                success: function(respuesta) {
                    var valor0 = JSON.parse(respuesta);
                    var contador = valor0.length;

                    let $option3 = $('<option />', {
                        text: 'Seleccionar',
                        value: '',
                    });
                    $('#idProductoTerrestre').prepend($option3);

                    for (var i = 0; i < contador; i++) {
                        let $option = $('<option />', {
                            text: valor0[i][1],
                            value: valor0[i][0],
                        });
                        $('#idProductoTerrestre').prepend($option);
                    }
                }
            });

            var datosAAgregar3 = new FormData();
            datosAAgregar3.append("tipoOperacion", "listarMaritimoSelect");
            datosAAgregar3.append("idservicio", idservicio);
            $.ajax({
                url: 'ajax/ajaxEmpresas.php',
                type: 'POST',
                data: datosAAgregar3,
                processData: false,
                contentType: false,
                success: function(respuesta) {
                    var valor1 = JSON.parse(respuesta);
                    var contador1 = valor1.length;

                    let $option2 = $('<option />', {
                        text: 'Ninguno',
                        value: 'null',
                    });
                    $('#idRelacionTerrestre').prepend($option2);
                    for (var i = 0; i < contador1; i++) {
                        let $option = $('<option />', {
                            text: valor1[i][1] + " " + valor1[i][2],
                            value: valor1[i][0],
                        });
                        $('#idRelacionTerrestre').prepend($option);
                    }
                }
            });
            //Obtenemos el número del certificado y le agregamos 1.
            var datosAgregar3 = new FormData();
            datosAgregar3.append("tipoOperacion", "listarCertificados2Meses");
            $.ajax({
                url: 'ajax/ajaxBarcazas.php',
                type: 'POST',
                data: datosAgregar3,
                processData: false,
                contentType: false,
                async: false,
                success: function(res) {
                    var valor0 = JSON.parse(res);
                    var val = valor0[0][0];
                    var val1 = parseInt(val);
                    val1 = val1 + 1;
                    $("#certificadoTerrestre").val(val1)
                }
            });

            //LLamada Ajax para obtener los valores de la tabla terrestre
            var datos11 = new FormData();
            datos11.append("id", idservicio);
            $.ajax({
                url: 'vista/tablaterrestre.php',
                type: 'POST',
                data: datos11,
                processData: false,
                contentType: false,
                success: function(respuesta) {
                    $('#tablaterrestre').html(respuesta);
                }
            });
        });

        $('#patenteTerrestre').keyup(function() {
            $(this).val($(this).val().toUpperCase());
        });

        $("#id-formulario-agregar-terrestre").submit(function(e) {
            e.preventDefault();
            bloquearTerrestrePorMatricula = 0;
            bloquearTerrestrePorCertificado = 0;
            $("#AgregarNuevoProductoTerrestre").empty();
            var contadordecheckterrestre;
            $('.seleccionTerrestre:checked').each(
                function() {
                    contadordecheckterrestre++;
                    $("#AgregarNuevoProductoTerrestre").append('<input hidden type="text" name="tipotrabajoterrestre[]  id="idtipotrabajoterrestre_' + contadordecheckterrestre + '" value="' + ($(this).val()) + '" >');
                }
            );
            var certificadoTerrestre = $("#certificadoTerrestre").val();
            var productoTerrestre = $("#idProductoTerrestre").val();
            var patenteTerrestre = $("#patenteTerrestre").val();
            var idmaritimoOnull = $("#idRelacionTerrestre").val();
            //Una vez con la patente, la comparamos con las patentes existentes en la BD que tienen relación con el servicio
            //Consultando las patentes terrestres del servicio
            var datosAgregar3 = new FormData();
            datosAgregar3.append("tipoOperacion", "listarPatenteTerrestrePorServicio");
            datosAgregar3.append("idservicio", idservicio);
            $.ajax({
                url: 'ajax/ajaxBarcazas.php',
                type: 'POST',
                data: datosAgregar3,
                processData: false,
                contentType: false,
                async: false,
                success: function(res) {
                    var valor0 = JSON.parse(res);
                    var contador = valor0.length;
                    for (var i = 0; i < contador; i++) {
                        if (valor0[i][0] == patenteTerrestre) {
                            bloquearTerrestrePorMatricula = 1;
                        }
                    }
                }
            });
            //Consultando las patentes terrestres del servicio FIN
            if (productoTerrestre == "") {
                alert("Campo vacío detectado: Producto a sanitizar");
            } else {
                if (bloquearTerrestrePorMatricula == 0) {
                    //INICIO Certificado
                    var datosAgregar3 = new FormData();
                    datosAgregar3.append("tipoOperacion", "listarCertificados2Meses");
                    $.ajax({
                        url: 'ajax/ajaxBarcazas.php',
                        type: 'POST',
                        data: datosAgregar3,
                        processData: false,
                        contentType: false,
                        async: false,
                        success: function(res) {
                            var valor0 = JSON.parse(res);
                            var contador = valor0.length;
                            for (var i = 0; i < contador; i++) {
                                if (valor0[i][0] == certificadoTerrestre) {
                                    bloquearTerrestrePorCertificado = 1;
                                }
                            }
                            if (bloquearTerrestrePorCertificado == 1) {
                                alert("El certificado ya existe");
                            }
                        }
                    });

                    if (bloquearTerrestrePorCertificado == 0) {
                        //FIN Certificado
                        var datosTerrestres = new FormData($(this)[0]);
                        datosTerrestres.append("tipoOperacion", "insertarTerrestre");
                        datosTerrestres.append("certificado", certificadoTerrestre);
                        datosTerrestres.append("matricula", patenteTerrestre);
                        datosTerrestres.append("nombre", productoTerrestre);
                        datosTerrestres.append("idmaritimo", idmaritimoOnull);
                        datosTerrestres.append("idservicio", idservicio);
                        $.ajax({
                            url: 'ajax/ajaxEmpresas.php',
                            type: 'POST',
                            data: datosTerrestres,
                            processData: false,
                            contentType: false,
                            success: function(res) {
                                var datos11 = new FormData();
                                datos11.append("id", idservicio);
                                $.ajax({
                                    url: 'vista/tablaterrestre.php',
                                    type: 'POST',
                                    data: datos11,
                                    processData: false,
                                    contentType: false,
                                    success: function(respuesta) {
                                        $('#tablaterrestre').html(respuesta);
                                        $('.reiniciarTerrestre').prop("checked", false);
                                        $("#patenteTerrestre").val("");
                                        $("#idProductoTerrestre").val("");
                                        $("#idIdTerrestre").val("");
                                        $("#idRelacionTerrestre").val("null");
                                        $('#ModalAgregar').modal("show");
                                        //Obtenemos el número del certificado y le agregamos 1.
                                        var datosAgregar3 = new FormData();
                                        datosAgregar3.append("tipoOperacion", "listarCertificados2Meses");
                                        $.ajax({
                                            url: 'ajax/ajaxBarcazas.php',
                                            type: 'POST',
                                            data: datosAgregar3,
                                            processData: false,
                                            contentType: false,
                                            async: false,
                                            success: function(res) {
                                                var valor0 = JSON.parse(res);
                                                var val = valor0[0][0];
                                                var val1 = parseInt(val);
                                                val1 = val1 + 1;
                                                $("#certificadoTerrestre").val(val1);
                                            }
                                        });
                                    }
                                });
                            }
                        });
                    }
                } else {
                    alert("No puede ingresar la misma patente dos veces en un solo servicio.");
                }
            }
        });

        $("#id-formulario-editar-terrestre").submit(function(e) {
            e.preventDefault();
            var idTerrestre = $("#idIdTerrestre").val();
            bloquearTerrestrePorMatricula = 0;
            bloquearTerrestrePorCertificado = 0;
            $("#AgregarNuevoProductoTerrestre2").empty();
            var contadordecheckterrestre;
            $('.seleccionTerrestre:checked').each(
                function() {
                    contadordecheckterrestre++;
                    $("#AgregarNuevoProductoTerrestre2").append('<input hidden type="text" name="tipotrabajoterrestre[]  id="idtipotrabajoterrestre_' + contadordecheckterrestre + '" value="' + ($(this).val()) + '" >');
                }
            );
            var certificadoTerrestre = $("#certificadoTerrestre").val();
            var productoTerrestre = $("#idProductoTerrestre").val();
            var patenteTerrestre = $("#patenteTerrestre").val();
            var idProductoTerrestreComprobacion = $("#idProductoTerrestreComprobacion").val();
            //Una vez con la patente, la comparamos con las patentes existentes en la BD que tienen relación con el servicio
            //Consultando las patentes terrestres del servicio
            var datosAgregar3 = new FormData();
            datosAgregar3.append("tipoOperacion", "listarPatenteTerrestrePorServicio");
            datosAgregar3.append("idservicio", idservicio);
            $.ajax({
                url: 'ajax/ajaxBarcazas.php',
                type: 'POST',
                data: datosAgregar3,
                processData: false,
                contentType: false,
                async: false,
                success: function(res) {
                    var valor0 = JSON.parse(res);
                    var contador = valor0.length;
                    for (var i = 0; i < contador; i++) {
                        if (valor0[i][0] == patenteTerrestre) {
                            bloquearTerrestrePorMatricula = 1;
                        }
                    }
                    var idProductoTerrestreComprobacion = $("#idProductoTerrestreComprobacion").val();
                    if (idProductoTerrestreComprobacion == patenteTerrestre) {
                        bloquearTerrestrePorMatricula = 0;
                    }
                }
            });
            //Consultando las patentes terrestres del servicio FIN
            if (certificadoTerrestre == "" || productoTerrestre == "" || patenteTerrestre == "") {
                alert("Campo Vacío Detectado.")
            } else {
                if (bloquearTerrestrePorMatricula == 0) {
                    //Inicio certificado
                    var datosAgregar3 = new FormData();
                    datosAgregar3.append("tipoOperacion", "listarCertificados2Meses");
                    $.ajax({
                        url: 'ajax/ajaxBarcazas.php',
                        type: 'POST',
                        data: datosAgregar3,
                        processData: false,
                        contentType: false,
                        async: false,
                        success: function(res) {
                            var valor0 = JSON.parse(res);
                            var contador = valor0.length;
                            for (var i = 0; i < contador; i++) {
                                if (valor0[i][0] == certificadoTerrestre) {
                                    bloquearTerrestrePorCertificado = 1;
                                }
                            }
                            var idCertificadoTerrestreComprobacion = $("#idCertificadoTerrestreComprobacion").val();
                            if (idCertificadoTerrestreComprobacion == certificadoTerrestre) {
                                bloquearTerrestrePorCertificado = 0;
                            }
                            if (bloquearTerrestrePorCertificado == 1) {
                                alert("El certificado ya existe");
                            }
                        }
                    });
                    //Fin certificado
                    if (bloquearTerrestrePorCertificado == 0) {
                        var idmaritimoOnull = $("#idRelacionTerrestre").val();
                        var datosTerrestres = new FormData($(this)[0]);
                        datosTerrestres.append("tipoOperacion", "editarTerrestre");
                        datosTerrestres.append("certificado", certificadoTerrestre);
                        datosTerrestres.append("matricula", patenteTerrestre);
                        datosTerrestres.append("nombre", productoTerrestre);
                        datosTerrestres.append("idmaritimo", idmaritimoOnull);
                        datosTerrestres.append("idservicio", idservicio);
                        datosTerrestres.append("idTerrestre", idTerrestre);
                        $.ajax({
                            url: 'ajax/ajaxEmpresas.php',
                            type: 'POST',
                            data: datosTerrestres,
                            processData: false,
                            contentType: false,
                            success: function(res) {
                                var datos11 = new FormData();
                                datos11.append("id", idservicio);
                                $.ajax({
                                    url: 'vista/tablaterrestre.php',
                                    type: 'POST',
                                    data: datos11,
                                    processData: false,
                                    contentType: false,
                                    success: function(respuesta) {
                                        $('#tablaterrestre').html(respuesta);
                                        $("#editarTerrestre").hide();
                                        $("#guardarTerrestre").show();
                                        $("#cancelarTerrestre").hide();
                                        $('.reiniciarTerrestre').prop("checked", false);
                                        $("#patenteTerrestre").val("");
                                        $("#idProductoTerrestre").val("");
                                        $("#idIdTerrestre").val("");
                                        $("#idRelacionTerrestre").val("null");
                                        $('#ModalEditar').modal("show");
                                        //Obtenemos el número del certificado y le agregamos 1.
                                        var datosAgregar3 = new FormData();
                                        datosAgregar3.append("tipoOperacion", "listarCertificados2Meses");
                                        $.ajax({
                                            url: 'ajax/ajaxBarcazas.php',
                                            type: 'POST',
                                            data: datosAgregar3,
                                            processData: false,
                                            contentType: false,
                                            async: false,
                                            success: function(res) {
                                                var valor0 = JSON.parse(res);
                                                var val = valor0[0][0];
                                                var val1 = parseInt(val);
                                                val1 = val1 + 1;
                                                $("#certificadoTerrestre").val(val1)
                                            }
                                        });
                                    }
                                });
                            }
                        });
                    }
                } else {
                    alert("No puede ingresar la misma patente 2 veces en un servicio.")
                }
            }
        });
        //-----------------------------------------------Otros--------------------------------------------------

        $('#idBotonCollapseOtros').click(function() {
            $("#editarOtro").hide();
            $("#cancelarOtro").hide();
            $("#guardarOtro").show();
            $("#collapseMaritimo").collapse("hide");
            $("#cantidadOtros").val("");
            $("#collapseTerrestre").collapse("hide");
            $("#idProductoOtros").empty();
            $("#idRelacionOtros_Maritimo").empty();
            $("#idRelacionOtros_Terrestre").empty();
            var tipodeproducto = "Otro";
            var datos10 = new FormData();
            datos10.append("tipoOperacion", "listarProductoPorTipo");
            datos10.append("tipodeproducto", tipodeproducto);
            $.ajax({
                url: 'ajax/ajaxBarcazas.php',
                type: 'POST',
                data: datos10,
                processData: false,
                contentType: false,
                success: function(respuesta) {
                    var valor0 = JSON.parse(respuesta);
                    var contador = valor0.length;
                    let $option3 = $('<option />', {
                        text: 'Seleccionar',
                        value: "null",
                    });
                    $('#idProductoOtros').prepend($option3);
                    for (var i = 0; i < contador; i++) {
                        let $option = $('<option />', {
                            text: valor0[i][1],
                            value: valor0[i][0],
                        });
                        $('#idProductoOtros').prepend($option);
                    }
                }
            });

            var datosAAgregar3 = new FormData();
            datosAAgregar3.append("tipoOperacion", "listarMaritimoSelect");
            datosAAgregar3.append("idservicio", idservicio);
            $.ajax({
                url: 'ajax/ajaxEmpresas.php',
                type: 'POST',
                data: datosAAgregar3,
                processData: false,
                contentType: false,
                success: function(respuesta) {
                    var valor1 = JSON.parse(respuesta);
                    var contador1 = valor1.length;
                    let $option2 = $('<option />', {
                        text: 'Ninguno',
                        value: 'null',
                    });
                    $('#idRelacionOtros_Maritimo').prepend($option2);
                    for (var i = 0; i < contador1; i++) {
                        let $option = $('<option />', {
                            text: valor1[i][1] + " " + valor1[i][2],
                            value: valor1[i][0],
                        });
                        $('#idRelacionOtros_Maritimo').prepend($option);
                    }
                }
            });
            var datosAAgregar4 = new FormData();
            datosAAgregar4.append("tipoOperacion", "listarTerrestreSelect");
            datosAAgregar4.append("idservicio", idservicio);
            $.ajax({
                url: 'ajax/ajaxEmpresas.php',
                type: 'POST',
                data: datosAAgregar4,
                processData: false,
                contentType: false,
                success: function(respuesta) {
                    var valor1 = JSON.parse(respuesta);
                    var contador1 = valor1.length;
                    let $option3 = $('<option />', {
                        text: 'Ninguno',
                        value: 'null',
                    });
                    $('#idRelacionOtros_Terrestre').prepend($option3);

                    for (var i = 0; i < contador1; i++) {
                        let $option = $('<option />', {
                            text: valor1[i][1] + " " + valor1[i][2],
                            value: valor1[i][0],
                        });
                        $('#idRelacionOtros_Terrestre').prepend($option);
                    }
                }
            });
            $("#idRelacionOtros_Terrestre").attr("disabled", false);
            $("#idRelacionOtros_Maritimo").attr("disabled", false);
            var datos11 = new FormData();
            datos11.append("id", idservicio);
            $.ajax({
                url: 'vista/tablaotros.php',
                type: 'POST',
                data: datos11,
                processData: false,
                contentType: false,
                success: function(respuesta) {
                    $('#tablaotros').html(respuesta);
                }
            });
        });
        $("#idRelacionOtros_Maritimo").change(function() {
            var rela_otr_mar = $("#idRelacionOtros_Maritimo").val();
            if (rela_otr_mar == "null") {
                $("#idRelacionOtros_Terrestre").attr("disabled", false);
            } else {
                $("#idRelacionOtros_Terrestre").attr("disabled", true);
            }
        });
        $("#idRelacionOtros_Terrestre").change(function() {
            var rela_otr_terr = $("#idRelacionOtros_Terrestre").val();
            if (rela_otr_terr == "null") {
                $("#idRelacionOtros_Maritimo").attr("disabled", false);
            } else {
                $("#idRelacionOtros_Maritimo").attr("disabled", true);
            }
        });
        $("#id-formulario-agregar-otros").submit(function(e) {
            e.preventDefault();
            var productoOtros = $("#idProductoOtros").val();
            var cantidad = $("#cantidadOtros").val();
            var idmaritimoOnull = $("#idRelacionOtros_Maritimo").val();
            var idterrestreOnull = $("#idRelacionOtros_Terrestre").val();
            bloquearOtro = 0;

            if (idmaritimoOnull == "null" && idterrestreOnull == "null") {
                alert("Debe relacionar el producto.");
            } else {
                if (productoOtros == "null" || cantidad == "") {
                    alert("Vacío detectado")
                } else {
                    //Detectar si estas relacionando un terrestre o un maritimo...
                    if (idterrestreOnull == "null") {
                        //alert("Camión es null");
                        //Consultar BD sí ya existe un Bins relacionado con  maritimos..
                        var datosAgregar3 = new FormData();
                        datosAgregar3.append("tipoOperacion", "listarRelacionMaritimoOtroPorServicio");
                        datosAgregar3.append("idservicio", idservicio);
                        $.ajax({
                            url: 'ajax/ajaxBarcazas.php',
                            type: 'POST',
                            data: datosAgregar3,
                            processData: false,
                            contentType: false,
                            async: false,
                            success: function(res) {
                                var valor0 = JSON.parse(res);
                                var contador = valor0.length;
                                for (var i = 0; i < contador; i++) {
                                    //  alert(productoOtros +" y "+ idmaritimoOnull + "Relacion existente: "+valor0[i][0]+" y "+valor0[i][1])
                                    if (productoOtros == valor0[i][0] && idmaritimoOnull == valor0[i][1]) {
                                        bloquearOtro = 1;
                                    }
                                }
                                if (bloquearOtro == 1) {
                                    alert("No puede ingresar el mismo Marítimo con el mismo producto 2 veces.");
                                }
                            }
                        });
                        //Consultar BD sí ya existe un Bins relacionado con terrestre y maritimos.. FIN
                    }
                    if (idmaritimoOnull == "null") {
                        //Consultar BD sí ya existe un Bins relacionado con  maritimos..
                        var datosAgregar3 = new FormData();
                        datosAgregar3.append("tipoOperacion", "listarRelacionTerrestreOtroPorServicio");
                        datosAgregar3.append("idservicio", idservicio);
                        $.ajax({
                            url: 'ajax/ajaxBarcazas.php',
                            type: 'POST',
                            data: datosAgregar3,
                            processData: false,
                            contentType: false,
                            async: false,
                            success: function(res) {
                                var valor0 = JSON.parse(res);
                                var contador = valor0.length;
                                for (var i = 0; i < contador; i++) {
                                    if (productoOtros == valor0[i][0] && idterrestreOnull == valor0[i][1]) {
                                        bloquearOtro = 1;
                                    }
                                }
                                if (bloquearOtro == 1) {
                                    alert("No puede ingresar el mismo Terrestre con el mismo producto 2 veces.");
                                }
                            }
                        });
                        //Consultar BD sí ya existe un Bins relacionado con terrestre y maritimos.. FIN
                    }

                    if (bloquearOtro == 0) {
                        var datosOtros = new FormData($(this)[0]);
                        datosOtros.append("tipoOperacion", "insertarOtro");
                        datosOtros.append("cantidad", cantidad);
                        datosOtros.append("nombre", productoOtros);
                        datosOtros.append("idmaritimo", idmaritimoOnull);
                        datosOtros.append("idterrestre", idterrestreOnull);
                        datosOtros.append("idservicio", idservicio);
                        $.ajax({
                            url: 'ajax/ajaxEmpresas.php',
                            type: 'POST',
                            data: datosOtros,
                            processData: false,
                            contentType: false,
                            success: function(res) {
                                var datos11 = new FormData();
                                datos11.append("id", idservicio);
                                $.ajax({
                                    url: 'vista/tablaotros.php',
                                    type: 'POST',
                                    data: datos11,
                                    processData: false,
                                    contentType: false,
                                    success: function(respuesta) {
                                        $('#tablaotros').html(respuesta);
                                        $("#cantidadOtros").val("");
                                        $("#idProductoOtros").val("null");
                                        $("#idRelacionOtros_Maritimo").val("null");
                                        $("#idRelacionOtros_Terrestre").val("null");
                                        $("#idRelacionOtros_Maritimo").attr("disabled", false);
                                        $("#idRelacionOtros_Terrestre").attr("disabled", false);
                                        $('#idProductoOtros').val("null");
                                        $('#idProductoOtros').trigger('change');
                                        $('#ModalAgregar').modal("show");
                                    }
                                });
                            }
                        });
                    }

                }
            }
        });

        $('#editarOtro').click(function() {

            var idOtro = $("#idIdOtro").val();
            var productoOtros = $("#idProductoOtros").val();
            var cantidad = $("#cantidadOtros").val();
            var idmaritimoOnull = $("#idRelacionOtros_Maritimo").val();
            var idterrestreOnull = $("#idRelacionOtros_Terrestre").val();
            bloquearOtro = 0;
            if (idmaritimoOnull == "null" && idterrestreOnull == "null") {
                alert("Debe relacionar el producto.");
            } else {
                if (productoOtros == "null" || cantidad == "") {
                    alert("Vacío detectado");
                } else {

                    //inicio relación  comprobación
                    //Detectar si estas relacionando un terrestre o un maritimo...
                    if (idterrestreOnull == "null") {
                        //alert("Camión es null");
                        //Consultar BD sí ya existe un Bins relacionado con  maritimos..
                        var datosAgregar3 = new FormData();
                        datosAgregar3.append("tipoOperacion", "listarRelacionMaritimoOtroPorServicio");
                        datosAgregar3.append("idservicio", idservicio);
                        $.ajax({
                            url: 'ajax/ajaxBarcazas.php',
                            type: 'POST',
                            data: datosAgregar3,
                            processData: false,
                            contentType: false,
                            async: false,
                            success: function(res) {
                                var valor0 = JSON.parse(res);
                                var contador = valor0.length;
                                for (var i = 0; i < contador; i++) {
                                    //  alert(productoOtros +" y "+ idmaritimoOnull + "Relacion existente: "+valor0[i][0]+" y "+valor0[i][1])
                                    if (productoOtros == valor0[i][0] && idmaritimoOnull == valor0[i][1]) {
                                        bloquearOtro = 1;
                                    }
                                }

                                var comprobacionRelacionOtro = $("#comprobacionRelacionOtro").val();
                                var comprobacionRelacionOtroMaritimo = $("#comprobacionRelacionOtroMaritimo").val();

                                if (comprobacionRelacionOtro == productoOtros && comprobacionRelacionOtroMaritimo == idmaritimoOnull) {
                                    bloquearOtro = 0;
                                }
                                if (bloquearOtro == 1) {
                                    alert("No puede ingresar el mismo Marítimo con el mismo producto 2 veces.");
                                }

                            }
                        });
                        //Consultar BD sí ya existe un Bins relacionado con terrestre y maritimos.. FIN
                    }

                    if (idmaritimoOnull == "null") {
                        // alert("Barcaza es null");
                        //Consultar BD sí ya existe un Bins relacionado con  maritimos..
                        var datosAgregar3 = new FormData();
                        datosAgregar3.append("tipoOperacion", "listarRelacionTerrestreOtroPorServicio");
                        datosAgregar3.append("idservicio", idservicio);
                        $.ajax({
                            url: 'ajax/ajaxBarcazas.php',
                            type: 'POST',
                            data: datosAgregar3,
                            processData: false,
                            contentType: false,
                            async: false,
                            success: function(res) {
                                var valor0 = JSON.parse(res);
                                var contador = valor0.length;
                                for (var i = 0; i < contador; i++) {
                                    if (productoOtros == valor0[i][0] && idterrestreOnull == valor0[i][1]) {
                                        bloquearOtro = 1;
                                    }
                                }
                                var comprobacionRelacionOtro = $("#comprobacionRelacionOtro").val();
                                var comprobacionRelacionOtroTerrestre = $("#comprobacionRelacionOtroTerrestre").val();

                                if (comprobacionRelacionOtro == productoOtros && comprobacionRelacionOtroTerrestre == idterrestreOnull) {
                                    bloquearOtro = 0;
                                }
                                if (bloquearOtro == 1) {
                                    alert("No puede ingresar el mismo Terrestre con el mismo producto 2 veces.");
                                }
                            }
                        });
                        //Consultar BD sí ya existe un Bins relacionado con terrestre y maritimos.. FIN
                    }

                    if (bloquearOtro == 0) {
                        //fin relación comprobación
                        var datosOtros = new FormData();
                        datosOtros.append("tipoOperacion", "editarOtro");
                        datosOtros.append("cantidad", cantidad);
                        datosOtros.append("nombre", productoOtros);
                        datosOtros.append("idmaritimo", idmaritimoOnull);
                        datosOtros.append("idterrestre", idterrestreOnull);
                        datosOtros.append("idservicio", idservicio);
                        datosOtros.append("idOtro", idOtro);
                        $.ajax({
                            url: 'ajax/ajaxEmpresas.php',
                            type: 'POST',
                            data: datosOtros,
                            processData: false,
                            contentType: false,
                            success: function(res) {
                                var datos11 = new FormData();
                                datos11.append("id", idservicio);
                                $.ajax({
                                    url: 'vista/tablaotros.php',
                                    type: 'POST',
                                    data: datos11,
                                    processData: false,
                                    contentType: false,
                                    success: function(respuesta) {
                                        $('#tablaotros').html(respuesta);
                                        $("#cantidadOtros").val("");
                                        $("#idProductoOtros").val("null");
                                        $("#idRelacionOtros_Maritimo").val("null");
                                        $("#idRelacionOtros_Terrestre").val("null");
                                        $("#idRelacionOtros_Maritimo").attr("disabled", false);
                                        $("#idRelacionOtros_Terrestre").attr("disabled", false);
                                        $('#idProductoOtros').val("null");
                                        $('#idProductoOtros').trigger('change');
                                        $("#editarOtro").hide();
                                        $("#guardarOtro").show();
                                        $("#cancelarOtro").hide();
                                        $('#ModalEditar').modal("show");
                                    }
                                });
                            }
                        });
                    }
                }
            }
        });
        $('#okmodalOtros').on('click', function() {
            var producto = $('#idAgregar1Otros').val();
            var tipoproducto = $('#IdTipoAgregar1Otros').val();
            if (producto == "") {
                alert("Vacío");
            } else {
                var datosAgregar = new FormData();
                datosAgregar.append("tipoOperacion", "insertarProducto");
                datosAgregar.append("producto", producto);
                datosAgregar.append("tipoproducto", tipoproducto);
                $.ajax({
                    url: 'ajax/ajaxProductos.php',
                    type: 'POST',
                    data: datosAgregar,
                    processData: false,
                    contentType: false,
                    success: function(res) {
                        $("#idProductoOtros").empty();
                        var tipodeproducto = "Otro";
                        var lugar = $('#idLugar').val();
                        var datos10 = new FormData();
                        datos10.append("tipoOperacion", "listarProductoPorTipo");
                        datos10.append("tipodeproducto", tipodeproducto);
                        datos10.append("lugar", lugar);
                        $.ajax({
                            url: 'ajax/ajaxBarcazas.php',
                            type: 'POST',
                            data: datos10,
                            processData: false,
                            contentType: false,
                            success: function(respuesta) {
                                var valor0 = JSON.parse(respuesta);
                                var contador = valor0.length;
                                for (var i = 0; i < contador; i++) {
                                    let $option = $('<option />', {
                                        text: valor0[i][1],
                                        value: valor0[i][0],
                                    });
                                    $('#idProductoOtros').prepend($option);
                                    $('#idAgregar1Otros').val("");
                                }
                            }
                        });
                    }
                });
            }
        });

        $('#okmodalTerrestre').on('click', function() {
            var producto = $('#idAgregar1Terrestre').val();
            var tipoproducto = $('#IdTipoAgregar1Terrestre').val();
            if (producto == "") {
                alert("Vacío");
            } else {
                var datosAgregar = new FormData();
                datosAgregar.append("tipoOperacion", "insertarProducto");
                datosAgregar.append("producto", producto);
                datosAgregar.append("tipoproducto", tipoproducto);
                $.ajax({
                    url: 'ajax/ajaxProductos.php',
                    type: 'POST',
                    data: datosAgregar,
                    processData: false,
                    contentType: false,
                    success: function(res) {
                        $("#idProductoTerrestre").empty();
                        var tipodeproducto = "Terrestre";
                        var datos10 = new FormData();

                        datos10.append("tipoOperacion", "listarProductoPorTipo");
                        datos10.append("tipodeproducto", tipodeproducto);
                        $.ajax({
                            url: 'ajax/ajaxBarcazas.php',
                            type: 'POST',
                            data: datos10,
                            processData: false,
                            contentType: false,
                            success: function(respuesta) {
                                var valor0 = JSON.parse(respuesta);
                                var contador = valor0.length;
                                for (var i = 0; i < contador; i++) {
                                    let $option = $('<option />', {
                                        text: valor0[i][1],
                                        value: valor0[i][0],
                                    });
                                    $('#idProductoTerrestre').prepend($option);
                                    $('#idAgregar1Terrestre').val("");
                                }
                            }
                        });
                    }
                });
            }
        });

        $('#idMatriculaModalMaritimo').keyup(function() {
            $(this).val($(this).val().toUpperCase());
        });

        $('#okmodalMaritimo').on('click', function() {

            var cliente = $('#idCliente').val();
            var producto = $('#idProductoModalMaritimo').val();
            var matricula = $('#idMatriculaModalMaritimo').val();


            if (producto == "" || matricula == "") {
                alert("Vacío");
            } else {

                var datosAgregar = new FormData();
                datosAgregar.append("tipoOperacion", "insertarBarcaza");
                datosAgregar.append("cliente", cliente);
                datosAgregar.append("producto", producto);
                datosAgregar.append("matricula", matricula);

                $.ajax({
                    url: 'ajax/ajaxBarcazas.php',
                    type: 'POST',
                    data: datosAgregar,
                    processData: false,
                    contentType: false,
                    success: function(res) {
                        $("#idProductoMaritimo").empty();
                        var tipodeproducto = "Marítimo";
                        var cliente = $('#idCliente').val();
                        var datos10 = new FormData();

                        datos10.append("tipoOperacion", "listarBarcazasPorCliente");
                        datos10.append("cliente", cliente);

                        $.ajax({
                            url: 'ajax/ajaxBarcazas.php',
                            type: 'POST',
                            data: datos10,
                            processData: false,
                            contentType: false,
                            success: function(respuesta) {

                                var valor0 = JSON.parse(respuesta);
                                var contador = valor0.length;

                                for (var i = 0; i < contador; i++) {
                                    let $option = $('<option />', {
                                        text: valor0[i][1] + " " + valor0[i][2],
                                        value: valor0[i][0],
                                    });
                                    $('#idProductoMaritimo').prepend($option);
                                }
                            }
                        });
                    }
                });
            }
        })
    });
</script>