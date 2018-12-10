<?php 
//require_once "../app/model/Base.php";
Class Articulos {

    private $db;
    
    
    public function __construct() {
        $this->db = new Base;


    }
    
    public function obtenerArticuslos(){
        echo "Llamada a obtener articulos";
    }

}
?>