<?php 
Class Base {

    private $dbh; //DataBase Handler
    private $stmt;
    private $error;
    
    private $dbuser=DB_USER;
    private $dbpassword=DB_PASSWORD;
    private $dbhost=DB_HOST;
    private $dbname=DB_NAME;
    private $dbport=DB_PORT;
    
    
    
    public function __construct() {
        //Configuramos la conexi�n
        $dsn = "mysql:host=" . $this->dbhost .";port=".$this->dbport.";dbname=" . $this->dbname;
        $opciones = array (
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        
        try {
            //TO DO: CONEXI�N CON LA BBDD
            $pdo = new PDO($dsn, $this->dbuser,$this->dbpassword);
            $this->dbh=$pdo;
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo " estas conectado !!!! ";
            
        }
        catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }
    
    public function query ($sql) {
        //esta funcion prepara la consulta que se le pasa  como parametro y la guarda
        $this->stmt = $this->dbh->prepare($sql);
    }
    
    public function execute () {
        //esta funcion ejecuta la sentencia sql en la base de datos definida
        return $this->stmt->execute();
    }
    
    public function registros() {
        //esta funcion llama a la encargada de ejecutar la sentencia
        $this->execute();
        // y devuelve los datos obtenidos
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }    
    
    
    public function bind ($param, $valor, $tipo = null) {
        // la funcion recibe el nombre del parametroy su valor
        if (is_null($tipo)) {
            switch (true) {
                // mediante un swtich identifica si se trata de un entero, un booleano, si es null y en su defecto una string
                case is_int($valor):
                    $tipo = PDO::PARAM_INT;
                    break;
                case is_bool($valor):
                    $tipo = PDO::PARAM_BOOL;
                    break;
                case is_null($valor):
                    $tipo = PDO::PARAM_NULL;
                    break;
                default:
                    $tipo = PDO::PARAM_STR;
                    
            }
        }
        // en nuestra setencia donde hemos definido las variables que seran modificadas, les pasamos las nuevas
        $this->stmt->bindValue($param, $valor, $tipo);
        //Bindvalue(); Vincula un valor al par�metro de sustituci�n con nombre o de signo de interrogaci�n
        //de la sentencia SQL que se utiliz� para preparar la sentencia. 
    }
    
    public function filas(){
        return $this->stmt->rowCount();
    }
    
    
}
?>


