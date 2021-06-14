<?php
require_once "conexion.php";
class ModeloArticulos
{
    //Insertar
    static public function CrearBarcaza($datos)
    {
        $sql = DB::conexion()->prepare("INSERT INTO objetomaritimo (nombre,matricula,idcliente) VALUES (:producto,:matricula,:cliente)");
        $sql->bindParam(":cliente", $datos["cliente"], PDO::PARAM_STR);
        $sql->bindParam(":producto", $datos["producto"], PDO::PARAM_STR);
        $sql->bindParam(":matricula", $datos["matricula"], PDO::PARAM_STR);
        if ($sql->execute()) {
            return "ok";
        } else {
            return "error";
        }
    }
    //Listar
    static public function listarArticulos()
    {
        $sql = DB::conexion()->prepare("SELECT id, nombre, cantidad, precio FROM productos");
        $sql->execute();
        return $sql->fetchAll();
    }
    static public function listarCertificados2Meses()
    {
        $sql = DB::conexion()->prepare("SELECT certificados.certificado from certificados inner join servicios on certificados.id_servicio = servicios.idservicios WHERE servicios.fecha BETWEEN DATE_SUB(NOW(), INTERVAL 2 MONTH) AND NOW() ORDER BY certificados.id DESC");
        $sql->execute();
        return $sql->fetchAll();
    }
    static public function listarTodosLosCertificados()
    {
        $sql = DB::conexion()->prepare("SELECT objetomaritimo.id, clientes.nombreEmpresa, clientes.rut, objetomaritimo.nombre, objetomaritimo.matricula, clientes.id as idclient FROM clientes INNER JOIN objetomaritimo ON clientes.id = objetomaritimo.idcliente");
        $sql->execute();
        return $sql->fetchAll();
    }
    static public function listarPatenteMaritimoPorServicio($idservicio)
    {
        $sql = DB::conexion()->prepare("SELECT id_objetomaritimo FROM maritimo inner join servicios on maritimo.idservicio = servicios.idservicios where servicios.idservicios = '$idservicio'");
        $sql->execute();
        return $sql->fetchAll();
    }
    static public function listarRelacionTerrestreOtroPorServicio($idservicio)
    {
        $sql = DB::conexion()->prepare("SELECT otros.id_producto_nombre, otros.id_terrestre FROM otros inner join servicios on otros.id_servicio = servicios.idservicios where servicios.idservicios = '$idservicio'");
        $sql->execute();
        return $sql->fetchAll();
    }
    static public function listarRelacionMaritimoOtroPorServicio($idservicio)
    {
        $sql = DB::conexion()->prepare("SELECT otros.id_producto_nombre, otros.id_maritimo FROM otros inner join servicios on otros.id_servicio = servicios.idservicios where servicios.idservicios = '$idservicio'");
        $sql->execute();
        return $sql->fetchAll();
    }
    static public function listarPatenteTerrestrePorServicio($idservicio)
    {
        $sql = DB::conexion()->prepare("SELECT terrestre.matricula FROM terrestre inner join servicios on terrestre.id_servicio = servicios.idservicios where servicios.idservicios = '$idservicio'");
        $sql->execute();
        return $sql->fetchAll();
    }
    static public function listarVueltaFalsaBarcazas()
    {
        $sql = DB::conexion()->prepare("SELECT vueltafalsa FROM maritimo where vueltafalsa = 1");
        $sql->execute();
        return $sql->fetchAll();
    }
    static public function listarProductoPorTipo($tipoproducto)
    {
        $sql = DB::conexion()->prepare("SELECT id, productos FROM productos where tipoproducto = '$tipoproducto'");
        $sql->execute();
        return $sql->fetchAll();
    }

    static public function listarBarcazasPorCliente($cliente)
    {
        $sql = DB::conexion()->prepare("SELECT objetomaritimo.id, objetomaritimo.nombre, objetomaritimo.matricula FROM clientes INNER JOIN objetomaritimo ON clientes.id = objetomaritimo.idcliente where clientes.id='$cliente'");
        $sql->execute();
        return $sql->fetchAll();
    }

    //Actualizar
    static public function EditarBarcaza($datos)
    {
        $sql = DB::conexion()->prepare("UPDATE objetomaritimo SET idcliente=:cliente, nombre=:producto, matricula=:matricula WHERE id=:id");
        $sql->bindParam(":id", $datos["id"], PDO::PARAM_STR);
        $sql->bindParam(":cliente", $datos["cliente"], PDO::PARAM_STR);
        $sql->bindParam(":producto", $datos["producto"], PDO::PARAM_STR);
        $sql->bindParam(":matricula", $datos["matricula"], PDO::PARAM_STR);
        
        if ($sql->execute()) {
            return "ok";
        } else {
            return "error";
        }
    }
    //Eliminar
    static public function EliminarBarcaza($id)
    {
        $sql = DB::conexion()->prepare("DELETE FROM objetomaritimo WHERE id = :id");
        $sql->bindParam(":id", $id, PDO::PARAM_INT);
        if ($sql->execute()) {
            return "ok";
        } else {
            return "error";
        }
    }
}