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

    static public function InsertarTerrestre($datos)
    {
        $sql = DB::conexion()->prepare("INSERT INTO terrestre (matricula,id_producto_nombre,id_servicio,id_maritimo) VALUES (:matricula,:nombre,:idservicio,:idmaritimo)");
        $sql->bindParam(":matricula", $datos["matricula"], PDO::PARAM_STR);
        $sql->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $sql->bindParam(":idservicio", $datos["idservicio"], PDO::PARAM_STR);
        $sql->bindParam(":idmaritimo", $datos["idmaritimo"], PDO::PARAM_STR);
        $sql->execute();

        //Obteniendo último valor insertado...
        $sqle = DB::conexion()->prepare("SELECT id FROM terrestre order by id desc limit 1");
        $sqle->execute();
        foreach ($sqle as $key => $value) {
            $id_terrestre = $value["id"];
        }

        $sql11 = DB::conexion()->prepare("INSERT INTO certificados (certificado, id_terrestre,id_maritimo,id_servicio) VALUES (:certificado,'$id_terrestre',NULL,:idservicio)");
        $sql11->bindParam(":certificado", $datos["certificado"], PDO::PARAM_STR);
        $sql11->bindParam(":idservicio", $datos["idservicio"], PDO::PARAM_STR);
        $sql11->execute();

        $contarTipoTrabajoTerrestre = count($datos["tipotrabajoterrestre"]);
        if ($contarTipoTrabajoTerrestre >= 1) {
            for ($i = 0; $i < $contarTipoTrabajoTerrestre; $i++) {
                $tipoTrabajoTerrestre = $datos["tipotrabajoterrestre"][$i];
                var_dump($tipoTrabajoTerrestre);
                $sql1 = DB::conexion()->prepare("INSERT INTO trabajo (id_tipotrabajo,id_maritimo,id_terrestre,id_servicio) VALUES ('$tipoTrabajoTerrestre',null,'$id_terrestre',:idservicio)");
                $sql1->bindParam(":idservicio", $datos["idservicio"], PDO::PARAM_STR);
                $sql1->execute();
            }
        }
    }

    static public function EditarTerrestre($datos)
    {
        $sql = DB::conexion()->prepare("UPDATE terrestre SET id_producto_nombre=:nombre, matricula=:matricula, id_maritimo=:idmaritimo WHERE id=:idTerrestre");
        $sql->bindParam(":matricula", $datos["matricula"], PDO::PARAM_STR);
        $sql->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $sql->bindParam(":idmaritimo", $datos["idmaritimo"], PDO::PARAM_STR);
        $sql->bindParam(":idTerrestre", $datos["idTerrestre"], PDO::PARAM_STR);
        $sql->execute();

        $sql3 = DB::conexion()->prepare("UPDATE certificados SET certificado=:certificado WHERE id_terrestre=:idTerrestre");
        $sql3->bindParam(":certificado", $datos["certificado"], PDO::PARAM_STR);
        $sql3->bindParam(":idTerrestre", $datos["idTerrestre"], PDO::PARAM_STR);
        $sql3->execute();

        //Borrando datos
        $sql2 = DB::conexion()->prepare("DELETE FROM trabajo WHERE id_terrestre = :idTerrestre");
        $sql2->bindParam(":idTerrestre", $datos["idTerrestre"], PDO::PARAM_STR);
        $sql2->execute();

        $contarTipoTrabajoTerrestre = count($datos["tipotrabajoterrestre"]);
        if ($contarTipoTrabajoTerrestre >= 1) {
            for ($i = 0; $i < $contarTipoTrabajoTerrestre; $i++) {
                $tipoTrabajoTerrestre = $datos["tipotrabajoterrestre"][$i];
                $sql1 = DB::conexion()->prepare("INSERT INTO trabajo (id_tipotrabajo,id_maritimo,id_terrestre,id_servicio) VALUES ('$tipoTrabajoTerrestre',null,:idTerrestre,:idservicio)");
                $sql1->bindParam(":idservicio", $datos["idservicio"], PDO::PARAM_STR);
                $sql1->bindParam(":idTerrestre", $datos["idTerrestre"], PDO::PARAM_STR);
                $sql1->execute();
            }
        }
    }

    static public function InsertarOtro($datos)
    {
        $sql = DB::conexion()->prepare("INSERT INTO otros (id_producto_nombre,cantidad,id_servicio,id_maritimo,id_terrestre) VALUES (:nombre,:cantidad,:idservicio,:idmaritimo,:idterrestre)");
        $sql->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $sql->bindParam(":cantidad", $datos["cantidad"], PDO::PARAM_STR);
        $sql->bindParam(":idservicio", $datos["idservicio"], PDO::PARAM_STR);
        $sql->bindParam(":idmaritimo", $datos["idmaritimo"], PDO::PARAM_STR);
        $sql->bindParam(":idterrestre", $datos["idterrestre"], PDO::PARAM_STR);
        $sql->execute();
    }

    static public function EditarOtro($datos)
    {
        $sql = DB::conexion()->prepare("UPDATE otros SET id_producto_nombre=:nombre, cantidad=:cantidad, id_maritimo=:idmaritimo, id_terrestre=:idterrestre WHERE id=:idOtro");
        $sql->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $sql->bindParam(":cantidad", $datos["cantidad"], PDO::PARAM_STR);
        $sql->bindParam(":idmaritimo", $datos["idmaritimo"], PDO::PARAM_STR);
        $sql->bindParam(":idterrestre", $datos["idterrestre"], PDO::PARAM_STR);
        $sql->bindParam(":idOtro", $datos["idOtro"], PDO::PARAM_STR);
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

    static public function listarServicioPorAñoPanel()
    {
        $sql = DB::conexion()->prepare("SELECT COUNT(idservicios) AS Total, MONTHNAME(servicios.fecha) AS Mes FROM servicios where year(servicios.fecha) = YEAR(NOW()) GROUP BY Mes");
        $sql->execute();
        return $sql->fetchAll();
    }

    static public function listarMaritimoSelect($id)
    {
        $sql = DB::conexion()->prepare("SELECT maritimo.id, objetomaritimo.nombre, objetomaritimo.matricula, certificados.certificado FROM maritimo inner join objetomaritimo on maritimo.id_objetomaritimo = objetomaritimo.id inner join certificados on maritimo.id = certificados.id_maritimo  WHERE idservicio='$id' and maritimo.vueltafalsa = 0");
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

    static public function listarBusquedaMatricula($matricula)
    {
        $sql = DB::conexion()->prepare("SELECT servicios.idservicios,clientes.nombreEmpresa, clientes.rut, certificados.certificado, servicios.fecha, productos.productos, terrestre.matricula, terrestre.id as vueltafalsa FROM terrestre inner join productos on terrestre.id_producto_nombre = productos.id inner join servicios on terrestre.id_servicio = servicios.idservicios inner join certificados on terrestre.id = certificados.id_terrestre inner join servicio_cliente on servicios.idservicios = servicio_cliente.idservicio inner join clientes on servicio_cliente.idcliente = clientes.id where terrestre.matricula = '$matricula'
        UNION 
                                        SELECT  servicios.idservicios,clientes.nombreEmpresa, clientes.rut, certificados.certificado, servicios.fecha, objetomaritimo.nombre, objetomaritimo.matricula, maritimo.vueltafalsa FROM maritimo inner join objetomaritimo on maritimo.id_objetomaritimo = objetomaritimo.id inner join servicios on maritimo.idservicio = servicios.idservicios inner join certificados on maritimo.id = certificados.id_maritimo inner join servicio_cliente on servicios.idservicios = servicio_cliente.idservicio inner join clientes on servicio_cliente.idcliente = clientes.id where objetomaritimo.matricula = '$matricula'");
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
        $sql = DB::conexion()->prepare("SELECT idservicios, detalles, fecha FROM servicios WHERE idservicios='$id'");
        $sql->execute();
        return $sql->fetchAll();
    }

    static public function listarMaritimo($id)
    {
        $sql = DB::conexion()->prepare("SELECT objetomaritimo.nombre, objetomaritimo.matricula, certificados.certificado, maritimo.id, maritimo.vueltafalsa, objetomaritimo.id as objmarid FROM objetomaritimo inner join maritimo on objetomaritimo.id = maritimo.id_objetomaritimo inner join certificados on maritimo.id = certificados.id_maritimo WHERE idservicio='$id'");
        $sql->execute();
        return $sql->fetchAll();
    }

    static public function listarTerrestre($id)
    {
        $sql = DB::conexion()->prepare("SELECT certificados.certificado, terrestre.matricula, productos.productos, terrestre.id, terrestre.id_producto_nombre, terrestre.id_maritimo FROM terrestre inner join productos on terrestre.id_producto_nombre = productos.id inner join certificados on terrestre.id = certificados.id_terrestre WHERE terrestre.id_servicio='$id'");
        $sql->execute();
        return $sql->fetchAll();
    }

    static public function listarOtro($id)
    {
        $sql = DB::conexion()->prepare("SELECT productos.productos, otros.id, otros.cantidad, otros.id_producto_nombre, otros.id_maritimo, otros.id_terrestre FROM otros inner join productos on otros.id_producto_nombre = productos.id WHERE id_servicio='$id'");
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
    static public function EditarServicio($datos)
    {
        $sql = DB::conexion()->prepare("UPDATE servicios SET detalles=:detalles, fecha=:fecha WHERE idservicios=:id");
        $sql->bindParam(":id", $datos["id"], PDO::PARAM_STR);
        $sql->bindParam(":detalles", $datos["detalles"], PDO::PARAM_STR);
        $sql->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);

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
    static public function EliminarTerrestre($id_tabla)
    {
        $sql = DB::conexion()->prepare("DELETE FROM terrestre WHERE id = :id");
        $sql->bindParam(":id", $id_tabla, PDO::PARAM_INT);
        if ($sql->execute()) {
            return "ok";
        } else {
            return "error";
        }
    }
    static public function EliminarOtros($id_tabla)
    {
        $sql = DB::conexion()->prepare("DELETE FROM otros WHERE id = :id");
        $sql->bindParam(":id", $id_tabla, PDO::PARAM_INT);
        if ($sql->execute()) {
            return "ok";
        } else {
            return "error";
        }
    }
}
