<?php

include_once 'modelo/conexion.php';

class User extends DB{

    private $nombre;
    public function userExists($user, $pass){


        $query = $this->conexion()->prepare('SELECT * FROM usuarios WHERE correo = :user AND clave = :pass');
        $query->execute(['user' => $user, 'pass' => $pass]);

        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    }

    public function setUser($user){
        $query = $this->conexion()->prepare('SELECT * FROM usuarios WHERE correo = :user');
        $query ->execute(['user' => $user]);

        foreach ($query as $currentUser) {
           // $this->nombre = $currentUser['nombre'];
            $this->nombre = "Joaquin Perez";
        }
    }

    public function getNombre(){
        return $this->nombre;
    }

}

?>