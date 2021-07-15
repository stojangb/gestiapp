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
                <!-- Content Row -->
                <div class="row">
                  <!-- Earnings (Monthly) Card Example -->
                  <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                      <div class="card-body">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Empresas</div>
                            <?php
                            $matriz = ControllerEmpresas::listarEmpresas();
                            $numero = count($matriz);
                            ?>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 count" data-stop="<?php echo $numero ?>"><?php echo $numero ?></div>
                            <div class="row no-gutters align-items-center">
                              <div class="col-auto">
                              </div>
                              <div class="col">
                              </div>
                            </div>
                          </div>
                          <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                      <div class="card-body">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Notas y recordatorios</div>
                            <!-- Controlador Vuelta falsa -->
                            <?php
                            $matriz = ControllerNotas::listarNotas();
                            $numeroClientes = count($matriz);
                            ?>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 count" data-stop="<?php echo $numeroClientes; ?>"><?php echo $numeroClientes; ?></div>
                          </div>
                          <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Tareas Pendientes  Por ejemplo agregar Nota de crédito o Desinfectante gastado -->
                  <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                      <div class="card-body">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Clientes</div>
                            <?php
                            $matriz = ControllerClientes::listarClientes();
                            $numeroClientes = count($matriz);
                            $numeroClientes = $numeroClientes -1;
                            ?>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 count" data-stop="<?php echo $numeroClientes; ?>"><?php echo $numeroClientes; ?></div>
                          </div>
                          <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                      <div class="card-body">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Ventas</div>
                            <?php
                            $matriz = ControllerEmpresas::listarNumeroVentas();
                            $numeroClientes = count($matriz);
                            ?>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 count" data-stop="<?php echo $numeroClientes; ?>"><?php echo $numeroClientes; ?></div>
                          </div>
                          <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <!-- Area Chart -->
                  <div class="col-xl-8 col-lg-7">
                    <div class="card shadow mb-4">
                      <script>
                        //Variables en 0
                        enero = 0,
                          febrero = 0,
                          marzo = 0,
                          abril = 0,
                          mayo = 0,
                          junio = 0,
                          julio = 0,
                          agosto = 0,
                          septiembre = 0,
                          octubre = 0,
                          noviembre = 0,
                          diciembre = 0;
                      </script>
                      <?php
                            $matriz3 = ControllerEmpresas::listarServiciosPorAñoPanel();
                      $enero = 0;
                      $febrero = 0;
                      $marzo = 0;
                      $abril = 0;
                      $mayo = 0;
                      $junio = 0;
                      $julio = 0;
                      $agosto = 0;
                      $septiembre = 0;
                      $octubre = 0;
                      $noviembre = 0;
                      $diciembre = 0;
                                 foreach ($matriz3 as $registro1) {
                        $ho = $registro1["Mes"];
                        $h1 = $registro1["Total"];
                        //     echo $registro1["Total"];

                        if ($ho == "January") {
                          $enero = $h1;
                        }
                        if ($ho == "February") {
                          $febrero = $h1;
                        }
                        if ($ho == "March") {
                          $marzo = $h1;
                        }
                        if ($ho == "April") {
                          $abril = $h1;
                        }
                        if ($ho == "May") {
                          $mayo = $h1;
                        }
                        if ($ho == "June") {
                          $junio = $h1;
                        }
                        if ($ho == "July") {
                          $julio = $h1;
                        }
                        if ($ho == "August") {
                          $agosto = $h1;
                        }
                        if ($ho == "September") {
                          $septiembre = $h1;
                        }
                        if ($ho == "October") {
                          $octubre = $h1;
                        }
                        if ($ho == "November") {
                          $noviembre = $h1;
                        }
                        if ($ho == "December") {
                          $diciembre = $h1;
                        }
                      } 
                      ?>

                      <script>
                        //Variables en 0
                        enero = <?php echo $enero;  ?>,
                          febrero = <?php echo $febrero;  ?>,
                          marzo = <?php echo $marzo;  ?>,
                          abril = <?php echo $abril;  ?>,
                          mayo = <?php echo $mayo;  ?>,
                          junio = <?php echo $junio;  ?>,
                          julio = <?php echo $julio;  ?>,
                          agosto = <?php echo $agosto;  ?>,
                          septiembre = <?php echo $septiembre;  ?>,
                          octubre = <?php echo $octubre;  ?>,
                          noviembre = <?php echo $noviembre;  ?>,
                          diciembre = <?php echo $diciembre;  ?>;
                      </script>
                      <!-- Card Header - Dropdown -->
                      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Resumen mensual de ventas</h6>
                      </div>
                      <!-- Card Body -->
                      <div class="card-body">
                        <div class="chart-area">
                          <canvas id="myAreaChart"></canvas>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Pie Chart -->
                  <div class="col-xl-4 col-lg-5">
                    <div class="card shadow mb-4">
                      <br>
                      <?php
                      $matriz1= ControllerProductos::listarProductosMaritimosPanel();
                      foreach ($matriz1 as $registro1) {
                     $cantidadMarit =  $registro1["suma"];
                      }
                      // = $matriz1["suma"] ;
                      $matriz2= ControllerProductos::listarProductosTerrestresPanel();
                      foreach ($matriz2 as $registro2) {
                      $cantidadTerr  =  $registro2["suma"];
                         }
                   //  = $matriz2["suma"] ;

//maritimo = ganancias
                      ?>
                      <script>
                        var maritimos = <?php echo $cantidadMarit;  ?>;
                        var terrestres = <?php echo $cantidadTerr; ?>;
                      </script>
                      <h6 class="m-0 font-weight-bold text-primary "> &nbsp; &nbsp; Ganancias y perdidas: (No incluye ventas)</h6>
                      <!-- Card Body -->
                      <div class="card-body">
                        <div class="chart-pie pt-4 pb-2">
                          <canvas id="myPieChart">
                          </canvas>
                        </div>
                        <div class="mt-4 text-center small">
                          <span class="mr-2">
                        <i class="fas fa-circle text-success"></i>Ganancias: <?php echo $cantidadMarit ?>        </span>
                          <span class="mr-2">
                            <i class="fas fa-circle text-primary"></i>Perdidas: <?php echo $cantidadTerr ?> 
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php include('estructura/footer.php'); ?>
            </div>
          </div>
          <?php require('estructura/cerrarSesionyEnlacesjs.php'); ?>
          <script src="vendor/chart.js/Chart.min.js"></script>
          <script>
            $('.count').each(function() {
              var $this = $(this);
              jQuery({
                Counter: 0
              }).animate({
                Counter: $this.attr('data-stop')
              }, {
                duration: 1000,
                easing: 'swing',
                step: function(now) {
                  $this.text(Math.ceil(now));
                }
              });
            });
          </script>

          <script src="js/demo/chart-area-demo.js"></script>
          <script src="js/demo/chart-pie-demo.js"></script>
      </body>

      </html>