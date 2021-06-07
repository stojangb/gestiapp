<script type="text/javascript">
    $("#editar").hide();
    $("#enviar").show();
    $("#cancelar").hide();
    $("#clienteVista").show();
    $("#lugarVista").show();

    $('#dataTable2').DataTable( {
        "order": [[ 0, "desc" ]]
    } );

    function reply_clickBorrar(id) {
        confirmar = confirm('¿Estás seguro de eliminar el servicio?, Todos los datos que contiene también se eliminaran.');
        if (confirmar == true) {
            var DdatosOtros = new FormData();
            DdatosOtros.append("id_servicio", id);
            DdatosOtros.append("tipoOperacion", "eliminarServicio");
            $.ajax({
                url: 'ajax/ajaxServicios.php',
                type: 'POST',
                data: DdatosOtros,
                processData: false, // tell jQuery not to process the data
                contentType: false, // tell jQuery not to set contentType
                success: function(res) {
                    $("#recargar1").load(location.href + " #recargar1");
                }
            });
            //Eliminar carpeta del servicio
            var dataString = 'id=' + id;
            $.ajax({
                type: "POST",
                url: "vista/borrar_directorio.php",
                data: dataString,
                success: function() {

                }
            });
        }
    }


    function reply_clickModificar(clicked_id) {
        var cadena = clicked_id;
        //Obteniendo valor de Id
        var inicio_id = cadena.indexOf("idcode:") + 7;
        var fin_id = cadena.indexOf(":idcode");
        var id = cadena.substring(inicio_id, fin_id);

        //Obteniendo detalle
        var inicio_detalle = cadena.indexOf("detallescode:") + 13;
        var fin_detalle = cadena.indexOf(":detallescode");
        var detalle = cadena.substring(inicio_detalle, fin_detalle);

        //Obteniendo fecha
        var inicio_fecha = cadena.indexOf("fechacode:") + 10;
        var fin_fecha = cadena.indexOf(":fechacode");
        var fecha = cadena.substring(inicio_fecha, fin_fecha);

        //Redireccionando  Valores a formulario.
        $('#idId').val(id);
        $('#idDetalles').val(detalle);
        $('#idDate').val(fecha);
        //Mostrar / Ocultar botón
        $("#editar").show();
        $("#idAgregarServicio").hide();
        $("#cancelar").show();
        $("#clienteVista").hide();
        $("#lugarVista").hide();
    }

    Date.prototype.toDateInputValue = (function() {
        var local = new Date(this);
        local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
        return local.toJSON().slice(0, 10);
    });

    $(document).ready(function() {
        //Fecha automática
        $('#idDate').val(new Date().toDateInputValue());

        $("#idAgregarServicio").click(function(e) {
            e.preventDefault();

            var idlugar = $('#idLugar').val();
            var detalles = $('#idDetalles').val();
            var fecha = $('#idDate').val();
            var cliente = $('#idCliente').val();
            if (idlugar == "" || detalles == "" || fecha == "" || cliente == "") {
                alert("Campo Vacío detectado.");
            } else {
                var datosAgregar = new FormData();
                datosAgregar.append("idlugar", idlugar);
                datosAgregar.append("detalles", detalles);
                datosAgregar.append("fecha", fecha);
                datosAgregar.append("cliente", cliente);
                datosAgregar.append("tipoOperacion", "insertarServicio");
                $.ajax({
                    url: 'ajax/ajaxServicios.php',
                    type: 'POST',
                    data: datosAgregar,
                    processData: false,
                    contentType: false,
                    success: function(res) {
                        $("#recargar1").load(location.href + " #recargar1");
                        $('#idDetalles').val("");
                        $('#idLugar').val("");
                        $('#idCliente').val("");
                        $('#ModalAgregar').modal("show");
                    }
                });
            }
        });

        function limpiarFormulario() {
            document.getElementById("formulario").reset();
        }
        $('#cancelar').click(function() {
            $("#editar").hide();
            $("#idAgregarServicio").show();
            $("#cancelar").hide();
            $("#clienteVista").show();
            $("#lugarVista").show();
            $('#idDetalles').val("");
            $('#idLugar').val("");
            $('#idCliente').val("");

        });
        $('#editar').click(function(e) {
            var fecha = $('#idDate').val();   
            var detalles = $('#idDetalles').val();
            if (detalles == "" || fecha == "") {
                alert("Campo Vacío detectado");
            }else{

            
                var id = $('#idId').val();
                var datosAgregar = new FormData();
                datosAgregar.append("detalles", detalles);
                datosAgregar.append("fecha", fecha);
                datosAgregar.append("id", id);
                datosAgregar.append("tipoOperacion", "editarServicio");
                $.ajax({
                    url: 'ajax/ajaxServicios.php',
                    type: 'POST',
                    data: datosAgregar,
                    processData: false,
                    contentType: false,
                    success: function(res) {
                        $("#recargar1").load(location.href + " #recargar1");
                        $('#idDetalles').val("");
                        $('#idDetalles').val("");
                        $('#idLugar').val("");
                        $('#idCliente').val("");
                        $('#ModalEditar').modal("show");
                    }
                });
                $("#editar").hide();
                $("#idAgregarServicio").show();
                $("#cancelar").hide();
                $("#clienteVista").show();
                $("#lugarVista").show();
            }
        });
    });
</script>