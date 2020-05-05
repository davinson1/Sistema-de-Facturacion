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
    var datos = $('#frm_crear_rol').serialize();
    const url = 'roles_crear';
    const params = datos;
    proccessFunction(url, 'POST', params, callbackStoreRoles);
  });

// llamar formulario de editar rol
<<<<<<< HEAD
function Editar(idRol) { 
=======
function Editar(idRol) {
  e.preventDefault();
>>>>>>> departamento
  $.ajax({
      type:'get',
      url:('roles_editar/'+idRol),
      success: function(data){
        $('#formulario').empty().html(data);
      }
  });
}

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
    toastr.error(response.responseJSON.errors.name || response.responseJSON.errors.slug || response.responseJSON.errors.description);
    
    return false;
  };

  toastr.success(response.mensaje);

  $("#nombreRol").val('');   
  $(".close").click();
  listaRoles();
}