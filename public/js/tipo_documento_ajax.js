// Listar tipo de documentos
$(document).ready(function() {
  listaTipoDocumento();
});

function listaTipoDocumento(){
  $.ajax({
    type:'get',
    url:('tabla_tipo_documento'),
    success: function(data){
      $('#listarTipoDocumento').empty().html(data);
    }
  });
};

// Insertar tipo documento
$('#tipoDocumento').click(function(e) {
  e.preventDefault();
  var nombre = $("#nombreTipo").val();
  const url = 'tipo_documento_crear';
  const params = {'nombre':nombre};
  proccessFunction(url, 'POST', params, callbackStoreRoles);
});

// Editar Tipo de documento
function Editar(idTipo, nombreTipo) {  
  $("#idTipoDocumento").val(idTipo);
  $("#editarTipo").val(nombreTipo);
}

$('#editarElTipo').click(function(e) {
  e.preventDefault();
  var idTipo = $("#idTipoDocumento").val();
  var nombre = $("#editarTipo").val();
  const url = 'tipo_documento_editar';
  const params = {'idTipo':idTipo, 'nombre':nombre};
  proccessFunction(url, 'POST', params, callbackStoreRoles);
});

// Eliminar Tipo de documento
function Eliminar(idTipo, nombreTipo) {
  $("#idTipoEliminar").val(idTipo);
  document.getElementById("nombreDeTipo").innerHTML = nombreTipo;
}

$('#eliminarTipo').click(function(e) {
  e.preventDefault();
  var idTipo = $("#idTipoEliminar").val();
  const url = 'tipo_documento_eliminar';
  const params = {'idTipo':idTipo};
  proccessFunction(url, 'POST', params, callbackStoreRoles);
});

function callbackStoreRoles(status, response){
  if (status != 200){
    toastr.error(response.responseJSON.errors.nombre);
    return false;
  };

  toastr.success(response.mensaje);
  $("#nombreTipo").val('');   
  $(".close").click();
  listaTipoDocumento();
}