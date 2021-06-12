<?php
Class ControllerEmpresas{ 
    //Insertar
    public static function CrearEmpresa($datos) {
		$respuesta = ModeloEmpresas::CrearEmpresa($datos);
    	return $respuesta;
    }
    public static function InsertarMaritimos($datos) {
		$respuesta = ModeloEmpresas::InsertarMaritimo($datos);
    	return $respuesta;
    }
    public static function InsertarTerrestre($datos) {
		$respuesta = ModeloEmpresas::InsertarTerrestre($datos);
    	return $respuesta;
    }
    public static function InsertarOtro($datos) {
		$respuesta = ModeloEmpresas::InsertarOtro($datos);
    	return $respuesta;
    }
    //Listar
    public static function listarEmpresas(){
        $respuesta = ModeloEmpresas::listarEmpresa();
        return $respuesta;
    }
    public static function listarServiciosPorAñoPanel(){
        $respuesta = ModeloEmpresas::listarServicioPorAñoPanel();
        return $respuesta;
    }
    public static function listarMaritimoSelect($id){
        $respuesta = ModeloEmpresas::listarMaritimoSelect($id);
        return $respuesta;
    }

    public static function listarBusquedaCertificado($certificado){
        $respuesta = ModeloEmpresas::listarBusquedaCertificado($certificado);
        return $respuesta;
    }
    public static function listarBusquedaMatricula($matricula){
        $respuesta = ModeloEmpresas::listarBusquedaMatricula($matricula);
        return $respuesta;
    }
    public static function listarIdServicioPorClienteYFechas($fecha1,$fecha2,$cliente){
        $respuesta = ModeloEmpresas::listarIdServicioPorClienteYFechas($fecha1,$fecha2,$cliente);
        return $respuesta;
    }
    public static function listarTerrestreSelect($id){
        $respuesta = ModeloEmpresas::listarTerrestreSelect($id);
        return $respuesta;
    }
    public static function listarServicioUnico($id){
        $respuesta = ModeloEmpresas::listarServicioUnico($id);
        return $respuesta;
    }
    public static function listarTipoDeTrabajoPorIdPadre($id){
        $respuesta = ModeloEmpresas::listarTipoDeTrabajoPorIdPadre($id);
        return $respuesta;
    }
    public static function listarTipoDeTrabajoPorIdPadreTerrestre($id){
        $respuesta = ModeloEmpresas::listarTipoDeTrabajoPorIdPadreTerrestre($id);
        return $respuesta;
    }
    public static function listarTipoDeTrabajoPorIdTerrestre($id){
        $respuesta = ModeloEmpresas::listarTipoDeTrabajoPorIdTerrestre($id);
        return $respuesta;
    }
    public static function listarRelacionTerrestre($id){
        $respuesta = ModeloEmpresas::listarRelacionTerrestre($id);
        return $respuesta;
    }
    public static function listarRelacionOtrosMaritimo($id){
        $respuesta = ModeloEmpresas::listarRelacionOtrosMaritimo($id);
        return $respuesta;
    }
    public static function listarRelacionOtrosTerrestre($id){
        $respuesta = ModeloEmpresas::listarRelacionOtrosTerrestre($id);
        return $respuesta;
    }
    public static function listarTipoDeTrabajoPorIdOtros($id){
        $respuesta = ModeloEmpresas::listarTipoDeTrabajoPorIdOtros($id);
        return $respuesta;
    }
    public static function listarMaritimos($id){
        $respuesta = ModeloEmpresas::listarMaritimo($id);
        return $respuesta;
    }
    public static function listarMaritimosPorIdServicio($IDServicios){
        $respuesta = ModeloEmpresas::listarMaritimosPorIdServicio($IDServicios);
        return $respuesta;
    }
    public static function listarOtrosDeMaritimosPorIdServicio($IDServicios){
        $respuesta = ModeloEmpresas::listarOtrosDeMaritimosPorIdServicio($IDServicios);
        return $respuesta;
    }
    public static function listarOtrosDeTerrestrePorIdServicio($IDServicios){
        $respuesta = ModeloEmpresas::listarOtrosDeTerrestrePorIdServicio($IDServicios);
        return $respuesta;
    }
    public static function listarTiposDeTrabajoPorIdServicio($IDServicios){
        $respuesta = ModeloEmpresas::listarTiposDeTrabajoPorIdServicio($IDServicios);
        return $respuesta;
    }
    public static function listarTerrestrePorIdServicio($IDServicios){
        $respuesta = ModeloEmpresas::listarTerrestrePorIdServicio($IDServicios);
        return $respuesta;
    }
    public static function listarTerrestre($id){
        $respuesta = ModeloEmpresas::listarTerrestre($id);
        return $respuesta;
    }
    public static function listarOtro($id){
        $respuesta = ModeloEmpresas::listarOtro($id);
        return $respuesta;
    }
    public static function listarObjetos($id){
        $respuesta = ModeloEmpresas::listarObjetos($id);
        return $respuesta;
    }
    public static function listarTiposDeTrabajo($id){
        $respuesta = ModeloEmpresas::listarTiposDeTrabajo($id);
        return $respuesta;
    }
    public static function listarFechas($fecha1,$fecha2){
        $respuesta = ModeloEmpresas::listarFecha($fecha1,$fecha2);
        return $respuesta;
    }
    public static function listarClientes($id){
        $respuesta = ModeloEmpresas::listarCliente($id);
        return $respuesta;
    }
    //Editar
    public static function EditarServicios($datos) {
	    $respuesta = ModeloEmpresas::EditarServicio($datos);
		return $respuesta;
    }
    public static function EditarMaritimos($datos) {
		$respuesta = ModeloEmpresas::EditarMaritimo($datos);
    	return $respuesta;
    }
    public static function EditarTerrestre($datos) {
		$respuesta = ModeloEmpresas::EditarTerrestre($datos);
    	return $respuesta;
    }
    public static function EditarOtro($datos) {
		$respuesta = ModeloEmpresas::EditarOtro($datos);
    	return $respuesta;
    }
    //Eliminar
    public static function EliminarServicios($id) {
		$tablaname = "servicios";
        $respuesta = ModeloEmpresas::EliminarServicio($tablaname, $id);
		return $respuesta;
    }
    public static function EliminarMaritimo($id) {
        $respuesta = ModeloEmpresas::EliminarMaritimo($id);
		return $respuesta;
    }
    public static function EliminarTerrestre($id) {
        $respuesta = ModeloEmpresas::EliminarTerrestre($id);
		return $respuesta;
    }
    public static function EliminarOtros($id) {
        $respuesta = ModeloEmpresas::EliminarOtros($id);
		return $respuesta;
    }

}
?>