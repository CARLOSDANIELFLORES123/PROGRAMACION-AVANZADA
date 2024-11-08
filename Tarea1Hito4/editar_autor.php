<?php
include 'conexion.php';
$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $activo = isset($_POST['activo']) ? 1 : 0;
    $stmt = $pdo->prepare("UPDATE autor SET nombre = ?, activo = ? WHERE id = ?");
    $stmt->execute([$nombre, $activo, $id]);
    header('Location: autores.php');
} else {
    $stmt = $pdo->prepare("SELECT * FROM autor WHERE id = ?");
    $stmt->execute([$id]);
    $autor = $stmt->fetch();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Autor</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Editar Autor</h2>
        <form method="POST">
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="nombre" class="form-control" value="<?php echo $autor['nombre']; ?>" required>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" name="activo" class="form-check-input" <?php echo $autor['activo'] ? 'checked' : ''; ?>>
                <label class="form-check-label">Activo</label>
            </div>
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
    </div>
</body>
</html>