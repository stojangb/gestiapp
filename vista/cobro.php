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
                  <h1 class="h3 mb-0 text-gray-800">Generar Cobro</h1>
                  <form method="get" action="./vista/pdf.php">
                    <button class="btn btn-outline-info" type="submit">Certificado de desinfección</button>
                  </form>
                </div>

                <!-- Selección de Cliente -->
                <br>
                <div class="row">
                  <div class="col-sm-6">
                    <label>
                      Seleccionar Fechas:
                    </label>
                    <br>
                    <input style="width: 200px;" class="btn btn-sm btn-primary" type="text" name="daterange" value="" />
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="exampleFormControlSelect1">Selección de cliente</label>
                      <select id="idCliente" class="form-control" name="nameCliente">
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
                <br>


                <div class="row">
                  <div class="col-sm-6">
                    <input type="button" value="Generar" name="enviar" id="generarExcel" class="btn btn-outline-success" style="display: true;">
                   <input type="button" value="Generar Otro Reporte" id="idBotonRecargarPagina" class="btn btn-outline-primary">
                  </div>
                  <div class="col-sm-6">
                   
                  </div>
                </div>
                <!-- CONSULTA POR FECHAS Y VALORES -->
                <br>
                <form action="CrearExcel" method="post">
                  <div id="enviarAExcel"></div>
                  <input hidden type="text" name="id" value="<?php echo "prod" ?>"><br>
                  <input id="descargar" style="margin-bottom: 4px;  margin-right:6px;" value="Descargar" type="submit" class=" btn btn-outline-primary">
                </form>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <?php require_once "js/cobro.php"; ?>
                <?php include('estructura/footer.php'); ?>
              </div>
            </div>
            <?php require('estructura/cerrarSesionyEnlacesjs.php'); ?>
            <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
            <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
            <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
      </body>

      </html>