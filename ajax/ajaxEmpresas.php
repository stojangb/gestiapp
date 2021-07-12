<?php
require_once "../controlador/empresas.controller.php";
require_once "../modelo/empresa.modelo.php";
class ajaxEmpresa
{
	//Insertar
	public function crearEmpresa()
	{
		$datos = array(
			"nombre" => $this->nombre,
			"razonSocial" => $this->razonSocial,
			"rut" => $this->rut,
			"giro" => $this->giro,
		);
		$respuesta = ControllerEmpresas::CrearEmpresa($datos);
		echo $respuesta;
	}
	public function insertarVenta()
	{
		$datos = array(
			"nombre" => $this->nombre,
			"certificado" => $this->certificado,
			"vueltafalsa" => $this->vueltafalsa,
			"idservicio" => $this->idservicio,
			"tipotrabajomaritimo" => $this->tipotrabajomaritimo,
		);
		$respuesta = ControllerEmpresas::InsertarVenta($datos);
		echo $respuesta;
	}
	public function insertarIngresoEgreso()
	{
		$datos = array(
			"nombreIngresoEgreso" => $this->nombreIngresoEgreso,
			"idTipo3" => $this->idTipo3,
			"monto3" => $this->monto3,
			"id_empresa" => $this->id_empresa,
		);
		$respuesta = ControllerEmpresas::InsertarIngresoEgreso($datos);
		echo $respuesta;
	}
	public function editarTerrestre()
	{
		$datos = array(
			"idTerrestre" => $this->idTerrestre,
			"nombre" => $this->nombre,
			"certificado" => $this->certificado,
			"matricula" => $this->matricula,
			"idservicio" => $this->idservicio,
			"idmaritimo" => $this->idmaritimo,
			"tipotrabajoterrestre" => $this->tipotrabajoterrestre,
		);
		$respuesta = ControllerEmpresas::EditarTerrestre($datos);
		echo $respuesta;
	}
	//Listar
	public function listarMaritimoSelect()
	{
		$id = $this->idservicio;
		$respuesta = ControllerEmpresas::listarMaritimoSelect($id);
		echo json_encode($respuesta);
	}
	public function listarBusquedaCertificado()
	{
		$certificado = $this->certificado;
		$respuesta = ControllerEmpresas::listarBusquedaCertificado($certificado);
		echo json_encode($respuesta);
	}
	public function listarBusquedaMatricula()
	{
		$matricula = $this->matricula;
		$respuesta = ControllerEmpresas::listarBusquedaMatricula($matricula);
		echo json_encode($respuesta);
	}
	public function listarIdServicioPorClienteYFechas()
	{
		$fecha1 = $this->fecha1;
		$fecha2 = $this->fecha2;
		$cliente = $this->cliente;
		$respuesta = ControllerEmpresas::listarIdServicioPorClienteYFechas($fecha1, $fecha2, $cliente);
		echo json_encode($respuesta);
	}
	public function listarMaritimosPorIdServicio()
	{
		$IDServicios = $this->IDServicios;
		$respuesta = ControllerEmpresas::listarMaritimosPorIdServicio($IDServicios);
		echo json_encode($respuesta);
	}
	public function listarOtrosDeMaritimosPorIdServicio()
	{
		$IDServicios = $this->IDServicios;
		$respuesta = ControllerEmpresas::listarOtrosDeMaritimosPorIdServicio($IDServicios);
		echo json_encode($respuesta);
	}
	public function listarOtrosDeTerrestrePorIdServicio()
	{
		$IDServicios = $this->IDServicios;
		$respuesta = ControllerEmpresas::listarOtrosDeTerrestrePorIdServicio($IDServicios);
		echo json_encode($respuesta);
	}
	public function listarTiposDeTrabajoPorIdServicio()
	{
		$IDServicios = $this->IDServicios;
		$respuesta = ControllerEmpresas::listarTiposDeTrabajoPorIdServicio($IDServicios);
		echo json_encode($respuesta);
	}

