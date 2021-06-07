<?php
require_once "../controlador/tipotrabajos.controller.php";
require_once "../modelo/tipotrabajo.modelo.php";
Class ajaxTipo {
	public function crearTipotrabajo(){
		$datos = array(	
						"tipotrabajo"=>$this->tipotrabajo,
					);
		$respuesta = ControllerTipotrabajos::CrearTipotrabajos($datos);
		echo $respuesta;
	}
	public function editarTipotrabajo(){
		$datos = array(	
						"id"=>$this->id,
						"tipotrabajo"=>$this->tipotrabajo,
					);
		$respuesta = ControllerTipotrabajos::EditarTipotrabajos($datos);
		echo $respuesta;
	}
	public function eliminarTipotrabajo(){
		$id = $this->id_tipo;
		$respuesta = ControllerTipotrabajos::EliminarTipotrabajos($id);
		echo $respuesta;
	}
}
$tipoOperacion = $_POST["tipoOperacion"];
if($tipoOperacion == "insertarTipo") {
	$crearNuevotipo = new ajaxTipo();
	$crearNuevotipo ->	tipotrabajo   = $_POST["tipotrabajo"];
	$crearNuevotipo ->	crearTipotrabajo();
}	
if ($tipoOperacion == "editarTipo") {
	$editartipo = new ajaxTipo();
	$editartipo ->	id   = $_POST["id"];
	$editartipo ->	tipotrabajo   = $_POST["tipo"];
	$editartipo ->	editarTipotrabajo();
}
if ($tipoOperacion == "eliminarTipo") {
	$eliminartipo = new ajaxTipo();
	$eliminartipo -> id_tipo = $_POST["id"];
	$eliminartipo -> eliminarTipotrabajo();
}
?>