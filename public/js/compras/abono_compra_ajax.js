// Listar abono compra
$(document).ready(function() {
  listarAbonoCompra();

  // Selectores de busqueda
  $('.select-abono-compra').select2({
    theme: 'bootstrap4',
  });
});

function listarAbonoCompra(){
  $.ajax({
    type:'get',
    url:('listar_abono_compra'),
    success: function(data){
      $('#listarAbonoCompra').empty().html(data);
    }
  });
};

// Insertar abono compra
$('#crearAbonoCompra').click(function(e) {
  e.preventDefault();
  const url = 'abono_compra_crear';
  const params = $('#frmCrearAbonoCompra').serialize();
  proccessFunction(url, 'POST', params, callbackStoreAbonoCompra);
});

// Llamar el formulario editar abono compra
function Editar(idCompra){
  $.ajax({
    type:'get',
    url:('editar_abono_compra/'+idCompra),
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
  const url = 'abono_compra_editar/'+idCompra;
  const params = {'nombre':nombre,'descripcion':descripcion};
  proccessFunction(url, 'PUT', params, callbackStoreAbonoCompra);
});

// Eliminar abono compra
function Eliminar(idCompra, nombreCompra) {
  $("#idAbonoCompraEliminar").val(idCompra);
  document.getElementById("nombreDeAbonoCompra").innerHTML = nombreCompra;
}

$('#eliminarAbonoCompra').click(function(e) {
  e.preventDefault();
  var idAbonoCompra = $("#idAbonoCompraEliminar").val();
  const url = 'abono_compra_eliminar/'+idAbonoCompra;
  const params = '';
  proccessFunction(url, 'DELETE', params, callbackStoreAbonoCompra);
});


function callbackStoreAbonoCompra(status, response){
  if (status != 200){
    if (response.responseJSON.exception == "Illuminate\\Database\\QueryException") {
      toastr.error("Por favor, elimine los datos asociados a este abono de compra.");
       $(".close").click();
      }else{
        var array = Object.values(response.responseJSON.errors);
        array.forEach(element => toastr.error(element));
      }
    return false;
  };

  toastr.success(response.mensaje);
  $(".close").click();
  listarAbonoCompra();
}