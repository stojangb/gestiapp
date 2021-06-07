<?php
Class ControllerBusquedas{
    //Listar
    public static function listarBusquedaMaritimoOTerrestre($fechaInicio, $fechaTermino, $idCliente,$tipotrabajo,$MaritimoOTerrestre)
    {
        $respuesta = ModeloBusquedas::listarBusquedaMaritimoOTerrestre($fechaInicio, $fechaTermino, $idCliente,$tipotrabajo,$MaritimoOTerrestre);
        return $respuesta;
    }
    public static function listarBusquedaOtros($fechaInicio, $fechaTermino, $idCliente,$otros)
    {
        $respuesta = ModeloBusquedas::listarBusquedaOtros($fechaInicio, $fechaTermino, $idCliente,$otros);
        return $respuesta;
    }
    public static function listarBusquedaVueltaFalsa($fechaInicio, $fechaTermino, $idCliente)
    {
        $respuesta = ModeloBusquedas::listarBusquedaVueltaFalsa($fechaInicio, $fechaTermino, $idCliente);
        return $respuesta;
    }
}
?>