<?php
Class ControllerClientes{
    public static function listarClientes(){
        $tabla = "clientes";
        $respuesta = ModeloClientes::listarCliente($tabla);
        return $respuesta;
    }

    public static function listarClientesYRut($id){
        $tabla = "clientes";
        $respuesta = ModeloClientes::listarClienteYRut($tabla,$id);
        return $respuesta;
    }

    static public function CrearClientes($datos) {
        $cliente = "clientes";
        $respuesta = ModeloClientes::CrearCliente($cliente, $datos);
        return $respuesta;
    }

    static public function EliminarClientes($id_cliente) {
        $cliente = "clientes";
        $respuesta = ModeloClientes::EliminarCliente($cliente, $id_cliente);
        return $respuesta;
    }

    static public function EditarClientes($datos) {
        $cliente = "clientes";
        $respuesta = ModeloClientes::EditarCliente($cliente, $datos);
        return $respuesta;
    }
}
