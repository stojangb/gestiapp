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
                </div>
                <!-- Fechas a elegir para la búsqueda -->
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
                              <?php echo $registro["nombre_completo"];
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
                <h5>Ventas: </h5>
                <div id="recargar1" class="card shadow mb-4 reload">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Listado de ventas realizadas</h6>
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