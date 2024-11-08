<?php
include 'conexion.php';
$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $num_paginas = $_POST['num_paginas'];
    $tipo = $_POST['tipo'];
    $idioma = $_POST['idioma'];
    $editorial_id = $_POST['editorial_id'];
    $activo = isset($_POST['activo']) ? 1 : 0;

    $stmt = $pdo->prepare("UPDATE libro SET titulo = ?, num_paginas = ?, tipo = ?, idioma = ?, editorial_id = ?, activo = ? WHERE id = ?");
    $stmt->execute([$titulo, $num_paginas, $tipo, $idioma, $editorial_id, $activo, $id]);
    header('Location: libros.php');
} else {
    $stmt = $pdo->prepare("SELECT * FROM libro WHERE id = ?");
    $stmt->execute([$id]);
    $libro = $stmt->fetch();

    $editoriales = $pdo->query("SELECT * FROM editorial WHERE activo = 1")->fetchAll();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Libro</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Editar Libro</h2>
        <form method="POST">
            <div class="form-group">
                <label>Título</label>
                <input type="text" name="titulo" class="form-control" value="<?php echo $libro['titulo']; ?>" required>
            </div>
            <div class="form-group">
                <label>Número de Páginas</label>
                <input type="number" name="num_paginas" class="form-control" value="<?php echo $libro['num_paginas']; ?>" required>
            </div>
            <div class="form-group">
                <label>Tipo</label>
                <input type="text" name="tipo" class="form-control" value="<?php echo $libro['tipo']; ?>" required>
            </div>
            <div class="form-group">
                <label>Idioma</label>
                <input type="text" name="idioma" class="form-control" value="<?php echo $libro['idioma']; ?>" required>
            </div>
            <div class="form-group">
                <label>Editorial</label>
                <select name="editorial_id" class="form-control" required>
                    <?php foreach ($editoriales as $editorial) { ?>
                        <option value="<?php echo $editorial['id']; ?>" <?php echo $editorial['id'] == $libro['editorial_id'] ? 'selected' : ''; ?>>
                            <?php echo $editorial['nombre']; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" name="activo" class="form-check-input" <?php echo $libro['activo'] ? 'checked' : ''; ?>>
                <label class="form-check-label">Activo</label>
            </div>
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
    </div>
</body>
</html>
