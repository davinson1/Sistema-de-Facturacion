// Listar los paises
$(document).ready(function() {
  listaPaises();
});

function listaPaises(){
  $.ajax({
    type:'get',
    url:('listar_pais'),
    success: function(data){
      $('#listarPaises').empty().html(data);
    }
  });
};

// Insertar país
$('#crearPais').click(function(e) {
  e.preventDefault();
  var nombre = $("#nombrePais").val();
  const url = 'pais_crear';
  const params = {'nombre':nombre};
  proccessFunction(url, 'POST', params, callbackStoreRoles);
});

// Editar país
function Editar(idPais, nombrePais) {  
  $("#idPais").val(idPais);
  $("#editarPais").val(nombrePais);
}

$('#editarElPais').click(function(e) {
  e.preventDefault();
  var idPais = $("#idPais").val();
  var nombre = $("#editarPais").val();
  const url = 'pais_editar';
  const params = {'idPais':idPais, 'nombre':nombre};
  proccessFunction(url, 'POST', params, callbackStoreRoles);
});

// Eliminar país
function Eliminar(idPais, nombrePais) {
  $("#idPaisEliminar").val(idPais);
  document.getElementById("nombreDePais").innerHTML = nombrePais;
}

$('#eliminarPais').click(function(e) {
  e.preventDefault();
  var idPais = $("#idPaisEliminar").val();
  const url = 'paises_eliminar';
  const params = {'idPais':idPais};
  proccessFunction(url, 'POST', params, callbackStoreRoles);
});


function callbackStoreRoles(status, response){
  if (status != 200){
    toastr.error(response.responseJSON.errors.nombre);
    return false;
  };

  toastr.success(response.mensaje);
  $("#nombrePais").val('');   
  $(".close").click();
  listaPaises();
}