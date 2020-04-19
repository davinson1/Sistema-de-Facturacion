// ListarRol();
$(document).ready(function() {
  listar_tipo();
});

function listar_tipo(){
  $.ajax({
    type:'get',
    url:('tabla_tipo_documento'),
    success: function(data){
      $('#listar-tipos-documentos').empty().html(data);
    }
  });
};