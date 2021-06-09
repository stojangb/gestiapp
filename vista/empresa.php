<!-- <?php require('backend/redirect.php'); ?> -->
<!DOCTYPE html>
<html lang="es">
<?php require('estructura/head.php'); ?>
<body id="page-top">
  <div id="wrapper">
    <?php include('estructura/barraLateral.php'); ?>
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <?php include('estructura/barraSuperior.php'); ?>
        <div class="container-fluid">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Empresas</h1>
          </div>
          <div class="row">
            <div class="col-lg-3">
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Detalles de la empresa</label>
                <textarea class="form-control" id="idDetalles" name="nameDetallesServicio" rows="3"></textarea>
              </div>
            </div>
            <div id="clienteVista" class="col-lg-3 rojo">
              <div class="form-group">
                <label class="" for="exampleFormControlSelect1">Selección de cliente</label>

                <select id="idCliente" class="form-control" name="nameCliente">
                  <option value="">Seleccionar</option>
                  <?php
                  $matrizClientes = ControllerClientes::listarClientes();
                  foreach ($matrizClientes as $registro) {
                  ?>
                    <option value="<?php echo $registro["id"] ?>">
                      <?php echo $registro["nombreEmpresa"];
                      echo ' ';
                      echo $registro["rut"]; ?> </option>
                  <?php
                  }
                  ?>
                </select>
                <p class="text-dark">No editable</p>
              </div>
            </div>
            <div class="col-lg-2">
              <div class="form-group">
                <label for="">Fecha</label>
                <br>
                <input id="idId" hidden type="text">
                <input id="idDate" type="date">
              </div>
            </div>
          </div>
          <br>
          <br>
          <button id="idAgregarServicio" type="button" class="btn btn-outline-success">Agregar Servicio</button>
          <input type="button" value="Editar" name="editar" id="editar" class="btn btn-outline-warning">
          <input type="button" value="Cancelar" id="cancelar" class="btn btn-outline-danger">
          <br>
          <br>
          </form>
         
          <br>
          <!-- Inicio Código php que agrega interactividad a la tabla -->
          <div id="recargar1" class="card shadow mb-4 reload">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Listado de Servicios</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Detalles</th>
                      <th>Empresa</th>
                      <th>Rut</th>
                      <th>Fecha</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Detalles</th>
                      <th>Empresa</th>
                      <th>Rut</th>
                      <th>Fecha</th>
                      <th>Acciones</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                    $matrizServicios = ControllerEmpresas::listarEmpresas();
                    foreach ($matrizServicios as $registro) {
                    ?>
                      <tr>
                        <td><?php echo $registro["idservicios"] ?></td>
                        <td><?php echo $registro["detalles"] ?></td>
                        <td> <?php
                              //Nombre
                              $matrizFechas = ControllerServicios::listarClientes($registro["idservicios"]);
                              foreach ($matrizFechas as $registro3) {
                                echo $registro3["nombreEmpresa"];
                              }
                              ?>
                        </td>
                        <td> <?php
                              //Rut
                              $matrizFechas = ControllerServicios::listarClientes($registro["idservicios"]);
                              foreach ($matrizFechas as $registro3) {
                                echo $registro3["rut"];
                              }
                              ?>
                        </td>
                        <td>
                          <?php echo $registro["fecha"] ?>
                        </td>
                        <td>
                          <div style="text-align: center;">
                            <!-- Botón editar -->
                            <input style="margin-bottom: 4px;  margin-right:6px;" type="button" onClick="reply_clickModificar(this.id)" value="Editar" name="enviar" id="                 
                            <?php echo 'idcode:', $registro["idservicios"], ':idcode fechacode:',  $registro["fecha"], ':fechacode clientecode:', $registro["rut"], ':clientecode  lugarcode:', $registro["lugar"], ':lugarcode detallescode:', $registro["detalles"], ':detallescode' ?>" class="btn btn-outline-warning">
                            <!-- Botón Borrar -->
                            <input style="margin-bottom: 4px;  margin-right:6px;" type="button" onClick="reply_clickBorrar(this.id)" value="Borrar" name="borrar" id="<?php echo $registro["idservicios"] ?>" class="borrar-id btn btn-outline-danger">
                            <!-- FORMULARIO POST ENVIO ID -->
                            <form action="productos" method="post">
                              <input hidden type="text" name="id" value="<?php echo $registro["idservicios"] ?>"><br>
                              <input style="margin-bottom: 4px;  margin-right:6px;" value="Revisar Servicio" type="submit" class=" btn btn-outline-primary">
                            </form>
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
        <script src="vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
        <script src="js/demo/datatables-demo.js"></script>
        <?php require_once "js/servicio.php"; ?>

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
                  Servicio agregado con éxito
                </div>
                <div class="modal-footer">
                  <button type="button" data-dismiss="modal"  id="idEditarAgregado" class="btn btn-primary">Aceptar</button>
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
                  Servicio editado con éxito
                </div>
                <div class="modal-footer">
                  <button type="button" id="idEditarAgregado" data-dismiss="modal"  class="btn btn-primary">Aceptar</button>
                </div>
              </div>
            </div>
          </div>
          <!-- Fin Modal -->
        <?php include('estructura/footer.php'); ?>
      </div>
    </div>
    <!-- Page level plugins -->
  </div>
  <?php require('estructura/cerrarSesionyEnlacesjs.php'); ?>
</body>

</html>