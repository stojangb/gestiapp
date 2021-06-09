<?php
//Controladores
require_once "controlador/enrutamiento.controller.php";
require_once "controlador/template.controller.php";
require_once "controlador/clientes.controller.php";
require_once "controlador/empresas.controller.php";
require_once "controlador/tipotrabajos.controller.php";
require_once "controlador/barcazas.controller.php";
require_once "controlador/productos.controller.php";
require_once "controlador/busquedas.controller.php";
//Modelos
require_once "modelo/cliente.modelo.php";
require_once "modelo/empresa.modelo.php";
require_once "modelo/tipotrabajo.modelo.php";
require_once "modelo/producto.modelo.php";
require_once "modelo/barcaza.modelo.php";
require_once "modelo/busqueda.modelo.php";
$template = new ControllerTemplate();
$template->template();
