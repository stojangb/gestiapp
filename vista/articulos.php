<?php require('backend/redirect.php'); ?>
<!-- Fin comprobación de Login -->
<!DOCTYPE html>
<html lang="es">
<?php include('estructura/head.php');
?>

<body id="page-top">
  <div id="wrapper">
    <?php include('estructura/barraLateral.php'); ?>
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <?php include('estructura/barraSuperior.php'); ?>
        <div class="container-fluid">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Artículos o productos</h1>
          </div>
          <p class="mb-4">Agregar artículos para la venta.</a>.</p>
          <div class="form-group">
            <label class="" for="exampleFormControlSelect1">Selección de empresa a la que pertenece el artículo</label>
            <select id="idCliente" class="form-control" name="nameCliente">
              <option value="">Seleccionar</option>
              <?php
              $matrizClientes = ControllerEmpresas::listarEmpresas();
              foreach ($matrizClientes as $registro) {
              ?>
                <option value="<?php echo $registro["id"] ?>">
                  <?php echo $registro["nombre_abreviado"]; ?> </option>
              <?php
              }
              ?>
            </select>
          </div>

          <div class="form-group">
            <label for="exampleFormControlInput1">Nombre del artículo</label>
            <input type="text" name="nombre" class="form-control" id="idProducto" placeholder="Poleras">
            <input type="text" hidden class="form-control" id="idId">
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Cantidad</label>
            <input type="text" name="nombre" class="form-control" id="idMatricula" placeholder="20">
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Precio</label>
            <input type="text" name="nombre" class="form-control" id="idMatricula" placeholder="20">
          </div>
          <br>
          <input type="submit" value="Agregar" name="enviar" id="enviar" class="btn btn-outline-success" style="display: true;">
          <input type="submit" value="Editar" name="editar" id="editar" class="btn btn-outline-warning">
          <input type="submit" value="Cancelar" name="cancelar" id="cancelar" class="btn btn-outline-danger" style="display: none;">
          <br>
          <br>
          <!-- Inicio Código php que agrega interactividad a la tabla -->

          <!-- DataTales Example -->
          <div id="recargar1" class="card shadow mb-4 reload">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Listado de artículos</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Cantidad</th>
                      <th>Precio</th>
                      <th>Empresa</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Nombre Empresa</th>
                      <th>Rut Empresa</th>
                      <th>Nombre de la Barcaza</th>
                      <th>Matrícula</th>
                      <th>Acciones</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                    $matrizPrecios = ControllerArticulos::listarArticulos();
                    foreach ($matrizPrecios as $registro) {
                    ?>
                      <tr>
                        <td><?php echo $registro["nombreEmpresa"]; ?></td>
                        <td><?php echo $registro["rut"]; ?></td>
                        <td><?php echo $registro["nombre"]; ?></td>
                        <td><?php echo $registro["matricula"]; ?></td>
                        <td>
                          <div style="text-align: center;">
                            <input style="margin-bottom: 4px;  margin-right:6px;" type="button" onClick="reply_clickModificar(this.id)" value="Editar" name="enviar" id="                 
                      <?php echo 'idcode:', $registro["id"], ':idcode nombrecode:',  $registro["nombre"], ':nombrecode matriculacode:', $registro["matricula"], ':matriculacode clientecode:', $registro["idclient"], ':clientecode' ?>" class="btn btn-outline-warning">

                            <input style="margin-bottom: 4px;  margin-right:6px;" type="button" onClick="reply_clickBorrar(this.id)" value="Borrar" name="borrar" id="<?php echo $registro["id"] ?>" class="borrar-id btn btn-outline-danger">
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
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- Inicio Modal Agregar-->
      <div class="modal fade" id="ModalAgregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Notificación</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Producto marítimo agregado con éxito
            </div>
            <div class="modal-footer">
              <button type="button" data-dismiss="modal" id="idEditarAgregado" class="btn btn-primary">Aceptar</button>
            </div>
          </div>
        </div>
      </div>
      <!-- Fin Modal -->
      <!-- Inicio Modal Editar-->
      <div class="modal fade" id="ModalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Notificación</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Producto marítimo editado con éxito
            </div>
            <div class="modal-footer">
              <button type="button" id="idEditarAgregado" data-dismiss="modal" class="btn btn-primary">Aceptar</button>
            </div>
          </div>
        </div>
      </div>
      <!-- Fin Modal -->
      <?php require('js/barcaza.php'); ?>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php include('estructura/footer.php'); ?>
      <!-- Fin Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->



  <!-- INICIO Módulo de cierre de sesión y enlaces javascript-->

  <?php require('estructura/cerrarSesionyEnlacesjs.php'); ?>

  <!-- FIN Módulo de cierre de sesión y enlaces javascript-->

</body>

</html>