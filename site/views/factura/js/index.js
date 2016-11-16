$(document).ready(function(){


//----------------------contlos de proveedor y bancos------------------------------------
$(document).on("blur","#cedula",function()
{
	var html="<center> <h4>Verificando cedula, espere un momento... </h4></center>";
	var xx="";
	$("#datosrepresentante").html(html);
	var cedula=$('#cedula').val();
	var id_representante=0;
	
	$.post(base_url+'factura/buscar_representante',{"valor":cedula}, function(datos){
		if(datos==0){
			html="<center><h4>No existen representantes registrados con ese numero de cedula... </br> Por favor coloque una cedula registrada en el sistema</h4> </center>";
			$("#datosrepresentante").html(html);
			$('#datosestudiante').hide(300);
		}else{
			html='<b>Representante:</b> '+datos.representante.nombres+' '+datos.representante['apellidos'];
			$('#datosestudiante').show(300);

			for (var i = 0; i < datos.representados.length; i++) {
				xx+='<div class="repre well">';
				xx+='<b>Representados:</b> '+datos.representados[i].nombre+' '+datos.representados[i].apellidos+"<br />";
				xx+='<b>DATOS:</b><br />';
				xx+='<b>grado:</b>('+datos.representados[i].grado+') <b>Talla de camisa</b> ('+datos.representados[i].talla_camisa+') <b>Talla de pantalon</b> ('+datos.representados[i].talla_pantalon+")<br />";
				xx+='</div>';
				xx+='<div class="cheke well">';
				xx+='<input class="form-control" name="alumno[]" value="'+datos.representados[i].id_representado+'" type="checkbox" />';
				xx+='</div>';
			}

			



			$("#datosrepresentados").html(xx);
			$("#datosrepresentante").html(html);
	}},"json");
});
//-------------------------------------------------------------------------------

























});