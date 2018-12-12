<?php 

class ProductosController {
    public function __construct() {
        $this->datos = array();
        $this->controllercall = new Controlador("Productos");
    }
    
    public function Index(){
        $this->datos = $this->controllercall->articuloModelo->obtenerProductos();
        $this->controllercall->cargaVista("Productos",$this->datos);
    }
    
    public function Agregar(){
        $this->controllercall->cargaVista("Agregar",$this->datos);
        if(isset($_POST["nombre"]) && isset($_POST["precio"]) && isset($_POST["descripcion"])){
            $this->datos["nombre"]=$_POST["nombre"];
            $this->datos["precio"]=$_POST["precio"];
            $this->datos["descripcion"]=$_POST["descripcion"];
            $this->datos = $this->controllercall->articuloModelo->agregarProducto($this->datos);
            header("location: " . RUTA_URL ."/Productos");
        }

    }
    
    public function Editar($param){
        $this->datos = $this->controllercall->articuloModelo->obtenerProducto($param);
        print_r($this->datos);
        $this->controllercall->cargaVista("Editar",$this->datos);
        if(isset($_POST["id_producto"])){
            $this->datos->nombre=$_POST["nombre"];
            $this->datos = $this->controllercall->articuloModelo->editarProducto($this->datos);
            header("location: " . RUTA_URL ."/Productos");
        }
        
    }
    
    public function eliminar($param){
        if(isset($param)){
            $this->datos = $param;
        }

        $this->controllercall->cargaVista("Eliminar",$this->datos);
        if(isset($_POST['delprod'])){
            $this->datos = $this->controllercall->articuloModelo->eliminarProducto($param);
            header("location: " . RUTA_URL ."/Productos");
        }
    }
    
}
?>