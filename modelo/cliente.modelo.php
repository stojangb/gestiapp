<?php
require_once "conexion.php";
class ModeloClientes
{
    //Insertar
    static public function CrearCliente($datos)
    {
        $sql = DB::conexion()->prepare("INSERT INTO clientes(nombre_completo,direccion,telefono,detalles,correo,id_forma_pago,rut,id_banco,n_cuenta,id_tipo_cuenta) 
        VALUES (:nombreCliente,:direccion,:telefono,:detalles,:correo,:formaPago,:rut,:banco,:nCuenta,:tipoCuenta)");
        $sql->bindParam(":nombreCliente", $datos["nombreCliente"], PDO::PARAM_STR);
        $sql->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
        $sql->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
         $sql->bindParam(":detalles", $datos["detalles"], PDO::PARAM_STR);
          $sql->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
          $sql->bindParam(":formaPago", $datos["formaPago"], PDO::PARAM_STR);
        $sql->bindParam(":rut", $datos["rut"], PDO::PARAM_STR);
        $sql->bindParam(":banco", $datos["banco"], PDO::PARAM_STR);
        $sql->bindParam(":nCuenta", $datos["nCuenta"], PDO::PARAM_STR);
        $sql->bindParam(":tipoCuenta", $datos["tipoCuenta"], PDO::PARAM_STR);
        if ($sql->execute()) {
            return "ok";
        } else {
            return "error";
        }
    }

    //Listar
    static public function listarCliente()
    {
        $sql = DB::conexion()->prepare("SELECT clientes.id, nombre_completo, direccion, telefono, detalles, correo,forma_pago.nombre as forma_pago, rut, bancos.nombre as nombre_banco, n_cuenta,tipo_cuenta.nombre as tipo_cuenta FROM clientes inner join forma_pago on clientes.id_forma_pago = forma_pago.id inner join bancos on clientes.id_banco = bancos.id inner join tipo_cuenta on clientes.id_tipo_cuenta = tipo_cuenta.id");
        $sql->execute();
        return $sql->fetchAll();
    }

    static public function listarBancos()
    {
        $sql = DB::conexion()->prepare("SELECT id, nombre FROM bancos");
        $sql->execute();
        return $sql->fetchAll();
    }
    static public function listarFormaPago()
    {
        $sql = DB::conexion()->prepare("SELECT id, nombre FROM forma_pago");
        $sql->execute();
        return $sql->fetchAll();
    }
    static public function listarTipoCuenta()
    {
        $sql = DB::conexion()->prepare("SELECT id, nombre FROM tipo_cuenta");
        $sql->execute();
        return $sql->fetchAll();
    }



    static public function listarClienteYRut($id)
    {
        $sql = DB::conexion()->prepare("SELECT nombreEmpresa, rut FROM clientes where id='$id'");
        $sql->execute();
        return $sql->fetchAll();
    }

    //Editar

    static public function EditarCliente($datos)
    {
        $sql = DB::conexion()->prepare("UPDATE clientes SET nombreContacto=:nombreContacto,nombreEmpresa=:nombreEmpresa, correo=:correo, rut=:rut, telefono=:telefono, detalles=:detalles WHERE id=:id");
        $sql->bindParam(":id", $datos["id"], PDO::PARAM_STR);
        $sql->bindParam(":nombreContacto", $datos["nombreContacto"], PDO::PARAM_STR);
        $sql->bindParam(":nombreEmpresa", $datos["nombreEmpresa"], PDO::PARAM_STR);
        $sql->bindParam(":rut", $datos["rut"], PDO::PARAM_STR);
        $sql->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
        $sql->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
        $sql->bindParam(":detalles", $datos["detalles"], PDO::PARAM_STR);
        if ($sql->execute()) {
            return "ok";
        } else {
            return "error";
        }
    }

    //Eliminar
    static public function Eliminarcliente($id_tabla)
    {
        $sql = DB::conexion()->prepare("DELETE FROM clientes WHERE id = :id");
        $sql->bindParam(":id", $id_tabla, PDO::PARAM_INT);
        echo ("sss");
        if ($sql->execute()) {
            return "ok";
        } else {
            return "error";
        }
    }

}
