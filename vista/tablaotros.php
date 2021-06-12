<?php
require_once "../controlador/servicios.controller.php";
require_once "../modelo/servicio.modelo.php";
?>



<style type="text/css">
@media screen and (max-width: 600px) {
       table {
           width:100%;
       }
       thead {
           display: none;
       }
       tr:nth-of-type(2n) {
           background-color: inherit;
       }
       tr td:first-child {
           background: #f0f0f0;
           font-weight:bold;
           font-size:1.3em;
       }
       tbody td {
           display: block;
           text-align:center;
       }
       tbody td:before {
           content: attr(data-th);
           display: block;
           text-align:center;
       }
}
</style>

<script type="text/javascript">
  $('.display').dataTable();
</script>

<div class="card shadow mb-4 reload">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Listado de Objetos</h6>
    </div>
    <div class="card-body">
<div class="table-responsive">
  <table class="table table-bordered display" id="tablaproductos3" width="100%" cellspacing="0">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Cantidad</th>
        <th>Relación</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php
      if (!isset($_SESSION)) {
        session_start();
      }
      $matrizOtros = ControllerEmpresas::listarOtro($_SESSION['iid']);
      foreach ($matrizOtros as $registroOtros) {
      ?>
        <tr>
          <td><?php echo $registroOtros["productos"] ?></td>
          <td> <?php echo $registroOtros["cantidad"]; ?></td>
          <td>
            <?php
            $matrizTipoTrabajo = ControllerEmpresas::listarRelacionOtrosTerrestre($registroOtros["id"]);
            foreach ($matrizTipoTrabajo as $registro3) {
              echo "\n ", $registro3["productos"];
              echo "\n ", $registro3["matricula"];
            }
            ?>
            <?php
            $matrizTipoTrabajo = ControllerEmpresas::listarRelacionOtrosMaritimo($registroOtros["id"]);
            foreach ($matrizTipoTrabajo as $registro3) {
              echo "\n ", $registro3["nombre"];
              echo "\n ", $registro3["matricula"];
            }
            ?>
          </td>
          <td>
            <div style="text-align: center;">
              <input style="margin-bottom: 4px;  margin-right:6px;" type="button" onClick="reply_clickModificarOtro(this.id)" value="Editar" name="enviar" id="                 
              <?php echo 'idcode:', $registroOtros["id"], ':idcode nombrecode:',  $registroOtros["id_producto_nombre"], ':nombrecode cantidadcode:', $registroOtros["cantidad"], ':cantidadcode maritimocode:', $registroOtros["id_maritimo"], ':maritimocode terrestrecode:', $registroOtros["id_terrestre"], ':terrestrecode' ?>" class="btn btn-outline-warning">
              <input style="margin-bottom: 4px;  margin-right:6px;" type="button" onClick="reply_clickBorrarOtros(this.id)" value="Borrar" name="borrar" id="<?php echo $registroOtros["id"] ?>" class="borrar-id btn btn-outline-danger">
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

<script type="text/javascript">
  function reply_clickModificarOtro(id) {

    $("#editarOtro").show();
    $("#cancelarOtro").show();
    $("#guardarOtro").hide();

    var cadena = id;
    var inicio = cadena.indexOf("idcode:") + 7;
    var fin = cadena.indexOf(":idcode");
    var id00 = cadena.substring(inicio, fin);

    var inicio = cadena.indexOf("nombrecode:") + 11;
    var fin = cadena.indexOf(":nombrecode");
    var nombre = cadena.substring(inicio, fin);

    var inicio = cadena.indexOf("cantidadcode:") + 13;
    var fin = cadena.indexOf(":cantidadcode");
    var cantidad = cadena.substring(inicio, fin);

    var inicio = cadena.indexOf("maritimocode:") + 13;
    var fin = cadena.indexOf(":maritimocode");
    var maritimo = cadena.substring(inicio, fin);

    var inicio = cadena.indexOf("terrestrecode:") + 14;
    var fin = cadena.indexOf(":terrestrecode");
    var terrestre = cadena.substring(inicio, fin);

    if (maritimo == "") {
      maritimo = "null";
      $("#idRelacionOtros_Terrestre").attr("disabled", false);
      $("#idRelacionOtros_Maritimo").attr("disabled", true);
      
    }

    if (terrestre=="") {
      terrestre = "null";
      $("#idRelacionOtros_Maritimo").attr("disabled", false);
      $("#idRelacionOtros_Terrestre").attr("disabled", true);
    }

    $("#idIdOtro").val(id00);
    $('#idProductoOtros').val(nombre);
    $('#idProductoOtros').trigger('change');
    $("#cantidadOtros").val(cantidad);
    $("#idRelacionOtros_Maritimo").val(maritimo);
    $("#idRelacionOtros_Terrestre").val(terrestre);
    //Comprobaciones
    $("#comprobacionRelacionOtroMaritimo").val(maritimo);
    $("#comprobacionRelacionOtroTerrestre").val(terrestre);
    $('#comprobacionRelacionOtro').val(nombre);

  }
</script>

