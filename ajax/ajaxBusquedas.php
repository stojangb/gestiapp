<?php
require_once "../controlador/busquedas.controller.php";
require_once "../modelo/busqueda.modelo.php";
class ajaxBusquedas
{
	//Listar
	public function listarBusquedaMaritimoOTerrestre()
	{
		$fechaInicio = $this->fechaInicio;
		$fechaTermino = $this->fechaTermino;
		$idCliente = $this->idCliente;
		$idEmpresa = $this->idEmpresa;
		$respuesta = ControllerBusquedas::listarBusquedaMaritimoOTerrestre($fechaInicio, $fechaTermino, $idCliente, $idEmpresa);
		echo json_encode($respuesta);
	}
	public function listarBusquedaOtros()
	{
		$fechaInicio = $this->fechaInicio;
		$fechaTermino = $this->fechaTermino;
		$idCliente = $this->idCliente;
		$otros = $this->otros;
		$respuesta = ControllerBusquedas::listarBusquedaOtros($fechaInicio, $fechaTermino, $idCliente, $otros);
		echo json_encode($respuesta);
	}
	public function listarBusquedaVueltaFalsa()
	{
		$fechaInicio = $this->fechaInicio;
		$fechaTermino = $this->fechaTermino;
		$idCliente = $this->idCliente;
		$respuesta = ControllerBusquedas::listarBusquedaVueltaFalsa($fechaInicio, $fechaTermino, $idCliente);
		echo json_encode($respuesta);
	}
}

$tipoOperacion = $_POST["tipoOperacion"];

if ($tipoOperacion == "listarBusquedaOtros") {
	$operacion = new ajaxBusquedas();
	$operacion->idCliente = $_POST["idCliente"];
	$operacion->fechaInicio = $_POST["fechaInicio"];
	$operacion->fechaTermino = $_POST["fechaTermino"];
	$operacion->otros = $_POST["otros"];
	$operacion->listarBusquedaOtros();
}
if ($tipoOperacion == "listarBusquedaVueltaFalsa") {
	$operacion = new ajaxBusquedas();
	$operacion->idCliente = $_POST["idCliente"];
	$operacion->fechaInicio = $_POST["fechaInicio"];
	$operacion->fechaTermino = $_POST["fechaTermino"];
	$operacion->listarBusquedaVueltaFalsa();
}
if ($tipoOperacion == "listarBusquedaMaritimoOTerrestre") {
	$operacion = new ajaxBusquedas();
	$operacion->idCliente = $_POST["idCliente"];
	$operacion->idEmpresa = $_POST["idEmpresa"];
	$operacion->fechaInicio = $_POST["fechaInicio"];
	$operacion->fechaTermino = $_POST["fechaTermino"];
	$operacion->listarBusquedaMaritimoOTerrestre();
}
