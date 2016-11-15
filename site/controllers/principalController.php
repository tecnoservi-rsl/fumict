<?php


class principalController extends Controller
{
	
	private $_index;
    public function __construct() {
        parent::__construct();
  	// $this->_index=$this->loadModel('principal');	
    }

    public function index()
    {

    	 $array = array();
       
		
			$this->_view->setJs(array('index'));
			$this->_view->setCss(array('css'));
        	$this->_view->titulo = 'index';
			$this->_view->renderizar('index');
							
			
	}


	public function registrar()
    {

    	 $array = array();
       
		
			$this->_view->setJs(array('index'));
			$this->_view->setCss(array('css'));
        	$this->_view->titulo = 'index';
			$this->_view->renderizar('index');
							
			
	}		
	
}


?>