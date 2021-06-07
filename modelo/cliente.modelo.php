<?php
require_once "conexion.php";
class ModeloClientes
{

    //Insertar
    static public function CrearCliente($tabla, $datos)
    {
        $sql = DB::conexion()->prepare("INSERT INTO $tabla (nombreContacto,nombreEmpresa,rut,correo,telefono,detalles) VALUES (:nombreContacto,:nombreEmpresa,:rut,:correo,:telefono,:detalles)");
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

    //Listar
    static public function listarCliente()
    {
        $sql = DB::conexion()->prepare("SELECT * FROM clientes");
        $sql->execute();
        return $sql->fetchAll();
    }
    static public function listarClienteYRut($tabla, $id)
    {
        $sql = DB::conexion()->prepare("SELECT nombreEmpresa, rut FROM $tabla where id='$id'");
        $sql->execute();
        return $sql->fetchAll();
    }

    //Editar

    static public function EditarCliente($tabla, $datos)
    {
        $sql = DB::conexion()->prepare("UPDATE $tabla SET nombreContacto=:nombreContacto,nombreEmpresa=:nombreEmpresa, correo=:correo, rut=:rut, telefono=:telefono, detalles=:detalles WHERE id=:id");
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
    static public function Eliminarcliente($tabla, $id_tabla)
    {
        $sql = DB::conexion()->prepare("DELETE FROM $tabla WHERE id = :id");
        $sql->bindParam(":id", $id_tabla, PDO::PARAM_INT);
        echo ("sss");
        if ($sql->execute()) {
            return "ok";
        } else {
            return "error";
        }
    }

}
