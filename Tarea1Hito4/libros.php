<?php
include 'conexion.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $_POST['titulo'];
    $num_paginas = $_POST['num_paginas'];
    $tipo = $_POST['tipo'];
    $idioma = $_POST['idioma'];
    $editorial_id = $_POST['editorial_id'];
    $activo = isset($_POST['activo']) ? 1 : 0;

    $stmt = $pdo->prepare("INSERT INTO libro (titulo, num_paginas, tipo, idioma, editorial_id, activo) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$titulo, $num_paginas, $tipo, $idioma, $editorial_id, $activo]);

    header("Location: libros.php");
    exit();
}

$editoriales = $pdo->query("SELECT * FROM editorial")->fetchAll();
$libros = $pdo->query("SELECT * FROM libro")->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Libros</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Libros</h1>

        <form action="libros.php" method="post" class="mt-4 mb-4">
            <div class="form-group">
                <label for="titulo">Título:</label>
                <input type="text" name="titulo" id="titulo" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="num_paginas">Número de Páginas:</label>
                <input type="number" name="num_paginas" id="num_paginas" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="tipo">Tipo:</label>
                <input type="text" name="tipo" id="tipo" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="idioma">Idioma:</label>
                <input type="text" name="idioma" id="idioma" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="editorial_id">Editorial:</label>
                <select name="editorial_id" id="editorial_id" class="form-control" required>
                    <?php foreach ($editoriales as $editorial): ?>
                        <option value="<?= $editorial['id'] ?>"><?= $editorial['nombre'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-check">
                <input type="checkbox" name="activo" id="activo" class="form-check-input">
                <label for="activo" class="form-check-label">Activo</label>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Agregar Libro</button>
        </form>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Páginas</th>
                    <th>Tipo</th>
                    <th>Idioma</th>
                    <th>Editorial</th>
                    <th>Activo</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($libros as $libro): ?>
                    <tr>
                        <td><?= $libro['id'] ?></td>
                        <td><?= $libro['titulo'] ?></td>
                        <td><?= $libro['num_paginas'] ?></td>
                        <td><?= $libro['tipo'] ?></td>
                        <td><?= $libro['idioma'] ?></td>
                        <td><?= $libro['editorial_id'] ?></td>
                        <td><?= $libro['activo'] ? 'Sí' : 'No' ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>


