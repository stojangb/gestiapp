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
            <h1 class="h3 mb-0 text-gray-800">Clientes</h1>
          </div>
          <p class="mb-4">Aquí podrá agregar y editar clientes, tanto empresas como particulares</a>.</p>
          <button type="button" id="IDBotonModalAgregar" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Nuevo Cliente
          </button>
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
                  Cliente agregado con éxito
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
                  Cliente editado con éxito
                </div>
                <div class="modal-footer">
                  <button type="button" id="idEditarAgregado" class="btn btn-primary">Aceptar</button>
                </div>
              </div>
            </div>
          </div>
          <!-- Fin Modal -->
          <br>
          <br>
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="textoModal">Nuevo cliente</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <!--  Inicio Modal Body -->
                  <form id="formulario" onsubmit="return false" method="POST">
                    <div class="form-group" style="display: none">
                      <!--  ID solo para uso BD -->
                      <input type="text" name="id" class="form-control" id="idId" placeholder="Nombre">
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Nombre cliente</label>
                      <input type="text" required name="nombre" class="form-control" id="idNombreCliente" placeholder="Nombre Completo">
                    </div>

                    <div class="form-group">
                      <label for="exampleFormControlInput1">Rut</label>
                      <input type="text" placeholder="Ingrese RUT" value="" required oninput="checkRut(this)" name="rut" class="form-control" id="idRut">
                    </div>

                    <div class="form-group">
                      <label for="exampleFormControlInput1">Correo electrónico</label>
                      <input type="text" name="correo" class="form-control" id="idCorreo" placeholder="nombre@ejemplo.com">
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Dirección</label>
                      <input type="text" required name="direccion" class="form-control" id="idDireccion" placeholder="Dirección">
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Teléfono</label>
                      <input type="text" name="telefono" class="form-control" id="idTelefono" placeholder="+569 88888888">
                    </div>
                    <div class="form-group">
                      <label class="" for="exampleFormControlSelect1">Forma de pago</label>
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
                    </div>
                    
                    <div class="form-group">
                      <label class="" for="exampleFormControlSelect1">Banco</label>
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
                    </div>
                    <div class="form-group">
                      <label class="" for="exampleFormControlSelect1">Tipo de cuenta</label>
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
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlInput1">N° Cuenta</label>
                      <input type="text" class="form-control" id="idNCuenta" placeholder="7895455-4">
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">Agregar detalles</label>
                      <textarea class="form-control" id="idDetalle" rows="3" name="detalles"></textarea>
                    </div>
                    <input type="submit" value="Agregar" name="enviar" id="enviar" class="btn btn-outline-success" style="display: true;">
                    <input type="submit" value="Editar" name="editar" id="editar" class="btn btn-outline-warning">
                    <input type="submit" value="Cancelar" name="cancelar" id="cancelar" class="btn btn-outline-danger" style="display: none;">
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
              </div>
            </div>
          </div>
          <?php require_once "js/cliente.php"; ?>
          <br>
          <div id="recargar1" class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Listado de clientes</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive" id="dataTa">
                <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Rut</th>
                      <th>Correo</th>
                      <th>Dirección</th>
                      <th>Teléfono</th>
                      <th>Forma de pago</th>
                      <th>Tipo cuenta</th>
                      <th>Banco</th>
                      <th>N° Cuenta</th>
                      <th>Detalles</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Nombre</th>
                      <th>Rut</th>
                      <th>Correo</th>
                      <th>Dirección</th>
                      <th>Teléfono</th>
                      <th>Forma de pago</th>
                      <th>Tipo cuenta</th>
                      <th>Banco</th>
                      <th>N° Cuenta</th>
                      <th>Detalles</th>
                      <th>Acciones</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                    $matrizClientes = ControllerClientes::listarClientes();
                    foreach ($matrizClientes as $registro) {
                    ?>
                      <tr>
                        <td><?php echo $registro["nombreEmpresa"] ?></td>
                        <td><?php echo $registro["rut"] ?></td>
                        <td><?php echo $registro["nombreContacto"] ?></td>
                        <td><?php echo $registro["correo"] ?></td>
                        <td><?php echo $registro["telefono"] ?></td>
                        <td><?php echo $registro["detalles"] ?></td>
                        <td>
                          <div style="text-align: center;">
                            <input style="margin-bottom: 4px;  margin-right:6px;" data-toggle="modal" data-target="#exampleModal" type="submit" onClick="reply_clickModificar(this.id)" value="Editar" name="enviar" id="                 
                      <?php echo 'idcode:', $registro["id"], ':idcode nombreContactocode:',  $registro["nombreContacto"], ':nombreContactocode nombreEmpresacode:',  $registro["nombreEmpresa"], ':nombreEmpresacode rutcode:', $registro["rut"], ':rutcode correocode:', $registro["correo"], ':correocode telefonocode:', $registro["telefono"], ':telefonocode detallescode:', $registro["detalles"], ':detallescode' ?>" class="btn btn-outline-warning">
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
        <!-- /.container-fluid -->
      </div>
      <?php include('estructura/footer.php'); ?>
    </div>
  </div>
  <?php require('estructura/cerrarSesionyEnlacesjs.php'); ?>
</body>

</html>