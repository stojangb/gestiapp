<script type="text/javascript">
//Productos
  $("#editar").hide();
  $("#enviar").show();
  $("#cancelar").hide();

  function reply_clickBorrar(clicked_id) {
    confirmar = confirm('¿Estás seguro de eliminar el registro?, Si hay una relación involucrada no podrás eliminarlo.');
    if (confirmar == true) {
      var datos = new FormData();
      datos.append("id", clicked_id);
      datos.append("tipoOperacion", "eliminarProducto");
      $.ajax({
        url: 'ajax/ajaxProductos.php',
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
    var inicio_nombre = cadena.indexOf("productocode:") + 13;
    var fin_nombre = cadena.indexOf(":productocode");
    var producto = cadena.substring(inicio_nombre, fin_nombre);
    //Obteniendo valor del tipo
    var inicio_nombre = cadena.indexOf("tipoproductocode:") + 17;
    var fin_nombre = cadena.indexOf(":tipoproductocode");
    var tipo = cadena.substring(inicio_nombre, fin_nombre);

    //Redireccionando  Valores a formulario.
    $('#idId').val(id);
    $('#idProducto').val(producto);
    $('#idTipoProducto').val(tipo);
    //Mostrar / Ocultar botón
    $("#editar").show();
    $("#enviar").hide();
    $("#cancelar").show();
  }

  $('#enviar').click(function(e) {
    var producto = $('#idProducto').val();
    var tipoproducto = $('#idTipoProducto').val();

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
          $("#recargar1").load(location.href + " #recargar1");
          $('#idProducto').val("");
          $('#ModalAgregar').modal("show");
        }
      });
    }

  })

  $('#editar').click(function(e) {
    var id = $('#idId').val();
    var producto = $('#idProducto').val();

    if (producto == "") {
      alert("Vacío");
    } else {
      var tipoproducto = $('#idTipoProducto').val();
      var datosEditar = new FormData();
      datosEditar.append("tipoOperacion", "editarProducto");
      datosEditar.append("id", id);
      datosEditar.append("producto", producto);
      datosEditar.append("tipoproducto", tipoproducto);

      $.ajax({
        url: 'ajax/ajaxProductos.php',
        type: 'POST',
        data: datosEditar,
        processData: false,
        contentType: false,
        success: function(res) {

          $("#recargar1").load(location.href + " #recargar1");
          $('#idProducto').val("");
          $('#ModalEditar').modal("show");
          $("#editar").hide();
          $("#enviar").show();
          $("#cancelar").hide();
        }
      });

    }
  });
  $('#cancelar').click(function() {
    $('#idProducto').val("");
    $("#editar").hide();
    $("#enviar").show();
    $("#cancelar").hide();
  });




</script>