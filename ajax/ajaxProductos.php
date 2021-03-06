<?php
require_once "../controlador/productos.controller.php";
require_once "../modelo/producto.modelo.php";
Class ajaxProducto {
	public function crearProducto(){
		$datos = array(	
						"idServicio"=>$this->idServicio,
						"producto"=>$this->producto,
						"cantidad"=>$this->cantidad,
						"precio"=>$this->precio,
					);
		$respuesta = ControllerProductos::CrearProductos($datos);
		echo $respuesta;
	}

	public function editarProducto(){
		$datos = array(	
						"id"=>$this->id,
						"idServicio"=>$this->idServicio,
						"producto"=>$this->producto,
						"cantidad"=>$this->cantidad,
						"precio"=>$this->precio,
					);
		$respuesta = ControllerProductos::EditarProductos($datos);
		echo $respuesta;
	}

	public function eliminarProducto(){
		$id = $this->id;
		$respuesta = ControllerProductos::EliminarProductos($id);
		echo $respuesta;
	}

	public function listarProducto(){
		$idTipoProducto = $this->idTipoProducto;
		$respuesta = ControllerProductos::listarProductos($idTipoProducto);
		echo json_encode($respuesta);
	}
}

$tipoOperacion = $_POST["tipoOperacion"];
if($tipoOperacion == "insertarProducto") {
	$crearNuevoProducto = new ajaxProducto();
	$crearNuevoProducto ->	idServicio   = $_POST["idServicio"];
	$crearNuevoProducto ->	producto   = $_POST["producto"];
	$crearNuevoProducto ->	cantidad   = $_POST["cantidad"];
	$crearNuevoProducto ->	precio   = $_POST["precio"];
	$crearNuevoProducto ->crearProducto();
}	

if ($tipoOperacion == "editarProducto") {
	$editarProducto = new ajaxProducto();
	$editarProducto ->	id   = $_POST["id"];
	$editarProducto ->	idServicio   = $_POST["idServicio"];
	$editarProducto ->	producto   = $_POST["producto"];
	$editarProducto ->	cantidad   = $_POST["cantidad"];
	$editarProducto ->	precio   = $_POST["precio"];
	$editarProducto ->	editarProducto();
}

if ($tipoOperacion == "eliminarProducto") {
	$eliminarProducto = new ajaxProducto();
	$eliminarProducto -> id = $_POST["id"];
	$eliminarProducto -> eliminarProducto();
}

if ($tipoOperacion == "listarProducto") {
	$listarProducto = new ajaxProducto();
	$listarProducto -> idTipoProducto = $_POST["tipoProducto"];
	$listarProducto -> listarProducto();
}

?>