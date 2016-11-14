<?php


class layoutController extends Controller
{
	
	private $_layout;
	
	
    public function __construct() {
        parent::__construct();
      $this->_layout=$this->loadModel('layout');
		
    }

    public function index()
    {		
			
	}	
	public function eliminarmenu(){

		echo $_POST['id'];

	}

	public function cargar_menu(){


		echo json_encode($this->_layout->cargar_menu());

	}

	public function cargar_sub_menu(){

		echo json_encode($this->_layout->cargar_sub_menu($_POST['id']));
	}
	
}


?>