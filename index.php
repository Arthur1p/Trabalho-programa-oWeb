<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Locadora</title>
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
    <div class="login-container">
        <h1>Bem-vindo à Locadora</h1>
        <form method="POST" action="app/login.php">
            <div class="form-group">
                <label for="usuario">Usuário</label><br>
                <input type="text" id="usuario" name="usuario" placeholder="Digite seu usuário" required>
            </div>
            <div class="form-group">
                <label for="senha">Senha</label><br>
                <input type="password" id="senha" name="senha" placeholder="Digite sua senha" required>
            </div>
            <div class="form-actions">
                <input type="reset" value="Limpar">
                <input type="submit" value="Entrar">
            </div>
        </form>
    </div>
</body>
</html>
