// Listar los paises
$(document).ready(function() {
  listartipoarticulo();
});

function listartipoarticulo(){
  $.ajax({
    type:'get',
    url:('listar_tipo_articulo'),
    success: function(data){
      $('#listartipoarticulo').empty().html(data);
    }
  });
};


// Insertar porcentaje
$('#crearTpoArticulo').click(function(e) {
  e.preventDefault();
  var nombre = $("#nombretparticulo").val();
  const url = 'tipo_articulos_crear';
  const params = {'nombre':nombre,
				};
  proccessFunction(url, 'POST', params, callbackStoreTipoArticulo);
});



// Editar tipos tributarios
function Editar(id,nombre) {
  $("#editidtparticulo").val(id);
  $("#editnombretparticulo").val(nombre);
}
$('#editarTipoArticulo').click(function(e) {
  e.preventDefault();
  var idtparticulo = $("#editidtparticulo").val();
  var nombre = $("#editnombretparticulo").val();
  const url = 'tipo_articulo_editar/'+idtparticulo;
  const params = {'nombre':nombre,};
  proccessFunction(url, 'PUT', params, callbackStoreTipoArticulo);
});

// Eliminar tipos tributarios
function Eliminar(id, nombre) {
  $("#eliminaridtparticulo").val(id);
  document.getElementById("eliminarnombretparticulo").innerHTML = nombre;
}

$('#eliminarttparticulo').click(function(e) {
  e.preventDefault();
  var idtparticulo = $("#eliminaridtparticulo").val();
  const url = 'tipoarticulo_eliminar/'+idtparticulo;
  const params = '';
  proccessFunction(url, 'DELETE', params, callbackStoreTipoArticulo);
});


function callbackStoreTipoArticulo(status, response){
  if (status != 200){
       var array = Object.values(response.responseJSON.errors);
        array.forEach(element => toastr.error(element));


    return false;
  };

  toastr.success(response.mensaje);
  $("#nombretparticulo").val('');
  $(".close").click();
  listartipoarticulo();
}