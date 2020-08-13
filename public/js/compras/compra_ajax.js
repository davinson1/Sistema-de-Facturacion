// Listar compra
$(document).ready(function() {
  listarCompra();

  // Selectores de busqueda
  $('.select-compra').select2({
    theme: 'bootstrap4',
  });

// Para la busqueda del producto
var options = {
    url: "/compra_buscar_producto",
    getValue:function(element) {
        return element.nombre + ' codigo: ' + element.codigo_barras;
        },
    template: {
      type: "custom",
      method: function(value, item) {
        return `
        <div class='card p-1 m-0'>
        <img src=' `+ item.foto +`' height='50px' ='50px' class='mr-5 float-left'/>
        <span class="badge badge-info float-right">Stock: `+item.cantidad+`</span>
        <div>
        <span class="text-dark h5" >`+  item.nombre +`</span><br>
        <span class="text-secondary">Descripcion: `+item.especificaciones+` </span>
        <span class="text-secondary">Codigo: `+item.codigo_barras+` </span>

        </div>
        </div>
        `;
    return "<img src='" + item.foto + "' height='50px' ='50px' class='mr-5'/>  " +  value + '<br>'+ "<span class='text-secondary ml-5'>"+item.especificaciones+"</span>";
      }
    },
    theme: "square",

    list: {
      match: {
        enabled: true
      },
      onChooseEvent: function() {
        const url = 'guardar_compra_temporal';
        const params = $("#buscadorProducto").getSelectedItemData();
        proccessFunction(url, 'POST', params, callbackStoreCompra);
        listarCompra();
      }

    }
  };

  $("#buscadorProducto").easyAutocomplete(options);

});






// Poner nombre del archivoi en el campo input
$('.custom-file-input').on('change', function(event) {
  var inputFile = event.currentTarget;
  $(inputFile).parent()
      .find('.custom-file-label')
      .html(inputFile.files[0].name);
});

function listarCompra(){
  $.ajax({
    type:'get',
    url:('listar_compra'),
    success: function(data){
      $('#listarCompra').empty().html(data);
    }
  });
};

// Insertar compra
$('#crearCompra').click(function(e) {
  e.preventDefault();
  const url = 'compra_crear';
  const params = new FormData($('#frmCrearCompra')[0]);
  proccessFunction(url, 'POST', params, callbackStoreCompra, false, false, false);
});

// Llamar el formulario editar compra
function Editar(idCompra){
  $.ajax({
    type:'get',
    url:('editar_compra/'+idCompra),
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
  const url = 'compra_editar/'+idCompra;
  const params = {'nombre':nombre,'descripcion':descripcion};
  proccessFunction(url, 'PUT', params, callbackStoreCompra);
});

// Eliminar compra
function Eliminar(idCompra, nombreCompra) {
  $("#idCompraEliminar").val(idCompra);
  document.getElementById("idDeCompra").innerHTML = idCompra;
  document.getElementById("nombreDeCompra").innerHTML = nombreCompra;
}

$('#eliminarCompra').click(function(e) {
  e.preventDefault();
  var idCompra = $("#idCompraEliminar").val();
  const url = 'compra_eliminar/'+idCompra;
  const params = '';
  proccessFunction(url, 'DELETE', params, callbackStoreCompra);
});


function callbackStoreCompra(status, response){
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
  $("#nombreCompra").val('');
  $("#descripcionCompra").val('');
  $(".close").click();
  listarCompra();
}
