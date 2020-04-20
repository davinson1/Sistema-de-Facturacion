// ListarRol();
$(document).ready(function() {
  listar_tipo();
});

function listar_tipo(){
  $.ajax({
    type:'get',
    url:('tabla_tipo_documento'),
    success: function(data){
      $('#listar-tipos-documentos').empty().html(data);
    }
  });
};

// Insertar tipo documento
$('#tipo_documento').click(function(e) {
  e.preventDefault();
  var nombre = $("#nombre_tipo").val();
  const url = 'tipo_documento_crear';
  const params = {'nombre':nombre};
  proccessFunction(url, 'POST', params, callbackStoreRoles);
});

//Editar Tipo de documento
function Editar(id_tip, nombre_tip) {  
  $("#id_tipo_documento").val(id_tip);
  $("#editar_tipo").val(nombre_tip);
}

$('#edit_tipo').click(function(e) {
  e.preventDefault();
  var id_tipo = $("#id_tipo_documento").val();
  var nombre = $("#editar_tipo").val();
  const url = 'tipo_documento_editar';
  const params = {'id_tipo':id_tipo, 'nombre':nombre};
  proccessFunction(url, 'POST', params, callbackStoreRoles);
});

//Eliminar Rol
function Eliminar(id_tipo, nombre_tipo) {
  $("#id_tipo_eliminar").val(id_tipo);
  document.getElementById("nombre_de_tipo").innerHTML = nombre_tipo;
}

$('#eliminar_tipo').click(function(e) {
  e.preventDefault();
  var id_rol = $("#id_tipo_eliminar").val();
  const url = 'tipo_documento_eliminar';
  const params = {'id_tipo':id_rol};
  proccessFunction(url, 'POST', params, callbackStoreRoles);
});

function callbackStoreRoles(status, response){
  if (status != 200){
    toastr.error(response.responseJSON.errors.nombre);
    return false;
  };

  toastr.success(response.mensaje);
  $("#nombre_tipo").val('');   
  $(".close").click();
  listar_tipo();
}