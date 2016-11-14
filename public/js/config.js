//var base_url = 'http://americas89.no-ip.info:8080/didactico/';
//var base_url = 'http://192.168.0.5/didactico/';
var base_url = 'http://localhost/fumict/';

function viewMsjup(css,menssaje,tiempo){

$("#mensaje").html(menssaje);
switch(css){

case 1:

$("#mensaje").addClass('alert alert-success');
break;

case 2:

$("#mensaje").addClass('alert alert-info');
break;

case 3:

$("#mensaje").addClass('alert alert-warning');
break;

case 4:

$("#mensaje").addClass('alert alert-danger');
break;

default:
$("#mensaje").addClass('alert alert-success');
}

$('#mensaje').show(500,'linear');

setTimeout(viewMsjout,tiempo);

}

function viewMsjout(){
$('#mensaje').hide(500,'linear');
}