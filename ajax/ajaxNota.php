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
		$respuesta = ControllerClientes::CrearClientes($datos);
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
		$respuesta = ControllerClientes::EditarClientes($datos);
		echo $respuesta;
	}
	public function eliminarCliente(){
		$id_cliente = $this->id_cliente;
		$respuesta = ControllerClientes::EliminarClientes($id_cliente);
		echo $respuesta;
	}
}
$tipoOperacion = $_POST["tipoOperacion"];
if($tipoOperacion == "insertarNota") {
	$crearNuevoCliente = new ajaxCliente();
	$crearNuevoCliente ->	nombreCliente    = $_POST["nombreCliente"];
	$crearNuevoCliente ->	rut      		 = $_POST["rut"];
	$crearNuevoCliente ->	correo           = $_POST["correo"];
	$crearNuevoCliente ->	telefono  		 = $_POST["telefono"];
	$crearNuevoCliente ->	detalles  		 = $_POST["detalles"];
	$crearNuevoCliente ->	direccion  		 = $_POST["direccion"];
	$crearNuevoCliente ->	formaPago  		 = $_POST["formaPago"];
	$crearNuevoCliente ->	banco  		     = $_POST["banco"];
	$crearNuevoCliente ->	tipoCuenta       = $_POST["tipoCuenta"];
	$crearNuevoCliente ->	nCuenta  		 = $_POST["nCuenta"];
	$crearNuevoCliente ->crearNota();
}

if ($tipoOperacion == "editarNota") {
	$editarCliente = new ajaxCliente();
	$editarCliente ->	id               = $_POST["id"];
	$editarCliente ->	nombreCliente    = $_POST["nombreCliente"];
	$editarCliente ->	rut      		 = $_POST["rut"];
	$editarCliente ->	correo           = $_POST["correo"];
	$editarCliente ->	telefono  		 = $_POST["telefono"];
	$editarCliente ->	detalles  		 = $_POST["detalles"];
	$editarCliente ->	direccion  		 = $_POST["direccion"];
	$editarCliente ->	formaPago  		 = $_POST["formaPago"];
	$editarCliente ->	banco  		     = $_POST["banco"];
	$editarCliente ->	tipoCuenta       = $_POST["tipoCuenta"];
	$editarCliente ->	nCuenta  		 = $_POST["nCuenta"];
	$editarCliente ->	editarNota();
}

if ($tipoOperacion == "eliminarNota") {
	$eliminarCliente = new ajaxCliente();
	$eliminarCliente -> id_nota = $_POST["id_nota"];
	$eliminarCliente -> eliminarNota();
}
?>