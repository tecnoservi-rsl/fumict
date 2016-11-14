<?php 

$clase='';
$cant=0;



if($AREA_L == '1' && $AREA_R == '0'){

$cant= (AREA_L_XS == 'hidden') ?  0 : AREA_L_XS ;
$clase.=' col-xs-'.(12 - $cant);

$cant= (AREA_L_SM == 'hidden') ?  0 : AREA_L_SM ;
$clase.=' col-sm-'.(12 - $cant);

$cant= (AREA_L_MD == 'hidden') ?  0 : AREA_L_MD ;
$clase.=' col-md-'.(12 - $cant);

$cant= (AREA_L_LG == 'hidden') ?  0 : AREA_L_LG ;
$clase.=' col-lg-'.(12 - $cant);


echo '<div class="'.$clase.'"><div class="row">';

}
if($AREA_L == '0' && $AREA_R == '1'){

$cant= (AREA_R_XS == 'hidden') ?  0 : AREA_R_XS ;
$clase.=' col-xs-'.(12 - $cant);

$cant= (AREA_R_SM == 'hidden') ?  0 : AREA_R_SM ;
$clase.=' col-sm-'.(12 - $cant);

$cant= (AREA_R_MD == 'hidden') ?  0 : AREA_R_MD ;
$clase.=' col-md-'.(12 - $cant);

$cant= (AREA_R_LG == 'hidden') ?  0 : AREA_R_LG ;
$clase.=' col-lg-'.(12 - $cant);


echo '<div class="'.$clase.'"><div class="row">';

}

if($AREA_L == '1' && $AREA_R == '1'){

$cant= (AREA_R_XS == 'hidden') ?  0 : AREA_R_XS ;
$cant+= (AREA_L_XS == 'hidden') ?  0 : AREA_L_XS ;
$clase.=' col-xs-'.(12 - $cant);

$cant= (AREA_R_SM == 'hidden') ?  0 : AREA_R_SM ;
$cant+= (AREA_L_SM == 'hidden') ?  0 : AREA_L_SM ;
$clase.=' col-sm-'.(12 - $cant);

$cant= (AREA_R_MD == 'hidden') ?  0 : AREA_R_MD ;
$cant+= (AREA_L_MD == 'hidden') ?  0 : AREA_L_MD ;
$clase.=' col-md-'.(12 - $cant);

$cant= (AREA_R_LG == 'hidden') ?  0 : AREA_R_LG ;
$cant+= (AREA_L_LG == 'hidden') ?  0 : AREA_L_LG ;
$clase.=' col-lg-'.(12 - $cant);


echo '<div class="'.$clase.'"><div class="row">';

}






?>