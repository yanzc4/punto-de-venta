<?php

//funcion para listar los productos
function listarProductos($conexion, $buscar){
    $query = "select * from productos where estado=1 and nombre like '%$buscar%' order by id desc";
    $resultado = $conexion->query($query);
    return $resultado;
}

function agregarProductos($conexion, $datos, $destinodb){
    $query = "insert into productos(nombre, precio, imagen, estado) values ('$datos[nombre]', '$datos[precio]', '$destinodb', 1)";
    $resultado = $conexion->query($query);
    return $resultado;
}

function editarProductos($conexion, $datos){
    $query = "update productos set nombre='$datos[nombre]', precio='$datos[precio]' where id='$datos[id]'";
    $resultado = $conexion->query($query);
    return $resultado;
}

function eliminarProductos($conexion, $id){
    $query = "update productos set estado=0 where id='$id'";
    $resultado = $conexion->query($query);
    return $resultado;
}

function listaProductosTodos($conexion){
    $query = "select * from productos where estado=1 order by id desc";
    $resultado = $conexion->query($query);
    return $resultado;
}

?>