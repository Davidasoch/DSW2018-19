<?php 
echo "llamada a controlador";
Class Controlador {
    private $model;
    
    public function __construct() {
        $this->articuloModelo = $this->cargaModelo("Paginas");
    }
    

    
    public function cargaModelo ($modelo) {
        echo "cargo el modelo ".$modelo." ";
        //require_once "../app/model/$modelo.php";
        $this->model = new $modelo();
        return $this->model;
        //Instanciamos el modelo y lo devuelve
        
    }
    
    public function cargaVista ($vista,$datos=[]) {
        // Si el fichero existe lo carga, en caso contrario informa del error y muere    
        if (file_exists("../app/view/" . $vista . ".php")) {
            echo " se accedio a la funcion cargavista";
            require_once RUTA_APP."/app/view/header.php";
            require_once "../app/view/".$vista.".php";
            require_once RUTA_APP."/app/view/footer.php";
        }
    }
}
?>