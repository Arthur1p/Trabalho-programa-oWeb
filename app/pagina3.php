<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Veículo</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: ../index.php');
    exit;
}

require_once '../app/database/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $placa = $_POST['placa'];
    $codigoMarca = $_POST['codigoMarca'];
    $codigoCategoria = $_POST['codigoCategoria'];
    
    try {
        $stmt = $pdo->prepare("INSERT INTO veiculo (placa, codigoMarca, codigoCategoria) VALUES (:placa, :codigoMarca, :codigoCategoria)");
        $stmt->execute([
            ':placa' => $placa,
            ':codigoMarca' => $codigoMarca,
            ':codigoCategoria' => $codigoCategoria,
        ]);
        
        echo "<script>alert('Veículo cadastrado com sucesso!'); window.location.href='pagina2.php';</script>";
    } catch (PDOException $e) {
        echo "<script>alert('Erro ao cadastrar veículo: {$e->getMessage()}');</script>";
    }
}
?>

<body>
    <header>
        <div class="container">
            <h1>Locadora de Arthur Formiga</h1>
            <h2>Cadastrar Novo Veículo</h2>
        </div>
    </header>
    <nav>
        <ul class="navegation">
            <li><a href="pagina1.php">Inicio</a></li>
            <li><a href="pagina3.php">Veiculos</a></li>
            <li><a href="pagina4.php">Informações</a></li>
            <li><a href="logout.php">Sair</a></li>
        </ul>
    </nav>

    <section>
        <div class="container">
            <form method="POST">
                <label for="placa">Placa:</label>
                <input type="text" id="placa" name="placa" placeholder="Digite a placa" required>
                
                <label for="codigoMarca">Código da Marca:</label>
                <input type="number" id="codigoMarca" name="codigoMarca" placeholder="Digite apenas 1 digito" required>

                <label for="codigoCategoria">Código da Categoria:</label>
                <input type="number" id="codigoCategoria" name="codigoCategoria" placeholder="Digite apenas 1 digito" required>

                <button type="submit" class="btn-submit">Cadastrar Veículo</button>
            </form>
        </div>
    </section>
    <footer>
        <div class="container">
            <p>&copy; 2024 Locadora de Veículos. Todos os direitos reservados a mim Arthur Formiga.</p>
        </div>
    </footer>
</body>
</html>
