<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $activo = isset($_POST['activo']) ? 1 : 0;

    $stmt = $pdo->prepare("INSERT INTO editorial (nombre, activo) VALUES (?, ?)");
    $stmt->execute([$nombre, $activo]);

    header("Location: editoriales.php");
    exit();
}

$editoriales = $pdo->query("SELECT * FROM editorial")->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editoriales</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Editoriales</h1>

        <form action="editoriales.php" method="post" class="mt-4 mb-4">
            <div class="form-group">
                <label for="nombre">Nombre de la Editorial:</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required>
            </div>
            <div class="form-check">
                <input type="checkbox" name="activo" id="activo" class="form-check-input">
                <label for="activo" class="form-check-label">Activo</label>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Agregar Editorial</button>
        </form>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Activo</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($editoriales as $editorial): ?>
                    <tr>
                        <td><?= $editorial['id'] ?></td>
                        <td><?= $editorial['nombre'] ?></td>
                        <td><?= $editorial['activo'] ? 'Sí' : 'No' ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

