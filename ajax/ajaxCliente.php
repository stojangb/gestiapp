<?php
require_once "../controlador/clientes.controller.php";
require_once "../modelo/cliente.modelo.php";
Class ajaxCliente {
	public function crearCliente(){
		$datos = array(	
						"nombreContacto"=>$this->nombreContacto,
						"nombreEmpresa"=>$this->nombreEmpresa,
						"rut"=>$this->rut,
						"correo"=>$this->correo,
						"telefono"=>$this->telefono,
						"tipo"=>$this->tipo,
						"detalles"=>$this->detalles,
					);
		$respuesta = ControllerClientes::CrearClientes($datos);
		echo $respuesta;
	}

	public function editarCliente(){
		$datos = array(	
						"id"=>$this->id,
						"nombreContacto"=>$this->nombreContacto,
						"nombreEmpresa"=>$this->nombreEmpresa,
						"rut"=>$this->rut,
						"correo"=>$this->correo,
						"telefono"=>$this->telefono,
						"tipo"=>$this->tipo,
						"detalles"=>$this->detalles,
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

if($tipoOperacion == "insertarCliente") {
	$crearNuevoCliente = new ajaxCliente();
	$crearNuevoCliente ->	nombreEmpresa   = $_POST["nombreEmpresa"];
	$crearNuevoCliente ->	nombreContacto   = $_POST["nombreContacto"];
	$crearNuevoCliente ->	rut      = $_POST["rut"];
	$crearNuevoCliente ->	correo   = $_POST["correo"];
	$crearNuevoCliente ->	telefono  = $_POST["telefono"];
	$crearNuevoCliente ->	tipo      = $_POST["tipo"];
	$crearNuevoCliente ->	detalles  = $_POST["detalles"];
	$crearNuevoCliente ->crearCliente();
}

if ($tipoOperacion == "editarCliente") {
	$editarCliente = new ajaxCliente();
	$editarCliente ->	id   = $_POST["id"];
	$editarCliente ->	nombreEmpresa   = $_POST["nombreEmpresa"];
	$editarCliente ->	nombreContacto   = $_POST["nombreContacto"];
	$editarCliente ->	rut      = $_POST["rut"];
	$editarCliente ->	correo   = $_POST["correo"];
	$editarCliente ->	telefono  = $_POST["telefono"];
	$editarCliente ->	tipo      = $_POST["tipo"];
	$editarCliente ->	detalles  = $_POST["detalles"];
	$editarCliente ->	editarCliente();
}

if ($tipoOperacion == "eliminarCliente") {
	$eliminarCliente = new ajaxCliente();
	$eliminarCliente -> id_cliente = $_POST["id_cliente"];
	$eliminarCliente -> eliminarCliente();
}
?>