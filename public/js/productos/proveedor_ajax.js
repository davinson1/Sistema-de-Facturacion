// Listar los tipos tributarios
$(document).ready(function() {
  listarProvedores();
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