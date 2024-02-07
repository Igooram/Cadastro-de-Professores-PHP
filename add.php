<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone']; // Adicionando campo telefone
    $cpf = $_POST['cpf']; // Adicionando campo CPF
    $cep = $_POST['cep']; // Adicionando campo CEP
    $disciplina = $_POST['disciplina'];

    $stmt = $pdo->prepare('INSERT INTO professores (nome, email, telefone, cpf, cep, disciplina) VALUES (?, ?, ?, ?, ?, ?)');
    $stmt->execute([$nome, $email, $telefone, $cpf, $cep, $disciplina]);

    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Professor</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="estilo-add.css">
    <link rel="shortcut icon" href="fivcon/professor.png" type="image/x-icon">
</head>
<body>
    <div class="container mt-5">
        <h2>Adicionar Professor</h2>
        <form method="post">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="telefone">Telefone:</label>
                <input type="text" class="form-control telefone" id="telefone" name="telefone" required>
            </div>
            <div class="form-group">
                <label for="cpf">CPF:</label>
                <input type="text" class="form-control cpf" id="cpf" name="cpf" required>
            </div>
            <div class="form-group">
                <label for="cep">CEP:</label>
                <input type="text" class="form-control cep" id="cep" name="cep" required>
            </div>
            <div class="form-group">
                <label for="disciplina">Disciplina:</label>
                <input type="text" class="form-control" id="disciplina" name="disciplina" required>
            </div>
            <button type="submit" class="btn btn-primary">Adicionar</button>
        </form>
    </div>

    <!-- Incluindo biblioteca jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Incluindo biblioteca jQuery Mask -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script>
    $(document).ready(function() {
        // Aplicando máscara de telefone
        $('.telefone').mask('(00) 00000-0000');
        // Aplicando máscara de CPF
        $('.cpf').mask('000.000.000-00', {reverse: true});
        // Aplicando máscara de CEP
        $('.cep').mask('00000-000');
    });
    </script>
</body>
</html>
