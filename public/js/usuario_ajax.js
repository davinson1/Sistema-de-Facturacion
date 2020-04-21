// Listar los Usuarios
function listadoUsuarios(){
  $.ajax({
    type:'get',
    url:('listar_usuarios'),
    success: function(data){
      $('#listarUsuarios').empty().html(data);
    }
  });
};

$(document).ready(function() {
  listadoUsuarios();
});

//Eliminar usuario
function Eliminar(idUsuario, nombreUsuario) {
  document.getElementById("nombreDeUsuario").innerHTML = nombreUsuario;
  $("#idUsuarioEliminar").val(idMunicipio);
}

$('#eliminarUsuario').click(function(e) {
  e.preventDefault();
  var idUsuario = $("#idUsuarioEliminar").val();
  const url = 'usuarios_eliminar';
  const params = {'idUsuario':idUsuario};
  proccessFunction(url, 'POST', params, callbackStoreRoles);
});

function callbackStoreRoles(status, response){
  if (status != 200){
    toastr.error(response.responseJSON.errors.nombre);
    return false;
  };

  toastr.success(response.mensaje);
  $("#nombreUsuario").val('');   
  $(".close").click();
  listadoMunicipios();
}