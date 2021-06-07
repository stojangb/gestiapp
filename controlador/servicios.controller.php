<?php
Class ControllerServicios{ 
    //Insertar
    public static function CrearServicios($datos) {
		$respuesta = ModeloServicios::CrearServicio($datos);
    	return $respuesta;
    }
    public static function InsertarMaritimos($datos) {
		$respuesta = ModeloServicios::InsertarMaritimo($datos);
    	return $respuesta;
    }
    public static function InsertarTerrestre($datos) {
		$respuesta = ModeloServicios::InsertarTerrestre($datos);
    	return $respuesta;
    }
    public static function InsertarOtro($datos) {
		$respuesta = ModeloServicios::InsertarOtro($datos);
    	return $respuesta;
    }
    //Listar
    public static function listarServicios(){
        $respuesta = ModeloServicios::listarServicio();
        return $respuesta;
    }
    public static function listarServiciosPorAñoPanel(){
        $respuesta = ModeloServicios::listarServicioPorAñoPanel();
        return $respuesta;
    }
    public static function listarMaritimoSelect($id){
        $respuesta = ModeloServicios::listarMaritimoSelect($id);
        return $respuesta;
    }

    public static function listarBusquedaCertificado($certificado){
        $respuesta = ModeloServicios::listarBusquedaCertificado($certificado);
        return $respuesta;
    }
    public static function listarBusquedaMatricula($matricula){
        $respuesta = ModeloServicios::listarBusquedaMatricula($matricula);
        return $respuesta;
    }
    public static function listarIdServicioPorClienteYFechas($fecha1,$fecha2,$cliente){
        $respuesta = ModeloServicios::listarIdServicioPorClienteYFechas($fecha1,$fecha2,$cliente);
        return $respuesta;
    }
    public static function listarTerrestreSelect($id){
        $respuesta = ModeloServicios::listarTerrestreSelect($id);
        return $respuesta;
    }
    public static function listarServicioUnico($id){
        $respuesta = ModeloServicios::listarServicioUnico($id);
        return $respuesta;
    }
    public static function listarTipoDeTrabajoPorIdPadre($id){
        $respuesta = ModeloServicios::listarTipoDeTrabajoPorIdPadre($id);
        return $respuesta;
    }
    public static function listarTipoDeTrabajoPorIdPadreTerrestre($id){
        $respuesta = ModeloServicios::listarTipoDeTrabajoPorIdPadreTerrestre($id);
        return $respuesta;
    }
    public static function listarTipoDeTrabajoPorIdTerrestre($id){
        $respuesta = ModeloServicios::listarTipoDeTrabajoPorIdTerrestre($id);
        return $respuesta;
    }
    public static function listarRelacionTerrestre($id){
        $respuesta = ModeloServicios::listarRelacionTerrestre($id);
        return $respuesta;
    }
    public static function listarRelacionOtrosMaritimo($id){
        $respuesta = ModeloServicios::listarRelacionOtrosMaritimo($id);
        return $respuesta;
    }
    public static function listarRelacionOtrosTerrestre($id){
        $respuesta = ModeloServicios::listarRelacionOtrosTerrestre($id);
        return $respuesta;
    }
    public static function listarTipoDeTrabajoPorIdOtros($id){
        $respuesta = ModeloServicios::listarTipoDeTrabajoPorIdOtros($id);
        return $respuesta;
    }
    public static function listarMaritimos($id){
        $respuesta = ModeloServicios::listarMaritimo($id);
        return $respuesta;
    }
    public static function listarMaritimosPorIdServicio($IDServicios){
        $respuesta = ModeloServicios::listarMaritimosPorIdServicio($IDServicios);
        return $respuesta;
    }
    public static function listarOtrosDeMaritimosPorIdServicio($IDServicios){
        $respuesta = ModeloServicios::listarOtrosDeMaritimosPorIdServicio($IDServicios);
        return $respuesta;
    }
    public static function listarOtrosDeTerrestrePorIdServicio($IDServicios){
        $respuesta = ModeloServicios::listarOtrosDeTerrestrePorIdServicio($IDServicios);
        return $respuesta;
    }
    public static function listarTiposDeTrabajoPorIdServicio($IDServicios){
        $respuesta = ModeloServicios::listarTiposDeTrabajoPorIdServicio($IDServicios);
        return $respuesta;
    }
    public static function listarTerrestrePorIdServicio($IDServicios){
        $respuesta = ModeloServicios::listarTerrestrePorIdServicio($IDServicios);
        return $respuesta;
    }
    public static function listarTerrestre($id){
        $respuesta = ModeloServicios::listarTerrestre($id);
        return $respuesta;
    }
    public static function listarOtro($id){
        $respuesta = ModeloServicios::listarOtro($id);
        return $respuesta;
    }
    public static function listarObjetos($id){
        $respuesta = ModeloServicios::listarObjetos($id);
        return $respuesta;
    }
    public static function listarTiposDeTrabajo($id){
        $respuesta = ModeloServicios::listarTiposDeTrabajo($id);
        return $respuesta;
    }
    public static function listarFechas($fecha1,$fecha2){
        $respuesta = ModeloServicios::listarFecha($fecha1,$fecha2);
        return $respuesta;
    }
    public static function listarClientes($id){
        $respuesta = ModeloServicios::listarCliente($id);
        return $respuesta;
    }
    //Editar
    public static function EditarServicios($datos) {
	    $respuesta = ModeloServicios::EditarServicio($datos);
		return $respuesta;
    }
    public static function EditarMaritimos($datos) {
		$respuesta = ModeloServicios::EditarMaritimo($datos);
    	return $respuesta;
    }
    public static function EditarTerrestre($datos) {
		$respuesta = ModeloServicios::EditarTerrestre($datos);
    	return $respuesta;
    }
    public static function EditarOtro($datos) {
		$respuesta = ModeloServicios::EditarOtro($datos);
    	return $respuesta;
    }
    //Eliminar
    public static function EliminarServicios($id) {
		$tablaname = "servicios";
        $respuesta = ModeloServicios::EliminarServicio($tablaname, $id);
		return $respuesta;
    }
    public static function EliminarMaritimo($id) {
        $respuesta = ModeloServicios::EliminarMaritimo($id);
		return $respuesta;
    }
    public static function EliminarTerrestre($id) {
        $respuesta = ModeloServicios::EliminarTerrestre($id);
		return $respuesta;
    }
    public static function EliminarOtros($id) {
        $respuesta = ModeloServicios::EliminarOtros($id);
		return $respuesta;
    }

}
?>