<?php

include 'conexion.php';



// Insertar nuevo autor
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $activo = isset($_POST['activo']) ? 1 : 0;

    $stmt = $pdo->prepare("INSERT INTO autor (nombre, activo) VALUES (?, ?)");
    $stmt->execute([$nombre, $activo]);

    // Redirigir para evitar reenvíos del formulario
    header("Location: autores.php");
    exit();
}

// Obtener autores existentes
$autores = $pdo->query("SELECT * FROM autor")->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Autores</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Autores</h1>

        <!-- Formulario para agregar autor -->
        <form action="autores.php" method="post" class="mt-4 mb-4">
            <div class="form-group">
                <label for="nombre">Nombre del Autor:</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required>
            </div>
            <div class="form-check">
                <input type="checkbox" name="activo" id="activo" class="form-check-input">
                <label for="activo" class="form-check-label">Activo</label>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Agregar Autor</button>
        </form>

        <!-- Listado de autores -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Activo</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($autores as $autor): ?>
                    <tr>
                        <td><?= $autor['id'] ?></td>
                        <td><?= $autor['nombre'] ?></td>
                        <td><?= $autor['activo'] ? 'Sí' : 'No' ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
