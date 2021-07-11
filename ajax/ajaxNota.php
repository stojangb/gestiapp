<?php
require_once "../controlador/notas.controller.php";
require_once "../modelo/nota.modelo.php";
Class ajaxNota {
	public function crearNota(){
		$datos = array(	
						"nombreNota"=>$this->nombreNota,
						"detalles"=>$this->detalles,
						"id_cliente"=>$this->id_cliente,
						"id_fecha_hora"=>$this->id_fecha_hora,
					);
		$respuesta = ControllerNotas::CrearNotas($datos);
		echo $respuesta;
	}
	public function editarNota(){
		$datos = array(	
						"id"=>$this->id,
						"nombreNota"=>$this->nombreNota,
						"detalles"=>$this->detalles,
						"id_cliente"=>$this->id_cliente,
						"id_fecha_hora"=>$this->id_fecha_hora,
					);
		$respuesta = ControllerNotas::EditarNotas($datos);
		echo $respuesta;
	}
	public function recordarNota(){
		$datos = array(	
						"nombreNota"=>$this->nombreNota,
					);
		$respuesta = ControllerNotas::RecordarNotas($datos);
		echo $respuesta;
	}
	public function eliminarNota(){
		$id_nota = $this->id_nota;
		$respuesta = ControllerNotas::EliminarNotas($id_nota);
		echo $respuesta;
	}
}

$tipoOperacion = $_POST["tipoOperacion"];
if($tipoOperacion == "insertarNota") {
	$crearNuevaNota = new ajaxNota();
	$crearNuevaNota ->	nombreNota    = $_POST["nombreNota"];
	$crearNuevaNota ->	detalles      = $_POST["detalles"];
	$crearNuevaNota ->	id_cliente    = $_POST["id_cliente"];
	$crearNuevaNota ->	id_fecha_hora = $_POST["id_fecha_hora"];
	$crearNuevaNota ->crearNota();
}

if ($tipoOperacion == "editarNota") {
	$editarNota = new ajaxNota();
	$editarNota ->	id            = $_POST["id"];
	$editarNota ->	nombreNota    = $_POST["nombreNota"];
	$editarNota ->	detalles      = $_POST["detalles"];
	$editarNota ->	id_cliente    = $_POST["id_cliente"];
	$editarNota ->	id_fecha_hora = $_POST["id_fecha_hora"];
	$editarNota ->	editarNota();
}
if ($tipoOperacion == "recordarNota") {
	$editarNota =   new ajaxNota();
	$editarNota ->	nombreNota    = $_POST["nombreNota"];
	$editarNota ->	recordarNota();
}

if ($tipoOperacion == "eliminarNota") {
	$eliminarNota = new ajaxNota();
	$eliminarNota -> id_nota = $_POST["id_nota"];
	$eliminarNota -> eliminarNota();
}
?>