<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/productos.css">
</head>

<body>
    <div id="buscador" class="container bg-main py-2">
        <h3>Productos</h3>
        <div class="d-flex mt-2 mb-2">
            <div class="col">
            <input oninput="buscar_ahora($('#buscar_1').val());" type="text" class="form-control" id="buscar_1" name="buscar_1" placeholder="Buscar Producto">
            </div>
            <div class="col-auto ms-1">
                <button class="btn btn-transparent pe-0 ps-2">
                    <i class="bi bi-heart-fill"></i>
                </button>
            </div>
            <div class="col-auto ms-1">
                <button data-bs-toggle="modal" data-bs-target="#agregarProducto" class="btn btn-transparent pe-0 ps-2">
                    <i class="bi bi-journal-plus"></i>
                </button>
            </div>
        </div>
    </div>

    <div class="container bg-main mb-3">
        <div class="row mt-2" id="contenedorProductos">
        </div>
    </div>

    <!-- Modal Agregar -->
    <div class="modal fade" id="agregarProducto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" id="frmAgregar" enctype="multipart/form-data">
                        <div class="text-center">
                            <img src="../assets/img/simfoto.jpg" alt="avatar" id="img" />
                            <input type="file" name="foto" id="foto" accept="image/*" /><br>
                            <label for="foto">Elegir foto</label>
                        </div>
                        <div>
                            <span>Nombre</span>
                            <input type="text" class="form-control" name="nom">
                            <span>Precio</span>
                            <input type="text" class="form-control" name="pre">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-container" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" data-bs-dismiss="modal" class="btn bg-rosa text-light" id="btnAgregar">Guardar</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Editar -->
    <div class="modal fade" id="editarProducto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" id="frmActualizar">
                        <input type="hidden" name="eid" id="eid">
                        <span>Nombre</span>
                        <input type="text" class="form-control" name="enom" id="enom">
                        <span>Precio</span>
                        <input type="text" class="form-control" name="epre" id="epre">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-container" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" data-bs-dismiss="modal" class="btn bg-rosa text-light" id="btnActualizar">Guardar</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- ================================================================= -->
    <!-- Modal para eliminar -->
    <div class="modal fade" id="eliminar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">

                    <div class="text-center">
                        <img class="w-50" src="../assets/gif/advertencia.gif" alt="">
                    </div>
                    <div>
                        <h3 class="text-center">¿Deseas eliminar?</h3>
                    </div>
                    <div class="text-center">
                        <p>¡No podra revertir esto!</p>
                    </div>
                    <div class="row pe-5 ps-5 text-center mt-4 mb-2">
                        <div class="col-6">
                            <button id="btnEliminarNoti" data-bs-dismiss="modal" class="btn bg-primary text-light w-100 fw-bold">¡Eliminar!</button>
                        </div>
                        <div class="col-6">
                            <button id="btnCancelar" data-bs-dismiss="modal" class="btn bg-danger text-light w-100">Cancelar</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Modal para notificaciones -->
    <div class="modal fade" id="noti" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body" id="cuerpo-noti">


                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script src="../assets/js/previewImg.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="../assets/js/server/productos.js"></script>
</body>

</html>