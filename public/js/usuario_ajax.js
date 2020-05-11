

//Eliminar usuario
function Eliminar(idUsuario, nombreUsuario) {
  document.getElementById("nombreDeUsuario").innerHTML = nombreUsuario;
  $("#idUsuarioEliminar").val(idUsuario);
}
$('#eliminarUsuario').click(function(e) {
  e.preventDefault();
  var idUsuario = $("#idUsuarioEliminar").val();
  const url = 'usuarios_eliminar/'+idUsuario;
  const params = '';
  proccessFunction(url, 'DELETE', params, callbackStoreRoles);
  listadoUsuarios()
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

function recartabla(){
  var table = $('#tabla-usuario').DataTable( {
    ajax: "data.json"
} );
}


// Listar los usuarios
function listadoUsuarios(){
  $.ajax({
    type:'get',
    url:('listar_usuarios'),
    success: function(data){
      $('#ListarUsuarios').empty().html(data);
    }
  });
};

$(document).ready(function() {
  listadoUsuarios();
});
