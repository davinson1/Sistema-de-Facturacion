// variables y funciones globales
var dataSel = '';

function listarCompra(){
  $.ajax({
    type:'get',
    url:('listar_compra'),
    success: function(data){
      $('#listarCompra').empty().html(data);
    }
  });
};

// Listar compra
$(document).ready(function() {


  $(function () {
  $('[data-toggle="tooltip"]').tooltip()
});
  listarCompra();

  // Selectores de busqueda
  $('.select-compra').select2({
    theme: 'bootstrap4',
    width: '100%',
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
          <img src=' `+ item.foto +`' height='50px' width='50px' class='float-left mr-3'/>
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
      onChooseEvent: function(){
        $(".col").removeClass("d-none");
        dataSel = $("#buscadorProducto").getSelectedItemData();
      }
    }
  };

  $("#buscadorProducto").easyAutocomplete(options);

});

$('#agregarProducto').click(function(e) {
  e.preventDefault();
  // Organizar las variables para pasarlas en un objeto
  var cantidad_compra = $("#cantidad_compra").val();
  var precio_compra = $("#precio_compra").val();
  var precio_venta = $("#precio_venta").val();

  if (cantidad_compra == '' || precio_compra == '')
  {
    toastr.error('Los campos cantidad y precio no tienen que ser vacios.');
  }else{
    var objDatos = {
      'nombre': dataSel.nombre,
      'foto': dataSel.foto,
      'id_producto': dataSel.id,
      'codigo_barras': dataSel.codigo_barras,
      'descripcion_producto': dataSel.especificaciones,
      'cantidad_compra': cantidad_compra,
      'precio_compra': precio_compra,
      'precio_venta': precio_venta
    };
    // Enviar la peticion para el registro temporal
    const url = 'guardar_compra_temporal';
    proccessFunction(url, 'POST', objDatos, callbackStoreCompra);
    // Resetear los campos y añadir la clase d-none
    $(".col").addClass("d-none");
  }
});

// Descartar el producto seleccionado
function descartarProducto(id, nombreProducto) {
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

// Poner nombre del archivo en el campo input del scaner
$('.custom-file-input').on('change', function(event) {
  var inputFile = event.currentTarget;
  $(inputFile).parent()
      .find('.custom-file-label')
      .html(inputFile.files[0].name);
});

// Insertar compra
$('#registrarCompra').click(function(e) {
  e.preventDefault();
  const url = 'compra_crear';
  const params = new FormData($('#frmRegistrarCompra')[0]);
  proccessFunction(url, 'POST', params, callbackStoreCompra, false, false, false);
  document.querySelector('#frmRegistrarCompra').reset();
  document.getElementById('file').innerHTML = 'Soporte de compra';
});

// Anular o descartar toda la compra
$('#btnAnular').click(function(e)
{
  e.preventDefault();
  const url = 'anular_compra';
  const params = '';
  proccessFunction(url, 'DELETE', params, callbackStoreCompra);
  document.querySelector('#frmDescartarCompra').reset();
});

function callbackStoreCompra(status, response){
  if (status != 200){
    if (response.responseJSON.exception == "Illuminate\\Database\\QueryException") {
      toastr.error("Por favor, elimine los datos asociados a este tipo de compra.");
       $(".close").click();
      }else{
        var array = Object.values(response.responseJSON.errors);
        array.forEach(element => toastr.error(element));
        document.querySelector("#frmBuscarProducto").reset();
      }
    return false;
  };

  toastr.success(response.mensaje);
  document.querySelector("#frmBuscarProducto").reset();
  $(".close").click();
  listarCompra();
}
