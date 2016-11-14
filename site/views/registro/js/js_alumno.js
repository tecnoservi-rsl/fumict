$(document).ready(function(){


$( document ).on( "change", "#cedula", function() {

	$.get(base_url + 'registro/verificar_cedula_alumno',{

		'cedula':$('#cedula').val()


	},function(datos){

if (!datos){

$('#cedula').val('');
alertify.error('esta cedula no esta registrada');
$('#cedula').focus();

}else if(datos.id_usuario){

$('#cedula').val('');
alertify.error('esta cedula ya tiene un usuario registrado');
$('#cedula').focus();

}

	},'json');


});

$( document ).on( "click", "#registrar_alumno", function() {


if($('#form_registro').validationEngine('validate')){



$.get(base_url + 'registro/registrar_alumno',{
'enviar':1 ,
'cedula':$('#cedula').val(),
'login':$('#loginr').val(),
'pass':$('#pass').val()
},function(datos){

//viewMsjup(0,datos,3000);	



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
		