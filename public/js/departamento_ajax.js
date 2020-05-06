// Listar los departamento
function listadoDepartamentos(){
  $.ajax({
    type:'get',
    url:('listar_departamentos'),
    success: function(data){
      $('#listarDepartamentos').empty().html(data);
    }
  });
};

$(document).ready(function() {
  listadoDepartamentos();
});


// Insertar departamento
$('#crearDepartamento').click(function(e) {
  e.preventDefault();
  var idPais = $("#idPais").val();
  var nombre = $("#nombreDepartamento").val();
  const url = 'departamentos_crear';
  const params = {'idPais':idPais,'nombre':nombre};
  proccessFunction(url, 'POST', params, callbackStoreRoles);
});

//Editar Departamento
function Editar(idDepartamento, nombreDepartamento, idPais, nombrePais) {
  $("#idDepartamento").val(idDepartamento);
  $("#editarDepartamento").val(nombreDepartamento);
  $("#paisSeleccionado").val(idPais).html(nombrePais);
}

$('#editarDepartamento1').click(function(e) {
  e.preventDefault();
  var idPais = $("#editarIdPais").val();
  var idDepartamento = $("#idDepartamento").val();
  var nombre = $("#editarDepartamento").val();
  const url = 'departamentos_editar';
  const params = {'idPais':idPais, 'idDepartamento':idDepartamento, 'nombre':nombre};
  proccessFunction(url, 'POST', params, callbackStoreRoles);
});

//Eliminar municipio
function Eliminar(idDepartamento, nombreDepartamento) {
  document.getElementById("nombreDeDepartamento").innerHTML = nombreDepartamento;
  $("#idDepartamento").val(idDepartamento);
}

$('#eliminarDepartamento').click(function(e) {
  e.preventDefault();
  var idDepartamento = $("#idDepartamento").val();
  const url = 'departamentos_eliminar';
  const params = {'idDepartamento':idDepartamento};
  proccessFunction(url, 'POST', params, callbackDeleteDepartamentos);
});
function callbackDeleteDepartamentos(status, response){
  if (status != 200){
  	if (response.responseJSON.exception == "Illuminate\\Database\\QueryException") {
    toastr.error("Por favor, elimine los municipios asociados a este departamento");
     $(".close").click();
    return false;

    }
 };
  toastr.success(response.mensaje);
  $(".close").click();
  listadoDepartamentos();
}

function callbackStoreRoles(status, response){
  if (status != 200){
    toastr.error(response.responseJSON.errors.nombre);
    return false;
  };

  toastr.success(response.mensaje);
  $("#nombreDepartamento").val('');
  $(".close").click();
  listadoDepartamentos();
}
