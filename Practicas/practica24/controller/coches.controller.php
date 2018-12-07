<?php
require_once 'model/coches.php';

class CochesController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Coche();
    }
    
    public function Index(){
        require_once 'view/coches.php';
    }
    
    public function Crud(){
        $alm = new Coche();
        
        if(isset($_REQUEST['auto_id'])){
            $alm = $this->model->Obtener($_REQUEST['auto_id']);
        }
        
        require_once 'view/coches-editar.php';
    }
    
    public function Guardar(){
        $alm = new Coche();
        
        $alm->auto_id = $_REQUEST['auto_id'];
        $alm->make = $_REQUEST['make'];
        $alm->year = $_REQUEST['year'];
        $alm->mileage = $_REQUEST['mileage'];
        $alm->auto_id > 0 
            ? $this->model->Actualizar($alm)
            : $this->model->Registrar($alm);
        
        header('Location: index.php');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['auto_id']);
        header('Location: index.php');
    }
}
?>