<?php
session_start();
include 'includes/dados.php';
include 'includes/cabecalho.php';

// Junta as profissões fixas com as cadastradas na sessão
$todasProfissoes = $profissoes;
if (isset($_SESSION['novas_profissoes'])) {
    $todasProfissoes = array_merge($todasProfissoes, $_SESSION['novas_profissoes']);
}
$todasProfissoes = array_values($todasProfissoes); // Reindexa os IDs

// Verifica se foi passado um ID válido pela URL
if (!isset($_GET['id']) || !isset($todasProfissoes[$_GET['id']])) {
    echo "<p>Profissão não encontrada.</p>";
    include 'includes/rodape.php';
    exit;
}

$id = (int) $_GET['id'];
$profissao = $todasProfissoes[$id];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes da Profissão</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #343a40; /* Cor de fundo escura */
            color: #ffffff; /* Texto branco */
        }
        .profissao {
            background-color: #495057; /* Cor de fundo da profissão */
            border-radius: 5px; /* Bordas arredondadas */
            padding: 20px; /* Espaçamento interno */
            margin: 20px 0; /* Margem superior e inferior */
        }
        .profissao img {
            max-width: 100%; /* Imagem responsiva */
            border-radius: 5px; /* Bordas arredondadas para a imagem */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center mt-5">Detalhes da Profissão</h1>
        <div class="profissao">
            <img src="<?= $profissao['imagem'] ?>" alt="<?= $profissao['titulo'] ?>" class="img-fluid">
            <h2 class="mt-3"><?= $profissao['titulo'] ?></h2>
            <p><strong>Categoria:</strong> <?= $profissao['categoria'] ?></p>
            <p><strong>Descrição:</strong> <?= $profissao['descricao'] ?></p>
        </div>
        <p><a href="index.php" class="btn btn-light">← Voltar para o catálogo</a></p>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
<?php include 'includes/rodape.php'; ?>
</html>