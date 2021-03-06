<?php
Class ControllerProductos{
    public static function listarProductos(){
        $tabla = "productos";
        $respuesta = ModeloProductos::listarProducto($tabla);
        return $respuesta;
    }
    public static function listarProductosPorEmpresa($id_empresa){
        $respuesta = ModeloProductos::listarProductosPorEmpresa($id_empresa);
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
    public static function listarProductosMaritimosPanel2($v){
        $respuesta = ModeloProductos::listarProductoMaritimoPanel2($v);
        return $respuesta;
    }
    public static function listarProductosTerrestresPanel(){
        $respuesta = ModeloProductos::listarProductoTerrestrePanel();
        return $respuesta;
    }

    static public function CrearProductos($datos) {
		$respuesta = ModeloProductos::CrearProducto($datos);
		return $respuesta;
    }

    //Listar
    static public function EditarProductos($datos)
    {
      $respuesta = ModeloProductos::EditarProducto($datos);
      return $respuesta;
    }
  
     static public function EliminarProductos($id)
    {
      $respuesta = ModeloProductos::EliminarProducto($id);
      return $respuesta;
    } 
}
?>