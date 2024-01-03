<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Tiendita</title>
    <link rel="stylesheet" href="assets/css/menu1.css">
</head>

<body>
    <?php require_once('frontend/menuAdmin.php') ?>
    <div class="contenedor">
        <iframe src="views/productos.php" name="frame" style="width:100%; height: 100%;" border: none;"></iframe>
    </div>

    <script src="assets/js/menuMobile.js"></script>
</body>

</html>