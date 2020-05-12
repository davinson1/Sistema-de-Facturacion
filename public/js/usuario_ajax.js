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

// Editar usuarios
function Editar(idUsuario){
  $("#ListarUsuarios").load("editar_usuarios/"+idUsuario);  
}

$('#editarElPais').click(function(e) {
  e.preventDefault();
  var idUsuario = $("#idUsuario").val();
  var nombre = $("#editarUsuario").val();
  const url = 'pais_editar';
  const params = {'idUsuario':idUsuario, 'nombre':nombre};
  proccessFunction(url, 'POST', params, callbackStoreMunicipios);
});


// Eliminar usuario
function Eliminar(idUsuario, nombreUsuario) {
  document.getElementById("nombreDeUsuario").innerHTML = nombreUsuario;
  $("#idUsuarioEliminar").val(idUsuario);
}
$('#eliminarUsuario').click(function(e) {
  e.preventDefault();
  var idUsuario = $("#idUsuarioEliminar").val();
  const url = 'usuarios_eliminar/'+idUsuario;
  const params = '';
  proccessFunction(url, 'DELETE', params, callbackStoreMunicipios);
  listadoUsuarios()
});

function callbackStoreMunicipios(status, response){
  if (status != 200){
    toastr.error(response.responseJSON.errors.nombre);
    return false;
  };

  toastr.success(response.mensaje);
  $("#nombreUsuario").val('');
  $(".close").click();

}