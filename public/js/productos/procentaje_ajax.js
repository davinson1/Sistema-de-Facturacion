// Listar los paises
$(document).ready(function() {
  listarporcentaje();
});

function listarporcentaje(){
  $.ajax({
    type:'get',
    url:('listar_procentaje'),
    success: function(data){
      $('#listarPorcentajes').empty().html(data);
    }
  });
};


// Insertar porcentaje
$('#crearPorcentaje').click(function(e) {
  e.preventDefault();
  var nombre = $("#nombreporcentaje").val();
  var descripcion = $("#descripcionporcentaje").val();
  var porcentaje = $("#porcentaje").val();
  const url = 'porcentaje_crear';
  const params = {'nombre':nombre,
					'descripcion':descripcion,
					'porcentaje':porcentaje
				};
  proccessFunction(url, 'POST', params, callbackStorePorcentaje);
});



// Editar tipos tributarios
function Editar(idporcentaje, nombreporcentaje,descripcion,porcentaje) {
  $("#idporcentaje").val(idporcentaje);
  $("#editnombreporcentaje").val(nombreporcentaje);
  $("#editdescripcionporcentaje").val(descripcion);
  $("#editporcentaje").val(porcentaje);
   console.log('descripcion');
}
$('#editarPorcentaje').click(function(e) {
  e.preventDefault();
  var idporcentaje = $("#idporcentaje").val();
  var nombre = $("#editnombreporcentaje").val();
  var descripcion = $("#editdescripcionporcentaje").val();
  var porcentaje = $("#editporcentaje").val();
  const url = 'porcentaje_editar/'+idporcentaje;
  const params = {'nombre':nombre,
					'descripcion':descripcion,
					'porcentaje':porcentaje,};
  proccessFunction(url, 'PUT', params, callbackStorePorcentaje);
});

// Eliminar tipos tributarios
function Eliminar(idporcentaje, nombreporcentaje) {
  $("#idporcentajec").val(idporcentaje);
  document.getElementById("nombreporcentajea").innerHTML = nombreporcentaje;
}

$('#eliminarporcentaje').click(function(e) {
  e.preventDefault();
  var idporcentaje = $("#idporcentajec").val();
  const url = 'porcentaje_eliminar/'+idporcentaje;
  const params = '';
  proccessFunction(url, 'DELETE', params, callbackStorePorcentaje);
});


function callbackStorePorcentaje(status, response){
  if (status != 200){
       var array = Object.values(response.responseJSON.errors);
        array.forEach(element => toastr.error(element));


    return false;
  };

  toastr.success(response.mensaje);
  $("#nombreporcentaje").val('');
  $("#descripcionporcentaje").val('');
  $("#porcentaje").val('');
  $(".close").click();
  listarporcentaje();
}