	//Editar
	public function editarEmpresa()
	{
		$datos = array(
			"id" => $this->id,
			"nombre" => $this->nombre,
			"razonSocial" => $this->razonSocial,
			"rut" => $this->rut,
			"giro" => $this->giro,
		);
		$respuesta = ControllerEmpresas::EditarEmpresas($datos);
		echo $respuesta;
	}
	//Eliminar
	public function eliminarEmpresa()
	{
		$id = $this->id_empresa;
		$respuesta = ControllerEmpresas::EliminarEmpresa($id);
		echo $respuesta;
	}
	public function eliminarMaritimo()
	{
		$id = $this->id_maritimo;
		$respuesta = ControllerEmpresas::EliminarMaritimo($id);
		echo $respuesta;
	}

}
$tipoOperacion = $_POST["tipoOperacion"];
//Insertar
if ($tipoOperacion == "insertarEmpresa") {
	$crearNuevoServicio = new ajaxEmpresa();
	$crearNuevoServicio->nombre      = $_POST['nombre'];
	$crearNuevoServicio->razonSocial = $_POST["razonSocial"];
	$crearNuevoServicio->rut      = $_POST["rut"];
	$crearNuevoServicio->giro     = $_POST["giro"];
	$crearNuevoServicio->crearEmpresa();
}


if ($tipoOperacion == "editarTerrestre") {
	$agregarProducto = new ajaxEmpresa();
	$agregarProducto->idTerrestre = $_POST["idTerrestre"];
	$agregarProducto->nombre = $_POST["nombre"];
	$agregarProducto->certificado = $_POST["certificado"];
	$agregarProducto->matricula = $_POST["matricula"];
	$agregarProducto->idservicio = $_POST["idservicio"];
	if ($_POST["idmaritimo"] == 'null') {
		$agregarProducto->idmaritimo = null;
	} else {
		$agregarProducto->idmaritimo = $_POST["idmaritimo"];
	}
	$agregarProducto->tipotrabajoterrestre = $_POST["tipotrabajoterrestre"];
	$agregarProducto->editarTerrestre();
}
//Listar
if ($tipoOperacion == "listarMaritimoSelect") {
	$listarProducto = new ajaxEmpresa();
	$listarProducto->idservicio = $_POST["idservicio"];
	$listarProducto->listarMaritimoSelect();
}
if ($tipoOperacion == "listarBusquedaCertificado") {
	$listarProducto = new ajaxEmpresa();
	$listarProducto->certificado = $_POST["certificado"];
	$listarProducto->listarBusquedaCertificado();
}
if ($tipoOperacion == "listarBusquedaMatricula") {
	$listarProducto = new ajaxEmpresa();
	$listarProducto->matricula = $_POST["matricula"];
	$listarProducto->listarBusquedaMatricula();
}
if ($tipoOperacion == "listarIdServicioPorClienteYFechas") {
	$listarProducto = new ajaxEmpresa();
	$listarProducto->fecha1 = $_POST["fechaInicio"];
	$listarProducto->fecha2 = $_POST["fechaTermino"];
	$listarProducto->cliente = $_POST["cliente"];
	$listarProducto->listarIdServicioPorClienteYFechas();
}
if ($tipoOperacion == "listarMaritimosPorIdServicio") {
	$listarProducto = new ajaxEmpresa();
	$listarProducto->IDServicios = $_POST["IDServicios"];
	$listarProducto->listarMaritimosPorIdServicio();
}
if ($tipoOperacion == "listarOtrosDeMaritimosPorIdServicio") {
	$listarProducto = new ajaxEmpresa();
	$listarProducto->IDServicios = $_POST["IDServicios"];
	$listarProducto->listarOtrosDeMaritimosPorIdServicio();
}
if ($tipoOperacion == "listarOtrosDeTerrestrePorIdServicio") {
	$listarProducto = new ajaxEmpresa();
	$listarProducto->IDServicios = $_POST["IDServicios"];
	$listarProducto->listarOtrosDeTerrestrePorIdServicio();
}
if ($tipoOperacion == "listarTiposDeTrabajoPorIdServicio") {
	$listarProducto = new ajaxEmpresa();
	$listarProducto->IDServicios = $_POST["IDServicios"];
	$listarProducto->listarTiposDeTrabajoPorIdServicio();
}
//Editar
if ($tipoOperacion == "editarEmpresa") {
	$editarServicio = new ajaxEmpresa();
	$editarServicio->id  	   = $_POST["id"];
	$editarServicio->nombre      = $_POST['nombre'];
	$editarServicio->razonSocial = $_POST["razonSocial"];
	$editarServicio->rut      = $_POST["rut"];
	$editarServicio->giro     = $_POST["giro"];
	$editarServicio->editarEmpresa();
}
//Borrar
if ($tipoOperacion == "eliminarEmpresa") {
	$eliminarCliente = new ajaxEmpresa();
	$eliminarCliente->id_empresa = $_POST["id_empresa"];
	$eliminarCliente->eliminarEmpresa();
}
