// Listar los tipos tributarios
$(document).ready(function() {
  listarTipoTributario();
});

function listarTipoTributario(){
  $.ajax({
    type:'get',
    url:('listar_tipo_tributario'),
    success: function(data){
      $('#listarTipoTributario').empty().html(data);
    }
  });
};

// Insertar tipos tributarios
$('#crearTipoTributario').click(function(e) {
  e.preventDefault();
  var nombre = $("#nombreTipoTributario").val();
  const url = 'tipo_tributario_crear';
  const params = {'nombre':nombre};
  proccessFunction(url, 'POST', params, callbackStoreTipoTributario);
});

// Editar tipos tributarios
function Editar(idTipoTributario, nombreTipoTributario) {
  $("#idTipoTributario").val(idTipoTributario);
  $("#editarTipoTributario").val(nombreTipoTributario);
}

$('#editarElTipoTributario').click(function(e) {
  e.preventDefault();
  var idTipoTributario = $("#idTipoTributario").val();
  var nombre = $("#editarTipoTributario").val();
  const url = 'tipo_tributario_editar/'+idTipoTributario;
  const params = {'nombre':nombre};
  proccessFunction(url, 'PUT', params, callbackStoreTipoTributario);
});

// Eliminar tipos tributarios
function Eliminar(idTipoTributario, nombreTipoTributario) {
  $("#idTipoTributarioEliminar").val(idTipoTributario);
  document.getElementById("nombreTipoTributario").innerHTML = nombreTipoTributario;
}

$('#eliminarTipoTributario').click(function(e) {
  e.preventDefault();
  var idTipoTributario = $("#idTipoTributarioEliminar").val();
  const url = 'tipo_tributario_eliminar/'+idTipoTributario;
  const params = '';
  proccessFunction(url, 'DELETE', params, callbackStoreTipoTributario);
});


function callbackStoreTipoTributario(status, response){
  if (status != 200){
    if (response.responseJSON.exception == "Illuminate\\Database\\QueryException") {
      toastr.error("Por favor, elimine los datos asociados a este tipo de factura.");
       $(".close").click();
      }else{
        toastr.error(response.responseJSON.errors.nombre);
      }
    return false;
  };

  toastr.success(response.mensaje);
  $("#nombreTipoTributario").val('');
  $(".close").click();
  listarTipoTributario();
}