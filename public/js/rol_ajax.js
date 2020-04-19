// ListarRol();
$(document).ready(function() {
  listroles();
});

var listroles = function(){
  $.ajax({
    type:'get',
    url:('roleslist'),
    success: function(data){
      $('#list-roles').empty().html(data);
    }
  });
};

// Insertar rol
$('#roles').click(function(e) {
  e.preventDefault();
  var nombre = $("#nom_rol").val();
  const url = 'roles_crear';
  const params = {'nombre':nombre};
  proccessFunction(url, 'POST', params, callbackStoreRoles);
});

//Editar rol
function Editar(id_rol, nombre_rol) {  
  $("#editar_rol").val(nombre_rol);
  $("#id_rol").val(id_rol);
}

$('#edit_rol').click(function(e) {
  e.preventDefault();
  var nombre = $("#editar_rol").val();
  var id_rol = $("#id_rol").val();
  const url = 'roles_editar';
  const params = {'id_rol':id_rol, 'nombre':nombre};
  proccessFunction(url, 'POST', params, callbackStoreRoles);
});


//Eliminar Rol
function Eliminar(id_rol) {
  $("#id_rol_eliminar").val(id_rol);
}

$('#eliminar_rol').click(function(e) {
  e.preventDefault();
  var id_rol = $("#id_rol_eliminar").val();
  const url = 'roles_eliminar';
  const params = {'id_rol':id_rol};
  proccessFunction(url, 'POST', params, callbackStoreRoles);
});

function callbackStoreRoles(status, response){
  if (status != 200){
    toastr.error(response.responseJSON.errors.nombre);
    return false;
  };

  toastr.success(response.mensaje);
  $("#nom_rol").val('');   
  $(".close").click();
  listroles();
}
