<?php
include 'config.php';

$stmt = $pdo->query('SELECT * FROM disciplinas');
$disciplinas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Disciplinas</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Lista de Disciplinas</h2>
        <ul class="list-group">
            <?php foreach ($disciplinas as $disciplina): ?>
                <li class="list-group-item"><?php echo $disciplina['nome']; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>
