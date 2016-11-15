$(document).ready(function(){



	if ($('#_ROL_').val()=='3' || $('#_ROL_').val()=='5') {

$(".col-xs-10 > article:nth-child(3) > div:nth-child(2) > div:nth-child(1)").remove();


}
if ($('#_ROL_').val()=='5') {

$(".col-xs-10 > article:nth-child(2) > div:nth-child(2) > div:nth-child(1)").remove();
$("#menu_gestion > center:nth-child(1) > div:nth-child(1)").remove();




}


$(document).on("blur","#cedula",function(){

	

var html="<center> <h4>Verificando cedula, espere un momento... </h4></center>";

				$("#datosrepresentante").html(html);

var cedula=$('#cedula').val();
var id_representante=0;
var xx;
$.post(base_url+'alumno/buscar_representante',{"valor":cedula}, function(datos){
	
			if(datos == false){
				

				html="<center><h4>No existen representantes registrados con ese numero de cedula... </br> Por favor coloque una cedula registrada en el sistema</h4> </center>";

				$("#datosrepresentante").html(html);

				$('#datosestudiante').hide(300);

				}else{


					
			html='<b>Representante:</b> '+datos.nombres+' '+datos.apellidos;
			$('#datosestudiante').show(300);
			 xx="<center> <h4>Buscando la informacion, espere un momento... </h4></center>";
			$("#datosrepresentados").html(xx);
			$("#datosrepresentante").html(html);

				}},"json");
				

		

});




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