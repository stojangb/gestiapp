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
                      <input type="text" name="nombre" class="form-control" id="idCantidad" placeholder="20">
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Precio</label>
                      <input type="text" name="nombre" class="form-control" id="idPrecio" placeholder="20.000">
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
                          <label class="" for="exampleFormControlSelect1">Banco</label>
                          <select id="idBanco" class="form-control" name="nameCliente">
                            <?php
                            $matrizClientes = ControllerClientes::listarBancos();
                            foreach ($matrizClientes as $registro) {
                            ?>
                              <option value="<?php echo $registro["id"] ?>">
                                <?php echo $registro["nombre"]; ?> </option>
                            <?php
                            }
                            ?>
                          </select>
                        </div>
                      </div>
                      
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Producto a sanitizar</label>
                          <select class="form-control" id="idProductoTerrestre" name="tipo">
                            <input id="idProductoTerrestreComprobacion" hidden>
                          </select>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="exampleFormControl">Relacionar con:</label>
                          <br>
                          <select style="width: 250px;" class="form-control" id="idRelacionTerrestre" name="tipo">
                          </select>
                          <p>Opcional, no afecta excel</p>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="exampleFormControlTextarea1">Patente</label>
                          <input type="name" required value="" class="form-control" name="" id="patenteTerrestre" placeholder="Patente">
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <!--   TIPO TRABAJO -->
                        <div class="form-group">


                        </div>
                      </div>
                      <div class="col-sm-4">
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
                      <a data-toggle="modal" data-target="#exampleModalCenterTerrestre" style="color: blue;" type="button" id="NoEncuentraTerrestre">¿No encuentra el producto?</a>
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
                    <br>
                    <div class="row">
                      <div class="col-xl-4">
                        <div class="form-group">
                          <label for="exampleFormControl">Relacionar con Marítimo:</label>
                          <br>
                          <select style="width: 250px;" class="form-control" id="idRelacionOtros_Maritimo" name="tipo">
                          </select>
                          <label for="exampleFormControl">Relacionar con Terrestre:</label>
                          <br>
                          <select style="width: 250px;" class="form-control" id="idRelacionOtros_Terrestre" name="tipo">
                          </select>
                        </div>
                      </div>
                      <div class="col-xl-4 ">
                        <div class="form-group">
                          <label for="exampleFormControl">Producto a sanitizar</label>
                          <br>
                          <select style="width: 250px;" class="form-control js-example-basic-single" id="idProductoOtros" name="tipo">
                          </select>
                        </div>
                      </div>
                      <div class="col-xl-4">
                        <div class="form-group">
                          <label for="exampleFormControlTextarea1">Cantidad</label>
                          <input value="" name="idIdOtro" id="idIdOtro" hidden>
                          <input required type="number" value="" class="form-control" id="cantidadOtros" placeholder="Cantidad">
                          <input type="name" value="" id="comprobacionRelacionOtroMaritimo" hidden>
                          <input type="name" value="" id="comprobacionRelacionOtroTerrestre" hidden>
                          <input type="name" value="" id="comprobacionRelacionOtro" hidden>
                          <br>
                          <button id="guardarOtro" type="submit" class="btn btn-outline-info">Guardar</button>
                          <input type="button" value="Editar" name="editar" id="editarOtro" class="btn btn-outline-warning">
                          <input type="button" value="Cancelar" name="cancelar" id="cancelarOtro" class="btn btn-outline-danger">
                          <br>
                          <br>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-xl-3">
                        <a data-toggle="modal" data-target="#exampleModalCenterOtros" style="color: blue;" type="button" id="NoEncuentraOtro">¿No encuentra el producto?</a>
                      </div>
                      <div class="col-xl-3">
                      </div>
                      <div class="col-xl-3">
                      </div>
                      <div class="col-xl-3">
                      </div>
                    </div>
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
              <!-- INICIO MODAL AGREGAR PRODUCTOS -->
              <!-- OTROS -->
              <!-- Modal Otros -->
              <div class="modal fade" id="exampleModalCenterOtros" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalCenterTitle">Agregar Otros</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="form-group">
                        <label for="exampleFormControlInput1">Ingrese nuevo producto a sanitizar</label>
                        <input type="text" name="" class="form-control" id="idAgregar1Otros" placeholder="Nuevo producto">
                        <input type="text" hidden value="Otro" name="" class="form-control" id="IdTipoAgregar1Otros">
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" id="okmodalOtros" class="btn btn-primary" data-dismiss="modal">Ok</button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- FIN MODAL AGREGAR PRODUCTOS OTROS-->
              <!-- TERRESTRES -->
              <!-- Modal TERRESTRES -->
              <div class="modal fade" id="exampleModalCenterTerrestre" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalCenterTitle">Agregar Terrestre</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="form-group">
                        <label for="exampleFormControlInput1">Ingrese nuevo producto a sanitizar</label>
                        <input type="text" name="" class="form-control" id="idAgregar1Terrestre" placeholder="Nuevo producto">
                        <input id="idCertificadoTerrestreComprobacion" hidden>
                        <input type="text" hidden value="Terrestre" name="" class="form-control" id="IdTipoAgregar1Terrestre">
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" id="okmodalTerrestre" class="btn btn-primary" data-dismiss="modal">Ok</button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- FIN MODAL AGREGAR PRODUCTOS TERRESTRES -->
              <!-- Maritimo -->
              <!-- Modal Maritimo -->
              <div class="modal fade" id="exampleModalCenterMaritimo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalCenterTitle">Agregar Marítimo</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <!-- INICIO -->
                      <div class="form-group">
                        <label for="exampleFormControlInput1">Nombre de la Barcaza</label>
                        <input type="text" name="nombre" class="form-control" id="idProductoModalMaritimo" placeholder="Santa Lucía">
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlInput1">Matrícula</label>
                        <input type="text" name="nombre" class="form-control" id="idMatriculaModalMaritimo" placeholder="AABB11">
                      </div>
                      <!-- FIN -->
                    </div>
                    <div class="modal-footer">
                      <button type="button" id="okmodalMaritimo" class="btn btn-primary" data-dismiss="modal">Ok</button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- FIN MODAL AGREGAR PRODUCTOS TERRESTRES -->
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