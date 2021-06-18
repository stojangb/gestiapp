<?php
require_once "../controlador/articulos.controller.php";
require_once "../modelo/articulo.modelo.php";
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
        <h6 class="m-0 font-weight-bold text-primary">Listado de Productos</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered display" id="tablaproductos1" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                   $matrizMaritimo = ControllerArticulos::listarArticulos($_POST["id"]);
                   foreach ($matrizMaritimo as $registroMaritimo) {
                    ?>
                        <tr>
                            <td><?php echo $registroMaritimo["nombre"] ?></td>
                            <td><?php echo $registroMaritimo["cantidad"] ?></td>
                            <td><?php echo $registroMaritimo["precio"] ?></td>
                            <td>
<!--                                 <div style="text-align: center;">
                                    <input style="margin-bottom: 4px;  margin-right:6px;" type="button" onClick="reply_clickModificarMaritimo(this.id)" value="Editar" name="enviar" id="                 
                                   <?php
                     /*                error_reporting(0);
                                    echo 'idcode:', $registroMaritimo["id"],  ':idcode certificadocode:', $registroMaritimo["certificado"], ':certificadocode idbarcazacode:', $registroMaritimo["objmarid"],  ':idbarcazacode vueltafalsacode:', $registroMaritimo["vueltafalsa"], ':vueltafalsacode',
                                    $matrizTipoTrabajo = ControllerEmpresas::listarTipoDeTrabajoPorIdPadre($registroMaritimo["id"]);
                                    echo 'tipocode:';
                                    foreach ($matrizTipoTrabajo as $registro3) {
                                        echo $registro3["id"], ',';
                                    }
                                    echo ':tipocode'; */
                                    ?>" class="btn btn-outline-warning">
                                    <input style="margin-bottom: 4px;  margin-right:6px;" type="button" onClick="reply_clickBorrarMaritimo(this.id)" value="Borrar" name="borrar" id="<?php echo $registroMaritimo["id"] ?>" class="borrar-id btn btn-outline-danger">
                                </div> -->
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
    function reply_clickModificarMaritimo(id) {

        $("#editarMaritimo").show();
        $("#cancelarMaritimo").show();
        $("#guardarMaritimo").hide();

        var cadena = id;
        var inicio = cadena.indexOf("idcode:") + 7;
        var fin = cadena.indexOf(":idcode");
        var id00 = cadena.substring(inicio, fin);

        var inicio = cadena.indexOf("certificadocode:") + 16;
        var fin = cadena.indexOf(":certificadocode");
        var certificado = cadena.substring(inicio, fin);

        var inicio = cadena.indexOf("idbarcazacode:") + 14;
        var fin = cadena.indexOf(":idbarcazacode");
        var maritimonombre = cadena.substring(inicio, fin);

        var inicio = cadena.indexOf("vueltafalsacode:") + 16;
        var fin = cadena.indexOf(":vueltafalsacode");
        var vueltafalsa = cadena.substring(inicio, fin);

        var inicio = cadena.indexOf("tipocode:") + 9;
        var fin = cadena.indexOf(":tipocode");
        var tipo = cadena.substring(inicio, fin);

        //Obteniendo valores de tipo
        $('.reiniciarMaritimo').prop("checked", false);

        function dividirCadena(cadenaADividir, separador) {
            var arrayDeCadenas = cadenaADividir.split(separador);
            for (var i = 0; i < arrayDeCadenas.length; i++) {
                $('#' + arrayDeCadenas[i]).prop("checked", true);
            }
        }
        var tipo1 = tipo.slice(0, -1);
        if (tipo1) {
            dividirCadena(tipo1, ",");
        }
        //Fin obtencion valores de tipo
        $("#certificadoMaritimo").val(certificado);
        $("#idProductoMaritimo").val(maritimonombre);
        $("#vuelta").val(vueltafalsa);
        $("#idIdMaritimo").val(id00);
        $("#idProductoMaritimoComprobacion").val(maritimonombre);
        $("#idCertificadoMaritimoComprobacion").val(certificado);
        if (vueltafalsa == 1) {
            $('#vuelta').prop("checked", true);
        } else {
            $('#vuelta').prop("checked", false);
        }
    }
</script>

<!-- Page level plugins -->