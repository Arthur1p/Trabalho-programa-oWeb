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
    $stmt = $pdo->query("SELECT categoria.codigo, 
                                categoria.descricao
                                FROM categoria
                        ");

    $categoria = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erro ao buscar categorias: " . $e->getMessage();
    exit;
}

try {
    $stmt = $pdo->query("SELECT marca.codigo, marca.nome FROM marca");
    $marcas = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erro ao buscar marcas: " . $e->getMessage();
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
            <li><a href="pagina2.php">Veiculos</a></li>
            <li><a href="pagina3.php">Cadastrar</a></li>
            <li><a href="logout.php">Sair</a></li>
        </ul>
    </nav>
    <section id="categorias">
        <div class="container">
            <h2>Categorias Disponíveis</h2>
            <table class="tabela-veiculos">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Categoria</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($categoria): ?>
                        <?php foreach ($categoria as $categoria): ?>
                            <tr>
                                <td><?= htmlspecialchars($categoria['codigo']) ?></td>
                                <td><?= htmlspecialchars($categoria['descricao']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="3">Nenhuma categoria disponível no momento.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>

    <section id="marcas">
        <div class="container">
            <h2>Marcas Disponíveis</h2>
            <table class="tabela-veiculos">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Nome</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($marcas): ?>
                        <?php foreach ($marcas as $marca): ?>
                            <tr>
                                <td><?= htmlspecialchars($marca['codigo']) ?></td>
                                <td><?= htmlspecialchars($marca['nome']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="2">Nenhuma marca disponível no momento.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>

    <footer>
        <div class="container">
            <p>&copy; 2024 Locadora de Veículos. Todos os direitos reservados a mim Arthur Formiga.</p>
        </div>
    </footer>
</body>
</html>
