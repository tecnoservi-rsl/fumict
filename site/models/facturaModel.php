<?php

class facturaModel extends Model
{
    public function __construct() {
        parent::__construct();
    }
    
public function guardar($datos){

$sql="select id_representante from representantes where cedula='".$datos['cedula']."'";

 $id = $this->_db->query($sql);

$id_representante = $id->fetch();


$sql1="insert into representados values ('','".$datos['nombres']."','".$datos['apellidos']."','".$datos['grado']."','".$datos['talla_camisa']."','".$datos['talla_pantalon']."','".$id_representante[0]."')";
            $this->_db->query($sql1);
     
}


public function buscar_representante($datos){

  $sql="select * from representantes where cedula='$datos'";

 $id = $this->_db->query($sql);

return $id->fetch();

     
}

public function buscar_representados($datos){

 $sql="select * from representados where id_representante='$datos'";

 $id = $this->_db->query($sql);

return $id->fetchall();

     
}
public function buscar_representado($datos){

 $sql="select * from representados where id_representado='$datos'";

 $id = $this->_db->query($sql);

return $id->fetch();

     
}



}

?>
