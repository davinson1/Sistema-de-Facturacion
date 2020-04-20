// Listar los municipios
$(document).ready(function() {
  listadoMunicipios();
});

function listadoMunicipios(){
  $.ajax({
    type:'get',
    url:('listar_municipios'),
    success: function(data){
      $('#listarMunicipios').empty().html(data);
    }
  });
};
