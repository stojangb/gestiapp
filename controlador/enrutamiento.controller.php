<?php
class ControllerEnrutamiento {
	public function enrutamiento() {
		$ruta = $_GET["ruta"];
		if (
		$ruta == "clientes"  ||
		$ruta == "login" || 
		$ruta == "panel" || 
		$ruta == "login" ||
		$ruta == "terrestresyotros" || 
		$ruta == "tipotrabajos" ||
		$ruta == "articulos" ||
		$ruta == "cobro" || 
		$ruta == "productos" || 
		$ruta == "busqueda" || 
		$ruta == "notas" || 
		$ruta == "archivos" || 
		$ruta == "variables" || 
		$ruta == "CrearExcel" || 
		$ruta == "pdf" || 
		$ruta == "ventadetalle" || 
		$ruta == "empresa" 
		) {
		include "vista/".$ruta.".php";
		} else{
		include "vista/panel.php";
	}
	}
}
