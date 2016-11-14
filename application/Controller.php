<?php

/*
 * -------------------------------------
 * www.dlancedu.com | Jaisiel Delance
 * framework mvc basico
 * Controller.php
 * -------------------------------------
 */


abstract class Controller
{
    protected $_view;
    protected $_modelo;
    
    public function __construct() {
        $this->_view = new View(new Request);
        $rutaModelo = ROOT . 'site'.DS.'models' . DS .'_menuModel.php';
        if(is_readable($rutaModelo)){
            require_once $rutaModelo;
            $this->_modelo = new _menuModel;
         if (session::get('autenticado')){
             $this->_view->menu=$this->_modelo->menu(session::get('id_usuario'));   
         }else{
            $this->_view->menu=$this->_modelo->menu(); 
         }
           
        }
        
    }
    
    abstract public function index();
    
    protected function loadModel($modelo)
    {
        $modelo = $modelo . 'Model';
        $rutaModelo = ROOT . 'site'.DS.'models' . DS . $modelo . '.php';
        
        if(is_readable($rutaModelo)){
            require_once $rutaModelo;
            $modelo = new $modelo;
            return $modelo;
        }
        else {
            throw new Exception('Error de modelo '.$modelo);
        }
    }
     protected function includeModel($modelo)
    {
        
        $rutaModelo = ROOT . 'site'.DS.'models' . DS . $modelo . '.php';
        
        if(is_readable($rutaModelo)){
            require_once $rutaModelo;
        }
        else {
            throw new Exception('Error en inclucion de modelo '.$modelo);
        }
    }
    
    protected function getLibrary($libreria)
    {
        $rutaLibreria = ROOT . 'libs' . DS . $libreria . '.php';
        
        if(is_readable($rutaLibreria)){
            require_once $rutaLibreria;
        }
        else{
            throw new Exception('Error de libreria');
        }
    }
    
   
    
    protected function redireccionar($ruta = false)
    {
        if($ruta){
            header('location:' . BASE_URL . $ruta);
            exit;
        }
        else{
            header('location:' . BASE_URL);
            exit;
        }
    }

   
	

	
	
}

?>
