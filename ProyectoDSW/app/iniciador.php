<?php 
// cargamos el archivo de configuracion
require_once "Config.php";

//utilizamos un autoloader
spl_autoload_register(function($nombreClase){
    
    if(file_exists("../app/model/".$nombreClase.".php")){
        require_once "../app/model/".$nombreClase.".php";
    }else if(file_exists("../app/libraries/".$nombreClase.".php")){
        require_once "../app/libraries/" . $nombreClase . ".php";
    }
});
?>