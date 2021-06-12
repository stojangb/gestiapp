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
            <h1 class="h3 mb-0 text-gray-800">Archivos de servicio <?php echo $_POST["id"]; ?></h1>
          </div>
          <input hidden type="text" name="" value=" <?php echo $_POST["id"]; ?>" class="custom-file-input" id="idservicio00">
          <?php
          $matrizServicios = ControllerEmpresas::listarServicioUnico($_POST["id"]);
          foreach ($matrizServicios as $registro) {
          ?>
            <div style="color:#4e73df"><?php echo $registro["fecha"]; ?>
            </div>
            <?php
            //Nombre
            $matrizFechas = ControllerEmpresas::listarClientes($registro["idservicios"]);
            foreach ($matrizFechas as $registro3) {
              echo "Cliente: ";
              echo $registro3["nombreEmpresa"];
              echo ", ";
            }
            ?>
            <?php
            //RUT
            $matrizFechas = ControllerEmpresas::listarClientes($registro["idservicios"]);
            foreach ($matrizFechas as $registro3) {
              RUT:
              echo $registro3["rut"];
            }
            ?>
            <div>
              Detalles: <?php echo $registro["detalles"]; ?>
            <?php }  ?>
            <br>
            <br>
            <br>
            <div class="form-group">
              <form method="post" id="form" enctype="multipart/form-data" action="ajax/ajaxFiles.php">
                <input type="file" name="file[]" multiple class="" id="file">
                <br>
                <br>
                <button class="btn btn-outline-success" onclick="subir()" type="button">Cargar</button>
              </form>
            </div>
            <br>
    
            <script>
              function subir() {
                alert("Por favor espere a que la página recargue automáticamente.");
                var Form = new FormData($("#form")[0]);
                Form.append("idservicio", idservicio);
                $.ajax({
                  url: 'ajax/ajaxFiles.php',
                  type: 'POST',
                  data: Form,
                  processData: false,
                  contentType: false,
                  async: false,
                  success: function(respuesta) {
                    //Recargar Sección de archivos.
                    location.reload();
                  }
                });
              }
            </script>
            <!-- Mostrando archivos -->
            <div id="vistaDeArchivos">
              <?php
              $path = 'ajax/archivos/ ' . $_SESSION['iid'];
              if (!file_exists($path)) {
              }
              if (file_exists($path)) {
                $directorio = opendir($path);
                while ($archivo = readdir($directorio)) {
                  if (!is_dir($archivo)) {
                    echo "<div data='" . $path . "/" . $archivo . "'><a href='" . $path . "/" . $archivo . "' title='Ver Archivo Adjunto'><i class='far fa-file-image fa-lg'></i></a>";
                    echo ("&nbspArchivo:&nbsp" . $archivo . "&nbsp");
                    echo "<a href='#' class='delete' title='Eliminar Archivo Adjunto' ><i class='fas fa-trash-alt fa-lg'></i></a></div>";
                  }
                }
              } else {
                echo "No hay archivos";
              }
              ?>
            </div>
            <!-- INICIO Borrar archivos -->
            <script type="text/javascript">
              $(document).ready(function() {
                $('.delete').click(function() {
                  confirmar = confirm('¿Estás seguro de eliminar el documento?');
                  if (confirmar == true) {
                    var parent = $(this).parent().attr('id');
                    var service = $(this).parent().attr('data');
                    var dataString = 'id=' + service;
                    $.ajax({
                      type: "POST",
                      url: "vista/del_file.php",
                      data: dataString,
                      success: function() {
                        location.reload();
                      }
                    });
                  }
                });
              });
            </script>
            <form action="productos" method="post">
              <input hidden type="text" name="id" value="<?php echo $_SESSION['iid'] ?>"><br>
              <input style="margin-bottom: 4px;  margin-right:6px;" value="Volver" type="submit" class=" btn btn-outline-primary">
            </form>
            <!-- Fin Borrar archivos -->
            <!-- Mostrando archivos fin -->
            </div>
        </div>
        <?php
        require_once "js/jsproductosvista.php";
        ?>
        <br>
        <!-- /.container-fluid -->
        <?php include('estructura/footer.php'); ?>
        <!-- Fin Footer -->
        <?php require('estructura/cerrarSesionyEnlacesjs.php'); ?>
</body>

</html>