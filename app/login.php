<?php
session_start();

require_once '../app/database/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    try {
        $stmt = $pdo->prepare('SELECT * FROM usuario WHERE nome = :nome AND senha = SHA1(:senha)');
        $stmt->execute([
            ':nome' => $usuario,
            ':senha' => $senha,
        ]);
        
        $user = $stmt->fetch();

        if ($user) {
            $_SESSION['user'] = $user['nome'];
            header('Location: ../app/pagina1.php');
            exit;
        } else {
            echo "<script>alert('Usuário ou senha inválidos!'); window.location.href = '../index.php';</script>";
        }
    } catch (PDOException $e) {
        die('Erro ao processar o login: ' . $e->getMessage());
    }
}
?>
