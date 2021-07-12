<!-- Comprobación de Login y otros -->
<?php require('backend/redirect.php');
if (!isset($_SESSION)) {
  session_start();
}?>
<!-- Fin comprobación de Login -->
<!DOCTYPE html>
<html lang="es">
<?php require('estructura/head.php'); ?>

<?php
require_once "./controlador/empresas.controller.php";
require_once "./modelo/empresa.modelo.php";
?>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <?php include('estructura/barraLateral.php'); ?>
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <?php include('estructura/barraSuperior.php'); ?>
        <div class="container-fluid">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">ID Venta: <?php echo $_POST["id"]; ?></h1>
          </div>


          <?php
          $matrizTerrestre = ControllerEmpresas::listarVentaPorIdVenta($_POST["id"]);
          foreach ($matrizTerrestre as $registroTerrestre) {
          ?>
            <h4>Cliente: <?php echo $registroTerrestre["nombre_cliente"] ?> </h4>
            <h4>Fecha: <?php echo $registroTerrestre["fecha"] ?> </h4>

          <?php
          }
          ?>
          <input hidden type="text" name="" value=" <?php echo $_POST["id"]; ?>" id="idservicio00">






              <br>
        <form action="productos" method="post">
          <input hidden type="text" name="id" value="<?php echo $_SESSION['iid'] ?>"><br>
          <input style="margin-bottom: 4px;  margin-right:6px;" value="Volver" type="submit" class=" btn btn-outline-primary">
        </form>   
        </div>



 
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