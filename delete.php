<?php
include 'config.php';

if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit();
}

$id = $_GET['id'];

// Excluir o registro do professor
$stmtDeleteProfessor = $pdo->prepare('DELETE FROM professores WHERE id = ?');
$stmtDeleteProfessor->execute([$id]);

header('Location: index.php');
?>
