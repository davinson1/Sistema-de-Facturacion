// Listar los paises
$(document).ready(function () {
    listarcategoriaproductos();
});

function listarcategoriaproductos() {
    $.ajax({
        type: 'get',
        url: ('listar_categoriaProductos'),
        success: function (data) {
            $('#listarcategoriaproductos').empty().html(data);
        }
    });
};


// Insertar porcentaje
$('#crearcategoriap').click(function (e) {
    e.preventDefault();
    var nombre = $("#nombrecategoriap").val();
    var descripcion = $("#descripcioncategoriap").val();

    const url = 'categoria_producto_crear';
    const params = {
        'nombre': nombre,
        'descripcion': descripcion
    };
    proccessFunction(url, 'POST', params, callbackStoreCategoriap);
});



// Editar tipos tributarios
function Editar(idcategoriap, nombrecategoriap, descripcioncategoriap) {
    $("#editaridcategoriap").val(idcategoriap);
    $("#editarnombrecategoriap").val(nombrecategoriap);
    $("#editardescripcioncategoriap").val(descripcioncategoriap);
}
$('#editarcategoriaps').click(function (e) {
    e.preventDefault();
    var idcategoriap = $("#editaridcategoriap").val();
    var nombre = $("#editarnombrecategoriap").val();
    var detalle = $("#editardescripcioncategoriap").val();
    const url = 'categoria_productos_editar/' + idcategoriap;
    const params = {
        'nombre': nombre,
        'detalle': detalle
    };
    proccessFunction(url, 'PUT', params, callbackStoreCategoriap);
});

// Eliminar tipos tributarios
function Eliminar(idcategoriap, detallecategoria) {
    $("#idcategoriap").val(idcategoriap);
    document.getElementById("nombrecategoriaps").innerHTML = detallecategoria;
}

$('#eliminarcategoriap').click(function (e) {
    e.preventDefault();
    let idcategoriap = $("#idcategoriap").val();
    const url = 'categoria_producto_eliminar/' + idcategoriap;
    const params = '';
    proccessFunction(url, 'DELETE', params, callbackStoreCategoriap);
});


function callbackStoreCategoriap(status, response) {
    if (status != 200) {
        var array = Object.values(response.responseJSON.errors);
        array.forEach(element => toastr.error(element));


        return false;
    };

    toastr.success(response.mensaje);
    $("#nombrecategoriap").val('');
    $("#descripcioncategoriap").val('');
    $(".cerrarcps").click();
    $(".cerrarcpe").click();
    listarcategoriaproductos();
}
