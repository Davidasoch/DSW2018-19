<?php 


class PaginasController {
    public function __construct() {

    }
    
    public function Index(){
        $viewcall= new Controlador("");

        
        $datos=[];
        
        $viewcall->cargaVista("Inicio",$datos);
    }
    
    
}
?>