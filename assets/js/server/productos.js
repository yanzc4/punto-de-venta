//funcion muestra productos
function buscar_ahora(buscar) {
    var parametros = {
        buscar: buscar,
    };
    $.ajax({
        data: parametros,
        type: "POST",
        url: "../backend/controller/productosController.php?f=showProductos",
        success: function (data) {
            document.getElementById('contenedorProductos').innerHTML = data;
        },
    });
    return false;
}
buscar_ahora("");

//funcion para llenar modal
function llenarModal(datos) {
    d = datos.split("||");
    $("#eid").val(d[0]);
    $("#enom").val(d[1]);
    $("#epre").val(d[2]);
}

//funcion para registrar productos
$(document).ready(function () {
    $("#btnAgregar").click(function () {
        var formData = new FormData(document.getElementById("frmAgregar"));
        $.ajax({
            type: "POST",
            url: "../backend/controller/productosController.php?f=addProductos",
            data: formData,
            processData: false,
            contentType: false,
            success: function (e) {
                document.getElementById("cuerpo-noti").innerHTML = e;
                $("#noti").modal("show");
                buscar_ahora("");
            },
        });
        return false;
    });
});

//funcion para actualizar producto
$(document).ready(function () {
    $("#btnActualizar").click(function () {
        var datos = $("#frmActualizar").serialize();
        $.ajax({
            type: "POST",
            url: "../backend/controller/productosController.php?f=editProduct",
            data: datos,
            success: function (e) {
                document.getElementById("cuerpo-noti").innerHTML = e;
                $("#noti").modal("show");
                buscar_ahora("");
            },
        });
        return false;
    });
});

//funcion para eliminar
function eliminacion(codigo) {
    $("#eliminar").modal("show");
    //poner un boton en el modal que ejecute la funcion mandar_php
    $("#btnEliminarNoti").click(function () {
        mandar_php(codigo);
    });
}
//codigo para complementar el de eliminar
function mandar_php(codigo) {
    parametros = {
        id: codigo,
    };
    $.ajax({
        data: parametros,
        url: "../backend/controller/productosController.php?f=deleteProduct",
        type: "POST",
        success: function (r) {
            document.getElementById("cuerpo-noti").innerHTML = r;
            $("#noti").modal("show");
            buscar_ahora("");
        },
    });
}