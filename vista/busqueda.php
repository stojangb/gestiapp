      <?php require('backend/redirect.php'); ?>
      <!DOCTYPE html>
      <html lang="es">
      <?php require('estructura/head.php'); ?>

      <body id="page-top">
        <!-- Page Wrapper -->
        <div id="wrapper">
          <!--   Inicio Barra Lateral  -->
          <?php include('estructura/barraLateral.php'); ?>
          <!--   Fin Barra Lateral-->
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
                  <h1 class="h3 mb-0 text-gray-800">Búsquedas</h1>
                  <div class="row">
                    <div style="margin-left: 20px; margin-top: 5px" class="col-sm4">
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCertificado">
                        Certificado
                      </button>
                    </div>
                    <div style="margin-left: 20px; margin-top: 5px" class="col-sm4">
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalMatricula">
                        Matrícula
                      </button>
                    </div>
                    <div style="margin-left: 20px; margin-top: 5px" class="col-sm4">
                      <button id="vueltaFalsa" type="button" class="btn btn-dark">
                        Vuelta Falsa
                      </button>
                    </div>
                  </div>
                </div>
                <!-- Fechas a elegir para la búsqueda -->
                <!-- Buscar por certificado -->
                <!-- Modal -->
                <div class="modal fade" id="modalCertificado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Búsqueda por certificado</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="form-group">
                          <label for="exampleFormControlInput1">Buscar Certificado</label>
                          <input type="number" name="nombre" class="form-control" id="idCertificado" placeholder="Número de certificado">
                          <br>
                          <button type="button" id="idBotonBuscarCertificado" class="btn btn-primary">Buscar</button>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Fin Buscar por certificado -->
                <!-- Buscar por Matricula -->
                <!-- Modal -->
                <div class="modal fade" id="modalMatricula" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Búsqueda por matrícula</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="form-group">
                          <label for="exampleFormControlInput1">Buscar Matrícula</label>
                          <input type="name" name="nombre" class="form-control" id="idMatricula" placeholder="Matrícula">
                          <br>
                          <button type="button" id="idBotonBuscarMatricula" class="btn btn-primary">Buscar</button>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Fin Buscar por Matricula -->
                <div class="row">
                  <div class="col-sm-6">
                    <label class="col-xs-6 col-sm-4">
                      Fecha Inicio Búsqueda
                    </label>
                    <input type="date" name="f1" id="fechaInicio">
                  </div>
                  <div class="col-sm-6">
                    <label class="col-xs-6 col-sm-4">
                      Fecha Fin Búsqueda
                    </label>
                    <input type="date" name="f2" id="fechaTermino">
                  </div>
                </div>
                <!-- Selección de Cliente -->
                <br>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="exampleFormControlSelect1">Selección de cliente</label>
                        <select id="idCliente" class="form-control" name="nameCliente">
                          <option value="All">Todos</option>
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
                    </div>
                  </div>
                </div>
                <h5>Productos: </h5>
                <div class="row">
                  <div style="border-left: 1px solid black;" class="col-sm-6">
                    <div class="form-check form-check-inline">
                      <input class="reiniciar form-check-input seleccionMaritimo" type="checkbox" name="todosMaritimo" id="todosMaritimo" value="trueMaritimo">
                      <label class="form-check-label" for="todosMaritimo">Marítimos</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="reiniciar form-check-input seleccionMaritimo" type="checkbox" name="todosTerrestre" id="todosTerrestre" value="trueTerrestre">
                      <label class="form-check-label" for="todosTerrestre">Terrestres</label>
                    </div>
                    <br>
                    <br>
                    <h5>Tipos de trabajo: </h5>
                    <div class="form-group">
                      <div class="form-check form-check-inline">
                        <input class="reiniciar form-check-input seleccionTipoTrabajo" type="checkbox" name="todosTiposDeTrabajo" id="todosTiposDeTrabajo" value="true">
                        <label class="form-check-label" for="todosTiposDeTrabajo">Todos </label>
                      </div>
                      <?php
                      $matrizTipotrabajo = ControllerTipotrabajos::listarTipotrabajos();
                      foreach ($matrizTipotrabajo as $registro) {
                      ?>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input seleccionTipoTrabajo" type="checkbox" id="<?php echo $registro["id"] ?>" value="<?php echo $registro["id"] ?>">
                          <label class="form-check-label" for="<?php echo $registro["id"] ?>"><?php echo $registro["tipotrabajo"] ?></label>
                        </div>
                      <?php } ?>
                    </div>
                    <form id="id-formulario-busqueda-maritimo-terrestre">
                      <!-- Recibo los 2 array, maritimo y otros -->
                      <!-- Y tipos de trabajo -->
                      <div id="AgregarNuevoTipoTrabajo"></div>
                      <div id="AgregarMaritimoOTerrestre"></div>
                      <input type="submit" value="Buscar" class="btn btn-outline-success">
                    </form>
                  </div>
                  <div style="border-left: 1px solid black;" class="col-sm-6">
                    <label for="exampleFormControlInput1">OTROS</label>
                    <div class="form-group">
                      <div class="form-check form-check-inline">
                        <input class="seleccionOtros form-check-input" type="checkbox" id="Otros" value="Todos">
                        <label class="form-check-label" for="Otros">Todos </label>
                      </div>
                      <?php
                      $matrizTipotrabajo = ControllerProductos::listarProductosOtros();
                      foreach ($matrizTipotrabajo as $registro) {
                      ?>
                        <div class="form-check form-check-inline">
                          <input class="seleccionOtros form-check-input" type="checkbox" id="<?php echo $registro["id"]?>" value="<?php echo $registro["id"] ?>">
                          <label class="form-check-label" for="<?php echo $registro["id"]?>"><?php echo $registro["productos"] ?></label>
                        </div>
                      <?php } ?>
                    </div>
                    <div style="height:50px;">
                      <form id="id-formulario-busqueda-otros">
                        <div id="AgregarOtros"></div>
                        <input style="position:absolute; bottom:5px;" type="submit" value="Buscar" name="enviar" id="buscar" class="btn btn-outline-success" style="display: true;">
                      </form>
                    </div>
                  </div>
                </div>
                <!-- CONSULTA POR FECHAS Y VALORES -->
                <br>
                <!-- INICIO TABLA Terrestres y Marítimos-->
                <br>
                <div id="recargar1" class="card shadow mb-4 reload">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Listado de Productos</h6>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered display" id="tablaproductos" width="100%" cellspacing="0">
                        <thead>
                          <tr>
                            <th>Servicio</th>
                            <th>Cliente</th>
                            <th>Certificado</th>
                            <th>Fecha</th>
                            <th>Nombre</th>
                            <th>Matrícula</th>
                            <th>Vuelta Falsa</th>
                          </tr>
                        </thead>
                      </table>
                    </div>
                  </div>
                </div>
                <!-- INICIO TABLA Otros-->
                <div id="recargar2" class="card shadow mb-4 reload">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Listado de objetos</h6>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered display" id="tablaobjetos" width="100%" cellspacing="0">
                        <thead>
                          <tr>
                            <th>Servicio</th>
                            <th>Cliente</th>  
                            <th>Nombre</th>
                            <th>Cantidad</th>
                            <th>Relación</th>
                            <th>Fecha</th>
                          </tr>
                        </thead>
                      </table>
                    </div>
                  </div>
                </div>
                <!-- FIN TABLA -->
               
                <?php include('estructura/footer.php'); ?>
              </div>
            </div>
            <?php require('estructura/cerrarSesionyEnlacesjs.php'); ?>
             <?php require_once "js/busqueda.php"; ?>
      </body>

      </html>