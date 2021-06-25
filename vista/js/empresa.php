<script type="text/javascript">
    $("#editar").hide();
    $("#enviar").show();
    $("#cancelar").hide();
    $("#clienteVista").show();
    $("#lugarVista").show();

    $('#dataTable2').DataTable({
        "order": [
            [0, "desc"]
        ]
    });

    function reply_clickBorrar(id) {
        confirmar = confirm('¿Estás seguro de eliminar esta empresa?, Todos los datos que contiene también se eliminaran.');
        if (confirmar == true) {
            var DdatosOtros = new FormData();
            DdatosOtros.append("id_empresa", id);
            DdatosOtros.append("tipoOperacion", "eliminarEmpresa");
            $.ajax({
                url: 'ajax/ajaxEmpresas.php',
                type: 'POST',
                data: DdatosOtros,
                processData: false, // tell jQuery not to process the data
                contentType: false, // tell jQuery not to set contentType
                success: function(res) {
                    $("#recargar1").load(location.href + " #recargar1");
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

        //Obteniendo valor de nombre_abreviado
        var inicio_nombre_abreviado = cadena.indexOf("nombre_abreviadocode:") + 21;
        var fin_nombre_abreviado = cadena.indexOf(":nombre_abreviadocode");
        var nombre_abreviado = cadena.substring(inicio_nombre_abreviado, fin_nombre_abreviado);

        //Obteniendo valor de razon_social
        var inicio_razon_social = cadena.indexOf("razon_socialcode:") + 17;
        var fin_razon_social = cadena.indexOf(":razon_socialcode");
        var razon_social = cadena.substring(inicio_razon_social, fin_razon_social);

        //Obteniendo valor de rut
        var inicio_rut = cadena.indexOf("rutcode:") + 8;
        var fin_rut = cadena.indexOf(":rutcode");
        var rut = cadena.substring(inicio_rut, fin_rut);

        //Obteniendo valor de giro
        var inicio_giro = cadena.indexOf("girocode:") + 9;
        var fin_giro = cadena.indexOf(":girocode");
        var giro = cadena.substring(inicio_giro, fin_giro);

        //Redireccionando  Valores a formulario.
        $('#idId').val(id);
        $('#idRut').val(rut);
        $('#idRazonSocial').val(razon_social);
        $('#idNombreAbreviado').val(nombre_abreviado);
        $('#idGiro').val(giro);
        //Mostrar / Ocultar botón
        $("#editar").show();
        $("#idAgregar").hide();
        $("#cancelar").show();
        $("#clienteVista").hide();
        $("#lugarVista").hide();
    }

    $(document).ready(function() {
        $("#idAgregar").click(function(e) {
            e.preventDefault();
            var nombre = $('#idNombreAbreviado').val();
            var razonSocial = $('#idRazonSocial').val();
            var rut = $('#idRut').val();
            var giro = $('#idGiro').val();
            if (nombre == "" || razonSocial == "" || rut == "" || giro == "") {
                alert("Campo Vacío detectado.");
            } else {
                var datosAgregar = new FormData();
                datosAgregar.append("nombre", nombre);
                datosAgregar.append("razonSocial", razonSocial);
                datosAgregar.append("rut", rut);
                datosAgregar.append("giro", giro);
                datosAgregar.append("tipoOperacion", "insertarEmpresa");
                $.ajax({
                    url: 'ajax/ajaxEmpresas.php',
                    type: 'POST',
                    data: datosAgregar,
                    processData: false,
                    contentType: false,
                    success: function(res) {
                        $("#recargar1").load(location.href + " #recargar1");
                        $('#idNombre').val("");
                        $('#idRazonSocial').val("");
                        $('#idRut').val("");
                        $('#idGiro').val("");
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
            $("#idAgregar").show();
            $("#cancelar").hide();
            $("#clienteVista").show();
            $("#lugarVista").show();
            $('#idRazonSocial').val("");
            $('#idNombreAbreviado').val("");
            $('#idRut').val("");
            $('#idGiro').val("");
        });

        $('#editar').click(function(e) {
            e.preventDefault();
            var nombre = $('#idNombreAbreviado').val();
            var razonSocial = $('#idRazonSocial').val();
            var rut = $('#idRut').val();
            var giro = $('#idGiro').val();
            var id = $('#idId').val();
            if (nombre == "" || razonSocial == "" || rut == "" || giro == "") {
                alert("Campo Vacío detectado.");
            } else {
                var datosAgregar = new FormData(); 
                datosAgregar.append("tipoOperacion", "editarEmpresa");
                datosAgregar.append("id", id);
                datosAgregar.append("nombre", nombre);
                datosAgregar.append("razonSocial", razonSocial);
                datosAgregar.append("rut", rut);
                datosAgregar.append("giro", giro);
             
                $.ajax({
                    url: 'ajax/ajaxEmpresas.php',
                    type: 'POST',
                    data: datosAgregar,
                    processData: false,
                    contentType: false,
                    success: function(res) {
                        $("#recargar1").load(location.href + " #recargar1");
                        $('#idNombreAbreviado').val("");
                        $('#idRazonSocial').val("");
                        $('#idRut').val("");
                        $('#idGiro').val("");
                        $('#ModalEditar').modal("show");
                    }
                });
          

            $("#editar").hide();
            $("#idAgregar").show();
            $("#cancelar").hide();
            $("#clienteVista").show();
            $("#lugarVista").show();
              }
        });
    });
</script>