<?php

class loginController extends Controller
{
    private $_login;
    
    public function __construct(){
        parent::__construct();
        $this->_login = $this->loadModel('login');
    }
    
    public function index()
    {

        
        if(Session::get('autenticado')){
            $this->redireccionar('principal');
        }
        
        $this->_view->titulo = 'Iniciar Sesion';
        $this->_view->setJs(array('js'));
        $this->_view->setCss(array('css'));

        if(isset($_POST['enviar'])){
            $this->_view->datos = $_POST;
            
            
            $row = $this->_login->getUsuario(
                    $_POST['usuario'],
                    $_POST['pass']
                    );
            
            if(!$row){
                $this->_view->_error = 'Usuario y/o password incorrectos';
                $this->_view->renderizar('index');
                exit;
            }
            
            /*if($row['estado'] != 1){
                $this->_view->_error = 'Este usuario no esta habilitado';
                $this->_view->renderizar('index','login');
                exit;
            }*/
            print_r($row);
                        
            Session::set('autenticado', true);
            Session::set('role', $row['id_role']);
            Session::set('usuario', $row['login']);
            Session::set('id_usuario', $row['id_usuario']);
            Session::set('tiempo', time());
            
           $this->redireccionar();
        }
        
        $this->_view->renderizar('index');
        
    }
    
    public function cerrar()
    {
        Session::destroy();
        $this->redireccionar();
    }
}

?>
