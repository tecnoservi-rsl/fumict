<?php

class registroController extends Controller
{
    private $_registro;
    
    public function __construct() {
        parent::__construct();
        
        $this->_registro = $this->loadModel('registro');
    }
    
    public function index()
{
			$this->_view->area_l="apagada";
		//$this->_view->area_r="apagada";

        if(Session::get('autenticado')){
            $this->redireccionar();
        }
        
           
        
        $this->_view->titulo = 'Registro';
       	//$this->_view->setJs(array('js','validate'));
        $this->_view->setJs(array('index'));
        $this->_view->setCss(array('index'));
        
       
       $this->_view->renderizar('index', 'registro');
     
}
public function verificar_cedula_profesor(){



echo json_encode($this->_registro->verificar_cedula_profesor($_GET['cedula']));



}
 public function regisalum()

{
			$this->_view->area_l="apagada";
		//$this->_view->area_r="apagada";

        if(Session::get('autenticado')){
            $this->redireccionar();
        }
        
           
        
        $this->_view->titulo = 'Registro alumnos';
       $this->_view->setJs(array('js_alumno','validato_alu'));
      $this->_view->setCss(array(''));
        
       
       $this->_view->renderizar('regisalum');
     
}
public function regispro()
{
			$this->_view->area_l="apagada";
		//$this->_view->area_r="apagada";

        if(Session::get('autenticado')){
            $this->redireccionar();
        }
        
           
        
        $this->_view->titulo = 'Registro alumno';
       $this->_view->setJs(array('js','validate_pro'));
      //$this->_view->setCss(array(''));
        
       
       $this->_view->renderizar('regispro');
     
}









public function renderizarinicio(){


     $this->_view->renderizar('index', 'login');


   }



	public function activar($id, $codigo)
	{
		if(!$this->filtrarInt($id) || !$this->filtrarInt($codigo)){
			$this->_view->_error = 'Esta cuenta no existe';
            $this->_view->renderizar('activar', 'registro');
            exit;
		}
		
		
		$row = $this->_registro->getUsuario(
						$this->filtrarInt($id),
						$this->filtrarInt($codigo)
						);
						
		if(!$row){
			$this->_view->_error = 'Esta cuenta no existe';
            $this->_view->renderizar('activar', 'registro');
            exit;
		}
		
		if($row['estado'] == 1){
			$this->_view->_error = 'Esta cuenta ya ha sido activada';
            $this->_view->renderizar('activar', 'registro');
            exit;
		}

		$this->_registro->activarUsuario(
						$this->filtrarInt($id),
						$this->filtrarInt($codigo)
						);
						
		$row = $this->_registro->getUsuario(
						$this->filtrarInt($id),
						$this->filtrarInt($codigo)
						);
						
		if($row['estado'] == 0){
			$this->_view->_error = 'Error al activar la cuenta, por favor intente mas tarde';
            $this->_view->renderizar('activar', 'registro');
            exit;
		}
		
		$this->_view->_mensaje = 'Su cuenta ha sido activada';
		$this->_view->renderizar('activar', 'registro');
	}


public function registrarr(){


            
            
            
            
            
            if($this->_registro->verificarUsuario($_GET['login'])){
                echo 'El login ' . $_GET['login']. ' ya existe';
                
              return;
            }
            
          
            
            if($this->_registro->verificarEmail($_GET['email'])){
                echo 'Esta direccion de correo ya esta registrada';
              return;
               
            }
            
          
            
			
			
			$this->_registro->registrarUsuario(
					$_GET['login'],
                    $_GET['pass'],
                    $_GET['email'],
					$_GET['cedula'],
                    $_GET['nombres'],
                    $_GET['apellidos'],
                    $_GET['direccion'],
                    $_GET['telefono']

                    );
					
			 $usuario = $this->_registro->verificarUsuario($_GET['login']);
			
			
			
			
            if(!$usuario){
                echo 'Error de registro';
        
              return;
            }		
			
            /*

			$this->getLibrary('class.phpmailer');
			
			$mail = new PHPMailer();
            $mail->IsSMTP(); 
			$mail->SMTPDebug  = 1;                   
         	$mail->SMTPAuth   = true; 
			$mail->SMTPSecure = "tls";               
        	$mail->Host       = "smtp.gmail.com";
			//
        	$mail->Username   = "prccnoreply@gmail.com";       
        	$mail->Password   = "20574205";        
			$mail->SetFrom('prccnoreply@gmail.com');
			
			$mail->AddReplyTo("prccnoreply@gmail.com","prcc");    
     		$mail->Subject = 'Activacion de cuenta de usuario';
            $mail->Body = 'Hola ' . $this->getAlphaNum('login') . ',' .
							'Se ha registrado en www.prcc.no-ip.info/mvc para activar ' .
							'su cuenta haga clic sobre el siguiente enlace:' .
							BASE_URL .'registro/activar/' . 
							$usuario['id_usuario'] . '/' . $usuario['codigo']  ;
         	$mail->AddAddress($this->getPostParam('email'));
			
			$mail->Send();            
       
       */

            echo 1;
 }

public function registrar_alumno(){


            
            
            
            
            
            if($this->_registro->verificarUsuario($_GET['login'])){
                echo 'El login ' . $_GET['login']. ' ya existe';
                
              return;
            }
            
          
           
            
          
            
			
			
			$this->_registro->registrarUsuario_alumno(
					$_GET['login'],
                    $_GET['pass'],
					$_GET['cedula']
                    );
					
			 $usuario = $this->_registro->verificarUsuario($_GET['login']);
			
			
			
			
            if(!$usuario){
                echo 'Error de registro';
        
              return;
            }		
			
            /*

			$this->getLibrary('class.phpmailer');
			
			$mail = new PHPMailer();
            $mail->IsSMTP(); 
			$mail->SMTPDebug  = 1;                   
         	$mail->SMTPAuth   = true; 
			$mail->SMTPSecure = "tls";               
        	$mail->Host       = "smtp.gmail.com";
			//
        	$mail->Username   = "prccnoreply@gmail.com";       
        	$mail->Password   = "20574205";        
			$mail->SetFrom('prccnoreply@gmail.com');
			
			$mail->AddReplyTo("prccnoreply@gmail.com","prcc");    
     		$mail->Subject = 'Activacion de cuenta de usuario';
            $mail->Body = 'Hola ' . $this->getAlphaNum('login') . ',' .
							'Se ha registrado en www.prcc.no-ip.info/mvc para activar ' .
							'su cuenta haga clic sobre el siguiente enlace:' .
							BASE_URL .'registro/activar/' . 
							$usuario['id_usuario'] . '/' . $usuario['codigo']  ;
         	$mail->AddAddress($this->getPostParam('email'));
			
			$mail->Send();            
       
       */

            echo 1;
 }



public function verificar_cedula_alumno(){

echo json_encode($this->_registro->verificar_cedula_alumno($_GET['cedula']));

}



}

?>
