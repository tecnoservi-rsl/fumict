<?php

class registroModel extends Model
{
    public function __construct() {
        parent::__construct();
    }
    
    public function verificarUsuario($login)
    {
        $id_usuario = $this->_db->query(
                "select id_usuario from usuario where login = '$login'"
                );
        


        return $id_usuario->fetch();
    }
    
    public function verificarEmail($email)
    {
        $id_usuario = $this->_db->query(
                "select usuario.id_usuario from usuario,profesor where usuario.id_usuario = profesor.id_usuario and profesor.email = '$email'"
                );
        
        if($id_usuario->fetch()){
            return true;
        }
        
        return false;
    }
	public function verificarCedula($cedula)
    {
        $encargado = $this->_db->query(
                "select * from usuario,profesor where profesor.cedula = '$cedula' and usuario.id_usuario = profesor.id_usuario"
                );
        
       return $encargado->fetch();
            
    }
    
    public function registrarUsuario($login, $pass, $email, $cedula,$nombres,$apellidos,$direccion,$telefono)
    {

        $nombres=strtoupper($nombres);
        $apellidos=strtoupper($apellidos);
        $direccion=strtoupper($direccion);
    	
       

        $sql="insert into usuario values ('','2','$login','" . Hash::getHash('sha1', $pass, HASH_KEY) ."','1')";
        $this->_db->query($sql);
         $id=$this->_db->lastInsertId();
		 $sql="insert into profesor values ('','$id','$cedula','$nombres','$apellidos','$direccion','$telefono','$email')";
        $this->_db->query($sql);
		
        
			
				
	
    }
    public function registrarUsuario_alumno($login, $pass, $cedula)
    {
        
       

        $sql="insert into usuario values ('','3','$login','" . Hash::getHash('sha1', $pass, HASH_KEY) ."','1')";
        $this->_db->query($sql);
         $id=$this->_db->lastInsertId();
         $sql="update alumnos set id_usuario='$id' where cedula='$cedula'";
        $this->_db->query($sql);
        
        
            
                
    
    }
    
   /* public function getUsuario($id_usuario)
	{
		$login = $this->_db->query(
					"select * from usuario where id_usuario = $id_usuario"
					);
					
		return $login->fetch();
	} */

    public function getUsuario($id_usuario, $codigo)
    {
        $usuario = $this->_db->query(
                    "select * from usuario where id_usuario = $id_usuario and codigo = '$codigo'"
                    );
                    
        return $usuario->fetch();
    }
    
    public function activarUsuario($id, $codigo)
    {
        $this->_db->query(
                    "update usuario set estado = 1 " .
                    "where id_usuario = $id and codigo = '$codigo'"
                    );
    }



    
 public function verificar_cedula_alumno($cedula)
    {
        
       

         $sql="select * from alumnos where cedula = '$cedula'";
        $res=$this->_db->query($sql);
        return $res->fetch();
        
            
                
    
    }
     public function verificar_cedula_profesor($cedula)
    {
        
       

         $sql="select id_profesor from profesor where cedula = '$cedula'";
        $res=$this->_db->query($sql);
         $ress=$res->fetch();
        if ($ress) {
            
            return $ress;

        }else{
            $sql="select id_alumno from alumnos where cedula = '$cedula'";
        $res=$this->_db->query($sql);
         return $res->fetch(); 




        }
            
                
    
    }
        

}

?>


