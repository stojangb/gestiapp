<script type="text/javascript">
    //-----------------------------------------PRIMERO----------------------------------------------------
    //Inicialización de variables, botones principales
    $('#cancelarMaritimo').click(function() {
        //Borrando carácteres
        $("#idId").val("");
        $("#idProducto").val("");
        $("#idCantidad").val("");
        $("#idPrecio").val("");

        $("#idEditarProducto").hide();
        $("#idGuardarProducto").show();
        $("#cancelarMaritimo").hide();
        $("#idProductoMaritimo").val("");
        $('#vuelta').prop("checked", false);
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
        confirmar = confirm('¿Estás seguro de eliminar la venta?, Si no puede eliminarla, revise que no tenga un objeto relacionado.');
        if (confirmar == true) {
            var DdatosOtros = new FormData();
            DdatosOtros.append("id", id);
            DdatosOtros.append("tipoOperacion", "eliminarVenta");
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
                            alert("Eliminado")
                            $('#tablaterrestre').html(respuesta);
                        }
                    });

                }
            });
        }
    }

    function reply_clickBorrarOtros(id) {
        confirmar = confirm('¿Estás seguro de eliminar el ítem actual?');
        if (confirmar == true) {
            var DdatosOtros = new FormData();
            DdatosOtros.append("id", id);
            DdatosOtros.append("tipoOperacion", "eliminarIngresoEgreso");
            $.ajax({
                url: 'ajax/ajaxEmpresas.php',
                type: 'POST',
                data: DdatosOtros,
                processData: false, // tell jQuery not to process the data
                contentType: false, // tell jQuery not to set contentType
                success: function(res) {
                    alert("Eliminado");
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
        //-----------------------------------------SEGUND******O----------------------------------------------------

        $('#cancelar2').click(function() {
            $("#editar2").hide();
            $("#cancelar2").hide();
            $("#guardar2").show();
        });
        $('#idBotonCollapseMaritimo').click(function() {
            $("#idEditarProducto").hide();
            $("#cancelarMaritimo").hide();
            $("#idGuardarProducto").show();
            $("#collapseTerrestre").collapse("hide");
            $("#collapseOtros").collapse("hide");
            $("#idProductoMaritimo").empty();

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
        //----------------------------------------------SEGUNDO---------------------------------------------------
        $('#idBotonCollapseTerrestre').click(function() {
            $("#editar2").hide();
            $("#cancelar2").hide();
            $("#guardar2").show();
            $("#collapseMaritimo").collapse("hide");
            $("#collapseOtros").collapse("hide");

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


        $("#guardar2").click(function() {
            var idClienteVenta = $("#idClienteVenta").val();
            var fecha_hora_venta = $("#fecha_hora_venta").val();
            //$(this)[0]
            var datosTerrestres = new FormData();
            datosTerrestres.append("tipoOperacion", "insertarVenta");
            datosTerrestres.append("idClienteVenta", idClienteVenta);
            datosTerrestres.append("fecha_hora_venta", fecha_hora_venta);
            datosTerrestres.append("idEmpresa", idservicio);
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
                            alert("Agregado");
                        }
                    });
                }
            });

        });

        $("#editar2").click(function() {
            var idClienteVenta = $("#idClienteVenta").val();
            var fecha_hora_venta = $("#fecha_hora_venta").val();
            var idVenta = $("#id_venta").val();


            var datosTerrestres = new FormData();
            datosTerrestres.append("tipoOperacion", "editarVenta");
            datosTerrestres.append("idClienteVenta", idClienteVenta);
            datosTerrestres.append("fecha_hora_venta", fecha_hora_venta);
            datosTerrestres.append("idEmpresa", idVenta);
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
                            alert("Editado");
                            $("#editar2").hide();
                            $("#cancelar2").hide();
                            $("#guardar2").show();
                        }
                    });
                }
            });

        });

        //-----------------------------------------------Otros--------------------------------------------------

        $('#idBotonCollapseOtros').click(function() {

            $("#editar3").hide();
            $("#cancelar3").hide();
            $("#guardar3").show();
            $("#nombreIngresoEgreso").val("");
            $("#monto3").val("");
            $("#collapseMaritimo").collapse("hide");
            $("#collapseTerrestre").collapse("hide");

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

        $("#guardar3").click(function() {
            var nombreIngresoEgreso = $("#nombreIngresoEgreso").val();
            var idTipo3 = $("#idTipo3").val();
            var monto3 = $("#monto3").val();
            var id_empresa = $("#idservicio00").val();
            //$(this)[0]
            var datosAgregar3 = new FormData();
            datosAgregar3.append("tipoOperacion", "insertarIngresoEgreso");
            datosAgregar3.append("nombreIngresoEgreso", nombreIngresoEgreso);
            datosAgregar3.append("idTipo3", idTipo3);
            datosAgregar3.append("monto3", monto3);
            datosAgregar3.append("id_empresa", id_empresa);
            $.ajax({
                url: 'ajax/ajaxEmpresas.php',
                type: 'POST',
                data: datosAgregar3,
                processData: false,
                contentType: false,
                async: false,
                success: function(res) {
                    var datos11 = new FormData();
                    datos11.append("id", id_empresa);
                    $.ajax({
                        url: 'vista/tablaotros.php',
                        type: 'POST',
                        data: datos11,
                        processData: false,
                        contentType: false,
                        success: function(respuesta) {
                            $('#tablaotros').html(respuesta);
                            alert("Agregado")
                            $("#nombreIngresoEgreso").val("");
                            $("#monto3").val("");
                        }
                    });
                }
            });
        });

        $('#cancelar3').click(function() {
            $("#nombreIngresoEgreso").val("");
            $("#monto3").val("");
            $("#editar3").hide();
            $("#cancelar3").hide();
            $("#guardar3").show();

        });
        $('#editar3').click(function() {
            //Falta agregar id a modificar...
            var nombreIngresoEgreso = $("#nombreIngresoEgreso").val();
            var idTipo3 = $("#idTipo3").val();
            var monto3 = $("#monto3").val();
            var idIngresoEgreso = $("#idIngresoEgreso").val();
            var id_empresa = $("#idservicio00").val();
            //$(this)[0]
            var datosAgregar3 = new FormData();
            datosAgregar3.append("tipoOperacion", "editarIngresoEgreso");
            datosAgregar3.append("nombreIngresoEgreso", nombreIngresoEgreso);
            datosAgregar3.append("idTipo3", idTipo3);
            datosAgregar3.append("monto3", monto3);
            datosAgregar3.append("idIngresoEgreso", idIngresoEgreso);
            $.ajax({
                url: 'ajax/ajaxEmpresas.php',
                type: 'POST',
                data: datosAgregar3,
                processData: false,
                contentType: false,
                async: false,
                success: function(res) {
                    var datos11 = new FormData();
                    datos11.append("id", id_empresa);
                    $.ajax({
                        url: 'vista/tablaotros.php',
                        type: 'POST',
                        data: datos11,
                        processData: false,
                        contentType: false,
                        success: function(respuesta) {
                            $('#tablaotros').html(respuesta);
                            alert("Editado")
                            $("#nombreIngresoEgreso").val("");
                            $("#monto3").val("");
                            $("#editar3").hide();
                            $("#cancelar3").hide();
                            $("#guardar3").show();
                        }
                    });
                }
            });
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