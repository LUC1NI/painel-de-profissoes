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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área Restrita</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #343a40; /* Cor de fundo escura */
            color: #ffffff; /* Texto branco */
        }
        .card {
            background-color: #495057; /* Cor do cartão */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center mt-5">Cadastro de Nova Profissão</h1>

        <?php if ($mensagem): ?>
            <div class="alert alert-success text-center"><?= $mensagem ?></div>
        <?php endif; ?>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-3">
                    <div class="card-body">
                        <form method="post">
                            <div class="form-group">
                                <label>Título:</label>
                                <input type="text" class="form-control" name="titulo" required>
                            </div>
                            <div class="form-group">
                                <label>Categoria:</label>
                                <input type="text" class="form-control" name="categoria" required>
                            </div>
                            <div class="form-group">
                                <label>Descrição:</label>
                                <textarea class="form-control" name="descricao" required></textarea>
                            </div>
                            <div class="form-group">
                                <label>URL da Imagem:</label>
                                <input type="text" class="form-control" name="imagem" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Cadastrar Profissão</button>
                        </form>
                    </div>
                </div>
                <p class="text-center mt-3">
                    <a href="index.php" class="text-white">← Voltar ao Catálogo</a> | 
                    <a href="logout.php" class="text-danger">Sair</a>
                </p>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>