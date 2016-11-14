$(document).ready(function(){

$('#cedula').addClass('validate[required,minSize[6],maxSize[8],custom[integer]]');
$('#nombres').addClass('validate[required,custom[onlyLetterSp]]');
$('#apellidos').addClass('validate[required,custom[onlyLetterSp]]');
$('#direccion').addClass('validate[required]');
$('#telefono').addClass('validate[required,custom[phone]]');
$('#email').addClass('validate[required,custom[email]]');
$('#loginr').addClass('validate[required,minSize[6],maxSize[12]]');
$('#pass').addClass('validate[required,minSize[6],maxSize[12]]');
$('#confirmar').addClass('validate[required,equals[pass],minSize[6],maxSize[12]]');





$('#form_registro').validationEngine();

//$('#form_registro').validationEngine('validate');
				
			

});