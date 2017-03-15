<?php

class Configuracion {

    public $user;
    public $password;
    public $host;
    public $bd;
    public $puerto;

    public function __construct() {
        $this->user = "jociste";
        $this->password = "r2L99kq2";
        $this->host = "localhost";
        $this->db = "jociste";
        $this->puerto = "";        
//        $this->user = "root";
//        $this->password = "";
//        $this->host = "localhost";
//        $this->db = "scg_schc";
//        $this->puerto = "";
    }

    public function getUser() {
        return $this->user;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getHost() {
        return $this->host;
    }

    public function getBd() {
        return $this->bd;
    }

    public function getPuerto() {
        return $this->puerto;
    }

}

?>
