<?php
require_once "../controlador/empresas.controller.php";
require_once "../modelo/empresa.modelo.php";
?>
<style type="text/css">
  @media screen and (max-width: 600px) {
    table {
      width: 100%;
    }

    thead {
      display: none;
    }

    tr:nth-of-type(2n) {
      background-color: inherit;
    }

    tr td:first-child {
      background: #f0f0f0;
      font-weight: bold;
      font-size: 1.3em;
    }

    tbody td {
      display: block;
      text-align: center;
    }

    tbody td:before {
      content: attr(data-th);
      display: block;
      text-align: center;
    }
  }
</style>
<script type="text/javascript">
  $('.display').dataTable();
</script>

<div class="card shadow mb-4 reload">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Listado de ventas</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive" id="dataTab">
      <table class="table table-bordered display" id="tablaproductos2" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ID</th>
            <th>Cliente</th>
            <th>Fecha</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $matrizTerrestre = ControllerEmpresas::listarVentas($_POST["id"]);
          foreach ($matrizTerrestre as $registroTerrestre) {
          ?>
            <tr>
              <td><?php echo $registroTerrestre["id"] ?></td>
              <td><?php echo $registroTerrestre["nombre_cliente"] ?></td>
              <td><?php echo $registroTerrestre["fecha"] ?></td>
              <td>
                <div style="text-align: center;">
                  <input style="margin-bottom: 4px;  margin-right:6px;" type="button" onClick="reply_clickModificarTerrestre(this.id)" value="Editar" name="enviar" id="
                   <?php echo 'idcode:', $registroTerrestre["id"],  ':idcode nombrecode:', $registroTerrestre["id_cliente"], ':nombrecode fechacode:', $registroTerrestre["fecha"], ':fechacode' ?>
                   " class="btn btn-outline-warning">
                  <input style="margin-bottom: 4px;  margin-right:6px;" type="button" onClick="reply_clickBorrarTerrestre(this.id)" value="Borrar" name="borrar" id="<?php echo $registroTerrestre["id"] ?>" class="borrar-id btn btn-outline-danger">


                  <!-- Post -->

                  <form action="ventadetalle" method="post">
                    <input hidden type="text" name="id" value="<?php echo $registroTerrestre["id"] ?>"><br>
                    <input style="margin-bottom: 4px;  margin-right:6px;" value="Ver" type="submit" class=" btn btn-outline-primary">
                  </form>
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

    $("#editar2").show();
    $("#cancelar2").show();
    $("#guardar2").hide();

    var cadena = id;
    var inicio = cadena.indexOf("idcode:") + 7;
    var fin = cadena.indexOf(":idcode");
    var id00 = cadena.substring(inicio, fin);

    var inicio = cadena.indexOf("nombrecode:") + 11;
    var fin = cadena.indexOf(":nombrecode");
    var nombre = cadena.substring(inicio, fin);

    var inicio = cadena.indexOf("fechacode:") + 10;
    var fin = cadena.indexOf(":fechacode");
    var fecha = cadena.substring(inicio, fin);

    fecha = fecha.replace(" ", "T")
    //Fin obtencion valores de tipo
    $("#id_venta").val(id00);
    $("#idClienteVenta").val(nombre);
    $("#fecha_hora_venta").val(fecha);
  }
</script>

<!-- Custom scripts for all pages-->