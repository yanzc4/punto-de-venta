//funcion muestra productos
function buscar_ahora(buscar) {
    // Obtener el término de búsqueda
    busca = buscar.toLowerCase();
    // Obtener la lista de nombres
    var con = document.getElementsByClassName('lp');
    var nombres = document.getElementsByClassName('lblproducto');

    // Iterar sobre la lista de nombres y mostrar/ocultar según la coincidencia con el término de búsqueda
    for (var i = 0; i < nombres.length; i++) {
        var nombre = nombres[i].innerText.toLowerCase();
        var mostrar = nombre.includes(busca);
        con[i].style.display = mostrar ? 'block' : 'none';
    }
}

//funcion lista todos los productos
function listarProductos() {
    if(localStorage.getItem("productos") == null){
        $.ajax({
            type: "POST",
            url: "../backend/controller/productosController.php?f=showProductsAll",
            success: function (r) {
                //crear localstorage con los productos
                localStorage.setItem("productos", r);
                mostrarProductos();
            },
        });
    }else{
        mostrarProductos();
    }
}


listarProductos();

//funcion para recorrer el localstorage y mostrar los productos
function mostrarProductos() {
    var datos = localStorage.getItem("productos");
    producto = JSON.parse(datos);
    console.log(producto);
    var res = "";
    for (var i = 0; i < producto.length; i++) {
        res += `
        <div class="col-6 col-lg-3 mb-2 lp">
            <div class="container bg-card card-producto redondear p-0">
                <div class="text-center py-2">
                    <img class="imagen" src="../${producto[i].imagen}" alt="${producto[i].nombre}"><br>
                </div>
                <div class="pt-1 pe-3 ps-3 bg-main h-detalle  w-100">
                    <div class="d-flex">
                        <div class="col">
                            <span class="text-precio fw-bold">S./ ${producto[i].precio}</span>
                        </div>
                        <div class="col-auto ms-3">
                            <span data-bs-toggle="modal" data-bs-target="#editarProducto" onclick="llenarModal('${producto[i].id}||${producto[i].nombre}||${producto[i].precio}')"><i class="bi bi-pen-fill text-precio"></i></span>
                        </div>
                        <div class="col-auto ms-3">
                            <span onclick="eliminacion('${producto[i].id}')"><i class="bi bi-trash3-fill text-precio"></i></span>
                        </div>
                    </div>
                    <p class="text-producto lblproducto">${producto[i].nombre}</p>
                </div>
            </div>
        </div>
    `;
    }
    document.getElementById("contenedorProductos").innerHTML = res;
}


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
                //eliminar los datos del formulario
                document.getElementById("frmAgregar").reset();
                //eliminar localstorage
                localStorage.removeItem("productos");
                listarProductos();
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
                //eliminar localstorage
                localStorage.removeItem("productos");
                listarProductos();
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
            //eliminar localstorage
            localStorage.removeItem("productos");
            listarProductos();
        },
    });
}