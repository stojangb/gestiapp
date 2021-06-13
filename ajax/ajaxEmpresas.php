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
	public function insertarMaritimo()
	{
		$datos = array(
			"nombre" => $this->nombre,
			"certificado" => $this->certificado,
			"vueltafalsa" => $this->vueltafalsa,
			"idservicio" => $this->idservicio,
			"tipotrabajomaritimo" => $this->tipotrabajomaritimo,
		);
		$respuesta = ControllerEmpresas::InsertarMaritimos($datos);
		echo $respuesta;
	}
	public function editarMaritimo()
	{
		$datos = array(
			"idMaritimo" => $this->idMaritimo,
			"nombre" => $this->nombre,
			"certificado" => $this->certificado,
			"vueltafalsa" => $this->vueltafalsa,
			"idservicio" => $this->idservicio,
			"tipotrabajomaritimo" => $this->tipotrabajomaritimo,
		);
		$respuesta = ControllerEmpresas::EditarMaritimos($datos);
		echo $respuesta;
	}
	public function insertarTerrestre()
	{
		$datos = array(
			"nombre" => $this->nombre,
			"certificado" => $this->certificado,
			"matricula" => $this->matricula,
			"idservicio" => $this->idservicio,
			"idmaritimo" => $this->idmaritimo,
			"tipotrabajoterrestre" => $this->tipotrabajoterrestre,
		);
		$respuesta = ControllerEmpresas::InsertarTerrestre($datos);
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
	public function insertarOtro()
	{
		$datos = array(
			"nombre" => $this->nombre,
			"cantidad" => $this->cantidad,
			"idservicio" => $this->idservicio,
			"idterrestre" => $this->idterrestre,
			"idmaritimo" => $this->idmaritimo,
		);
		$respuesta = ControllerEmpresas::InsertarOtro($datos);
		echo $respuesta;
	}
	public function editarOtro()
	{
		$datos = array(
			"idOtro" => $this->idOtro,
			"nombre" => $this->nombre,
			"cantidad" => $this->cantidad,
			"idservicio" => $this->idservicio,
			"idterrestre" => $this->idterrestre,
			"idmaritimo" => $this->idmaritimo,
		);
		$respuesta = ControllerEmpresas::EditarOtro($datos);
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
	public function editarServicio()
	{
		$datos = array(
			"id" => $this->id,
			"detalles" => $this->detalles,
			"fecha" => $this->fecha,
		);
		$respuesta = ControllerEmpresas::EditarServicios($datos);
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
	public function eliminarTerrestre()
	{
		$id = $this->id_terrestre;
		$respuesta = ControllerEmpresas::EliminarTerrestre($id);
		echo $respuesta;
	}
	public function eliminarOtro()
	{
		$id = $this->id_otro;
		$respuesta = ControllerEmpresas::EliminarOtros($id);
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
if ($tipoOperacion == "insertarMaritimo") {
	$agregarProducto = new ajaxEmpresa();

	$agregarProducto->nombre = $_POST['nombre'];
	$agregarProducto->certificado = $_POST["certificado"];
	$agregarProducto->vueltafalsa = $_POST["vueltafalsa"];
	$agregarProducto->tipotrabajomaritimo = $_POST["tipotrabajomaritimo"];
	$agregarProducto->idservicio = $_POST["idservicio"];
	$agregarProducto->insertarMaritimo();
}
if ($tipoOperacion == "editarMaritimo") {
	$agregarProducto = new ajaxEmpresa();
	$agregarProducto->idMaritimo = $_POST['idMaritimo'];
	$agregarProducto->nombre = $_POST['nombre'];
	$agregarProducto->certificado = $_POST["certificado"];
	$agregarProducto->vueltafalsa = $_POST["vueltafalsa"];
	$agregarProducto->tipotrabajomaritimo = $_POST["tipotrabajomaritimo"];
	$agregarProducto->idservicio = $_POST["idservicio"];
	$agregarProducto->editarMaritimo();
}
if ($tipoOperacion == "insertarTerrestre") {
	$agregarProducto = new ajaxEmpresa();
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
	$agregarProducto->insertarTerrestre();
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
if ($tipoOperacion == "insertarOtro") {
	$agregarProducto = new ajaxEmpresa();
	if ($_POST["idmaritimo"] == 'null') {
		$agregarProducto->idmaritimo = null;
	} else {
		$agregarProducto->idmaritimo = $_POST["idmaritimo"];
	}
	if ($_POST["idterrestre"] == 'null') {
		$agregarProducto->idterrestre = null;
	} else {
		$agregarProducto->idterrestre = $_POST["idterrestre"];
	}
	$agregarProducto->nombre = $_POST["nombre"];
	$agregarProducto->cantidad = $_POST["cantidad"];
	$agregarProducto->idservicio = $_POST["idservicio"];
	$agregarProducto->tipotrabajootro = $_POST["tipotrabajootro"];
	$agregarProducto->insertarOtro();
}
if ($tipoOperacion == "editarOtro") {
	$agregarProducto = new ajaxEmpresa();
	if ($_POST["idmaritimo"] == 'null') {
		$agregarProducto->idmaritimo = null;
	} else {
		$agregarProducto->idmaritimo = $_POST["idmaritimo"];
	}
	if ($_POST["idterrestre"] == 'null') {
		$agregarProducto->idterrestre = null;
	} else {
		$agregarProducto->idterrestre = $_POST["idterrestre"];
	}
	$agregarProducto->idOtro = $_POST["idOtro"];
	$agregarProducto->nombre = $_POST["nombre"];
	$agregarProducto->cantidad = $_POST["cantidad"];
	$agregarProducto->idservicio = $_POST["idservicio"];
	$agregarProducto->editarOtro();
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
if ($tipoOperacion == "editarServicio") {
	$editarServicio = new ajaxEmpresa();
	$editarServicio->id  	   = $_POST["id"];
	$editarServicio->fecha     = $_POST["fecha"];
	$editarServicio->detalles  = $_POST["detalles"];
	$editarServicio->editarServicio();
}
//Borrar
if ($tipoOperacion == "eliminarEmpresa") {
	$eliminarCliente = new ajaxEmpresa();
	$eliminarCliente->id_empresa = $_POST["id_empresa"];
	$eliminarCliente->eliminarEmpresa();
}
if ($tipoOperacion == "eliminarMaritimo") {
	$eliminarMaritimo = new ajaxEmpresa();
	$eliminarMaritimo->id_maritimo = $_POST["id_maritimo"];
	$eliminarMaritimo->eliminarMaritimo();
}
if ($tipoOperacion == "eliminarTerrestre") {
	$eliminarTerrestre = new ajaxEmpresa();
	$eliminarTerrestre->id_terrestre = $_POST["id_terrestre"];
	$eliminarTerrestre->eliminarTerrestre();
}
if ($tipoOperacion == "eliminarOtro") {
	$eliminarOtro = new ajaxEmpresa();
	$eliminarOtro->id_otro = $_POST["id_otro"];
	$eliminarOtro->eliminarOtro();
}