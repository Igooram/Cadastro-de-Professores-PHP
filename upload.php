<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica se o arquivo foi enviado sem erros
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
        // Define o diretório onde a imagem será armazenada
        $diretorio = 'uploads/';

        // Gera um nome único para a imagem com base no timestamp atual e no nome do arquivo
        $nome_arquivo = $diretorio . uniqid() . '_' . $_FILES['imagem']['name'];

        // Move o arquivo para o diretório de uploads
        if (move_uploaded_file($_FILES['imagem']['tmp_name'], $nome_arquivo)) {
            // Insere o nome do arquivo na tabela de imagens no banco de dados
            $stmt = $pdo->prepare('INSERT INTO imagens (nome_arquivo) VALUES (?)');
            $stmt->execute([$nome_arquivo]);

            // Redireciona para a página de lista de imagens
            header('Location: lista_imagens.php');
            exit();
        } else {
            echo "Erro ao mover o arquivo para o diretório de uploads.";
        }
    } else {
        echo "Erro no envio do arquivo.";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Envio de Imagem</title>
</head>
<body>
    <h2>Envie sua Imagem</h2>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        Selecione a imagem:
        <input type="file" name="imagem" id="imagem">
        <input type="submit" value="Enviar Imagem" name="submit">
    </form>
</body>
</html>
