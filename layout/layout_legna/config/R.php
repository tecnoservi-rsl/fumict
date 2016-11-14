<?php  

$clase ='';

$clase.= (AREA_R_XS == 'hidden') ?  " hidden-xs" :  " col-xs-".AREA_R_XS ;
$clase.= (AREA_R_SM == 'hidden') ?  " hidden-sm" :  " col-sm-".AREA_R_SM ;
$clase.= (AREA_R_MD == 'hidden') ?  " hidden-md" :  " col-md-".AREA_R_MD ;
$clase.= (AREA_R_LG == 'hidden') ?  " hidden-lg" :  " col-lg-".AREA_R_LG ;

?>
<div class="<?php echo $clase; ?>">
<div class="row">