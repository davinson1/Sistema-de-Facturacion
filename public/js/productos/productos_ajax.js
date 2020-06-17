// Listar los productos
$(document).ready(function() {
  // funcion para listar
  listarProducto();
  // Para seleccionar foto
  $('.custom-file-input').on('change', function(event) {
    var inputFile = event.currentTarget;
    $(inputFile).parent()
        .find('.custom-file-label')
        .html(inputFile.files[0].name);
  });

  function readFile(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
        reader.onload = function (e) {
          $('#img1').attr("src", e.target.result);
        }
      reader.readAsDataURL(input.files[0]);
    }
  }
  document.getElementById('customFileLang').onchange = function (e) {
    readFile(e.srcElement);
  }
  // Selectores de busqueda
  $('.select-producto').select2({
    theme: 'bootstrap4',
  });
  
});

function listarProducto(){
  $.ajax({
    type:'get',
    url:('listar_productos'),
    success: function(data){
      $('#listarProductos').empty().html(data);
    }
  });
};

// Insertar producto
$('#crearProducto').click(function(e) {
  e.preventDefault();
  
  const url = 'producto_crear';
  const params = new FormData($('#frmCrearProducto')[0]);
  proccessFunction(url, 'POST', params, callbackStoreProducto, false, false, false);
});

// Llamar el formulario editar producto
function Editar(idProducto){
  $.ajax({
    type:'get',
    url:('editar_producto/'+idProducto),
    success: function(data){
      $('#formulario').empty().html(data);
    }
  });
}

// Eliminar Producto
function Eliminar(idProducto, nombreProducto, imgProducto) {
  $("#idProductoEliminar").val(idProducto);
  document.getElementById("nombreDelProducto").innerHTML = nombreProducto;  
  if (imgProducto==''){
    document.getElementById("imgProducto").src="/img/social.png";
  }else{
    document.getElementById("imgProducto").src="/storage/"+imgProducto.replace('public/', '');
  }
}

$('#eliminarProducto').click(function(e) {
  e.preventDefault();
  var idProducto = $("#idProductoEliminar").val();
  const url = 'productos_eliminar/'+idProducto;
  const params = '';
  proccessFunction(url, 'DELETE', params, callbackStoreProducto);
});


function callbackStoreProducto(status, response){
  if (status != 200){
    if (response.responseJSON.exception == "Illuminate\\Database\\QueryException") {
      toastr.error("Por favor, elimine los datos asociados a este tipo de factura.");
       $(".close").click();
      }else{
        var array = Object.values(response.responseJSON.errors);
        array.forEach(element => toastr.error(element));
      }
    return false;
  };

  toastr.success(response.mensaje);
  $(".close").click();
  listarProducto();
}