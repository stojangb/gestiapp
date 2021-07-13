<!-- Comprobación de Login y otros -->
<?php require('backend/redirect.php');
if (!isset($_SESSION)) {
  session_start();
} ?>
<!-- Fin comprobación de Login -->
<!DOCTYPE html>
<html lang="es">
<?php require('estructura/head.php'); ?>
<?php
require_once "./controlador/empresas.controller.php";
require_once "./modelo/empresa.modelo.php";
?>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <?php include('estructura/barraLateral.php'); ?>
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <?php include('estructura/barraSuperior.php'); ?>
        <div class="container-fluid">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">ID Venta: <?php echo $_POST["id"]; ?></h1>
            <input type="text" hidden id="idventaactual" value="<?php echo $_POST["id"]; ?>">
          </div>
          <?php
          $matrizTerrestre = ControllerEmpresas::listarVentaPorIdVenta($_POST["id"]);
          foreach ($matrizTerrestre as $registroTerrestre) {
          ?>
            <h4>Cliente: <?php echo $registroTerrestre["nombre_cliente"] ?> </h4>
            <h4>Fecha: <?php echo $registroTerrestre["fecha"] ?> </h4>
          <?php
          }
          ?>
          <input hidden type="text" name="" value=" <?php echo $_POST["id"]; ?>" id="idservicio00">
          <br>
          <br>
          <br>
          <div style="text-align: center;">
            <u><b style="color: green;">Agregar productos</b></u>
            <br> <br>
            <div style=" background-color: #EBEBEB;" class="row">
              <div class="col-sm-3">
                <div class="form-group">
                  <label class="" for="exampleFormControlSelect1">Seleccione un producto</label>
                  <select id="select" class="form-control" name="nameCliente">
                    <option value="0">Seleccionar</option>
                    <?php
                    $matrizClientes = ControllerProductos::listarProductosPorEmpresa($_SESSION['iid']);
                    foreach ($matrizClientes as $registro) {
                    ?>
                      <option value="<?php echo $registro["id"] ?>">
                        <?php echo $registro["nombre"]; ?> </option>
                    <?php
                    }
                    ?>
                  </select>
                  <br>
                  <button id="boton_agregar_producto_a_venta" type="button" class="btn btn-outline-primary">Agregar producto</button>
                </div>
              </div>
              <div class="col-sm-3">
                Cantidad: <p id="cantidad"></p>
                <br>
                Precio: <input id="precio" type="number">
                <input id="nombre" type="text" hidden>
              </div>
              <div class="col-sm-3">
              </div>
              <div class="col-sm-3">
              </div>
            </div>
          </div>
          <!-- Productos -->
          <br>
          <br>
          <br>
          <div class="card shadow mb-4 reload">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Listado de compras adjuntas a la venta actual</h6>
            </div>
            <div class="card-body" id="recargar1">
              <div class="table-responsive" id="dataTab">
                <table class="table table-bordered display" id="tablaproductos2" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Producto</th>
                      <th>Precio</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $matrizTerrestre = ControllerEmpresas::listarVentasDetalle($_POST["id"]);
                    foreach ($matrizTerrestre as $registroTerrestre) {
                    ?>
                      <tr>
                        <td><?php echo $registroTerrestre["id"] ?></td>
                        <td><?php echo $registroTerrestre["nombre"] ?></td>
                        <td><?php echo $registroTerrestre["precio"] ?></td>
                        <td>
                          <div style="text-align: center;">
                            <input style="margin-bottom: 4px;  margin-right:6px;" type="button" onClick="reply_clickBorrarTerrestre(this.id)" value="Borrar" name="borrar" id="<?php echo $registroTerrestre["id"] ?>" class="borrar-id btn btn-outline-danger">
                          </div>
                        </td>
                      </tr>
                    <?php
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <script>
            $('#boton_agregar_producto_a_venta').click(function() {
              var nombre = $('#nombre').val();
              var precio = $('#precio').val();
              var idventaactual = $('#idventaactual').val();
              var productoElegido = $('#select').val();

              var datosAgregarx = new FormData();
              datosAgregarx.append("tipoOperacion", "insertarDetalleVenta");
              datosAgregarx.append("nombre", nombre);
              datosAgregarx.append("precio", precio);
              datosAgregarx.append("idventaactual", idventaactual);
              datosAgregarx.append("productoElegido", productoElegido);

              $.ajax({
                url: 'ajax/ajaxEmpresas.php',
                type: 'POST',
                data: datosAgregarx,
                processData: false,
                contentType: false,
                success: function(res) {
                  //    $("#recargar1").load(location.href + " #recargar1");
                  alert("Producto agregado");
                  location.reload()
                }
              });
            })

            $('#select').on('change', function() {
              var id = this.value;
              //Jquery que consulta valor y cantidad, además lo pinta en la pantalla.
              var DdatosOtros = new FormData();
              DdatosOtros.append("id", id);
              DdatosOtros.append("tipoOperacion", "ConsultarCantidadYPrecioDeProductos");
              $.ajax({
                  url: 'ajax/ajaxEmpresas.php',
                  type: 'POST',
                  data: DdatosOtros,
                  processData: false,
                  contentType: false,
                  success: function(res) {
                    //   alert(res);
                    var valor1 = JSON.parse(res);
                    //cantidad  alert(valor1[0][0]);
                    //precio  alert(valor1[0][1]);
                    $("#cantidad").text(valor1[0][0]);
                    $("#precio").val(valor1[0][1]);
                    $("#nombre").val(valor1[0][2]);

                    if (valor1[0][0] < 1) {
                      $("#boton_agregar_producto_a_venta").prop('disabled', true);
                  }else{
                    $("#boton_agregar_producto_a_venta").prop('disabled', false);
                  }

                }
              });
            });

            function reply_clickBorrarTerrestre(id) {
              confirmar = confirm('¿Estás seguro de eliminar el producto?, Si no puede eliminarlo, revise que no tenga un objeto relacionado.');
              if (confirmar == true) {
                var DdatosOtros = new FormData();
                DdatosOtros.append("id", id);
                DdatosOtros.append("tipoOperacion", "eliminarProductoDeDetalle");
                $.ajax({
                  url: 'ajax/ajaxEmpresas.php',
                  type: 'POST',
                  data: DdatosOtros,
                  processData: false, // tell jQuery not to process the data
                  contentType: false, // tell jQuery not to set contentType
                  success: function(res) {
                    alert("Eliminado");
                    location.reload()

                  }
                });
              }
            }
          </script>

          <br>
          <form action="productos" method="post">
            <input hidden type="text" name="id" value="<?php echo $_SESSION['iid'] ?>"><br>
            <input style="margin-bottom: 4px;  margin-right:6px;" value="Volver" type="submit" class=" btn btn-outline-primary">
          </form>
        </div>

        <br>



        <!-- /.container-fluid -->
        <?php include('estructura/footer.php'); ?>
        <!-- Fin Footer -->
        <?php require('estructura/cerrarSesionyEnlacesjs.php'); ?>
        <script src="vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
        <script src="js/demo/datatables-demo.js"></script>
        <!-- SELECTOR -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
</body>

</html>