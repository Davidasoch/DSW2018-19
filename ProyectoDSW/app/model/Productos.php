<?php 
Class Productos {
    

    
    public function __construct() {
        $this->db = new Base;
    }

    
    
    
    public function obtenerProductos(){

        $this->db->query("SELECT * FROM productos;");
        return $this->db->registros();
    }
    
    public function agregarProducto($datos) {
        
        //Ejecutamos la consulta con query
        $this->db->query('INSERT INTO productos VALUES(null,?,?,?)');
        $this->db->bind(1,$datos['nombre']);
        $this->db->bind(2,$datos['precio']);
        $this->db->bind(3,$datos['descripcion']);
        //Vinculamos cada uno de los parámetros con bind
        
        //Ejectuamos y devolvemos true si todo ha ido bien. False en caso contrario
        if ($this->db->execute()) {
            return true;
        }
        else{
            return false;
        }
        header("location: " . RUTA_URL ."/Usuarios");
        
    }   
    
    public function obtenerProducto($id_producto){
        $this->db->query('SELECT * FROM productos WHERE id_producto = ?');
        $this->db->bind(1,$id_producto);
        return $this->db->registro();
    }
    
    public function editarProducto($datos){
        $this->db->query('UPDATE productos SET nombre = ?, precio = ?, descripcion= ? WHERE id_producto = ?');
        $this->db->bind(1,$datos->nombre);
        $this->db->bind(2,$datos->precio);
        $this->db->bind(3,$datos->descripcion);
        $this->db->bind(4,$datos->id_producto);
        if ($this->db->execute()) {
            
            return true;
        }
        else{
            return false;
        }
        
    }
    
    public function eliminarProducto($id_producto){
        $this->db->query('DELETE FROM productos WHERE id_producto = ?');
        $this->db->bind(1,$id_producto);
        
        if ($this->db->execute()) {

            return true;
        }
        else{
            return false;
        }
    }

    
}    
    
?>