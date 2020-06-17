
 $("#frm-DatosEmpresaActualizar").submit(function (ev){
    $.ajax({
      url: 'datos_empresa_crear',
      type: 'POST',
      data: new FormData(this),
      contentType: false,
      processData: false,
      cache: false,
      success: function(response){ // En caso de que todo salga bien.
        toastr.success(response.mensaje);
        console.log(response.mensaje);

      },
      error: function(eerror) {
        var array = Object.values(eerror.responseJSON.errors);
        array.forEach(element => toastr.error(element));
       }
    });
    ev.preventDefault();
  });


  $("#frm-DatosEmpresa").submit(function(ev){
    $.ajax({
      url: 'datos_empresa_crear',
      type: 'POST',
      data: new FormData(this),
      contentType: false,
      processData: false,
      cache: false,
      success: function(response){ // En caso de que todo salga bien.
        toastr.success(response.mensaje);
        console.log(response.mensaje);
        location.reload(true)
      },
      error: function(eerror) {
        var array = Object.values(eerror.responseJSON.errors);
        array.forEach(element => toastr.error(element));
       }
    });
    ev.preventDefault();

  });