<?php
require_once "conexion.php";
class ModeloProductos
{
    static public function listarProducto($tabla)
    {
        $sql = DB::conexion()->prepare("SELECT * FROM $tabla");
        $sql->execute();
        return $sql->fetchAll();
    }
    static public function listarProductosPorEmpresa($id_empresa)
    {
        $sql = DB::conexion()->prepare("SELECT id, nombre FROM productos where id_empresa = '$id_empresa'");
        $sql->execute();
        return $sql->fetchAll();
    }
    static public function listarProductoOtrosPanel()
    {
        $sql = DB::conexion()->prepare("SELECT sum(cantidad) as cantidad FROM otros");
        $sql->execute();
        return $sql->fetchAll();
    }
    static public function listarProductoMaritimoPanel()//maritimo ganancias
    {
        $sql = DB::conexion()->prepare("SELECT sum(monto) as suma from ingreso_egreso where tipo = 1");
        $sql->execute();
        return $sql->fetchAll();
    }
    static public function listarProductoTerrestrePanel()
    {
        $sql = DB::conexion()->prepare("SELECT sum(monto) as suma from ingreso_egreso where tipo = 0");
        $sql->execute();
        return $sql->fetchAll();
    }
    static public function listarProductoPorTipo($tabla, $datos)
    {
        $sql = DB::conexion()->prepare("SELECT id, productos FROM $tabla where (tipoproducto = '$datos')");
        $sql->execute();
        return $sql->fetchAll();
    }
    static public function CrearProducto($datos)
    {
        $sql = DB::conexion()->prepare("INSERT INTO productos (nombre,cantidad,precio,id_empresa) VALUES (:nombre,:cantidad,:precio,:id_empresa)");
        $sql->bindParam(":id_empresa", $datos["idServicio"], PDO::PARAM_STR);
        $sql->bindParam(":nombre", $datos["producto"], PDO::PARAM_STR);
        $sql->bindParam(":cantidad", $datos["cantidad"], PDO::PARAM_STR);
        $sql->bindParam(":precio", $datos["precio"], PDO::PARAM_STR);
        if ($sql->execute()) {
            return "ok";
        } else {
            return "error";
        }
    }
    static public function EliminarProducto($id)
    {
        $sql = DB::conexion()->prepare("DELETE FROM productos WHERE id = :id");
        $sql->bindParam(":id", $id, PDO::PARAM_INT);
        if ($sql->execute()) {
            return "ok";
        } else {
            return "error";
        }
    }
    static public function EditarProducto($datos)
    {
        $sql = DB::conexion()->prepare("UPDATE productos SET nombre=:nombre, cantidad=:cantidad, precio=:precio WHERE id=:id");
        $sql->bindParam(":id", $datos["id"], PDO::PARAM_STR);
        $sql->bindParam(":nombre", $datos["producto"], PDO::PARAM_STR);
        $sql->bindParam(":cantidad", $datos["cantidad"], PDO::PARAM_STR);
        $sql->bindParam(":precio", $datos["precio"], PDO::PARAM_STR);
        if ($sql->execute()) {
            return "ok";
        } else {
            return "error";
        }
    }
}
