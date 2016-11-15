<?php


class registrarController extends Controller
{
	
	private $_index;
    public function __construct() {
        parent::__construct();
  	$this->_index=$this->loadModel('registrar');	
    }

    public function index()
    {

    	 $array = array();
       
		
			$this->_view->setJs(array('index'));
			$this->_view->setCss(array('css'));
        	$this->_view->titulo = 'index';
			$this->_view->renderizar('index');
							
			
	}


	public function guardar()
        {
               
            
                $this->_index->guardar($_POST);
               
                $this->redireccionar('registrar');
        }

	
}


?>