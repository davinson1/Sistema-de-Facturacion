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
          <img src=' `+ item.foto +`' height='50px' width='50px' class='float-left mr-5'/>          
          <span class="badge badge-info float-right">Stock: `+item.cantidad+`</span>
          <div>
            <span class="text-dark h5" >`+  item.nombre +`</span><br>
            <span class="text-secondary">Descripcion: `+item.especificaciones+` </span>
            <span class="text-secondary">Codigo: `+item.codigo_barras+` </span>
          </div>
        `;
      }
    },

    list: {
      match: {
        enabled: true
      },
      onChooseEvent: function() {
        let datos = {
          'nombre': $("#buscadorProducto").getSelectedItemData().nombre,
          'foto': $("#buscadorProducto").getSelectedItemData().foto,
          'cantidad_compra': $("#cantidad_compra").val(),
          'precio_compra': $("#precio_compra").val(),
          'id_producto': $("#buscadorProducto").getSelectedItemData().id,
          'codigo_barras': $("#buscadorProducto").getSelectedItemData().codigo_barras,
          'descripcion_producto': $("#buscadorProducto").getSelectedItemData().especificaciones,
        };
        const url = 'guardar_compra_temporal';        
        const params = datos;
        proccessFunction(url, 'POST', params, callbackStoreCompra);
        listarCompra();
      }

    }
  };

  $("#buscadorProducto").easyAutocomplete(options);

});

// Descartar el producto seleccionado
function eliminarProducto(id, nombreProducto) {
  $("#idCompraTemporal").val(id);
  document.getElementById("nombreProducto").innerHTML = nombreProducto;
}
$('#descartarProductoTemporal').click(function(e) {
  e.preventDefault();
  var idCompraTemporal = $("#idCompraTemporal").val();
  const url = 'descartar_producto_compra/'+idCompraTemporal;
  const params = '';
  proccessFunction(url, 'DELETE', params, callbackStoreCompra);
});

// Poner nombre del archivo en el campo input
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
        $("#buscadorProducto").val('');
      }
    return false;
  };

  toastr.success(response.mensaje);
  $("#nombreCompra").val('');
  $("#descripcionCompra").val('');
  $("#buscadorProducto").val('');
  $(".close").click();
  listarCompra();
}
