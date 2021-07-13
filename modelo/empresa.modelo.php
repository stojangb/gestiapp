<?php
require_once "conexion.php";
class ModeloEmpresas
{
    //Insertar
    static public function InsertarMaritimo($datos)
    {
        $sql = DB::conexion()->prepare("INSERT INTO maritimo (id_objetomaritimo,vueltafalsa,idservicio) VALUES (:nombre,:vueltafalsa,:idservicio)");
        $sql->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $sql->bindParam(":vueltafalsa", $datos["vueltafalsa"], PDO::PARAM_STR);
        $sql->bindParam(":idservicio", $datos["idservicio"], PDO::PARAM_STR);
        $sql->execute();

        $sqle = DB::conexion()->prepare("SELECT id FROM maritimo order by id desc limit 1");
        $sqle->execute();
        foreach ($sqle as $key => $value) {
            $id_maritimo = $value["id"];
        }

        $sql11 = DB::conexion()->prepare("INSERT INTO certificados (certificado, id_terrestre,id_maritimo,id_servicio) VALUES (:certificado,NULL,'$id_maritimo',:idservicio)");
        $sql11->bindParam(":certificado", $datos["certificado"], PDO::PARAM_STR);
        $sql11->bindParam(":idservicio", $datos["idservicio"], PDO::PARAM_STR);
        $sql11->execute();

        //Obteniendo último valor insertado...
        $contarTipoTrabajo = count($datos["tipotrabajomaritimo"]);
        if ($contarTipoTrabajo >= 1) {
            for ($i = 0; $i < $contarTipoTrabajo; $i++) {
                $tipoTrabajoMaritimo = $datos["tipotrabajomaritimo"][$i];
                //var_dump($tipoTrabajoMaritimo);
                $sql1 = DB::conexion()->prepare("INSERT INTO trabajo (id_tipotrabajo,id_maritimo,id_terrestre,id_servicio) VALUES ('$tipoTrabajoMaritimo','$id_maritimo',null,:idservicio)");
                $sql1->bindParam(":idservicio", $datos["idservicio"], PDO::PARAM_STR);
                $sql1->execute();
            }
        }
    }

    static public function EditarMaritimo($datos)
    {
        $sql = DB::conexion()->prepare("UPDATE maritimo SET id_objetomaritimo=:nombre, vueltafalsa=:vueltafalsa WHERE id=:idMaritimo");
        $sql->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $sql->bindParam(":vueltafalsa", $datos["vueltafalsa"], PDO::PARAM_STR);
        $sql->bindParam(":idMaritimo", $datos["idMaritimo"], PDO::PARAM_STR);
        $sql->execute();

        $sql3 = DB::conexion()->prepare("UPDATE certificados SET certificado=:certificado WHERE id_maritimo=:idMaritimo");
        $sql3->bindParam(":certificado", $datos["certificado"], PDO::PARAM_STR);
        $sql3->bindParam(":idMaritimo", $datos["idMaritimo"], PDO::PARAM_STR);
        $sql3->execute();

        $sql2 = DB::conexion()->prepare("DELETE FROM trabajo WHERE id_maritimo = :idMaritimo");
        $sql2->bindParam(":idMaritimo", $datos["idMaritimo"], PDO::PARAM_STR);
        $sql2->execute();

        $contarTipoTrabajo = count($datos["tipotrabajomaritimo"]);
        if ($contarTipoTrabajo >= 1) {
            for ($i = 0; $i < $contarTipoTrabajo; $i++) {
                $tipoTrabajoMaritimo = $datos["tipotrabajomaritimo"][$i];

                $sql3 = DB::conexion()->prepare("INSERT INTO trabajo (id_tipotrabajo,id_maritimo,id_terrestre,id_servicio) VALUES ('$tipoTrabajoMaritimo',:idMaritimo,null,:idservicio)");
                $sql3->bindParam(":idservicio", $datos["idservicio"], PDO::PARAM_STR);
                $sql3->bindParam(":idMaritimo", $datos["idMaritimo"], PDO::PARAM_STR);
                $sql3->execute();
            }
        }
    }

