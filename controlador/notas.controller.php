<?php
Class ControllerNotas{
    public static function listarNotas(){
        $respuesta = ModeloNotas::listarNota();
        return $respuesta;
    }
    static public function CrearNotas($datos) {
        $respuesta = ModeloNotas::CrearNota($datos);
        return $respuesta;
    }
    static public function EliminarNotas($id_Nota) {
        $respuesta = ModeloNotas::EliminarNota($id_Nota);
        return $respuesta;
    }
    static public function EditarNotas($datos) {
        $respuesta = ModeloNotas::EditarNota($datos);
        return $respuesta;
    }
}
