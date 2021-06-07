<script type="text/javascript">
  $("#editar").hide();
  $("#enviar").show();
  $("#cancelar").hide();

  function reply_clickBorrar_tipo(clicked_id) {
    confirmar = confirm('¿Estás seguro de eliminar el registro?, Recuerda que si hay algún producto que haga uso de este tipo de trabajo, no podrás eliminarlo.');
    if (confirmar == true) {
      var datos = new FormData();
      datos.append("id", clicked_id);
      datos.append("tipoOperacion", "eliminarTipo");
      $.ajax({
        url: 'ajax/ajaxTipotrabajos.php',
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
    var inicio_id = cadena.indexOf("idcode:") + 7;
    var fin_id = cadena.indexOf(":idcode");
    var id = cadena.substring(inicio_id, fin_id);
    //Obteniendo valor del Nombre
    var inicio_nombre = cadena.indexOf("tipocode:") + 9;
    var fin_nombre = cadena.indexOf(":tipocode");
    var tipo = cadena.substring(inicio_nombre, fin_nombre);
    //Redireccionando  Valores a formulario.
    $('#idId').val(id);
    $('#idTipo').val(tipo);
    //Mostrar / Ocultar botón
    $("#editar").show();
    $("#enviar_tipo").hide();
    $("#cancelar").show();
  }
  $('#enviar_tipo').click(function(e) {
    var tipo = $('#idTipo').val();
    if (tipo == "") {
      alert("Vacío")
    } else {
      var datosAgregar = new FormData();
      datosAgregar.append("tipoOperacion", "insertarTipo");
      datosAgregar.append("tipotrabajo", tipo);
      $.ajax({
        url: 'ajax/ajaxTipotrabajos.php',
        type: 'POST',
        data: datosAgregar,
        processData: false,
        contentType: false,
        success: function(res) {
          $("#recargar1").load(location.href + " #recargar1");
          $('#idTipo').val("");
          $('#ModalAgregar').modal("show");
        }
      });
    }
  })
  $('#editar').click(function(e) {
    var id = $('#idId').val();
    var tipo = $('#idTipo').val();
    if (tipo == "") {
      alert("Vacío")
    } else {
      var datosEditar = new FormData();
      datosEditar.append("tipoOperacion", "editarTipo");
      datosEditar.append("id", id);
      datosEditar.append("tipo", tipo);
      $.ajax({
        url: 'ajax/ajaxTipotrabajos.php',
        type: 'POST',
        data: datosEditar,
        processData: false,
        contentType: false,
        success: function(res) {
          $("#recargar1").load(location.href + " #recargar1");
          $('#idTipo').val("");
        }
      });
      $("#editar").hide();
      $("#enviar_tipo").show();
      $("#cancelar").hide();
      $('#ModalEditar').modal("show");
    }
  });

  function limpiarFormulario() {
    document.getElementById("formulario").reset();
  }
  $('#enviar').click(function() {
    limpiarFormulario();
  });
  $('#cancelar').click(function() {
    $("#editar").hide();
    $("#enviar_tipo").show();
    $("#cancelar").hide();
    $('#idTipo').val("");
  });
  $('#editar').click(function() {
    limpiarFormulario();
  });
</script>