// Listar los tipos de compras
$(document).ready(function() {
  listarCompras();
});

function listarCompras(){
  $.ajax({
    type:'get',
    url:('listar_compras_realizadas'),
    success: function(data){
      $('#listarCompras').empty().html(data);
    }
  });
};

// Anular
function anularcompra(idcompra,descripcion) {
  $("#idAnularCompra").val(idcompra);
  document.getElementById("descripcionCompra").innerHTML = descripcion;
}

$('#anular_compra').click(function(e) {
  e.preventDefault();
  var idCompra = $("#idAnularCompra").val();
  const url = 'anular_compra_realizada/'+idCompra;
  const params = '';
  proccessFunction(url, 'UPDATE', params, callbackStoreTipoCompra);
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
