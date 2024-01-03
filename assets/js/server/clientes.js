//funcion muestra productos
function buscar_ahora(buscar) {
    var parametros = {
        buscar: buscar,
    };
    $.ajax({
        data: parametros,
        type: "POST",
        url: "../backend/controller/clientesController.php?f=showProductos",
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
            url: "../backend/controller/clientesController.php?f=addProductos",
            data: formData,
            processData: false,
            contentType: false,
            success: function (e) {
                    if (e == 1) {
                        Swal.fire("Listo", "¡Producto registrado con exito!", "success");
                    //funcion para buscar los empleados y mostrarlos en la tabla
                    buscar_ahora("");
                    //resetear formulario
                    document.getElementById("frmAgregar").reset();
                    }else{
                        Swal.fire("Error", "¡No se pudo registrar el producto!", "error");
                    }

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
            url: "../backend/controller/clientesController.php?f=editProduct",
            data: datos,
            success: function (e) {
                if (e == 1) {
                    Swal.fire("Listo", "¡Producto actualizado con exito!", "success");
                //funcion para buscar los empleados y mostrarlos en la tabla
                buscar_ahora("");
                }else{
                    Swal.fire("Error", "¡No se pudo actualizar el producto!", "error");
                }
            },
        });
        return false;
    });
});

//funcion para eliminar
function eliminacion(codigo) {
    Swal.fire({
        title: "¿Deseas eliminar?",
        text: "¡No podra revertir esto!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "¡Si, eliminar!",
        cancelButtonText: "Cancelar",
    }).then((result) => {
        if (result.isConfirmed) {
            mandar_php(codigo);
        }
    });
}
//codigo para complementar el de eliminar
function mandar_php(codigo) {
    parametros = {
        id: codigo,
    };
    $.ajax({
        data: parametros,
        url: "../backend/controller/clientesController.php?f=deleteProduct",
        type: "POST",
        success: function (r) {
            if (r == 1) {
                Swal.fire("Listo", "¡Eliminado con exito!", "success");
                buscar_ahora("");
            } else {
                Swal.fire("Error", "¡No se pudo eliminar!", "error");
            }
        },
    });
}