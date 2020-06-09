// Listar los tipos tributarios
$(document).ready(function() {
  listarProvedores();

    $('.selectempresa').select2({
        theme: 'bootstrap4',
    });
});

function listarProvedores(){
  $.ajax({
    type:'get',
    url:('listar_proveedor'),
    success: function(data){
      $('#listarProvedor').empty().html(data);
    }
  });
};


// Insertar proveedor
$('#crearProveedor').click(function(e) {
  e.preventDefault();
  var idempresa = $("#idEmpresa").val();
  var nombre = $("#nombreProveedor").val();
  var telefono = $("#telefonoProveedor").val();
  var descripcion = $("#descripcionProveedor").val();

  const url = 'proveedores_crear';
  const params = {	'idempresa':idempresa,
					'nombre':nombre,
					'telefono':telefono,
					'descripcion':descripcion
				};
  proccessFunction(url, 'POST', params, callbackStoreProveedor);
});



// Editar proveedor
function Editar(idProveedor) {
  $.ajax({
    type:'get',
    url:('proveedores_editar/'+idProveedor),
    success: function(data){
      $('#formularioeditar').empty().html(data);
    }
  });
}

// Eliminar proveedor
function Eliminar(idproveedor, nombreproveedor) {
  $("#id").val(idproveedor);
  document.getElementById("nombre").innerHTML = nombreproveedor;
}

$('#eliminarProveedor').click(function(e) {
  e.preventDefault();
  var idproveedor = $("#id").val();
  const url = 'proveedores_eliminar/'+idproveedor;
  const params = '';
  proccessFunction(url, 'DELETE', params, callbackStoreProveedor);
});


function callbackStoreProveedor(status, response){
  if (status != 200){
       var array = Object.values(response.responseJSON.errors);
        array.forEach(element => toastr.error(element));
    return false;
  };

  toastr.success(response.mensaje);
  $("#nombreporcentaje").val('');
  $("#descripcionporcentaje").val('');
  $("#porcentaje").val('');
  $(".close").click();
  listarProvedores();
}