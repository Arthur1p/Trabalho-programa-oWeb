<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veículos Disponíveis</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: ../index.php');
    exit;
}

require_once '../app/database/connection.php';

try {
    $stmt = $pdo->query("SELECT veiculo.codigo, veiculo.placa, veiculo.codigoMarca AS marca, veiculo.codigoCategoria AS categoria
                         FROM veiculo");

    $veiculos = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erro ao buscar os veículos: " . $e->getMessage();
    exit;
}
?>

<body>
    <header>
        <div class="container">
            <h1>Locadora de Arthur Formiga</h1>
            <h2>Confira nossos veículos disponíveis</h2>
        </div>
    </header>
    <nav>
        <ul class="navegation">
            <li><a href="pagina1.php">Inicio</a></li>
            <li><a href="pagina3.php">Registrar</a></li>
            <li><a href="pagina4.php">Informações</a></li>
            <li><a href="logout.php">Sair</a></li>
        </ul>
    </nav>
    <section id="veiculos">
        <div class="container">
            <h2>Galeria de Veículos</h2>
            <div class="veiculos-grid">
                <?php if ($veiculos): ?>
                    <?php foreach ($veiculos as $veiculo): ?>
                        <div class="veiculo-card">
                            <h3><?= htmlspecialchars($veiculo['marca']) ?> - <?= htmlspecialchars($veiculo['categoria']) ?></h3>
                            <p>Placa: <?= htmlspecialchars($veiculo['placa']) ?></p>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Nenhum veículo disponível no momento.</p>
                <?php endif; ?>
            </div>
            <button class="btn-cadastrar" onclick="window.location.href='pagina3.php'">Cadastrar Novo Veículo</button>
        </div>
    </section>
    <footer>
        <div class="container">
            <p>&copy; 2024 Locadora de Veículos. Todos os direitos reservados a mim Arthur Formiga.</p>
        </div>
    </footer>
</body>
</html>
