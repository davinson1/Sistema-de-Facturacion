// Listar los paises
$(document).ready(function() {
  listadoPaises();
});

function listadoPaises(){
  $.ajax({
    type:'get',
    url:('listar_pais'),
    success: function(data){
      $('#lista-paises').empty().html(data);
    }
  });
};

// Insertar pais
$('#crear_pais').click(function(e) {
  e.preventDefault();
  var nombre = $("#nombre_pais").val();
  const url = 'pais_crear';
  const params = {'nombre':nombre};
  proccessFunction(url, 'POST', params, callbackStoreRoles);
});

//Editar rol
function Editar(id_pais, nombre_pais) {  
  $("#id_pais").val(id_pais);
  $("#editar_pais").val(nombre_pais);
}

$('#edit_pais').click(function(e) {
  e.preventDefault();
  var id_pais = $("#id_pais").val();
  var nombre = $("#editar_pais").val();
  const url = 'pais_editar';
  const params = {'id_pais':id_pais, 'nombre':nombre};
  proccessFunction(url, 'POST', params, callbackStoreRoles);
});

//Eliminar Rol
function Eliminar(id_pais, nombre_pais) {
  $("#id_pais_eliminar").val(id_pais);
  document.getElementById("nombre_de_pais").innerHTML = nombre_pais;
}

$('#eliminar_pais').click(function(e) {
  e.preventDefault();
  var id_pais = $("#id_pais_eliminar").val();
  const url = 'paises_eliminar';
  const params = {'id_pais':id_pais};
  proccessFunction(url, 'POST', params, callbackStoreRoles);
});


function callbackStoreRoles(status, response){
  if (status != 200){
    toastr.error(response.responseJSON.errors.nombre);
    return false;
  };

  toastr.success(response.mensaje);
  $("#nombre_pais").val('');   
  $(".close").click();
  listadoPaises();
}