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
            <h1 class="h3 mb-0 text-gray-800">Tipos de trabajo a realizar</h1>
          </div>
          <p class="mb-4">Aquí podrá modificar las variables del programa, como los precios o los objetos</a>.</p>
          <div class="form-group">
            <label for="exampleFormControlInput1">Ingrese nuevo tipo de trabajo</label>
            <input type="text" name="tipo" class="form-control" id="idTipo" placeholder="Nuevo tipo">
            <input type="text" name="tipo" class="form-control" id="idId" hidden ">
          </div>
          <input type=" submit" value="Agregar tipo de trabajo" name="enviar_tipo" id="enviar_tipo" class="btn btn-outline-success" style="display: true;">
            <input type="submit" value="Editar" name="editar" id="editar" class="btn btn-outline-warning">
            <input type="submit" value="Cancelar" name="cancelar" id="cancelar" class="btn btn-outline-danger" style="display: none;">
            <br>
            <br>
            </form>
            <!-- Tabla Tipos de trabajo-->
            <div id="recargar1" class="card shadow mb-4 reload">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Listado de tipos de trabajo</h6>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Tipo de trabajo</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Tipo de trabajo</th>
                        <th>Acciones</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      <?php
                      $matrizSanitizacion = ControllerTipotrabajos::listarTipotrabajos();
                      foreach ($matrizSanitizacion as $registro) {
                      ?>
                        <tr>
                          <td> <?php echo $registro["tipotrabajo"]; ?></td>
                          <td>
                            <div style="text-align: center;">
                              <input style="margin-bottom: 4px;  margin-right:6px;" type="submit" onClick="reply_clickModificar(this.id)" value="Editar" name="enviar" id="                 
                      <?php echo 'idcode:', $registro["id"], ':idcode tipocode:',  $registro["tipotrabajo"], ':tipocode' ?>" class="btn btn-outline-warning">
                              <input style="margin-bottom: 4px;  margin-right:6px;" type="submit" onClick="reply_clickBorrar_tipo(this.id)" value="Borrar" name="borrar" id="<?php echo $registro["id"] ?>" class="borrar-id btn btn-outline-danger">
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
                    Tipo de trabajo agregado con éxito
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
                    Tipo de trabajo editado con éxito
                  </div>
                  <div class="modal-footer">
                    <button type="button" id="idEditarAgregado" data-dismiss="modal" class="btn btn-primary">Aceptar</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- Fin Modal -->
            <?php
            require_once "js/tipodetrabajo.php";
            ?>
            <br>
            <?php include('estructura/footer.php'); ?>
            <!-- Fin Footer -->
          </div>
        </div>
        <?php require('estructura/cerrarSesionyEnlacesjs.php'); ?>
</body>

</html>