// Listar los articulos
$(document).ready(function() {
  listarArticulos();
});

function listarArticulos(){
  $.ajax({
    type:'get',
    url:('listar_articulos'),
    success: function(data){
      $('#listarArticulos').empty().html(data);
    }
  });
};

// Eliminar Articulos
function Eliminar(idArticulos, imgArticulos) {
  $("#idArticulosEliminar").val(idArticulos);
  document.getElementById("imgArticulo").src="/storage/"+imgArticulos.replace('public/', '');
}

$('#eliminarArticulos').click(function(e) {
  e.preventDefault();
  var idArticulos = $("#idArticulosEliminar").val();
  const url = 'articulos_eliminar/'+idArticulos;
  const params = '';
  proccessFunction(url, 'DELETE', params, callbackStoreArticulos);
});


function callbackStoreArticulos(status, response){
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
  $("#nombreArticulos").val('');
  $(".close").click();
  listarTipoTributario();
}