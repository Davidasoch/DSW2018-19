<?php 
$viewcall= new Controlador;

$datos=[];

$datos[0] = $viewcall->articuloModelo->obtenerArticulos();
$datos[1]= $viewcall->articuloModelo->obtenerFilas();
$viewcall->cargaVista("Paginas",$datos);
//$date=$viewcall->cargaModelo("Paginas");



class PaginasController {
    public function __construct() {
        echo "Controlador paginas cargado ";

    }
    
    public function actualizar($id) {
        echo "Metodo actualizar\n";
        echo $id;
    }
    
}
?>