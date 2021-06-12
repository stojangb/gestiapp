<script type="text/javascript">
$('#idBotonRecargarPagina').prop('hidden', true);
$('#descargar').prop('hidden', true);
    //Fechas
    $(function() {
        $('input[name="daterange"]').daterangepicker({
            "maxSpan": {
                "days": 45
            },
            opens: 'right',
        }, function(start, end, label) {
            fechaInicio = start.format('YYYY-MM-DD');
            fechaTermino = end.format('YYYY-MM-DD');
        });
    });
    //Declaro los objetos necesarios.
    IDServicios = [];
    Maritimo = [];
    Terrestre = [];
    Otros = [];
    OtrosDeMaritimos = [
        []
    ];
    TodosTipoTrabajos = [];

    //Elimina objetos repetidos de array
    Array.prototype.unique = function(a) {
        return function() {
            return this.filter(a)
        }
    }(function(a, b, c) {
        return c.indexOf(a, b + 1) < 0
    });
    //Botón que genera excel
    $('#idBotonRecargarPagina').click(function(e) {
        location.reload();
    });
    $('#generarExcel').click(function(e) {
        $('#enviarAExcel').empty();
        $('.exc').empty();
        //A partir del cliente y las fechas obtengo los ID de los servicios.   
        var cliente = $("#idCliente").val();
        var datosAgregar = new FormData();
        datosAgregar.append("tipoOperacion", "listarIdServicioPorClienteYFechas");
        datosAgregar.append("fechaInicio", fechaInicio);
        datosAgregar.append("fechaTermino", fechaTermino);
        datosAgregar.append("cliente", cliente);
        $.ajax({
            url: 'ajax/ajaxEmpresas.php',
            type: 'POST',
            data: datosAgregar,
            processData: false,
            contentType: false,
            async: false,
            success: function(respuesta) {
                var valor0 = JSON.parse(respuesta);
                var contadora = valor0.length;
                for (var i = 0; i < contadora; i++) {
                    IDServicios.push(valor0[i][0]);
                }
            }
        });
        //Una vez tengo los ID Obtengo Todo de maritimo. Sí hay datos...
        //Array de iD a consulta IN
        var datosAgregar2 = new FormData();
        datosAgregar2.append("tipoOperacion", "listarMaritimosPorIdServicio");
        datosAgregar2.append("IDServicios", IDServicios);
        $.ajax({
            url: 'ajax/ajaxEmpresas.php',
            type: 'POST',
            data: datosAgregar2,
            processData: false,
            contentType: false,
            async: false,
            success: function(respuesta1) {
                var valor00 = JSON.parse(respuesta1);
                var contadora = valor00.length;
                for (var i = 0; i < contadora; i++) {
                    Maritimo.push(valor00[i][0], valor00[i][1], valor00[i][2], valor00[i][3], valor00[i][4], 0);
                }
                Maritimo.forEach(element => {
                    $('#enviarAExcel').append('<input class="exc" hidden type="text" name="maritimo[]" value="' + element + '">');
                });
            }
        });
        //Una vez tengo los ID Obtengo Todo de Terrestre. Sí hay datos...
        //Array de iD a consulta IN
        var datosAgregar3 = new FormData();
        datosAgregar3.append("tipoOperacion", "listarTerrestrePorIdServicio");
        datosAgregar3.append("IDServicios", IDServicios);
        $.ajax({
            url: 'ajax/ajaxEmpresas.php',
            type: 'POST',
            data: datosAgregar3,
            processData: false,
            contentType: false,
            async: false,
            success: function(respuesta2) {
                var valor01 = JSON.parse(respuesta2);
                var contadora1 = valor01.length;
                for (var i = 0; i < contadora1; i++) {
                    Terrestre.push(valor01[i][0], valor01[i][1], valor01[i][2], valor01[i][3], 0, 1);
                }
                Terrestre.forEach(element => {
                    $('#enviarAExcel').append('<input class="exc" hidden type="text" name="terrestre[]" value="' + element + '">');
                });
                //Obtengo todos los otros, para listarlos en el excel ordenados en la barra superior
                var datosAgregar4 = new FormData();
                datosAgregar4.append("tipoOperacion", "listarObjetos");
                datosAgregar4.append("IDServicios", IDServicios);
                $.ajax({
                    url: 'ajax/ajaxEmpresas.php',
                    type: 'POST',
                    data: datosAgregar4,
                    processData: false,
                    contentType: false,
                    async: false,
                    success: function(respuesta) {
                        var valor2 = JSON.parse(respuesta);
                        var contadora2 = valor2.length;
                        for (var i = 0; i < contadora2; i++) {
                            Otros.push(valor2[i][0]);
                        }
                        Otros.unique().forEach(element => {
                            $('#enviarAExcel').append('<input class="exc" hidden type="text" name="otros[]" value="' + element + '">');
                        });
                    }
                });
                //A partir del id_servicios Obtengo todos los tipos de trabajo para listarlos en la barra superior ordenados
                var datosAgregar5 = new FormData();
                datosAgregar5.append("tipoOperacion", "listarTiposDeTrabajo");
                datosAgregar5.append("IDServicios", IDServicios);
                $.ajax({
                    url: 'ajax/ajaxEmpresas.php',
                    type: 'POST',
                    data: datosAgregar5,
                    processData: false,
                    contentType: false,
                    async: false,
                    success: function(respuesta) {
                        var valor2 = JSON.parse(respuesta);
                        var contadora2 = valor2.length;
                        for (var i = 0; i < contadora2; i++) {
                            TodosTipoTrabajos.push(valor2[i][0]);
                        }
                        TodosTipoTrabajos.unique().forEach(element => {
                            $('#enviarAExcel').append('<input class="exc" hidden type="text" name="todostipotrabajos[]" value="' + element + '">');
                        });
                    }
                });
              
                //A partir del id_servicios Obtengo todos los Otros de Maritimos
                var datosAgregar6 = new FormData();
                datosAgregar6.append("tipoOperacion", "listarOtrosDeMaritimosPorIdServicio");
                datosAgregar6.append("IDServicios", IDServicios);
                $.ajax({
                    url: 'ajax/ajaxEmpresas.php',
                    type: 'POST',
                    data: datosAgregar6,
                    processData: false,
                    contentType: false,
                    async: false,
                    success: function(respuesta) {
                        var valor2 = JSON.parse(respuesta);
                        var contadora2 = valor2.length;
                        for (var i = 0; i < contadora2; i++) {
                            for (var a = 0; a < 4; a++) {
                                $('#enviarAExcel').append('<input class="exc" hidden type="text" name="OtrosDeMaritimos[' + i + '][' + a + ']" value="' + valor2[i][a] + '">');
                            }
                        }
                    }
                });
     
                //A partir del id_servicios Obtengo todos los Otros de Terrestre
                var datosAgregar6 = new FormData();
                datosAgregar6.append("tipoOperacion", "listarOtrosDeTerrestrePorIdServicio");
                datosAgregar6.append("IDServicios", IDServicios);
                $.ajax({
                    url: 'ajax/ajaxEmpresas.php',
                    type: 'POST',
                    data: datosAgregar6,
                    processData: false,
                    contentType: false,
                    async: false,
                    success: function(respuesta) {
                        var valor2 = JSON.parse(respuesta);
                        var contadora2 = valor2.length;
                        for (var i = 0; i < contadora2; i++) {
                            for (var a = 0; a < 4; a++) {
                                $('#enviarAExcel').append('<input class="exc" hidden type="text" name="OtrosDeTerrestre[' + i + '][' + a + ']" value="' + valor2[i][a] + '">');
                            }
                        }
                    }
                });
            
                //A partir del id_servicios Obtengo todos los tipos de trabajo junto a su certificado.
                var datosAgregar6 = new FormData();
                datosAgregar6.append("tipoOperacion", "listarTiposDeTrabajoPorIdServicio");
                datosAgregar6.append("IDServicios", IDServicios);
                $.ajax({
                    url: 'ajax/ajaxEmpresas.php',
                    type: 'POST',
                    data: datosAgregar6,
                    processData: false,
                    contentType: false,
                    async: false,
                    success: function(respuesta) {
                        var valor2 = JSON.parse(respuesta);
                        var contadora2 = valor2.length;
                        for (var i = 0; i < contadora2; i++) {
                            for (var a = 0; a < 2; a++) {
                                $('#enviarAExcel').append('<input class="exc" hidden type="text" name="TiposDeTrabajoMaritYTerre[' + i + '][' + a + ']" value="' + valor2[i][a] + '">');
                            }
                        }
                    }
                });
                //Envío fechas y nombre de cliente 
                var clienteNombre1 = $("#idCliente option:selected").text();
                var clienteNombre = clienteNombre1.trim();
                $('#enviarAExcel').append('<input hidden type="text" name="fechaInicio" value="' + fechaInicio + '">');
                $('#enviarAExcel').append('<input hidden type="text" name="fechaTermino" value="' + fechaTermino + '">');
                $('#enviarAExcel').append('<input hidden type="text" name="nombreCliente" value="' + clienteNombre + '">');
                alert("Excel generado");
                $('#generarExcel').prop('hidden', true);
                $('#descargar').prop('hidden', false);
                $('#idBotonRecargarPagina').prop('hidden', false);
            }
        });
    });
</script>