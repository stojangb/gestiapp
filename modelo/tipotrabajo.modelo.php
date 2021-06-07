<?php
require_once "conexion.php";
Class ModeloTipotrabajos{
    static public function listarTipotrabajo(){
    $sql = DB::conexion()->prepare("SELECT * FROM tipotrabajo");
    $sql -> execute();
    return $sql -> fetchAll();
}
static public function CrearTipotrabajo($tabla, $datos) {
    $sql = DB::conexion()->prepare("INSERT INTO $tabla (tipotrabajo) VALUES (:tipotrabajo)");
    $sql->bindParam(":tipotrabajo", $datos["tipotrabajo"], PDO::PARAM_STR);
    if( $sql -> execute() ) {
        return "ok";
    } else {
        return "error";
    }
}
static public function EliminarTipotrabajo($id_tabla) {
    $sql = DB::conexion()->prepare("DELETE FROM tipotrabajo WHERE id = :id");
    $sql->bindParam(":id", $id_tabla, PDO::PARAM_INT);
    if( $sql->execute()) {
        return "ok";
    } else {
        return "error";
    }
}
static public function EditarTipotrabajo($datos) {
    $sql = DB::conexion()->prepare("UPDATE tipotrabajo SET tipotrabajo=:tipotrabajo WHERE id=:id");
    $sql->bindParam(":id", $datos["id"], PDO::PARAM_STR);
    $sql->bindParam(":tipotrabajo", $datos["tipotrabajo"], PDO::PARAM_STR);

    if($sql->execute()) {
        return "ok";
    } else {
        return "error";
    }
}
}