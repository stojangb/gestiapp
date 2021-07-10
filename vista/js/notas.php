<script type="text/javascript">
  rutValido = false;
  $('#idAceptarAgregado').click(function() {
    $('#exampleModalCenter').modal("hide");
    rutValido = false;
  });
  $('#idEditarAgregado').click(function() {
    $('#exampleModalCenterEditar').modal("hide");
    rutValido = false;
  });

  $("#editar").hide();
  $("#enviar").show();
  $("#cancelar").hide();

  function reply_clickBorrar(clicked_id) {
    confirmar = confirm('¿Estás seguro de eliminar la nota?');
    if (confirmar == true) {
      var datos = new FormData();
      datos.append("id_nota", clicked_id);
      datos.append("tipoOperacion", "eliminarNota");
      $.ajax({
        url: 'ajax/ajaxNota.php',
        type: 'POST',
        data: datos,
        processData: false,
        contentType: false,
        success: function(res) {
          $("#recargar1").load(location.href + " #recargar1");
        }
      });
      $("#editar").hide();
      $("#enviar").show();
      $("#cancelar").hide();
    }
  }

  function reply_clickModificar(clicked_id) {
    var cadena = clicked_id;
    //Obteniendo valor de Id
    var inicio_id = cadena.indexOf("idcode:") + 7;
    var fin_id = cadena.indexOf(":idcode");
    var id = cadena.substring(inicio_id, fin_id);
    alert(id);

    //Obteniendo valor del Nombre
    var inicio_nombreContacto = cadena.indexOf("nombreContactocode:") + 19;
    var fin_nombreContacto = cadena.indexOf(":nombreContactocode");
    var nombreContacto = cadena.substring(inicio_nombreContacto, fin_nombreContacto);

    //Obteniendo valor del Rut
    var inicio_rut = cadena.indexOf("rutcode:") + 8;
    var fin_rut = cadena.indexOf(":rutcode");
    var rut = cadena.substring(inicio_rut, fin_rut);

    //Obteniendo valor del Correo
    var inicio_correo = cadena.indexOf("correocode:") + 11;
    var fin_correo = cadena.indexOf(":correocode");
    var correo = cadena.substring(inicio_correo, fin_correo);

    //Obteniendo valor del Telefono
    var inicio_telefono = cadena.indexOf("telefonocode:") + 13;
    var fin_telefono = cadena.indexOf(":telefonocode");
    var telefono = cadena.substring(inicio_telefono, fin_telefono);

    //Obteniendo valor de direccion
    var inicio_direccion = cadena.indexOf("direccioncode:") + 14;
    var fin_direccion = cadena.indexOf(":direccioncode");
    var direccion = cadena.substring(inicio_direccion, fin_direccion);

    //Obteniendo valor de ncuenta
    var inicio_ncuenta = cadena.indexOf("ncuentacode:") + 12;
    var fin_ncuenta = cadena.indexOf(":ncuentacode");
    var ncuenta = cadena.substring(inicio_ncuenta, fin_ncuenta);

    //Obteniendo valor de formaPago
    var inicio_forma_pago = cadena.indexOf("idformapagocode:") + 16;
    var fin_forma_pago = cadena.indexOf(":idformapagocode");
    var forma_pago = cadena.substring(inicio_forma_pago, fin_forma_pago);

    //Obteniendo valor de banco
    var inicio_banco = cadena.indexOf("idbancocode:") + 12;
    var fin_banco = cadena.indexOf(":idbancocode");
    var banco = cadena.substring(inicio_banco, fin_banco);

    //Obteniendo valor del TipoDeCuenta
    var inicio_tipocuenta = cadena.indexOf("idtipocuentacode:") + 17;
    var fin_tipocuenta = cadena.indexOf(":idtipocuentacode");
    var tipocuenta = cadena.substring(inicio_tipocuenta, fin_tipocuenta);

    //Obteniendo detalle
    var inicio_detalle = cadena.indexOf("detallescode:") + 13;
    var fin_detalle = cadena.indexOf(":detallescode");
    var detalle = cadena.substring(inicio_detalle, fin_detalle);

    //Redireccionando  Valores a formulario.
    $('#idId').val(id);
    $('#idNombreCliente').val(nombreContacto);
    $('#idDireccion').val(direccion);
    $('#idNCuenta').val(ncuenta);
    $('#idTipoCuenta').val(tipocuenta);
    $('#idBanco').val(banco);
    $('#idFormaPago').val(forma_pago);
    $('#idRut').val(rut);
    $('#idCorreo').val(correo);
    $('#idTelefono').val(telefono);
    $('#idDetalle').val(detalle);
    //Mostrar / Ocultar botón
    $("#editar").show();
    $("#enviar").hide();
    $("#cancelar").show();
    $("#textoModal").text("Editar Cliente");
  }

  $('#enviar').click(function(e) {
    alert("Hola, agregando")

    var nombreNota= $('#idNombreNota').val();
    var detalles = $('#idDetalle').val();
    var id_cliente = $('#idCliente').val();
    var id_fecha_hora_recordatorio = $('#idDate').val();

    var datosAgregar = new FormData();
    datosAgregar.append("tipoOperacion", "insertarNota");
    datosAgregar.append("nombreNota", nombreNota);
    datosAgregar.append("detalles", detalles);
    datosAgregar.append("id_cliente", id_cliente);
    datosAgregar.append("id_fecha_hora", id_fecha_hora_recordatorio);

    $.ajax({
      url: 'ajax/ajaxNota.php',
      type: 'POST',
      data: datosAgregar,
      processData: false,
      contentType: false,
      success: function(res) {
        alert(res);
        $("#recargar1").load(location.href + " #recargar1");
        limpiarFormulario();
        $('#exampleModalCenter').modal("show");
        $('#exampleModal').modal("hide");
      }
    });
  })

  $('#editar').click(function(e) {
    var rut = $('#idRut').val();
    //Validación de campos vacios.
    // if (rut == "" || rut == "-") {} else {  if (rutValido == true) {
    var datosAgregar = new FormData();
    datosAgregar.append("tipoOperacion", "editarCliente");
    var id = $('#idId').val();
    var nombreCliente = $('#idNombreCliente').val();
    var rut = $('#idRut').val();
    var correo = $('#idCorreo').val();
    var telefono = $('#idTelefono').val();
    var detalles = $('#idDetalle').val();
    var direccion = $('#idDireccion').val();
    var formaPago = $('#idFormaPago').val();
    var banco = $('#idBanco').val();
    var tipoCuenta = $('#idTipoCuenta').val();
    var nCuenta = $('#idNCuenta').val();

    datosAgregar.append("id", id);
    datosAgregar.append("nombreCliente", nombreCliente);
    datosAgregar.append("rut", rut);
    datosAgregar.append("correo", correo);
    datosAgregar.append("telefono", telefono);
    datosAgregar.append("detalles", detalles);
    datosAgregar.append("direccion", direccion);
    datosAgregar.append("formaPago", formaPago);
    datosAgregar.append("banco", banco);
    datosAgregar.append("tipoCuenta", tipoCuenta);
    datosAgregar.append("nCuenta", nCuenta);
    $.ajax({
      url: 'ajax/ajaxCliente.php',
      type: 'POST',
      data: datosAgregar,
      processData: false,
      contentType: false,
      success: function(res) {
        alert(res);
        $("#recargar1").load(location.href + " #recargar1");
        limpiarFormulario();
        //  $('#exampleModalCenter').modal("show");
        $('#exampleModal').modal("hide");
      }
    });
    //  }}
  });

  function limpiarFormulario() {
    document.getElementById("formulario").reset();
  }

  $('#IDBotonModalAgregar').click(function() {
    limpiarFormulario();
    $("#editar").hide();
    $("#enviar").show();
    $("#cancelar").hide();
    $("#textoModal").text("Agregar Cliente");
  });

  $('#cancelar').click(function() {
    limpiarFormulario();
    $("#editar").hide();
    $("#enviar").show();
    $("#cancelar").hide();
    $("#textoModal").text("Agregar Cliente");
  });

</script>