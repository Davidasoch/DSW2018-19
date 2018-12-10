<?php 
Class Paginas {
    
    
    public function __construct() {
        $this->db = new Base;
    }

    
    
    public function obtenerFilas()
    {
      return  $this->db->filas();
    }
    
    public function obtenerArticulos(){

        $this->db->query("SELECT * FROM articulos;");
        return $this->db->registros();
    }
}
?>