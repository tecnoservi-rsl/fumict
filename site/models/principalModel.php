<?php

class principalModel extends Model
{
    public function __construct() {
        parent::__construct();
    }
    
public function traer_publicasion(){



$sql="SELECT * FROM `propiedad` ORDER BY `id_propiedad` DESC limit 0,6 ";

$datos = $this->_db->query($sql);
        
        return $datos->fetchall();



}
public function traer_img($id){


$sql="select * from img where id_propiedad='$id'";

$datos = $this->_db->query($sql);
        
        return $datos->fetchall();



}


}

?>
