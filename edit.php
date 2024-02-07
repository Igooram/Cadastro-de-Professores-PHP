<?php
include 'config.php';

if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit();
}

$id = $_GET['id'];

$stmt = $pdo->prepare('SELECT * FROM professores WHERE id = ?');
$stmt->execute([$id]);
$professor = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$professor) {
    header('Location: index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $disciplina = $_POST['disciplina'];
    $cpf = $_POST['cpf']; // Novo campo CPF
    $cep = $_POST['cep']; // Novo campo CEP
    $telefone = $_POST['telefone']; // Novo campo telefone

    $stmt = $pdo->prepare('UPDATE professores SET nome = ?, email = ?, disciplina = ?, cpf = ?, cep = ?, telefone = ? WHERE id = ?');
    $stmt->execute([$nome, $email, $disciplina, $cpf, $cep, $telefone, $id]);

    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Professor</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Editar Professor</h2>
        <form method="post">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $professor['nome']; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $professor['email']; ?>" required>
            </div>
            <div class="form-group">
                <label for="disciplina">Disciplina:</label>
                <input type="text" class="form-control" id="disciplina" name="disciplina" value="<?php echo $professor['disciplina']; ?>" required>
            </div>
            <div class="form-group">
                <label for="cpf">CPF:</label>
                <input type="text" class="form-control" id="cpf" name="cpf" value="<?php echo $professor['cpf']; ?>" required> <!-- Novo campo CPF -->
            </div>
            <div class="form-group">
                <label for="cep">CEP:</label>
                <input type="text" class="form-control" id="cep" name="cep" value="<?php echo $professor['cep']; ?>" required> <!-- Novo campo CEP -->
            </div>
            <div class="form-group">
                <label for="telefone">Telefone:</label>
                <input type="text" class="form-control" id="telefone" name="telefone" value="<?php echo $professor['telefone']; ?>" required> <!-- Novo campo telefone -->
            </div>
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
    </div>
</body>
</html>
