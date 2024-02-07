<?php
include 'config.php';

$stmt = $pdo->query('SELECT * FROM professores');
$professores = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Professores</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="estilo.css">
    <link rel="shortcut icon" href="fivcon/professor.png" type="image/x-icon">

</head>
<body>
    <div class="container mt-5">
        <h2>Lista de Professores</h2>
        <a href="add.php" class="btn btn-primary mb-3">Adicionar Professor</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th class="td-nome">Nome</th>
                    <th class="td-email">Email</th>
                    <th class="td-disciplina">Disciplina</th>
                    <th class="td-telefone">Telefone</th>
                    <th class="td-acoes">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($professores as $professor): ?>
                    <tr>
                        <td><?php echo $professor['id']; ?></td>
                        <td class="td-nome"><?php echo $professor['nome']; ?></td>
                        <td class="td-email"><?php echo $professor['email']; ?></td>
                        <td class="td-disciplina"><?php echo $professor['disciplina']; ?></td>
                        <td class="td-telefone"><?php echo $professor['telefone']; ?></td> <!-- Adicionando o campo telefone -->
                        <td class="td-acoes">
                            <a href="edit.php?id=<?php echo $professor['id']; ?>" class="btn btn-primary btn-sm">Editar</a>
                            <a href="delete.php?id=<?php echo $professor['id']; ?>" class="btn btn-danger btn-sm">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="scripts.js"></script>
</body>
</html>
