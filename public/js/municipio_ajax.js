// Listar los municipios
function listadoMunicipios(){
  $.ajax({
    type:'get',
    url:('listar_municipios'),
    success: function(data){
      $('#listarMunicipios').empty().html(data);
    }
  });
};

$(document).ready(function() {
  listadoMunicipios();
});

// Insertar municipio
$('#crearMunicipio').click(function(e) {
  e.preventDefault();
  var idDepartamento = $("#idDepartamento").val();
  var nombre = $("#nombreMunicipio").val();
  const url = 'municipios_crear';
  const params = {'idDepartamento':idDepartamento,'nombre':nombre};
  proccessFunction(url, 'POST', params, callbackStoreRoles);
});


// Editar Municipio
function Editar(idMunicipio, nombreMunicipio, idDepartamento, nombreDepartamento) {  
  $("#idMunicipio").val(idMunicipio);
  $("#editarMunicipio").val(nombreMunicipio);
  $("#editarIdDepartamento > #departamentoSeleccionado").val(idDepartamento).html(nombreDepartamento);  
}

$('#editMunicipio').click(function(e) {
  e.preventDefault();
  var idDepartamento = $("#editarIdDepartamento").val();
  var idMunicipio = $("#idMunicipio").val();
  var nombre = $("#editarMunicipio").val();
  const url = 'municipios_editar';
  const params = {'idDepartamento':idDepartamento, 'idMunicipio':idMunicipio, 'nombre':nombre};
  proccessFunction(url, 'POST', params, callbackStoreRoles);
});

//Eliminar municipio
function Eliminar(idMunicipio, nombreMunicipio) {
  document.getElementById("nombreDeMunicipio").innerHTML = nombreMunicipio;
  $("#idMunicipioEliminar").val(idMunicipio);
}

$('#eliminarMunicipio').click(function(e) {
  e.preventDefault();
  var idMunicipio = $("#idMunicipioEliminar").val();
  const url = 'municipios_eliminar';
  const params = {'idMunicipio':idMunicipio};
  proccessFunction(url, 'POST', params, callbackStoreRoles);
});

function callbackStoreRoles(status, response){
  if (status != 200){
    toastr.error(response.responseJSON.errors.nombre);
    return false;
  };

  toastr.success(response.mensaje);
  $("#nombreMunicipio").val('');   
  $(".close").click();
  listadoMunicipios();
}