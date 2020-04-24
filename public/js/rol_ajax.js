// Listar los roles
$(document).ready(function() {
  listaRoles();
});

function listaRoles(){
  $.ajax({
    type:'get',
    url:('listar_roles'),
    success: function(data){
      $('#listarRoles').empty().html(data);
    }
  });
};

// Insertar rol
$('#roles').click(function(e) {
  e.preventDefault();
  var nombre = $("#nombreRol").val();
  const url = 'roles_crear';
  const params = {'nombre':nombre};
  proccessFunction(url, 'POST', params, callbackStoreRoles);
});

//Editar rol
function Editar(idRol, nombreRol) {  
  $("#idRol").val(idRol);
  $("#editarRol").val(nombreRol);
}

$('#editarElRol').click(function(e) {
  e.preventDefault();
  var nombre = $("#editarRol").val();
  var idRol = $("#idRol").val();
  const url = 'roles_editar';
  const params = {'idRol':idRol, 'nombre':nombre};
  proccessFunction(url, 'POST', params, callbackStoreRoles);
});


//Eliminar Rol
function Eliminar(idRol, nombreRol) {
  $("#idRolEliminar").val(idRol);
  document.getElementById("nombreDeRol").innerHTML = nombreRol;
}

$('#eliminarRol').click(function(e) {
  e.preventDefault();
  var idRol = $("#idRolEliminar").val();
  const url = 'roles_eliminar';
  const params = {'idRol':idRol};
  proccessFunction(url, 'POST', params, callbackStoreRoles);
});

function callbackStoreRoles(status, response){
  if (status != 200){
    toastr.error(response.responseJSON.errors.nombre);
    return false;
  };

  toastr.success(response.mensaje);
  $("#nombreRol").val('');   
  $(".close").click();
  listaRoles();
}