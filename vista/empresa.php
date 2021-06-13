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
            <h1 class="h3 mb-0 text-gray-800">Mis empresas</h1>
          </div>
          <div class="row">
            <div class="col-lg-3">
              <div class="form-group">
                <label for="exampleFormControlInput1">Nombre abreviado</label>
                <input type="text" required name="nombre" class="form-control" id="idNombreAbreviado" placeholder="Nombre abreviado">
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Razón social</label>
                <input type="text" required name="nombre completo" class="form-control" id="idRazonSocial" placeholder="Nombre Completo">
              </div>
            </div>
            <div class="col-lg-2">
              <div class="form-group">
                <label for="exampleFormControlInput1">Rut</label>
                <input type="text" placeholder="Ingrese RUT" value=""  name="rut" class="form-control" id="idRut">
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Giro</label>
                <input type="text" placeholder="Ingrese giro" value="" name="rut" class="form-control" id="idGiro">
              </div>
            </div>
          </div>
          <br>
          <br>
          <button id="idAgregar" type="button" class="btn btn-outline-success">Agregar empresa</button>
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
                      <th>Nombre</th>
                      <th>Razón social</th>
                      <th>Rut</th>
                      <th>Giro</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Nombre</th>
                      <th>Razón social</th>
                      <th>Rut</th>
                      <th>Giro</th>
                      <th>Acciones</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                    $matrizServicios = ControllerEmpresas::listarEmpresas();
                    foreach ($matrizServicios as $registro) {
                    ?>
                      <tr>
                        <td><?php echo $registro["id"]?></td>
                        <td><?php echo $registro["nombre_abreviado"]?></td>
                        <td><?php echo $registro["razon_social"]?></td>
                        <td><?php echo $registro["rut"]?></td>
                        <td><?php echo $registro["giro"]?></td>
                        <td>
                          <div style="text-align: center;">
                            <!-- Botón editar -->
                            <input style="margin-bottom: 4px;  margin-right:6px;" type="button" onClick="reply_clickModificar(this.id)" value="Editar" name="enviar" id="                 
                            <?php echo 'idcode:', $registro["id"], ':idcode fechacode:',  $registro["fecha"], ':fechacode clientecode:', $registro["rut"], ':clientecode  lugarcode:', $registro["lugar"], ':lugarcode detallescode:', $registro["detalles"], ':detallescode' ?>" class="btn btn-outline-warning">
                            <!-- Botón Borrar -->
                            <input style="margin-bottom: 4px;  margin-right:6px;" type="button" onClick="reply_clickBorrar(this.id)" value="Borrar" name="borrar" id="<?php echo $registro["id"] ?>" class="borrar-id btn btn-outline-danger">
                            <!-- FORMULARIO POST ENVIO ID -->
                            <form action="productos" method="post">
                              <input hidden type="text" name="id" value="<?php echo $registro["idservicios"] ?>"><br>
                              <input style="margin-bottom: 4px;  margin-right:6px;" value="Revisar Empresa" type="submit" class=" btn btn-outline-primary">
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
        <?php require_once "js/empresa.php"; ?>

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
                Servicio editado con éxito
              </div>
              <div class="modal-footer">
                <button type="button" id="idEditarAgregado" data-dismiss="modal" class="btn btn-primary">Aceptar</button>
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