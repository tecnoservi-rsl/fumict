<?php
    class facturaController extends Controller
    {
        private $_index;

        public function __construct() {
            parent::__construct();
            $this->_index=$this->loadModel('factura');	
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
        }

        public function buscar_representante(){

            $representante=$this->_index->buscar_representante($_POST['valor']);

            if ($representante) {
               $datos = array(

                'representante' => $representante , 
                'representados' => $this->_index->buscar_representados($representante['id_representante']) 

                );


                echo json_encode($datos); 
            }else{

                echo json_encode(0);
            }

          
           
        }

        


    }
?>