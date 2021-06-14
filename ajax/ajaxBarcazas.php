<?php
require_once "../controlador/barcazas.controller.php";
require_once "../modelo/barcaza.modelo.php";
Class ajaxBarcazas {
	//Insertar
	public function crearBarcaza(){
		$datos = array(	
						"cliente"        =>$this->cliente,
						"producto"     =>$this->producto,
						"matricula"    =>$this->matricula,
					);
		$respuesta = ControllerArticulos::CrearBarcaza($datos);
		echo $respuesta;
	}
	//editar
	public function editarBarcaza(){
		$datos = array(	
						"id"=>$this->id,
						"cliente"        =>$this->cliente,
						"producto"     =>$this->producto,
						"matricula"    =>$this->matricula,
					);
		$respuesta = ControllerArticulos::EditarBarcaza($datos);
		echo $respuesta;
	}
	//ELiminar
	public function eliminarBarcaza(){
		$id_barcaza = $this->id_barcaza;
		$respuesta = ControllerArticulos::EliminarBarcaza($id_barcaza);
		echo $respuesta;
	}
	//Listar

	public function listarProductoPorTipo(){
		$tipodeproducto = $this->tipodeproducto;
		$respuesta = ControllerArticulos::listarProductosPorTipo($tipodeproducto);
		echo json_encode($respuesta);
	}
	public function listarCertificados2Meses(){
		$respuesta = ControllerArticulos::listarCertificados2Meses();
		echo json_encode($respuesta);
	}

	public function listarBarcazasPorCliente(){
		$cliente = $this->cliente;
		$respuesta = ControllerArticulos::listarBarcazasPorCliente($cliente);
		echo json_encode($respuesta);
	}
	public function listarPatenteMaritimoPorServicio(){
		$idservicio = $this->idservicio;
		$respuesta = ControllerArticulos::listarPatenteMaritimoPorServicio($idservicio);
		echo json_encode($respuesta);
	}
	public function listarPatenteTerrestrePorServicio(){
		$idservicio = $this->idservicio;
		$respuesta = ControllerArticulos::listarPatenteTerrestrePorServicio($idservicio);
		echo json_encode($respuesta);
	}
	public function listarRelacionTerrestreOtroPorServicio(){
		$idservicio = $this->idservicio;
		$respuesta = ControllerArticulos::listarRelacionTerrestreOtroPorServicio($idservicio);
		echo json_encode($respuesta);
	}
	public function listarRelacionMaritimoOtroPorServicio(){
		$idservicio = $this->idservicio;
		$respuesta = ControllerArticulos::listarRelacionMaritimoOtroPorServicio($idservicio);
		echo json_encode($respuesta);
	}
}

$tipoOperacion = $_POST["tipoOperacion"];
if($tipoOperacion == "insertarBarcaza") {
	$crearNuevoPrecio = new ajaxBarcazas();
	$crearNuevoPrecio ->	cliente        =     $_POST["cliente"];
	$crearNuevoPrecio ->	producto     =     $_POST["producto"];
	$crearNuevoPrecio ->	matricula       =     $_POST["matricula"];
	$crearNuevoPrecio ->	crearBarcaza();
}

if($tipoOperacion == "editarBarcaza") {
	$crearNuevoPrecio = new ajaxBarcazas();
	$crearNuevoPrecio ->	id        =     $_POST["id"];
	$crearNuevoPrecio ->	cliente        =     $_POST["cliente"];
	$crearNuevoPrecio ->	producto     =     $_POST["producto"];
	$crearNuevoPrecio ->	matricula       =     $_POST["matricula"];
	$crearNuevoPrecio ->	editarBarcaza();
}

if ($tipoOperacion == "EliminarBarcaza") {
	$eliminarPrecio = new ajaxBarcazas();
	$eliminarPrecio -> id_barcaza = $_POST["id"];
	$eliminarPrecio -> eliminarBarcaza();
}

if ($tipoOperacion == "listarProductoPorTipo") {
	$listarProducto = new ajaxBarcazas();
	$listarProducto -> tipodeproducto = $_POST["tipodeproducto"];
	$listarProducto -> listarProductoPorTipo();
}

if ($tipoOperacion == "listarBarcazasPorCliente") {
	$listarProducto = new ajaxBarcazas();
	$listarProducto -> cliente = $_POST["cliente"];
	$listarProducto -> listarBarcazasPorCliente();
}

if ($tipoOperacion == "listarCertificados2Meses") {
	$listarProducto = new ajaxBarcazas();
	$listarProducto -> listarCertificados2Meses();
}
if ($tipoOperacion == "listarPatenteMaritimoPorServicio") {
	$listarProducto = new ajaxBarcazas();
	$listarProducto -> idservicio = $_POST["idservicio"];
	$listarProducto -> listarPatenteMaritimoPorServicio();
}
if ($tipoOperacion == "listarPatenteTerrestrePorServicio") {
	$listarProducto = new ajaxBarcazas();
	$listarProducto -> idservicio = $_POST["idservicio"];
	$listarProducto -> listarPatenteTerrestrePorServicio();
}
if ($tipoOperacion == "listarRelacionMaritimoOtroPorServicio") {
	$listarProducto = new ajaxBarcazas();
	$listarProducto -> idservicio = $_POST["idservicio"];
	$listarProducto -> listarRelacionMaritimoOtroPorServicio();
}
if ($tipoOperacion == "listarRelacionTerrestreOtroPorServicio") {
	$listarProducto = new ajaxBarcazas();
	$listarProducto -> idservicio = $_POST["idservicio"];
	$listarProducto -> listarRelacionTerrestreOtroPorServicio();
}
?>