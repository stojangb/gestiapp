<?php
require_once "conexion.php";
class ModeloBusquedas
{
    //Listar
    static public function listarBusquedaMaritimoOTerrestre($fechaInicio, $fechaTermino, $idCliente, $tipotrabajo, $MaritimoOTerrestre)
    {
        $sinTipoTrabajo = 0;
        $sinCliente = 0;
        $Terrestre = 0;
        $Maritimo  = 0;

        $conteoMaritimoOTerrestre =  count($MaritimoOTerrestre);

        for ($i = 0; $i < $conteoMaritimoOTerrestre; $i++) {
          //  var_dump($MaritimoOTerrestre[$i]);
             if ($MaritimoOTerrestre[$i] == "trueMaritimo") {
                // var_dump("Buscar en todos los tipos de trabajo.");
                $Maritimo  = 1;
            }  
             if ($MaritimoOTerrestre[$i] == "trueTerrestre") {
                // var_dump("Buscar en todos los tipos de trabajo.");

                $Terrestre = 1;
            }  
        }

        $conteoTipoTrabajo =  count($tipotrabajo);
        for ($i = 0; $i < $conteoTipoTrabajo; $i++) {
           // var_dump($tipotrabajo[$i]);
            if ($tipotrabajo[$i] == "true") {
                // var_dump("Buscar en todos los tipos de trabajo.");
                $sinTipoTrabajo = 1;
            }
        }
        if ($idCliente == "All") {
            $sinCliente = 1;
        }


        if ($sinTipoTrabajo == 1 && $sinCliente == 1 && $Maritimo == 1 && $Terrestre == 1) {

            $sql = DB::conexion()->prepare("SELECT  servicios.idservicios,clientes.nombreEmpresa, clientes.rut, certificados.certificado, servicios.fecha, productos.productos, terrestre.matricula, terrestre.id as vueltafalsa FROM terrestre inner join productos on terrestre.id_producto_nombre = productos.id inner join servicios on terrestre.id_servicio = servicios.idservicios inner join certificados on terrestre.id = certificados.id_terrestre inner join servicio_cliente on servicios.idservicios = servicio_cliente.idservicio inner join clientes on servicio_cliente.idcliente = clientes.id where servicios.fecha between '$fechaInicio' and '$fechaTermino'
                                      UNION SELECT  servicios.idservicios,clientes.nombreEmpresa, clientes.rut, certificados.certificado, servicios.fecha, objetomaritimo.nombre, objetomaritimo.matricula, maritimo.vueltafalsa FROM maritimo inner join objetomaritimo on maritimo.id_objetomaritimo = objetomaritimo.id inner join servicios on maritimo.idservicio = servicios.idservicios inner join certificados on maritimo.id = certificados.id_maritimo inner join servicio_cliente on servicios.idservicios = servicio_cliente.idservicio inner join clientes on servicio_cliente.idcliente = clientes.id where servicios.fecha between '$fechaInicio' and '$fechaTermino'");
            $sql->execute();
            return $sql->fetchAll();
        }

        if ($sinTipoTrabajo == 1 && $sinCliente == 1 && $Terrestre == 1 && $Maritimo ==0) {

             $sql = DB::conexion()->prepare("SELECT  servicios.idservicios,clientes.nombreEmpresa, clientes.rut, certificados.certificado, servicios.fecha, productos.productos, terrestre.matricula, terrestre.id as vueltafalsa FROM terrestre inner join productos on terrestre.id_producto_nombre = productos.id inner join servicios on terrestre.id_servicio = servicios.idservicios inner join certificados on terrestre.id = certificados.id_terrestre inner join servicio_cliente on servicios.idservicios = servicio_cliente.idservicio inner join clientes on servicio_cliente.idcliente = clientes.id where servicios.fecha between '$fechaInicio' and '$fechaTermino'");
             $sql->execute();
             return $sql->fetchAll();
         }

         if ($sinTipoTrabajo == 1 && $sinCliente == 1 && $Terrestre == 0 && $Maritimo ==1) {

             $sql = DB::conexion()->prepare("SELECT  servicios.idservicios,clientes.nombreEmpresa, clientes.rut, certificados.certificado, servicios.fecha, objetomaritimo.nombre, objetomaritimo.matricula, maritimo.vueltafalsa FROM maritimo inner join objetomaritimo on maritimo.id_objetomaritimo = objetomaritimo.id inner join servicios on maritimo.idservicio = servicios.idservicios inner join certificados on maritimo.id = certificados.id_maritimo inner join servicio_cliente on servicios.idservicios = servicio_cliente.idservicio inner join clientes on servicio_cliente.idcliente = clientes.id where servicios.fecha between '$fechaInicio' and '$fechaTermino'");
             $sql->execute();
             return $sql->fetchAll();
         }

         if ($sinTipoTrabajo == 1 && $sinCliente == 0 && $Terrestre == 0 && $Maritimo ==1) {

             $sql = DB::conexion()->prepare("SELECT  servicios.idservicios,clientes.nombreEmpresa, clientes.rut, certificados.certificado, servicios.fecha, objetomaritimo.nombre, objetomaritimo.matricula, maritimo.vueltafalsa FROM maritimo inner join objetomaritimo on maritimo.id_objetomaritimo = objetomaritimo.id inner join servicios on maritimo.idservicio = servicios.idservicios inner join certificados on maritimo.id = certificados.id_maritimo inner join servicio_cliente on servicios.idservicios = servicio_cliente.idservicio inner join clientes on servicio_cliente.idcliente = clientes.id where servicios.fecha between '$fechaInicio' and '$fechaTermino' and clientes.id = '$idCliente'");
             $sql->execute();
             return $sql->fetchAll();
         }

         if ($sinTipoTrabajo == 1 && $sinCliente == 0 && $Terrestre == 1 && $Maritimo ==0) {

             $sql = DB::conexion()->prepare("SELECT servicios.idservicios,clientes.nombreEmpresa, clientes.rut, certificados.certificado, servicios.fecha, productos.productos, terrestre.matricula, terrestre.id as vueltafalsa FROM terrestre inner join productos on terrestre.id_producto_nombre = productos.id inner join servicios on terrestre.id_servicio = servicios.idservicios inner join certificados on terrestre.id = certificados.id_terrestre inner join servicio_cliente on servicios.idservicios = servicio_cliente.idservicio inner join clientes on servicio_cliente.idcliente = clientes.id where servicios.fecha between '$fechaInicio' and '$fechaTermino' and clientes.id = '$idCliente'");
             $sql->execute();
             return $sql->fetchAll();
         }

         if ($sinTipoTrabajo == 1 && $sinCliente == 0 && $Terrestre == 1 && $Maritimo ==0) {

             $sql = DB::conexion()->prepare("SELECT servicios.idservicios,clientes.nombreEmpresa, clientes.rut, certificados.certificado, servicios.fecha, productos.productos, terrestre.matricula, terrestre.id as vueltafalsa FROM terrestre inner join productos on terrestre.id_producto_nombre = productos.id inner join servicios on terrestre.id_servicio = servicios.idservicios inner join certificados on terrestre.id = certificados.id_terrestre inner join servicio_cliente on servicios.idservicios = servicio_cliente.idservicio inner join clientes on servicio_cliente.idcliente = clientes.id where servicios.fecha between '$fechaInicio' and '$fechaTermino' and clientes.id = '$idCliente'");
             $sql->execute();
             return $sql->fetchAll();
         }
         if ($sinTipoTrabajo == 1 && $sinCliente == 0 && $Terrestre == 1 && $Maritimo ==1) {

             $sql = DB::conexion()->prepare("SELECT servicios.idservicios,clientes.nombreEmpresa, clientes.rut, certificados.certificado, servicios.fecha, productos.productos, terrestre.matricula, terrestre.id as vueltafalsa FROM terrestre inner join productos on terrestre.id_producto_nombre = productos.id inner join servicios on terrestre.id_servicio = servicios.idservicios inner join certificados on terrestre.id = certificados.id_terrestre inner join servicio_cliente on servicios.idservicios = servicio_cliente.idservicio inner join clientes on servicio_cliente.idcliente = clientes.id where servicios.fecha between '$fechaInicio' and '$fechaTermino' and clientes.id = '$idCliente' union
                                             SELECT servicios.idservicios,clientes.nombreEmpresa, clientes.rut, certificados.certificado, servicios.fecha, objetomaritimo.nombre, objetomaritimo.matricula, maritimo.vueltafalsa FROM maritimo inner join objetomaritimo on maritimo.id_objetomaritimo = objetomaritimo.id inner join servicios on maritimo.idservicio = servicios.idservicios inner join certificados on maritimo.id = certificados.id_maritimo inner join servicio_cliente on servicios.idservicios = servicio_cliente.idservicio inner join clientes on servicio_cliente.idcliente = clientes.id where servicios.fecha between '$fechaInicio' and '$fechaTermino' and clientes.id = '$idCliente'");
             $sql->execute();
             return $sql->fetchAll();
         }

         if ($sinTipoTrabajo == 0 && $sinCliente == 0 && $Terrestre == 1 && $Maritimo ==1) {
            // Con tipo trabajo Array!
            $arrayTiposTrabajo = implode("','", $tipotrabajo);
             $sql = DB::conexion()->prepare("SELECT servicios.idservicios,clientes.nombreEmpresa, clientes.rut, certificados.certificado, servicios.fecha, productos.productos, terrestre.matricula, terrestre.id as vueltafalsa FROM terrestre inner join productos on terrestre.id_producto_nombre = productos.id inner join servicios on terrestre.id_servicio = servicios.idservicios inner join certificados on terrestre.id = certificados.id_terrestre inner join servicio_cliente on servicios.idservicios = servicio_cliente.idservicio inner join clientes on servicio_cliente.idcliente = clientes.id inner join trabajo on terrestre.id = trabajo.id_terrestre where servicios.fecha between '$fechaInicio' and '$fechaTermino' and clientes.id = '$idCliente' and trabajo.id_tipotrabajo IN ('" . $arrayTiposTrabajo . "') union
                                             SELECT servicios.idservicios,clientes.nombreEmpresa, clientes.rut, certificados.certificado, servicios.fecha, objetomaritimo.nombre, objetomaritimo.matricula, maritimo.vueltafalsa FROM maritimo inner join objetomaritimo on maritimo.id_objetomaritimo = objetomaritimo.id inner join servicios on maritimo.idservicio = servicios.idservicios inner join certificados on maritimo.id = certificados.id_maritimo inner join servicio_cliente on servicios.idservicios = servicio_cliente.idservicio inner join clientes on servicio_cliente.idcliente = clientes.id inner join trabajo on maritimo.id = trabajo.id_maritimo where servicios.fecha between '$fechaInicio' and '$fechaTermino' and clientes.id = '$idCliente' and trabajo.id_tipotrabajo IN ('" . $arrayTiposTrabajo . "')");
             $sql->execute();
             return $sql->fetchAll();
         }

         if ($sinTipoTrabajo == 0 && $sinCliente == 0 && $Terrestre == 0 && $Maritimo ==1) {
            // Con tipo trabajo Array!
            $arrayTiposTrabajo = implode("','", $tipotrabajo);
             $sql = DB::conexion()->prepare("SELECT servicios.idservicios,clientes.nombreEmpresa, clientes.rut, certificados.certificado, servicios.fecha, objetomaritimo.nombre, objetomaritimo.matricula, maritimo.vueltafalsa FROM maritimo inner join objetomaritimo on maritimo.id_objetomaritimo = objetomaritimo.id inner join servicios on maritimo.idservicio = servicios.idservicios inner join certificados on maritimo.id = certificados.id_maritimo inner join servicio_cliente on servicios.idservicios = servicio_cliente.idservicio inner join clientes on servicio_cliente.idcliente = clientes.id inner join trabajo on maritimo.id = trabajo.id_maritimo where servicios.fecha between '$fechaInicio' and '$fechaTermino' and clientes.id = '$idCliente' and trabajo.id_tipotrabajo IN ('" . $arrayTiposTrabajo . "')");
             $sql->execute();
             return $sql->fetchAll();
         }

         if ($sinTipoTrabajo == 0 && $sinCliente == 0 && $Terrestre == 1 && $Maritimo ==0) {
            // Con tipo trabajo Array!
            $arrayTiposTrabajo = implode("','", $tipotrabajo);
             $sql = DB::conexion()->prepare("SELECT servicios.idservicios,clientes.nombreEmpresa, clientes.rut, certificados.certificado, servicios.fecha, productos.productos, terrestre.matricula, terrestre.id as vueltafalsa FROM terrestre inner join productos on terrestre.id_producto_nombre = productos.id inner join servicios on terrestre.id_servicio = servicios.idservicios inner join certificados on terrestre.id = certificados.id_terrestre inner join servicio_cliente on servicios.idservicios = servicio_cliente.idservicio inner join clientes on servicio_cliente.idcliente = clientes.id inner join trabajo on terrestre.id = trabajo.id_terrestre where servicios.fecha between '$fechaInicio' and '$fechaTermino' and clientes.id = '$idCliente' and trabajo.id_tipotrabajo IN ('" . $arrayTiposTrabajo . "')");
             $sql->execute();
             return $sql->fetchAll();
         }
         //Sin Cliente
         if ($sinTipoTrabajo == 0 && $sinCliente == 1 && $Terrestre == 1 && $Maritimo ==1) {
            // Con tipo trabajo Array!
            $arrayTiposTrabajo = implode("','", $tipotrabajo);
             $sql = DB::conexion()->prepare("SELECT servicios.idservicios,clientes.nombreEmpresa, clientes.rut, certificados.certificado, servicios.fecha, productos.productos, terrestre.matricula, terrestre.id as vueltafalsa FROM terrestre inner join productos on terrestre.id_producto_nombre = productos.id inner join servicios on terrestre.id_servicio = servicios.idservicios inner join certificados on terrestre.id = certificados.id_terrestre inner join servicio_cliente on servicios.idservicios = servicio_cliente.idservicio inner join clientes on servicio_cliente.idcliente = clientes.id inner join trabajo on terrestre.id = trabajo.id_terrestre where servicios.fecha between '$fechaInicio' and '$fechaTermino' and trabajo.id_tipotrabajo IN ('" . $arrayTiposTrabajo . "') union
                                             SELECT servicios.idservicios,clientes.nombreEmpresa, clientes.rut, certificados.certificado, servicios.fecha, objetomaritimo.nombre, objetomaritimo.matricula, maritimo.vueltafalsa FROM maritimo inner join objetomaritimo on maritimo.id_objetomaritimo = objetomaritimo.id inner join servicios on maritimo.idservicio = servicios.idservicios inner join certificados on maritimo.id = certificados.id_maritimo inner join servicio_cliente on servicios.idservicios = servicio_cliente.idservicio inner join clientes on servicio_cliente.idcliente = clientes.id inner join trabajo on maritimo.id = trabajo.id_maritimo where servicios.fecha between '$fechaInicio' and '$fechaTermino'  and trabajo.id_tipotrabajo IN ('" . $arrayTiposTrabajo . "')");
             $sql->execute();
             return $sql->fetchAll();
         }

         if ($sinTipoTrabajo == 0 && $sinCliente == 1 && $Terrestre == 0 && $Maritimo ==1) {
            // Con tipo trabajo Array!
            $arrayTiposTrabajo = implode("','", $tipotrabajo);
             $sql = DB::conexion()->prepare("SELECT servicios.idservicios,clientes.nombreEmpresa, clientes.rut, certificados.certificado, servicios.fecha, objetomaritimo.nombre, objetomaritimo.matricula, maritimo.vueltafalsa FROM maritimo inner join objetomaritimo on maritimo.id_objetomaritimo = objetomaritimo.id inner join servicios on maritimo.idservicio = servicios.idservicios inner join certificados on maritimo.id = certificados.id_maritimo inner join servicio_cliente on servicios.idservicios = servicio_cliente.idservicio inner join clientes on servicio_cliente.idcliente = clientes.id inner join trabajo on maritimo.id = trabajo.id_maritimo where servicios.fecha between '$fechaInicio' and '$fechaTermino' and trabajo.id_tipotrabajo IN ('" . $arrayTiposTrabajo . "')");
             $sql->execute();
             return $sql->fetchAll();
         }

         if ($sinTipoTrabajo == 0 && $sinCliente == 1 && $Terrestre == 1 && $Maritimo ==0) {
            // Con tipo trabajo Array!
            $arrayTiposTrabajo = implode("','", $tipotrabajo);
             $sql = DB::conexion()->prepare("SELECT servicios.idservicios,clientes.nombreEmpresa, clientes.rut, certificados.certificado, servicios.fecha, productos.productos, terrestre.matricula, terrestre.id as vueltafalsa FROM terrestre inner join productos on terrestre.id_producto_nombre = productos.id inner join servicios on terrestre.id_servicio = servicios.idservicios inner join certificados on terrestre.id = certificados.id_terrestre inner join servicio_cliente on servicios.idservicios = servicio_cliente.idservicio inner join clientes on servicio_cliente.idcliente = clientes.id inner join trabajo on terrestre.id = trabajo.id_terrestre where servicios.fecha between '$fechaInicio' and '$fechaTermino' and trabajo.id_tipotrabajo IN ('" . $arrayTiposTrabajo . "')");
             $sql->execute();
             return $sql->fetchAll();
         }
    }
    static public function listarBusquedaVueltaFalsa($fechaInicio, $fechaTermino, $idCliente)
    {
        if ($idCliente == "All") {
            $sql = DB::conexion()->prepare("SELECT  servicios.idservicios,clientes.nombreEmpresa, clientes.rut, certificados.certificado, servicios.fecha, objetomaritimo.nombre, objetomaritimo.matricula, maritimo.vueltafalsa FROM maritimo inner join objetomaritimo on maritimo.id_objetomaritimo = objetomaritimo.id inner join servicios on maritimo.idservicio = servicios.idservicios inner join certificados on maritimo.id = certificados.id_maritimo inner join servicio_cliente on servicios.idservicios = servicio_cliente.idservicio inner join clientes on servicio_cliente.idcliente = clientes.id where servicios.fecha between '$fechaInicio' and '$fechaTermino' and maritimo.vueltafalsa = 1");
            $sql->execute();
            return $sql->fetchAll();
        }else{
            $sql = DB::conexion()->prepare("SELECT  servicios.idservicios,clientes.nombreEmpresa, clientes.rut, certificados.certificado, servicios.fecha, objetomaritimo.nombre, objetomaritimo.matricula, maritimo.vueltafalsa FROM maritimo inner join objetomaritimo on maritimo.id_objetomaritimo = objetomaritimo.id inner join servicios on maritimo.idservicio = servicios.idservicios inner join certificados on maritimo.id = certificados.id_maritimo inner join servicio_cliente on servicios.idservicios = servicio_cliente.idservicio inner join clientes on servicio_cliente.idcliente = clientes.id where servicios.fecha between '$fechaInicio' and '$fechaTermino' and clientes.id = '$idCliente' and maritimo.vueltafalsa = 1");
            $sql->execute();
            return $sql->fetchAll();
        }     
    }
    static public function listarBusquedaOtros($fechaInicio, $fechaTermino, $idCliente, $otros)
    {
        $sinCliente = 0;
        $sinOtros = 0;

        if ($idCliente == "All") {
            $sinCliente = 1;
        }

        $conteoOtros =  count($otros);
        for ($i = 0; $i < $conteoOtros; $i++) {
           // var_dump($tipotrabajo[$i]);
            if ($otros[$i] == "Todos") {
                // var_dump("Buscar en todos los tipos de trabajo.");
                $sinOtros = 1;
            }
        }




        if ($sinCliente == 1 && $sinOtros == 1) {
            // Todos los objetos de todos los clientes
            $arrayOtros = implode("','", $otros);
          //   $sql = DB::conexion()->prepare("SELECT servicios.idservicios, clientes.nombreEmpresa, clientes.rut, productos.productos , otros.cantidad, objetomaritimo.nombre, servicios.fecha  FROM otros inner join productos on otros.id_producto_nombre = productos.id inner join servicios on otros.id_servicio = servicios.idservicios inner join servicio_cliente on servicios.idservicios = servicio_cliente.idservicio inner join clientes on servicio_cliente.idcliente = clientes.id  inner join maritimo on otros.id_maritimo = maritimo.id inner join objetomaritimo on maritimo.id_objetomaritimo = objetomaritimo.id where servicios.fecha between '$fechaInicio' and '$fechaTermino'");
             $sql = DB::conexion()->prepare("SELECT servicios.idservicios, clientes.nombreEmpresa, clientes.rut, P1.productos as nombre, otros.cantidad, P2.productos as relacion2, servicios.fecha
             FROM otros
             inner join terrestre on otros.id_terrestre = terrestre.id
             inner join productos P2 on terrestre.id_producto_nombre = P2.id
             inner join servicios on otros.id_servicio = servicios.idservicios
             inner join servicio_cliente on servicios.idservicios = servicio_cliente.idservicio
             inner join clientes on servicio_cliente.idcliente = clientes.id
             inner join productos P1 on otros.id_producto_nombre = P1.id
             where servicios.fecha between '$fechaInicio' and '$fechaTermino'
             union
             SELECT servicios.idservicios, clientes.nombreEmpresa, clientes.rut, P1.productos as nombre, otros.cantidad, objetomaritimo.nombre as relacion2, servicios.fecha
             FROM otros
             inner join servicios on otros.id_servicio = servicios.idservicios
             inner join servicio_cliente on servicios.idservicios = servicio_cliente.idservicio
             inner join clientes on servicio_cliente.idcliente = clientes.id
             inner join productos P1 on otros.id_producto_nombre = P1.id
             inner join maritimo on otros.id_maritimo = maritimo.id
             inner join objetomaritimo on maritimo.id_objetomaritimo = objetomaritimo.id
             where servicios.fecha between '$fechaInicio' and '$fechaTermino'");
             $sql->execute();
             return $sql->fetchAll();
         }
        if ($sinCliente == 1 && $sinOtros == 0) {
            // Algunos objetos de todos los clientes
            $arrayOtros = implode("','", $otros);
           //  $sql = DB::conexion()->prepare("SELECT servicios.idservicios, clientes.nombreEmpresa, clientes.rut, productos.productos, otros.cantidad, objetomaritimo.nombre, servicios.fecha  FROM otros inner join productos on otros.id_producto_nombre = productos.id inner join servicios on otros.id_servicio = servicios.idservicios inner join servicio_cliente on servicios.idservicios = servicio_cliente.idservicio inner join clientes on servicio_cliente.idcliente = clientes.id inner join maritimo on otros.id_maritimo = maritimo.id inner join objetomaritimo on maritimo.id_objetomaritimo = objetomaritimo.id  where servicios.fecha between '$fechaInicio' and '$fechaTermino' and otros.id_producto_nombre IN ('" . $arrayOtros . "')");
             $sql = DB::conexion()->prepare("SELECT servicios.idservicios, clientes.nombreEmpresa, clientes.rut, P1.productos as nombre, otros.cantidad, P2.productos as relacion2, servicios.fecha
             FROM otros
             inner join terrestre on otros.id_terrestre = terrestre.id
             inner join productos P2 on terrestre.id_producto_nombre = P2.id
             inner join servicios on otros.id_servicio = servicios.idservicios
             inner join servicio_cliente on servicios.idservicios = servicio_cliente.idservicio
             inner join clientes on servicio_cliente.idcliente = clientes.id
             inner join productos P1 on otros.id_producto_nombre = P1.id
             where servicios.fecha between '$fechaInicio' and '$fechaTermino' and otros.id_producto_nombre IN ('" . $arrayOtros . "')
             union
             SELECT servicios.idservicios, clientes.nombreEmpresa, clientes.rut, P1.productos as nombre, otros.cantidad, objetomaritimo.nombre as relacion2, servicios.fecha
             FROM otros
             inner join servicios on otros.id_servicio = servicios.idservicios
             inner join servicio_cliente on servicios.idservicios = servicio_cliente.idservicio
             inner join clientes on servicio_cliente.idcliente = clientes.id
             inner join productos P1 on otros.id_producto_nombre = P1.id
             inner join maritimo on otros.id_maritimo = maritimo.id
             inner join objetomaritimo on maritimo.id_objetomaritimo = objetomaritimo.id
             where servicios.fecha between '$fechaInicio' and '$fechaTermino' and otros.id_producto_nombre IN ('" . $arrayOtros . "')");
             $sql->execute();
             return $sql->fetchAll();
         }

        if ($sinCliente == 0 && $sinOtros == 1) {
            // Todos los objetos de algunos clientes
            $arrayOtros = implode("','", $otros);
           //  $sql = DB::conexion()->prepare("SELECT servicios.idservicios, clientes.nombreEmpresa, clientes.rut, productos.productos , otros.cantidad, objetomaritimo.nombre, servicios.fecha  FROM otros inner join productos on otros.id_producto_nombre = productos.id inner join servicios on otros.id_servicio = servicios.idservicios inner join servicio_cliente on servicios.idservicios = servicio_cliente.idservicio inner join clientes on servicio_cliente.idcliente = clientes.id inner join maritimo on otros.id_maritimo = maritimo.id inner join objetomaritimo on maritimo.id_objetomaritimo = objetomaritimo.id  where servicios.fecha between '$fechaInicio' and '$fechaTermino' and clientes.id = '$idCliente'");
             $sql = DB::conexion()->prepare("SELECT servicios.idservicios, clientes.nombreEmpresa, clientes.rut, P1.productos as nombre, otros.cantidad, P2.productos as relacion2, servicios.fecha
             FROM otros
             inner join terrestre on otros.id_terrestre = terrestre.id
             inner join productos P2 on terrestre.id_producto_nombre = P2.id
             inner join servicios on otros.id_servicio = servicios.idservicios
             inner join servicio_cliente on servicios.idservicios = servicio_cliente.idservicio
             inner join clientes on servicio_cliente.idcliente = clientes.id
             inner join productos P1 on otros.id_producto_nombre = P1.id
             where servicios.fecha between '$fechaInicio' and '$fechaTermino' and clientes.id = '$idCliente'
             union
             SELECT servicios.idservicios, clientes.nombreEmpresa, clientes.rut, P1.productos as nombre, otros.cantidad, objetomaritimo.nombre as relacion2, servicios.fecha
             FROM otros
             inner join servicios on otros.id_servicio = servicios.idservicios
             inner join servicio_cliente on servicios.idservicios = servicio_cliente.idservicio
             inner join clientes on servicio_cliente.idcliente = clientes.id
             inner join productos P1 on otros.id_producto_nombre = P1.id
             inner join maritimo on otros.id_maritimo = maritimo.id
             inner join objetomaritimo on maritimo.id_objetomaritimo = objetomaritimo.id
             where servicios.fecha between '$fechaInicio' and '$fechaTermino' and clientes.id = '$idCliente'");
             $sql->execute();
             return $sql->fetchAll();
         }
        if ($sinCliente == 0 && $sinOtros == 0) {
            // Algunos objetos de algunos clientes
            $arrayOtros = implode("','", $otros);
           //  $sql = DB::conexion()->prepare("SELECT servicios.idservicios, clientes.nombreEmpresa, clientes.rut, productos.productos, otros.cantidad, objetomaritimo.nombre, servicios.fecha  FROM otros inner join productos on otros.id_producto_nombre = productos.id inner join servicios on otros.id_servicio = servicios.idservicios inner join servicio_cliente on servicios.idservicios = servicio_cliente.idservicio inner join clientes on servicio_cliente.idcliente = clientes.id inner join maritimo on otros.id_maritimo = maritimo.id inner join objetomaritimo on maritimo.id_objetomaritimo = objetomaritimo.id  where servicios.fecha between '$fechaInicio' and '$fechaTermino' and clientes.id = '$idCliente' and otros.id_producto_nombre IN ('" . $arrayOtros . "')");
             $sql = DB::conexion()->prepare("SELECT servicios.idservicios, clientes.nombreEmpresa, clientes.rut, P1.productos as nombre, otros.cantidad, P2.productos as relacion2, servicios.fecha
             FROM otros
             inner join terrestre on otros.id_terrestre = terrestre.id
             inner join productos P2 on terrestre.id_producto_nombre = P2.id
             inner join servicios on otros.id_servicio = servicios.idservicios
             inner join servicio_cliente on servicios.idservicios = servicio_cliente.idservicio
             inner join clientes on servicio_cliente.idcliente = clientes.id
             inner join productos P1 on otros.id_producto_nombre = P1.id
             where servicios.fecha between '$fechaInicio' and '$fechaTermino' and clientes.id = '$idCliente' and otros.id_producto_nombre IN ('" . $arrayOtros . "')
             union
             SELECT servicios.idservicios, clientes.nombreEmpresa, clientes.rut, P1.productos as nombre, otros.cantidad, objetomaritimo.nombre as relacion2, servicios.fecha
             FROM otros
             inner join servicios on otros.id_servicio = servicios.idservicios
             inner join servicio_cliente on servicios.idservicios = servicio_cliente.idservicio
             inner join clientes on servicio_cliente.idcliente = clientes.id
             inner join productos P1 on otros.id_producto_nombre = P1.id
             inner join maritimo on otros.id_maritimo = maritimo.id
             inner join objetomaritimo on maritimo.id_objetomaritimo = objetomaritimo.id
             where servicios.fecha between '$fechaInicio' and '$fechaTermino' and clientes.id = '$idCliente' and otros.id_producto_nombre IN ('" . $arrayOtros . "')");
           
             $sql->execute();
             return $sql->fetchAll();
         }
    }
}