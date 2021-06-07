<!-- Comprobación de Login y otros -->
<!-- <?php require('backend/redirect.php'); ?> -->
<!-- Fin comprobación de Login -->

<!DOCTYPE html>
<html lang="es">
<?php require('estructura/head.php'); ?>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!--   Inicio Barra Lateral  -->
    <?php include('estructura/barraLateral.php'); ?>
    <!--   Fin Barra Lateral     -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        <!-- Inicio Barra superior -->
        <?php include('estructura/barraSuperior.php'); ?>
        <!-- Fin Barra Superior -->
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Productos a sanitizar (Terrestres y Otros)</h1>
          </div>
          <p class="mb-4">Aquí podrá agregar y modificar los productos a sanitizar.</p>
          <div class="form-group" style="display: none">
            <!--  ID solo para uso BD -->
            <input type="text" name="id" class="form-control" id="idId" placeholder="Nombre">
          </div>
          <!--Fin Tabla Tipos -->
          <div class="form-group">
            <label for="exampleFormControlInput1">Ingrese nuevo producto a sanitizar</label>
            <input type="text" name="idProducto" class="form-control" id="idProducto" placeholder="Nuevo producto">
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Tipo producto a sanitizar</label>
            <select class="form-control" id="idTipoProducto" name="idTipoProducto">
              <option value="Terrestre">Terrestre</option>
              <option value="Otro">Otro</option>
            </select>
          </div>
          <input type="submit" value="Agregar producto" name="enviar" id="enviar" class="btn btn-outline-success" style="display: true;">
          <input type="submit" value="Editar" name="editar" id="editar" class="btn btn-outline-warning">
          <input type="submit" value="Cancelar" name="cancelar" id="cancelar" class="btn btn-outline-danger" style="display: none;">
          <br>
          <br>
          <!-- Tabla de productos-->
          <div id="recargar1" class="card shadow mb-4 reload">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Listado de productos a sanitizar</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Productos a sanitizar</th>
                      <th>Tipo producto</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Productos a sanitizar</th>
                      <th>Tipo producto</th>
                      <th>Acciones</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                    $matrizProductos = ControllerProductos::listarProductos();
                    foreach ($matrizProductos as $registro) {
                    ?>
                      <tr>
                        <td><?php echo $registro["productos"]; ?></td>
                        <td><?php echo $registro["tipoproducto"]; ?></td>
                        <td>
                          <div style="text-align: center;">
                            <input style="margin-bottom: 4px;  margin-right:6px;" type="button" onClick="reply_clickModificar(this.id)" value="Editar" name="enviar" id="                 
                      <?php echo 'idcode:', $registro["id"], ':idcode productocode:',  $registro["productos"], ':productocode tipoproductocode:',  $registro["tipoproducto"], ':tipoproductocode' ?>" class="btn btn-outline-warning">
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
                  Producto agregado con éxito
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
                  Producto editado con éxito
                </div>
                <div class="modal-footer">
                  <button type="button" id="idEditarAgregado" data-dismiss="modal" class="btn btn-primary">Aceptar</button>
                </div>
              </div>
            </div>
          </div>
          <!-- Fin Modal -->
          <?php
          require_once "js/producto.php";
          ?>
          <!-- FIN Envio de formulario -->
          <br>
          <?php include('estructura/footer.php'); ?>
          <!-- Fin Footer -->

        </div>
      </div>
      <!-- INICIO Módulo de cierre de sesión y enlaces javascript-->
      <?php require('estructura/cerrarSesionyEnlacesjs.php'); ?>
      <!-- FIN Módulo de cierre de sesión y enlaces javascript-->
</body>

</html>