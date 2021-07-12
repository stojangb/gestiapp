<?php
require_once "../controlador/empresas.controller.php";
require_once "../modelo/empresa.modelo.php";
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
        <h6 class="m-0 font-weight-bold text-primary">Listado de ingresos y egresos de la empresa actual</h6>
    </div>
    <div class="card-body">
<div class="table-responsive">
  <table class="table table-bordered display" id="tablaproductos3" width="100%" cellspacing="0">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Tipo</th>
        <th>Monto</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php
      if (!isset($_SESSION)) {
        session_start();
      }
      $matrizOtros = ControllerEmpresas::listarIngresoEgreso($_SESSION['iid']);
      foreach ($matrizOtros as $registroOtros) {
      ?>
        <tr>
          <td><?php echo $registroOtros["nombre"] ?></td>
          <td> <?php 
          
          
          if ($registroOtros["tipo"] == 1) {
            echo "Ingreso";
          }
          if ($registroOtros["tipo"] == 0) {
            echo "Egreso";
          }
          
          
           ?></td>
          <td> <?php echo $registroOtros["monto"]; ?></td>
          <td>
            <div style="text-align: center;">
              <input style="margin-bottom: 4px;  margin-right:6px;" type="button" onClick="reply_clickModificarOtro(this.id)" value="Editar" name="enviar" id="                 
              <?php echo 'idcode:', $registroOtros["id"], ':idcode nombrecode:',  $registroOtros["nombre"], ':nombrecode cantidadcode:', $registroOtros["monto"], ':cantidadcode tipocode:', $registroOtros["tipo"], ':tipocode' ?>" class="btn btn-outline-warning">
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

    $("#editar3").show();
    $("#cancelar3").show();
    $("#guardar3").hide();

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

    var inicio = cadena.indexOf("tipocode:") + 9;
    var fin = cadena.indexOf(":tipocode");
    var tipo = cadena.substring(inicio, fin);

    $("#idIngresoEgreso").val(id00);
    $('#nombreIngresoEgreso').val(nombre);
    $("#monto3").val(cantidad);
    $('#idTipo3').val(tipo);

  }
</script>

