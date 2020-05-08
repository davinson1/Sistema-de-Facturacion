$(document).ready(function() {
  // Inicializar la tabla
  $("#tabla-usuario").DataTable({
    "responsive": true,
    "autoWidth": true,
    });

  // Llamar el formulario de crear usuarios
  $('#modalCrearUsuario').click(function(){
      $("#listarUsuarios").load("formulario_usuarios");
  });  
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
}