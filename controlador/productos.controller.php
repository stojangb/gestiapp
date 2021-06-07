<?php
Class ControllerProductos{
    public static function listarProductos(){
        $tabla = "productos";
        $respuesta = ModeloProductos::listarProducto($tabla);
        return $respuesta;
    }
    public static function listarProductosOtros(){
        $respuesta = ModeloProductos::listarProductosOtros();
        return $respuesta;
    }
    public static function listarProductosOtrosPanel(){
        $respuesta = ModeloProductos::listarProductoOtrosPanel();
        return $respuesta;
    }
    public static function listarProductosMaritimosPanel(){
        $respuesta = ModeloProductos::listarProductoMaritimoPanel();
        return $respuesta;
    }
    public static function listarProductosTerrestresPanel(){
        $respuesta = ModeloProductos::listarProductoTerrestrePanel();
        return $respuesta;
    }
    public static function listarProductosPorTipo($datos){
        $tabla = "productos";
        $respuesta = ModeloProductos::listarProductoPorTipo($tabla, $datos);
        return $respuesta;
    }

    static public function CrearProductos($datos) {
		$tablaname = "productos";
		$respuesta = ModeloProductos::CrearProducto($tablaname, $datos);
		return $respuesta;
    }

    //Listar
    static public function EditarProductos($datos)
    {
      $tablaname = "productos";
      $respuesta = ModeloProductos::EditarProducto($tablaname, $datos);
      return $respuesta;
    }
  
     static public function EliminarProductos($id)
    {
      $respuesta = ModeloProductos::EliminarProducto($id);
      return $respuesta;
    } 
}
?>