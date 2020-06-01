// Listar ivas
$(document).ready(function() {
  listarIva();
});

function listarIva(){
  $.ajax({
    type:'get',
    url:('listar_iva'),
    success: function(data){
      $('#listarIva').empty().html(data);
    }
  });
};

// Insertar iva
$('#crearIva').click(function(e) {
  e.preventDefault();
  var valor = $("#valorIva").val();
  var fechaFin = $("#fechaFinIva").val();
  const url = 'iva_crear';
  const params = {'valor_iva':valor, 'fecha_fin':fechaFin};
  proccessFunction(url, 'POST', params, callbackStoreIva);
});

// Editar iva
function Editar(idIva, nombreIva, fechaFinIva) { 
  $("#idIva").val(idIva);
  $("#editarIva").val(nombreIva);
  $("#editarFechaFinIva").val(fechaFinIva);
}

$('#editarElIva').click(function(e) {
  e.preventDefault();
  var idIva = $("#idIva").val();
  var valor = $("#editarIva").val();
  var fechaFin = $("#editarFechaFinIva").val();
  const url = 'iva_editar/'+idIva;
  const params = {'valor_iva':valor, 'fecha_fin':fechaFin};
  proccessFunction(url, 'PUT', params, callbackStoreIva);
});

// Eliminar iva
function Eliminar(idIva, valorIva) {
  $("#idIvaEliminar").val(idIva);
  document.getElementById("valorDelIva").innerHTML = valorIva;
}

$('#eliminarIva').click(function(e) {
  e.preventDefault();
  var idIva = $("#idIvaEliminar").val();
  const url = 'iva_eliminar/'+idIva;
  const params = '';
  proccessFunction(url, 'DELETE', params, callbackStoreIva);
});


function callbackStoreIva(status, response){
  if (status != 200){
    if (response.responseJSON.exception == "Illuminate\\Database\\QueryException") {
      toastr.error("Por favor, elimine los datos asociados a este iva.");
       $(".close").click();
      }else{
        var array = Object.values(response.responseJSON.errors);
        array.forEach(element => toastr.error(element));
        return false;
      }
    return false;
  };

  toastr.success(response.mensaje);
  $("#valorIva").val('');
  $("#fechaFinIva").val(' ');
  $(".close").click();
  listarIva();
}