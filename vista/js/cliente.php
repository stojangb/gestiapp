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
    confirmar = confirm('¿Estás seguro de eliminar al cliente?, Si tienes servicios asignados a este cliente no podras eliminarlo.');
    if (confirmar == true) {
      var datos = new FormData();
      datos.append("id_cliente", clicked_id);
      datos.append("tipoOperacion", "eliminarCliente");
      $.ajax({
        url: 'ajax/ajaxCliente.php',
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

    //Obteniendo valor del Tipo
    var inicio_nombreEmpresa = cadena.indexOf("nombreEmpresacode:") + 18;
    var fin_nombreEmpresa = cadena.indexOf(":nombreEmpresacode");
    var nombreEmpresa = cadena.substring(inicio_nombreEmpresa, fin_nombreEmpresa);

    //Obteniendo detalle
    var inicio_detalle = cadena.indexOf("detallescode:") + 13;
    var fin_detalle = cadena.indexOf(":detallescode");
    var detalle = cadena.substring(inicio_detalle, fin_detalle);

    //Redireccionando  Valores a formulario.
    $('#idId').val(id);
    $('#idNombreContacto').val(nombreContacto);
    $('#idNombreEmpresa').val(nombreEmpresa);
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
    var nombreEmpresa = $('#idNombreEmpresa').val();
    var rut = $('#idRut').val();
    //Validación de campos vacios.
    if (rut == "" || rut == "-") {} else {
      if (nombreEmpresa == "") {} else {
        if (rutValido == true) {
          var datosAgregar = new FormData();
          datosAgregar.append("tipoOperacion", "insertarCliente");
          var nombreContacto = $('#idNombreContacto').val();
          var nombreEmpresa = $('#idNombreEmpresa').val();
          var rut = $('#idRut').val();
          var correo = $('#idCorreo').val();
          var telefono = $('#idTelefono').val();
          var detalles = $('#idDetalle').val();
          datosAgregar.append("nombreContacto", nombreContacto);
          datosAgregar.append("nombreEmpresa", nombreEmpresa);
          datosAgregar.append("rut", rut);
          datosAgregar.append("correo", correo);
          datosAgregar.append("telefono", telefono);
          datosAgregar.append("detalles", detalles);
          $.ajax({
            url: 'ajax/ajaxCliente.php',
            type: 'POST',
            data: datosAgregar,
            processData: false,
            contentType: false,
            success: function(res) {
              $("#recargar1").load(location.href + " #recargar1");
              limpiarFormulario();
              $('#exampleModalCenter').modal("show");
              $('#exampleModal').modal("hide");
            }
          });
        }
      }
    }
  })

  $('#editar').click(function(e) {
    var nombreEmpresa = $('#idNombreEmpresa').val();
    var rut = $('#idRut').val();
    //Validación de campos vacios.
    if (nombreEmpresa == "") {} else {

      var datosEditar = new FormData();
      datosEditar.append("tipoOperacion", "editarCliente");
      var id = $('#idId').val();
      var nombreContacto = $('#idNombreContacto').val();
      var correo = $('#idCorreo').val();
      var telefono = $('#idTelefono').val();
      var detalles = $('#idDetalle').val();

      datosEditar.append("id", id);
      datosEditar.append("nombreContacto", nombreContacto);
      datosEditar.append("nombreEmpresa", nombreEmpresa);
      datosEditar.append("rut", rut);
      datosEditar.append("correo", correo);
      datosEditar.append("telefono", telefono);
      datosEditar.append("detalles", detalles);

      $.ajax({
        url: 'ajax/ajaxCliente.php',
        type: 'POST',
        data: datosEditar,
        processData: false,
        contentType: false,
        success: function(res) {
          $("#recargar1").load(location.href + " #recargar1");
          $('#exampleModal').modal("hide");
          $('#exampleModalCenterEditar').modal("show");
          $("#editar").hide();
          $("#enviar").show();
          $("#cancelar").hide();
          $("#textoModal").text("Agregar Cliente");
          limpiarFormulario();
        }
      });
    }

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

  function checkRut(rut) {
    // Despejar Puntos
    var valor = rut.value.replace('.', '');
    // Despejar Guión
    valor = valor.replace('-', '');

    // Aislar Cuerpo y Dígito Verificador
    cuerpo = valor.slice(0, -1);
    dv = valor.slice(-1).toUpperCase();

    // Formatear RUN
    rut.value = cuerpo + '-' + dv

    // Si no cumple con el mínimo ej. (n.nnn.nnn)
    if (cuerpo.length < 7) {
      rut.setCustomValidity("RUT Incompleto");
      return false;
    }
    // Calcular Dígito Verificador
    suma = 0;
    multiplo = 2;
    // Para cada dígito del Cuerpo
    for (i = 1; i <= cuerpo.length; i++) {
      // Obtener su Producto con el Múltiplo Correspondiente
      index = multiplo * valor.charAt(cuerpo.length - i);
      // Sumar al Contador General
      suma = suma + index;
      // Consolidar Múltiplo dentro del rango [2,7]
      if (multiplo < 7) {
        multiplo = multiplo + 1;
      } else {
        multiplo = 2;
      }
    }
    // Calcular Dígito Verificador en base al Módulo 11
    dvEsperado = 11 - (suma % 11);
    // Casos Especiales (0 y K)
    dv = (dv == 'K') ? 10 : dv;
    dv = (dv == 0) ? 11 : dv;
    // Validar que el Cuerpo coincide con su Dígito Verificador
    if (dvEsperado != dv) {
      rut.setCustomValidity("RUT Inválido");
      return false;
    }
    // Si todo sale bien, eliminar errores (decretar que es válido)
    rut.setCustomValidity('');
    rutValido = true;
  }
</script>