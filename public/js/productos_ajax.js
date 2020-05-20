// Listar los productos
$(document).ready(function() {
  listarproductos();
});

function listarproductos(){
  $.ajax({
    type:'get',
    url:('listar_productos'),
    success: function(data){
      $('#listaproductos').empty().html(data);
    }
  });
};


// Insertar porcentaje
$('#crearproducto').click(function(e) {
  e.preventDefault();
  var nombre = $("#nombreproducto").val();
  var especificaciones = $("#especificaciones").val();
  const url = 'productos_crear';
  const params = {'nombre':nombre,
					'especificaciones':especificaciones,
				};
  proccessFunction(url, 'POST', params, callbackStoreProductos);
});



// Editar tipos tributarios
function Editar(idproducto, nombreproducto,especificaciones) {
  $("#idproducto").val(idproducto);
  $("#editnombreproducto").val(nombreproducto);
  $("#editespecificaciones").val(especificaciones);
}
$('#editarproducto').click(function(e) {
  e.preventDefault();
  var idproducto = $("#idproducto").val();
  var nombre = $("#editnombreproducto").val();
  var especificaciones = $("#editespecificaciones").val();

  const url = 'productos_editar/'+idproducto;
  const params = {'nombre':nombre,
          'especificaciones':especificaciones,};
  proccessFunction(url, 'PUT', params, callbackStoreProductos);
});

// Eliminar tipos tributarios
function Eliminar(idproductoa, nombreproductoa) {
  $("#idproducto").val(idproductoa);
  document.getElementById("nombreprodcuto").innerHTML = nombreproductoa;
}

$('#eliminarproducto').click(function(e) {
  e.preventDefault();
  var idproductoa = $("#idproducto").val();
  const url = 'producto_eliminar/'+idproductoa;
  const params = '';
  proccessFunction(url, 'DELETE', params, callbackStoreProductos);
});


function callbackStoreProductos(status, response){
  if (status != 200){
       var array = Object.values(response.responseJSON.errors);
        array.forEach(element => toastr.error(element));


    return false;
  };

  toastr.success(response.mensaje);
  $("#nombreproducto").val('');
  $("#especificaciones").val('');
  $(".close").click();
  listarproductos();
}