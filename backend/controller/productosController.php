<?php

include_once '../model/productosModel.php';
include_once '../../inc/conexion.php';

function showProductos()
{
    $conexion = conectar();
    $buscar = $_POST['buscar'];
    $resultado = listarProductos($conexion, $buscar);

    while ($row = mysqli_fetch_array($resultado)) {
        $datos = $row['id'] . "||" .
            $row['nombre'] . "||" .
            $row['precio'];
?>
        <div class="col-6 col-lg-3 mb-2">
            <div class="container bg-card card-producto redondear p-0">
                <div class="text-center py-2">
                    <img class="imagen" src="../<?php echo $row['imagen'] ?>" alt=""><br>
                </div>
                <div class="pt-1 pe-3 ps-3 bg-main h-detalle  w-100">
                    <div class="d-flex">
                        <div class="col">
                            <span class="text-precio fw-bold">S./ <?php echo $row['precio'] ?></span>
                        </div>
                        <div class="col-auto ms-3">
                            <span data-bs-toggle="modal" data-bs-target="#editarProducto" onclick="llenarModal('<?php echo $datos ?>')"><i class="bi bi-pen-fill text-precio"></i></span>
                        </div>
                        <div class="col-auto ms-3">
                            <span onclick="eliminacion('<?php echo $row['id'] ?>')"><i class="bi bi-trash3-fill text-precio"></i></span>
                        </div>
                    </div>
                    <p class="text-producto"><?php echo $row['nombre'] ?></p>
                </div>
            </div>
        </div>
    <?php
    }
}

//funcion para listar productos
function showProductsAll(){
    $conexion = conectar();
    $resultado = listaProductosTodos($conexion);
    while ($row = mysqli_fetch_array($resultado)) {
        //guardarlo en un array para poder enviarlo por json
        $datos[] = array(
            'id' => $row['id'],
            'nombre' => $row['nombre'],
            'precio' => $row['precio'],
            'imagen' => $row['imagen']
        );
        
    }
    echo json_encode($datos);
}

//funcion para agregar productos
function addProductos()
{
    $conexion = conectar();
    if (!empty($_POST['nom']) && !empty($_POST['pre']) && !empty($_FILES['foto']['name'])) {
        $imagen = $_FILES['foto']['name'];
        $ruta = $_FILES['foto']['tmp_name'];
        $destino = "../../database/img/" . $imagen;
        copy($ruta, $destino);

        $destinodb = "database/img/" . $imagen;
        $datos = array(
            'nombre' => $_POST['nom'],
            'precio' => $_POST['pre']
        );
        agregarProductos($conexion, $datos, $destinodb);
        $logo = "../assets/gif/aceptar.gif";
        $titulo = "Listo!";
        $mensaje = "¡Producto agregado con exito!";
    } else {
        $logo = "../assets/gif/error-img.gif";
        $titulo = "Error!";
        $mensaje = "¡No se puede agregar el producto!";
    }
    ?>
    <div class="text-center">
        <img class="w-50" src="<?php echo $logo ?>" alt="">
    </div>
    <div>
        <h3 class="text-center"><?php echo $titulo ?></h3>
    </div>
    <div class="text-center">
        <p><?php echo $mensaje ?></p>
    </div>
    <div class="container text-center mt-4 mb-2">
        <button id="btnaceptonoti" data-bs-dismiss="modal" class="btn btn-info ms-auto w-25">Ok</button>
    </div>
<?php
}

//funcion para editar productos
function editProduct()
{
    $conexion = conectar();
    if (!empty($_POST['enom']) && !empty($_POST['epre']) && !empty($_POST['eid'])) {
        $datos = array(
            'id' => $_POST['eid'],
            'nombre' => $_POST['enom'],
            'precio' => $_POST['epre']
        );
        editarProductos($conexion, $datos);
        $logo = "../assets/gif/aceptar.gif";
        $titulo = "Listo!";
        $mensaje = "¡Producto actualizado con exito!";
    } else {
        $logo = "../assets/gif/error-img.gif";
        $titulo = "Error!";
        $mensaje = "¡No se puede actualizar!";
    }
?>
    <div class="text-center">
        <img class="w-50" src="<?php echo $logo ?>" alt="">
    </div>
    <div>
        <h3 class="text-center"><?php echo $titulo ?></h3>
    </div>
    <div class="text-center">
        <p><?php echo $mensaje ?></p>
    </div>
    <div class="container text-center mt-4 mb-2">
        <button id="btnaceptonoti" data-bs-dismiss="modal" class="btn btn-info ms-auto w-25">Ok</button>
    </div>
<?php
}

//funcion para eliminar productos
function deleteProduct()
{
    $conexion = conectar();
    if (!empty($_POST['id'])) {
        eliminarProductos($conexion, $_POST['id']);
        $logo = "../assets/gif/aceptar.gif";
        $titulo = "Listo!";
        $mensaje = "¡Producto eliminado con exito!";
    } else {
        $logo = "../assets/gif/error-img.gif";
        $titulo = "Error!";
        $mensaje = "¡No se puede eliminar!";
    }
?>
    <div class="text-center">
        <img class="w-50" src="<?php echo $logo ?>" alt="">
    </div>
    <div>
        <h3 class="text-center"><?php echo $titulo ?></h3>
    </div>
    <div class="text-center">
        <p><?php echo $mensaje ?></p>
    </div>
    <div class="container text-center mt-4 mb-2">
        <button id="btnaceptonoti" data-bs-dismiss="modal" class="btn btn-info ms-auto w-25">Ok</button>
    </div>
<?php
}

if (function_exists($_GET['f'])) {
    $_GET['f'](); //llama la función si es que existe
}
?>