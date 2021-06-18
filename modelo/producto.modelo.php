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
    static public function listarProductosOtros()
    {
        $sql = DB::conexion()->prepare("SELECT * FROM productos where tipoproducto = 'Otro'");
        $sql->execute();
        return $sql->fetchAll();
    }
    static public function listarProductoOtrosPanel()
    {
        $sql = DB::conexion()->prepare("SELECT sum(cantidad) as cantidad FROM otros");
        $sql->execute();
        return $sql->fetchAll();
    }
    static public function listarProductoMaritimoPanel()
    {
        $sql = DB::conexion()->prepare("SELECT id FROM maritimo");
        $sql->execute();
        return $sql->fetchAll();
    }
    static public function listarProductoTerrestrePanel()
    {
        $sql = DB::conexion()->prepare("SELECT id FROM terrestre");
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
        $sql = DB::conexion()->prepare("INSERT INTO productos (nombre,cantidad,precio) VALUES (:nombre,:cantidad,:precio)");
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
    static public function EditarProducto($tabla, $datos)
    {
        $sql = DB::conexion()->prepare("UPDATE productos SET productos=:productos,tipoproducto=:tipoproducto WHERE id=:id");
        $sql->bindParam(":id", $datos["id"], PDO::PARAM_STR);
        $sql->bindParam(":productos", $datos["producto"], PDO::PARAM_STR);
        $sql->bindParam(":tipoproducto", $datos["tipoproducto"], PDO::PARAM_STR);
        if ($sql->execute()) {
            return "ok";
        } else {
            return "error";
        }
    }
}
