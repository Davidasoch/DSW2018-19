<?php 
$viewcall= new Controlador;
$arrdatos=[];
$arrdatos["name"]="David";
$viewcall->cargaVista("Articulos",$arrdatos);

class Articulos {
    public function __construct() {
        echo "Controlador articulos cargado";
      $check =  $this->Ver();
      echo $check;
    }
    
    
    public function Ver(){
    return "Estas viendo algo";
    }
    
}
?>