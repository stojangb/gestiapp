<?php
require_once "conexion.php";
class ModeloNotas
{
    //Insertar
    static public function CrearNota($datos)
    {
        $sql = DB::conexion()->prepare("INSERT INTO notas(nombre,detalles,recordatorio,id_cliente) 
        VALUES (:nombreNota,:detalles,:id_fecha_hora,:id_cliente)");
        $sql->bindParam(":nombreNota", $datos["nombreNota"], PDO::PARAM_STR);
        $sql->bindParam(":detalles", $datos["detalles"], PDO::PARAM_STR);
        $sql->bindParam(":id_fecha_hora", $datos["id_fecha_hora"], PDO::PARAM_STR);
        $sql->bindParam(":id_cliente", $datos["id_cliente"], PDO::PARAM_STR);
        if ($sql->execute()) {
            return "ok";
        } else {
            return "error";
        }
    }

    //Listar
    static public function listarNota()
    {
        $sql = DB::conexion()->prepare("SELECT notas.id, notas.nombre, notas.detalles, notas.recordatorio, notas.fecha, clientes.nombre_completo, clientes.id as idcliente FROM notas inner join clientes on notas.id_cliente = clientes.id");
        $sql->execute();
        return $sql->fetchAll();
    }
 
    //Editar
    static public function EditarNota($datos)
    {
        $sql = DB::conexion()->prepare("UPDATE notas SET nombre=:nombreNota, detalles=:detalles,  recordatorio=:id_fecha_hora, id_cliente=:id_cliente  WHERE id=:id");
        $sql->bindParam(":id", $datos["id"], PDO::PARAM_STR);
        $sql->bindParam(":nombreNota", $datos["nombreNota"], PDO::PARAM_STR);
        $sql->bindParam(":detalles", $datos["detalles"], PDO::PARAM_STR);
        $sql->bindParam(":id_fecha_hora", $datos["id_fecha_hora"], PDO::PARAM_STR);
        $sql->bindParam(":id_cliente", $datos["id_cliente"], PDO::PARAM_STR);       
        if ($sql->execute()) {
            return "ok";
        } else {
            return "error";
        }
    }

    static public function RecordarNota($datos)
    {
        $sql = DB::conexion()->prepare("SELECT recordatorio FROM `notas` where recordatorio = CURRENT_TIMESTAMP"); 

    

        if ($sql->execute()) {
            return $sql->rowCount();   
        } else {
            return "error";
        }
    }

    //Eliminar
    static public function EliminarNota($id_tabla)
    {
        $sql = DB::conexion()->prepare("DELETE FROM notas WHERE id = :id");
        $sql->bindParam(":id", $id_tabla, PDO::PARAM_INT);
        if ($sql->execute()) {
            return "ok";
        } else {
            return "error";
        }
    }
}
