// Listar los tipos de compras
$(document).ready(function() {
  listarTipoCompra();
});

function listarTipoCompra(){
  $.ajax({
    type:'get',
    url:('listar_tipo_compra'),
    success: function(data){
      $('#listarTipoCompra').empty().html(data);
    }
  });
};

// Insertar tipos de compras
$('#crearTipoCompra').click(function(e) {
  e.preventDefault();
  var nombre = $("#nombreTipoCompra").val();
  var descripcion = $("#descripcionTipoCompra").val();
  const url = 'tipo_compra_crear';
  const params = {'nombre':nombre, 'descripcion':descripcion};
  proccessFunction(url, 'POST', params, callbackStoreTipoCompra);
});

// Editar tipos de compras
function Editar(idTipoCompar, nombreTipoCompar, descripcionTipoCompra) {
  $("#idTipoCompra").val(idTipoCompar);
  $("#editarTipoCompra").val(nombreTipoCompar);
  $("#descripcionTipoCompraEditar").val(descripcionTipoCompra);
}

$('#editarElTipoCompra').click(function(e) {
  e.preventDefault();
  var idTipoCompra = $("#idTipoCompra").val();
  var nombre = $("#editarTipoCompra").val();
  var descripcion = $("#descripcionTipoCompraEditar").val();
  const url = 'tipo_compra_editar/'+idTipoCompra;
  const params = {'nombre':nombre,'descripcion':descripcion};
  proccessFunction(url, 'PUT', params, callbackStoreTipoCompra);
});

// Eliminar tipos de compras
function Eliminar(idTipoCompra, nombreTipoCompra) {
  $("#idTipoCompraEliminar").val(idTipoCompra);
  document.getElementById("nombreDeTipoCompra").innerHTML = nombreTipoCompra;
}

$('#eliminarTipoCompra').click(function(e) {
  e.preventDefault();
  var idTipoCompra = $("#idTipoCompraEliminar").val();
  const url = 'tipo_compra_eliminar/'+idTipoCompra;
  const params = '';
  proccessFunction(url, 'DELETE', params, callbackStoreTipoCompra);
});


function callbackStoreTipoCompra(status, response){
  if (status != 200){
    if (response.responseJSON.exception == "Illuminate\\Database\\QueryException") {
      toastr.error("Por favor, elimine los datos asociados a este tipo de compra.");
       $(".close").click();
      }else{
        var array = Object.values(response.responseJSON.errors);
        array.forEach(element => toastr.error(element));
      }
    return false;
  };

  toastr.success(response.mensaje);
  $("#nombreTipoCompra").val('');
  $("#descripcionTipoCompra").val('');
  $(".close").click();
  listarTipoCompra();
}