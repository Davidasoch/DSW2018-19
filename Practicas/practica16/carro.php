<?php
// Definimos la clase
class Cart{
     
    // Atributos
    public $carrito = array(
        "id" => 0
    );
     
    // Constructor
    public function __construct($id, $cantidad){
        $this->carrito = array($id =>$cantidad);

    }
    
    //funciones
     
    public function addproduct($id,$cantidad){
        
        if (array_key_exists($id,$this->carrito))
        {
            $this->carrito[$id]+=$cantidad;
            echo "<p>La cantidad del producto".$id.' ha aumentado en '.$cantidad.'</p>';
        }
        else
        {
            $this->carrito[$id]=$cantidad;
            echo "<p>Se ha creado el producto con id ".$id." exitosamente</p>";
        }
        
    }
    
    public function delproduct($id,$cantidad){
        
        if (array_key_exists($id,$this->carrito))
        {
            $this->carrito[$id]-=$cantidad;
            echo "<p>La cantidad del producto".$id.' ha disminuido en '.$cantidad.'</p>';
            if($this->carrito[$id]<=0){
                unset($this->carrito[$id]);
                echo "<p>El producto".$id.' ha sido borrado<p/>';
            }
        }
        else
        {
            
            echo "<p>El producto no existe!</p>";
        }
        
    }

     
    public function mostrarInfo(){
         

        foreach ($this->carrito as $item =>$value){
            echo '<p>id de producto: '.$item.", cantidad: ".$value."</p>";
        }
      
    }

}

class subc extends Cart{
   public $cliente="";
    
   
   // Constructor
   public function __construct(){
       $this->carrito = array(10 =>1);
   }
   //
       public function setclient($client){
           $this->cliente = $client;
           
       }
       
       public function getclient(){
           echo $this->cliente;
       }
       
       public function mostrarInfo(){
           
           
           foreach ($this->carrito as $item =>$value){
               echo '<p>id de producto: '.$item.", cantidad: ".$value."</p>";
           }
           
       }
   
}
?>


<!DOCTYPE HTML>
<html lang="es">
<head>
    <meta charset="utf-8"/>
    <title>El constructor</title>
</head>
<body>
 
<?php
// Creamos el objeto / Instanciamos la clase y le pasamos los parámetros del constructor
$carro1 = new Cart('34',10);
$carro1->addproduct('78934',10);
$carro1->addproduct('19385',15);
$carro1->addproduct('34',10);
$carro1->delproduct('34',19);
$carro1->delproduct('34',5);
$carro1->mostrarInfo();
$cliente1 = new subc();
$cliente1->getclient();
$cliente1->setclient("Alejandro");
$cliente1->getclient();
$cliente1->mostrarInfo();



 
?>
 
</body>
</html>