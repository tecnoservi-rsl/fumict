$(document).ready(function(){



	$( document ).on( "change", "#cedula", function() {

	$.get(base_url + 'registro/verificar_cedula_profesor',{

		'cedula':$('#cedula').val()


	},function(datos){

if (datos){

	

$('#cedula').val('');
alertify.error('ya este numero de cedula esta registrada');
$('#cedula').focus();

};

	},'json');


});


$( document ).on( "click", "#volver", function() {


	$.post(base_url + 'registro/renderizarinicio')});






		
$( document ).on( "click", "#registrar", function() {


if($('#form_registro').validationEngine('validate')){



$.get(base_url + 'registro/registrarr',{
'enviar':1 ,
'cedula':$('#cedula').val(),
'apellidos':$('#apellidos').val(),
'nombres':$('#nombres').val(),
'login':$('#loginr').val(),
'email':$('#email').val(),
'pass':$('#pass').val(),
'direccion':$('#direccion').val(),
'telefono':$('#telefono').val()
},function(datos){

viewMsjup(0,datos,3000);	



if(datos==1){
alertify.success('registro completado');

setTimeout(function(){location.href=base_url},3000);

}else{
	alertify.error(datos);
}


	 });
}
});









});
		

	