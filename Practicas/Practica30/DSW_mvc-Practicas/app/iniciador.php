<?php 

require_once("Config.php");
spl_autoload_register(function($nombreClase){
    
    if(file_exists("../app/model/".$nombreClase.".php")){
        require_once "../app/model/".$nombreClase.".php";
    }else{
        require_once "libraries/" . $nombreClase . ".php";
    }


    

    //esta funcion comprueba cuando se instancia un nuevo objeto y si la clase no se ha
    // incluido hace un require_once con el nombre de la clase
});
?>