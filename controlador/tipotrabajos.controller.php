<?php
Class ControllerTipotrabajos{
    public static function listarTipotrabajos(){
        $respuesta = ModeloTipotrabajos::listarTipotrabajo();
        return $respuesta;
    }
    static public function CrearTipotrabajos($datos) {
		$tablaname = "tipotrabajo";
		    $respuesta = ModeloTipotrabajos::CrearTipotrabajo($tablaname, $datos);
	    	return $respuesta;
    }
    static public function EliminarTipotrabajos($id) {
        $respuesta = ModeloTipotrabajos::EliminarTipotrabajo($id);
	    	return $respuesta;
    }
    static public function EditarTipotrabajos($datos) {
	    	$respuesta = ModeloTipotrabajos::EditarTipotrabajo($datos);
	    	return $respuesta;
    }
}
