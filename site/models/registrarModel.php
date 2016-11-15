<?php

class registrarModel extends Model
{
    public function __construct() {
        parent::__construct();
    }
    
public function guardar($datos){



$sql="insert into representantes values ('','".$datos['cedula']."', '".$datos['nombres']."','".$datos['apellidos']."')";
            $this->_db->query($sql);
     
}
public function traer_img($id){


$sql="select * from img where id_propiedad='$id'";

$datos = $this->_db->query($sql);
        
        return $datos->fetchall();



}


}

?>
