<?php
Class ControllerClientes{
    public static function listarClientes(){
        $respuesta = ModeloClientes::listarCliente();
        return $respuesta;
    }
    public static function listarBancos(){
        $respuesta = ModeloClientes::listarBancos();
        return $respuesta;
    }
    public static function listarTipoCuenta(){
        $respuesta = ModeloClientes::listarTipoCuenta();
        return $respuesta;
    }
    public static function listarFormaPago(){
        $respuesta = ModeloClientes::listarFormaPago();
        return $respuesta;
    }
    public static function listarClientesYRut($id){
        $respuesta = ModeloClientes::listarClienteYRut($id);
        return $respuesta;
    }
    static public function CrearClientes($datos) {
        $respuesta = ModeloClientes::CrearCliente($datos);
        return $respuesta;
    }
    static public function EliminarClientes($id_cliente) {
        $respuesta = ModeloClientes::EliminarCliente($id_cliente);
        return $respuesta;
    }
    static public function EditarClientes($datos) {
        $respuesta = ModeloClientes::EditarCliente($datos);
        return $respuesta;
    }
}
