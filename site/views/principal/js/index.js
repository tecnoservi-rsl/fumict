$(document).ready(function(){



	if ($('#_ROL_').val()=='3' || $('#_ROL_').val()=='5') {

$(".col-xs-10 > article:nth-child(3) > div:nth-child(2) > div:nth-child(1)").remove();


}
if ($('#_ROL_').val()=='5') {

$(".col-xs-10 > article:nth-child(2) > div:nth-child(2) > div:nth-child(1)").remove();
$("#menu_gestion > center:nth-child(1) > div:nth-child(1)").remove();




}



//contlos de proveedor y bancos------------------------------------
$(document).on("click","#opt_",function(){


var controler=this.dataset.controller;
var accion=this.dataset.accion;

document.location=base_url+controler+"?accion="+accion;


});

//------------------------------------------------------------------







$(document).on("click","#x_gestion",function(){


var controler=this.dataset.controller;


document.location=base_url+controler;


});

//------------------------------------------------------------------






























});