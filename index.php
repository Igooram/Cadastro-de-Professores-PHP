<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Professores</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="estilo-add.css">
    <link rel="stylesheet" href="estilo.css">
    <link rel="stylesheet" href="normalize.css"> <!--Normalize css-->
    <link rel="shortcut icon" href="fivcon/professor.png" type="image/x-icon">
</head>
<body>
    <div class="container mt-5">
        <h2>Lista de Professores</h2>
        <a href="add.php" class="btn btn-primary mb-3">
            Adicionar Professor
        </a>
        <label for="upload" style="cursor: pointer;">
            <img id="imagem" src="imagens/gatozoiudo.jpg" alt="Gato Zoiudo" style="width: 100px; height: 100px; margin-left: 10px;">
        </label>
        <input type="file" id="upload" style="display: none;">
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
                <?php
                include 'config.php';
                $stmt = $pdo->query('SELECT * FROM professores');
                $professores = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach ($professores as $professor): ?>
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

    <footer style="position: fixed; bottom: 0; width: 100%; background-color: #333; color: #fff; padding: 10px; text-align: center;">
    <!-- Rodapé da página -->
    <p>&copy; 2024 Cadastro de Professores</p>
</footer>

    <script>
    // Verifica se há uma imagem armazenada no armazenamento local
    var imagemArmazenada = localStorage.getItem('imagem');
    if (imagemArmazenada) {
        document.getElementById('imagem').src = imagemArmazenada;
    }

    document.getElementById('upload').addEventListener('change', function() {
        var arquivo = this.files[0];
        if (arquivo) {
            var leitor = new FileReader();
            leitor.onload = function(e) {
                // Exibe a imagem selecionada
                document.getElementById('imagem').src = e.target.result;
                // Armazena o caminho da imagem no armazenamento local
                localStorage.setItem('imagem', e.target.result);
            }
            leitor.readAsDataURL(arquivo);
        }
    });
    </script>
</body>
</html>
