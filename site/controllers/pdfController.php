<?php

class pdfController extends Controller
{
    private $_pdf;
	private $_alumno;
    public function __construct() {
        parent::__construct();
        $this->getLibrary('fpdf');
		
				
        $this->_pdf = new fpdf;
    }
    
    public function index(){}
	

    public function factura(){

    		print_r($_POST);

	}
	





}

?>
