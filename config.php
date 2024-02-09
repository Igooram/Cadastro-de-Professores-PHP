<?php
$host = 'localhost';
$dbname = 'cadastro_professores';
$username = 'root';
$password = '';

try {
    // Conexão com o banco de dados
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    // Definindo o modo de erro do PDO para exceções
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Se ocorrer algum erro na conexão, exibe uma mensagem de erro e interrompe o script
    die("Erro ao conectar ao banco de dados: " . $e->getMessage());
}
?>
