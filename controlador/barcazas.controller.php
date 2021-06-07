<?php
Class ControllerBarcazas{
    //Insertar
    public static function CrearBarcaza($datos) {
        $respuesta = ModeloBarcazas::CrearBarcaza($datos);
        return $respuesta;
    }
    //Listar
    public static function listarBarcazas(){
        $respuesta = ModeloBarcazas::listarBarcazas();
        return $respuesta;
    }
    public static function listarCertificados2Meses(){
        $respuesta = ModeloBarcazas::listarCertificados2Meses();
        return $respuesta;
    }
    public static function listarPatenteMaritimoPorServicio($idservicio){
        $respuesta = ModeloBarcazas::listarPatenteMaritimoPorServicio($idservicio);
        return $respuesta;
    }
    public static function listarPatenteTerrestrePorServicio($idservicio){
        $respuesta = ModeloBarcazas::listarPatenteTerrestrePorServicio($idservicio);
        return $respuesta;
    }
    public static function listarRelacionTerrestreOtroPorServicio($idservicio){
        $respuesta = ModeloBarcazas::listarRelacionTerrestreOtroPorServicio($idservicio);
        return $respuesta;
    }
    public static function listarRelacionMaritimoOtroPorServicio($idservicio){
        $respuesta = ModeloBarcazas::listarRelacionMaritimoOtroPorServicio($idservicio);
        return $respuesta;
    }
    public static function listarVueltaFalsaBarcazas(){
        $respuesta = ModeloBarcazas::listarVueltaFalsaBarcazas();
        return $respuesta;
    }
    public static function listarProductosPorTipo($tipoproducto){
        $respuesta = ModeloBarcazas::listarProductoPorTipo($tipoproducto);
        return $respuesta;
    }
    public static function listarBarcazasPorCliente($cliente){
        $respuesta = ModeloBarcazas::listarBarcazasPorCliente($cliente);
        return $respuesta;
    }

    //Actualizar
    public static function EditarBarcaza($datos) {
        $respuesta = ModeloBarcazas::EditarBarcaza($datos);
        return $respuesta;
    }

    //Eliminar
    public static function EliminarBarcaza($id) {
        $respuesta = ModeloBarcazas::EliminarBarcaza($id);
        return $respuesta;
    }    
}
?>