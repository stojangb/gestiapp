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
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="exampleFormControlSelect1">Selección de empresa</label>
                      <select id="idEmpresa" class="form-control" name="nameCliente">
                        <option value="All">Todos</option>
                        <?php
                        $matrizClientes = ControllerEmpresas::listarEmpresas();
                        foreach ($matrizClientes as $registro) {
                        ?>
                          <option value="<?php echo $registro["id"] ?>">
                            <?php echo $registro["nombre_abreviado"];
                            echo ' ';
                            echo $registro["rut"]; ?> </option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>

                  </div>
               
                </div>  
                
                <div style="text-align: left;">
                    <button id="busquedaBTN" type="button" class="btn btn-outline-success">Buscar</button>
                  </div>

                <br>
                <br>
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
                            <th>ID compra</th>
                            <th>Cliente</th>
                            <th>Empresa</th>
                            <th>Fecha</th>
                            <th>Total</th>
                          </tr>
                        </thead>
                      </table>
                    </div>
                  </div>
                </div>
                <?php include('estructura/footer.php'); ?>
              </div>
            </div>
            <?php require('estructura/cerrarSesionyEnlacesjs.php'); ?>
            <?php require_once "js/busqueda.php"; ?>
      </body>

      </html>