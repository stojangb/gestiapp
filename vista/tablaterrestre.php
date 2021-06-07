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
    <h6 class="m-0 font-weight-bold text-primary">Listado de Terrestres</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive" id="dataTab">
      <table class="table table-bordered display" id="tablaproductos2" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Certificado</th>
            <th>Patente</th>
            <th>Nombre</th>
            <th>Tipo de trabajo</th>
            <th>Relación</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $matrizTerrestre = ControllerServicios::listarTerrestre($_POST["id"]);
          foreach ($matrizTerrestre as $registroTerrestre) {
          ?>
            <tr>
              <td><?php echo $registroTerrestre["certificado"] ?></td>
              <td><?php echo $registroTerrestre["matricula"] ?></td>
              <td><?php echo $registroTerrestre["productos"] ?></td>
              <td>
                <?php
                $matrizTipoTrabajo = ControllerServicios::listarTipoDeTrabajoPorIdTerrestre($registroTerrestre["id"]);
                foreach ($matrizTipoTrabajo as $registro3) {
                  echo "\n", $registro3["tipotrabajo"];
                  echo "<hr>";
                }
                ?>
              </td>
              <td>
                <?php
                $matrizTipoTrabajo = ControllerServicios::listarRelacionTerrestre($registroTerrestre["id"]);
                foreach ($matrizTipoTrabajo as $registro3) {
                  echo "\n ", $registro3["nombre"];
                  echo "\n ", $registro3["matricula"];
                }
                ?>
              </td>
              <td>
                <div style="text-align: center;">
                  <input style="margin-bottom: 4px;  margin-right:6px;" type="button" onClick="reply_clickModificarTerrestre(this.id)" value="Editar" name="enviar" id="
              <?php
              error_reporting(0);
              echo 'idcode:', $registroTerrestre["id"],  ':idcode certificadocode:', $registroTerrestre["certificado"], ':certificadocode patentecode:', $registroTerrestre["matricula"],  ':patentecode relacioncode:', $registroTerrestre["id_maritimo"], ':relacioncode nombrecode:', $registroTerrestre["id_producto_nombre"], ':nombrecode',
                $matrizTipoTrabajo = ControllerServicios::listarTipoDeTrabajoPorIdPadreTerrestre($registroTerrestre["id"]);
              echo 'tipocode:';
              foreach ($matrizTipoTrabajo as $registro3) {
                echo $registro3["id"], ',';
              }
              echo ':tipocode';
              ?>
              " class="btn btn-outline-warning">
                  <input style="margin-bottom: 4px;  margin-right:6px;" type="button" onClick="reply_clickBorrarTerrestre(this.id)" value="Borrar" name="borrar" id="<?php echo $registroTerrestre["id"] ?>" class="borrar-id btn btn-outline-danger">
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
  function reply_clickModificarTerrestre(id) {

    $("#editarTerrestre").show();
    $("#cancelarTerrestre").show();
    $("#guardarTerrestre").hide();

    var cadena = id;
    var inicio = cadena.indexOf("idcode:") + 7;
    var fin = cadena.indexOf(":idcode");
    var id00 = cadena.substring(inicio, fin);

    var inicio = cadena.indexOf("certificadocode:") + 16;
    var fin = cadena.indexOf(":certificadocode");
    var certificado = cadena.substring(inicio, fin);

    var inicio = cadena.indexOf("relacioncode:") + 13;
    var fin = cadena.indexOf(":relacioncode");
    var relacion = cadena.substring(inicio, fin);

    var inicio = cadena.indexOf("patentecode:") + 12;
    var fin = cadena.indexOf(":patentecode");
    var patente = cadena.substring(inicio, fin);

    var inicio = cadena.indexOf("nombrecode:") + 11;
    var fin = cadena.indexOf(":nombrecode");
    var nombre = cadena.substring(inicio, fin);

    var inicio = cadena.indexOf("tipocode:") + 9;
    var fin = cadena.indexOf(":tipocode");
    var tipo = cadena.substring(inicio, fin);
    //Obteniendo valores de tipo
    $('.reiniciarTerrestre').prop("checked", false);

    function dividirCadena(cadenaADividir, separador) {
      var arrayDeCadenas = cadenaADividir.split(separador);
      for (var i = 0; i < arrayDeCadenas.length; i++) {
        $('#terr' + arrayDeCadenas[i]).prop("checked", true);
      }
    }

    var tipo1 = tipo.slice(0, -1);
    if (tipo1) {
      dividirCadena(tipo1, ",");
    }

    if (relacion == "") {
      relacion = "null";
    }

    //Fin obtencion valores de tipo
    $("#certificadoTerrestre").val(certificado);
    $("#idCertificadoTerrestreComprobacion").val(certificado);
    $("#patenteTerrestre").val(patente);
    $("#idProductoTerrestre").val(nombre);
    $("#idProductoTerrestreComprobacion").val(patente);
    $("#idIdTerrestre").val(id00);
    $("#idRelacionTerrestre").val(relacion);
  }
</script>

  <!-- Custom scripts for all pages-->
