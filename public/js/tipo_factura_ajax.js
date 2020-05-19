// Listar los tipos de facturas
$(document).ready(function() {
  listarTipoFactura();
});

function listarTipoFactura(){
  $.ajax({
    type:'get',
    url:('listar_tipo_factura'),
    success: function(data){
      $('#listarTiposFacturas').empty().html(data);
    }
  });
};

// Insertar tipo de factura
$('#crearTipoFactura').click(function(e) {
  e.preventDefault();
  var nombre = $("#nombreTipoFactura").val();
  const url = 'tipo_factura_crear';
  const params = {'nombre':nombre};
  proccessFunction(url, 'POST', params, callbackStoreTipoFactura);
});

// Editar tipo factura
function Editar(idTipoFactura, nombreTipoFactura) {
  $("#idTipoFactura").val(idTipoFactura);
  $("#editarTipoFactura").val(nombreTipoFactura);
}

$('#editarElTipoFactura').click(function(e) {
  e.preventDefault();
  var idTipoFactura = $("#idTipoFactura").val();
  var nombre = $("#editarTipoFactura").val();
  const url = 'tipo_factura_editar/'+idTipoFactura;
  const params = {'nombre':nombre};
  proccessFunction(url, 'PUT', params, callbackStoreTipoFactura);
});

// Eliminar tipo de factura
function Eliminar(idTipoFactura, nombreTipoFactura) {
  $("#idTipoFacturaEliminar").val(idTipoFactura);
  document.getElementById("nombreTipoFactura").innerHTML = nombreTipoFactura;
}

$('#eliminarTipoFactura').click(function(e) {
  e.preventDefault();
  var idTipoFactura = $("#idTipoFacturaEliminar").val();
  const url = 'tipo_factura_eliminar/'+idTipoFactura;
  const params = '';
  proccessFunction(url, 'DELETE', params, callbackStoreTipoFactura);
});



function callbackStoreTipoFactura(status, response){
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
  $("#nombreTipoFactura").val('');
  $(".close").click();
  listarTipoFactura();
}