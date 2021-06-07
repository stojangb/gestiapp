<?php
require_once "../controlador/servicios.controller.php";
require_once "../modelo/servicio.modelo.php";
class ajaxServicio
{
	//Insertar
	public function crearServicio()
	{
		$datos = array(
			"detalles" => $this->detalles,
			"fecha" => $this->fecha,
			"idcliente" => $this->idcliente,
			"idlugar" => $this->idlugar,
		);
		$respuesta = ControllerServicios::CrearServicios($datos);
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
		$respuesta = ControllerServicios::InsertarMaritimos($datos);
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
		$respuesta = ControllerServicios::EditarMaritimos($datos);
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
		$respuesta = ControllerServicios::InsertarTerrestre($datos);
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
		$respuesta = ControllerServicios::EditarTerrestre($datos);
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
		$respuesta = ControllerServicios::InsertarOtro($datos);
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
		$respuesta = ControllerServicios::EditarOtro($datos);
		echo $respuesta;
	}
	//Listar
	public function listarMaritimoSelect()
	{
		$id = $this->idservicio;
		$respuesta = ControllerServicios::listarMaritimoSelect($id);
		echo json_encode($respuesta);
	}
	public function listarBusquedaCertificado()
	{
		$certificado = $this->certificado;
		$respuesta = ControllerServicios::listarBusquedaCertificado($certificado);
		echo json_encode($respuesta);
	}
	public function listarBusquedaMatricula()
	{
		$matricula = $this->matricula;
		$respuesta = ControllerServicios::listarBusquedaMatricula($matricula);
		echo json_encode($respuesta);
	}
	public function listarIdServicioPorClienteYFechas()
	{
		$fecha1 = $this->fecha1;
		$fecha2 = $this->fecha2;
		$cliente = $this->cliente;
		$respuesta = ControllerServicios::listarIdServicioPorClienteYFechas($fecha1, $fecha2, $cliente);
		echo json_encode($respuesta);
	}
	public function listarMaritimosPorIdServicio()
	{
		$IDServicios = $this->IDServicios;
		$respuesta = ControllerServicios::listarMaritimosPorIdServicio($IDServicios);
		echo json_encode($respuesta);
	}
	public function listarOtrosDeMaritimosPorIdServicio()
	{
		$IDServicios = $this->IDServicios;
		$respuesta = ControllerServicios::listarOtrosDeMaritimosPorIdServicio($IDServicios);
		echo json_encode($respuesta);
	}
	public function listarOtrosDeTerrestrePorIdServicio()
	{
		$IDServicios = $this->IDServicios;
		$respuesta = ControllerServicios::listarOtrosDeTerrestrePorIdServicio($IDServicios);
		echo json_encode($respuesta);
	}
	public function listarTiposDeTrabajoPorIdServicio()
	{
		$IDServicios = $this->IDServicios;
		$respuesta = ControllerServicios::listarTiposDeTrabajoPorIdServicio($IDServicios);
		echo json_encode($respuesta);
	}
	public function listarTerrestrePorIdServicio()
	{
		$IDServicios = $this->IDServicios;
		$respuesta = ControllerServicios::listarTerrestrePorIdServicio($IDServicios);
		echo json_encode($respuesta);
	}
	public function listarTerrestreSelect()
	{
		$id = $this->idservicio;
		$respuesta = ControllerServicios::listarTerrestreSelect($id);
		echo json_encode($respuesta);
	}
	public function listarObjetos()
	{
		$IDServicios = $this->IDServicios;
		$respuesta = ControllerServicios::listarObjetos($IDServicios);
		echo json_encode($respuesta);
	}
	public function listarTiposDeTrabajo()
	{
		$IDServicios = $this->IDServicios;
		$respuesta = ControllerServicios::listarTiposDeTrabajo($IDServicios);
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
		$respuesta = ControllerServicios::EditarServicios($datos);
		echo $respuesta;
	}
	//Eliminar
	public function eliminarServicio()
	{
		$id = $this->id_servicio;
		$respuesta = ControllerServicios::EliminarServicios($id);
		echo $respuesta;
	}
	public function eliminarMaritimo()
	{
		$id = $this->id_maritimo;
		$respuesta = ControllerServicios::EliminarMaritimo($id);
		echo $respuesta;
	}
	public function eliminarTerrestre()
	{
		$id = $this->id_terrestre;
		$respuesta = ControllerServicios::EliminarTerrestre($id);
		echo $respuesta;
	}
	public function eliminarOtro()
	{
		$id = $this->id_otro;
		$respuesta = ControllerServicios::EliminarOtros($id);
		echo $respuesta;
	}
}
$tipoOperacion = $_POST["tipoOperacion"];
//Insertar
if ($tipoOperacion == "insertarServicio") {
	$crearNuevoServicio = new ajaxServicio();
	$crearNuevoServicio->idlugar   = $_POST['idlugar'];
	$crearNuevoServicio->idcliente = $_POST["cliente"];
	$crearNuevoServicio->detalles  = $_POST["detalles"];
	$crearNuevoServicio->fecha     = $_POST["fecha"];
	$crearNuevoServicio->crearServicio();
}
if ($tipoOperacion == "insertarMaritimo") {
	$agregarProducto = new ajaxServicio();

	$agregarProducto->nombre = $_POST['nombre'];
	$agregarProducto->certificado = $_POST["certificado"];
	$agregarProducto->vueltafalsa = $_POST["vueltafalsa"];
	$agregarProducto->tipotrabajomaritimo = $_POST["tipotrabajomaritimo"];
	$agregarProducto->idservicio = $_POST["idservicio"];
	$agregarProducto->insertarMaritimo();
}
if ($tipoOperacion == "editarMaritimo") {
	$agregarProducto = new ajaxServicio();
	$agregarProducto->idMaritimo = $_POST['idMaritimo'];
	$agregarProducto->nombre = $_POST['nombre'];
	$agregarProducto->certificado = $_POST["certificado"];
	$agregarProducto->vueltafalsa = $_POST["vueltafalsa"];
	$agregarProducto->tipotrabajomaritimo = $_POST["tipotrabajomaritimo"];
	$agregarProducto->idservicio = $_POST["idservicio"];
	$agregarProducto->editarMaritimo();
}
if ($tipoOperacion == "insertarTerrestre") {
	$agregarProducto = new ajaxServicio();
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
	$agregarProducto = new ajaxServicio();
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
	$agregarProducto = new ajaxServicio();
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
	$agregarProducto = new ajaxServicio();
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
	$listarProducto = new ajaxServicio();
	$listarProducto->idservicio = $_POST["idservicio"];
	$listarProducto->listarMaritimoSelect();
}
if ($tipoOperacion == "listarBusquedaCertificado") {
	$listarProducto = new ajaxServicio();
	$listarProducto->certificado = $_POST["certificado"];
	$listarProducto->listarBusquedaCertificado();
}
if ($tipoOperacion == "listarBusquedaMatricula") {
	$listarProducto = new ajaxServicio();
	$listarProducto->matricula = $_POST["matricula"];
	$listarProducto->listarBusquedaMatricula();
}
if ($tipoOperacion == "listarIdServicioPorClienteYFechas") {
	$listarProducto = new ajaxServicio();
	$listarProducto->fecha1 = $_POST["fechaInicio"];
	$listarProducto->fecha2 = $_POST["fechaTermino"];
	$listarProducto->cliente = $_POST["cliente"];
	$listarProducto->listarIdServicioPorClienteYFechas();
}
if ($tipoOperacion == "listarMaritimosPorIdServicio") {
	$listarProducto = new ajaxServicio();
	$listarProducto->IDServicios = $_POST["IDServicios"];
	$listarProducto->listarMaritimosPorIdServicio();
}
if ($tipoOperacion == "listarOtrosDeMaritimosPorIdServicio") {
	$listarProducto = new ajaxServicio();
	$listarProducto->IDServicios = $_POST["IDServicios"];
	$listarProducto->listarOtrosDeMaritimosPorIdServicio();
}
if ($tipoOperacion == "listarOtrosDeTerrestrePorIdServicio") {
	$listarProducto = new ajaxServicio();
	$listarProducto->IDServicios = $_POST["IDServicios"];
	$listarProducto->listarOtrosDeTerrestrePorIdServicio();
}
if ($tipoOperacion == "listarTiposDeTrabajoPorIdServicio") {
	$listarProducto = new ajaxServicio();
	$listarProducto->IDServicios = $_POST["IDServicios"];
	$listarProducto->listarTiposDeTrabajoPorIdServicio();
}
if ($tipoOperacion == "listarTerrestrePorIdServicio") {
	$listarProducto = new ajaxServicio();
	$listarProducto->IDServicios = $_POST["IDServicios"];
	$listarProducto->listarTerrestrePorIdServicio();
}
if ($tipoOperacion == "listarTerrestreSelect") {
	$listarProducto = new ajaxServicio();
	$listarProducto->idservicio = $_POST["idservicio"];
	$listarProducto->listarTerrestreSelect();
}
if ($tipoOperacion == "listarObjetos") {
	$listarProducto = new ajaxServicio();
	$listarProducto->IDServicios = $_POST["IDServicios"];
	$listarProducto->listarObjetos();
}
if ($tipoOperacion == "listarTiposDeTrabajo") {
	$listarProducto = new ajaxServicio();
	$listarProducto->IDServicios = $_POST["IDServicios"];
	$listarProducto->listarTiposDeTrabajo();
}
//Editar
if ($tipoOperacion == "editarServicio") {
	$editarServicio = new ajaxServicio();
	$editarServicio->id  	   = $_POST["id"];
	$editarServicio->fecha     = $_POST["fecha"];
	$editarServicio->detalles  = $_POST["detalles"];
	$editarServicio->editarServicio();
}
//Borrar
if ($tipoOperacion == "eliminarServicio") {
	$eliminarCliente = new ajaxServicio();
	$eliminarCliente->id_servicio = $_POST["id_servicio"];
	$eliminarCliente->eliminarServicio();
}
if ($tipoOperacion == "eliminarMaritimo") {
	$eliminarMaritimo = new ajaxServicio();
	$eliminarMaritimo->id_maritimo = $_POST["id_maritimo"];
	$eliminarMaritimo->eliminarMaritimo();
}
if ($tipoOperacion == "eliminarTerrestre") {
	$eliminarTerrestre = new ajaxServicio();
	$eliminarTerrestre->id_terrestre = $_POST["id_terrestre"];
	$eliminarTerrestre->eliminarTerrestre();
}
if ($tipoOperacion == "eliminarOtro") {
	$eliminarOtro = new ajaxServicio();
	$eliminarOtro->id_otro = $_POST["id_otro"];
	$eliminarOtro->eliminarOtro();
}