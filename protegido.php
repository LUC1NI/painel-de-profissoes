<?php
session_start();

if (!isset($_SESSION['logado'])) {
    header('Location: login.php');
    exit;
}

if (!isset($_SESSION['novas_profissoes'])) {
    $_SESSION['novas_profissoes'] = [];
}

$mensagem = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'] ?? '';
    $categoria = $_POST['categoria'] ?? '';
    $descricao = $_POST['descricao'] ?? '';
    $imagem = $_POST['imagem'] ?? '';

    if ($titulo && $categoria && $descricao && $imagem) {
        $_SESSION['novas_profissoes'][] = [
            'titulo' => $titulo,
            'categoria' => $categoria,
            'descricao' => $descricao,
            'imagem' => $imagem
        ];
        $mensagem = 'Profissão cadastrada com sucesso!';
    } else {
        $mensagem = 'Preencha todos os campos.';
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Área Restrita</title>
</head>
<body>
    <h1>Cadastro de Nova Profissão</h1>

    <?php if ($mensagem): ?>
        <p><?= $mensagem ?></p>
    <?php endif; ?>

    <form method="post">
        <label>Título:<br>
            <input type="text" name="titulo" required>
        </label><br><br>

        <label>Categoria:<br>
            <input type="text" name="categoria" required>
        </label><br><br>

        <label>Descrição:<br>
            <textarea name="descricao" required></textarea>
        </label><br><br>

        <label>URL da Imagem:<br>
            <input type="text" name="imagem" required>
        </label><br><br>

        <button type="submit">Cadastrar Profissão</button>
    </form>

    <p><a href="index.php">← Voltar ao Catálogo</a> | <a href="logout.php">Sair</a></p>
</body>
</html>
