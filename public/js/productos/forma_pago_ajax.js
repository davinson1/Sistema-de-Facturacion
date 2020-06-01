// Listar formas de pagos
$(document).ready(function() {
  listarFormaPago();
});

function listarFormaPago(){
  $.ajax({
    type:'get',
    url:('listar_forma_pago'),
    success: function(data){
      $('#listarFormaPago').empty().html(data);
    }
  });
};

// Insertar forma de pago
$('#crearFormaPago').click(function(e) {
  e.preventDefault();
  var nombre = $("#nombreFormaPago").val();
  const url = 'forma_pago_crear';
  const params = {'nombre':nombre};
  proccessFunction(url, 'POST', params, callbackStoreFormaPago);
});

// Editar tipo factura
function Editar(idFormaPago, nombreFormaPago) {
  $("#idFormaPago").val(idFormaPago);
  $("#editarFormaPago").val(nombreFormaPago);
}

$('#editarLaFormaPago').click(function(e) {
  e.preventDefault();
  var idFormaPago = $("#idFormaPago").val();
  var nombre = $("#editarFormaPago").val();
  const url = 'forma_pago_editar/'+idFormaPago;
  const params = {'nombre':nombre};
  proccessFunction(url, 'PUT', params, callbackStoreFormaPago);
});

// Eliminar forma pago
function Eliminar(idFormaPago, nombreFormaPago) {
  $("#idFormaPagoEliminar").val(idFormaPago);
  document.getElementById("nombreDeFormaPago").innerHTML = nombreFormaPago;
}

$('#eliminarFormaPago').click(function(e) {
  e.preventDefault();
  var idFormaPago = $("#idFormaPagoEliminar").val();
  const url = 'forma_pago_eliminar/'+idFormaPago;
  const params = '';
  proccessFunction(url, 'DELETE', params, callbackStoreFormaPago);
});


function callbackStoreFormaPago(status, response){
  if (status != 200){
    if (response.responseJSON.exception == "Illuminate\\Database\\QueryException") {
      toastr.error("Por favor, elimine los datos asociados a esta forma de pago.");
       $(".close").click();
      }else{
        toastr.error(response.responseJSON.errors.nombre);
      }
    return false;
  };

  toastr.success(response.mensaje);
  $("#nombreFormaPago").val('');
  $(".close").click();
  listarFormaPago();
}