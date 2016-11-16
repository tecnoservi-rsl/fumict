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
	

  

	function factura(){


		// print_r($_GET);
		// return;

		$factura=$this->loadModel('factura');	
		$rs_factura=$factura->buscar_representante($_GET['cedula']);
		$codigo=rand(10,9999999999);







		$_pdf= new fpdf('L','mm','A4');
		$_pdf->AddPage();
		$_pdf->SetFont('Arial','B',15);
		$_pdf->ln(2);
		
		$_pdf->Cell(0,6,"FACTURA",0,1,'C');
		$_pdf->SetFont('Arial','',10);
		;
		$_pdf->Cell(30,4,"DOCUMENTO",0,0,'L');
		$_pdf->Cell(2,4,":",0,0,'L');
		$_pdf->Cell(40,4,$codigo,'L');
		
		$_pdf->Cell(10,4,"FECHA",0,0,'L');
		$_pdf->Cell(2,4,":",0,0,'L');
		$_pdf->Cell(20,4,date('d-m-Y'),0,1,'L');
		
		$_pdf->Cell(30,4,"ENTREGUESE A:",0,0,'L');
		$_pdf->Cell(2,4,":",0,0,'L');
		$_pdf->Cell(20,4,$rs_factura["nombres"]." ".$rs_factura["apellidos"] ,0,1,'L');
		
		$_pdf->Cell(30,4,"CEDULA",0,0,'L');
		$_pdf->Cell(2,4,":",0,0,'L');
		$_pdf->Cell(20,4,$rs_factura["cedula"],0,1,'L');

		$_pdf->ln(20);
		$_pdf->Cell(($_pdf->w)-36,4,"DETALLES",1,1,'C');
		$_pdf->Cell(($_pdf->w/6)-6,4,"NRO",1,0,'L');
		$_pdf->Cell(($_pdf->w/6)-6,4,"NOMBRE",1,0,'L');
		$_pdf->Cell(($_pdf->w/6)-6,4,"APELLIDO",1,0,'L');
		$_pdf->Cell(($_pdf->w/6)-6,4,"CAMISA",1,0,'L');
		$_pdf->Cell(($_pdf->w/6)-6,4,"PANTALON",1,0,'L');
		$_pdf->Cell(($_pdf->w/6)-6,4,"SUBTOTAL",1,1,'L');

		$_total=0;

		for ($i=0; $i < count($_GET['alumno']); $i++) { 
		$_total+=2600;
		$alumno=$factura->buscar_representado($_GET['alumno'][$i]);
		$_pdf->Cell(($_pdf->w/6)-6,4,$i+1,1,0,'L');
		$_pdf->Cell(($_pdf->w/6)-6,4,$alumno["nombre"],1,0,'L');
		$_pdf->Cell(($_pdf->w/6)-6,4,$alumno["apellidos"],1,0,'L');
		$_pdf->Cell(($_pdf->w/6)-6,4,$alumno["talla_camisa"],1,0,'L');
		$_pdf->Cell(($_pdf->w/6)-6,4,$alumno["talla_pantalon"],1,0,'L');
		$_pdf->Cell(($_pdf->w/6)-6,4,number_format(2600,2,",","."),1,1,'R');
	
		}


		$_pdf->Cell(($_pdf->w/6)-6,4,"",0,0,'L');
		$_pdf->Cell(($_pdf->w/6)-6,4,"",0,0,'L');
		$_pdf->Cell(($_pdf->w/6)-6,4,"",0,0,'L');
		$_pdf->Cell(($_pdf->w/6)-6,4,"",0,0,'L');
		$_pdf->Cell(($_pdf->w/6)-6,4,"TOTAL",1,0,'L');
		$_pdf->Cell(($_pdf->w/6)-6,4,number_format($_total,2,",","."),1,1,'R');



		$_pdf->ln(60);


		$_pdf->Cell(($_pdf->w/2)-6,4,"FIRMA",0,0,'C');
		$_pdf->Cell(($_pdf->w/2)-6,4,"SELLO",0,0,'C');
		
	




		
		
		$_pdf->Output();
	}
	





}

?>
