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
    $stmt = $pdo->query("SELECT veiculo.placa, 
                                veiculo.codigoMarca, 
                                veiculo.codigoCategoria
                                FROM veiculo
                        ");

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
            <h2>Veículos Disponíveis</h2>
            <table class="tabela-veiculos">
                <thead>
                    <tr>
                        <th>Marca</th>
                        <th>Categoria</th>
                        <th>Placa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($veiculos): ?>
                        <?php foreach ($veiculos as $veiculo): ?>
                            <tr>
                                <td><?= htmlspecialchars($veiculo['codigoMarca']) ?></td>
                                <td><?= htmlspecialchars($veiculo['codigoCategoria']) ?></td>
                                <td><?= htmlspecialchars($veiculo['placa']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="3">Nenhum veículo disponível no momento.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
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
