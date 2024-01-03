<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/clientes.css">
</head>

<body>
    <div id="buscador" class="container bg-main py-2">
        <h3>Clientes</h3>
        <div class="d-flex mt-2 mb-2">
            <div class="col">
                <input onkeyup="buscar_ahora($('#buscar_1').val());" type="text" class="form-control bg-container" id="buscar_1" name="buscar_1" placeholder="Buscar Cliente">
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
                    <form method="post" id="frmAgregar">
                        <div>
                            <span>Nombre</span>
                            <input type="text" class="form-control" name="nom">
                            <span>Precio</span>
                            <input type="text" class="form-control" name="pre">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-container" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn bg-rosa text-light" id="btnAgregar">Guardar</button>
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
                    <button type="button" class="btn bg-rosa text-light" id="btnActualizar">Guardar</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="../assets/js/server/clientes.js"></script>
</body>

</html>