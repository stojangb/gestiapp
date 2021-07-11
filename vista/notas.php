<?php require('backend/redirect.php'); ?>
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
            <!-- Modal Borrar -->
            <!-- FIN MODAL BORRAR -->
            <h1 class="h3 mb-0 text-gray-800">Notas y recordatorios</h1>
          </div>
          <p class="mb-4">Aquí podrá agregar y editar notas y recordatorios</a>.</p>
          <!-- Inicio Modal -->
          <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Notificación</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  Nota agregado con éxito
                </div>
                <div class="modal-footer">
                  <button type="button" id="idAceptarAgregado" class="btn btn-primary">Aceptar</button>
                </div>
              </div>
            </div>
          </div>
          <!-- Fin Modal -->
          <!-- Inicio Modal Editar-->
          <div class="modal fade" id="exampleModalCenterEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Notificación</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  Nota editada con éxito
                </div>
                <div class="modal-footer">
                  <button type="button" id="idEditarAgregado" class="btn btn-primary">Aceptar</button>
                </div>
              </div>
            </div>
          </div>
          <!-- Fin Modal -->
          <br>
          <div>
            <div class="row">
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="exampleFormControlInput1">Nombre de la nota</label>
                  <input type="text" required name="nombre" class="form-control" id="idNombreNota">
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="exampleFormControlTextarea1">Detalles</label>
                  <textarea class="form-control" id="idDetalle" rows="3" name="detalles"></textarea>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label class="" for="exampleFormControlSelect1">Seleccione un cliente</label>
                  <select id="idCliente" class="form-control" name="nameCliente">
                    <?php
                    $matrizClientes = ControllerClientes::listarClientes();
                    foreach ($matrizClientes as $registro) {
                    ?>
                      <option value="<?php echo $registro["id"] ?>">
                        <?php echo $registro["nombre_completo"]; ?> </option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                ¿Desea agregar un recordatorio?
                <div class="form-group">
                  <label for="">Fecha</label>
                  <br>
                  <input id="idId" hidden type="text">
                  <input id="idDate" type="datetime-local">
                </div>
              </div>
              <div class="col-sm-6">
   <!--            <input id="contador" type="number"> -->
              </div>
            </div>
            <br>
            <input type="submit" value="Agregar" name="enviar" id="enviar" class="btn btn-outline-success" style="display: true;">
            <input type="submit" value="Editar" name="editar" id="editar" class="btn btn-outline-warning">
            <input type="submit" value="Cancelar" name="cancelar" id="cancelar" class="btn btn-outline-danger" style="display: none;">
          </div>
          <br>
          <br>
          <?php require_once "js/notas.php"; ?>
          <div id="recargar1" class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Listado de notas y recordatorios</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive" id="dataTa">
                <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nombre de la nota</th>
                      <th>Detalles</th>
                      <th>Cliente</th>
                      <th>Fecha y hora</th>
                      <th>Recordatorio</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Nombre de la nota</th>
                      <th>Detalles</th>
                      <th>Cliente</th>
                      <th>Fecha y hora</th>
                      <th>Recordatorio</th>
                      <th>Acciones</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                    $matrizClientes = ControllerNotas::listarNotas();
                    foreach ($matrizClientes as $registro) {
                    ?>
                      <tr>
                        <td><?php echo $registro["nombre"] ?></td>
                        <td><?php echo $registro["detalles"] ?></td>
                        <td><?php echo $registro["nombre_completo"] ?></td>
                        <td><?php echo $registro["fecha"] ?></td>
                        <td><?php echo $registro["recordatorio"] ?></td>
                        <td>
                          <div style="text-align: center;">
                            <input style="margin-bottom: 4px;  margin-right:6px;" data-toggle="modal" data-target="#exampleModal" type="submit" onClick="reply_clickModificar(this.id)" value="Editar" name="enviar" id="                 
                            <?php echo 'idcode:', $registro["id"], ':idcode idnombrecode:',  $registro["nombre"], ':idnombrecode idrecordatoriocode:', $registro['recordatorio'], ':idrecordatoriocode idclientecode:',  $registro["idcliente"], ':idclientecode detallescode:', $registro["detalles"], ':detallescode' ?>" class="btn btn-outline-warning">
                            <input style="margin-bottom: 4px;  margin-right:6px;" type="submit" onClick="reply_clickBorrar(this.id)" value="Borrar" name="borrar" id="<?php echo $registro["id"] ?>" class="borrar-id btn btn-outline-danger">
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
      </div>
      <?php include('estructura/footer.php'); ?>
    </div>
  </div>
  <?php require('estructura/cerrarSesionyEnlacesjs.php'); ?>
</body>
</html>