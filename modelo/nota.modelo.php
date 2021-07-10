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
        $sql = DB::conexion()->prepare("UPDATE Notas SET nombre_completo=:nombreNota, direccion=:direccion,telefono=:telefono, detalles=:detalles,  correo=:correo, id_forma_pago=:id_forma_pago, rut=:rut, id_banco=:id_banco, n_cuenta=:n_cuenta, id_tipo_cuenta=:id_tipo_cuenta  WHERE id=:id");
        $sql->bindParam(":id", $datos["id"], PDO::PARAM_STR);
        $sql->bindParam(":nombreNota", $datos["nombreNota"], PDO::PARAM_STR);
        $sql->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
        $sql->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
        $sql->bindParam(":detalles", $datos["detalles"], PDO::PARAM_STR);
       
        if ($sql->execute()) {
            return "ok";
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
