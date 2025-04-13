<?php
session_start();

$usuarioPadrao = 'admin';
$senhaPadrao = '123456';

$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'] ?? '';
    $senha = $_POST['senha'] ?? '';

    if ($usuario === $usuarioPadrao && $senha === $senhaPadrao) {
        $_SESSION['logado'] = true;
        header('Location: protegido.php');
        exit;
    } else {
        $erro = 'Usuário ou senha inválidos.';
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>

    <?php if ($erro): ?>
        <p style="color: red;"><?= $erro ?></p>
    <?php endif; ?>

    <form method="post">
        <label>Usuário:
            <input type="text" name="usuario" required>
        </label>
        <br>
        <label>Senha:
            <input type="password" name="senha" required>
        </label>
        <br>
        <button type="submit">Entrar</button>
    </form>

    <p><a href="index.php">← Voltar para o catálogo</a></p>
</body>
</html>