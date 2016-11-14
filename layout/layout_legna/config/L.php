<?php  

$clase ='';

$clase.= (AREA_L_XS == 'hidden') ?  " hidden-xs" :  " col-xs-".AREA_L_XS ;
$clase.= (AREA_L_SM == 'hidden') ?  " hidden-sm" :  " col-sm-".AREA_L_SM ;
$clase.= (AREA_L_MD == 'hidden') ?  " hidden-md" :  " col-md-".AREA_L_MD ;
$clase.= (AREA_L_LG == 'hidden') ?  " hidden-lg" :  " col-lg-".AREA_L_LG ;

?>
<div class="<?php echo $clase; ?>">
<div class="row">