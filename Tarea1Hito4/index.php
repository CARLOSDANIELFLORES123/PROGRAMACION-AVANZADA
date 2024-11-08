<?php  
      include 'conexion.php';?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Gestión de Librería</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container text-center mt-5">
        <h1>Gestión de Librería</h1>
        <p>Bienvenido al sistema de gestión de librería. Selecciona una sección para administrar.</p>
        
        <!-- Botones para navegar a cada sección -->
        <div class="row mt-4">
            <div class="col-md-4">
                <a href="autores.php" class="btn btn-primary btn-lg btn-block">Autores</a>
            </div>
            <div class="col-md-4">
                <a href="editoriales.php" class="btn btn-secondary btn-lg btn-block">Editoriales</a>
            </div>
            <div class="col-md-4">
                <a href="libros.php" class="btn btn-success btn-lg btn-block">Libros</a>
            </div>
        </div>
    </div>
</body>
</html>
