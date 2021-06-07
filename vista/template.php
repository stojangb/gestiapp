<?php 
      if(isset($_GET["ruta"])) {
        $enrutar = new ControllerEnrutamiento();
        $enrutar -> enrutamiento();
      }else{
        header("Location: login");
        exit;
      }
