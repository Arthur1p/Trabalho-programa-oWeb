<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Locadora</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: ../index.php');
    exit;
}
?>

<body>
    <header>
        <div class="container">
            <h1>Locadora de Arthur Formiga</h1>
            <h3>Carros nos melhores preços</h3>
        </div>
    </header>
    <nav>
        <ul class="navegation">
            <li><a href="pagina2.php">Veiculos</a></li>
            <li><a href="pagina3.php">Registrar</a></li>
            <li><a href="pagina4.php">Informações</a></li>
            <li><a href="logout.php">Sair</a></li>
        </ul>
    </nav>
    <section>
        <div id="div_principal">
            <div class="efeito">
                <div class="container">
                    <h1>Bem-vindo à Locadora</h1>
                    <p>Alugue veículos com conforto e segurança. Temos opções para todas as necessidades.</p>
                    <button class="btn-explore" onclick="window.location.href='pagina2.php'">Explorar Veículos</button>

                </div>
            </div>
        </div>
        <footer>
            <div class="container">
                <p>&copy; 2024 Locadora de Veículos. Todos os direitos reservados a mim Arthur Formiga.</p>
            </div>
        </footer>
    </section>




</body>
</html>