    static public function InsertarVenta($datos)
    {
        $sql = DB::conexion()->prepare("INSERT INTO ventas(fecha, id_cliente, id_empresas_usuario) VALUES (:fecha,:id_cliente,:id_empresas_usuario)");
        $sql->bindParam(":fecha", $datos["fecha_hora_venta"], PDO::PARAM_STR);
        $sql->bindParam(":id_cliente", $datos["idClienteVenta"], PDO::PARAM_STR);
        $sql->bindParam(":id_empresas_usuario", $datos["idEmpresa"], PDO::PARAM_STR);
        $sql->execute();
    }

    static public function insertarDetalleVenta($datos)
    {
        $sql = DB::conexion()->prepare("INSERT INTO detalle_ventas(nombre, precio, id_venta, id_producto_elegido) VALUES (:nombre,:precio,:id_venta,:id_producto_elegido);
        
        
        update productos set cantidad = cantidad - 1 where id = :id_producto_elegido;
        
        
        
        ");
        $sql->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $sql->bindParam(":precio", $datos["precio"], PDO::PARAM_STR);
        $sql->bindParam(":id_venta", $datos["idventaactual"], PDO::PARAM_STR);
        $sql->bindParam(":id_producto_elegido", $datos["productoElegido"], PDO::PARAM_STR);
        $sql->execute();
    }

    static public function EditarVenta($datos)
    {
        $sql = DB::conexion()->prepare("UPDATE ventas SET fecha=:fecha, id_cliente=:id_cliente  WHERE id=:id");
        $sql->bindParam(":fecha", $datos["fecha_hora_venta"], PDO::PARAM_STR);
        $sql->bindParam(":id_cliente", $datos["idClienteVenta"], PDO::PARAM_STR);
        $sql->bindParam(":id", $datos["idEmpresa"], PDO::PARAM_STR);;
        $sql->execute();
    }

    static public function InsertarIngresoEgreso($datos)
    {
        $sql = DB::conexion()->prepare("INSERT INTO ingreso_egreso(nombre, tipo, id_empresa, monto) VALUES (:nombre, :tipo, :id_empresa, :monto)");
        $sql->bindParam(":nombre", $datos["nombreIngresoEgreso"], PDO::PARAM_STR);
        $sql->bindParam(":tipo", $datos["idTipo3"], PDO::PARAM_STR);
        $sql->bindParam(":id_empresa", $datos["id_empresa"], PDO::PARAM_STR);
        $sql->bindParam(":monto", $datos["monto3"], PDO::PARAM_STR);
        $sql->execute();
    }

    static public function EditarIngresoEgreso($datos)
    {
        $sql = DB::conexion()->prepare("UPDATE ingreso_egreso SET nombre = :nombre, tipo=:tipo, monto=:monto WHERE id=:id");
        $sql->bindParam(":nombre", $datos["nombreIngresoEgreso"], PDO::PARAM_STR);
        $sql->bindParam(":tipo", $datos["idTipo3"], PDO::PARAM_STR);
        $sql->bindParam(":id", $datos["idIngresoEgreso"], PDO::PARAM_STR);
        $sql->bindParam(":monto", $datos["monto3"], PDO::PARAM_STR);
        $sql->execute();
    }

    static public function CrearEmpresa($datos)
    {
        $sql1 = DB::conexion()->prepare("INSERT INTO empresas_usuario (nombre_abreviado, razon_social, rut,giro) VALUES (:nombre_abreviado, :razon_social, :rut,:giro)");
        $sql1->bindParam(":nombre_abreviado", $datos["nombre"], PDO::PARAM_STR);
        $sql1->bindParam(":razon_social", $datos["razonSocial"], PDO::PARAM_STR);
        $sql1->bindParam(":rut", $datos["rut"], PDO::PARAM_STR);
        $sql1->bindParam(":giro", $datos["giro"], PDO::PARAM_STR);
        $sql1->execute();
    }

    //Listar
    static public function listarEmpresa()
    {
        $sql = DB::conexion()->prepare("SELECT id, nombre_abreviado, razon_social, rut, giro FROM empresas_usuario order by id desc");
        $sql->execute();
        return $sql->fetchAll();
    }
    static public function listarNumeroVentas()
    {
        $sql = DB::conexion()->prepare("SELECT id FROM ventas order by id desc");
        $sql->execute();
        return $sql->fetchAll();
    }

    static public function listarServicioPorAñoPanel()
    {
        $sql = DB::conexion()->prepare("SELECT COUNT(id) AS Total, MONTHNAME(ventas.fecha) AS Mes FROM ventas where year(ventas.fecha) = YEAR(NOW()) GROUP BY Mes");
        $sql->execute();
        return $sql->fetchAll();
    }

    static public function listarVentaPorIdVenta($id)
    {
        $sql = DB::conexion()->prepare("SELECT ventas.id, fecha, id_cliente, clientes.nombre_completo as nombre_cliente FROM ventas inner join clientes on ventas.id_cliente = clientes.id  WHERE ventas.id ='$id'");
        $sql->execute();
        return $sql->fetchAll();
    }

    static public function listarVentasDetalle($id)
    {
        $sql = DB::conexion()->prepare("SELECT detalle_ventas.id, nombre, precio FROM detalle_ventas inner join ventas on ventas.id = detalle_ventas.id_venta  WHERE ventas.id ='$id'");
        $sql->execute();
        return $sql->fetchAll();
    }

    static public function listarBusquedaCertificado($certificado)
    {
        $sql = DB::conexion()->prepare("SELECT servicios.idservicios,clientes.nombreEmpresa, clientes.rut, certificados.certificado, servicios.fecha, productos.productos, terrestre.matricula, terrestre.id as vueltafalsa FROM terrestre inner join productos on terrestre.id_producto_nombre = productos.id inner join servicios on terrestre.id_servicio = servicios.idservicios inner join certificados on terrestre.id = certificados.id_terrestre inner join servicio_cliente on servicios.idservicios = servicio_cliente.idservicio inner join clientes on servicio_cliente.idcliente = clientes.id where certificados.certificado = '$certificado'
        UNION 
                                        SELECT  servicios.idservicios,clientes.nombreEmpresa, clientes.rut, certificados.certificado, servicios.fecha, objetomaritimo.nombre, objetomaritimo.matricula, maritimo.vueltafalsa FROM maritimo inner join objetomaritimo on maritimo.id_objetomaritimo = objetomaritimo.id inner join servicios on maritimo.idservicio = servicios.idservicios inner join certificados on maritimo.id = certificados.id_maritimo inner join servicio_cliente on servicios.idservicios = servicio_cliente.idservicio inner join clientes on servicio_cliente.idcliente = clientes.id where certificados.certificado = '$certificado'");
        $sql->execute();
        return $sql->fetchAll();
    }

    static public function ConsultarCantidadYPrecioDeProductos($id)
    {
        $sql = DB::conexion()->prepare("SELECT cantidad, precio, nombre from productos where id = '$id'");
        $sql->execute();
        return $sql->fetchAll();
    }

    static public function listarIdServicioPorClienteYFechas($fecha1, $fecha2, $cliente)
    {
        $sql = DB::conexion()->prepare("SELECT servicios.idservicios FROM servicios inner join servicio_cliente on servicios.idservicios = servicio_cliente.idservicio where fecha between '$fecha1' and '$fecha2' and servicio_cliente.idcliente = '$cliente' ");
        $sql->execute();
        return $sql->fetchAll();
    }

    static public function listarMaritimosPorIdServicio($IDServicios)
    {
        $array = array_map('intval', explode(',', $IDServicios));
        $array1 = implode("','", $array);
        //Liberar Array...
        $sql = DB::conexion()->prepare("SELECT certificados.certificado, servicios.fecha, objetomaritimo.nombre, objetomaritimo.matricula, maritimo.vueltafalsa FROM maritimo inner join servicios on maritimo.idservicio = servicios.idservicios inner join certificados on maritimo.id = certificados.id_maritimo inner join objetomaritimo on maritimo.id_objetomaritimo = objetomaritimo.id where maritimo.idservicio IN ('" . $array1 . "')");
        $sql->execute();
        return $sql->fetchAll();
    }

    static public function listarOtrosDeMaritimosPorIdServicio($IDServicios)
    {
        $array = array_map('intval', explode(',', $IDServicios));
        $array1 = implode("','", $array);
        //Liberar Array...
        $sql = DB::conexion()->prepare("SELECT certificados.certificado, objetomaritimo.matricula, productos.productos, otros.cantidad FROM maritimo inner join servicios on maritimo.idservicio = servicios.idservicios inner join objetomaritimo on maritimo.id_objetomaritimo = objetomaritimo.id inner join otros on maritimo.id = otros.id_maritimo inner join productos on otros.id_producto_nombre = productos.id inner join certificados on maritimo.id = certificados.id_maritimo where maritimo.idservicio IN ('" . $array1 . "')");
        $sql->execute();
        return $sql->fetchAll();
    }

    static public function listarOtrosDeTerrestrePorIdServicio($IDServicios)
    {
        $array = array_map('intval', explode(',', $IDServicios));
        $array1 = implode("','", $array);
        //Liberar Array...
        $sql = DB::conexion()->prepare("SELECT certificados.certificado, terrestre.matricula, productos.productos, otros.cantidad FROM terrestre inner join servicios on terrestre.id_servicio = servicios.idservicios inner join certificados on terrestre.id = certificados.id_terrestre inner join otros on terrestre.id = otros.id_terrestre inner join productos on otros.id_producto_nombre = productos.id where terrestre.id_servicio IN ('" . $array1 . "')");
        $sql->execute();
        return $sql->fetchAll();
    }

    static public function listarTiposDeTrabajoPorIdServicio($IDServicios)
    {
        $array = array_map('intval', explode(',', $IDServicios));
        $array1 = implode("','", $array);
        //Liberar Array...
        $sql = DB::conexion()->prepare("SELECT certificados.certificado, tipotrabajo.tipotrabajo from trabajo INNER JOIN tipotrabajo on trabajo.id_tipotrabajo = tipotrabajo.id INNER join terrestre on trabajo.id_terrestre = terrestre.id INNER join certificados on terrestre.id = certificados.id_terrestre inner join servicios on trabajo.id_servicio = servicios.idservicios where servicios.idservicios IN ('" . $array1 . "')
        UNION
        SELECT certificados.certificado, tipotrabajo.tipotrabajo from trabajo INNER JOIN tipotrabajo on trabajo.id_tipotrabajo = tipotrabajo.id inner join servicios on trabajo.id_servicio = servicios.idservicios inner join maritimo on trabajo.id_maritimo = maritimo.id INNER JOIN certificados on maritimo.id = certificados.id_maritimo where servicios.idservicios IN ('" . $array1 . "')");
        $sql->execute();
        return $sql->fetchAll();
    }

    static public function listarTerrestrePorIdServicio($IDServicios)
    {
        $array = array_map('intval', explode(',', $IDServicios));
        $array1 = implode("','", $array);
        //Liberar Array...
        $sql = DB::conexion()->prepare("SELECT certificados.certificado, servicios.fecha, productos.productos, terrestre.matricula FROM terrestre inner join servicios on terrestre.id_servicio = servicios.idservicios inner join certificados on terrestre.id = certificados.id_terrestre inner join productos on terrestre.id_producto_nombre = productos.id where terrestre.id_servicio IN ('" . $array1 . "')");
        $sql->execute();
        return $sql->fetchAll();
    }

    static public function listarObjetos($IDServicios)
    {
        $array = array_map('intval', explode(',', $IDServicios));
        $array1 = implode("','", $array);
        $sql = DB::conexion()->prepare("SELECT productos.productos FROM otros inner join servicios on otros.id_servicio = servicios.idservicios inner join productos on otros.id_producto_nombre = productos.id where servicios.idservicios in ('" . $array1 . "')");
        $sql->execute();
        return $sql->fetchAll();
    }

    static public function listarTiposDeTrabajo($IDServicios)
    {
        $array = array_map('intval', explode(',', $IDServicios));
        $array1 = implode("','", $array);
        $sql = DB::conexion()->prepare("SELECT tipotrabajo.tipotrabajo FROM trabajo inner join tipotrabajo on trabajo.id_tipotrabajo = tipotrabajo.id where trabajo.id_servicio in ('" . $array1 . "')");
        $sql->execute();
        return $sql->fetchAll();
    }

    static public function listarTerrestreSelect($id)
    {
        $sql = DB::conexion()->prepare("SELECT terrestre.id, productos.productos, terrestre.matricula, certificados.certificado FROM terrestre inner join productos on terrestre.id_producto_nombre = productos.id inner join certificados on terrestre.id = certificados.id_terrestre WHERE terrestre.id_servicio='$id'");
        $sql->execute();
        return $sql->fetchAll();
    }

    static public function listarServicioUnico($id)
    {
        $sql = DB::conexion()->prepare("SELECT id, rut, giro, nombre_abreviado, razon_social FROM empresas_usuario WHERE id ='$id'");
        $sql->execute();
        return $sql->fetchAll();
    }

    static public function listarMaritimo($id)
    {
        $sql = DB::conexion()->prepare("SELECT objetomaritimo.nombre, objetomaritimo.matricula, certificados.certificado, maritimo.id, maritimo.vueltafalsa, objetomaritimo.id as objmarid FROM objetomaritimo inner join maritimo on objetomaritimo.id = maritimo.id_objetomaritimo inner join certificados on maritimo.id = certificados.id_maritimo WHERE idservicio='$id'");
        $sql->execute();
        return $sql->fetchAll();
    }

    static public function listarVentas($id)
    {
        $sql = DB::conexion()->prepare("SELECT ventas.id, fecha, id_cliente, clientes.nombre_completo as nombre_cliente FROM ventas inner join clientes on ventas.id_cliente = clientes.id  WHERE id_empresas_usuario='$id'");
        $sql->execute();
        return $sql->fetchAll();
    }

    static public function listarIngresoEgreso($id)
    {
        $sql = DB::conexion()->prepare("SELECT id, nombre, tipo, id_empresa, monto FROM ingreso_egreso WHERE id_empresa='$id'");
        $sql->execute();
        return $sql->fetchAll();
    }

    static public function listarFecha($fecha1, $fecha2)
    {
        $sql = DB::conexion()->prepare("SELECT * FROM servicios where fecha between '$fecha1' and '$fecha2'");
        $sql->execute();
        return $sql->fetchAll();
    }

    static public function listarCliente($id)
    {
        $sql = DB::conexion()->prepare("SELECT nombreEmpresa, rut, clientes.id FROM servicio_cliente inner join  clientes on servicio_cliente.idcliente = clientes.id  and  servicio_cliente.idservicio = '$id'");
        $sql->execute();
        return $sql->fetchAll();
    }

    static public function listarTipoDeTrabajoPorIdPadre($id)
    {
        $sql = DB::conexion()->prepare("SELECT tipotrabajo.tipotrabajo, tipotrabajo.id FROM tipotrabajo inner join trabajo on tipotrabajo.id = trabajo.id_tipotrabajo where trabajo.id_maritimo = '$id'");
        $sql->execute();
        return $sql->fetchAll();
    }
    static public function listarTipoDeTrabajoPorIdPadreTerrestre($id)
    {
        $sql = DB::conexion()->prepare("SELECT tipotrabajo.tipotrabajo, tipotrabajo.id FROM tipotrabajo inner join trabajo on tipotrabajo.id = trabajo.id_tipotrabajo where trabajo.id_terrestre = '$id'");
        $sql->execute();
        return $sql->fetchAll();
    }

    static public function listarTipoDeTrabajoPorIdTerrestre($id)
    {
        $sql = DB::conexion()->prepare("SELECT tipotrabajo.tipotrabajo FROM tipotrabajo inner join trabajo on tipotrabajo.id = trabajo.id_tipotrabajo where trabajo.id_terrestre = '$id'");
        $sql->execute();
        return $sql->fetchAll();
    }

    static public function listarRelacionTerrestre($id)
    {
        $sql = DB::conexion()->prepare("SELECT objetomaritimo.nombre, objetomaritimo.matricula FROM maritimo inner join objetomaritimo on maritimo.id_objetomaritimo = objetomaritimo.id left join  terrestre on maritimo.id = terrestre.id_maritimo  where  terrestre.id = '$id'");
        $sql->execute();
        return $sql->fetchAll();
    }

    static public function listarRelacionOtrosMaritimo($id)
    {
        $sql = DB::conexion()->prepare("SELECT objetomaritimo.nombre, objetomaritimo.matricula FROM maritimo inner join objetomaritimo on maritimo.id_objetomaritimo = objetomaritimo.id left join  otros on maritimo.id = otros.id_maritimo  where  otros.id = '$id'");
        $sql->execute();
        return $sql->fetchAll();
    }

    static public function listarRelacionOtrosTerrestre($id)
    {
        $sql = DB::conexion()->prepare("SELECT productos.productos, terrestre.matricula FROM terrestre left join  otros on terrestre.id = otros.id_terrestre inner join productos on terrestre.id_producto_nombre = productos.id  where  otros.id = '$id'");
        $sql->execute();
        return $sql->fetchAll();
    }

    static public function listarTipoDeTrabajoPorIdOtros($id)
    {
        $sql = DB::conexion()->prepare("SELECT tipotrabajo, precio FROM trabajo where id_otros= '$id'");
        $sql->execute();
        return $sql->fetchAll();
    }

    static public function consultaFecha($id)
    {
        $sql = DB::conexion()->prepare("SELECT * FROM servicios where idservicios='$id'");
        $sql->execute();
        return $sql->fetchAll();
    }

    //Actualizar 
    static public function EditarEmpresa($datos)
    {
        $sql = DB::conexion()->prepare("UPDATE empresas_usuario SET nombre_abreviado=:nombre_abreviado, razon_social=:razon_social, rut=:rut, giro=:giro WHERE id=:id");
        $sql->bindParam(":id", $datos["id"], PDO::PARAM_STR);
        $sql->bindParam(":nombre_abreviado", $datos["nombre"], PDO::PARAM_STR);
        $sql->bindParam(":razon_social", $datos["razonSocial"], PDO::PARAM_STR);
        $sql->bindParam(":rut", $datos["rut"], PDO::PARAM_STR);
        $sql->bindParam(":giro", $datos["giro"], PDO::PARAM_STR);

        if ($sql->execute()) {
            return "ok";
        } else {
            return "error";
        }
    }

    //Borrar
    static public function EliminarEmpresa($id)
    {

/*         //Tengo que obtener todos los otros, maritimos y terrestres del servicio y borrarlos y luego borrar el servicio.
        $sql2 = DB::conexion()->prepare("DELETE FROM otros WHERE id_servicio = :id");
        $sql2->bindParam(":id", $id_tabla, PDO::PARAM_INT);
        $sql2->execute();

        $sql3 = DB::conexion()->prepare("DELETE FROM terrestre WHERE id_servicio = :id");
        $sql3->bindParam(":id", $id_tabla, PDO::PARAM_INT);
        $sql3->execute();

        $sql1 = DB::conexion()->prepare("DELETE FROM maritimo WHERE idservicio = :id");
        $sql1->bindParam(":id", $id_tabla, PDO::PARAM_INT);
        $sql1->execute(); */

        $sql = DB::conexion()->prepare("DELETE FROM empresas_usuario WHERE id = :id");
        $sql->bindParam(":id", $id, PDO::PARAM_INT);
        if ($sql->execute()) {
            return "ok";
        } else {
            return "error";
        }
    }
    static public function EliminarMaritimo($id_tabla)
    {
        $sql = DB::conexion()->prepare("DELETE FROM maritimo WHERE id = :id");
        $sql->bindParam(":id", $id_tabla, PDO::PARAM_INT);
        if ($sql->execute()) {
            return "ok";
        } else {
            return "error";
        }
    }
    static public function EliminarVenta($id_tabla)
    {
        $sql = DB::conexion()->prepare("DELETE FROM ventas WHERE id = :id");
        $sql->bindParam(":id", $id_tabla, PDO::PARAM_INT);
        if ($sql->execute()) {
            return "ok";
        } else {
            return "error";
        }
    }
    static public function EliminarIngresoEgreso($id_tabla)
    {
        $sql = DB::conexion()->prepare("DELETE FROM ingreso_egreso WHERE id = :id");
        $sql->bindParam(":id", $id_tabla, PDO::PARAM_INT);
        if ($sql->execute()) {
            return "ok";
        } else {
            return "error";
        }
    }
    static public function eliminarProductoDeDetalle($id_tabla)
    {
        $sql = DB::conexion()->prepare("update productos inner join detalle_ventas on productos.id = detalle_ventas.id_producto_elegido set cantidad = cantidad + 1 where detalle_ventas.id = $id_tabla; DELETE FROM detalle_ventas WHERE id = :id;");
        $sql->bindParam(":id", $id_tabla, PDO::PARAM_INT);
        if ($sql->execute()) {
            return "ok";
        } else {
            return "error";
        }
    }
} 

