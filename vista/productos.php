<!-- Comprobación de Login y otros -->
<?php require('backend/redirect.php');
if (!isset($_SESSION)) {
  session_start();
}
$_SESSION['iid'] = $_POST["id"] ?>
<!-- Fin comprobación de Login -->
<!DOCTYPE html>
<html lang="es">
<?php require('estructura/head.php'); ?>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <?php include('estructura/barraLateral.php'); ?>
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <?php include('estructura/barraSuperior.php'); ?>
        <div class="container-fluid">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">ID Empresa: <?php echo $_POST["id"]; ?></h1>
          </div>
          <input hidden type="text" name="" value=" <?php echo $_POST["id"]; ?>" class="custom-file-input" id="idservicio00">
          <?php
          $matrizServicios = ControllerEmpresas::listarServicioUnico($_POST["id"]);
          foreach ($matrizServicios as $registro) {
          ?>
            <div class="row">
              <div class="col-sm-3">
                Nombre corto: <div style="color:#4e73df"><?php echo $registro["nombre_abreviado"]; ?> </div>
              </div>
              <div class="col-sm-3">
                RUT: <div style="color:#4e73df"><?php echo $registro["rut"]; ?> </div>
              </div>
              <div class="col-sm-3">
                GIRO: <div style="color:#4e73df"><?php echo $registro["giro"]; ?> </div>
              </div>
              <div class="col-sm-3">
                Razón social: <div style="color:#4e73df"><?php echo $registro["razon_social"]; ?> </div>
              </div>
            </div>
            <div>
            <?php }  ?>
            <br>
            <br>
            <div class="row">
              <div class="col-sm-4">
                <button id="idBotonCollapseMaritimo" type="button" data-toggle="collapse" href="#collapseMaritimo" class="btn btn-primary btn-lg btn-block">Productos</button>
              </div>
              <div class="col-sm-4">
                <button id="idBotonCollapseTerrestre" style="background-color: #685441;" type="button" data-toggle="collapse" href="#collapseTerrestre" class="btn btn-secondary btn-lg btn-block">Ventas</button>
              </div>
              <div class="col-sm-4">
                <button id="idBotonCollapseOtros" type="button" data-toggle="collapse" href="#collapseOtros" class="btn btn-secondary btn-lg btn-block">Otros</button>
              </div>
            </div>
            <br>
            <div class="collapse" id="collapseMaritimo">
              <div class="card card-body">
                <div style="background-color: #f8f9fc;" class="container">
                  <form>
                    <br>
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Nombre del artículo</label>
                      <input type="text" name="nombre" class="form-control" id="idProducto" placeholder="Poleras">
                      <input type="text" hidden class="form-control" id="idId">
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Cantidad</label>
                      <input type="number" name="nombre" class="form-control" id="idCantidad" placeholder="20">
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Precio</label>
                      <input type="number" name="nombre" class="form-control" id="idPrecio" placeholder="20.000">
                    </div>
                    <button id="idGuardarProducto" type="button" class="btn btn-outline-info">Guardar</button>
                  </form>
                </div>

                <div class="row">
                  <div class="col-sm-3">
                  </div>
                  <div class="col-sm-3">
                  </div>
                  <div class="col-sm-3">
                  </div>
                  <div class="col-sm-3">
                    <form id="id-formulario-editar-maritim">
                      <div id="AgregarNuevoProductoMaritimo2" name="AgregarNuevoProductoMaritimo2"></div>
                      <input type="button" name="editar" value="Editar" id="idEditarProducto" class="btn btn-outline-warning">
                      <input type="button" value="Cancelar" name="cancelar" id="cancelarMaritimo" class="btn btn-outline-danger">
                    </form>
                  </div>
                </div>
                <div class="row">
                  <div class="card-body">
                    <div id="tablaMaritimo"></div>
                  </div>
                </div>
              </div>
            </div>
            </div>
            <!-- AQUÏ CAMBIA DE ITEM  A VENTAS-->
            <div class="collapse" id="collapseTerrestre">
              <div class="card card-body">
                <div style="background-color: #f8f9fc; " class="container">
                  <form id="id-formulario-agregar-terrestre">
                    <br>
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label class="" for="exampleFormControlSelect1">Seleccione un cliente</label>
                          <select id="idBaco" class="form-control" name="nameCliente">
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

                      <div class="col-sm-4">
                        <p>Fecha y hora venta: </p>
                        <input type="datetime-local" id="fecha_hora_venta">
                      </div>
                      <div class="col-sm-4">
                        <br>

                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label class="" for="exampleFormControlSelect1">Seleccione un producto</label>
                          <select id="idBanco" class="form-control" name="nameCliente">
                            <?php
                            $matrizClientes = ControllerProductos::listarProductosPorEmpresa($_POST["id"]);
                            foreach ($matrizClientes as $registro) {
                            ?>
                              <option value="<?php echo $registro["id"] ?>">
                                <?php echo $registro["nombre"]; ?> </option>
                            <?php
                            }
                            ?>
                          </select>
                          <br>
                          <button id="boton_producto_nuevo" type="button" class="btn btn-outline-primary">Agregar producto</button>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        D
                      </div>
                      <div class="col-sm-4">
                        EE
                        <br>
                        <div id="AgregarNuevoProductoTerrestre"></div>
                        <br>
                        <button id="guardarTerrestre" type="submit" class="btn btn-outline-info">Guardar</button>
                        <br>
                        <br>
                      </div>
                    </div>
                  </form>
                  <div class="row">
                    <div class="col-sm-3">
                      E
                    </div>
                    <div class="col-sm-3">
                    </div>
                    <div class="col-sm-3">
                    </div>
                    <div class="col-sm-3">
                      <form id="id-formulario-editar-terrestre">
                        <div id="AgregarNuevoProductoTerrestre2" name="AgregarNuevoProductoTerrestre2"></div>
                        <input type="submit" name="editar" value="Editar" id="editarTerrestre" class="btn btn-outline-warning">
                        <input type="button" value="Cancelar" name="cancelar" id="cancelarTerrestre" class="btn btn-outline-danger">
                      </form>
                    </div>
                  </div>
                  <div class="row">
                    <div class="card-body">
                      <div id="tablaterrestre"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="collapse" id="collapseOtros">
              <div class="card card-body">
                <div style="background-color: #f8f9fc; " class="container">
                  <form id="id-formulario-agregar-otros">
              
                   <b> Agregar ingresos y egresos mensuales de la empresa actual </b>    <br><br>  
                    <div class="row">
                      <div class="col-xl-6">
                        <p>Nombre</p>
                        <input type="text" id="nombreIngresoEgreso">
                        <input type="text" id="idIngresoEgreso" hidden>
                      </div>
                      <div class="col-xl-6 ">
                        <p>tipo</p>
                        <select id="idTipo3" class="form-control" name="nameCliente">
                         
                              <option value=0>Egreso</option>
                              <option value=1>Ingreso</option>
                        
                          </select>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-xl-6">
                        <p>Monto:</p>
                        <input type="number" id="monto3">
                      </div>
                      <div class="col-xl-6 ">
                      </div>
                    </div>
                    <br>
  <button id="editar3" type="button" class="btn btn-outline-warning">Editar</button>
  <button id="cancelar3" type="button" class="btn btn-outline-danger">Cancelar</button>
  <button id="guardar3" type="button" class="btn btn-outline-info">Guardar</button>
                    <div id="recargarOtros">
                      <div class="row">
                        <div class="card-body">
                          <div id="tablaotros"></div>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <br>
            <br>
            <div>
              <!-- Maritimo -->
            </div>
            <div>
              <!-- Boton archivos -->
              <form action="archivos" method="post">
                <input hidden type="text" name="id" value="<?php echo $_SESSION['iid'] ?>"><br>
                <input style="margin-bottom: 4px;  margin-right:6px;" value="Archivos" type="submit" class=" btn btn-outline-primary">
              </form>
              <!-- Boton archivos fin -->
            </div>
        </div>
      </div>
      <?php
      require_once "js/jsproductosvista.php";
      ?>
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