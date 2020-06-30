// Listar articulo compra
$(document).ready(function() {
  listarArticuloCompra();

  // Selectores de busqueda
  $('.select-articulo-compra').select2({
    theme: 'bootstrap4',
  });
});

function listarArticuloCompra(){
  $.ajax({
    type:'get',
    url:('listar_articulo_compra'),
    success: function(data){
      $('#listarArticuloCompra').empty().html(data);
    }
  });
};

// Insertar compra
$('#crearArticuloCompra').click(function(e) {
  e.preventDefault();
  const url = 'articulo_compra_crear';
  const params = $('#frmCrearArticuloCompra').serialize();
  proccessFunction(url, 'POST', params, callbackStoreArticuloCompra);
});

// Llamar el formulario editar compra
function Editar(idCompra){
  $.ajax({
    type:'get',
    url:('editar_articulo_compra/'+idCompra),
    success: function(data){
      $('#formulario').empty().html(data);
    }
  });
}

$('#editarElCompra').click(function(e) {
  e.preventDefault();
  var idCompra = $("#idCompra").val();
  var nombre = $("#editarCompra").val();
  var descripcion = $("#descripcionCompraEditar").val();
  const url = 'articulo_compra_editar/'+idCompra;
  const params = {'nombre':nombre,'descripcion':descripcion};
  proccessFunction(url, 'PUT', params, callbackStoreArticuloCompra);
});

// Eliminar compra
function Eliminar(idCompra, nombreCompra) {
  $("#idArticuloCompraEliminar").val(idCompra);
  document.getElementById("nombreDeArticuloCompra").innerHTML = nombreCompra;
}

$('#eliminarArticuloCompra').click(function(e) {
  e.preventDefault();
  var idArticuloCompra = $("#idArticuloCompraEliminar").val();
  const url = 'articulo_compra_eliminar/'+idArticuloCompra;
  const params = '';
  proccessFunction(url, 'DELETE', params, callbackStoreArticuloCompra);
});


function callbackStoreArticuloCompra(status, response){
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
  $(".close").click();
  listarArticuloCompra();
}