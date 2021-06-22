<?php
require_once "../controlador/clientes.controller.php";
require_once "../modelo/cliente.modelo.php";
Class ajaxCliente {
	public function crearCliente(){
		$datos = array(	
						"nombreCliente"=>$this->nombreCliente,
						"rut"=>$this->rut,
						"correo"=>$this->correo,
						"telefono"=>$this->telefono,
						"detalles"=>$this->detalles,
						"direccion"=>$this->direccion,
						"formaPago"=>$this->formaPago,
						"banco"=>$this->banco,
						"tipoCuenta"=>$this->tipoCuenta,
						"nCuenta"=>$this->nCuenta,
					);
		$respuesta = ControllerClientes::CrearClientes($datos);
		echo $respuesta;
	}
	public function editarCliente(){
		$datos = array(	
						"id"=>$this->id,
						"nombreCliente"=>$this->nombreCliente,
						"rut"=>$this->rut,
						"correo"=>$this->correo,
						"telefono"=>$this->telefono,
						"detalles"=>$this->detalles,
						"direccion"=>$this->direccion,
						"formaPago"=>$this->formaPago,
						"banco"=>$this->banco,
						"tipoCuenta"=>$this->tipoCuenta,
						"nCuenta"=>$this->nCuenta,
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
	$crearNuevoCliente ->crearCliente();
}

if ($tipoOperacion == "editarCliente") {
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
	$editarCliente ->	editarCliente();
}

if ($tipoOperacion == "eliminarCliente") {
	$eliminarCliente = new ajaxCliente();
	$eliminarCliente -> id_cliente = $_POST["id_cliente"];
	$eliminarCliente -> eliminarCliente();
}
?>