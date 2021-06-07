<script type="text/javascript">
  //Listar productos a partir del tipo de producto
  $("#editar").hide();
  $("#enviar").show();
  $("#cancelar").hide();

  function reply_clickBorrar(clicked_id) {
    confirmar = confirm('¿Estás seguro de eliminar la Barcaza?, Si la barcaza que desea borrar esta relacionada con un servicio, no sera posible borrarla.');
    if (confirmar == true) {
      var datosAgregar = new FormData();
      datosAgregar.append("tipoOperacion", "EliminarBarcaza");
      datosAgregar.append("id", clicked_id);
      $.ajax({
        url: 'ajax/ajaxBarcazas.php',
        type: 'POST',
        data: datosAgregar,
        processData: false,
        contentType: false,
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
    //Obteniendo valor del Nombre
    var inicio_nombre = cadena.indexOf("nombrecode:") + 11;
    var fin_nombre = cadena.indexOf(":nombrecode");
    var nombre = cadena.substring(inicio_nombre, fin_nombre);
    //Obteniendo valor del Rut
    var inicio_matricula = cadena.indexOf("matriculacode:") + 14;
    var fin_matricula = cadena.indexOf(":matriculacode");
    var matricula = cadena.substring(inicio_matricula, fin_matricula);
    //Obteniendo valor del Correo
    var inicio_cliente = cadena.indexOf("clientecode:") + 12;
    var fin_cliente = cadena.indexOf(":clientecode");
    var cliente = cadena.substring(inicio_cliente, fin_cliente);
    //Redireccionando  Valores a formulario.
    $('#idId').val(id);
    $('#idProducto').val(nombre);
    $('#idMatricula').val(matricula);
    $('#idMatriculaDuplicada').val(matricula);
    $('#idCliente').val(cliente);

    //Mostrar / Ocultar botón
    $("#editar").show();
    $("#enviar").hide();
    $("#cancelar").show();

  }
  $('#idMatricula').keyup(function() {
    $(this).val($(this).val().toUpperCase());
  });

  $('#enviar').click(function(e) {
    var datosAgregar = new FormData();
    var cliente = $('#idCliente').val();
    var producto = $('#idProducto').val();
    var matricula = $('#idMatricula').val();
    bloquearBarcaza = 0;

    if (cliente == "" || producto == "" || matricula == "") {
      alert("Campo Vacío Detectado");
    } else {
      //Comparar matrículas y cliente
      //Obtengo todas las matrículas Basado en mi cliente.
      datosAgregar.append("tipoOperacion", "listarBarcazasPorCliente");
      datosAgregar.append("cliente", cliente);

      $.ajax({
        url: 'ajax/ajaxBarcazas.php',
        type: 'POST',
        data: datosAgregar,
        processData: false,
        contentType: false,
        async: false,
        success: function(res) {
          var valor0 = JSON.parse(res);
          var contador = valor0.length;
          for (var i = 0; i < contador; i++) {
            if (matricula == valor0[i][2]) {
              bloquearBarcaza = 1;
            }
          }
          if (bloquearBarcaza == 1) {
            alert("No puede ingresar la misma barcaza con el mismo cliente 2 veces.");
          }
        }
      });
      if (bloquearBarcaza == 0) {
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
            $("#recargar1").load(location.href + " #recargar1");
            $('#idCliente').val("");
            $('#idProducto').val("");
            $('#idMatricula').val("");
            $('#ModalAgregar').modal("show");
          }
        });
      }
    }
  })

  $('#editar').click(function(e) {
    bloquearBarcaza = 0;
    var datosAgregar = new FormData();
    var cliente = $('#idCliente').val();
    var id = $('#idId').val();
    var producto = $('#idProducto').val();
    var matricula = $('#idMatricula').val();
    var matriculaDuplicada = $('#idMatriculaDuplicada').val();

    if (cliente == "" || producto == "" || matricula == "") {
      alert("Campo Vacío Detectado");
    } else {
      //Comparar matrículas y cliente
      //Obtengo todas las matrículas Basado en mi cliente.
      datosAgregar.append("tipoOperacion", "listarBarcazasPorCliente");
      datosAgregar.append("cliente", cliente);

      $.ajax({
        url: 'ajax/ajaxBarcazas.php',
        type: 'POST',
        data: datosAgregar,
        processData: false,
        contentType: false,
        async: false,
        success: function(res) {
          var valor0 = JSON.parse(res);
          var contador = valor0.length;
          for (var i = 0; i < contador; i++) {
            if (matricula == valor0[i][2]) {
              bloquearBarcaza = 1;
            }
            if(matricula == matriculaDuplicada){
              bloquearBarcaza = 0;
            }
          }
          if (bloquearBarcaza == 1) {
            alert("No puede ingresar la misma barcaza con el mismo cliente 2 veces.");
          }
        }
      });
      if (bloquearBarcaza == 0) {

        datosAgregar.append("tipoOperacion", "editarBarcaza");
        datosAgregar.append("cliente", cliente);
        datosAgregar.append("producto", producto);
        datosAgregar.append("id", id);
        datosAgregar.append("matricula", matricula);

        $.ajax({
          url: 'ajax/ajaxBarcazas.php',
          type: 'POST',
          data: datosAgregar,
          processData: false,
          contentType: false,
          success: function(res) {
            $("#recargar1").load(location.href + " #recargar1");
            $('#idCliente').val("");
            $('#idProducto').val("");
            $('#idMatricula').val("");
            $("#editar").hide();
            $("#enviar").show();
            $("#cancelar").hide();
            $('#ModalEditar').modal("show");
          }
        });
      }
    }
  })

  $('#cancelar').click(function() {
    $("#editar").hide();
    $("#enviar").show();
    $("#cancelar").hide();
    $('#idCliente').val("");
    $('#idProducto').val("");
    $('#idMatricula').val("");
  });
</script>