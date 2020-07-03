// Listar las empresas
$(document).ready(function() {
  // Selectores de busqueda
  $('.select-empresa').select2({
    theme: 'bootstrap4',
  });
  listarEmpresa();
});

function listarEmpresa(){
  $.ajax({
    type:'get',
    url:('listar_empresa'),
    success: function(data){
      $('#ListarEmpresas').empty().html(data);
    }
  });
};

// Insertar empresa
$('#crearEmpresa').click(function(e) {
  e.preventDefault();
  var datos = $('#frm_crear_empresa').serialize();
  const url = 'empresa_crear';
  const params = datos;
  proccessFunction(url, 'POST', params, callbackStoreEmpresa);
});

// llamar formulario de editar empresa
function Editar(idEmpresa) {
  $.ajax({
      type:'get',
      url:('empresa_editar/'+idEmpresa),
      success: function(data){
        $('#formulario').empty().html(data);
      }
  });
}

// Eliminar empresa
function Eliminar(idEmpresa, nombreEmpresa) {
  $("#idEmpresaEliminar").val(idEmpresa);
  document.getElementById("nombreDeEmpresa").innerHTML = nombreEmpresa;
}

$('#eliminarEmpresa').click(function(e) {
  e.preventDefault();
  var idEmpresa = $("#idEmpresaEliminar").val();
  const url = 'empresa_eliminar/'+idEmpresa;
  const params = '';
  proccessFunction(url, 'DELETE', params, callbackStoreEmpresa);
});

function callbackStoreEmpresa(status, response){
  if (status != 200){
    if (response.responseJSON.exception == "Illuminate\\Database\\QueryException") {
      toastr.error("Por favor, elimine los datos asociados a esta empresa.");
       $(".close").click();
      }else{
        var array = Object.values(response.responseJSON.errors);
        array.forEach(element => toastr.error(element));
        return false;
      }
    return false;
  };

  toastr.success(response.mensaje);
  $("#nombreEmpresa").val('');
  $("#fechaFinEmpresa").val(' ');
  $(".close").click();
  listarEmpresa();
}