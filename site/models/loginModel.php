<?php

class loginModel extends Model
{
    public function __construct() {
        parent::__construct();
    }
    
    public function getUsuario($usuario, $password)
    {

     $datos = $this->_db->query( 
                "select * from usuario " .
                "where login = '$usuario' " .
                "and password = '" . Hash::getHash('sha1', $password, HASH_KEY) ."'"
                );
        
        return $datos->fetch();
    }

}

?>
