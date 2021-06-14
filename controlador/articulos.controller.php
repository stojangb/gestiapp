<?php
Class ControllerArticulos{
    //Insertar
    public static function CrearBarcaza($datos) {
        $respuesta = ModeloArticulos::CrearBarcaza($datos);
        return $respuesta;
    }
    //Listar
    public static function listarArticulos(){
        $respuesta = ModeloArticulos::listarArticulos();
        return $respuesta;
    }
    public static function listarCertificados2Meses(){
        $respuesta = ModeloArticulos::listarCertificados2Meses();
        return $respuesta;
    }
    public static function listarPatenteMaritimoPorServicio($idservicio){
        $respuesta = ModeloArticulos::listarPatenteMaritimoPorServicio($idservicio);
        return $respuesta;
    }
    public static function listarPatenteTerrestrePorServicio($idservicio){
        $respuesta = ModeloArticulos::listarPatenteTerrestrePorServicio($idservicio);
        return $respuesta;
    }
    public static function listarRelacionTerrestreOtroPorServicio($idservicio){
        $respuesta = ModeloArticulos::listarRelacionTerrestreOtroPorServicio($idservicio);
        return $respuesta;
    }
    public static function listarRelacionMaritimoOtroPorServicio($idservicio){
        $respuesta = ModeloArticulos::listarRelacionMaritimoOtroPorServicio($idservicio);
        return $respuesta;
    }
    public static function listarVueltaFalsaBarcazas(){
        $respuesta = ModeloArticulos::listarVueltaFalsaBarcazas();
        return $respuesta;
    }
    public static function listarProductosPorTipo($tipoproducto){
        $respuesta = ModeloArticulos::listarProductoPorTipo($tipoproducto);
        return $respuesta;
    }
    public static function listarBarcazasPorCliente($cliente){
        $respuesta = ModeloArticulos::listarBarcazasPorCliente($cliente);
        return $respuesta;
    }

    //Actualizar
    public static function EditarBarcaza($datos) {
        $respuesta = ModeloArticulos::EditarBarcaza($datos);
        return $respuesta;
    }

    //Eliminar
    public static function EliminarBarcaza($id) {
        $respuesta = ModeloArticulos::EliminarBarcaza($id);
        return $respuesta;
    }    
}
?>