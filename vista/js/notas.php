<script src="https://cdnjs.cloudflare.com/ajax/libs/push.js/0.0.11/push.min.js"></script>
<script type="text/javascript">
  //Recordatorio
  Push.Permission.request();
  function notificacion1() {     
 
    Push.create('¡Recordatorio!, enviando correo', {
      body: 'Este es un aviso, porque tienes un recordatorio pendiente, revisa tus notas y recordatorios.',
      icon: 'icon.png',
      timeout: 8000, // Timeout before notification closes automatically.
      vibrate: [100, 100, 100], // An array of vibration pulses for mobile devices.
      onClick: function() {
        // Callback for when the notification is clicked. 
        console.log(this);
      }
    });
    alert("Recordatorio, enviando correo");
  }
  
  function recordatorio() {
    //AJAX
    var datosAgregar = new FormData();
    datosAgregar.append("tipoOperacion", "recordarNota");
    datosAgregar.append("nombreNota", "nombreNota");

    $.ajax({
      url: 'ajax/ajaxNota.php',
      type: 'POST',
      data: datosAgregar,
      processData: false,
      contentType: false,
      success: function(res) {
  
        if (res==1) {
        notificacion1();
        }
      }
    });
  }
  setInterval("recordatorio()", 1000);

  $('#idAceptarAgregado').click(function() {
    $('#exampleModalCenter').modal("hide");

  });
  $('#idEditarAgregado').click(function() {
    $('#exampleModalCenterEditar').modal("hide");
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

    //Obteniendo valor del Nombre
    var inicio_nombre = cadena.indexOf("idnombrecode:") + 13;
    var fin_nombre = cadena.indexOf(":idnombrecode");
    var nombre = cadena.substring(inicio_nombre, fin_nombre);

    //Obteniendo valor del recordatorio
    var inicio_recordatorio = cadena.indexOf("idrecordatoriocode:") + 19;
    var fin_recordatorio = cadena.indexOf(":idrecordatoriocode");
    var recordatorio = cadena.substring(inicio_recordatorio, fin_recordatorio);

    //Obteniendo detalle
    var inicio_detalle = cadena.indexOf("detallescode:") + 13;
    var fin_detalle = cadena.indexOf(":detallescode");
    var detalle = cadena.substring(inicio_detalle, fin_detalle);

    //Obteniendo valor del cliente
    var inicio_cliente = cadena.indexOf("idclientecode:") + 14;
    var fin_cliente = cadena.indexOf(":idclientecode");
    var cliente = cadena.substring(inicio_cliente, fin_cliente);

    recordatorio = recordatorio.replace(" ", "T")
    //Redireccionando  Valores a formulario.
    $('#idId').val(id);
    $('#idNombreNota').val(nombre);
    $('#idDate').val(recordatorio);
    $('#idDetalle').val(detalle);
    $('#idCliente').val(cliente);
    //Mostrar / Ocultar botón
    $("#editar").show();
    $("#enviar").hide();
    $("#cancelar").show();
    $("#textoModal").text("Editar nota");
  }

  $('#enviar').click(function(e) {
    var nombreNota = $('#idNombreNota').val();
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
    var id = $('#idId').val();
    var nombreNota = $('#idNombreNota').val();
    var detalles = $('#idDetalle').val();
    var id_cliente = $('#idCliente').val();
    var id_fecha_hora_recordatorio = $('#idDate').val();
    var datosAgregar = new FormData();
    datosAgregar.append("tipoOperacion", "editarNota");
    datosAgregar.append("id", id);
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
        $("#editar").hide();
        $("#enviar").show();
        $("#cancelar").hide();
        $('#idNombreNota').val("");
        $('#idDetalle').val("");
        // $('#idCliente').clear();   
        $('#idDate').val("00/00/00T00:00");
        $('#exampleModal').modal("hide");
      }
    });
    //  }}
  });





  $('#cancelar').click(function() {
    $("#editar").hide();
    $("#enviar").show();
    $("#cancelar").hide();
    $('#idNombreNota').val("");
    $('#idDetalle').val("");
    // $('#idCliente').clear();   
    $('#idDate').val("00/00/00T00:00");
    $("#textoModal").text("Agregar nota");
  });
</script>