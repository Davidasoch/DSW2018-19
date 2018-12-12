<?php 
class Core {

    protected $controladorActual ="PaginasController"; //Controlador por defecto
    protected $metodoActual = "Index"; // Método por defecto
    protected $parametros = []; // Por defecto no hay parámetros
   
    public function __construct() {
        
        $url = $this->getUrl();
        if (file_exists("../app/controllers/" . ucwords($url[0]) . "Controller.php")) {
            $this->controladorActual = ucwords($url[0]."Controller");
            unset($url[0]);
        }
        
        

        
        require_once "../app/controllers/" . $this->controladorActual . ".php";
        $this->controladorActual = new $this->controladorActual;
        if (isset($url[1])) {//se comprueba si hay un segundo parametro en la url referido al metodo
            if (method_exists($this->controladorActual, $url[1])) {// se comprueba si existe el metodo
                $this->metodoActual = $url[1];// se añade el metodo a la variable del metodo actual
                unset($url[1]);// se limpia el registro en la variable que almacena la posicion del metodo
                $this->parametros = $url ? array_values($url) : [];
                //comprueba si hay contenido en el array url y lo añade a parametros si es el caso

                call_user_func_array ([$this->controladorActual, $this->metodoActual], $this->parametros);
                // esta funcion utiliza un callback llamando al metodo del controlador como funcion actual al que se le envia
                // los parametros y los ejecuta
                
            }else{
                call_user_func_array ([$this->controladorActual, $this->metodoActual], $this->parametros);
            }
        }else{
            call_user_func_array ([$this->controladorActual, $this->metodoActual], $this->parametros);
        }
        
        

        
    }
    
    public function getUrl(){
    if (isset($_GET["url"])) {
        $url = rtrim($_GET["url"], "/");//se eliminan los espacios al final
        $url = filter_var($url, FILTER_SANITIZE_URL);//elimina los caracteres no permitidos en urls
        $url = explode("/", $url);// se divide el string en varios formando un array
        
        return $url;// se devuelve el array con los parametros de la url parseados
    }
  }
}
?>