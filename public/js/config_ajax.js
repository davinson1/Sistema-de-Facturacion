$.ajaxSetup({
headers: {'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')}
});

function proccessFunction(url, method, params, callback, tipoConten, procesoDato, cach){
  $.ajax({
    url: url,
    method: method,
    data: params,
    contentType: tipoConten,
    processData: procesoDato,
    cache: cach,

    success: function(res){
      callback(200, res);
    },
    error: function(error) {
      callback(500, error);
    }
  });
}



//propiedades de las aletar
toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": true,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "10000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}

